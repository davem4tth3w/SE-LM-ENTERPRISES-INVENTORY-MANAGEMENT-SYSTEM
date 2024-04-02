<?php
// db_config.php

$host = 'your_host'; // e.g., localhost
$ID= 'id';
$category= 'category';
$brand= 'brand';
$quantity= 'quantity';
$return_products= 'return_products';
$status= 'status';
$database = 'return_list';

// Create a database connection
$conn = new mysqli($, $id, $category, $brand, $quantity, $return_products, &status, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
