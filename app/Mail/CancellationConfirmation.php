<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CancellationConfirmation extends Mailable
{
    use Queueable, SerializesModels;
    public $appointments;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($appointments)
    {
        $this->appointment = $appointments;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('cancellation_confirmation')
                    ->subject('Appointment Cancellation Confirmation');
    }
}
