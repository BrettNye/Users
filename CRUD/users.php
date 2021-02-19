<?php
    header("Access-Control-Allow-Origin: *");

   session_start();

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

   require_once('./user/user.php');

    $user = new user();
    if(isset($_GET['id'])){
        $user->getUserByID($_GET['id']);
    } else if(isset($_GET['un'])){
        $user->getUserByUsername($_GET['un']);
    } else if(isset($_GET['fn'])){
        $user->getUserByFirstName($_GET['fn']);
    } else if(isset($_GET['ln'])){
        $user->getUserByLastName($_GET['ln']);
    }

    echo json_encode($user);
?>