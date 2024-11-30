<?php

namespace App\Mail;

use App\Models\CareerTestResult;
use App\Models\Student;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class TestResultMagicLinkMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $student;
    public $testResult;
    public $magicLinkToken;

    public function __construct(Student $student, CareerTestResult $testResult, $magicLinkToken)
    {
        $this->student = $student;
        $this->testResult = $testResult;
        $this->magicLinkToken = $magicLinkToken;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'स्कूल में कैरियर एप्टीट्यूड टेस्ट में भाग लेने के लिए धन्यवाद! ' . $this->student->name . ' अपनी रिपोर्ट चेक करें |',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'Admin.students.test-result-mail',
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
