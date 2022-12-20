<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Renewal Email</title>
</head>
<body>
    <h1>Renewal Email</h1>
    <p>Dear {{ $application->full_name }},</p>
    <p>Your subscription will expire on {{ $application->renewal_date }}.</p>
    <p>Please renew your subscription to continue using our services.</p>
    <p>Thank you.</p>
</body>
</html>