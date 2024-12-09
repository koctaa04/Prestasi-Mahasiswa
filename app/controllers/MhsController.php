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
    public function viewPrestasiVerif()
    {
        session_start();

        // Pastikan user adalah mahasiswa
        if ($_SESSION['role'] !== 'mahasiswa') {
            header("Location: index.php?controller=auth&action=login");
            exit();
        }

        $nim = $_SESSION['user']['nim'];
        $verifiedPrestasi = $this->prestasi->getVerifiedPrestasiByNim($nim);

        // Logika untuk menampilkan dashboard mahasiswa
        include_once __DIR__ . '/../views/mahasiswa/prestasi/prestasi-verif.php';
    }
    public function viewPrestasiUnverif()
    {
        session_start();

        // Pastikan user adalah mahasiswa
        if ($_SESSION['role'] !== 'mahasiswa') {
            header("Location: index.php?controller=auth&action=login");
            exit();
        }

        $nim = $_SESSION['user']['nim'];
        $juaraList = $this->juara->getAllJuara();
        $tingkatanList = $this->tingkatan->getAllTingkatan();
        $kategoriList = $this->category->getAllCategories();
        $unverifiedPrestasi = $this->prestasi->getUnverifiedPrestasiByNim($nim);


        // Logika untuk menampilkan dashboard mahasiswa
        include_once __DIR__ . '/../views/mahasiswa/prestasi/prestasi-unverif.php';
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


    // KELOLA CRUD PRESTASI
    public function tambahPrestasi()
    {
        session_start(); // Pastikan session dimulai

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // var_dump($_POST);
            // die;
            // Ambil data dari form
            $nim = $_SESSION['user']['nim']; // NIM dari session
            $kategori = htmlspecialchars($_POST['kategori']);
            $nama_lomba = htmlspecialchars($_POST['nama']);
            $juara = htmlspecialchars($_POST['juara']);
            $tingkatan = htmlspecialchars($_POST['tingkatan']);
            $penyelenggara = htmlspecialchars($_POST['penyelenggara']);
            $karya = isset($_POST['karya']) ? htmlspecialchars($_POST['karya']) : null;
            $tanggal = htmlspecialchars($_POST['tanggal']);
            $verifikasi = 'Pending'; // Status awal prestasi

            // Proses file upload
            $uploadDir = __DIR__ . '/../views/assets/uploads/';
            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0777, true); // Buat folder jika belum ada
            }

            // Upload sertifikat
            $sertifikat = null; // Default jika tidak ada file
            if (isset($_FILES['sertifikat']) && $_FILES['sertifikat']['error'] === UPLOAD_ERR_OK) {
                $sertifikat = $this->uploadFile($_FILES['sertifikat'], $uploadDir);
            }

            // Upload surat tugas
            $surat_tugas = null; // Default jika tidak ada file
            if (isset($_FILES['surat_tugas']) && $_FILES['surat_tugas']['error'] === UPLOAD_ERR_OK) {
                $surat_tugas = $this->uploadFile($_FILES['surat_tugas'], $uploadDir);
            }

            // Panggil model untuk menyimpan data prestasi
            $isAdded = $this->prestasi->addPrestasi(
                $nim,
                $kategori,
                $nama_lomba,
                $juara,
                $tingkatan,
                $penyelenggara,
                $sertifikat,
                $karya,
                $surat_tugas,
                $verifikasi,
                $tanggal
            );

            // var_dump($isAdded);
            // die;

            if ($isAdded) {
                $_SESSION['message'] = "Prestasi berhasil ditambahkan!";
            } else {
                $_SESSION['message'] = "Terjadi kesalahan, coba lagi.";
            }

            // Redirect kembali ke halaman dashboard
            header("Location: index.php?controller=mahasiswa&action=viewPrestasiUnverif");
            exit();
        }

        $juaraList = $this->juara->getAllJuara();
        $tingkatanList = $this->tingkatan->getAllTingkatan();
        $kategoriList = $this->category->getAllCategories();
        // Load view form tambah prestasi
        include_once __DIR__ . '/../views/mahasiswa/prestasi/tambah-prestasi.php';
    }

    /**
     * Fungsi untuk menangani upload file
     *
     * @param array $file File dari $_FILES
     * @param string $uploadDir Direktori tujuan upload
     * @return string|null Nama file yang diupload atau null jika gagal
     */
    private function uploadFile($file, $uploadDir)
    {
        $fileTmpPath = $file['tmp_name'];
        $originalFileName = $file['name'];
        $fileExtension = pathinfo($originalFileName, PATHINFO_EXTENSION);
        $uniqueFileName = uniqid() . '.' . $fileExtension;
        $destinationPath = $uploadDir . $uniqueFileName;

        if (move_uploaded_file($fileTmpPath, $destinationPath)) {
            return 'assets/uploads/' . $uniqueFileName; // Path yang disimpan di database
        } else {
            return null; // Gagal upload
        }
    }

    public function editPrestasi()
    {
        session_start(); // Pastikan session dimulai

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // var_dump($_POST);
            // die;
            // Ambil data dari form
            $nim = $_SESSION['user']['nim']; // NIM dari session
            $idPrestasi = $_POST['id']; // ID Prestasi untuk edit
            $kategori = htmlspecialchars($_POST['kategori']);
            $nama_lomba = htmlspecialchars($_POST['nama']);
            $juara = htmlspecialchars($_POST['juara']);
            $tingkatan = htmlspecialchars($_POST['tingkatan']);
            $penyelenggara = htmlspecialchars($_POST['penyelenggara']);
            $karya = isset($_POST['karya']) ? htmlspecialchars($_POST['karya']) : null;
            $tanggal = htmlspecialchars($_POST['tanggal']);
            $sertifikat = $this->getFile($idPrestasi, 'sertifikat');
            $surat_tugas = $this->getFile($idPrestasi, 'surat_tugas');
            $verifikasi = 'Pending';

            // Panggil model untuk update data prestasi
            $isUpdated = $this->prestasi->updatePrestasi(
                $idPrestasi,
                $nim,
                $kategori,
                $nama_lomba,
                $juara,
                $tingkatan,
                $penyelenggara,
                $sertifikat,
                $karya,
                $surat_tugas,
                $verifikasi,
                $tanggal
            );

            if ($isUpdated) {
                $_SESSION['message'] = "Prestasi berhasil diperbarui!";
            } else {
                $_SESSION['message'] = "Terjadi kesalahan, coba lagi.";
            }

            // Redirect kembali ke halaman dashboard atau halaman lain
            header("Location: index.php?controller=mahasiswa&action=viewPrestasiUnverif");
            exit();
        }

        // Ambil data prestasi untuk diisi dalam form edit
        $presVerif = $this->prestasi->getPrestasiById($_GET['id']);
        $juaraList = $this->juara->getAllJuara();
        $tingkatanList = $this->tingkatan->getAllTingkatan();
        $kategoriList = $this->category->getAllCategories();

        // Load view form edit prestasi
        include_once __DIR__ . '/../views/mahasiswa/prestasi/edit-prestasi.php';
    }

    /**
     * Fungsi untuk mendapatkan file jika ada, jika tidak ada, kembalikan nilai file lama
     */
    private function getFile($idPrestasi, $fileField)
    {
        // Jika ada file yang diupload, proses file
        if (isset($_FILES[$fileField]) && $_FILES[$fileField]['error'] === UPLOAD_ERR_OK) {
            $uploadDir = __DIR__ . '/../views/assets/uploads/';
            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0777, true); // Buat folder jika belum ada
            }
            return $this->uploadFile($_FILES[$fileField], $uploadDir);
        } else {
            // Ambil file lama jika tidak ada file baru
            $prestasi = $this->prestasi->getPrestasiById($idPrestasi);
            return $prestasi[$fileField];
        }
    }

}
