<?php

session_start();
require '../config.php/db.php';
require '../model/modelUpdate.php';
require '../middleware/checkRole.php';

checkRole(['admin']);

$modelUpdate = new updateStatusModel($conn);

$action = $_GET['action'] ?? 'index';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $status = $_POST['status'];

    $modelUpdate->update($id, $status);

    // balik ke halaman sebelumnya
    header("Location: updateStatusController.php?action=index");
    exit;
}

/* =====================
   INDEX
===================== */
if ($action ===  'index') {
    $update = $modelUpdate->getALL();
    require '../views/admin/status_pesanan.php';
    exit();
}
