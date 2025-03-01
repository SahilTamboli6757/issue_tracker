<?php

namespace App\Mail\Issue\Created;

use App\Models\Issue;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class IssueCreatedAssignByEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     * @param string $issueTitle,
     * @param string $assignBy,
     * @param string $assignTo,
     * @param string $raisedBy
     */
    public function __construct(string $issueTitle, string $assignBy, string $assignTo, string $raisedBy)
    {

    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Issue Created Assign By Email',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'Mail.Issue.Created.AssignBy',

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
