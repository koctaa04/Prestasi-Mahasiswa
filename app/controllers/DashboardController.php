<?php
include_once __DIR__ . '/../models/Database.php';
include_once __DIR__ . '/../models/Prestasi.php';
include_once __DIR__ . '/../models/Category.php';
include_once __DIR__ . '/../models/Juara.php';
include_once __DIR__ . '/../models/Tingkatan.php';
include_once __DIR__ . '/../models/InfoLomba.php';
include_once __DIR__ . '/../models/User.php';

class DashboardController
{
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


    public function renderDashboard()
    {
        // echo "Hello, World!";
        // die;
        $verifiedPrestasi = $this->prestasi->getPrestasiByVerificationStatus(true);

        session_start();

        // Pastikan user sudah login
        if (!isset($_SESSION['role'])) {
            header("Location: index.php?controller=auth&action=login");
            exit();
        }

        // Render dashboard untuk mahasiswa atau admin
        if ($_SESSION['role'] === 'admin') {
            $this->adminDashboard();
        } else {
            $this->mahasiswaDashboard();
        }
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
        include_once __DIR__ . '/../views/dashboard-admin.php';
    }

    public function manageMahasiswa()
    {
        include_once __DIR__ . '/../views/Kelola-Mahasiswa.php';
    }
    public function manageDosen()
    {
        include_once __DIR__ . '/../views/Kelola-Dosen.php';
    }

    public function mahasiswaDashboard()
    {
        $nim = $_SESSION['user']['nim'];
        $infoLomba = $this->infoLomba->getLombaByNim($nim);
        $prestasi = $this->prestasi->getPrestasiByMahasiswa($nim);
        $user = $this->user->getMahasiswaByNim($nim);

        // Logika untuk menampilkan dashboard mahasiswa
        include_once __DIR__ . '/../views/dashboard-mahasiswa.php';
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
            // Ambil data dari form
            $nim = $_SESSION['user']['nim']; // NIM dari session
            $kategori = $_POST['kategori'];
            $nama_lomba = $_POST['nama_lomba'];
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
            header("Location: index.php?controller=dashboard");
            exit();
        }

        // Ambil data untuk kategori, juara, dan tingkatan
        $categories = $this->category->getAllCategories();
        $juaras = $this->juara->getAllJuara();
        $tingkatans = $this->tingkatan->getAllTingkatan();
        include_once __DIR__ . '/../views/mhs_add_prestasi.php';
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
        $infoLomba = $this->infoLomba->getAllLomba();
        include_once __DIR__ . '/../views/admin_info_lomba.php';
    }

    public function addInfoLomba()
    {
        session_start();
        // Cek apakah form sudah disubmit
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Ambil data 
            $nim = $_SESSION['user']['nim'];
            $nama = $_POST['nama'];
            $tenggat = $_POST['tenggat'];
            $link = $_POST['link'];
            $pamflet = htmlspecialchars($_POST['pamflet']);

            // Set status verifikasi menjadi 'Menunggu'
            $verifikasi = 'Pending';

            // Panggil model untuk menambahkan info lomba
            $result = $this->infoLomba->addInfoLomba($nim, $nama, $pamflet, $tenggat, $link, $verifikasi);

            if ($result) {
                // Redirect setelah berhasil menambah info lomba
                header("Location: index.php?controller=dashboard");
                exit();
            } else {
                // Tampilkan pesan error jika gagal
                echo "Terjadi kesalahan saat menambah info lomba.";
            }
        }
        include_once __DIR__ . '/../views/mhs_add_info_lomba.php';
    }
    
    public function editLomba($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nama = htmlspecialchars($_POST['nama']);
            $pamflet = htmlspecialchars($_POST['pamflet']);
            $tenggat = htmlspecialchars($_POST['tenggat']);
            $link = htmlspecialchars($_POST['link']);

            $this->infoLomba->updateLomba($id, $nama, $pamflet, $tenggat, $link);
            header("Location: index.php?controller=dashboard&action=viewLomba");
            exit();
        }
        $lomba = $this->infoLomba->getLombaById($id);
        include_once __DIR__ . '/../views/admin_edit_lomba.php';
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
