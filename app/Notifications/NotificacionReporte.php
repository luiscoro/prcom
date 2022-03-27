<?php

namespace App\Notifications;

use App\Models\Anuncio;
use App\Models\Reporte;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NotificacionReporte extends Notification
{
    use Queueable;

    
    public function __construct(Reporte $reporte, Anuncio $anuncio)
    {
        //
        $this->reporte = $reporte;
        $this->anuncio = $anuncio;
    }

   
    public function via($notifiable)
    {
        return ['database'];
    }

    
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('Reporte de anuncio')
                    ->line('El anuncio '.$this->anuncio->id.': '.$this->anuncio->titulo. 'ha sido reportado por un usuario.')
                    ->line('Motivo: '.$this->reporte->motivo)
                    ->line('Comentario: '.$this->reporte->comentario)
                    ->action('Ver anuncio', url('/detalle/'.$this->anuncio->id));              
    }

    
    public function toArray($notifiable)
    {
        return [
            "id"=>$this->reporte->id,
            "motivo"=>$this->reporte->motivo,
            "comentario"=>$this->reporte->comentario,
            "user_id"=>$this->reporte->user_id,
            "anuncio_id"=>$this->anuncio->id,
            "titulo"=>$this->anuncio->titulo,
            "icon"=>"fa-exclamation-circle",
        ];
    }
}
