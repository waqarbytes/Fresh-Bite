<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'config.php';
session_start(); // Start the session to store messages

try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $type = $_POST['type'];
        $email = $_POST['email'];
        $name = $_POST['name'];
        $address = $_POST['address'];
        $mobile = $_POST['mobile'];
        $adhaar = $_POST['aadhar'];
        $password = $_POST['password'];

        if (empty($type) || empty($email) || empty($name) || empty($address) || empty($mobile) || empty($adhaar) || empty($password)) {
            throw new Exception("All fields are required.");
        }

        $table = ($type === 'student') ? 'student' : 'warden';

        $sql = "INSERT INTO $table (email, name, address, mobile, aadhar, password) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("sssiis", $email, $name, $address, $mobile, $adhaar, $password);

        $stmt->execute();

        $_SESSION['message'] = "Your account has been created successfully!";
        header("Location: success.php");
        exit();
    } else {
        header("Location: form.php");
        exit();
    }
} catch (mysqli_sql_exception $e) {
    if ($e->getCode() === 1062) {
        $_SESSION['message'] = "An account with this email or Aadhaar number already exists. Please try again.";
    } else {
        $_SESSION['message'] = "Error: " . $e->getMessage();
    }
    header("Location: error.php");
    exit();
} catch (Exception $e) {
    $_SESSION['message'] = "Error: " . $e->getMessage();
    header("Location: error.php");
    exit();
} finally {
    if (isset($stmt)) {
        $stmt->close();
    }
    if (isset($connection)) {
        $connection->close();
    }
}
?>
