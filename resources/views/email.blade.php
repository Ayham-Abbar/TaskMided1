{{-- <h1>Hello</h1>
<p>Do You accept receiving an Task</p> --}}

<!DOCTYPE html>
<html>
<head>
    <title>Confirm your subscription</title>
</head>
<body>
    <h1>Confirm your subscription</h1>
    <p>Click the link below to confirm your subscription:</p>
    <a href="{{ url('api/confirm-subscription/' . $user->id) }}">Confirm Subscription</a>
</body>
</html>