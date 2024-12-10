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

        // KELOLA CRUD KELOLA MAHASISWA
        } elseif ($action === 'addMahasiswa') {
            $adminController->addMahasiswa();
        } elseif ($action === 'editMahasiswa') {
            $adminController->editMahasiswa();
        } elseif ($action === 'deleteMahasiswa') {
            $adminController->deleteMahasiswa();
        
        // KELOLA CRUD KELOLA MAHASISWA
        } elseif ($action === 'addDosen') {
            $adminController->addDosen();
        } elseif ($action === 'editDosen') {
            $adminController->editDosen();
        } elseif ($action === 'deleteDosen') {
            $adminController->deleteDosen();

        // KELOLA CRUD INFO LOMBA
        } elseif ($action === 'tolakInfoLomba') {
            $adminController->tolakInfoLomba();
        } elseif ($action === 'verifyInfoLomba') {
            $adminController->verifyInfoLomba();
        
        // KELOLA CRUD INFO LOMBA
        } elseif ($action === 'tolakPrestasi') {
            $adminController->tolakPrestasi();
        } elseif ($action === 'verifyPrestasi') {
            $adminController->verifyPrestasi();
        } 
        
        
        else {
            $adminController->adminDashboard();
        }
        break;

    case 'mahasiswa':
        include_once __DIR__ . '/app/controllers/MhsController.php';
        $mhsController = new MhsController();

        // KELOLA VIEW
        if ($action === 'viewPrestasiVerif') {
            $mhsController->viewPrestasiVerif();
        } elseif ($action === 'viewPrestasiUnverif') {
            $mhsController->viewPrestasiUnverif();
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
        
        
        // KELOLA ACTION PRESTASI
        elseif ($action === 'tambahPrestasi') {
            $mhsController->tambahPrestasi();
        } elseif ($action === 'editPrestasi') {
            $mhsController->editPrestasi();
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
