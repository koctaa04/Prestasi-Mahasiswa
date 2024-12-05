<?php
class Tingkatan
{
    private $conn;

    public function __construct($db)
    {
        if (!is_resource($db)) { // Pastikan koneksi valid
            die("Koneksi database tidak valid.");
        }
        $this->conn = $db;
    }


    public function getTotalTingkatan()
    {
        $query = "SELECT COUNT(*) AS total_tingkatan FROM tabel_tingkatan";
        $stmt = sqlsrv_query($this->conn, $query);

        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
        }

        $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
        return $row['total_tingkatan'];
    }


    public function getAllTingkatan()
    {
        $query = "SELECT * FROM tabel_tingkatan";
        $stmt = sqlsrv_query($this->conn, $query);

        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true)); // Debug jika query gagal
        }

        $tingkatan = [];
        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            $tingkatan[] = $row;
        }

        return $tingkatan;
    }

    public function getTingkatanById($id)
    {
        $query = "SELECT * FROM tabel_tingkatan WHERE id = ?";
        $params = array($id);
        $stmt = sqlsrv_query($this->conn, $query, $params);

        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
        }

        return sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC); // Ambil satu baris data
    }

    public function addTingkatan($nama, $poin)
    {
        // Query untuk menambahkan data juara dengan kolom nama dan poin
        $query = "INSERT INTO tabel_tingkatan (nama, poin) VALUES (?, ?)";
        
        // Array parameter untuk nama dan poin
        $params = array($nama, $poin);
        
        // Menjalankan query dengan parameter yang sudah disiapkan
        $stmt = sqlsrv_query($this->conn, $query, $params);
    
        // Mengecek apakah query berhasil dieksekusi
        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
        }
    }
    

    public function updateTingkatan($id, $nama, $poin)
    {
        // Query untuk update data juara berdasarkan id
        $query = "UPDATE tabel_tingkatan SET nama = ?, poin = ? WHERE id = ?";
        
        // Array parameter untuk nama, poin, dan id
        $params = array($nama, $poin, $id);
        
        // Menjalankan query dengan parameter
        $stmt = sqlsrv_query($this->conn, $query, $params);
    
        // Mengecek jika query gagal
        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
        }
    }
    
    public function deleteTingkatan($id)
    {
        $query = "DELETE FROM tabel_tingkatan WHERE id = ?";
        $params = array($id);
        $stmt = sqlsrv_query($this->conn, $query, $params);

        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
        }
    }
}
