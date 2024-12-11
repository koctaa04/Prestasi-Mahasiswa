<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../assets/img/siPresma1.png" />
    <title>Sistem Prestasi Mahasiswa</title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="https://demos.creative-tim.com/argon-dashboard-pro/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="https://demos.creative-tim.com/argon-dashboard-pro/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- CSS Files -->
    <link id="pagestyle" href="app/views/assets/css/argon-dashboard.css?v=2.1.0" rel="stylesheet" />
  </head>
    <style>
      body {
        font-family: "Inter", sans-serif;
      }
      .bg-primary {
        background-color: #05205c !important;
      }
      .text-primary {
        color: #0b1520 !important;
      }
      .bg-primary.bg-opacity-10 {
        background-color: rgba(1, 71, 143, 0.1) !important;
      }
      .btn-primary {
        background-color: #234261 !important;
        border-color: #225689 !important;
      }
      .btn-primary:hover {
        background-color: #003766 !important;
        border-color: #003766 !important;
      }
      .navbar-light .navbar-toggler-icon {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba(1, 71, 143, 1)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
      }
    </style>
  </head>
  <body class="bg-light">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
      <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="#">
          <img src="app/views/assets/img/siPresma1.png" height="32" width="32" class="me-2" />
          <span class="fw-bold text-primary">SiPresma</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link text-primary" href="#home">Beranda</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-primary" href="#achievements">Prestasi</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-primary" href="#competitions">Info Lomba</a>
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
      <div class="bg-primary bg-gradient text-white py-15" style="margin-top: 56px">
        <div class="container min-vh-50 d-flex align-items-center py-5">
          <div>
            <h1 class="display-4 fw-bold mb-4 text-white">Selamat Datang di SiPresma</h1>
            <p class="lead">Platform untuk memantau dan mengelola prestasi akademik mahasiswa.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Prestasi Section -->
    <section id="achievements" class="py-5">
      <div class="container ">
        <h2 class="fw-bold mb-4 text-primary">Prestasi Terkini</h2>
        <div class="card">
          <div class="table-responsive">
            <table class="table table-hover mb-0">
              <thead class="bg bg-primary ">
                <tr>
                  <th>Nama Mahasiswa</th>
                  <th>Nama Lomba</th>
                  <th>Juara</th>
                  <th>Tingkatan</th>
                  <th>Kategori</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <div class="d-flex align-items-center">
                      <div class="rounded-circle bg-secondary" style="width: 40px; height: 40px"></div>
                      <div class="ms-3">
                        <div>John Michael</div>
                      </div>
                    </div>
                      </td>
                      <td>Play IT</td>
                      <td>Juara 2</td>
                      <td>Nasional</td>
                      <td>UI/UX Competition</td>
                      <td class=" align-middle">
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal-details-tolak-1">Details</button>
                        <div class="modal fade" id="modal-details-tolak-1" tabindex="-1" role="dialog" aria-labelledby="modal-details-tolak-1" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                            <div class="modal-content">
                              <div class="modal-header bg bg-gradient-info">
                                <h5 class="modal-title" id="modal-details-tolak-1">Detail Prestasi Mahasiswa</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <img src="../assets/img/bruce-mars.jpg" alt="profile-mahasiswa" class="img-fluid" />
                                <p><strong>Nama Mahasiswa: </strong> Erik Ridho</p>
                                <p><strong>Nama Lomba: </strong>Play IT</p>
                                <p><strong>Juara: </strong>2</p>
                                <p><strong>Tingkatan: </strong>Provinsi</p>
                                <p><strong>Kelas: </strong>2D</p>
                                <p><strong>Jurusan: </strong>Teknologi Informasi</p>
                                <p><strong>Program Studi: </strong>Sistem Informasi Bisnis</p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </td>
                </tr>
                <tr>
                  <td>
                    <div class="d-flex align-items-center">
                      <div class="rounded-circle bg-secondary" style="width: 40px; height: 40px"></div>
                      <div class="ms-3">
                        <div>John Michael</div>
                      </div>
                    </div>
                      </td>
                      <td>Play IT</td>
                      <td>Juara 2</td>
                      <td>Nasional</td>
                      <td>UI/UX Competition</td>
                      <td class=" align-middle">
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal-details-tolak-1">Details</button>
                        <div class="modal fade" id="modal-details-tolak-1" tabindex="-1" role="dialog" aria-labelledby="modal-details-tolak-1" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                            <div class="modal-content">
                              <div class="modal-header bg bg-gradient-info">
                                <h5 class="modal-title" id="modal-details-tolak-1">Detail Prestasi Mahasiswa</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <p><strong>Nama Lomba:</strong> De Code Web Design Competition 2024</p>
                                <p><strong>Tenggat Pendaftaran:</strong> 30 Oktober 2024</p>
                                <p><strong>Link:</strong> <a href="https://linkLomba3" target="_blank">https://linkLomba3</a></p>
                                <p><strong>Pamflet:</strong></p>
                                <!-- Menampilkan Gambar Pamflet -->
                                <img src="../assets/img/img_lomba3.jpg" alt="Pamflet" class="img-fluid" />
                              </div>
                            </div>
                          </div>
                        </div>
                      </td>
                </tr>
                <tr>
                  <td>
                    <div class="d-flex align-items-center">
                      <div class="rounded-circle bg-secondary" style="width: 40px; height: 40px"></div>
                      <div class="ms-3">
                        <div>John Michael</div>
                      </div>
                    </div>
                      </td>
                      <td>Play IT</td>
                      <td>Juara 2</td>
                      <td>Nasional</td>
                      <td>UI/UX Competition</td>
                      <td class=" align-middle">
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal-details-tolak-1">Details</button>
                        <div class="modal fade" id="modal-details-tolak-1" tabindex="-1" role="dialog" aria-labelledby="modal-details-tolak-1" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                            <div class="modal-content">
                              <div class="modal-header bg bg-gradient-info">
                                <h5 class="modal-title" id="modal-details-tolak-1">Detail Prestasi Mahasiswa</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <p><strong>Nama Lomba:</strong> De Code Web Design Competition 2024</p>
                                <p><strong>Tenggat Pendaftaran:</strong> 30 Oktober 2024</p>
                                <p><strong>Link:</strong> <a href="https://linkLomba3" target="_blank">https://linkLomba3</a></p>
                                <p><strong>Pamflet:</strong></p>
                                <!-- Menampilkan Gambar Pamflet -->
                                <img src="../assets/img/img_lomba3.jpg" alt="Pamflet" class="img-fluid" />
                              </div>
                            </div>
                          </div>
                        </div>
                      </td>
                </tr>
                <tr>
                  <td>
                    <div class="d-flex align-items-center">
                      <div class="rounded-circle bg-secondary" style="width: 40px; height: 40px"></div>
                      <div class="ms-3">
                        <div>John Michael</div>
                      </div>
                    </div>
                      </td>
                      <td>Play IT</td>
                      <td>Juara 2</td>
                      <td>Nasional</td>
                      <td>UI/UX Competition</td>
                      <td class=" align-middle">
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal-details-tolak-1">Details</button>
                        <div class="modal fade" id="modal-details-tolak-1" tabindex="-1" role="dialog" aria-labelledby="modal-details-tolak-1" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                            <div class="modal-content">
                              <div class="modal-header bg bg-gradient-info">
                                <h5 class="modal-title" id="modal-details-tolak-1">Detail Prestasi Mahasiswa</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <p><strong>Nama Lomba:</strong> De Code Web Design Competition 2024</p>
                                <p><strong>Tenggat Pendaftaran:</strong> 30 Oktober 2024</p>
                                <p><strong>Link:</strong> <a href="https://linkLomba3" target="_blank">https://linkLomba3</a></p>
                                <p><strong>Pamflet:</strong></p>
                                <!-- Menampilkan Gambar Pamflet -->
                                <img src="../assets/img/img_lomba3.jpg" alt="Pamflet" class="img-fluid" />
                              </div>
                            </div>
                          </div>
                        </div>
                      </td>
                </tr>
              </div>
            </td>
            <tr>
              <td>
                <div class="d-flex align-items-center">
                  <div class="rounded-circle bg-secondary" style="width: 40px; height: 40px"></div>
                  <div class="ms-3">
                    <div>John Michael</div>
                  </div>
                </div>
                  </td>
                  <td>Play IT</td>
                  <td>Juara 2</td>
                  <td>Nasional</td>
                  <td>UI/UX Competition</td>
                  <td class=" align-middle">
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal-details-tolak-1">Details</button>
                    <div class="modal fade" id="modal-details-tolak-1" tabindex="-1" role="dialog" aria-labelledby="modal-details-tolak-1" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="modal-details-tolak-1">Detail Prestasi Mahasiswa</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <p><strong>Nama Lomba:</strong> De Code Web Design Competition 2024</p>
                            <p><strong>Tenggat Pendaftaran:</strong> 30 Oktober 2024</p>
                            <p><strong>Link:</strong> <a href="https://linkLomba3" target="_blank">https://linkLomba3</a></p>
                            <p><strong>Pamflet:</strong></p>
                            <!-- Menampilkan Gambar Pamflet -->
                            <img src="../assets/img/img_lomba3.jpg" alt="Pamflet" class="img-fluid" />
                          </div>
                        </div>
                      </div>
                    </div>
            </tr> 
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>
    <section id="achievements" class="py-0">
      <div class="container ">
        <h2 class="fw-bold mb-4 text-primary">Peringkat Tertinggi</h2>
        <div class="card">
          <div class="table-responsive">
            <table class="table table-hover mb-0">
              <thead class="table-light">
                <tr>
                  <th>Nama Mahasiswa</th>
                  <th>Jurusan</th>
                  <th>Ranking</th>
                  <th>Total Poin</th>
                  <th>Aksi</th>
                  <th class="text-secondary opacity-10"></th>
                  <th class="text-secondary opacity-10"></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <div class="d-flex align-items-center">
                      <div class="rounded-circle bg-secondary" style="width: 40px; height: 40px"></div>
                      <div class="ms-3">
                        <div>Erik Ridho</div>
                      </div>
                    </div>
                  </td>
                  <td>Teknologi Informasi</td>
                  <td>Rangking 2</td>
                  <td>33</td>
                  <td>
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal-details-tolak-1">Details</button>
                    <div class="modal fade" id="modal-details-tolak-1" tabindex="-1" role="dialog" aria-labelledby="modal-details-tolak-1" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="modal-details-tolak-1">Detail Prestasi mahasiswa</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <p><strong>Nama Lomba:</strong> De Code Web Design Competition 2024</p>
                            <p><strong>Tenggat Pendaftaran:</strong> 30 Oktober 2024</p>
                            <p><strong>Link:</strong> <a href="https://linkLomba3" target="_blank">https://linkLomba3</a></p>
                            <p><strong>Pamflet:</strong></p>
                            <!-- Menampilkan Gambar Pamflet -->
                            <img src="../assets/img/img_lomba3.jpg" alt="Pamflet" class="img-fluid" />
                          </div>
                        </div>
                      </div>
                    </div>
                  </td>
                  <th class="text-secondary opacity-10"></th>
                  <th class="text-secondary opacity-10"></th>
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
        <h2 class="fw-bold mb-4 text-primary">Informasi Lomba</h2>
        <div class="row g-4">
          <div class="col-md-4">
            <div class="card h-100">
              <div class="card-body">
                <div class="d-flex align-items-center">
                  <div class="bg-primary bg-opacity-10 p-3 rounded-circle me-3">
                    <i class="bi bi-check-circle text-primary"></i>
                  </div>
                  <div>
                    <h5 class="card-title mb-1 text-dark">Olimpiade Matematika</h5>
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
                    <h5 class="card-title mb-1 text-dark">Lomba Sains</h5>
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
                    <h5 class="card-title mb-1 text-dark">Debat Bahasa Inggris</h5>
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
    <footer class="bg-gradient-dark py-4">
      <div class="container">
        <p class="text-center text-muted mb-0">© 2024 Sistem Informasi Prestasi Akademik. All rights reserved.</p>
      </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>