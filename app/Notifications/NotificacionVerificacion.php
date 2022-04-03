<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NotificacionVerificacion extends Notification
{
    use Queueable;

    
    public function __construct($respuesta,$user_id)
    {
        $this->respuesta = $respuesta;
        $this->user_id = $user_id;
    }

   
    public function via($notifiable)
    {
        return ['database'];
    }

    
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    public function toArray($notifiable)
    {
        return [
            "titulo"=>"Respuesta a solicitud de verificación de cuenta de Pasion Real",
            "respuesta"=>$this->respuesta,
            "user_id"=>$this->user_id,
            "icon"=>"flaticon-interface-2",
        ];
    }
}
