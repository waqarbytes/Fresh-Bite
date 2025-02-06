<?php
session_start(); // Start the session to retrieve messages
if (isset($_SESSION['message'])) {
    echo $_SESSION['message'];
    unset($_SESSION['message']); // Clear the message after displaying
}
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        .success {
            color: green;
            background-color: #e7f7e7;
            padding: 10px;
            border: 1px solid green;
            margin-top: 10px;
        }
        .error {
            color: red;
            background-color: #f7e7e7;
            padding: 10px;
            border: 1px solid red;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <!-- Your signup form here -->
</body>
</html>
