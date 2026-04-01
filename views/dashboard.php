<?php

if (!isset($orders)) {
    header("Location: ../controller/dashboardController.php");
    exit();
}

function getStep($status)
{
    switch ($status) {
        case 'diproses':
            return 1;
        case 'menuju_gudang':     
            return 2;
        case 'sampai_gudang':
            return 3;
        case 'diambil':
            return 4;
        case 'selesai':
            return 5;
        default:
            return 0;
    }
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/dashboard.css">
    <title>Dashboard</title>
</head>

<body>

    <!-- ADMIN NOTIF -->
    <?php if ($_SESSION['role'] == 'admin'): ?>
        <div class="admin-box">
            <h1>HAI ADMIN 👋</h1>
            <p>Role Kamu: <b><?= $_SESSION['role']; ?></b></p>
            <a href="../views/admin/admin_panels.php">Masuk Panel Admin</a>
        </div>
    <?php endif; ?>

    <!-- WRAPPER UTAMA -->
    <div class="app">

        <!-- SIDEBAR -->
         <?php include '../views/partial-sidebar.php'; ?>

        <!-- KONTEN UTAMA -->
        <div class="main-content">

            <div class="page-header">
                <h3>Pesanan Aktif</h3>
                <p>Pantau 3 status pengiriman paket terbaru kamu di sini</p>
            </div>

            <!-- DAFTAR ORDER -->
            <div class="order-list">

                <?php foreach ($orders as $order): ?>

                    <?php $currentStep = getStep($order['status']); ?> 

                    <!-- CARD -->
                    <div class="order-card">

                        <!-- HEADER CARD -->
                        <div class="order-header">
                            <div class="order-info">
                                <strong class="nama-paket"><?= htmlspecialchars($order["nama_paket"]) ?></strong>
                                <span class="nama-kategori"><?= htmlspecialchars($order["nama_kategori"]) ?></span>
                            </div>
                            <div class="order-status status-<?= $order['status'] ?>">
                                <?= htmlspecialchars(ucwords(str_replace('_', ' ', $order['status']))) ?>
                            </div>
                        </div>

                        <!-- TRACKER / PROGRESS -->
                        <div class="garis-tracker">

                            <div class="step <?= $currentStep >= 1 ? 'completed' : '' ?> <?= $currentStep <= 1 ? 'active' : '' ?>">
                                <div class="circle">
                                    <?php if ($currentStep >= 1): ?><span>✓</span>
                                    <?php else: ?><span>1</span>
                                    <?php endif; ?>
                                </div>
                                <img src="../css/orders.png" alt="Diproses">
                                <p>Diproses</p>
                            </div>

                            <div class="connector <?= $currentStep >= 2 ? 'completed' : '' ?>"></div>

                            <div class="step <?= $currentStep > 2 ? 'completed' : '' ?> <?= $currentStep == 2 ? 'active' : '' ?>">
                                <div class="circle">
                                    <?php if ($currentStep > 2): ?>
                                        <span>✓</span>
                                    <?php else: ?>
                                        <span>2</span>
                                    <?php endif; ?>
                                </div>
                                <img src="../css/truck.png" alt="Dikirim">
                                <p>Dikirim</p>
                            </div>

                            <div class="connector <?= $currentStep >= 3 ? 'completed' : '' ?>"></div>

                            <div class="step <?= $currentStep >= 3 ? 'completed' : '' ?> <?= $currentStep == 3 ? 'active' : '' ?>">
                                <div class="circle">
                                    <?php if ($currentStep > 3): ?>
                                        <span>✓</span>
                                    <?php else: ?>
                                        <span>3</span>
                                    <?php endif; ?>
                                </div>
                                <img src="../css/gudang.png" alt="Sampai Gudang">
                                <p>Sampai Gudang</p>
                            </div>

                            <div class="connector <?= $currentStep >= 4 ? 'completed' : '' ?>"></div>

                            <div class="step <?= $currentStep >= 4 ? 'completed' : '' ?> <?= $currentStep == 4 ? 'active' : '' ?>">
                                <div class="circle">
                                    <?php if ($currentStep > 4): ?>
                                        <span>✓</span>
                                    <?php else: ?>
                                        <span>4</span>
                                    <?php endif; ?>
                                </div>
                                <img src="../css/pickup.png" alt="Diambil">
                                <p>Diambil</p>
                            </div>

                            <div class="connector <?= $currentStep >= 5 ? 'completed' : '' ?>"></div>

                            <div class="step <?= $currentStep >= 5 ? 'completed' : '' ?> <?= $currentStep == 5 ? 'active' : '' ?>">
                                <div class="circle">
                                    <?php if ($currentStep >= 5): ?>
                                        <span>✓</span>
                                    <?php else: ?>
                                        <span>5</span>
                                    <?php endif; ?>
                                </div>
                                <img src="../css/selesai.png" alt="Selesai">
                                <p>Selesai</p>
                            </div>

                        </div>
                      

                        <a class="btn-detail" onclick="toggleDetail(<?= $order['id'] ?>)">
                            Lihat Detail →
                        </a>
                        <div id="detail-<?=  $order['id'] ?>" style="display: none; margin-top:10px;"> 
                             <p>Waktu Pemesanan : <?=  htmlspecialchars($order['created_at']) ?></p>               
                        </div>

                    </div>
                

                <?php endforeach; ?>

            </div>
      

        </div>
     

    </div>
   

</body>
<script>
    function toggleDetail(id) {
        const detail = document.getElementById("detail-"+ id);

        if (detail.style.display === "none") {
            detail.style.display = "block"
        } else {
            detail.style.display = "none"
        }
    }
</script>
</html>