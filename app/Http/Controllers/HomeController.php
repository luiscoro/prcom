<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Anuncio;
use Twilio\Rest\Client;
use App\Models\Categoria;
use App\Models\Solicitud;
use Illuminate\Http\Request;
use App\Models\UsersPhoneNumber;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\RegistersUsers;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\MensajeResetPassword;
use Carbon\Carbon;
use Nette\Utils\Random;

use Illuminate\Support\Str;
use App\Mail\MensajeRecibido;



class HomeController extends Controller
{

    use RegistersUsers;


    public function index()
    {
        return view('pages.index');
    }


    public function getPrevPasswordReset()
    {
        return view('pages.prevRecuperarContrasenia');
    }

    public function postPrevPasswordReset(Request $request)
    {
        $user = DB::table('users')->where('email', $request['email'])->first();
        // Mail::to($request['email'])->send(new MensajeResetPassword());
        $token = Str::random(40);
        return view('pages.recuperarContrasenia', compact('token'));
    }

    public function postPasswordReset(Request $request)
    {
        // dd($request);
        if ($request['password'] != $request['password_confirmation'])
            return back()->with('mensaje', 'Su contraseña no ha sido confirmada correctamente.');

        $user = DB::table('users')->where('email', $request['email'])->first();
        $user->update([
            "password" => $request['password']
        ]);
        return redirect()->route('login')->with('mensaje', 'Contraseña actualizada');
    }




    public function filtrado(Request $request)
    {
        $titulo = $request->get('titulo');
        $ciudad = $request->get('ciudad');
        $categoria = $request->get('categoria');
        $anuncios = Anuncio::ciudades($ciudad)->categorias($categoria)->titulos($titulo)->paginate(3);
        return view('pages.index', compact('anuncios'));
    }

    public function findByCategoria($id)
    {

        $anunciosByCategoria = Anuncio::where('categoria_id', $id)->get();
        return view('pages.anunciosByCategoria', compact('anunciosByCategoria'));
    }

    public function findAllCategorias()
    {

        // Agrupamos los anuncios por categoria
        $anuncios = Anuncio::select(DB::raw('count(*) as ads_count, categoria_id'))
            ->groupBy('categoria_id')
            ->get();

        $categorias = Categoria::all();
        return view('pages.categorias', compact('categorias', 'anuncios'));
    }

    public function detalleAnuncio($id)
    {
        $anuncio = Anuncio::findOrFail($id);
        $categorias2 = Categoria::all();

        return view('pages.detalleAnuncio', compact('anuncio', 'categorias2'));
    }


    protected function postValidarCuenta(Request $request)
    {
        $campos = [
            'password' => 'required|string|min:8',
            'email' => 'required|unique:users|email|min:8',
            'name' => 'required|min:3'
        ];
        $advertencia = [
            'required' => 'El :attribute es requerido',
            'name.min' => 'El nombre debe tener un mínimo de 3 caracteres',
            'password.min' => 'La contraseña debe tener un mínimo de 8 caracteres',
            'min' => 'El :attribute no debe tener menos de :min caracteres',
            'password.required' => 'La contraseña es requerida',
            'email.required' => 'El correo es necesario',
            'name.required' => 'El nombre es requerido y debe tener mas de 3 caracteres',
        ];

        $this->validate($request, $campos, $advertencia);

        if ($request['password'] != $request['password_confirmation'])
            return back()->with('advertencia', 'Asegurese de confirmar correctamente su contraseña');

        $opValidar = $request['opcionValidar'];
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        //asignamos un rol de cliente al usuario que se registre
        $user->assignRole('Client');
        $user->perfil()->create([
            'telefono' => '',
            'dni' => '',
            'nombre' => 'Edite su datos',
        ]); //creamos el perfil vacio
        Auth::login($user);
        //generamos el codigo random


        if ($opValidar == "No" && $user->hasRole('Client')) {
            return redirect()->route('home.inicio');
        } else {
            if ($opValidar == "Si" && $user->hasRole('Client')) {
                $key = mt_rand(1000000000, 9999999999);
                $email = $user->email;
                //  Mail::to($email)->send(new MensajeRecibido($key));
                return redirect()->route('home.getValidarCuenta');
            } else
                return redirect()->route('admin.dashbhoard');
        }
    }

    public function getValidarCuenta()
    {
        $key = mt_rand(1000000000, 9999999999);
        $user_id = Auth::id();
        $user = User::find($user_id);
        $email = $user->email;
        Mail::to( $email = $user->email)->send(new MensajeRecibido($key));//enviamos el mail al correo del cliente que se registro
      
        session()->put('key', $key);
        return view('pages.validarCuenta');
    }

    public function upload_imageSolicitud($request, $solicitud){
        $file = request()->file('foto');
        $name = time() . '_' . $file->getClientOriginalName();
        $ruta = public_path() . '/imgs/solicitudes';
        $file->move($ruta, $name);
        $urlimage = '/imgs/solicitudes/' . $name;
        $solicitud->image()->create([
            'url' => $urlimage
        ]);
    }

    public function validacionCuenta(Request $request)
    {
        //si decide validar la cuenta, creamos la solicitud para que sea validada por el admin
        $url = "";
        $datosValidacion = request()->except('_token');
      
        if ($request->hasFile('foto')){
            $this->validate($request, [
                'foto' => 'required',
                'foto' => 'image|mimes:png,jpg,jpeg|dimensions:min_width=800,min_height=200,max_width:1800,max_height:600|max:5000',
            ],[
                'foto.required'=>'La foto es requerida',
                'foto.image'=>'El archivo tienen que ser una imagen',
                'foto.mimes'=>'La foto debe ser tipo png, jpg o jpeg',
                'foto.dimensions'=>'La foto no cumple con las dimensiones 800x200 mínimo; 1800x600 máximo',
                'foto.max'=>'La foto supera el peso permitido (5Megabytes)'
            ]);
            
        // $solicitud = Solicitud::create([
        //     'user_id' => Auth::id(),
        //     'codigo_generado' => session('key'),
        //     'codigo_enviado' => $request['codigo_enviado'],
        // ]);
        
       
        //     $this->upload_imageSolicitud($request, $solicitud);
        //  }

        if ($request->hasFile('foto')) {
            $file = $request['foto'];
            $elemento = Cloudinary::upload($file->getRealPath(), ['folder' => 'solicitudes']);
            $public_id = $elemento->getPublicId();
            $url = $elemento->getSecurePath();
        }

        $solicitud = Solicitud::create([
            'user_id' => Auth::id(),
            'codigo_generado' => $request['key'],
            'codigo_enviado' => $request['codigo_enviado'],
        ]);
        $solicitud->image()->create([
            "url" => $url,
            "public_id" => $public_id
        ]);
        Solicitud::make_solicitud_notification($solicitud);
        return redirect()->route('home.inicio')->with('mensaje', 'Solicitud de registro enviada. Por la comodidad y bienestar de nuestros usuarios PassionReal se tomará unos minutos hasta validar sus datos.');
    }
}

    public function cuentaBaneada()
    {
        return view('pages.cuentaBaneada');
    }

    public function preguntasFrecuentes(){
        return view('pages.preguntasFrecuentes');
    }

    public function terminosCondiciones(){
        return view('pages.terminosCondiciones');
    }
}
