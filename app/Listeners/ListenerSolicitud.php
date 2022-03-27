<?php

namespace App\Listeners;

use App\Models\User;
use App\Notifications\NotificacionSolicitud;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class ListenerSolicitud
{
  
    public function __construct()
    {
        //
    }

   
    public function handle($event)
    {
        User::role('Admin')
        // ->whereNotIn('id',$event->orden->user_id)
        ->each(function(User $user) use ($event){
            Notification::send($user, new NotificacionSolicitud($event->solicitud));
        });
    }
}
