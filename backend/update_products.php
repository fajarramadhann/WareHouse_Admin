<?php 
// Helper
require_once('../config/helper.php');

// Catch
$id_products = $_GET['id'];
$name        = $_POST['name'];
$price       = $_POST['price'];
$category    = $_POST['category'];

// Run query update
$runQuery = mysqli_query($link, "UPDATE products SET name = '".$name."',  price = ".$price.",  category = '".$category."' WHERE id = ".$id_products);

// Session message
$_SESSION['updated'] = true;

// Redirect
header('Location: '.BASE_URL.'frontend/dashboard/pages/products_update.php?id='.$id_products);