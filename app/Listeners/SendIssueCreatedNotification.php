<?php

namespace App\Listeners;

use App\Events\IssueCreated;
use App\Models\Issue;
use Illuminate\Support\Facades\Log;

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
        // if($this->issues->creator->id == $event->issue->assignedTo->id) {
        //      Mail::to($event->issue->assignedBy->email)->send()

        // } else if($this->issues->creator->id == $event->issue->assignedBy->id){

        // } else if($this->issues->creator->id == $event->issue->raisedBy->id){

        // }
        // $issue = Issue::find( $event->issue->id);

         Log::info("issue",[
            "id" => $event->issue["id"],

         ]);
        // Log::info("data",
        //   [
        //     "data" =>[
        //         "issueTitle" => $issue->title,
        //         "assignBy" => $issue->assigned_by->name,
        //         "assignTo" => $issue->assigned_to->name,
        //         "raisedBy" => $issue->raisedBy->name
        //     ]
        //   ]);

        // Mail::to($event->issue->assignedBy->email)->queue(
        //     new IssueCreatedAssignByEmail(
        //         issueTitle: $issue->title,
        //         assignBy: $issue->assigned_by->name,
        //         assignTo: $issue->assigned_to->name,
        //         raisedBy: $issue->raisedBy->name
        //     )
        // );
    }
}
