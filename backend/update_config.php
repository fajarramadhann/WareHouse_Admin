<?php
// helper
require_once('../config/helper.php');

// Catch
$name_apps   = $_POST['name'];
$description = $_POST['description'];
$version     = $_POST['version'];


// run query upodate
$runQuery = mysqli_query($link, "UPDATE config_app SET name = '".$name_apps."', description = '".$description."', version = '".$version."'");

// Session message
$_SESSION['updated'] = true;

// Redirect
header('Location: '.BASE_URL.'frontend/dashboard/pages/config_app.php');
