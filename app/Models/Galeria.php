<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeria extends Model
{
    use HasFactory;

    protected $fillable =[
        "url",
        "public_id"
    ];

    public function galeriable(){
        return $this->morphTo();
    }

}
