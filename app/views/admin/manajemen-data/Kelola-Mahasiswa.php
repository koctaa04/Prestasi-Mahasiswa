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
          <a class="nav-link" href="index.php?controller=dashboard">
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
                <li><a class="nav-link active" href="index.php?controller=admin&action=viewKelolaMhs"> Kelola Mahasiswa</a></li>
                <li><a class="nav-link" href="index.php?controller=admin&action=viewKelolaDosen"> Kelola Dosen</a></li>
              </ul>
            </div>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?controller=admin&action=viewPrestasiVerif">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-credit-card text-dark text-sm opacity-10"></i>
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
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?controller=admin&action=viewProfil">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-settings-gear-65 text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Pengaturan</span>
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
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Kelola Mahasiswa</li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0">Kelola Mahasiswa</h6>
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


    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0 d-flex justify-content-between align-items-start">
              <td class="align-middle text-center"></td>
              <h6>Tambah Data Mahasiswa</h6>
            </div>
            <div class="p-4 bg-gradient-secondary border-radius-lg">
              <form action="index.php?controller=admin&action=addMahasiswa" method="post">
                <div class="row">
                  <div class="col-md-6">
                    <label for="NIM">NIM</label>
                    <div class="form-group">
                      <input name="nim" type="text" class="form-control form-control-alternative" id="NIM" placeholder="Masukkan NIM" required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label for="nama">Nama Mahasiswa</label>
                    <div class="form-group">
                      <input name="nama" type="text" class="form-control form-control-alternative" id="nama" placeholder="Masukkan Nama Mahasiswa" required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <label for="password">Password</label>
                    <div class="form-group">
                      <div class="input-group input-group-alternative mb-4">
                        <input name="password" type="password" class="form-control form-control-alternative" id="password" placeholder="Masukkan Password" required>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label for="program_studi">Program Studi</label>
                    <div class="form-group">
                      <div class="input-group input-group-alternative mb-4">
                        <input name="program_studi" type="text" class="form-control form-control-alternative" id="program_studi" placeholder="Program Studi" required>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <label for="Jurusan">Jurusan</label>
                    <div class="form-group has-success">
                      <input name="jurusan" type="text" class="form-control form-control-alternative" id="Jurusan" placeholder="Jurusan"required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label for="Angkatan">Angkatan</label>
                    <div class="form-group has-danger">
                      <input name="angkatan" type="text" class="form-control form-control-alternative" id="Angkatan" placeholder="Angkatan" required>
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
            <div class="card-header pb-0 d-flex justify-content-between align-items-start">
              <td class="align-middle text-center"></td>
              <h6>Data Mahasiswa</h6>
            </div>
            <div class="card-header pb-0"></div>
            <div class="card-body px-0 pt-0 pb-2 border-radius-lg">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-dark">NIM</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-dark">Nama Mahasiswa</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-dark">Password</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-dark">Program Studi</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-dark">Jurusan</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-dark">Angkatan</th>
                      <th class="text-secondary opacity-7"></th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if (!empty($mahasiswa)): ?>
                      <?php foreach ($mahasiswa as $mhs): ?>
                        <tr>
                          <td>
                            <div class="d-flex px-1 py-1">
                              <div class="d-flex flex-column justify-content-center">
                                <h6 class="mb-0 text-sm"><?= htmlspecialchars($mhs['nim']) ?></h6>
                              </div>
                            </div>
                          <td>
                            <p class="text-xs font-weight-bold mb-0"><?= htmlspecialchars($mhs['nama']) ?></p>
                          </td>
                          <td class="align-middle text-center text-sm">
                            <p class="text-xs font-weight-bold mb-0"><?= htmlspecialchars($mhs['password']) ?></p>
                          </td>
                          <td class="align-middle text-center">
                            <span class="text-secondary text-xs font-weight-bold"><?= htmlspecialchars($mhs['prodi']) ?></span>
                          </td>
                          <td class="align-middle text-center">
                            <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user"> <?= htmlspecialchars($mhs['jurusan']) ?> </a>
                          </td>
                          <td class="align-middle text-center">
                            <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user"> <?= htmlspecialchars($mhs['angkatan']) ?> </a>
                          </td>
                          <td class="align-middle text-end">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-secondary bg-gradient-info btn-sm" data-bs-toggle="modal" data-bs-target="#modalEdit<?= $mhs['nim'] ?>">
                              EDIT
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="modalEdit<?= $mhs['nim'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Mahasiswa</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body text-start">
                                    <form action="index.php?controller=admin&action=editMahasiswa" method="post">
                                      <div class="row">
                                        <div class="col-md-6">
                                          <label for="NIM">NIM</label>
                                          <div class="form-group">
                                            <input name="nim" type="hidden" class="form-control" id="NIM" value="<?= htmlspecialchars($mhs['nim']) ?>">
                                            <input disabled name="nim" type="text" class="form-control" id="NIM" value="<?= htmlspecialchars($mhs['nim']) ?>">
                                          </div>
                                        </div>
                                        <div class="col-md-6">
                                          <label for="nama">Nama Mahasiswa</label>
                                          <div class="form-group">
                                            <input name="nama" type="text" class="form-control" id="nama" value="<?= htmlspecialchars($mhs['nama']) ?>">
                                          </div>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-6">
                                          <label for="password">Password</label>
                                          <div class="form-group">
                                            <div class="input-group input-group-alternative mb-4">
                                              <input name="password" type="text" class="form-control" id="password" value="<?= htmlspecialchars($mhs['password']) ?>">
                                            </div>
                                          </div>
                                        </div>
                                        <div class="col-md-6">
                                          <label for="program_studi">Program Studi</label>
                                          <div class="form-group">
                                            <div class="input-group input-group-alternative mb-4">
                                              <input name="program_studi" type="text" class="form-control" id="program_studi" value="<?= htmlspecialchars($mhs['prodi']) ?>">
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-6">
                                          <label for="Jurusan">Jurusan</label>
                                          <div class="form-group has-success">
                                            <input name="jurusan" type="text" class="form-control" id="Jurusan" value="<?= htmlspecialchars($mhs['jurusan']) ?>">
                                          </div>
                                        </div>
                                        <div class="col-md-6">
                                          <label for="Angkatan">Angkatan</label>
                                          <div class="form-group has-danger">
                                            <input name="angkatan" type="text" class="form-control" id="Angkatan" value="<?= htmlspecialchars($mhs['angkatan']) ?>">
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
                            <button type="button" class="btn btn-secondary bg-gradient-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalDelete<?= $mhs['nim'] ?>">
                              Delete
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="modalDelete<?= $mhs['nim'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                      <h5 class="mt-4">NIM: <b><?= htmlspecialchars($mhs['nim']) ?></b></h5>
                                      <h5 class="mb-4">Nama: <b><?= htmlspecialchars($mhs['nama']) ?></b></h5>
                                      <p>*Data mahasiswa akan dihapus permanen</p>
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <form action="index.php?controller=admin&action=deleteMahasiswa" method="post">
                                      <input type="hidden" name="nim" value="<?= htmlspecialchars($mhs['nim']) ?>">
                                      <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                                      <button type="submit" class="btn bg-gradient-danger">Hapus</button>
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