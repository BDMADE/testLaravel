<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PaymentConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    private $amount;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($amount)
    {
        $this->amount = $amount;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $address = config('app.contact_email');
        $name = config('app.name');
        $subject = 'Payment Confirmation';

        return $this->view('mails.confirmPayment')->with('amount', $this->amount)
            ->from($address, $name)
            ->replyTo($address, $name)
            ->subject($subject);
    }
}
