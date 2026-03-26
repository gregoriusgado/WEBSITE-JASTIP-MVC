<?php

class ProductModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    /* =====================
       GET ALL
    ===================== */
    public function getAll() {
        $stmt = $this->conn->prepare( "SELECT * FROM kategori_barang ORDER BY id ASC");
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    /* =====================
       FIND BY ID
    ===================== */
    public function find($id) {
        $stmt = $this->conn->prepare("SELECT * FROM kategori_barang WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    /* =====================
       CREATE
    ===================== */
    public function create($data) {
        $stmt = $this->conn->prepare(
            "INSERT INTO kategori_barang (nama_kategori, deskripsi, resiko, packing_khusus) VALUES (?,?,?,?)"  );

        $stmt->bind_param(
            "ssss",
            $data['nama_kategori'],
            $data['deskripsi'],
            $data['resiko'],
            $data['packing_khusus']
        );

        return $stmt->execute();
    }

    /* =====================
       UPDATE
    ===================== */
    public function update($id, $data) {
        $stmt = $this->conn->prepare(
            "UPDATE kategori_barang 
             SET nama_kategori = ?, 
                 deskripsi = ?, 
                 resiko = ?, 
                 packing_khusus = ?
             WHERE id = ?"
        );

        $stmt->bind_param(
            "ssssi",
            $data['nama_kategori'],
            $data['deskripsi'],
            $data['resiko'],
            $data['packing_khusus'],
            $id
        );

        return $stmt->execute();
    }

    /* =====================
       DELETE
    ===================== */
    public function delete($id) {
        $stmt = $this->conn->prepare(
            "DELETE FROM kategori_barang WHERE id = ?"
        );
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
