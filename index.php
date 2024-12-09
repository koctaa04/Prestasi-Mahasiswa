<?php
$controller = isset($_GET['controller']) ? $_GET['controller'] : 'home';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

switch ($controller) {
    case 'auth':
        include_once __DIR__ . '/app/controllers/AuthController.php';
        $authController = new AuthController();
        if ($action === 'login') {
            $authController->login();
        } elseif ($action === 'logout') {
            $authController->logout();
        }
        break;

    case 'dashboard':
        include_once __DIR__ . '/app/controllers/DashboardController.php';
        $dashboardController = new DashboardController();
        $dashboardController->renderDashboard();
        break;

    case 'admin':
        include_once __DIR__ . '/app/controllers/AdminController.php';
        $adminController = new AdminController();

        // KELOLA VIEW
        if ($action === 'viewKelolaMhs') {
            $adminController->viewKelolaMhs();
        } elseif ($action === 'viewKelolaDosen') {
            $adminController->viewKelolaDosen();
        } elseif ($action === 'viewKelolaJurusan') {
            $adminController->viewKelolaJurusan();
        } elseif ($action === 'viewPrestasiVerif') {
            $adminController->viewPrestasiVerif();
        } elseif ($action === 'viewPrestasiUnverif') {
            $adminController->viewPrestasiUnverif();
        } elseif ($action === 'viewKategori') {
            $adminController->viewKategori();
        } elseif ($action === 'viewTingkatan') {
            $adminController->viewTingkatan();
        } elseif ($action === 'viewJuara') {
            $adminController->viewJuara();
        } elseif ($action === 'viewLombaVerif') {
            $adminController->viewLombaVerif();
        } elseif ($action === 'viewLombaUnverif') {
            $adminController->viewLombaUnverif();
        } elseif ($action === 'viewProfil') {
            $adminController->viewProfil();
        } else {
            $adminController->adminDashboard();
        }
        break;

    case 'mahasiswa':
        include_once __DIR__ . '/app/controllers/MhsController.php';
        $mhsController = new MhsController();

        // KELOLA VIEW
        if ($action === 'viewPrestasi') {
            $mhsController->viewPrestasi();
        } elseif ($action === 'viewInformasiLomba') {
            $mhsController->viewInformasiLomba();
        } elseif ($action === 'viewProfilMahasiswa') {
            $mhsController->viewProfilMahasiswa();
        }
        
        // KELOLA ACTION INFORMASI LOMBA
        elseif ($action === 'addInfoLomba') {
            $mhsController->addInfoLomba();
        } elseif ($action === 'editInfoLomba') {
            $mhsController->editInfoLomba();
        } 
        
        else {
            $mhsController->mahasiswaDashboard();
        }
        break;


    default:
        include_once __DIR__ . '/app/controllers/HomeController.php';
        $homeController = new HomeController();
        $homeController->renderHome();
        break;
}
