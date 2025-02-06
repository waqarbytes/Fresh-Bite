<?php
// Database connection settings
$servername = "localhost"; // Typically "localhost"
$username = "root"; // Database username
$password = ""; // Database password (set to empty if using default XAMPP settings)
$dbname = "hostelbite"; // Database name

// Enable detailed error reporting
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    // Create a connection
    $connection = new mysqli($servername, $username, $password, $dbname);
    echo "Connected successfully";
} catch (mysqli_sql_exception $e) {
    die("Connection failed: " . $e->getMessage());
}
?>