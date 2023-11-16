<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class sendUserRegister extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct($user,$message,$contentHTML,$link)
    {
        $this->user = $user;
        $this->message = $message;
        $this->contentHTML = $contentHTML;
        $this->optionLink = [
            'RESET' => 'registerUser.reset',
            'CONFIRM' => 'registerUser.confirm'
        ];
        $this->link = $this->optionLink[$link];
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->message,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view:  $this->view,
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }

    public function build()
    {
        return $this->subject($this->message)->view('registerUser.correo')->with(['token' => $this->user->remember_token,'name' => $this->user->name,'content' => $this->contentHTML,'link'=> $this->link ]);
    }
}
