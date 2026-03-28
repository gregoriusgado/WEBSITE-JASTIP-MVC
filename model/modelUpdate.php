<?php

class updateStatusModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }


     /* =====================
       GET ALL
    ===================== */
    public function getALL() {
        $stmt = $this->conn->prepare(" SELECT 
            users.username, 
            pesanan_paket.nama_paket,
            pesanan_paket.status,
            pesanan_paket.created_at
            FROM users
        INNER JOIN pesanan_paket ON users.id = pesanan_paket.id_users
        ORDER BY pesanan_paket.created_at DESC ");

        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    
}
}