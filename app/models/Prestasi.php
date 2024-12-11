<?php
class Prestasi
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db; // $db adalah koneksi SQL Server
    }

    public function getPrestasiByVerificationStatus($isVerified)
    {

        $query = $isVerified
            ? "SELECT 
            p.id AS id_prestasi,
			p.nim,
			m.nama AS nama_mahasiswa,
			p.nama_lomba,
            k.nama AS nama_kategori,
            j.nama AS nama_juara,
			p.juara AS id_juara,
			p.tingkatan AS id_tingkatan,
			t.nama AS nama_tingkatan,
			p.verifikasi,
            p.tanggal,
            p.penyelenggara
        FROM tabel_prestasi p
        LEFT JOIN tabel_kategori k ON p.kategori = k.id
        LEFT JOIN tabel_juara j ON p.juara = j.id
        LEFT JOIN tabel_tingkatan t ON p.tingkatan = t.id
		LEFT JOIN tabel_mahasiswa m ON p.nim = m.nim
        WHERE p.verifikasi = 'Disetujui'

            "
            : "SELECT p.id AS id_prestasi,
			m.nama AS nama_mahasiswa,
			p.nama_lomba,
            k.nama AS nama_kategori,
            j.nama AS nama_juara,
			t.nama AS nama_tingkatan,
			p.verifikasi,
			p.alasan_penolakan,
			p.tanggal,
			p.poin,
			p.sertifikat,
			p.surat_tugas,
            p.karya
        FROM tabel_prestasi p
        LEFT JOIN tabel_kategori k ON p.kategori = k.id
        LEFT JOIN tabel_juara j ON p.juara = j.id
        LEFT JOIN tabel_tingkatan t ON p.tingkatan = t.id
		LEFT JOIN tabel_mahasiswa m ON p.nim = m.nim
        WHERE verifikasi = 'Ditolak' OR verifikasi = 'Pending'";

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

    public function getTotalPrestasiUnverified()
    {
        $query = "SELECT COUNT(*) AS total_prestasi FROM tabel_prestasi where verifikasi = 'Pending' or verifikasi = 'Ditolak'";
        $stmt = sqlsrv_query($this->conn, $query);

        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
        }

        $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
        return $row['total_prestasi'];
    }

    public function getTotalPrestasiVerified()
    {
        $query = "SELECT COUNT(*) AS total_prestasi FROM tabel_prestasi where verifikasi = 'Disetujui'";
        $stmt = sqlsrv_query($this->conn, $query);

        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
        }

        $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
        return $row['total_prestasi'];
    }

    public function getTotalPrestasiVerifiedbyNim($nim)
    {
        // Query untuk mendapatkan total prestasi yang sudah disetujui
        $query = "SELECT COUNT(DISTINCT p.id) AS total_lomba
                  FROM tabel_prestasi p
                  JOIN tabel_mahasiswa m ON p.nim = m.nim
                  WHERE m.nim = ? AND p.verifikasi = 'Disetujui'";

        // Menyiapkan parameter untuk query
        $params = [$nim];

        // Menjalankan query
        $stmt = sqlsrv_query($this->conn, $query, $params);

        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true)); // Menampilkan error jika query gagal
        }

        // Mengambil hasil dari query
        $prestasi = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

        // Mengembalikan total prestasi yang disetujui
        return $prestasi['total_lomba'];
    }

    public function getTotalPrestasiDitolakbyNim($nim)
    {
        $query = "SELECT COUNT(*) AS total_prestasi_ditolak
            FROM tabel_prestasi p
            JOIN tabel_mahasiswa m ON p.nim = m.nim
            WHERE m.nim = ? AND p.verifikasi = 'Ditolak';
        ;
        ";
        $params = [$nim];
        $stmt = sqlsrv_query($this->conn, $query, $params);

        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
        }
        // Mengambil hasil dari query
        $prestasi = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

        // Mengembalikan total prestasi yang disetujui
        return $prestasi['total_prestasi_ditolak'];
    }

    public function getRankingMahasiswaByNim($nim)
    {
        $query = "
        SELECT ranking FROM (
            SELECT 
                m.nim, 
                m.nama, 
                m.total_poin,
                ROW_NUMBER() OVER (ORDER BY m.total_poin DESC) AS ranking
            FROM tabel_mahasiswa m
        ) AS ranking_table
        WHERE nim = ?;
        ";
        $params = [$nim];
        $stmt = sqlsrv_query($this->conn, $query, $params);

        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
        }
        $result = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

        return $result['ranking'];
    }

    public function getPrestasiByMahasiswa($nim)
    {
        $query = "SELECT 
            p.id AS id_prestasi,
			p.nim,
			m.nama AS nama_mahasiswa,
			p.nama_lomba,
            k.nama AS nama_kategori,
            j.nama AS nama_juara,
			p.juara AS id_juara,
			p.tingkatan AS id_tingkatan,
			t.nama AS nama_tingkatan,
			p.verifikasi,
			p.alasan_penolakan,
            p.poin AS total_poin,
            p.tanggal AS tanggal,
			p.penyelenggara
        FROM tabel_prestasi p
        LEFT JOIN tabel_kategori k ON p.kategori = k.id
        LEFT JOIN tabel_juara j ON p.juara = j.id
        LEFT JOIN tabel_tingkatan t ON p.tingkatan = t.id
		LEFT JOIN tabel_mahasiswa m ON p.nim = m.nim
        WHERE p.nim = ?";
        $params = [$nim];
        $stmt = sqlsrv_query($this->conn, $query, $params);

        $prestasi = [];
        if ($stmt !== false) {
            while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                $prestasi[] = $row;
            }
        }

        return $prestasi;
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
                p.nim = ? AND p.verifikasi = 'Pending' OR p.verifikasi = 'Ditolak';
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


    public function verifyPrestasi($id)
    {
        // Ambil data prestasi berdasarkan ID
        $querySelect = "SELECT nim, poin FROM tabel_prestasi WHERE id = ?";
        $stmtSelect = sqlsrv_query($this->conn, $querySelect, [$id]);

        if ($stmtSelect === false) {
            die(print_r(sqlsrv_errors(), true));
        }

        $prestasi = sqlsrv_fetch_array($stmtSelect, SQLSRV_FETCH_ASSOC);

        if (!$prestasi) {
            die("Prestasi dengan ID tersebut tidak ditemukan.");
        }

        $nim = $prestasi['nim'];
        $poinPrestasi = $prestasi['poin'];

        // Tambahkan poin prestasi ke poin mahasiswa
        $queryUpdateMahasiswa = "UPDATE tabel_mahasiswa SET total_poin = total_poin + ? WHERE nim = ?";
        $paramsUpdateMahasiswa = [$poinPrestasi, $nim];
        $stmtUpdateMahasiswa = sqlsrv_query($this->conn, $queryUpdateMahasiswa, $paramsUpdateMahasiswa);

        if ($stmtUpdateMahasiswa === false) {
            die(print_r(sqlsrv_errors(), true));
        }
        echo "sudah menambahkan poin prestasi ke poin mahasiswa";


        // Ubah status verifikasi prestasi menjadi 'Disetujui'
        $queryUpdatePrestasi = "UPDATE tabel_prestasi SET verifikasi = 'Disetujui' WHERE id = ?";
        $stmtUpdatePrestasi = sqlsrv_query($this->conn, $queryUpdatePrestasi, [$id]);

        if ($stmtUpdatePrestasi === false) {
            die(print_r(sqlsrv_errors(), true));
        }
        return true;
    }

    public function rejectPrestasi($id, $alasan)
    {
        // Update status dan alasan penolakan di database
        $query = "UPDATE tabel_prestasi SET verifikasi = 'Ditolak', alasan_penolakan = ? WHERE id = ?";
        $params = [$alasan, $id];
        $stmt = sqlsrv_query($this->conn, $query, $params);

        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
        }

        return true;
    }



    // untuk chart
    public function getStatistikPrestasi($tahun)
    {
        $query = "
            SELECT MONTH(tanggal) AS bulan, COUNT(*) AS total
            FROM tabel_prestasi
            WHERE YEAR(tanggal) = ?
            GROUP BY MONTH(tanggal)
            ORDER BY bulan ASC";
        $params = [$tahun];
        $stmt = sqlsrv_query($this->conn, $query, $params);

        $data = [];
        if ($stmt === false) {
            die("Query error: " . print_r(sqlsrv_errors(), true));
        }

        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            $data[(int)$row['bulan']] = (int)$row['total'];
        }

        // Isi bulan kosong dengan nilai 0
        for ($i = 1; $i <= 12; $i++) {
            $data[$i] = $data[$i] ?? 0;
        }

        return $data;
    }
}
