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
  <link rel="icon" type="image/png" href="../assets/img/siPresma.png" />
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
        <img src="../assets/img/siPresma1.png" width="40" height="40" class="navbar-brand-img h-100" alt="main_logo" />
        <span class="ms-1 font-weight-bold">SiPresma</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0" />
    <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="../pages/dashboard-Mahasiswa.html">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-tv-2 text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../pages/Prestasi.html">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-credit-card text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Prestasi</span>
          </a>
        </li>
        <li class="nav-item ">
          <a class="nav-link active" href="../pages/info-lomba-Mahasiswa.html">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-app text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Informasi Lomba</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../pages/Pengaturan.html">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-collection text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Pengaturan</span>
          </a>
        </li>
      </ul>
    </div>
    <div class="sidenav-footer mx-3">
      <div class="card card-plain shadow-none" id="sidenavCard">
        <img class="w-50 mx-auto" src="../assets/img/siPresma1.png" alt="sidebar_illustration" />
        <div class="card-body text-center p-3 w-100 pt-0">
          <div class="docs-info">
            <h6 class="mb-0">Ngerasa kesusahan?</h6>
          </div>
        </div>
      </div>
      <a href="../pages/Help.html" target="_blank" class="btn bg-gradient-info btn-sm w-100 mb-3">bisa dicheck disini ya:)</a>
    </div>
  </aside>
  <main class="main-content position-relative border-radius-lg">
    <div>
      <!-- Navbar -->
      <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl mt-3 mx-3 bg-primary" id="navbarBlur" data-scroll="false">
        <div class="container-fluid py-1 px-3">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
              <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
              <li class="breadcrumb-item text-sm text-white active" aria-current="page">Informasi Lomba</li>
            </ol>
            <h6 class="font-weight-bolder text-white mb-0">Punya Informasi Lomba? Bisa kirim di sini!</h6>
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
      <!-- End Navbar -->
    </div>


    <div class="border-radius-xl mt-4 mx-4 position-relative" style="background-color: rgb(35, 35, 73);">
      <div class="container-fluid py-4">
        <?php
        if (isset($_SESSION['message'])) { ?>
          <div class="alert alert-success mx-4" role="alert">
            <strong>Success!</strong> <?= $_SESSION['message'] ?>
          </div>

        <?php }
        unset($_SESSION['message']); ?>
        <div class="row">
          <!-- Card Form submit info lomba-->
          <div class="col-12">
            <div class="card">
              <div class="card-header pb-0 px-3">
                <h6 class="mb-0">Submit info lomba</h6>
              </div>
              <div class="card-body pt-4 p-3">
                <!-- Form submit info lomba -->
                <form action="index.php?controller=mahasiswa&action=addInfoLomba" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="namaLomba">Nama Lomba</label>
                    <input type="text" class="form-control" id="namaLomba" name="nama" placeholder="Masukkan nama lomba">
                  </div>
                  <div class="form-group mt-3">
                    <label for="tanggalLomba">Tenggat Pendaftaran</label>
                    <input type="date" class="form-control" id="tanggalLomba" name="tanggal">
                  </div>
                  <div class="form-group">
                    <label for="namaLomba">Link</label>
                    <input type="text" class="form-control" id="namaLomba" name="link" placeholder="Masukkan link lomba">
                  </div>
                  <div class="form-group mt-3">
                    <label for="pamflet">Unggah Pamflet Lomba</label>
                    <input type="file" class="form-control" id="pamflet" name="pamflet" accept="image/*" required>
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
                <h6 class="mb-0">Info Lomba yang Terverifikasi</h6>
              </div>
              <div class="card-body pt-4 p-3">
                <div class="table-responsive border-radius-lg">
                  <table class="table table-striped table-hover table-bordered align-items-center mb-0">
                    <thead class="bg-primary">
                      <tr>
                        <th class="text-white text-center align-middle text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID Lomba</th>
                        <th class="text-white text-center align-middle text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Lomba</th>
                        <th class="text-white text-center align-middle text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tenggat Pendaftaran</th>
                        <th class="text-white text-center align-middle text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Link</th>
                        <th class="text-white text-center align-middle text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pamflet</th>
                        <th class="text-white text-center align-middle text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if (!empty($infoLombaVerified)): ?>
                        <?php foreach ($infoLombaVerified as $lombaVerif): ?>
                          <tr>
                            <td class="text-center align-middle">
                              <p class="text-xs font-weight-bold mb-0"><?= $lombaVerif['id'] ?></p>
                            </td>
                            <td class="text-center align-middle">
                              <p class="text-xs font-weight-bold mb-0"><?= $lombaVerif['nama'] ?></p>
                            </td>
                            <td class="text-center align-middle">
                              <p class="text-xs font-weight-bold mb-0"><?= $lombaVerif['tenggat']->format('Y-m-d') ?></p>
                            </td>
                            <td class="text-center align-middle">
                              <a href="<?= $lombaVerif['link'] ?>" class="text-xs font-weight-bold mb-0"><?= $lombaVerif['link'] ?></a>
                            </td>
                            <td class="text-center align-middle">
                              <button type="button" class="btn btn-secondary bg-info btn-sm" data-bs-toggle="modal" data-bs-target="#modal-lihatPamflet-<?= $lombaVerif['id'] ?>">Lihat Pamflet</button>
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
                            <td class="text-center align-middle">
                              <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal-details-verif-<?= $lombaVerif['id'] ?>">Details</button>
                              <div class="modal fade" id="modal-details-verif-<?= $lombaVerif['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modal-details-verif-<?= $lombaVerif['id'] ?>" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="modal-details-verif-<?= $lombaVerif['id'] ?>">Detail Info Lomba</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                      <p><strong>Nama Lomba:</strong> <?= $lombaVerif['nama'] ?> </p>
                                      <p><strong>Tenggat Pendaftaran:</strong> <?= $lombaVerif['tenggat']->format('Y-m-d') ?> </p>
                                      <p><strong>Link:</strong> <a href="<?= $lombaVerif['link'] ?>" target="_blank"><?= $lombaVerif['link'] ?></a></p>
                                      <p><strong>Pamflet:</strong></p>
                                      <!-- Menampilkan Gambar Pamflet -->
                                      <img src="app/views/<?= $lombaVerif['pamflet'] ?>" alt="Pamflet" class="img-fluid" />
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
          </div>
        </div>

        <!-- Card Lomba yang Ditolak -->
        <div class="row mt-4">
          <div class="col-12">
            <div class="card">
              <div class="card-header pb-0 px-3">
                <h6 class="mb-0">Info Lomba yang Pending / Ditolak</h6>
              </div>
              <div class="card-body pt-4 p-3">
                <div class="table-responsive border-radius-lg">
                  <table class="table table-striped table-hover table-bordered align-items-center mb-0">
                    <thead class="bg-primary">
                      <tr>
                        <th class="text-white text-center align-middle text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID Lomba</th>
                        <th class="text-white text-center align-middle text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Lomba</th>
                        <th class="text-white text-center align-middle text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tenggat Pendaftaran</th>
                        <th class="text-white text-center align-middle text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Link</th>
                        <th class="text-white text-center align-middle text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pamflet</th>
                        <th class="text-white text-center align-middle text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                        <th class="text-white text-center align-middle text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Alasan Penolakan</th>
                        <th class="text-white text-center align-middle text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if (!empty($infoLombaUnverified)): ?>
                        <?php foreach ($infoLombaUnverified as $lombaUnverif): ?>
                          <tr>
                            <td class="text-center align-middle">
                              <p class="text-xs font-weight-bold mb-0"><?= $lombaUnverif['id'] ?></p>
                            </td>
                            <td class="text-center align-middle">
                              <p class="text-xs font-weight-bold mb-0"><?= $lombaUnverif['nama'] ?></p>
                            </td>
                            <td class="text-center align-middle">
                              <p class="text-xs font-weight-bold mb-0"><?= $lombaUnverif['tenggat']->format('Y-m-d') ?></p>
                            </td>
                            <td class="text-center align-middle">
                              <a href="<?= $lombaUnverif['link'] ?>" class="text-xs font-weight-bold mb-0"><?= $lombaUnverif['link'] ?></a>
                            </td>
                            <td class="text-center align-middle">
                              <button type="button" class="btn btn-secondary bg-info btn-sm" data-bs-toggle="modal" data-bs-target="#modal-lihatPamflet-<?= $lombaUnverif['id'] ?>">Lihat Pamflet</button>
                              <div class="modal fade" id="modal-lihatPamflet-<?= $lombaUnverif['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modal-lihatPamflet-<?= $lombaUnverif['id'] ?>" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                                  <div class="modal-content">
                                    <div class="modal-body p-0">
                                      <div class="card">
                                        <img src="app/views/<?= $lombaUnverif['pamflet'] ?>" alt="Pamflet" class="img-fluid" />
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </td>
                            <td class="text-center align-middle">
                              <p class="text-xs font-weight-bold mb-0"><?= $lombaUnverif['status'] ?></p>
                            </td>
                            <td class="text-center align-middle">
                              <p class="text-xs font-weight-bold mb-0"><?= $lombaUnverif['alasan_penolakan'] ?? '-' ?></p>
                            </td>

                            <td class="text-center align-middle">
                              <button type="button" class="btn btn-secondary bg-gradient-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal-edit-verif-<?= $lombaUnverif['id'] ?>" <?= $lombaUnverif['status'] == "Pending" ? '' : '' ?>> Edit</button>
                              <div class="modal fade" id="modal-edit-verif-<?= $lombaUnverif['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modal-edit-verif-<?= $lombaUnverif['id'] ?>" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                                  <div class="modal-content">
                                    <div class="modal-body p-0">
                                      <div class="card card-plain">
                                        <div class="card-header pb-0 text-left">
                                          <h3 class="font-weight-bolder text-info text-gradient text-center">Edit Info Lomba</h3>
                                          <p class="mb-0 text-center">Masukkan Perubahan</p>
                                        </div>
                                        <div class="card-body">
                                          <form role="form text-left" method="post" action="index.php?controller=mahasiswa&action=editInfoLomba" enctype="multipart/form-data">
                                            <input type="hidden" class="form-control" name="id" value="<?= $lombaUnverif['id'] ?>">
                                            <div class="form-group">
                                              <label for="namaLomba">Nama Lomba</label>
                                              <input type="text" class="form-control" id="namaLomba" name="nama" value="<?= $lombaUnverif['nama'] ?>">
                                            </div>
                                            <div class="form-group mt-3">
                                              <label for="tanggalLomba">Tenggat Pendaftaran</label>
                                              <input type="date" class="form-control" id="tanggalLomba" name="tenggat" value="<?= $lombaUnverif['tenggat']->format('Y-m-d') ?>">
                                            </div>
                                            <div class="form-group">
                                              <label for="linkLomba">Link</label>
                                              <input type="text" class="form-control btn-link" id="linkLomba" name="link" value="<?= $lombaUnverif['link'] ?>">
                                            </div>
                                            <div class="form-group mt-3">
                                              <label for="uploadPamflet">Unggah Pamflet Lomba</label>
                                              <input type="file" class="form-control" id="uploadPamflet" name="pamflet" accept="image/*">
                                            </div>
                                            <button type="submit" class="btn btn-primary mt-3">Submit</button>
                                          </form>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal-details-verif-<?= $lombaUnverif['id'] ?>">Details</button>
                              <div class="modal fade" id="modal-details-verif-<?= $lombaUnverif['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modal-details-verif-<?= $lombaUnverif['id'] ?>" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="modal-details-verif-<?= $lombaUnverif['id'] ?>">Detail Info Lomba</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                      <p><strong>Nama Lomba:</strong> <?= $lombaUnverif['nama'] ?> </p>
                                      <p><strong>Tenggat Pendaftaran:</strong> <?= $lombaUnverif['tenggat']->format('Y-m-d') ?> </p>
                                      <p><strong>Link:</strong> <a href="<?= $lombaUnverif['link'] ?>" target="_blank"><?= $lombaUnverif['link'] ?></a></p>
                                      <p><strong>Pamflet:</strong></p>
                                      <!-- Menampilkan Gambar Pamflet -->
                                      <img src="app/views/<?= $lombaUnverif['pamflet'] ?>" alt="Pamflet" class="img-fluid" />
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
          </div>
        </div>

      </div>
    </div>

  </main>

  <div>
    <div class="fixed-plugin">
      <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
        <i class="fa fa-cog py-2"></i>
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
            <button class="btn bg-gradient-info w-100 px-3 mb-2 active me-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
            <button class="btn bg-gradient-info w-100 px-3 mb-2" data-class="bg-default" onclick="sidebarType(this)">Dark</button>
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
          <!-- Light / Dark -->
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
            <a href="https://twitter.com/intent/tweet?text=Check%20Argon%20Dashboard%20made%20by%20%40CreativeTim%20%23webdesign%20%23dashboard%20%23bootstrap5&amp;url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fargon-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
              <i class="fab fa-twitter me-1" aria-hidden="true"></i> Tweet
            </a>
            <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/argon-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
              <i class="fab fa-facebook-square me-1" aria-hidden="true"></i> Share
            </a>
          </div>
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
  <script src="app/views/assets/js/argon-dashboard.min.js?v=2.1.0"></script>
</body>

</html>