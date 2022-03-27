<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class EventoReporte
{
    public $reporte,$anuncio;
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($reporte, $anuncio)
    {
        //
        $this->reporte = $reporte;
        $this->anuncio = $anuncio;

    }

   
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
