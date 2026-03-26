<?php
$isEdit = !empty($order);
?>
<!DOCTYPE html>
<html>

<head>
    <title><?= $isEdit ? "Edit" : "Tambah" ?> Produk</title>
    <link rel="stylesheet" href="../css/user_product_form.css">
</head>

<body>

    <div class="form-wrapper">

        <h1><?= $isEdit ? "Edit" : "Tambah" ?> <span>Produk</span></h1>

        <?php if (!empty($_SESSION['errors'])): ?>
            <div style="color:red;">
                <ul>
                    <?php foreach ($_SESSION['errors'] as $e): ?>
                        <li><?= htmlspecialchars($e) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <?php unset($_SESSION['errors']); ?>
        <?php endif; ?>

        <form method="POST" action="../../controller/orderController.php?action=<?= $isEdit ? "edit&id=" . $order['id'] : "create" ?>">

            <label>Nama Paket</label><br>
            <input type="text"
                name="nama_paket"
                maxlength="40"
                value="<?= $isEdit ? htmlspecialchars($order['nama_paket']) : '' ?>" required>
            <br><br>

            <label>Kategori Barang</label><br>
            <select name="kategori_id" required>

                <option value="">-- pilih kategori --</option>

                <?php foreach ($kategoris as $k): ?>

                    <option value="<?= $k['id'] ?>"
                        <?= ($isEdit && $k['id'] == $order['kategori_id']) ? 'selected' : '' ?>>
                        <?= htmlspecialchars($k['nama_kategori']) ?>
                    </option>

                <?php endforeach; ?>

            </select>
            <br><br>

            <label>No WA</label><br>
            <input
                type="tel"
                name="no_wa"
                placeholder="08xxxxxxxxxx"
                pattern="^08[0-9]{8,11}$"
                title="Masukkan nomor WA yang valid"
                value="<?= $isEdit ? htmlspecialchars($order['no_wa']) : '' ?>"
                required>
            <br><br>

            <label>Deskripsi Barang</label><br>
            <textarea name="deskripsi_paket"><?= $isEdit ? htmlspecialchars($order['deskripsi_paket']) : '' ?></textarea>
            <br><br>

            <button type="submit">
                <?= $isEdit ? "Simpan Perubahan" : "Tambah Produk" ?>
            </button>

            <p><a href="../../controller/orderController.php?action=index">Kembali ke daftar</a></p>
        </form>
    </div>
</body>

</html>