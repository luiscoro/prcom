<?php

namespace App\Models;

use App\Events\EventoReporte;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reporte extends Model
{
    use HasFactory;
    public $fillable=[
        "motivo",
        "comentario",
        "user_id"
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public static function make_reporte_notification($orden, $anuncio){
        event(new EventoReporte($orden, $anuncio));
     }
}
