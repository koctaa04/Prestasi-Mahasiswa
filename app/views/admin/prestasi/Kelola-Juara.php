<?php
if (!isset($_SESSION)) {
  session_start();
}
?>

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

<body class="g-sidenav-show bg-gray-100">
  <div class="min-height-300 bg-dark position-absolute w-100"></div>
  <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/argon-dashboard/pages/dashboard.html " target="_blank">
        <img src="app/views/assets/img/siPresma1.png" width="30px" height="30px" class="navbar-brand-img h-100" alt="main_logo" />
        <span class="ms-1 font-weight-bold">SiPresma</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0" />
    <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="../pages/dashboard.html">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-tv-2 text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?controller=admin&action=viewKelolaMhs">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-calendar-grid-58 text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Manajemen Data</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?controller=admin&action=viewPrestasiVerif">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-trophy text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Prestasi</span>
          </a>
          <ul>
            <div class="d-flex flex-column justify-content-center" width="10px">
              <ul>
              <li><a class="nav-link" href="index.php?controller=admin&action=viewPrestasiVerif">Prestasi yang terverifkasi</a></li>
                <li><a class="nav-link " href="index.php?controller=admin&action=viewPrestasiUnverif">Prestasi belum terverifikasi</a></li>
                <li><a class="nav-link" href="index.php?controller=admin&action=viewKategori"> Kelola Kategori</a></li>
                <li><a class="nav-link" href="index.php?controller=admin&action=viewTingkatan"> Kelola Tingkatan</a></li>
                <li><a class="nav-link active" href="index.php?controller=admin&action=viewJuara"> Kelola Juara</a></li>
              </ul>
            </div>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?controller=admin&action=viewLombaVerif">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-app text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Informasi Lomba</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?controller=admin&action=viewProfil">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-collection text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Profil Admin</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?controller=auth&action=logout">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-bold-right text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Keluar</span>
          </a>
        </li>
      </ul>
    </div>
  </aside>

  <main class="main-content position-relative border-radius-lg">
    <!--navbar-->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Juara</li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0">Juara</h6>
        </nav>

        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
            <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
              <div class="sidenav-toggler-inner">
                <i class="sidenav-toggler-line bg-white"></i>
                <i class="sidenav-toggler-line bg-white"></i>
                <i class="sidenav-toggler-line bg-white"></i>
              </div>
            </a>
          </li>
          </ul>
        </div>
      </div>
    </nav>
    <?php
    if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-success mx-4" role="alert">
        <strong>Success!</strong> <?= $_SESSION['message'] ?>
      </div>
    <?php }
    unset($_SESSION['message']); ?>
    <div class="border-radius-xl mt-4 mx-4 position-relative" style="background-color: rgb(35, 35, 73);">
      <div class="container-fluid py-4">

        <div class="row">
          <!-- Card Form submit info lomba-->
          <div class="col-12">
            <div class="card">
              <div class="card-header pb-0 px-3">
                <h6 class="mb-0">Tambah Kejuaraan</h6>
              </div>
              <div class="card-body p-3">
                <!-- Form submit info lomba -->
                <form action="index.php?controller=admin&action=addJuara" method="post">

                  <div class="form-group ">
                    <label for="tanggalLomba">Juara</label>
                    <input name="name_juara" type="text" class="form-control" id="nama" required placeholder="Masukkan Kejuaraan">
                  </div>
                  <div class="form-group mt-3">
                    <label for="tanggalLomba">Point</label>
                    <input name="poin_juara" type="text" class="form-control" id="nama" required placeholder="Masukkan Point">
                  </div>

                  <button type="submit" class="btn btn-primary mt-3">Submit</button>
                </form>
              </div>
            </div>
          </div>
        </div>

        <!-- Card Lomba yang Terverifikasi -->
        <div class="row mt-4">
          <div class="col-12">
            <div class="card">
              <div class="card-header pb-0 px-3">
                <h6 class="mb-0">Kelola Juara</h6>
              </div>
              <div class="card-body pt-4 p-3">
                <div class="table-responsive border-radius-lg">
                  <table class="table table-striped table-hover table-bordered align-items-center mb-0">
                    <thead class="bg-primary">
                      <tr>
                        <th class="text-white text-center align-middle text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                        <th class="text-white text-center align-middle text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Juara</th>
                        <th class="text-white text-center align-middle text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Point</th>
                        <th class="text-white text-center align-middle text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if (!empty($juaras)): ?>
                        <?php $i = 1;
                        foreach ($juaras as $juara): ?>
                          <tr>
                            <td class="text-center align-middle">
                              <p class="text-xs font-weight-bold mb-0"><?= $i++ ?></p>
                            </td>
                            <td class="text-center align-middle">
                              <p class="text-xs font-weight-bold mb-0"><?= $juara['nama'] ?></p>
                            </td>
                            <td class="text-center align-middle">
                              <p class="text-xs font-weight-bold mb-0"><?= $juara['poin'] ?></p>
                            </td>

                            <td class="text-center align-middle">
                              <button type="button" class="btn btn-secondary bg-gradient-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal-edit-verif-<?= $juara['id'] ?>">Edit</button>
                              <div class="modal fade" id="modal-edit-verif-<?= $juara['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modal-edit-verif-<?= $juara['id'] ?>" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Edit Juara</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <form method="POST" action="index.php?controller=admin&action=editJuara">
                                        <div class="form-group">
                                          <label for="namaLomba">ID</label>
                                          <input type="text" name="id" class="form-control" id="namaLomba" value="<?= $juara['id'] ?>" disabled>
                                          <input type="hidden" name="id" class="form-control" id="namaLomba" value="<?= $juara['id'] ?>">
                                        </div>
                                        <div class="form-group mt-3">
                                          <label for="tanggalLomba">Nama Juara</label>
                                          <input name="name_juara" type="text" class="form-control" id="nama" value="<?= $juara['nama'] ?>">
                                        </div>
                                        <div class="form-group mt-3">
                                          <label for="poin">Poin tingkatan</label>
                                          <input name="poin_juara" type="text" class="form-control" id="poin" value="<?= $juara['poin'] ?>">
                                        </div>
                                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                                      </form>
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal-hapus-<?= $juara['id'] ?>">Delete</button>
                              <div class="modal fade" id="modal-hapus-<?= $juara['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modal-hapus-<?= $juara['id'] ?>" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                                  <div class="modal-content">
                                    <div class="modal-body">
                                      <h4>Anda yakin ingin menghapus data ini?</h4>
                                      <form action="index.php?controller=admin&action=deleteJuara" method="post">
                                        <div class="form-group">
                                          <label for="namaLomba">ID</label>
                                          <input type="text" name="id" class="form-control" id="namaLomba" value="<?= $juara['id'] ?>" disabled>
                                        </div>
                                        <div class="form-group mt-3">
                                          <label for="tanggalLomba">Nama Juara</label>
                                          <input type="text" name="name_juara" class="form-control" id="nama" value="<?= $juara['nama'] ?>" disabled>
                                        </div>
                                        <input type="hidden" name="id" class="form-control" id="namaLomba" value="<?= $juara['id'] ?>">
                                        <button type="submit" class="btn btn-primary mt-3">Hapus</button>
                                      </form>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </td>
                          </tr>
                        <?php endforeach; ?>
                      <?php else: ?>
                        <tr>
                          <td colspan="8">Tidak ada data.</td>
                        </tr>
                      <?php endif; ?>

                    </tbody>
                  </table>
                </div>
              </div>

              <!--   Core JS Files   -->
              <script src="app/views/assets/js/core/popper.min.js"></script>
              <script src="app/views/assets/js/core/bootstrap.min.js"></script>
              <script src="app/views/assets/js/plugins/perfect-scrollbar.min.js"></script>
              <script src="app/views/assets/js/plugins/smooth-scrollbar.min.js"></script>

              <!-- Github buttons -->
              <script async defer src="https://buttons.github.io/buttons.js"></script>
              <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
              <script src="app/views/assets/js/argon-dashboard.min.js?v=2.1.0"></script>
</body>

</html>