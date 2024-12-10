<?php
class Category
{
    private $conn;

    public function __construct($db)
    {
        if (!is_resource($db)) { // Pastikan koneksi valid
            die("Koneksi database tidak valid.");
        }
        $this->conn = $db;
    }


    public function getTotalKategori()
    {
        $query = "SELECT COUNT(*) AS total_kategori FROM tabel_kategori";
        $stmt = sqlsrv_query($this->conn, $query);

        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
        }

        $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
        return $row['total_kategori'];
    }

    public function getAllCategories()
    {
        $query = "SELECT * FROM tabel_kategori";
        $stmt = sqlsrv_query($this->conn, $query);

        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true)); // Debug jika query gagal
        }

        $categories = [];
        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            $categories[] = $row;
        }

        return $categories;
    }

    public function getCategoryById($id)
{
    $query = "SELECT * FROM tabel_kategori WHERE id = ?";
    $params = array($id);
    $stmt = sqlsrv_query($this->conn, $query, $params);

    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    return sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC); // Ambil satu baris data
}

    public function addCategory($nama)
    {
        $query = "INSERT INTO tabel_kategori (nama) VALUES (?)";
        $params = array($nama);
        $stmt = sqlsrv_query($this->conn, $query, $params);

        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
        }
        return true;
    }

    public function updateCategory($id, $nama)
    {
        $query = "UPDATE tabel_kategori SET nama = ? WHERE id = ?";
        $params = array($nama, $id);
        $stmt = sqlsrv_query($this->conn, $query, $params);

        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
        }
    }

    public function deleteCategory($id)
    {
        $query = "DELETE FROM tabel_kategori WHERE id = ?";
        $params = array($id);
        $stmt = sqlsrv_query($this->conn, $query, $params);

        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
        }
    }
}
