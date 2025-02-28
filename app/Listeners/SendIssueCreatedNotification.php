<?php

namespace App\Listeners;

use App\Events\IssueCreated;
use App\Mail\SendIssueCreatedEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
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
        $email = "test@user.com";

       $id =  Mail::to($email)->send(new SendIssueCreatedEmail())->getMessageId();

       Log::info("message id",[
            "email" => $id
       ]);
    }
}
