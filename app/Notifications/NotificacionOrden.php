<?php

namespace App\Notifications;

use App\Models\Orden;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NotificacionOrden extends Notification
{
    // public $orden;
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Orden $orden)
    {
        $this->orden = $orden;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('Nueva compra')
                    ->line($this->orden->nombre_completo.' ha realizado una compra de '.$this->orden->cantidad.' créditos por '.$this->orden->subtotal.' EUROS', url('/'))
                    ->action('Ver detalle de la compra',url('/datos-cliente/'.$this->orden->id));
              
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            "user_id"=>$this->orden->user_id,
            "id"=>$this->orden->id,
            "cantidad_creditos"=>$this->orden->cantidad,
            "nombre_completo"=>$this->orden->nombre_completo,
            "fecha_orden"=>$this->orden->fecha_orden,
            "subtotal"=>$this->orden->subtotal,
            "icon"=>"fa-shopping-cart",
            "titulo"=>"Nuevo pedido"
        ];
    }
}
