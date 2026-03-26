<?php
if (session_status() === PHP_SESSION_NONE) {
   session_start();
}
function checkRole($allowedRoles = []) {

    // 1. Cek apakah user sudah login
    if (!isset($_SESSION['user_id'])) {
        header("Location: ../views/login.php");
        exit();
    }

    // 2. Cek apakah role user termasuk yang diperbolehkan
    if (!in_array($_SESSION['role'], $allowedRoles)) {
        echo "<h2>Akses Ditolak</h2>";
        echo "<p>Kamu tidak punya izin untuk mengakses halaman ini.</p>";
        exit();
    }
}
