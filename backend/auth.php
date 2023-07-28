<?php
// Helper 
require_once('../config/helper.php');

session_start();

// Debug
// parr($_REQUEST);

// Check is exist already session
if (empty($_SESSION) === false) {
    // logout action
    session_destroy();
    header('location: ' . BASE_URL . 'frontend/login.php');
} else {
    // login action

    // catch data form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // checkusername on db
    $runQuery = mysqli_query($link, "SELECT * FROM users WHERE username = '" . $username . "'");

    if (mysqli_num_rows($runQuery) === 1) {
        $dataUser = mysqli_fetch_assoc($runQuery);

        // process validation
        if (password_verify($password, $dataUser['password'])) {

            // remove field password
            unset($dataUser['password']);

        // go to dashboard
        $_SESSION['auth'] = $dataUser;
        $_SESSION['username'] = $username; // simpan nama user ke session
        header('location: ' . BASE_URL . 'frontend/dashboard/pages/index.php');

        } else {
            // password not correct
            $_SESSION['auth'] = false;
            header('location: ' . BASE_URL . 'frontend/login.php');
        }
    } else {
        // account is not yet register
        $_SESSION['auth'] = 'noregist';
        header('location: ' . BASE_URL . 'frontend/login.php');
    }
}

