<?php

session_start();
require '../config.php/db.php';
require '../model/modelUpdate.php';
require '../middleware/checkRole.php';

checkRole(['admin']);

$modelUpdate = new updateStatusModel($conn);

$action = $_GET['action'] ?? 'index';

/* =====================
   INDEX
===================== */
if ($action ===  'index') {
    $update = $modelUpdate->getALL();
    require '../views/admin/status_pesanan.php';
    exit();
}

