<?php
// session & checkRole sudah dilakukan di controller
?>
<!DOCTYPE html>
<html>
<head>
    <title>Kategori Barang - Admin</title>
    <link rel="stylesheet" href="../../css/list_barang.css">

</head>
<body>

<h1>Daftar Kategori Barang</h1>

<a href="../controller/productController.php?action=create">
    Tambah Kategori
</a>

<br><br>

<table border="1" cellpadding="6" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama Kategori</th>
            <th>Deskripsi</th>
            <th>Resiko</th>
            <th>Packing Khusus</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
        <?php if (!empty($products)): ?>
            <?php foreach ($products as $p): ?>
                <tr>
                    <td><?= "BRG" . str_pad($p['id'], 3, "0", STR_PAD_LEFT); ?></td>
                    <td><?= htmlspecialchars($p['nama_kategori']) ?></td>
                    <td><?= htmlspecialchars($p['deskripsi']) ?></td>
                    <td><?= htmlspecialchars(ucfirst($p['resiko'])) ?></td>
                    <td><?= $p['packing_khusus'] === 'ya' ? 'Ya' : 'Tidak' ?></td>
                    <td>
                        <a href="../controller/productController.php?action=edit&id=<?= $p['id'] ?>">Edit</a> |
                        <a href="../controller/productController.php?action=delete&id=<?= $p['id'] ?>"
                           onclick="return confirm('Hapus kategori ini?')">
                           Hapus
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="6">Tidak ada data kategori</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<p>
    <a href="../views/admin/admin_panels.php">Kembali ke Admin Panel</a>
</p>

</body>
</html>
