<?php

namespace App\Http\Controllers;

use App\Models\Solicitud;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Image;
use Illuminate\Support\Facades\File;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;


class SolicitudController extends Controller
{
   
    public function index()
    {
        $solicitudes = Solicitud::paginate(5);
        return view('admin.solicitudes.index',compact('solicitudes'));
    }


    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

    
    public function show(Solicitud $solicitud)
    {
        $cliente = User::find($solicitud->user_id);

        return view('admin.solicitudes.show', compact('solicitud','cliente'));
    }


    public function edit($id)
    {
        //
    }

  
    public function update(Request $request, $id)
    {
        //
    }

  
    public function destroy($id)
    {
           //produccion
        $solicitud = Solicitud::find($id);
        $pid = $solicitud->image->public_id;
        Cloudinary::destroy($pid);
         $idimg = $solicitud->image->id;
              Image::destroy($idimg);
        //finproduccion
        // $solicitud = Solicitud::find($id);
        // $idimg = $solicitud->image->id;
        // $url = $solicitud->image->url;
        // $str = substr($url, 1);//quitamos un caracter a la cadena de ruta para eliminar la img
        // File::delete($str);//eliminamos la img fisica de nuestro servidor
        // Image::destroy($idimg);

        $solicitud=Solicitud::destroy($id);
       

        return redirect('admin/solicitud')->with('mensaje','Solicitud eliminada!');
    }

    public function aprobarCuenta($id){
        $usuario = User::findOrFail($id);
        $cta_validada = $usuario['cta_validada'];
        if($cta_validada=="No"){
            $user = DB::table('users')
            ->where('id', $id)
            ->update(['cta_validada' => 'Si']);
        }
        if($cta_validada=="Si"){
            $user = DB::table('users')
            ->where('id', $id)
            ->update(['cta_validada' => 'No']);
        }
       
      
        return back()->with('mensaje','Cambio de estado realizado con exito');
    }
}
