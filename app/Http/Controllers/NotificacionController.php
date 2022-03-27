<?php

namespace App\Http\Controllers;

use App\Models\Orden;
use App\Models\Reporte;
use App\Models\Solicitud;
use Illuminate\Http\Request;

class NotificacionController extends Controller
{

    public function ver_todas(){
        auth()->user()->unreadNotifications->markAsRead();
         $notificaciones = auth()->user()->notifications;
        
 return view('admin.notificaciones.index', ['notificaciones'=>($notificaciones)]);
     }
 
     public function eliminar($id){
         $notificaciones = auth()->user()->notifications;
         $noti = $notificaciones->find($id)->delete();
         return back();
 
     }


    //ORDENES DE COMPRA DE CREDITOS
    public function marcar_ordenes_leidas(){
        foreach(auth()->user()->unreadNotifications as $noleida){
            if($noleida->type=="App\Notifications\NotificacionOrden"){
                $noleida->markAsRead();
            }
        }
return redirect()->route('orden.index');
    }

    public function marcar_una_leida($notificacion_id, $orden_id){
        auth()->user()->unreadNotifications->when($notificacion_id, function ($query) use
        ($notificacion_id){
            return $query->where('id',$notificacion_id);
        })->markAsRead();
        $orden = Orden::findOrFail($orden_id);
        return redirect()->route('orden.showOrden', $orden->id);
    }


    //=================== REPORTES LEIDOS =================//
    public function marcar_reportes_leidos(){
        foreach(auth()->user()->unreadNotifications as $noleida){
            if($noleida->type=="App\Notifications\NotificacionReporte"){
                $noleida->markAsRead();
            }
        }
    return redirect()->route('admin.reportes');
    }

    public function marcar_un_reporte_leido($notificacion_id, $reporte_id){
            auth()->user()->unreadNotifications->when($notificacion_id, function ($query) use
            ($notificacion_id){
                return $query->where('id',$notificacion_id);
            })->markAsRead();
            $reporte = Reporte::findOrFail($reporte_id);
            return redirect()->route('admin.usuarioReportado', $reporte->user->id);
    }

    //================== SOLICITUDES LEIDAS =============== //
    public function marcar_solicitudes_leidas(){
        foreach(auth()->user()->unreadNotifications as $noleida){
            if($noleida->type=="App\Notifications\NotificacionSolicitud"){
                $noleida->markAsRead();
            }
        }
        $solicitudes = Solicitud::paginate(5);
    return redirect()->route('solicitud.index');
    }

    public function marcar_solicitud_leida($notificacion_id, $reporte_id){
            auth()->user()->unreadNotifications->when($notificacion_id, function ($query) use
            ($notificacion_id){
                return $query->where('id',$notificacion_id);
            })->markAsRead();
            $reporte = Reporte::findOrFail($reporte_id);
            return redirect()->route('admin.usuarioReportado', $reporte->user->id);
    }

}
