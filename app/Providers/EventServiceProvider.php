<?php

namespace App\Providers;

use App\Events\EventoOrden;
use App\Events\EventoReporte;
use App\Events\EventoSolicitud;
use App\Events\EventoVerificacion;
use App\Listeners\ListenerOrden;
use App\Listeners\ListenerReporte;
use App\Listeners\ListenerSolicitud;
use App\Listeners\ListenerVerificacion;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        EventoOrden::class => [
            ListenerOrden::class,
        ],
        EventoReporte::class => [
            ListenerReporte::class,
        ],
        EventoSolicitud::class => [
            ListenerSolicitud::class,
        ],
        EventoVerificacion::class => [
            ListenerVerificacion::class,
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
