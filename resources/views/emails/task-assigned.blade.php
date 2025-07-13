<!DOCTYPE html>
<html>

<head>
    <title>New Task Assigned</title>
</head>

<body>
    <h1>Hello {{ $task->user->name }}</h1>

    <p>You have been assigned a new task:</p>

    <ul>
        <li><strong>Title:</strong> {{ $task->title }}</li>
        <li><strong>Description:</strong> {{ $task->description }}</li>
        <li><strong>Deadline:</strong> {{ \Carbon\Carbon::parse($task->deadline)->toFormattedDateString() }}</li>
    </ul>

    <p>Please log into your dashboard to view more details.</p>
</body>

</html>
