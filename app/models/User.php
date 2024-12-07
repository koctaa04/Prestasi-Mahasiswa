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




    public function getAllDosen()
    {
        $query = "SELECT * FROM tabel_dosen";
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

    // Fungsi untuk menambahkan mahasiswa
    public function addDosen($nip, $nama)
    {
        $query = "INSERT INTO tabel_dosen (nip, nama) 
                  VALUES (?, ?)";

        $params = [$nip, $nama];
        $stmt = sqlsrv_query($this->conn, $query, $params);

        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
        }

        return true;
    }
        // Fungsi untuk menghapus dosen
        public function deleteDosen($nip)
        {
            $query = "DELETE FROM tabel_dosen WHERE nip = ?";
            $params = [$nip];
            $stmt = sqlsrv_query($this->conn, $query, $params);
    
            if ($stmt === false) {
                die(print_r(sqlsrv_errors(), true));
            }
    
            return true;
        }
        // Fungsi untuk memperbarui data dosen
        public function updateDosen($nip, $nama)
        {
            $query = "UPDATE tabel_dosen 
                       SET nama = ?
                       WHERE nip = ?";
            $params = [$nama,$nip];
            $stmt = sqlsrv_query($this->conn, $query, $params);
    
            if ($stmt === false) {
                die(print_r(sqlsrv_errors(), true));
            }
            
            return true;
        }


    // Fungsi untuk menambahkan mahasiswa
    public function addMahasiswa($nim, $nama, $password, $program_studi, $jurusan, $angkatan)
    {
        $query = "INSERT INTO tabel_mahasiswa (nim, nama, password, prodi, jurusan, angkatan) 
                  VALUES (?, ?, ?, ?, ?, ?)";

        $params = [$nim, $nama, $password, $program_studi, $jurusan, $angkatan];
        $stmt = sqlsrv_query($this->conn, $query, $params);

        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
        }

        return true;
    }
    // Fungsi untuk menghapus mahasiswa
    public function deleteMahasiswa($nim)
    {
        $query = "DELETE FROM tabel_mahasiswa WHERE nim = ?";
        $params = [$nim];
        $stmt = sqlsrv_query($this->conn, $query, $params);

        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
        }

        return true;
    }
    // Fungsi untuk memperbarui data mahasiswa
    public function updateMahasiswa($nim, $nama, $password, $program_studi, $jurusan, $angkatan)
    {
        $query = "UPDATE tabel_mahasiswa 
                   SET nama = ?, password = ?, prodi = ?, jurusan = ?, angkatan = ? 
                   WHERE nim = ?";
        $params = [$nama, $password, $program_studi, $jurusan, $angkatan, $nim];
        $stmt = sqlsrv_query($this->conn, $query, $params);

        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
        }
        
        return true;
    }
}
