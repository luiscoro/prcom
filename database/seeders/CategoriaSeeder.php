<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $c1 = Categoria::create(["nombre"=>"Hombres"]);
        $c1->image()->create(["url"=>"/images/generos/masculino.png"]);
        $c2 = Categoria::create(["nombre"=>"Mujeres"]);
        $c2->image()->create(["url"=>"/images/generos/femenino.png"]);
        $c3 = Categoria::create(["nombre"=>"Gays"]);
        $c3->image()->create(["url"=>"/images/generos/gay.png"]);
        $c4 = Categoria::create(["nombre"=>"Lesbianas"]);
        $c4->image()->create(["url"=>"/images/generos/lesbiana.png"]);
    }
}
