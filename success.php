<?php
session_start();
$message = isset($_SESSION['message']) ? $_SESSION['message'] : "Account created successfully!";
unset($_SESSION['message']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success</title>
    <style>
        /* Centered dialog styling */
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
        }
        .dialog-box {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            padding: 30px;
            text-align: center;
            max-width: 400px;
        }
        .dialog-box h1 {
            font-size: 24px;
            margin: 0 0 15px;
            color: #4CAF50;
        }
        .dialog-box p {
            font-size: 16px;
            margin: 0 0 20px;
        }
    </style>
</head>
<body>
    <div class="dialog-box">
        <h1>Success</h1>
        <p><?php echo htmlspecialchars($message); ?></p>
        <p>You will be redirected to the login page shortly.</p>
    </div>
    <script>
        // Redirect to login.html after 5 seconds
        setTimeout(function() {
            window.location.href = "login.html";
        }, 5000);
    </script>
</body>
</html>
