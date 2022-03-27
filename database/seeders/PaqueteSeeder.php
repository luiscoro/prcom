<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Paquete;

class PaqueteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Paquete::create([ "periodo_horas"=>1]);
        Paquete::create([ "periodo_horas"=>2]);
        Paquete::create([ "periodo_horas"=>3]);
        Paquete::create([ "periodo_horas"=>6]);
        Paquete::create([ "periodo_horas"=>12]);
        Paquete::create([ "periodo_horas"=>24]);
    }
}
