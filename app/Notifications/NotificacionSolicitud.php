<?php

namespace App\Notifications;

use App\Models\Solicitud;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NotificacionSolicitud extends Notification
{
    use Queueable;

    
    public function __construct(Solicitud $solicitud)
    {
        //
        $this->solicitud = $solicitud;
    }

   
    public function via($notifiable)
    {
        return ['database'];
    }

    
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('El cliente desea verificar su cuenta.')
                    ->action('Ver solicitud', url('/'));
                   
    }

    
    public function toArray($notifiable)
    {
        $user = User::find($this->solicitud->user_id);
        return [
            "titulo"=>"Solicitud de validación de cuenta",
            "user_id"=>$this->solicitud->user_id,
            "nombre"=>$user->name,
            "icon"=>"fa-user-shield",
        ];
    }
}
