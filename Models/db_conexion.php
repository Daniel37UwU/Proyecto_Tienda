<?php
// Database connection parameters
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'store_tilinois_db';

// Create a connection
$conn = new mysqli($host, $user, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Optionally set the character set
$conn->set_charset("utf8");

// Close the connection when the script ends
register_shutdown_function(function() use ($conn) {
    $conn->close();
});
?>

