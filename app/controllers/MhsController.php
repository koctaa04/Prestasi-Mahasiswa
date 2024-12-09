<?php
include_once __DIR__ . '/../models/Prestasi.php';
include_once __DIR__ . '/../models/InfoLomba.php';
include_once __DIR__ . '/../models/User.php';



class MhsController
{
    private $prestasi;
    private $infoLomba;
    private $user;
    public function __construct()
    {
        // // Inisialisasi model
        // $this->prestasi = new PrestasiModel();
        // $this->infoLomba = new InfoLombaModel();
        // $this->user = new UserModel();
    }



    public function mahasiswaDashboard()
    {
                echo "Dashboard Mahasiswa";
        echo realpath(__DIR__ . '/../models/PrestasiModel.php'); // Cek jalur absolut
die;
//         echo "Dashboard Mahasiswa";
//         die;

        session_start();

        // Pastikan user adalah mahasiswa
        if ($_SESSION['role'] !== 'mahasiswa') {
            header("Location: index.php?controller=auth&action=login");
            exit();
        }

        $nim = $_SESSION['user']['nim'];

        $total_lomba = $this->prestasi->getTotalPrestasiVerifiedbyNim($nim);
        $lomba_ditolak = $this->prestasi->getTotalPrestasiDitolakbyNim($nim);
        $myRanking = $this->prestasi->getRankingMahasiswaByNim($nim);

        $info_lomba_list = $this->infoLomba->getLombaByNim($nim);
        $prestasi_list = $this->prestasi->getPrestasiByMahasiswa($nim);
        $user = $this->user->getMahasiswaByNim($nim);

        // Logika untuk menampilkan dashboard mahasiswa
        include_once __DIR__ . '/../views/mahasiswa/dashboard-mahasiswa.php';
    }

    public function viewPrestasi()
    {
        echo "Dashbord viewPrestasi Mahasiswa";
        die;
        session_start();

        // Pastikan user adalah mahasiswa
        if ($_SESSION['role'] !== 'mahasiswa') {
            header("Location: index.php?controller=auth&action=login");
            exit();
        }

        $nim = $_SESSION['user']['nim'];

        // Logika untuk menampilkan dashboard mahasiswa
        include_once __DIR__ . '/../views/mahasiswa/prestasi-mahasiswa.php';
    }


    public function viewInformasiLomba()
    {
        echo "Dashbord viewInformasiLomba Mahasiswa";
        die;
        session_start();

        // Pastikan user adalah mahasiswa
        if ($_SESSION['role'] !== 'mahasiswa') {
            header("Location: index.php?controller=auth&action=login");
            exit();
        }

        $nim = $_SESSION['user']['nim'];

        // Logika untuk menampilkan dashboard mahasiswa
        include_once __DIR__ . '/../views/mahasiswa/info-lomba-mahasiswa.php';
    }

    public function viewProfilMahasiswa()
    {
        echo "Dashbord viewProfilMahasiswa Mahasiswa";
        die;
        session_start();

        // Pastikan user adalah mahasiswa
        if ($_SESSION['role'] !== 'mahasiswa') {
            header("Location: index.php?controller=auth&action=login");
            exit();
        }

        $nim = $_SESSION['user']['nim'];

        // Logika untuk menampilkan dashboard mahasiswa
        include_once __DIR__ . '/../views/mahasiswa/profile-mahasiswa.php';
    }
}
