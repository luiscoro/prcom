<?php

namespace App\Providers;

use App\Models\Anuncio;
use App\Models\Categoria;
use App\Models\Paquete;
use App\Models\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
Use Illuminate\Pagination\Paginator;
use App\Console\Commands\ReactivacionAnuncios;
use App\Models\Orden;
use App\Models\Reporte;
use App\Models\Solicitud;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AppServiceProvider extends ServiceProvider
{
  
    public function register()
    {
        //
    }

    public static function boot()
    {
        Schema::defaultStringLength(191);
        Paginator::useBootstrap();
        $categorias = Categoria::all();
        $paquetes = Paquete::all();
        $users = User::all();
        $count_users = count($users);
        $anuncios = Anuncio::where('estado','=','activado')->orderBy('updated_at','asc')->paginate(5);
     
                view()->share([
                'categorias'=>$categorias,
                'paquetes'=>$paquetes,
                'anuncios'=>$anuncios,
                'count_users'=>$count_users
                ]);
    }
}
