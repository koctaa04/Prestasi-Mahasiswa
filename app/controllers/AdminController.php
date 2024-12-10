<?php
include_once __DIR__ . '/../models/Database.php';

include_once __DIR__ . '/../models/Category.php';
include_once __DIR__ . '/../models/Juara.php';
include_once __DIR__ . '/../models/Tingkatan.php';
include_once __DIR__ . '/../models/Prestasi.php';
include_once __DIR__ . '/../models/InfoLomba.php';
include_once __DIR__ . '/../models/User.php';

class AdminController
{
    private $prestasi;
    private $category;
    private $juara;
    private $tingkatan;
    private $infoLomba;
    private $user;
    public function __construct()
    {
        // Inisialisasi model
        $database = new Database();
        $db = $database->getConnection();
        $this->prestasi = new Prestasi($db);
        $this->category = new Category($db);
        $this->juara = new Juara($db);
        $this->tingkatan = new Tingkatan($db);
        $this->infoLomba = new InfoLomba($db);
        $this->user = new User($db);
    }
    public function adminDashboard()
    {
        // Pastikan user adalah admin
        if ($_SESSION['role'] !== 'admin') {
            header("Location: index.php?controller=auth&action=login");
            exit();
        }

        // untuk 4 card di atas
        $totalMahasiswa = $this->user->getTotalMahasiswa();
        $totalPrestasiVerified = $this->prestasi->getTotalPrestasiVerified();
        $totalPrestasiUnverified = $this->prestasi->getTotalPrestasiUnverified();
        $totalLombaUnverified = $this->infoLomba->getTotalLombaUnverified();

        // Top 5 Mahasiswa
        $topMhs = $this->user->getMahasiswaTop(5);

        // info kelola
        $totalTingkatan = $this->tingkatan->getTotalTingkatan();
        $totalKategori = $this->category->getTotalKategori();
        $totalJuara = $this->juara->getTotalJuara();

        // Tampilkan view dashboard admin
        include_once __DIR__ . '/../views/admin/dashboard-admin.php';
    }

    public function viewKelolaMhs()
    {
        session_start();
        // Pastikan user adalah mahasiswa
        if ($_SESSION['role'] !== 'admin') {
            header("Location: index.php?controller=auth&action=login");
            exit();
        }

        $mahasiswa = $this->user->getAllMahasiswa();

        // Logika untuk menampilkan dashboard mahasiswa
        include_once __DIR__ . '/../views/admin/manajemen-data/Kelola-Mahasiswa.php';
    }
    public function viewKelolaDosen()
    {
        session_start();

        // Pastikan user adalah mahasiswa
        if ($_SESSION['role'] !== 'admin') {
            header("Location: index.php?controller=auth&action=login");
            exit();
        }

        $dosen = $this->user->getAllDosen();

        // Logika untuk menampilkan dashboard mahasiswa
        include_once __DIR__ . '/../views/admin/manajemen-data/Kelola-Dosen.php';
    }
    public function viewKelolaJurusan()
    {
        echo "Dashbord viewKelolaJurusan Admin";
        die;
        session_start();

        // Pastikan user adalah mahasiswa
        if ($_SESSION['role'] !== 'admin') {
            header("Location: index.php?controller=auth&action=login");
            exit();
        }

        $nim = $_SESSION['user']['nim'];

        // Logika untuk menampilkan dashboard mahasiswa
        include_once __DIR__ . '/../views/admin/manajemenData/viewKelolaJurusan.php';
    }
    public function viewPrestasiVerif()
    {
        echo "Dashbord viewPrestasiVerif Admin";
        die;
        session_start();

        // Pastikan user adalah mahasiswa
        if ($_SESSION['role'] !== 'admin') {
            header("Location: index.php?controller=auth&action=login");
            exit();
        }

        $lomba = $this->infoLomba->getVerifiedLomba();

        // Logika untuk menampilkan dashboard mahasiswa
        include_once __DIR__ . '/../views/admin/prestasi/lomba-verif.php';
    }

