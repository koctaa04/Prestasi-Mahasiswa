<?php
session_start();
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
          <img src="../assets/img/siPresma1.png" width="30px" height="30px" class="navbar-brand-img h-100" alt="main_logo" />
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
            <a class="nav-link" href="../pages/Manajemen-Data.html">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="ni ni-calendar-grid-58 text-dark text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Manajemen Data</span>
            </a>
            <ul>
              <div class="d-flex flex-column justify-content-center" width="10px">
              <ul>
                  <li><a class="nav-link " href="index.php?controller=dashboard&action=manageMahasiswa"> Kelola Mahasiswa</a></li>
                  <li><a class="nav-link active" href="index.php?controller=dashboard&action=manageDosen"> Kelola Dosen</a></li>
                </ul>
              </div>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../pages/Prestasi.html">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="ni ni-credit-card text-dark text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Prestasi</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../pages/Info-lomba.html">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="ni ni-app text-dark text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Informasi Lomba</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../pages/Pengaturan.html">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="ni ni-settings-gear-65 text-dark text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Pengaturan</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../pages/Keluar.html">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="ni ni-bold-right text-dark text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Keluar</span>
            </a>
          </li>
        </ul>
      </div>
      <div class="sidenav-footer mx-3">
        <div class="card card-plain shadow-none" id="sidenavCard">
          <img class="w-50 mx-auto" src="../assets/img/siPresma1.png" alt="sidebar_illustration" />
          <div class="card-body text-center p-3 w-100 pt-0">
            <div class="docs-info">
              <h6 class="mb-0">Merasa Kesusahan?</h6>
            </div>
          </div>
        </div>
        <a href="../pages/Help.html" target="_blank" class="btn bg-gradient-info w-100 mb-3">Bisa dicheck disini ya:)</a>
      </div>
    </aside>
    <main class="main-content position-relative border-radius-lg">
      <!-- Navbar -->
      <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="false">
        <div class="container-fluid py-1 px-3">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
              <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
              <li class="breadcrumb-item text-sm text-white active" aria-current="page">Kelola Dosen</li>
            </ol>
            <h6 class="font-weight-bolder text-white mb-0">Kelola Dosen</h6>
          </nav>
          <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <ul class="navbar-nav justify-content-end">
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
      <!--End Navbar-->
      <?php
    if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-success mx-4" role="alert">
        <strong>Success!</strong> <?= $_SESSION['message'] ?>
      </div>

    <?php }
    unset($_SESSION['message']); ?>
    </p>
      <div class="container-fluid py-4">
        <div class="row">
          <div class="col-12">
            <div class="card mb-4">
              <div class="card-header pb-0 d-flex justify-content-between align-items-start">
                <td class="align-middle text-center"></td>
                <h6>Tambah Data Dosen</h6>
              </div>
              <div class="p-4 bg-gradient-secondary border-radius-lg">
                <form action="index.php?controller=dashboard&action=addDosen" method="post">
                <div class="row">
                  <div class="col-md-6">
                    <label for="NIP">NIP</label>
                    <div class="form-group">
                      <input name="nip" type="text" class="form-control form-control-alternative" id="NIP" placeholder="Masukkan NIP">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label for="namaDosen">Nama Dosen</label>
                  <div class="form-group">
                    <input name="nama" type="text" class="form-control form-control-alternative" id="namaDosen" placeholder="Masukkan Nama Dosen">
                  </div>
                </div>
                </div>
                <button type="submit" class="btn bg-gradient-info">Tambah</button>
                </form>
              </div>
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="container-fluid">
        <div class="row">
          <div class="col-13">
            <div class="card mb-4 bg-light border-radius-md">
              <div class="card-header pb-0 d-flex justify-content-between align-items-start ">
                <td class="align-middle text-center"></td>
                <h6>Data Dosen</h6>
              </div>
              <div class="card-header pb-0"></div>
              <div class="card-body px-4 pt-0 pb-2">
                <div class="table-responsive p-0">
                  <table class="table align-items-center mb-0">
                    <thead>
                      <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-dark">NIP</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-dark">Nama Dosen</th>
                        <th class="text-secondary opacity-7"></th>
                        <th class="text-secondary opacity-7"></th>
                      </tr> 
                    </thead>
                    <tbody>
                    <?php if (!empty($dosen)): ?>
                      <?php foreach ($dosen as $ds): ?>
                        <tr>
                          <td>
                            <div class="d-flex px-1 py-1">
                              <div class="d-flex flex-column justify-content-center">
                                <h6 class="mb-0 text-sm"><?= htmlspecialchars($ds['nip']) ?></h6>
                              </div>
                            </div>
                          <td>
                            <p class="text-xs font-weight-bold mb-0"><?= htmlspecialchars($ds['nama']) ?></p>
                          </td>
                          <td class="align-middle text-end">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-secondary bg-gradient-info btn-sm" data-bs-toggle="modal" data-bs-target="#modalEdit<?= $ds['nip'] ?>">
                              EDIT
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="modalEdit<?= $ds['nip'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Dosen</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body text-start">
                                    <form action="index.php?controller=dashboard&action=editDosen" method="post">
                                      <div class="row">
                                        <div class="col-md-6">
                                          <label for="NIP">NIP</label>
                                          <div class="form-group">
                                            <input name="nip" type="hidden" class="form-control" id="NIP" value="<?= htmlspecialchars($ds['nip']) ?>">
                                            <input disabled name="nip" type="text" class="form-control" id="NIP" value="<?= htmlspecialchars($ds['nip']) ?>">
                                          </div>
                                        </div>
                                        <div class="col-md-6">
                                          <label for="nama">Nama Dosen</label>
                                          <div class="form-group">
                                            <input name="nama" type="text" class="form-control" id="nama" value="<?= htmlspecialchars($ds['nama']) ?>">
                                          </div>
                                        </div>
                                      </div>
                                      <div class="text-center">
                                        <button type="submit" class="btn btn-round bg-gradient-info btn-lg w-100 mt-4 mb-0">Edit</button>
                                      </div>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </td>

                          <td class="align-middle text-center">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-secondary bg-gradient-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalDelete<?= $ds['nip'] ?>">
                              Delete
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="modalDelete<?= $ds['nip'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus Data</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <div class="py-3 text-center">
                                      <i class="ni ni-bell-55 ni-3x"></i>
                                      <h4 class="text-gradient text-danger mt-4">Apakah Anda Yakin Ingin Menghapus Data ini?</h4>
                                      <h5 class="mt-4">NIP: <b><?= htmlspecialchars($ds['nip']) ?></b></h5>
                                      <h5 class="mb-4">Nama: <b><?= htmlspecialchars($ds['nama']) ?></b></h5>
                                      <p>*Data akan dihapus permanen</p>
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <form action="index.php?controller=dashboard&action=deleteDosen" method="post">
                                      <input type="hidden" name="nip" value="<?= htmlspecialchars($ds['nip']) ?>">
                                      <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                                      <button type="submit" class="btn bg-gradient-danger">Hapus</button>
                                    </form>www
                                  </div>
                                </div>
                              </div>
                            </div>
                          </td>
                        </tr>
                      <?php endforeach; ?>
                    <?php else: ?>
                      <tr>
                        <td colspan="8">Tidak ada data mahasiswa.</td>
                      </tr>
                    <?php endif; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
    <div class="fixed-plugin">
      <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
        <i class="fa fa-cog py-2"> </i>
      </a>
      <div class="card shadow-lg">
        <div class="card-header pb-0 pt-3">
          <div class="float-start">
            <h5 class="mt-3 mb-0">Argon Configurator</h5>
            <p>See our dashboard options.</p>
          </div>
          <div class="float-end mt-4">
            <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
              <i class="fa fa-close"></i>
            </button>
          </div>
          <!-- End Toggle Button -->
        </div>
        <hr class="horizontal dark my-1" />
        <div class="card-body pt-sm-3 pt-0 overflow-auto">
          <!-- Sidebar Backgrounds -->
          <div>
            <h6 class="mb-0">Sidebar Colors</h6>
          </div>
          <a href="javascript:void(0)" class="switch-trigger background-color">
            <div class="badge-colors my-2 text-start">
              <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
              <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
              <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
              <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
              <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
              <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
            </div>
          </a>
          <!-- Sidenav Type -->
          <div class="mt-3">
            <h6 class="mb-0">Sidenav Type</h6>
            <p class="text-sm">Choose between 2 different sidenav types.</p>
          </div>
          <div class="d-flex">
            <button class="btn bg-gradient-primary w-100 px-3 mb-2 active me-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
            <button class="btn bg-gradient-primary w-100 px-3 mb-2" data-class="bg-default" onclick="sidebarType(this)">Dark</button>
          </div>
          <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
          <!-- Navbar Fixed -->
          <div class="d-flex my-3">
            <h6 class="mb-0">Navbar Fixed</h6>
            <div class="form-check form-switch ps-0 ms-auto my-auto">
              <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)" />
            </div>
          </div>
          <hr class="horizontal dark my-sm-4" />
          <div class="mt-2 mb-5 d-flex">
            <h6 class="mb-0">Light / Dark</h6>
            <div class="form-check form-switch ps-0 ms-auto my-auto">
              <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version" onclick="darkMode(this)" />
            </div>
          </div>
          <a class="btn bg-gradient-dark w-100" href="https://www.creative-tim.com/product/argon-dashboard">Free Download</a>
          <a class="btn btn-outline-dark w-100" href="https://www.creative-tim.com/learning-lab/bootstrap/license/argon-dashboard">View documentation</a>
          <div class="w-100 text-center">
            <a class="github-button" href="https://github.com/creativetimofficial/argon-dashboard" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star creativetimofficial/argon-dashboard on GitHub">Star</a>
            <h6 class="mt-3">Thank you for sharing!</h6>
            <a
              href="https://twitter.com/intent/tweet?text=Check%20Argon%20Dashboard%20made%20by%20%40CreativeTim%20%23webdesign%20%23dashboard%20%23bootstrap5&amp;url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fargon-dashboard"
              class="btn btn-dark mb-0 me-2"
              target="_blank"
            >
              <i class="fab fa-twitter me-1" aria-hidden="true"></i> Tweet
            </a>
            <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/argon-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
              <i class="fab fa-facebook-square me-1" aria-hidden="true"></i> Share
            </a>
          </div>
        </div>
      </div>
    </div>
    <!--   Core JS Files   -->
    <script src="app/views/assets/js/core/popper.min.js"></script>
    <script src="app/views/assets/js/core/bootstrap.min.js"></script>
    <script src="app/views/assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="app/views/assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script>
      var win = navigator.platform.indexOf("Win") > -1;
      if (win && document.querySelector("#sidenav-scrollbar")) {
        var options = {
          damping: "0.5",
        };
        Scrollbar.init(document.querySelector("#sidenav-scrollbar"), options);
      }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../assets/js/argon-dashboard.min.js?v=2.1.0"></script>
  </body>
</html>
