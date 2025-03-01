<h1>New Issue Assigned to You</h1>

Hello {{ $assignBy }},

You had  assigned a new issue. Here are the details:
QUEUE_CONNECTION
<b> Issue Title</b>: {{ $issueTitle }}

<b>Assigned To</b>: {{ $assignTo }}

<b>Raised By</b>: {{ $raisedBy }}

Please take a moment to review the issue and address it accordingly.

Thank you,<br>
{{ config('app.name') }}




