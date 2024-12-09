<?php

include_once __DIR__ . '/../controllers/AdminController.php';
include_once __DIR__ . '/../controllers/MhsController.php';

class DashboardController
{
    public function renderDashboard()
    {
        $adminController = new AdminController();
        $mhsController = new MhsController();

        session_start();

        // Pastikan user sudah login
        if (!isset($_SESSION['role'])) {
            // Redirect ke halaman login jika belum login
            header("Location: index.php?controller=auth&action=login");
            exit();
        }

        // Render dashboard berdasarkan peran user
        try {
            if ($_SESSION['role'] === 'admin') {
                $adminController->adminDashboard();
            } elseif ($_SESSION['role'] === 'mahasiswa') {
                $mhsController->mahasiswaDashboard();
            } else {
                // Jika role tidak valid
                throw new Exception("Role tidak valid: " . htmlspecialchars($_SESSION['role']));
            }
        } catch (Exception $e) {
            // Tangani error, seperti mencatat log atau menampilkan pesan
            error_log($e->getMessage());
            echo "Terjadi kesalahan saat memuat dashboard. Silakan coba lagi.";
        }
    }
}
