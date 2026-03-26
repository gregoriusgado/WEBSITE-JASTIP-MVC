<?php

session_start();
require '../config.php/db.php';
require '../model/orderModel.php';
require '../middleware/checkRole.php';

checkRole(['admin', "users"]);

$orderModel = new OrderModel($conn);

// commt: memperbaiki panjang karakter di form pemesanan (nama dan deskripsi)
function validateOrder($post)
{
    $errors = [];

    $nama = trim($post['nama_paket'] ?? '');
    $kategori = $post['kategori_id'] ?? '';
    $no_wa = trim($post['no_wa'] ?? '');
    $deskripsi = trim($post['deskripsi_paket'] ?? '');
    if ($nama === '') {
        $errors[] = "Nama paket wajib diisi";
    } elseif (strlen($nama) > 10) {
        $errors[] = "Nama paket maksimal 10 karakter";
    }
    if ($kategori === '') {
        $errors[] = "Kategori wajib dipilih";
    }
    if (!preg_match('/^08[0-9]{8,11}$/', $no_wa)) {
        $errors[] = "Nomor WA tidak valid";
    }
    if (strlen($deskripsi) > 50) {
        $errors[] = "Deskripsi maksimal 50 karakter";
    }
    return $errors;
}


$action = $_GET['action'] ?? 'index';


/* =====================
   INDEX
===================== */
if ($action === 'index') {
    $id_users = $_SESSION['user_id'];
    $order = $orderModel->getByUser($id_users);
    require '../views/list_paket_users.php';
    exit();
}

/* =====================
   CREATE
===================== */
$kategoris = $orderModel->getKategori();
if ($action === 'create') {

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $errors = validateOrder($_POST);

        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            header("Location: orderController.php?action=create");
            exit();
        }

        $data = [
            'id_users' => $_SESSION['user_id'],
            'kategori_id' => $_POST['kategori_id'],
            'nama_paket' => substr(trim($_POST['nama_paket']), 0, 40),
            'deskripsi_paket' => substr(trim($_POST['deskripsi_paket']), 0, 300),
            'no_wa' => trim($_POST['no_wa']),
            'packing_khusus' => 'tidak'
        ];

        $orderModel->create($data);
        header("Location: orderController.php?action=index");
        exit();
    } else {
        $order = null;
        $kategoris = $orderModel->getKategori();
        require '../views/formPemesananUser.php';
        exit();
    }
}

/* =====================
   EDIT
===================== */
if ($action === 'edit') {

    $id = intval($_GET['id'] ?? 0);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $errors = validateOrder($_POST);

        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            header("Location: orderController.php?action=edit&id=" . $id);
            exit();
        }

        $data = [
            'id_users' => $_SESSION['user_id'],
            'kategori_id' => $_POST['kategori_id'],
            'nama_paket' => trim($_POST['nama_paket']),
            'deskripsi_paket' => trim($_POST['deskripsi_paket']),
            'no_wa' => trim($_POST['no_wa']),
            'packing_khusus' => 'tidak'
        ];
        $orderModel->update($id, $data);
        header("Location: orderController.php?action=index");
        exit();
    } else {
        $order = $orderModel->find($id);
        $kategoris = $orderModel->getKategori();
        require '../views/formPemesananUser.php';
        exit();
    }
}

/* =====================
   DELETE
===================== */
if ($action === 'delete') {
    $id = intval($_GET['id'] ?? 0);
    if ($id > 0) {
        $orderModel->delete($id);
    }
    header("Location: orderController.php?action=index");
    exit();
}

/* =====================
   FALLBACK
===================== */
header("Location: orderController.php?action=index");
exit();
