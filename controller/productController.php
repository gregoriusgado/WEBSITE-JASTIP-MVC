<?php

session_start();
require '../config.php/db.php';
require '../model/productModel.php';
require '../middleware/checkRole.php';

checkRole(['admin']);

$productModel = new ProductModel($conn);

$action = $_GET['action'] ?? 'index';

/* =====================
   INDEX
===================== */
if ($action === 'index') {
    $products = $productModel->getAll();
    require '../views/admin/list_barang.php';
    exit();
}

/* =====================
   CREATE
===================== */
if ($action === 'create') {

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $data = [
            'nama_kategori'     => trim($_POST['nama_kategori']),
            'deskripsi'         => trim($_POST['deskripsi']),
            'resiko'            => $_POST['resiko'],
            'packing_khusus'    => isset($_POST['packing_khusus']) ? 'ya' : 'tidak'
        ];

        $productModel->create($data);
        header("Location: productController.php?action=index");
        exit();
    } else {
        $product = null;
        require '../views/admin/admin_product_form.php';
        exit();
    }
}

/* =====================
   EDIT
===================== */
if ($action === 'edit') {

    $id = intval($_GET['id'] ?? 0);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $data = [
            'nama_kategori'     => trim($_POST['nama_kategori']),
            'deskripsi'         => trim($_POST['deskripsi']),
            'resiko'            => $_POST['resiko'],
            'packing_khusus'    => isset($_POST['packing_khusus']) ? 'ya' : 'tidak'
        ];

        $productModel->update($id, $data);
        header("Location: productController.php?action=index");
        exit();
    } else {
        $product = $productModel->find($id);
        require '../views/admin/admin_product_form.php';
        exit();
    }
}

/* =====================
   DELETE
===================== */
if ($action === 'delete') {
    $id = intval($_GET['id'] ?? 0);
    if ($id > 0) {
        $productModel->delete($id);
    }
    header("Location: productController.php?action=index");
    exit();
}

/* =====================
   FALLBACK
===================== */
header("Location: productController.php?action=index");
exit();
