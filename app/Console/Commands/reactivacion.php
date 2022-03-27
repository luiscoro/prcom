<?php

namespace App\Console\Commands;

// use Illuminate\Console\Command;
// use Illuminate\Support\Facades\Storage;

use App\Models\Anuncio;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class reactivacion extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:reactivacion';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Paquete::create();
        //    $Hora = Carbon::now();
        // if(!($Hora->toTimeString()>'23:59:59' && $Hora->toTimeString()<'09:00:00')){
        $anuncios = Anuncio::orderBy('updated_at', 'desc');
        foreach ($anuncios as $anuncio) {
            $now = Carbon::now()->format('Y-m-d H:i:s');
            $user = User::find($anuncio->user_id);
            Storage::apppend('usuarios.txt',$user);
            // $timepaquete = $anuncio->paquete->periodo_horas;
            $time =  date('Y-m-d H:i:s');
                 if(date('Y-m-d') == "2022-01-05")
            {
              dd("holaaaas");
            }
           
        }
        //  }//fin if horas
    }
}
