<?php
// db_config.php

$host = 'your_host'; // e.g., localhost
$username = 'your_username';
$password = 'your_password';
$database = 'erp_system';

// Create a database connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>