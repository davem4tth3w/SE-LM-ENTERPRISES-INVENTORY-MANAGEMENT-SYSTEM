<?php
// search_product.php

include('database_connection.php');

$output = '';
if(isset($_POST['query'])) {
    $search = $_POST['query'];
    $query = "SELECT * FROM product WHERE product_name LIKE '%".$search."%'";
    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();

    if($statement->rowCount() > 0) {
        foreach($result as $row) {
            $output .= '<div class="product-item" data-product-id="'.$row["product_id"].'">'.$row["product_name"].'</div>';
        }
    } else {
        $output .= '<div class="text-muted">No products found</div>';
    }
    echo $output;
}
?>
