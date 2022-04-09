<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Image;

class Publicidad extends Model
{
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
