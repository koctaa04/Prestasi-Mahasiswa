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
        echo "Dashbord viewKelolaDosen Admin";
        die;
        session_start();

        // Pastikan user adalah mahasiswa
        if ($_SESSION['role'] !== 'admin') {
            header("Location: index.php?controller=auth&action=login");
            exit();
        }

        $nim = $_SESSION['user']['nim'];

        // Logika untuk menampilkan dashboard mahasiswa
        include_once __DIR__ . '/../views/admin/manajemenData/viewKelolaDosen.php';
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

        $nim = $_SESSION['user']['nim'];

        // Logika untuk menampilkan dashboard mahasiswa
        include_once __DIR__ . '/../views/admin/prestasi/viewPrestasiVerif.php';
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

        $nim = $_SESSION['user']['nim'];

        // Logika untuk menampilkan dashboard mahasiswa
        include_once __DIR__ . '/../views/admin/prestasi/viewPrestasiUnverif.php';
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
        echo "Dashbord viewLombaVerif Admin";
        die;
        session_start();

        // Pastikan user adalah mahasiswa
        if ($_SESSION['role'] !== 'admin') {
            header("Location: index.php?controller=auth&action=login");
            exit();
        }

        $nim = $_SESSION['user']['nim'];

        // Logika untuk menampilkan dashboard mahasiswa
        include_once __DIR__ . '/../views/admin/infoLomba/viewLombaVerif.php';
    }
    public function viewLombaUnverif()
    {
        echo "Dashbord viewLombaUnverif Admin";
        die;
        session_start();

        // Pastikan user adalah mahasiswa
        if ($_SESSION['role'] !== 'admin') {
            header("Location: index.php?controller=auth&action=login");
            exit();
        }

        $nim = $_SESSION['user']['nim'];

        // Logika untuk menampilkan dashboard mahasiswa
        include_once __DIR__ . '/../views/admin/infoLomba/viewLombaUnverif.php';
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



    // CRUD Kelol Mahasiswa
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

    // Fungsi untuk menghapus mahasiswa
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
}
