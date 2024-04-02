<?php
// sell_return_list.php

include 'db_config.php'; // Include the database connection

// Fetch sell return items
$sql = "SELECT * FROM sell_return_items";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>ID</th><th>Category</th><th>Brand</th><th>Quantity</th><th>Return Products</th><th>Status</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['category']}</td>";
        echo "<td>{$row['brand']}</td>";
        echo "<td>{$row['quantity']}</td>";
        echo "<td>{$row['return_products']}</td>";
        echo "<td>{$row['status']}</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No sell return items found.";
}

$conn->close();
?>