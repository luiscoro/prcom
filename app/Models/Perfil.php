<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Image;

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
}
