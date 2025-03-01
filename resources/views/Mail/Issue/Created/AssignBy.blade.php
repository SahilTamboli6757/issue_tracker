<h1>New Issue Assigned to You</h1>

Hello {{ $assignBy }},<br>

<p>
You had  assigned a new issue.
 <br>
 Here are the details: <br>

<b> Issue Title</b>: {{ $issueTitle }} <br>

<b>Assigned To</b>: {{ $assignTo }}<br>

<b>Raised By</b>: {{ $raisedBy }}<br>

Please take a moment to review the issue and address it accordingly.<br>

<br>
Thank you,<br>
{{ config('app.name') }}
</p>




