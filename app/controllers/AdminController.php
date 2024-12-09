<?php

class AdminController
{
    public function adminDashboard()
    {
        echo "Dashbord Admin";
        die;
        session_start();

        // Pastikan user adalah admin
        if ($_SESSION['role'] !== 'admin') {
            header("Location: index.php?controller=auth&action=login");
            exit();
        }

        // Tampilkan view dashboard admin
        include_once __DIR__ . '/../views/admin/dashboard-admin.php';
    }

    public function viewKelolaMhs()
    {
        echo "Dashbord viewKelolaMhs Admin";
        die;
        session_start();

        // Pastikan user adalah mahasiswa
        if ($_SESSION['role'] !== 'admin') {
            header("Location: index.php?controller=auth&action=login");
            exit();
        }

        $nim = $_SESSION['user']['nim'];

        // Logika untuk menampilkan dashboard mahasiswa
        include_once __DIR__ . '/../views/admin/manajemenData/viewKelolaMhs.php';
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
}
