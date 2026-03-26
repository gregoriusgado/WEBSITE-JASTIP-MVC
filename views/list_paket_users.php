<?php
// session & checkRole sudah dilakukan di controller
?>

<!DOCTYPE html>
<html>

<head>
    <title>Daftar Pesanan User</title>
    <link rel="stylesheet" href="../../css/list_barang.css">
</head>

<body>

    <h1>Daftar Pesanan User</h1>

    <a href="../controller/orderController.php?action=create">
        Tambah Pesanan
    </a>

    <br><br>

    <table border="1" cellpadding="6" cellspacing="0">
        <thead>
            <tr>
                <th>Kode Pesanan</th>
                <th>Nama Paket</th>
                <th>Kategori</th>
                <th>No WA</th>
                <th>Deskripsi</th>
                <th>Packing Khusus</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>

            <?php if (!empty($order)): ?>

                <?php foreach ($order as $o): ?>

                    <tr>

                        <td>
                            <?= "ORD" . str_pad($o['id'], 3, "0", STR_PAD_LEFT); ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($o['nama_paket']) ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($o['nama_kategori']) ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($o['no_wa']) ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($o['deskripsi_paket']) ?>
                        </td>

                        <td>
                            <?= $o['packing_khusus'] === 'ya' ? 'Ya' : 'Tidak' ?>
                        </td>

                        <td>
                            <a href="../controller/orderController.php?action=edit&id=<?= $o['id'] ?>">
                                Edit
                            </a>

                            |

                            <a href="../controller/orderController.php?action=delete&id=<?= $o['id'] ?>"
                                onclick="return confirm('Hapus pesanan ini?')">
                                Hapus
                            </a>
                        </td>

                    </tr>

                <?php endforeach; ?>

            <?php else: ?>

                <tr>
                    <td colspan="7">Belum ada pesanan</td>
                </tr>

            <?php endif; ?>

        </tbody>
    </table>

    <p>
        <a href="../views/dashboard.php">Kembali ke Dashboard</a>
    </p>

</body>

</html>