<?php
if (!isset($orders)) {
    header("Location: ../controller/dashboardController.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../css/dashboard.css">
</head>

<body>

    <!-- validasi admin -->
    <?php if ($_SESSION['role'] == 'admin'): ?>
        <div class="admin-box">
            <h1>Hai Admin</h1>
            <p class="role">Role kamu: <b><?php echo $_SESSION['role']; ?></b></p>
            <a href="../views/admin/admin_panels.php">Masuk Panel Admin</a><br>
        </div>
    <?php endif; ?>

    <!-- .....app....-->
    <div class="app">
        <!-- ...sibar -->
        <aside class="sidebar">
            <div class="logo">
                <h2>Paket<span>Kamu</span></h2>
            </div>
            <nav class="menu"> -
                <a class="active">Dashboard</a>
                <a href="../controller/orderController.php?action=create">Form Pemesanan</a>
                <a href="../controller/orderController.php?action=index">Riwayat</a>
                <a href="">Kontak Wilayah</a>
                <a href="">Tentang Kami</a>
                <a href="../logout.php">Logout</a>
            </nav>
        </aside>



        <!-- Progress Bar -->
        <div class="progress-container">

            <!-- tracker header -->
            <div class="tracker-header">
                <h2>Pesanan <span>Anda</span></h2>
                <div class="progress-info">
                    no-pesanan jastip : <b>xxxxxxxx</b>
                </div>
            </div>

            <div class="garis-tracker">

                <div class="step completed">
                    <div class="circle"></div>
                    <p>Paket Diproses</p>
                    <img src="../css/orders.png" alt="">
                </div>

                <div class="step completed">
                    <div class="circle"></div>
                    <p>Paket Menuju Gudang</p>
                    <img src="../css/truck.png" alt="" class="truck">
                </div>

                <div class="step completed">
                    <div class="circle"></div>
                    <p>Paket Sudah Sampai Gudang</p>
                    <img src="../css/gudang.png" alt="">
                </div>

                <div class="step">
                    <div class="circle"></div>
                    <p>Ambil Paketmu</p>
                    <img src="../css/pickup.png" alt="">
                </div>

                <div class="step">
                    <div class="circle"></div>
                    <p>Selesai</p>
                    <img src="../css/selesai.png" alt="">
                </div>
            </div>
            <div class="order-list">


                <h3>Pesanan Aktif</h3>

                <?php foreach ($orders as $order): ?>

                    <div class="order-item active">
                        <div class="order-info">
                            <strong><?= htmlspecialchars($order['nama_paket']) ?></strong>
                            <span><?= htmlspecialchars($order['nama_kategori']) ?></span>
                        </div>

                        <div class="order-status proses">
                         <?= htmlspecialchars(ucwords(str_replace('_', ' ', $order['status']))) ?>
                        </div>

                        <a href="#" class="btn-detail">Detail</a>
                    </div>

                <?php endforeach; ?>

            </div>


        </div>











</body>
<!-- <?php require 'partial-footer.php'; ?> -->

</html>