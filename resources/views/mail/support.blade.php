<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New Support Inquire</title>
</head>
<body>
    <h1>New Support Message from: {{ $user->name }}</h1>

    <h3>Mail: {{ $user->email }}</h3>

    <h3>Message: {{ $msg }}</h3> 
</body>
</html>