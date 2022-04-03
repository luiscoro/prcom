<?php

namespace App\Listeners;

use App\Models\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NotificacionVerificacion;

class ListenerVerificacion
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

   
    public function handle($event)
    {
        $user = User::find($event->user_id);
        
        // ->whereNotIn('id',$event->orden->user_id)
            Notification::send($user, new NotificacionVerificacion($event->respuesta,$event->user_id));
        
    }
}
