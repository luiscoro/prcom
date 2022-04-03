<?php

namespace App\Models;

use App\Models\Image;
use App\Models\Galeria;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Perfil extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'telefono',
        'dni',
        'creditos'
    ];

    public function image(){
        return $this->morphOne(Image::class, 'imageable');
    }

    public function images(){
        return $this->morphMany(Galeria::class, 'galeriable');
    }

}
