<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use App\Models\cita;
use Illuminate\Queue\SerializesModels;

class ConfirmacionCita extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $cita;
    public $token;
    public $paciente;
    public function __construct(cita $cita, string $paciente, string $token)
    {
        $this->cita = $cita;
        $this->token = $token;
        $this->paciente = $paciente;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {


        return $this->subject('Confirmacion de Cita Odontologica')
            ->view('emails.confirmacion');
    }
}
