<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class EventoSolicitud
{
    public $solicitud, $user_id;
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($solicitud, $user_id)
    {
        //
        $this->solicitud = $solicitud;
        $this->user_id = $user_id;
    }


    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
