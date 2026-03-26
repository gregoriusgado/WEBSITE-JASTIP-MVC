<?php

require "../config.php/db.php";
require "../model/userModel.php";

$userModel = new UserModel($conn);


if(isset($_POST['username']) && isset($_POST['password'])) {
    
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = "users";
    

    if ($userModel->register($username,$password,$role)) {
        header("Location:../views/login.php?succes=1");
    } else {
        echo "gagal mendaftar";
    }
}

?>