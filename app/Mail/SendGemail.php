<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Attachment;

class SendGemail extends Mailable
{
    use Queueable, SerializesModels;
    public $mailData;

    /**
     * Create a new message instance.
     */
    public function __construct($mailData)
    {
        $this->mailData = $mailData;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            // subject: 'Test Email',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: '',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    // public function attachments(): array
    // {
    //     return [];
    // }
    
    public function build()
    {
        if($this->mailData['emailTemplate']!=''){
            $emailcc = (isset($this->mailData['mail_cc'])&&$this->mailData['mail_cc']!='')?explode(',', $this->mailData['mail_cc']):'';
            // $attachment = (isset($this->mailData['attachment'])&&$this->mailData['attachment']!='')?url($this->mailData['attachment']):'';

            return $this->markdown($this->mailData['emailTemplate'])
            ->subject($this->mailData['subject'])
            ->cc($emailcc)
            // ->attach($attachment)
            ->with('mailData', $this->mailData);
        } else {
            return response()->json( array('success'=>'notsend'), 200 );
        }
    }
}
