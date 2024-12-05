<?php
include_once __DIR__ . '/../models/Database.php';
include_once __DIR__ . '/../models/User.php';

class AuthController
{
    private $user;

    public function __construct()
    {
        $database = new Database();
        $db = $database->getConnection();
        $this->user = new User($db);
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = htmlspecialchars($_POST['username']);
            $password = htmlspecialchars($_POST['password']);
            $role = htmlspecialchars($_POST['role']); // admin atau mahasiswa

            $user = $this->user->login($username, $password, $role);
            if ($user) {
                session_start();
                $_SESSION['user'] = $user;
                $_SESSION['role'] = $role;

                header("Location: index.php?controller=dashboard");
                exit();
            } else {
                $error = "Username atau password salah.";
            }
        }

        // Ambil data mahasiswa dan admin untuk ditampilkan di halaman login
        $mahasiswaList = $this->user->getAllMahasiswa();
        $adminList = $this->user->getAllAdmin();
        include_once __DIR__ . '/../views/login.php';
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header("Location: index.php");
    }
}
