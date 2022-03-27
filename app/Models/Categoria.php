<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Anuncio;
use App\Models\Image;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categoria extends Model
{
    use SoftDeletes;
 protected  $fillable =[
    'nombre',
    ];

    public function anuncios(){
        return $this->hasMany(Anuncio::class);
    }

    public function image(){
        return $this->morphOne(Image::class, 'imageable');
    }
}
