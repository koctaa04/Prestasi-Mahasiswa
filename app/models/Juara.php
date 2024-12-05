<?php
class Juara
{
    private $conn;

    public function __construct($db)
    {
        if (!is_resource($db)) { // Pastikan koneksi valid
            die("Koneksi database tidak valid.");
        }
        $this->conn = $db;
    }

    public function getTotalJuara()
    {
        $query = "SELECT COUNT(*) AS total_juara FROM tabel_juara";
        $stmt = sqlsrv_query($this->conn, $query);

        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
        }

        $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
        return $row['total_juara'];
    }


    public function getAllJuara()
    {
        $query = "SELECT * FROM tabel_juara";
        $stmt = sqlsrv_query($this->conn, $query);

        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true)); // Debug jika query gagal
        }

        $juaras = [];
        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            $juaras[] = $row;
        }

        return $juaras;
    }

    public function getJuaraById($id)
    {
        $query = "SELECT * FROM tabel_juara WHERE id = ?";
        $params = array($id);
        $stmt = sqlsrv_query($this->conn, $query, $params);

        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
        }

        return sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC); // Ambil satu baris data
    }

    public function addJuara($nama, $poin)
    {
        // Query untuk menambahkan data juara dengan kolom nama dan poin
        $query = "INSERT INTO tabel_juara (nama, poin) VALUES (?, ?)";
        
        // Array parameter untuk nama dan poin
        $params = array($nama, $poin);
        
        // Menjalankan query dengan parameter yang sudah disiapkan
        $stmt = sqlsrv_query($this->conn, $query, $params);
    
        // Mengecek apakah query berhasil dieksekusi
        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
        }
    }
    

    public function updateJuara($id, $nama, $poin)
    {
        // Query untuk update data juara berdasarkan id
        $query = "UPDATE tabel_juara SET nama = ?, poin = ? WHERE id = ?";
        
        // Array parameter untuk nama, poin, dan id
        $params = array($nama, $poin, $id);
        
        // Menjalankan query dengan parameter
        $stmt = sqlsrv_query($this->conn, $query, $params);
    
        // Mengecek jika query gagal
        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
        }
    }
    
    public function deleteJuara ($id)
    {
        $query = "DELETE FROM tabel_juara WHERE id = ?";
        $params = array($id);
        $stmt = sqlsrv_query($this->conn, $query, $params);

        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
        }
    }
}
