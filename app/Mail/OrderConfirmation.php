<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    private $order;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order)
    {
        $this->order = $order;
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
        $subject = 'Order Confirmation';

        return $this->view('mails.confirmOrder')->with('order', $this->order)
            ->from($address, $name)
            ->replyTo($address, $name)
            ->subject($subject);
    }
}