    public function viewPrestasiUnverif()
    {
        echo "Dashbord viewPrestasiUnverif Admin";
        die;
        session_start();

        // Pastikan user adalah mahasiswa
        if ($_SESSION['role'] !== 'admin') {
            header("Location: index.php?controller=auth&action=login");
            exit();
        }
        $lomba = $this->infoLomba->getUnverifiedLomba();

        // Logika untuk menampilkan dashboard mahasiswa
        include_once __DIR__ . '/../views/admin/prestasi/lomba-Unverif.php';
    }

    public function viewKategori()
    {
        echo "Dashbord viewKategori Admin";
        die;
        session_start();

        // Pastikan user adalah mahasiswa
        if ($_SESSION['role'] !== 'admin') {
            header("Location: index.php?controller=auth&action=login");
            exit();
        }

        $nim = $_SESSION['user']['nim'];

        // Logika untuk menampilkan dashboard mahasiswa
        include_once __DIR__ . '/../views/admin/prestasi/viewKategori.php';
    }
    public function viewTingkatan()
    {
        echo "Dashbord viewTingkatan Admin";
        die;
        session_start();

        // Pastikan user adalah mahasiswa
        if ($_SESSION['role'] !== 'admin') {
            header("Location: index.php?controller=auth&action=login");
            exit();
        }

        $nim = $_SESSION['user']['nim'];

        // Logika untuk menampilkan dashboard mahasiswa
        include_once __DIR__ . '/../views/admin/prestasi/viewTingkatan.php';
    }
    public function viewJuara()
    {
        echo "Dashbord viewJuara Admin";
        die;
        session_start();

        // Pastikan user adalah mahasiswa
        if ($_SESSION['role'] !== 'admin') {
            header("Location: index.php?controller=auth&action=login");
            exit();
        }

        $nim = $_SESSION['user']['nim'];

        // Logika untuk menampilkan dashboard mahasiswa
        include_once __DIR__ . '/../views/admin/prestasi/viewJuara.php';
    }
    public function viewLombaVerif()
    {
        session_start();

        // Pastikan user adalah mahasiswa
        if ($_SESSION['role'] !== 'admin') {
            header("Location: index.php?controller=auth&action=login");
            exit();
        }

        $info_lomba = $this->infoLomba->getVerifiedLomba();

        // Logika untuk menampilkan dashboard mahasiswa
        include_once __DIR__ . '/../views/admin/info-lomba/lomba-verif.php';
    }
    public function viewLombaUnverif()
    {
        session_start();

        // Pastikan user adalah mahasiswa
        if ($_SESSION['role'] !== 'admin') {
            header("Location: index.php?controller=auth&action=login");
            exit();
        }

        $info_lomba = $this->infoLomba->getUnverifiedLomba();
        // var_dump($lomba);
        // die;

        // Logika untuk menampilkan dashboard mahasiswa
        include_once __DIR__ . '/../views/admin/info-lomba/lomba-Unverif.php';
    }
    public function viewProfil()
    {
        echo "Dashbord viewProfil Admin";
        die;
        session_start();

        // Pastikan user adalah mahasiswa
        if ($_SESSION['role'] !== 'admin') {
            header("Location: index.php?controller=auth&action=login");
            exit();
        }

        $nim = $_SESSION['user']['nim'];

        // Logika untuk menampilkan dashboard mahasiswa
        include_once __DIR__ . '/../views/admin/viewProfil.php';
    }



    // CRUD Kelola Mahasiswa
    public function addMahasiswa()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // var_dump($_POST);
            // die;
            $nim = $_POST['nim'];
            $nama = $_POST['nama'];
            $password = $_POST['password'];
            $program_studi = $_POST['program_studi'];
            $jurusan = $_POST['jurusan'];
            $angkatan = $_POST['angkatan'];

