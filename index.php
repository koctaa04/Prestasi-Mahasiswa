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

        if ($action === 'manageMahasiswa') {
            $dashboardController->manageMahasiswa();
        } elseif ($action === 'manageDosen') {
            $dashboardController->manageDosen();
        } 
        // Jika aksi yang diminta adalah verifyPrestasi, panggil method verifyPrestasi
        // elseif ($action === 'verifyPrestasi') {
        //     $dashboardController->verifyPrestasi();
        // } elseif ($action === 'addPrestasi') {
        //     $dashboardController->addPrestasi();
        // } elseif ($action === 'rejectPrestasi') {
        //     $id = isset($_GET['id']) ? $_GET['id'] : null;
        //     $dashboardController->rejectPrestasi($id);
        // } elseif ($action === 'rejectPrestasiSubmit') {
        //     $id = isset($_GET['id']) ? $_GET['id'] : null;
        //     $dashboardController->rejectPrestasiSubmit($id);
        // } elseif ($action === 'editPrestasiByMhs') {
        //     $id = isset($_GET['id']) ? $_GET['id'] : null;
        //     $dashboardController->editPrestasiByMhs($id);
        // }

        // INFO LOMBA
        // elseif ($action === 'viewLomba') {
        //     $dashboardController->viewLomba();
        // } elseif ($action === 'addLomba') {
        //     $dashboardController->addInfoLomba();
        // } elseif ($action === 'editLomba') {
        //     $id = isset($_GET['id']) ? $_GET['id'] : null;
        //     $dashboardController->editLomba($id);
        // } elseif ($action === 'deleteLomba') {
        //     $id = isset($_GET['id']) ? $_GET['id'] : null;
        //     $dashboardController->deleteLomba($id);
        // } elseif ($action === 'verifyLomba') {
        //     $dashboardController->verifyLomba();
        // } 

        // elseif ($action === 'rejectInfoLomba') {
        //     $id = isset($_GET['id']) ? $_GET['id'] : null;
        //     $dashboardController->rejectInfoLomba($id);
        // }

        // CATEGORY
        // elseif ($action === 'viewCategories') {
        //     $dashboardController->viewCategories();
        // } elseif ($action === 'addCategory') {
        //     $dashboardController->addCategory();
        // } elseif ($action === 'editCategory') {
        //     $id = isset($_GET['id']) ? $_GET['id'] : null;
        //     $dashboardController->editCategory($id);
        // } elseif ($action === 'deleteCategory') {
        //     $id = isset($_GET['id']) ? $_GET['id'] : null;
        //     $dashboardController->deleteCategory($id);
        // }

        // JUARA
        // elseif ($action === 'viewJuara') {
        //     $dashboardController->viewJuara();
        // } elseif ($action === 'addJuara') {
        //     $dashboardController->addJuara();
        // } elseif ($action === 'editJuara') {
        //     $id = isset($_GET['id']) ? $_GET['id'] : null;
        //     $dashboardController->editJuara($id);
        // } elseif ($action === 'deleteJuara') {
        //     $id = isset($_GET['id']) ? $_GET['id'] : null;
        //     $dashboardController->deleteJuara($id);
        // }

        // TINGKATAN
        // elseif ($action === 'viewTingkatan') {
        //     $dashboardController->viewTingkatan();
        // } elseif ($action === 'addTingkatan') {
        //     $dashboardController->addTingkatan();
        // } elseif ($action === 'editTingkatan') {
        //     $id = isset($_GET['id']) ? $_GET['id'] : null;
        //     $dashboardController->editTingkatan($id);
        // } elseif ($action === 'deleteTingkatan') {
        //     $id = isset($_GET['id']) ? $_GET['id'] : null;
        //     $dashboardController->deleteTingkatan($id);

        // Mahasiswa
        elseif ($action === 'addMahasiswa') {
            $dashboardController->addMahasiswa();
        } 
        elseif ($action === 'editMahasiswa') {
            $dashboardController->editMahasiswa();
        } 
        elseif ($action === 'deleteMahasiswa') {
            $dashboardController->deleteMahasiswa();
        } 
        // Dosen
        elseif ($action === 'addDosen') {
            $dashboardController->addDosen();
        } 
        elseif ($action === 'editDosen') {
            $dashboardController->editDosen();
        } 
        elseif ($action === 'deleteDosen') {
            $dashboardController->deleteDosen();
        } 


        else {
            $dashboardController->renderDashboard();
        }
        break;


    default:
        include_once __DIR__ . '/app/controllers/HomeController.php';
        $homeController = new HomeController();
        $homeController->renderHome();
        break;
}
