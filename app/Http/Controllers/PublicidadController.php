<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Publicidad;
use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class PublicidadController extends Controller
{

    public function index()
    {
        $publicidades = Publicidad::all();
        return view('admin.publicidad.index', compact('publicidades'));
    }


    public function create()
    {
        //
        return view('admin.publicidad.create');
    }

    public function store(Request $request)
    {
        $datosPublicidad = request()->except('_token');
        if ($request->hasFile('foto')) {
            $this->validate($request, [
                'foto' => 'required',
                'foto' => 'image|mimes:png,jpg,jpeg|dimensions:min_width=60,min_height=200,max_width:160,max_height:600|max:5000',
            ], [
                'foto.required' => 'La foto es requerida',
                'foto.image' => 'El archivo tienen que ser una imagen',
                'foto.mimes' => 'La foto debe ser tipo png, jpg o jpeg',
                'foto.dimensions' => 'La foto no cumple con las dimensiones 800x200 mínimo; 1800x600 máximo',
                'foto.max' => 'La foto supera el peso permitido (5Megabytes)'
            ]);

            if ($request->hasFile('foto')) {
                $url = "";
                $file = $request['foto'];
                $elemento = Cloudinary::upload($file->getRealPath(), ['folder' => 'publicidades']);
                $public_id = $elemento->getPublicId();
                $url = $elemento->getSecurePath();
            }

            $publicidad = Publicidad::create();
            $publicidad->image()->create([
                "url" => $url,
                "public_id" => $public_id
            ]);

            return redirect('admin/publicidad')->with('mensaje', 'Publicidad agregada!');
        }
    }



    public function edit($id)
    {
        //
        $publicidad = Publicidad::findOrFail($id);
        return view('admin.publicidad.edit', compact('publicidad'));
    }

    public function update(Request $request, $id)
    {

        $publicidad = Publicidad::findOrFail($id);
        $publicidad->update();
        if ($request->hasFile('foto')) {
            $this->upload_categoria($request, $publicidad);
        }
        return redirect()->route('publicidad.index')->with('mensaje', 'Publicidad actualizada!');
    }

    public function upload_categoria($request, $publicidad)
    {
        //produccion
        $url = "";
        $file = $request['foto'];
        $elemento = Cloudinary::upload($file->getRealPath(), ['folder' => 'publicidades']);
        $public_id = $elemento->getPublicId();
        $url = $elemento->getSecurePath();
        if (is_null($publicidad->image)) {
            $publicidad->image()->create([
                'url' => $url,
                'public_id' => $public_id
            ]);
        } else {
            $pid = $publicidad->image->public_id;
            if (isset($pid)) {
                Cloudinary::destroy($pid); //Eliminamos la imagen anterior de cloud
                $publicidad->image()->update([
                    'url' => $url,
                    'public_id' => $public_id
                ]);
            }

            $publicidad->image()->update([
                'url' => $url,
                'public_id' => $public_id
            ]);
        }
    }



    public function destroy($id)
    {
        //produccion
        $publicidad = Publicidad::find($id);
        $pid = $publicidad->image->public_id;
        if (isset($pid)) {
            Cloudinary::destroy($pid);
            $idimg = $publicidad->image->id;
            Image::destroy($idimg);
        }

        $publicidad = Publicidad::destroy($id);
        return redirect('admin/publicidad')->with('mensaje', 'Publicidad eliminada!');
    }
}
