<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use App\Models\Perfil;
use App\Models\Solicitud;
use App\Models\Orden;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use  Notifiable;
    use HasRoles,SoftDeletes;
    
    public $fillable = [
        'name',
        'edad',
        'apellidos',
        'telefono',
        'email',
        'password',
        'cta_validada',
        'estado_cuenta',
        'estado_comentar'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function perfil(){
        return $this->hasOne(Perfil::class);
    }

    public function solicitudes(){
        return $this->hasMany(Solicitud::class);
    }

    public function anuncios(){
        return $this->hasMany(Anuncio::class);
    }

    public function reportes(){
        return $this->hasMany(Reporte::class);
    }

    public function ordenes(){
        return $this->hasMany(Orden::class);
    }
}
