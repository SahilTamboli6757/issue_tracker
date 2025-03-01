<?php

namespace App\Listeners;

use App\Events\IssueCreated;
use App\Mail\Issue\Created\IssueCreatedAssignByEmail;
use App\Models\Issue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendIssueCreatedNotification
{

    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(IssueCreated $event): void
    {

        $issue = Issue::find($event->issue->id);

        // if($this->issues->creator->id == $event->issue->assignedTo->id) {
        //      Mail::to($event->issue->assignedBy->email)->send()

        // } else if($this->issues->creator->id == $event->issue->assignedBy->id){

        // } else if($this->issues->creator->id == $event->issue->raisedBy->id){

        // }

        Mail::to($event->issue->assignedBy->email)->queue(
            new IssueCreatedAssignByEmail(
                issueTitle: $issue->title,
                assignBy: $issue->assignedBy->name,
                assignTo: $issue->assignedTo->name,
                raisedBy: $issue->raisedBy->name
            )
        );
    }
}
