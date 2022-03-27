<?php

namespace App\Http\Controllers;

use App\Models\Anuncio;
use App\Models\Orden;
use App\Models\Reporte;
use App\Models\Solicitud;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use PDF;

class AdminController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    // public function goDashboard(){
    //     return view('admin.dashboard');
    // }

    public function administracion(){
        return view('admin.spaceadmin');
    }

    public function pdfOrdenAdmin($id){
        $orden = Orden::find($id); 
        $cliente = User::find($orden->user_id);
         $pdf = PDF::loadView('pdfs.ordenes.compraCredito', compact('orden','cliente'));
        return $pdf->stream('compra_creditos.pdf');
    }

    public function pdfOrden($id){
        $band=false;
        $user_id = Auth::id();
        $cliente = User::find($user_id);
        
        $ordenes_user = Orden::where('user_id',$user_id)->get();
        // dd($user_id);
        foreach($ordenes_user as $ou){
            if($ou->id == $id){
                $band=true;
            }
        }
        if($band==false){
            return redirect()->route('home.inicio')->with('mensaje','Comprobante de compra no encontrado');
        }
        
        $orden = Orden::find($id);          
        $pdf = PDF::loadView('pdfs.ordenes.compraCredito', compact('orden','cliente'));
        return $pdf->stream('compra_creditos.pdf');
        // $orden = Orden::findOrFail($id);
        // view()->share('admin.orden.index',$orden);
        // $pdf = PDF::loadView('pdf_view', $orden);

    }
  
    public function reportes(){
        $reportes = Reporte::paginate(3);
        return view('admin.reportes.index', compact('reportes'));
    }

    public function verUsuarioReportado($id){

        $cliente = User::findOrFail($id);
        return view('admin.reportes.show',compact('cliente'));
    }

    public function banearCuenta($id){
        $user = User::findOrFail($id);
        
        // $user->update([
        //     "estado_cuenta"=>"baneada"
        // ]);
        $estadocuenta = $user['estado_cuenta'];
        if($estadocuenta=="habilitada"){
            $user = DB::table('users')
            ->where('id', $id)
            ->update(['estado_cuenta' => 'baneada']);
        }
        if($estadocuenta=="baneada"){
            $user = DB::table('users')
            ->where('id', $id)
            ->update(['estado_cuenta' => 'habilitada']);
        }

        return back()->with('mensaje','Cuenta baneada con exito');
    }

    
    }


