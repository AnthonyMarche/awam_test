<?php

namespace App\Mail;

use App\Models\CalculationHistory;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Date;

class CalculationsHistory extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(public $calculationsHistory)
    {
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Calculations history of previous day',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'calculations-history-email',
            with: [
                'calculationsHistory' => $this->calculationsHistory,
                'date' => Date::yesterday()->format('d/m/Y')
            ]
        );
    }
}
