<?php

namespace App\Models;

use App\Events\EventoOrden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Notifications\NotificacionOrden;

class Orden extends Model
{
    public $timestamps = false;
    protected $fillable=[
        "user_id",
        "dni",
        "telefono",
        "nombre_completo",
        "fecha_orden",
        "cantidad_creditos",
        "subtotal"
    ];


    public static function make_order_notification($orden){
       event(new EventoOrden($orden));
    }
    public function user(){
        return $this->belongTo(User::class)->withTrashed();
    }
}
