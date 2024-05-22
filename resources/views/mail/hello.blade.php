<!DOCTYPE html>
<html>
<head>
    <title>Welcome Email</title>
</head>
<body>
    <h2>Hello, this is CertiTech!</h2>
    <p>Thank you for joining us.</p>
    <p>Here are your account details:</p>
    
    <ul>
        <li><strong>Full Name:</strong> {{ $name }}</li>
        <li><strong>Email:</strong> {{ $email }}</li>
        <li><strong>Password:</strong> {{ $password }}</li>
    </ul>
    
    <p>We look forward to working with you!</p>
</body>
</html>
