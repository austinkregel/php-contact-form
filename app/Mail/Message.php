<?php

namespace App\Mail;

use App\Message as Model;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Message extends Mailable
{
    use Queueable, SerializesModels;

    public $message;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Model $message)
    {
        $this->message = $message;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->message->email)
            ->markdown('mail.message')
            ->with([
                'message' => $this->message
            ]);
    }
}
