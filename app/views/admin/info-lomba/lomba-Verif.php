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

</html>

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
          <a class="nav-link" href="index.php">
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
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?controller=admin&action=viewLombaVerif">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-app text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Informasi Lomba</span>
          </a>
          <ul>
            <div class="d-flex flex-column justify-content-center" width="10px">
              <ul>
                <li><a class="nav-link active" href="index.php?controller=admin&action=viewLombaVerif">Lomba yang terverifikasi</a></li>
                <li><a class="nav-link" href="index.php?controller=admin&action=viewLombaUnverif">Lomba belum diverifikasi</a></li>
              </ul>
            </div>
          </ul>
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
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Lomba yang terverifikasi</li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0">Lomba yang terverifikasi</h6>
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
    <!--tabel-->
    <div class="main-content">
      <?php
      if (isset($_SESSION['message'])) { ?>
        <div class="alert alert-success mx-4" role="alert">
          <strong>Success!</strong> <?= $_SESSION['message'] ?>
        </div>

      <?php }
      unset($_SESSION['message']); ?>
      <div class="card mx-4">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered table-striped">
              <thead class="thead-dark">
                <tr>
                  <th>ID</th>
                  <th>Nama Lomba</th>
                  <th>Tenggat</th>
                  <th>Link Informasi</th>
                  <th>Nama pengaju</th>
                  <th>Pamflet</th>
                </tr>
              </thead>
              <tbody>
                <?php if (!empty($info_lomba)): ?>
                  <?php foreach ($info_lomba as $lombaVerif): ?>
                    <tr>
                      <td class="text-center align-middle">
                        <p class="text-xs font-weight-bold mb-0"><?= $lombaVerif['id'] ?></p>
                      </td>
                      <td class="text-center align-middle">
                        <p class="text-xs font-weight-bold mb-0"><?= $lombaVerif['nama_lomba'] ?></p>
                      </td>
                      <td class="text-center align-middle">
                        <p class="text-xs font-weight-bold mb-0"><?= $lombaVerif['tenggat']->format('Y-m-d') ?></p>
                      </td>
                      <td class="text-center align-middle">
                        <a href="<?= $lombaVerif['link'] ?>" target="_blank" class="btn btn-sm btn-info">Lihat</a>
                      </td>
                      <td class="text-center align-middle">
                        <p class="text-xs font-weight-bold mb-0"><?= $lombaVerif['nama_mahasiswa'] ?></p>
                      </td>
                      <td class="text-center align-middle">
                        <button type="button" class="btn btn-secondary bg-info btn-sm" data-bs-toggle="modal" data-bs-target="#modal-lihatPamflet-<?= $lombaVerif['id'] ?>">Lihat</button>
                        <div class="modal fade" id="modal-lihatPamflet-<?= $lombaVerif['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modal-lihatPamflet-<?= $lombaVerif['id'] ?>" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                            <div class="modal-content">
                              <div class="modal-body p-0">
                                <div class="card">
                                  <img src="app/views/<?= $lombaVerif['pamflet'] ?>" alt="Pamflet" class="img-fluid" />
                                </div>
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
</head>