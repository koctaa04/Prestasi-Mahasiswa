<?php
include_once __DIR__ . '/../models/Database.php';
include_once __DIR__ . '/../models/Prestasi.php';
include_once __DIR__ . '/../models/InfoLomba.php';
include_once __DIR__ . '/../models/User.php';
class HomeController {
    private $prestasi;
    private $infoLomba;
    private $user;

    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->prestasi = new Prestasi($db);
        $this->infoLomba = new InfoLomba($db);
        $this->user = new User($db);
    }

    public function renderHome() {
        // Cek apakah pengguna sudah login
        session_start();

        if (isset($_SESSION['role'])) {
            // Redirect ke dashboard jika sudah login
            header("Location: index.php?controller=dashboard");
            exit();
        }

        $infoLomba = $this->infoLomba->getVerifiedLomba();
        // Ambil prestasi yang sudah diverifikasi
        $verifiedPrestasi = $this->prestasi->getPrestasiByVerificationStatus(true);
        $mahasiswa = $this->user->getAllMahasiswa();

        // Tampilkan view untuk homepage dan kirim data prestasi
        include_once __DIR__ . '/../views/homepage.php';
    }
}
