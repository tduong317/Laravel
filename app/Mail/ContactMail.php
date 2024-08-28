<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $contact_name;
    public $contact_message;
    public $mail;
    public function __construct($name , $message , $gmail)
    {
        $this->contact_name = $name;
        $this->contact_message = $message;
        $this -> mail = $gmail;
    }
    public function build()
    {
        return $this->view('mails.contact');
    }
}
