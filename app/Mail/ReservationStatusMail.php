<?php

namespace App\Mail;

use App\Models\Reservation;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ReservationStatusMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @param  string  $type  received|confirmed|rejected|cancelled|new_booking_admin
     */
    public function __construct(
        public Reservation $reservation,
        public string $type = 'received',
    ) {}

    public function envelope(): Envelope
    {
        $subjects = [
            'received' => 'We\'ve received your reservation — Jumma Gujjar Nihari',
            'confirmed' => 'Your table is confirmed! — Jumma Gujjar Nihari',
            'rejected' => 'Update on your reservation — Jumma Gujjar Nihari',
            'cancelled' => 'Your reservation was cancelled — Jumma Gujjar Nihari',
            'new_booking_admin' => 'New reservation received — ' . $this->reservation->booking_ref,
        ];

        return new Envelope(
            subject: $subjects[$this->type] ?? 'Reservation Update — Jumma Gujjar Nihari',
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.reservation-status',
        );
    }
}
