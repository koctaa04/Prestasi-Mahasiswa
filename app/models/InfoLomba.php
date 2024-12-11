<?php
class InfoLomba
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Menampilkan semua info lomba
    public function getAllLomba()
    {
        $query = "SELECT * FROM tabel_info_lomba";
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

    public function getTotalLombaUnverified()
    {
        $query = "SELECT COUNT(*) AS total_lomba FROM tabel_info_lomba where status = 'Pending' or status = 'Ditolak'";
        $stmt = sqlsrv_query($this->conn, $query);

        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
        }

        $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
        return $row['total_lomba'];
    }

    // Ambil semua info lomba yang terverifikasi
    public function getVerifiedLomba()
    {
        $query = "SELECT 
            i.id, i.nama AS nama_lomba, i.tenggat, i.status, i.pamflet, i.link, m.nama AS nama_mahasiswa FROM tabel_info_lomba i
            JOIN 
            tabel_mahasiswa m ON i.nim = m.nim
            WHERE status = 'Terverifikasi'";
        $stmt = sqlsrv_query($this->conn, $query);

        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
        }

        $result = [];
        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            $row['tenggat'] = $row['tenggat'] instanceof DateTime ? $row['tenggat'] : new DateTime($row['tenggat']);
            $result[] = $row;
        }

        return $result;
    }
    // Ambil semua info lomba yang terverifikasi
    public function getUnverifiedLomba()
    {
        $query = "	SELECT 
            i.id, i.nama AS nama_lomba, i.tenggat, i.link,i.pamflet ,m.nama AS nama_mahasiswa, i.status, i.alasan_penolakan 
        FROM tabel_info_lomba i
        JOIN 
        tabel_mahasiswa m ON i.nim = m.nim
        WHERE status = 'Pending' or status = 'Ditolak'";

        $stmt = sqlsrv_query($this->conn, $query);

        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
        }

        $result = [];
        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            $row['tenggat'] = $row['tenggat'] instanceof DateTime ? $row['tenggat'] : new DateTime($row['tenggat']);
            $result[] = $row;
        }

        return $result;
    }

    public function getVerifiedLombaByNim($nim)
    {
        $query = "SELECT * FROM tabel_info_lomba WHERE status = 'Terverifikasi' AND nim = '$nim'";
        $stmt = sqlsrv_query($this->conn, $query);

        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
        }

        $result = [];
        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            $row['tenggat'] = $row['tenggat'] instanceof DateTime ? $row['tenggat'] : new DateTime($row['tenggat']);
            $result[] = $row;
        }

        return $result;
    }
    public function getUnverifiedLombaByNim($nim)
    {
        $query = "SELECT * FROM tabel_info_lomba WHERE status = 'Pending' OR status = 'Ditolak' AND nim = '$nim'";
        $stmt = sqlsrv_query($this->conn, $query);

        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
        }

        $result = [];
        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            $row['tenggat'] = $row['tenggat'] instanceof DateTime ? $row['tenggat'] : new DateTime($row['tenggat']);
            $result[] = $row;
        }

        return $result;
    }

    public function verifyLomba($id, $status)
    {
        $query = "UPDATE tabel_info_lomba SET status = ? WHERE id = ?";
        $params = array($status, $id);
        $stmt = sqlsrv_query($this->conn, $query, $params);

        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
        }

        return true;
    }

    // Menambahkan info lomba baru
    public function addLomba($nama, $pamflet, $tenggat, $link, $verifikasi)
    {
        $query = "INSERT INTO tabel_info_lomba (nama, pamflet, tenggat, link, verifikasi) VALUES (?, ?, ?, ?, ?)";
        $params = [$nama, $pamflet, $tenggat, $link, $verifikasi];
        $stmt = sqlsrv_query($this->conn, $query, $params);

        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
        }
    }
    // Fungsi untuk menambahkan info lomba
    public function addInfoLomba($nim, $nama, $pamflet, $tenggat, $link, $status)
    {
        // Query untuk menambahkan info lomba
        $query = "INSERT INTO tabel_info_lomba (nim, nama, pamflet, tenggat, link, status) 
                  VALUES (?, ?, ?, ?, ?, ?)";

        // Persiapkan statement
        $stmt = sqlsrv_query($this->conn, $query, [$nim, $nama, $pamflet, $tenggat, $link, $status]);

        // Periksa apakah query berhasil
        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true)); // Error handling jika query gagal
        }

        return true; // Mengembalikan nilai true jika berhasil
    }

    // Mengambil info lomba berdasarkan ID
    public function getLombaById($id)
    {
        $query = "SELECT * FROM tabel_info_lomba WHERE id = ?";
        $params = [$id];
        $stmt = sqlsrv_query($this->conn, $query, $params);

        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
        }

        return sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
    }

    public function getLombaByNim($nim)
    {
        $query = "SELECT * FROM tabel_info_lomba WHERE nim = ?";
        $params = [$nim];
        $stmt = sqlsrv_query($this->conn, $query, $params);

        $info_lomba = [];
        if ($stmt !== false) {
            while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                $info_lomba[] = $row;
            }
        }

        return $info_lomba;
    }

    // Memperbarui info lomba
    public function updateLomba($id, $nama, $pamflet, $tenggat, $link)
    {
        // var_dump($id, $nama, $pamflet, $tenggat, $link);
        // die;
        $query = "UPDATE tabel_info_lomba SET nama = ?, pamflet = ?, tenggat = ?, link = ?, status = 'Pending' WHERE id = ?";
        $params = [$nama, $pamflet, $tenggat, $link, $id];
        $stmt = sqlsrv_query($this->conn, $query, $params);

        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
        }
        return true;
    }



    // Menghapus info lomba
    public function deleteLomba($id)
    {
        $query = "DELETE FROM tabel_info_lomba WHERE id = ?";
        $params = [$id];
        $stmt = sqlsrv_query($this->conn, $query, $params);

        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
        }
    }



    public function rejectInfoLomba($id, $alasan)
    {

        // Update status dan alasan penolakan di database
        $query = "UPDATE tabel_info_lomba SET status = 'Ditolak', alasan_penolakan = ? WHERE id = ?";
        $params = [$alasan, $id];
        $stmt = sqlsrv_query($this->conn, $query, $params);

        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
        }

        return true;
    }
}
