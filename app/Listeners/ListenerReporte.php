<?php

namespace App\Listeners;

use App\Models\User;
use App\Notifications\NotificacionReporte;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class ListenerReporte
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        //
      
        User::role('Admin')
        // ->whereNotIn('id',$event->orden->user_id)
        ->each(function(User $user) use ($event){
            Notification::send($user, new NotificacionReporte($event->reporte, $event->anuncio));
        });
    }
}
