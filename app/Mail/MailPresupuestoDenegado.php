<?php

namespace App\Mail;

use App\Models\Presupuesto;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MailPresupuestoDenegado extends Mailable
{
    use Queueable, SerializesModels;

    public $presupuesto;

    /**
     * Create a new message instance.
     */
    public function __construct(Presupuesto $presupuesto)
    {
        $this->presupuesto = $presupuesto;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Mail Presupuesto Denegado',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.presupuestos.denegado',
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
}
