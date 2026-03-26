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
            <li><a href="#">Reports</a></li>
        </ul>
    </nav>
    <main>
        <div class="card">
            <h3>User Management</h3>
            <p>Manage users, roles, and permissions.</p>
            <button class="btn">View Users</button>
        </div>
        <div class="card">
            <h3>System Settings</h3>
            <p>Configure system preferences and options.</p>
            <button class="btn">Edit Settings</button>
        </div>
        <div class="card">
            <h3>Reports</h3>
            <p>View analytics and generate reports.</p>
            <button class="btn">Generate Report</button>
        </div>
        <div class="card">
            <h3>Notifications</h3>
            <p>Send alerts and manage notifications.</p>
            <button class="btn">Manage Alerts</button>
        </div>
    </main>
    <footer>
        <p>&copy; 2025 Admin Panel.</p>
    </footer>
 

</body>
</html>
