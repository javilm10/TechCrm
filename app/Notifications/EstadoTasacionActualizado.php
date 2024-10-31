<?php


namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class EstadoTasacionActualizado extends Notification
{
    use Queueable;

    protected $tasacion;

    public function __construct($tasacion)
    {
        $this->tasacion = $tasacion;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new \Illuminate\Notifications\Messages\MailMessage)
            ->line("El estado de su tasación ha cambiado a: {$this->tasacion->estado}.")
            ->action('Ver Tasación', url('/'))
            ->line('Gracias por usar nuestro servicio!');
    }
}
