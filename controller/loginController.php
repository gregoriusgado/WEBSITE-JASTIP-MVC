<?php

 session_start();
 require "../config.php/db.php";
 require "../model/userModel.php";
require_once '../model/orderModel.php';

$userModel = new UserModel($conn);


if(isset($_POST['username']) && isset($_POST['password'])) {
     $user = $userModel->findUser($_POST['username']);

if($user && password_verify($_POST['password'], $user['password'])) {
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['role'] = $user['role'];
    header("Location:dashboardController.php");
    exit();
} else {
    header("Location: ../views/login.php?error=1");
    exit();
}

}

?>