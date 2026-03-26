<?php
$isEdit = !empty($product);
?>
<!DOCTYPE html>
<html>
<head>
    <title><?= $isEdit ? "Edit" : "Tambah" ?> Produk</title>
    <link rel="stylesheet" href="../../css/admin_product_form.css">
</head>
<body>
    
<div class="form-wrapper">

<h1>
    <?= $isEdit ? "Edit" : "Tambah" ?> <span>Produk</span>
</h1>

<form method="POST" action="../../controller/productController.php?action=<?= $isEdit ? "edit&id=".$product['id'] : "create" ?>">

    <label>Nama Kategori</label><br>
    <input type="text" name="nama_kategori"value="<?= $isEdit ? htmlspecialchars($product['nama_kategori']) : '' ?>" required>
    <br><br>

    <label>Deskripsi Barang</label><br>
    <textarea name="deskripsi"><?= $isEdit ? htmlspecialchars($product['deskripsi']) : '' ?></textarea>
    <br><br>

    <!-- RESIKO (DROPDOWN) -->
    <label>Resiko</label><br>
    <select name="resiko" required>
        <option value="">-- Pilih Resiko --</option>
        <option value="rendah" <?= ($isEdit && $product['resiko'] == 'rendah') ? 'selected' : '' ?>>Rendah</option>
        <option value="sedang" <?= ($isEdit && $product['resiko'] == 'sedang') ? 'selected' : '' ?>>Sedang</option>
        <option value="tinggi" <?= ($isEdit && $product['resiko'] == 'tinggi') ? 'selected' : '' ?>>Tinggi</option>
    </select>
    <br><br>

    <!-- PACKING KHUSUS (CHECKBOX) -->
    <label>
        <input type="checkbox" name="packing_khusus" value="ya"<?= ($isEdit && $product['packing_khusus'] == 'ya') ? 'checked' : '' ?>>Packing Khusus
    </label>
    <br><br>

    <button type="submit">
        <?= $isEdit ? "Simpan Perubahan" : "Tambah Produk" ?>
    </button>

</form>

<p><a href="../../controller/productController.php?action=index">Kembali ke daftar</a></p>

</div>

</body>
</html>
