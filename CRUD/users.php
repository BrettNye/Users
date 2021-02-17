<?php
    header("Access-Control-Allow-Origin: *");

   session_start();

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

   require_once('./user/user.php');

    $user = new user();
    $user->getUser(2);

    echo json_encode($user);
?>