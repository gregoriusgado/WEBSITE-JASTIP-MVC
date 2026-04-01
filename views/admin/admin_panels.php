<?php
require '../../middleware/checkRole.php';
checkRole(['admin']); // hanya admin boleh
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../../css/admin_panels.css">
    <style>
    </style>
</head>
<body>
    <header>
        <h1>Admin Dashboard</h1>
    </header>
    <nav>
        <ul>
            <li><a href="admin_product_form.php">Form Product</a></li>
            <li><a href="../../controller/productController.php?action=index">List Barang</a></li>
            <li><a href="../dashboard.php">Dashboard Utama</a></li>
            <li><a href="../../controller/updateStatusController.php?action=index">Update Status</a></li>
        </ul>
    </nav>
    <main>
       
    <footer>
        <!-- <p>&copy; 2025 Admin Panel.</p> -->
    </footer>
 

</body>
</html>
