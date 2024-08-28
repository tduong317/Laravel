<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderMailable extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $order;
    public $customer;
    public function __construct($order , $customer)
    {
        $this -> order = $order;
        $this -> customer = $customer;
    }

    /**
     * Get the message envelope.
     */
    public function build()
    {
        return $this -> view('mails.order');
    }
}
