<?php


class OrderModel
{
   private $conn;


   public function __construct($conn)
   {
      $this->conn = $conn;
   }

   /* =====================
       GET ALL
    ===================== */
   public function getAll()
   {
      $stmt = $this->conn->prepare(
         "SELECT pesanan_paket.*, kategori_barang.nama_kategori FROM pesanan_paket
         LEFT JOIN kategori_barang
         ON pesanan_paket.kategori_id = kategori_barang.id
         ORDER BY pesanan_paket.id DESC"
      );

      $stmt->execute();
      return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
   }
   public function find($id)
   {
      $stmt = $this->conn->prepare("SELECT * FROM pesanan_paket WHERE id = ?");
      $stmt->bind_param("i", $id);
      $stmt->execute();
      return $stmt->get_result()->fetch_assoc();
   }
   public function getKategori()
   {
      $stmt = $this->conn->prepare("SELECT id, nama_kategori FROM kategori_barang ORDER BY nama_kategori ASC");
      $stmt->execute();
      return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
   }

   /* =====================
      CREATE
    ===================== */
   public function Create($data)
   {
      $stmt = $this->conn->prepare(
         "INSERT INTO pesanan_paket
      (id_users, kategori_id, nama_paket, deskripsi_paket, no_wa, packing_khusus)
      VALUES (?, ?, ?, ?, ?, ?)"
      );

      $stmt->bind_param(
         "iissss",
         $data['id_users'],
         $data['kategori_id'],
         $data['nama_paket'],
         $data['deskripsi_paket'],
         $data['no_wa'],
         $data['packing_khusus']
      );
      return $stmt->execute();
   }
   /* =====================
       UPDATE
   ===================== */
   public function update($id, $data)
   {
      $stmt = $this->conn->prepare(
         "UPDATE pesanan_paket 
          SET id_users=?, kategori_id=?, nama_paket=?, deskripsi_paket=?, no_wa=?, packing_khusus=? 
          WHERE id=?"
      );

      $stmt->bind_param(
         "iissssi",
         $data['id_users'],
         $data['kategori_id'],
         $data['nama_paket'],
         $data['deskripsi_paket'],
         $data['no_wa'],
         $data['packing_khusus'],
         $id
      );


      return $stmt->execute();
   }

   /* =====================
       DELETE
   ===================== */
   public function delete($id)
   {
      $stmt = $this->conn->prepare("DELETE FROM pesanan_paket WHERE id = ?");
      $stmt->bind_param("i", $id);
      return $stmt->execute();
   }

   /* =====================
       GET BY USER
   ===================== */
   public function getByUser($id_users)
   {
      $stmt = $this->conn->prepare(
         "SELECT pesanan_paket.*, 
            kategori_barang.nama_kategori,
            kategori_barang.packing_khusus
            FROM pesanan_paket
            LEFT JOIN kategori_barang
            ON pesanan_paket.kategori_id = kategori_barang.id
            WHERE pesanan_paket.id_users = ?
            ORDER BY pesanan_paket.id ASC"
      );

      $stmt->bind_param("i", $id_users);
      $stmt->execute();

      $result = $stmt->get_result();
      return $result->fetch_all(MYSQLI_ASSOC);
   }

    /* =====================
       PESANAN AKTIF
   ===================== */
   public function getPesananAktif($id_users)
{
    $stmt = $this->conn->prepare(
        "SELECT pesanan_paket.nama_paket,
                pesanan_paket.id,
                pesanan_paket.status,
                pesanan_paket.created_at,
                kategori_barang.nama_kategori
        FROM pesanan_paket
        LEFT JOIN kategori_barang
        ON pesanan_paket.kategori_id = kategori_barang.id
        WHERE pesanan_paket.id_users = ?
        ORDER BY pesanan_paket.id DESC LIMIT 3"
    );

    $stmt->bind_param("i", $id_users);
    $stmt->execute();

    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
}
}
