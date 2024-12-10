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
        session_start();

        // Pastikan user adalah mahasiswa
        if ($_SESSION['role'] !== 'admin') {
            header("Location: index.php?controller=auth&action=login");
            exit();
        }

        $prestasiVerif = $this->prestasi->getPrestasiByVerificationStatus(true);

        // Logika untuk menampilkan dashboard mahasiswa
        include_once __DIR__ . '/../views/admin/prestasi/prestasi-verif.php';
    }

    public function viewPrestasiUnverif()
    {
        session_start();

        // Pastikan user adalah mahasiswa
        if ($_SESSION['role'] !== 'admin') {
            header("Location: index.php?controller=auth&action=login");
            exit();
        }
        $prestasiUnverif = $this->prestasi->getPrestasiByVerificationStatus(false);
        // var_dump($prestasiUnverif);
        // die;

        // Logika untuk menampilkan dashboard mahasiswa
        include_once __DIR__ . '/../views/admin/prestasi/prestasi-unverif.php';
    }

    public function viewKategori()
    {
        session_start();

        // Pastikan user adalah mahasiswa
        if ($_SESSION['role'] !== 'admin') {
            header("Location: index.php?controller=auth&action=login");
            exit();
        }

        $categories = $this->category->getAllCategories();
        // Logika untuk menampilkan dashboard mahasiswa
        include_once __DIR__ . '/../views/admin/prestasi/Kelola-Kategori.php';
    }
    public function viewTingkatan()
    {
        session_start();

        // Pastikan user adalah mahasiswa
        if ($_SESSION['role'] !== 'admin') {
            header("Location: index.php?controller=auth&action=login");
            exit();
        }

        $tingkatans = $this->tingkatan->getAllTingkatan();

        // Logika untuk menampilkan dashboard mahasiswa
        include_once __DIR__ . '/../views/admin/prestasi/Kelola-Tingkatan.php';
    }
    public function viewJuara()
    {
        session_start();

        // Pastikan user adalah mahasiswa
        if ($_SESSION['role'] !== 'admin') {
            header("Location: index.php?controller=auth&action=login");
            exit();
        }

        $juaras = $this->juara->getAllJuara();

        // Logika untuk menampilkan dashboard mahasiswa
        include_once __DIR__ . '/../views/admin/prestasi/Kelola-Juara.php';
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
        // var_dump($info_lomba);
        // die;

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


    // KELOLA PRESTASI
    public function verifyPrestasi()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $id = $_POST['id'];

            $success = $this->prestasi->verifyPrestasi($id);
            session_start();

            if ($success) {
                $_SESSION['message'] = "Prestasi berhasil diverifikasi!";
            } else {
                $_SESSION['message'] = "Terjadi kesalahan, coba lagi.";
            }
        }
        header("Location: index.php?controller=admin&action=viewPrestasiVerif");
        exit();
    }

    public function tolakPrestasi()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $alasan = $_POST['alasan_penolakan'];

            $success = $this->prestasi->rejectPrestasi($id, $alasan);
            session_start();

            if ($success) {
                $_SESSION['message'] = "Prestasi berhasil ditolak!";
            } else {
                $_SESSION['message'] = "Terjadi kesalahan, coba lagi.";
            }
        }
        header("Location: index.php?controller=admin&action=viewPrestasiUnverif");
        exit();
    }



    // CRUD KATEGORI
    public function addKategori()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $name = htmlspecialchars($_POST['name_kategori']);
            $success = $this->category->addCategory($name);
            session_start();

            if ($success) {
                $_SESSION['message'] = "Kategori $name berhasil diedit!";
            } else {
                $_SESSION['message'] = "Terjadi kesalahan, coba lagi.";
            }
        }
        header("Location: index.php?controller=admin&action=viewKategori");
        exit();
    }

    public function editKategori()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $id = $_POST['id'];
            $name = htmlspecialchars($_POST['name_kategori']);

            $success = $this->category->updateCategory($id, $name);
            session_start();

            if ($success) {
                $_SESSION['message'] = "Kategori $name berhasil diedit!";
            } else {
                $_SESSION['message'] = "Terjadi kesalahan, coba lagi.";
            }
        }
        header("Location: index.php?controller=admin&action=viewKategori");
        exit();
    }

    public function deleteKategori()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // var_dump($_POST);
            // die;
            $id = $_POST['id'];
            $success = $this->category->deleteCategory($id);

            session_start();

            if ($success) {
                $_SESSION['message'] = "Kategori berhasil dihapus!";
            } else {
                $_SESSION['message'] = "Terjadi kesalahan, coba lagi.";
            }
        }
        header("Location: index.php?controller=admin&action=viewKategori");
        exit();
    }



    // CRUD TINGAKATAN
    public function addTingkatan()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $name = htmlspecialchars($_POST['name_tingkatan']);
            $poin = htmlspecialchars($_POST['poin_tingkatan']);
            $success = $this->tingkatan->addTingkatan($name, $poin);
            session_start();

            if ($success) {
                $_SESSION['message'] = "Kategori $name berhasil diedit!";
            } else {
                $_SESSION['message'] = "Terjadi kesalahan, coba lagi.";
            }
        }
        header("Location: index.php?controller=admin&action=viewTingkatan");
        exit();
    }

    public function editTingkatan()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $id = $_POST['id'];
            $name = htmlspecialchars($_POST['name_tingkatan']);
            $poin = htmlspecialchars($_POST['poin_tingkatan']);

            $success = $this->tingkatan->updateTingkatan($id, $name, $poin);
            session_start();

            if ($success) {
                $_SESSION['message'] = "Tingkatan $name berhasil diedit!";
            } else {
                $_SESSION['message'] = "Terjadi kesalahan, coba lagi.";
            }
        }
        header("Location: index.php?controller=admin&action=viewTingkatan");
        exit();
    }

    public function deleteTingkatan()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $success = $this->tingkatan->deleteTingkatan($id);

            session_start();

            if ($success) {
                $_SESSION['message'] = "Tingkatan berhasil dihapus!";
            } else {
                $_SESSION['message'] = "Terjadi kesalahan, coba lagi.";
            }
        }
        header("Location: index.php?controller=admin&action=viewTingkatan");
        exit();
    }
    // CRUD KATEGORI
    public function addJuara()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $name = htmlspecialchars($_POST['name_juara']);
            $poin = htmlspecialchars($_POST['poin_juara']);
            $success = $this->juara->addjuara($name, $poin);
            session_start();

            if ($success) {
                $_SESSION['message'] = "Kategori $name berhasil diedit!";
            } else {
                $_SESSION['message'] = "Terjadi kesalahan, coba lagi.";
            }
        }
        header("Location: index.php?controller=admin&action=viewJuara");
        exit();
    }

    public function editJuara()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $name = htmlspecialchars($_POST['name_juara']);
            $poin = htmlspecialchars($_POST['poin_juara']);

            $success = $this->juara->updatejuara($id, $name, $poin);
            session_start();

            if ($success) {
                $_SESSION['message'] = "Kategori $name berhasil diedit!";
            } else {
                $_SESSION['message'] = "Terjadi kesalahan, coba lagi.";
            }
        }
        header("Location: index.php?controller=admin&action=viewJuara");
        exit();
    }

    public function deleteJuara()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $id = $_POST['id'];
            $success = $this->juara->deletejuara($id);

            session_start();

            if ($success) {
                $_SESSION['message'] = "Kategori berhasil dihapus!";
            } else {
                $_SESSION['message'] = "Terjadi kesalahan, coba lagi.";
            }
        }
        header("Location: index.php?controller=admin&action=viewJuara");
        exit();
    }
}
