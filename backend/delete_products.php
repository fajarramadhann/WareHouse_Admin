<?php 
// Helper
require_once('../config/helper.php');

// Catch
$id_products  = $_GET['id'];

// Insert to db
$sql = "DELETE FROM products WHERE id = ".$id_products;

if (mysqli_query($link, $sql)) {
  
  // Session message
  $_SESSION['deleted'] = true;

  // Redirect
  header('Location: '.BASE_URL.'frontend/dashboard/pages/products.php');
} else {
  // For debugging
  echo "Error: " . $sql . "<br>" . mysqli_error($link);
}