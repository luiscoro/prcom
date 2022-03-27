<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class CategoriaController extends Controller
{

    public function index()
    {
        $categorias = Categoria::all();
        return view('admin.categoria.index', compact('categorias'));
    }


    public function create()
    {
        //
        return view('admin.categoria.create');
    }

    // public function store(Request $request)
    // {
        // $campos=[
        //     'nombre'=>'required|string|max:30',
        //     'foto'=>'required|max:100000|mimes:jpeg,png,jpg',
        // ];

        // $mensaje= [
        //     'required'=>'El :attribute es requerido',
        //     'foto.required'=>'La foto es requerida',
        //     'nombre.required'=>'El nombre es requerido',
        // ];

        // $this->validate($request, $campos, $mensaje);
    //     $request = $request->except('_token');
    //     $categoria = Categoria::create([
    //         "nombre" => $request['nombre']
    //     ]);
    //     if (request()->hasFile('foto')) {
    //         $this->upload_image($request, $categoria);
    //     }

    //     return redirect()->route('categoria.index')->with('mensaje', 'Categoría agregada!');
    // }

    // public function upload_image($request, $categoria)
    // {

    //     $file = request()->file('foto');
    //     $name = time() . '_' . $file->getClientOriginalName();
    //     $ruta = public_path() . '/imgs/categoria';
    //     $file->move($ruta, $name);
    //     $urlimage = '/imgs/categoria/' . $name;

    //     $categoria->image()->create([
    //         'url' => $urlimage
    //     ]);
    // }
    public function store(Request $request)
    {
        $campos = [
            'nombre' => 'required|string|max:30',
        ];

        $mensaje = [
            'required' => 'El :attribute es requerido',
            'nombre.required' => 'El nombre es requerido',
            'nombre.max'=> ' El nombre es demasiado extenso'
        ];

        $this->validate($request, $campos, $mensaje);
        $datosCategoria = request()->except('_token');
        if ($request->hasFile('foto')) {
            $url="";
          $file = $request['foto'];
              $elemento= Cloudinary::upload($file->getRealPath(),['folder'=>'categorias']);
              $public_id = $elemento->getPublicId();
              $url = $elemento->getSecurePath();
        }
        
        $categoria = Categoria::create([
            'nombre' => $request['nombre']
        ]);
        $categoria->image()->create([
            "url"=>$url,
            "public_id"=>$public_id
            ]);

        return redirect('admin/categoria')->with('mensaje', 'Categoría agregada!');
    }

    

    public function edit($id)
    {
        //
        $categoria = Categoria::findOrFail($id);
        return view('admin.categoria.edit', compact('categoria'));
    }

    public function update(Request $request, $id)
    {
        $campos = [
            'nombre' => 'required|string|max:30',
        ];
        $mensaje = [
            'required' => 'El :attribute es requerido',
            'nombre.required' => 'El nombre es requerido',
            'nombre.max'=> ' El nombre es demasiado extenso'
        ];
        $this->validate($request, $campos, $mensaje);

        $categoria = Categoria::findOrFail($id);
        $categoria->update([
            "nombre" => $request['nombre']
        ]);
        if ($request->hasFile('foto')) {
            $this->upload_categoria($request, $categoria);
        }
        return redirect()->route('categoria.index')->with('mensaje', 'Categoría actualizada!');
    }

    public function upload_categoria($request, $categoria)
    {
         //produccion
          $url="";
          $file = $request['foto'];
              $elemento= Cloudinary::upload($file->getRealPath(),['folder'=>'categorias']);
              $public_id = $elemento->getPublicId();
              $url = $elemento->getSecurePath();
        if(is_null($categoria->image)){
              $categoria->image()->create([
                  'url'=>$url,
                  'public_id'=>$public_id
                  ]);
        }else{
            $pid = $categoria->image->public_id;
            if(isset($pid)){
                Cloudinary::destroy($pid);//Eliminamos la imagen anterior de cloud
                $categoria->image()->update([
                    'url'=>$url,
                    'public_id'=>$public_id
                    ]);
            }

            $categoria->image()->update([
                'url'=>$url,
                'public_id'=>$public_id
                ]);
             
           
        }
        //local
        // if (!(is_null($categoria->image))) {
        //     $idimg = $categoria->image->id;
        //     $url = $categoria->image->url;
        //     $str = substr($url, 1);//quitamos un caracter a la cadena de ruta para eliminar la img
        //     File::delete($str);//eliminamos la img fisica de nuestro servidor
        //     Image::destroy($idimg);
        // }
        // $file = request()->file('foto');
        // $name = time() . '_' . $file->getClientOriginalName();
        // $ruta = public_path() . '/imgs/categoria';
        // $file->move($ruta, $name);
        // $urlimage = '/imgs/categoria/' . $name;
        // $categoria->image()->create([
        //     'url' => $urlimage
        // ]);
    }



    public function destroy($id)
    {
                //produccion
                $categoria = Categoria::find($id);
                $pid = $categoria->image->public_id;
                if(isset($pid)){
                    Cloudinary::destroy($pid);
                    $idimg = $categoria->image->id;
                         Image::destroy($idimg);
                }
                
                //finproduccion
                // $categoria = Categoria::find($id);
                // $idimg = $categoria->image->id;
                // $url = $categoria->image->url;
                // $str = substr($url, 1);//quitamos un caracter a la cadena de ruta para eliminar la img
                // File::delete($str);//eliminamos la img fisica de nuestro servidor
                // Image::destroy($idimg);

        $categoria = Categoria::destroy($id);
        return redirect('admin/categoria')->with('mensaje', 'Categoría eliminada!');
    }
}
