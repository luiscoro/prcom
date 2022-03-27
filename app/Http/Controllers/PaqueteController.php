<?php

namespace App\Http\Controllers;

use App\Models\Paquete;
use Illuminate\Http\Request;

class PaqueteController extends Controller
{
 
    public function index()
    {
        $paquetes['paquetes']=Paquete::Paginate(5);
        return view('admin.paquete.index',$paquetes);
    }

    
    public function create()
    {
        return view('admin.paquete.create');
    }

   
    public function store(Request $request)
    {
        $campos = [
            'periodo_horas' => 'required|unique:paquetes,periodo_horas|numeric',
        ];
        $mensaje = [
            'periodo_horas.required' => 'El periodo de horas es requerido',
            'periodo_horas.unique'=> ' El periodo de horas debe ser único',
            'perido_horas.numeric'=>' El valor para el periodo de horas debe ser numérico'
        ];
        $this->validate($request, $campos, $mensaje);

        $datosPaquete = request()->except('_token');

        $c =  Paquete::insert($datosPaquete);
       
        return redirect('admin/paquete')->with('mensaje','Paquete agregado!');
    }

  
    public function edit($id)
    {
        $paquete = Paquete::findOrFail($id);
        return view('admin.paquete.edit', compact('paquete'));
    }

 
    public function update(Request $request, Paquete $paquete)
    {
        $campos = [
            'periodo_horas' => 'required|unique:paquetes,periodo_horas|numeric',
        ];
        $mensaje = [
            'periodo_horas.required' => 'El periodo de horas es requerido',
            'periodo_horas.unique'=> ' El periodo de horas debe ser único',
            'perido_horas.numeric'=>' El valor para el periodo de horas debe ser numérico'
        ];
        $this->validate($request, $campos, $mensaje);
      

$datosPaquete = request()->except(['_token','_method']);

Paquete::where('id','=',$paquete->id)->update($datosPaquete);
        return redirect('admin/paquete')->with('mensaje','Paquete actualizado!');
    }

  
    public function destroy($id)
    {
        $paquete=Paquete::destroy($id);
        return redirect('admin/paquete')->with('mensaje','Categoría eliminada!');
    }
}
