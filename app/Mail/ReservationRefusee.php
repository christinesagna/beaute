<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Booking;

class ReservationRefusee extends Mailable
{
    use Queueable, SerializesModels;

    public $booking;
    public $raison;

    public function __construct(Booking $booking, $raison = null)
    {
        $this->booking = $booking;
        $this->raison = $raison;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: ' Votre réservation a été refusée',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.reservation-refusee',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}