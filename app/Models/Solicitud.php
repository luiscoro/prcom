<?php

namespace App\Models;

use App\Events\EventoSolicitud;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Image;

class Solicitud extends Model
{
    protected  $fillable = [
        "user_id",
        "codigo_generado",
        "codigo_enviado",
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
    //===== FUNCION PARA NOTIFICACION A DB Y EMAIL DE VALIDACION DE CUENTA ======//
    public static function make_solicitud_notification($solicitud, $user_id)
    {
        event(new EventoSolicitud($solicitud, $user_id));
    }
}
