<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Prestasi Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-light">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="../assets/img/siPresma1.png" height="32" width="32" class="me-2">
                <span class="fw-bold">SiPresma</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#home">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#achievements">Prestasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#competitions">Info Lomba</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-primary ms-2" href="index.php?controller=auth&action=login">Sign In</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="">
        <div class="bg-primary bg-gradient text-white py-15" style="margin-top: 56px;">
            <div class="container min-vh-50 d-flex align-items-center py-5">
                <div>
                    <h1 class="display-4 fw-bold mb-4">Selamat Datang di SiPresma</h1>
                    <p class="lead">Platform untuk memantau dan mengelola prestasi akademik mahasiswa.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Prestasi Section -->
    <section id="achievements" class="py-5">
        <div class="container">
            <h2 class="fw-bold mb-4">Prestasi Terkini</h2>
            <div class="card">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Nama Mahasiswa</th>
                                <th>Nama Lomba</th>
                                <th>Juara</th>
                                <th>Tingkatan</th>
                                <th>Kategori</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="rounded-circle bg-secondary" style="width: 40px; height: 40px;"></div>
                                        <div class="ms-3">
                                            <div>John Michael</div>
                                        </div>
                                    </div>
                                </td>
                                <td>Play IT</td>
                                <td>Juara 2</td>
                                <td>Nasional</td>
                                <td>UI/UX Competition</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <!-- Info Lomba Section -->
    <section id="competitions" class="py-5 bg-light">
        <div class="container">
            <h2 class="fw-bold mb-4">Informasi Lomba</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="bg-primary bg-opacity-10 p-3 rounded-circle me-3">
                                    <i class="bi bi-check-circle text-primary"></i>
                                </div>
                                <div>
                                    <h5 class="card-title mb-1">Olimpiade Matematika</h5>
                                    <p class="card-text text-muted">Tingkat Nasional</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="bg-primary bg-opacity-10 p-3 rounded-circle me-3">
                                    <i class="bi bi-check-circle text-primary"></i>
                                </div>
                                <div>
                                    <h5 class="card-title mb-1">Lomba Sains</h5>
                                    <p class="card-text text-muted">Tingkat Provinsi</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="bg-primary bg-opacity-10 p-3 rounded-circle me-3">
                                    <i class="bi bi-check-circle text-primary"></i>
                                </div>
                                <div>
                                    <h5 class="card-title mb-1">Debat Bahasa Inggris</h5>
                                    <p class="card-text text-muted">Tingkat Internasional</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-white py-4">
        <div class="container">
            <p class="text-center text-muted mb-0">© 2024 Sistem Informasi Prestasi Akademik. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>