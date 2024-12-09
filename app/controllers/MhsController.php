<?php
include_once __DIR__ . '/../models/Database.php';

include_once __DIR__ . '/../models/Category.php';
include_once __DIR__ . '/../models/Juara.php';
include_once __DIR__ . '/../models/Tingkatan.php';
include_once __DIR__ . '/../models/Prestasi.php';
include_once __DIR__ . '/../models/InfoLomba.php';
include_once __DIR__ . '/../models/User.php';

class MhsController
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


    // VIEW
    public function mahasiswaDashboard()
    {
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
        session_start();
        if ($_SESSION['role'] !== 'mahasiswa') {
            header("Location: index.php?controller=auth&action=login");
            exit();
        }
        $nim = $_SESSION['user']['nim'];
        $infoLombaVerified = $this->infoLomba->getVerifiedLombaByNim($nim);
        $infoLombaUnverified = $this->infoLomba->getUnverifiedLombaByNim($nim);

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

    // KELOLA CRUD INFORMASI LOMBA
    public function addInfoLomba()
    {
        
        session_start();

        // Cek apakah form sudah disubmit
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            // Ambil data dari form
            $nim = $_SESSION['user']['nim'];
            $nama = $_POST['nama'];
            $tenggat = $_POST['tanggal'];
            $link = $_POST['link'];
            $verifikasi = 'Pending'; // Set status verifikasi menjadi 'Pending'

            // Proses upload pamflet
            $pamflet = null; // Default jika tidak ada file
            if (isset($_FILES['pamflet']) && $_FILES['pamflet']['error'] === UPLOAD_ERR_OK) {
                $uploadDir = __DIR__ . '/../views/assets/uploads/';
                $fileTmpPath = $_FILES['pamflet']['tmp_name'];
                $originalFileName = $_FILES['pamflet']['name'];
                $fileExtension = pathinfo($originalFileName, PATHINFO_EXTENSION);
                $uniqueFileName = uniqid('pamflet_', true) . '.' . $fileExtension;

                // Buat folder uploads jika belum ada
                if (!file_exists($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }

                $destinationPath = $uploadDir . $uniqueFileName;

                // Pindahkan file ke folder tujuan
                if (move_uploaded_file($fileTmpPath, $destinationPath)) {
                    $pamflet = 'assets/uploads/' . $uniqueFileName; // Path yang disimpan di database
                } else {
                    $_SESSION['message'] = "Gagal mengupload file pamflet.";
                    header("Location: index.php?controller=mahaiswa&action=viewInformasiLomba");
                    exit();
                }
            }


            // Panggil model untuk menyimpan data ke database
            $result = $this->infoLomba->addInfoLomba($nim, $nama, $pamflet, $tenggat, $link, $verifikasi);
            

            if ($result) {
                $_SESSION['message'] = "Info lomba berhasil ditambahkan!";
            } else {
                $_SESSION['message'] = "Terjadi kesalahan saat menyimpan data.";
            }

            header("Location: index.php?controller=mahasiswa&action=viewInformasiLomba");
            exit();
        }
    }

    public function editInfoLomba()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {


            session_start();
    
            // Ambil data dari form
            $id = htmlspecialchars($_POST['id']);
            $nama = htmlspecialchars($_POST['nama']);
            $tenggat = htmlspecialchars($_POST['tenggat']);
            $link = htmlspecialchars($_POST['link']);
    
            // Ambil pamflet lama dari database
            $lomba = $this->infoLomba->getLombaById($id);
            $oldPamflet = $lomba['pamflet'];
    
            // Proses upload pamflet baru
            $pamflet = $oldPamflet; // Default menggunakan pamflet lama jika tidak ada file baru
            if (isset($_FILES['pamflet']) && $_FILES['pamflet']['error'] === UPLOAD_ERR_OK) {
                $uploadDir = __DIR__ . '/../views/assets/uploads/';
                $fileTmpPath = $_FILES['pamflet']['tmp_name'];
                $originalFileName = $_FILES['pamflet']['name'];
                $fileExtension = pathinfo($originalFileName, PATHINFO_EXTENSION);
                $uniqueFileName = uniqid('pamflet_', true) . '.' . $fileExtension;
    
                // Buat folder uploads jika belum ada
                if (!file_exists($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }
    
                $destinationPath = $uploadDir . $uniqueFileName;
    
                // Pindahkan file ke folder tujuan
                if (move_uploaded_file($fileTmpPath, $destinationPath)) {
                    // Hapus file pamflet lama jika ada
                    if (!empty($oldPamflet) && file_exists(__DIR__ . '/../views/' . $oldPamflet)) {
                        unlink(__DIR__ . '/../views/' . $oldPamflet);
                    }
    
                    $pamflet = 'assets/uploads/' . $uniqueFileName; // Path yang disimpan di database
                } else {
                    $_SESSION['message'] = "Gagal mengupload file pamflet.";
                    header("Location: index.php?controller=mahasiswa&action=viewInformasiLomba");
                    exit();
                }
            }
            // Update data lomba ke database
            $this->infoLomba->updateLomba($id, $nama, $pamflet, $tenggat, $link);
            
            // echo "Info lomba berhasil diperbarui!";
            // die;
            // Redirect setelah berhasil edit
            $_SESSION['message'] = "Info lomba berhasil diperbarui!";
            header("Location: index.php?controller=mahasiswa&action=viewInformasiLomba");
            exit();
        }
    }
}
