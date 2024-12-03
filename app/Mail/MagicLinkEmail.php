<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MagicLinkEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $magicLink;

    public function __construct($magicLink)
    {
        $this->magicLink = $magicLink;
    }

    public function build()
    {
        return $this->subject('CBC Aptitude Test Result')
            ->view('emails.magic_link')
            ->with([
                'magicLink' => $this->magicLink,
            ]);
    }
}
