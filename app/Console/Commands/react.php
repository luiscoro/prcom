<?php

namespace App\Console\Commands;

use App\Models\Anuncio;
use App\Models\User;
use App\Providers\AppServiceProvider;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class react extends Command
{
    protected $signature = 'command:react';

    protected $description = 'Comando para la reactivacion de los anuncios de Pasion Real';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {   
        
        $today = new Carbon('today');
        $today = $today->addHours(24);

        $tomorrow9 = new Carbon('tomorrow');
        $tomorrow9 = $tomorrow9->addHours(9);
     
        if( date('Y-m-d H:i:s')>$today && date('Y-m-d H:i:s')<$tomorrow9){

        $anuncios = Anuncio::where('estado','=','activado')->orderBy('reactivacion','asc')->get();
      foreach($anuncios as $anuncio){
        $user = User::find($anuncio->user_id);
        if(date('Y-m-d H:i:s') >= $anuncio->reactivacion && $anuncio->estado == 'activado' 
        && $user->perfil->creditos -1 != -1 ){
            sleep(1);
            $timereact = $anuncio->paquete->periodo_horas;
            $anuncio->update([
                "reactivacion" => Carbon::now()->addHours($timereact)
            ]);
          
            $creditosPerfil = $user->perfil->creditos;
            $user->perfil->update([
                "creditos"=>$creditosPerfil-1,
            ]);
            // Storage::append('file.txt','b');
        }// fin if de condiciones para reactivar anuncio
      }
    }//fin if de rango de horario
    }
}
