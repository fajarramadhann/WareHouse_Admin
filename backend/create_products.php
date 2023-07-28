<?php 
// Helper
require_once('../config/helper.php');

// Catch
$code       = $_POST['code'];
$name       = $_POST['name'];
$price      = $_POST['price'];
$category   = $_POST['category'];
$users_by   = $_SESSION['auth']['id'];

// Insert to db
$sql = "INSERT INTO products VALUES (NULL, '$code', '$name', $price, '$category', $users_by, NOW())";

if (mysqli_query($link, $sql)) {
  
  // Session message
  $_SESSION['created'] = true;

  // Redirect
  header('Location: '.BASE_URL.'frontend/dashboard/pages/products.php');
} else {
  // For debugging
  echo "Error: " . $sql . "<br>" . mysqli_error($link);
}