<?php
class User
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function login($username, $password, $role)
    {
        // Query berdasarkan role
        if ($role === 'admin') {
            $query = "SELECT * FROM tabel_admin WHERE username = ? AND password = ?";
        } else {
            $query = "SELECT * FROM tabel_mahasiswa WHERE nim = ? AND password = ?";
        }

        // Persiapan query
        $params = array($username, $password);
        $stmt = sqlsrv_query($this->conn, $query, $params);

        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
        }

        // Fetch data
        if ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            return $row;
        }

        return null;
    }

    public function getTotalMahasiswa()
    {
        $query = "SELECT COUNT(*) AS total_mahasiswa FROM tabel_mahasiswa";
        $stmt = sqlsrv_query($this->conn, $query);

        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
        }

        $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
        return $row['total_mahasiswa'];
    }

    public function getAllMahasiswa()
    {
        $query = "SELECT * FROM tabel_mahasiswa";
        $stmt = sqlsrv_query($this->conn, $query);

        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
        }

        $result = [];
        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            $result[] = $row;
        }

        return $result;
    }
    public function getMahasiswaTop($total)
    {
        $query = "SELECT TOP (?) * 
                  FROM tabel_mahasiswa
                  ORDER BY total_poin DESC;";
        $params = [$total]; // Menggunakan parameter binding
        $stmt = sqlsrv_query($this->conn, $query, $params);

        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true)); // Debug jika query gagal
        }

        $result = [];
        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            $result[] = $row; // Menyimpan setiap baris hasil ke dalam array
        }

        return $result; // Mengembalikan hasil
    }


    public function getMahasiswaByNim($nim)
    {
        $query = "SELECT * FROM tabel_mahasiswa WHERE nim = ?";
        $stmt = sqlsrv_query($this->conn, $query, [$nim]);

        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
        }

        $result = [];
        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            $result[] = $row;
        }

        return $result;
    }

    public function getAllAdmin()
    {
        $query = "SELECT * FROM tabel_admin";
        $stmt = sqlsrv_query($this->conn, $query);

        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
        }

        $result = [];
        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            $result[] = $row;
        }

        return $result;
    }
}
