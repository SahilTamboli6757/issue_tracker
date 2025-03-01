<h1>New Issue Assigned to You</h1>

Hello {{ $user->name }},

You have been raised a new issue. Here are the details:

<b> Issue Title</b>: {{ $issue->title }}

<b>Assigned To</b>: {{ $raisedBy->name }}

<b>Assigned By</b>: {{ $raisedBy->name }}

Please take a moment to review the issue and address it accordingly.

Thank you,<br>
{{ config('app.name') }}
