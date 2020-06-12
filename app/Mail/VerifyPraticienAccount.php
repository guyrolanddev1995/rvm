<?php

namespace App\Mail;

use App\Praticien;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerifyPraticienAccount extends Mailable
{
    use Queueable, SerializesModels;

    public $praticien;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Praticien $praticien)
    {
        $this->praticien = $praticien;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('rolanddev1995@gmail.com')
                    ->view('emails.verifyPraticienAccout');
    }
}
