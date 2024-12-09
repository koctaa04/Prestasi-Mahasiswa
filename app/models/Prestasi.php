<?php
class Prestasi
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db; // $db adalah koneksi SQL Server
    }

    // Mengambil data prestasi dengan status 'Pending'
    public function getUnverifiedPrestasiByNim($nim)
    {
        $query = "
            SELECT 
                p.id AS id_prestasi,
                p.nama_lomba,
                k.nama AS nama_kategori,
                j.nama AS nama_juara,
                t.nama AS nama_tingkatan,
                p.sertifikat,
                p.karya,
                p.penyelenggara,
                p.surat_tugas,
                p.verifikasi,
                p.alasan_penolakan,
                p.poin AS total_poin,
                p.tanggal AS tanggal
            FROM 
                tabel_prestasi p
            LEFT JOIN 
                tabel_kategori k ON p.kategori = k.id
            LEFT JOIN 
                tabel_juara j ON p.juara = j.id
            LEFT JOIN 
                tabel_tingkatan t ON p.tingkatan = t.id
            LEFT JOIN 
                tabel_mahasiswa m ON p.nim = m.nim
            WHERE 
                p.nim = ? AND p.verifikasi = 'Pending';
        ";

        // Menyiapkan parameter untuk query
        $params = [$nim];

        // Menjalankan query
        $stmt = sqlsrv_query($this->conn, $query, $params);

        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true)); // Menampilkan error jika query gagal
        }

        // Mengambil semua hasil
        $result = [];
        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            $result[] = $row;
        }

        return $result; // Mengembalikan array data
    }

    // Mengambil data prestasi yang sudah diverifikasi
    public function getVerifiedPrestasiByNim($nim)
    {
        $query = "
            SELECT 
                p.id AS id_prestasi,
                p.nama_lomba,
                k.nama AS nama_kategori,
                j.nama AS nama_juara,
                t.nama AS nama_tingkatan,
                p.sertifikat,
                p.karya,
                p.penyelenggara,
                p.surat_tugas,
                p.verifikasi,
                p.alasan_penolakan,
                p.poin AS total_poin,
                p.tanggal AS tanggal
            FROM 
                tabel_prestasi p
            LEFT JOIN 
                tabel_kategori k ON p.kategori = k.id
            LEFT JOIN 
                tabel_juara j ON p.juara = j.id
            LEFT JOIN 
                tabel_tingkatan t ON p.tingkatan = t.id
            LEFT JOIN 
                tabel_mahasiswa m ON p.nim = m.nim
            WHERE 
                p.nim = ? AND p.verifikasi = 'Disetujui';
        ";

        // Menyiapkan parameter untuk query
        $params = [$nim];

        // Menjalankan query
        $stmt = sqlsrv_query($this->conn, $query, $params);

        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true)); // Menampilkan error jika query gagal
        }

        // Mengambil semua hasil
        $result = [];
        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            $result[] = $row;
        }

        return $result; // Mengembalikan array data
    }
    public function addPrestasi($nim, $kategori, $nama_lomba, $juaraId, $tingkatanId, $penyelenggara, $sertifikat, $karya, $surat_tugas, $verifikasi, $tanggal)
    {
        // var_dump($nim, $kategori, $nama_lomba, $juaraId, $tingkatanId, $penyelenggara, $sertifikat, $karya, $surat_tugas, $verifikasi, $tanggal);
        // die;
        // Ambil poin juara
        $queryJuara = "SELECT poin FROM tabel_juara WHERE id = ?";
        $stmtJuara = sqlsrv_query($this->conn, $queryJuara, [$juaraId]);
        if ($stmtJuara === false) {
            die("Error fetching juara points: " . print_r(sqlsrv_errors(), true));
        }
        $juara = sqlsrv_fetch_array($stmtJuara, SQLSRV_FETCH_ASSOC);

        // Ambil poin tingkatan
        $queryTingkatan = "SELECT poin FROM tabel_tingkatan WHERE id = ?";
        $stmtTingkatan = sqlsrv_query($this->conn, $queryTingkatan, [$tingkatanId]);
        if ($stmtTingkatan === false) {
            die("Error fetching tingkatan points: " . print_r(sqlsrv_errors(), true));
        }
        $tingkatan = sqlsrv_fetch_array($stmtTingkatan, SQLSRV_FETCH_ASSOC);

        // Hitung total poin
        $totalPoin = $juara['poin'] + $tingkatan['poin'];

        // Query untuk memasukkan data prestasi
        $query = "
    INSERT INTO tabel_prestasi (nim, kategori, nama_lomba, juara, tingkatan, penyelenggara, sertifikat, karya, surat_tugas, verifikasi, tanggal, poin) 
              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $params = [
            $nim,
            $kategori,
            $nama_lomba,
            $juaraId,
            $tingkatanId,
            $penyelenggara,
            $sertifikat,
            $karya,
            $surat_tugas,
            $verifikasi,
            $tanggal,
            $totalPoin
        ];

        // Menjalankan query
        $stmt = sqlsrv_query($this->conn, $query, $params);

        if ($stmt === false) {
            die("Error executing query: " . print_r(sqlsrv_errors(), true));
        }

        return true; // Data berhasil ditambahkan
    }

    public function updatePrestasi($idPrestasi, $nim, $kategori, $nama_lomba, $juaraId, $tingkatanId, $penyelenggara, $sertifikat, $karya, $surat_tugas, $verifikasi, $tanggal)
    {
        // Ambil poin juara
        $queryJuara = "SELECT poin FROM tabel_juara WHERE id = ?";
        $stmtJuara = sqlsrv_query($this->conn, $queryJuara, [$juaraId]);
        if ($stmtJuara === false) {
            die("Error fetching juara points: " . print_r(sqlsrv_errors(), true));
        }
        $juara = sqlsrv_fetch_array($stmtJuara, SQLSRV_FETCH_ASSOC);

        // Ambil poin tingkatan
        $queryTingkatan = "SELECT poin FROM tabel_tingkatan WHERE id = ?";
        $stmtTingkatan = sqlsrv_query($this->conn, $queryTingkatan, [$tingkatanId]);
        if ($stmtTingkatan === false) {
            die("Error fetching tingkatan points: " . print_r(sqlsrv_errors(), true));
        }
        $tingkatan = sqlsrv_fetch_array($stmtTingkatan, SQLSRV_FETCH_ASSOC);

        // Hitung total poin
        $totalPoin = $juara['poin'] + $tingkatan['poin'];

        // Query untuk memperbarui data prestasi
        $query = "
    UPDATE tabel_prestasi 
    SET 
        kategori = ?, 
        nama_lomba = ?, 
        juara = ?, 
        tingkatan = ?, 
        penyelenggara = ?, 
        sertifikat = ?, 
        karya = ?, 
        surat_tugas = ?, 
        verifikasi = ?, 
        tanggal = ?, 
        poin = ?
    WHERE id = ? AND nim = ?";

        // Siapkan parameter untuk query update
        $params = [
            $kategori,
            $nama_lomba,
            $juaraId,
            $tingkatanId,
            $penyelenggara,
            $sertifikat,
            $karya,
            $surat_tugas,
            $verifikasi,
            $tanggal,
            $totalPoin,
            $idPrestasi,
            $nim
        ];

        // Menjalankan query
        $stmt = sqlsrv_query($this->conn, $query, $params);

        if ($stmt === false) {
            die("Error executing query: " . print_r(sqlsrv_errors(), true));
        }

        return true; // Data berhasil diperbarui
    }


    public function getPrestasiById($id)
    {
        $query = "SELECT * FROM tabel_prestasi WHERE id = ?";
        $stmt = sqlsrv_query($this->conn, $query, [$id]);

        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
        }

        return sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
    }
}
