<html>
<head>
    <title>Invite Email</title>
</head>
<body>
    <h1>Welcome, {{ $name }}!</h1>
    <p>We are pleased to invite you to join our platform, {{ config('app.name') }}.</p>
    <p>Your temporary password is: {{ $password }}</p>
    <p>Please use this password to log in and update your profile.</p>
    <a href="http://127.0.0.1:8000/login">login</a>
    <p>Thank you!</p>
</body>
</html>
