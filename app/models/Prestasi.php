<?php
class Prestasi
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
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

    public function addPrestasi($nim, $kategori, $nama_lomba, $juaraId, $tingkatanId, $penyelenggara, $sertifikat, $karya, $surat_tugas, $verifikasi, $tanggal)
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
            p.poin AS total_poin
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
			p.alasan_penolakan
        FROM tabel_prestasi p
        LEFT JOIN tabel_kategori k ON p.kategori = k.id
        LEFT JOIN tabel_juara j ON p.juara = j.id
        LEFT JOIN tabel_tingkatan t ON p.tingkatan = t.id
		LEFT JOIN tabel_mahasiswa m ON p.nim = m.nim
        WHERE p.verifikasi = 'Disetujui'

            "
            : "SELECT p.id AS id_prestasi,
			p.nim,
			m.nama AS nama_mahasiswa,
			p.nama_lomba,
            k.nama AS nama_kategori,
            j.nama AS nama_juara,
			p.juara AS id_juara,
			p.tingkatan AS id_tingkatan,
			t.nama AS nama_tingkatan,
			p.verifikasi,
			p.alasan_penolakan
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

        echo $nim, $poinPrestasi;

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
        echo "Prestasi dengan ID $id telah disetujui.";

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

        // Update data prestasi berdasarkan ID
        public function updatePrestasi($id, $data)
        {
            $query = "UPDATE tabel_prestasi
                      SET nama_lomba = ?, kategori = ?, juara = ?, tingkatan = ?, penyelenggara = ?, sertifikat = ?, karya = ?, surat_tugas = ?, tanggal = ?, verifikasi = 'Pending'
                      WHERE id = ?";
            $params = [
                $data['nama_lomba'], $data['kategori'], $data['juara'], $data['tingkatan'], $data['penyelenggara'],
                $data['sertifikat'], $data['karya'], $data['surat_tugas'], $data['tanggal'], $id
            ];
    
            $stmt = sqlsrv_query($this->conn, $query, $params);
    
            if ($stmt === false) {
                die(print_r(sqlsrv_errors(), true));
            }
    
            return true;
        }
}