            // Menambahkan mahasiswa ke database
            $success = $this->user->addMahasiswa($nim, $nama, $password, $program_studi, $jurusan, $angkatan);
            session_start();
            if ($success) {
                $_SESSION['message'] = "Data mahasiswa berhasil ditambahkan!";
            } else {
                $_SESSION['message'] = "Terjadi kesalahan, coba lagi.";
            }
        }

        header("Location: index.php?controller=admin&action=viewKelolaMhs");
    }
    public function editMahasiswa()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nim = $_POST['nim'];
            $nama = $_POST['nama'];
            $password = $_POST['password'];
            $program_studi = $_POST['program_studi'];
            $jurusan = $_POST['jurusan'];
            $angkatan = $_POST['angkatan'];

            $success = $this->user->updateMahasiswa($nim, $nama, $password,  $program_studi, $jurusan, $angkatan);
            session_start();

            if ($success) {
                $_SESSION['message'] = "Mahsiswa dengan NIM $nim berhasil diedit!";
            } else {
                $_SESSION['message'] = "Terjadi kesalahan, coba lagi.";
            }
        }

        header("Location: index.php?controller=admin&action=viewKelolaMhs");
    }
    public function deleteMahasiswa()
    {
        if (isset($_POST['nim'])) {
            $nim = $_POST['nim'];

            $success = $this->user->deleteMahasiswa($nim);

            session_start();
            if ($success) {
                $_SESSION['message'] = "Mahsiswa dengan NIM $nim berhasil dihapus!";
            } else {
                $_SESSION['message'] = "Terjadi kesalahan, coba lagi.";
            }
        }

        header("Location: index.php?controller=admin&action=viewKelolaMhs");
    }

    // CRUD KELOLA ADMIN
    public function addDosen()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // var_dump($_POST);
            // die;
            $nip = $_POST['nip'];
            $nama = $_POST['nama'];

            // Menambahkan mahasiswa ke database
            $success = $this->user->addDosen($nip, $nama);
            session_start();

            if ($success) {
                $_SESSION['message'] = "Prestasi berhasil ditambahkan!";
            } else {
                $_SESSION['message'] = "Terjadi kesalahan, coba lagi.";
            }
        }
        header("Location: index.php?controller=admin&action=viewKelolaDosen");
    }

    public function editDosen()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nip = $_POST['nip'];
            $nama = $_POST['nama'];

            $success = $this->user->updateDosen($nip, $nama);
            session_start();

            if ($success) {
                $_SESSION['message'] = "Mahsiswa dengan NIP $nip berhasil diedit!";
            } else {
                $_SESSION['message'] = "Terjadi kesalahan, coba lagi.";
            }
        }

        header("Location: index.php?controller=admin&action=viewKelolaDosen");
    }

    // Fungsi untuk menghapus Dosen
    public function deleteDosen()
    {
        if (isset($_POST['nip'])) {
            $nip = $_POST['nip'];

            $success = $this->user->deleteDosen($nip);

            session_start();
            if ($success) {
                $_SESSION['message'] = "Mahsiswa dengan NIP $nip berhasil dihapus!";
            } else {
                $_SESSION['message'] = "Terjadi kesalahan, coba lagi.";
            }
        }

        header("Location: index.php?controller=admin&action=viewKelolaDosen");
    }



    // KELOLA INFO LOMBA
    public function verifyInfoLomba()
    {


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $id = $_POST['id'];
            $status = "Terverifikasi";

            $success = $this->infoLomba->verifyLomba($id, $status);
            session_start();

            if ($success) {
                $_SESSION['message'] = "Daftar lomba berhasil diverifikasi!";
            } else {
                $_SESSION['message'] = "Terjadi kesalahan, coba lagi.";
            }
        }
        header("Location: index.php?controller=admin&action=viewLombaVerif");
        exit();
    }
    public function tolakInfoLomba()
    {


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $id = $_POST['id'];
            $alasan = $_POST['alasan_penolakan'];

            $success = $this->infoLomba->rejectInfoLomba($id, $alasan);
            session_start();

            if ($success) {
                $_SESSION['message'] = "Daftar lomba berhasil ditolak!";
            } else {
                $_SESSION['message'] = "Terjadi kesalahan, coba lagi.";
            }
        }
        header("Location: index.php?controller=admin&action=viewLombaUnverif");
        exit();
    }
}
