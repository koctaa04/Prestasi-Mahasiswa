<?php
include_once __DIR__ . '/../models/Database.php';
include_once __DIR__ . '/../models/Prestasi.php';
include_once __DIR__ . '/../models/Category.php';
include_once __DIR__ . '/../models/Juara.php';
include_once __DIR__ . '/../models/Tingkatan.php';
include_once __DIR__ . '/../models/InfoLomba.php';
include_once __DIR__ . '/../models/User.php';


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
            header("Location: index.php?controller=auth&action=login");
            exit();
        }

        // Render dashboard untuk mahasiswa atau admin
        if ($_SESSION['role'] === 'admin') {
            $adminController->adminDashboard();
        } else {
            $mhsController->mahasiswaDashboard();
        }
    }





    private $prestasi;
    private $category;
    private $juara;
    private $tingkatan;
    private $infoLomba;
    private $user;
    public function __construct()
    {
        $database = new Database();
        $db = $database->getConnection();
        $this->prestasi = new Prestasi($db);
        $this->category = new Category($db);
        $this->juara = new Juara($db);
        $this->tingkatan = new Tingkatan($db);
        $this->infoLomba = new InfoLomba($db);
        $this->user = new User($db);
    }




    public function mahasiswaDashboard()
    {
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


    public function adminDashboard()
    {
        // Logika untuk menampilkan dashboard admin

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

        $verifiedPrestasi = $this->prestasi->getPrestasiByVerificationStatus(true);
        $unverifiedPrestasi = $this->prestasi->getPrestasiByVerificationStatus(false);
        include_once __DIR__ . '/../views/admin/dashboard-admin.php';
    }

    public function manageMahasiswa()
    {

        $mahasiswa = $this->user->getAllMahasiswa();
        include_once __DIR__ . '/../views/admin/Kelola-Mahasiswa.php';
    }
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
                $_SESSION['message'] = "Prestasi berhasil ditambahkan!";
            } else {
                $_SESSION['message'] = "Terjadi kesalahan, coba lagi.";
            }
        }

        header("Location: index.php?controller=dashboard&action=manageMahasiswa");
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

        header("Location: index.php?controller=dashboard&action=manageMahasiswa");
    }

    // Fungsi untuk menghapus mahasiswa
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

        header("Location: index.php?controller=dashboard&action=manageMahasiswa");
    }

    public function manageDosen()
    {
        $dosen = $this->user->getAllDosen();
        include_once __DIR__ . '/../views/Kelola-Dosen.php';
    }
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
        header("Location: index.php?controller=dashboard&action=manageDosen");
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

        header("Location: index.php?controller=dashboard&action=manageDosen");
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

        header("Location: index.php?controller=dashboard&action=manageDosen");
    }



    public function verifyPrestasi()
    {
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            // Jika ID tidak ada atau tidak valid
            header("Location: index.php?controller=dashboard");
            exit();
        }

        $id = $_GET['id'];

        session_start();
        // Pastikan hanya admin yang bisa melakukan verifikasi
        if ($_SESSION['role'] !== 'admin') {
            header("Location: index.php?controller=dashboard");
            exit();
        }

        // Verifikasi prestasi
        $isVerified = $this->prestasi->verifyPrestasi($id);

        // Redirect ke halaman dashboard setelah proses verifikasi
        if ($isVerified) {
            header("Location: index.php?controller=dashboard");
        } else {
            echo "Gagal melakukan verifikasi prestasi.";
        }
    }

    public function rejectPrestasi($id)
    {
        // Pastikan ID valid
        if (!$id) {
            die("ID prestasi tidak valid.");
        }

        // Tampilkan form penolakan
        include_once __DIR__ . '/../views/admin_reject_prestasi.php';
    }

    public function rejectPrestasiSubmit($id)
    {
        // Pastikan ID valid
        if (!$id) {
            die("ID prestasi tidak valid.");
        }

        // Ambil alasan penolakan dari form
        $alasan = htmlspecialchars($_POST['alasan']);

        // Panggil fungsi model untuk menolak prestasi
        if ($this->prestasi->rejectPrestasi($id, $alasan)) {
            // Redirect kembali ke halaman daftar prestasi
            header("Location: index.php?controller=dashboard&action=viewPrestasi");
            exit();
        } else {
            die("Gagal menolak prestasi.");
        }
    }


    public function editPrestasiByMhs()
    {
        // Ambil ID prestasi dari parameter URL
        $id = isset($_GET['id']) ? $_GET['id'] : null;

        if (!$id) {
            die("ID prestasi tidak ditemukan.");
        }

        // Ambil data prestasi berdasarkan ID
        $prestasi = $this->prestasi->getPrestasiById($id);

        if (!$prestasi) {
            die("Data prestasi tidak ditemukan.");
        }

        // Jika form di-submit
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Ambil data dari form
            $data = [
                'nama_lomba' => $_POST['nama_lomba'],
                'kategori' => $_POST['kategori'],
                'juara' => $_POST['juara'],
                'tingkatan' => $_POST['tingkatan'],
                'penyelenggara' => $_POST['penyelenggara'],
                'sertifikat' => $_POST['sertifikat'],
                'karya' => $_POST['karya'] ?? null, // Opsional
                'surat_tugas' => $_POST['surat_tugas'],
                'tanggal' => $_POST['tanggal']
            ];

            // Update data prestasi menggunakan model
            $this->prestasi->updatePrestasi($id, $data);

            // Redirect ke halaman dashboard setelah berhasil menyimpan
            header("Location: index.php?controller=dashboard");
            exit();
        }

        // Ambil data untuk dropdown (kategori, juara, tingkatan)
        $categories = $this->category->getAllCategories();
        $juaras = $this->juara->getAllJuara();
        $tingkatans = $this->tingkatan->getAllTingkatan();

        // Sertakan view untuk menampilkan form edit
        include_once __DIR__ . '/../views/mhs_edit_prestasi.php';
    }

    // Fungsi untuk menambah prestasi
    public function addPrestasi()
    {
        session_start(); // Pastikan session dimulai

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // var_dump($_POST);
            // die;
            // Ambil data dari form
            $nim = $_SESSION['user']['nim']; // NIM dari session
            $kategori = $_POST['kategori'];
            $nama_lomba = $_POST['nama'];
            $juara = $_POST['juara'];
            $tingkatan = $_POST['tingkatan'];
            $penyelenggara = $_POST['penyelenggara'];
            $sertifikat = $_POST['sertifikat'];
            $karya = $_POST['karya'] ?? null;  // Jika tidak ada, set null
            $surat_tugas = $_POST['surat_tugas'];
            $tanggal = $_POST['tanggal'];
            $verifikasi = 'Pending'; // Status awal prestasi

            // Panggil model untuk menyimpan data prestasi
            $isAdded = $this->prestasi->addPrestasi($nim, $kategori, $nama_lomba, $juara, $tingkatan, $penyelenggara, $sertifikat, $karya, $surat_tugas, $verifikasi, $tanggal);

            if ($isAdded) {
                $_SESSION['message'] = "Prestasi berhasil ditambahkan!";
            } else {
                $_SESSION['message'] = "Terjadi kesalahan, coba lagi.";
            }

            // Redirect kembali ke halaman dashboard
            header("Location: index.php?controller=dashboard?action=viewPrestasi");
            exit();
        }

        // Ambil data untuk kategori, juara, dan tingkatan
        $categories = $this->category->getAllCategories();
        $juaras = $this->juara->getAllJuara();
        $tingkatans = $this->tingkatan->getAllTingkatan();
        include_once __DIR__ . '/../views/mahasiswa/prestasi/tambah-prestasi.php';
    }

    public function viewPrestasi()
    {
        $prestasi = $this->juara->getAllJuara();
        include_once __DIR__ . '/../views/admin_juara.php';
    }

    // CATEGORY
    public function viewCategories()
    {
        $categories = $this->category->getAllCategories();
        include_once __DIR__ . '/../views/admin_categories.php';
    }

    public function addCategory()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = htmlspecialchars($_POST['name']);
            $this->category->addCategory($name);
            header("Location: index.php?controller=dashboard&action=viewCategories");
            exit();
        }
        include_once __DIR__ . '/../views/admin_add_category.php';
    }

    public function editCategory($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = htmlspecialchars($_POST['name']);
            $this->category->updateCategory($id, $name);
            header("Location: index.php?controller=dashboard&action=viewCategories");
            exit();
        }
        $category = $this->category->getCategoryById($id);
        include_once __DIR__ . '/../views/admin_edit_category.php';
    }

    public function deleteCategory($id)
    {
        $this->category->deleteCategory($id);
        header("Location: index.php?controller=dashboard&action=viewCategories");
        exit();
    }


    // JUARA
    public function viewJuara()
    {
        $juaras = $this->juara->getAllJuara();
        include_once __DIR__ . '/../views/admin_juara.php';
    }

    public function addJuara()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = htmlspecialchars($_POST['name']);
            $poin = htmlspecialchars($_POST['poin']);
            $this->juara->addJuara($name, $poin);
            header("Location: index.php?controller=dashboard&action=viewJuara");
            exit();
        }
        include_once __DIR__ . '/../views/admin_add_juara.php';
    }

    public function editJuara($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nama = htmlspecialchars($_POST['name']);
            $poin = htmlspecialchars($_POST['poin']);

            $this->juara->updateJuara($id, $nama, $poin);

            header("Location: index.php?controller=dashboard&action=viewJuara");
            exit();
        }

        // Ambil data juara berdasarkan id yang dipilih
        $juara = $this->juara->getJuaraById($id);

        include_once __DIR__ . '/../views/admin_edit_juara.php';
    }


    public function deleteJuara($id)
    {
        $this->juara->deleteJuara($id);
        header("Location: index.php?controller=dashboard&action=viewJuara");
        exit();
    }


    // TINGKATAN
    public function viewTingkatan()
    {
        $tingkatans = $this->tingkatan->getAllTingkatan();
        include_once __DIR__ . '/../views/admin_tingkatan.php';
    }


    public function addTingkatan()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = htmlspecialchars($_POST['name']);
            $poin = htmlspecialchars($_POST['poin']);
            $this->tingkatan->addTingkatan($name, $poin);
            header("Location: index.php?controller=dashboard&action=viewTingkatan");
            exit();
        }
        include_once __DIR__ . '/../views/admin_add_tingkatan.php';
    }

    public function editTingkatan($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nama = htmlspecialchars($_POST['name']);
            $poin = htmlspecialchars($_POST['poin']);

            $this->tingkatan->updateTingkatan($id, $nama, $poin);

            header("Location: index.php?controller=dashboard&action=viewTingkatan");
            exit();
        }

        $tingkatan = $this->tingkatan->getTingkatanById($id);

        include_once __DIR__ . '/../views/admin_edit_tingkatan.php';
    }


    public function deleteTingkatan($id)
    {
        $this->tingkatan->deleteTingkatan($id);
        header("Location: index.php?controller=dashboard&action=viewTingkatan");
        exit();
    }



    // INFO LOMBA
    public function viewLomba()
    {
        session_start();
        $nim = $_SESSION['user']['nim'];
        $infoLombaVerified = $this->infoLomba->getVerifiedLombaByNim($nim);
        $infoLombaUnverified = $this->infoLomba->getUnverifiedLombaByNim($nim);
        include_once __DIR__ . '/../views/mahasiswa/info-lomba-Mahasiswa.php';
    }

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
                    header("Location: index.php?controller=dashboard&action=viewLomba");
                    exit();
                }
            }

            // Panggil model untuk menyimpan data ke database
            $result = $this->infoLomba->addInfoLomba($nim, $nama, $pamflet, $tenggat, $link, $verifikasi);
            session_start();

            if ($result) {
                $_SESSION['message'] = "Info lomba berhasil ditambahkan!";
            } else {
                $_SESSION['message'] = "Terjadi kesalahan saat menyimpan data.";
            }

            header("Location: index.php?controller=dashboard&action=viewLomba");
            exit();
        }
    }

    public function editLomba()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            session_start();
    
            // Ambil data dari form
            $id = htmlspecialchars($_POST['id']);
            $nama = htmlspecialchars($_POST['nama']);
            $tenggat = htmlspecialchars($_POST['tanggal']);
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
                    header("Location: index.php?controller=dashboard&action=viewLomba");
                    exit();
                }
            }
    
            // Update data lomba ke database
            $this->infoLomba->updateLomba($id, $nama, $pamflet, $tenggat, $link);
    
            // Redirect setelah berhasil edit
            $_SESSION['message'] = "Info lomba berhasil diperbarui!";
            header("Location: index.php?controller=dashboard&action=viewLomba");
            exit();
        }
    }
    



    public function deleteLomba($id)
    {
        $this->infoLomba->deleteLomba($id);
        header("Location: index.php?controller=dashboard&action=viewLomba");
        exit();
    }

    public function verifyLomba()
    {
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            // Jika ID tidak valid, redirect ke halaman daftar lomba
            header("Location: index.php?controller=dashboard&action=viewLomba");
            exit();
        }

        $id = $_GET['id'];
        $status = "Terverifikasi"; // Status yang akan diatur setelah verifikasi

        session_start();
        // Pastikan hanya admin yang bisa melakukan verifikasi
        if ($_SESSION['role'] !== 'admin') {
            header("Location: index.php?controller=dashboard&action=viewLomba");
            exit();
        }

        // Proses verifikasi lomba
        $this->infoLomba->verifyLomba($id, $status);

        // Redirect ke halaman daftar lomba setelah proses verifikasi
        header("Location: index.php?controller=dashboard&action=viewLomba");
        exit();
    }

    // public function rejectLomba($id)
    // {
    //     // Pastikan ID valid
    //     if (!$id) {
    //         die("ID lomba tidak valid.");
    //     }

    //     // Tampilkan form penolakan
    //     include_once __DIR__ . '/../views/admin_reject_lomba.php';
    // }

    // public function rejectPrestasiSubmit($id)
    // {
    //     // Pastikan ID valid
    //     if (!$id) {
    //         die("ID prestasi tidak valid.");
    //     }

    //     // Ambil alasan penolakan dari form
    //     $alasan = htmlspecialchars($_POST['alasan']);

    //     // Panggil fungsi model untuk menolak prestasi
    //     if ($this->prestasi->rejectPrestasi($id, $alasan)) {
    //         // Redirect kembali ke halaman daftar prestasi
    //         header("Location: index.php?controller=dashboard&action=viewPrestasi");
    //         exit();
    //     } else {
    //         die("Gagal menolak prestasi.");
    //     }
    // }
}
