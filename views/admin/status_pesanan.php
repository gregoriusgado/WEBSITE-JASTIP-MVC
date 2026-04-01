<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="../../css/list_barang.css">
    <title>Status-Pesanan</title>
</head>

<body>

    <h1>DAFTAR PESANAN USER</h1>

    <p>
    <a href="../views/admin/admin_panels.php">Kembali ke Admin Panel</a>
    </p>
    
    <br><br>

    <table border="1" cellpadding="4" cellspacing="0">
        <thead>
            <tr>
                <th>ID PESANAN</th>
                <th>Pelanggan</th>
                <th>Nama Paket</th>
                <th>Status</th>
                <th>Tanggal Pesan</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($update)): ?>
                <?php foreach ($update as $u): ?>
                    <tr>
                        <td><?= htmlspecialchars($u['id']) ?></td>
                        <td><?= htmlspecialchars($u['username']) ?></td>
                        <td><?= htmlspecialchars($u['nama_paket']) ?></td>
                        <td>
                            <form action="../controller/updateStatusController.php" method="POST">
                                <input type="hidden" name="id" value="<?= $u['id'] ?>">
                                <select name="status">
                                    <option value="diproses" <?= $u['status'] == 'diproses' ? 'selected' : '' ?>>
                                        Diproses
                                    </option>
                                    <option value="menuju_gudang" <?= $u['status'] == 'menuju_gudang' ? 'selected' : '' ?>>
                                        Menuju Gudang
                                    </option>
                                    <option value="sampai_gudang" <?= $u['status'] == 'sampai_gudang' ? 'selected' : '' ?>>
                                        Sampai Gudang
                                    </option>
                                    <option value="diambil" <?= $u['status'] == 'diambil' ? 'selected' : '' ?>>
                                        Diambil
                                    </option>
                                    <option value="selesai" <?= $u['status'] == 'selesai' ? 'selected' : '' ?>>
                                        Selesai
                                    </option>
                                </select>
                                <button type="submit">Update</button>
                            </form>
                        </td>
                        <td><?= htmlspecialchars($u['created_at']) ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5">Tidak ada data pesanan</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

</body>

</html>