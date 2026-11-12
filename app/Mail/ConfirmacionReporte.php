<?php

namespace App\Mail;

use App\Models\Reporte;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ConfirmacionReporte extends Mailable
{
    use Queueable, SerializesModels;
    public $reporte;

    /**
     * Create a new message instance.
     */
    public function __construct(Reporte $reporte)
    {
        $this->reporte = $reporte;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Confirmacion de creación de Reporte',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'mail.confirmacion-reporte',
            with: [
                'url' => route('reporte.show', $this->reporte->id),
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
