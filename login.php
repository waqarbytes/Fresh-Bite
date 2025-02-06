<?php
session_start();
include('config.php'); // Ensure this file contains the correct database connection info

// Capture POST data
$userType = $_POST['userType'] ?? '';
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';


if (empty($email) || empty($password) || empty($userType)) {
    echo "Please fill in all fields.";
    exit();
}

// // Connect to the database
// $connection = new mysqli('localhost', 'username', 'password', 'hostelbite');

// if ($connection->connect_error) {
//     die("Database connection failed: " . $connection->connect_error);
// }

// Determine the table based on user type
$table = ($userType === 'student') ? 'student' : 'warden';

// Prepare and execute the SQL statement
$sql = "SELECT email, name FROM $table WHERE email = ? AND password = ?";
$stmt = $connection->prepare($sql);
$stmt->bind_param("ss", $email, $password);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    // Login successful, set session variables
    $user = $result->fetch_assoc();
    $_SESSION['user_name'] = $user['name'];
    $_SESSION['login_type'] = $userType;
    
    header("Location: welcome.php");
    exit();
} else {
    echo "Invalid email or password. Please try again.";
}

// Close the database connection and statement
$stmt->close();
$connection->close();
?>
