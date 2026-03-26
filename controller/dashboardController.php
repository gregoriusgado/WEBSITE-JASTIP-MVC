<?php

session_start();
require '../config.php/db.php';
require '../model/orderModel.php';
require '../middleware/checkRole.php';

checkRole(['admin', 'users']);

$orderModel = new OrderModel($conn);

/* =====================
   DASHBOARD
===================== */

$id_users = $_SESSION['user_id'];

// ambil pesanan milik user
$orders = $orderModel->getPesananAktif($id_users);

// tampilkan view dashboard
require '../views/dashboard.php';
exit();