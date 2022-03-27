<?php

namespace App\Listeners;

use App\Models\User;
use App\Notifications\NotificacionOrden;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class ListenerOrden
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
    public function handle($event)//recibe el evento
    {
        User::role('Admin')
        // ->whereNotIn('id',$event->orden->user_id)
        ->each(function(User $user) use ($event){
            Notification::send($user, new NotificacionOrden($event->orden));
        });
    }
}
