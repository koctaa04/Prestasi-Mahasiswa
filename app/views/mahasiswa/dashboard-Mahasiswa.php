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
        <img src="../assets/img/siPresma1.png" width="40" height="40" class="navbar-brand-img h-100" alt="main_logo" />
        <span class="ms-1 font-weight-bold">SiPresma</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0" />
    <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" href="index.php?controller=dashboard">
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
        <li class="nav-item">
          <a class="nav-link" href="index.php?controller=dashboard&action=viewLomba">
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
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Dashboard</li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0">Selamat Datang! <?= $user[0]['nama'] ?></h6>
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
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Pointku</p>
                    <h5 class="font-weight-bolder">
                      <?= $user[0]['total_poin'] ?> Point
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                    <i class="ni ni-collection text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Lombaku</p>
                    <h5 class="font-weight-bolder">
                      <?= $total_lomba ?> Lomba
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                    <i class="ni ni-trophy text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Peringkatku</p>
                    <h5 class="font-weight-bolder">
                      Peringkat <?= $myRanking ?>
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                    <i class="ni ni-send text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Prastasi Ditolak</p>
                    <h5 class="font-weight-bolder">
                      <?= $lomba_ditolak ?> Prestasi
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                    <i class="ni ni-app text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-4">
        <div class="col-12">
          <div class="card">
            <div class="card-header pb-0 px-3">
              <h6 class="mb-0">Daftar Prestasiku</h6>
            </div>
            <div class="card-body pt-4 p-3">
              <div class="table-responsive border-radius-lg">
                <table class="table table-striped table-hover table-bordered align-items-center mb-0">
                  <thead class="bg-primary">
                    <tr>
                      <th class="text-white text-center align-middle text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID Prestasi</th>
                      <th class="text-white text-center align-middle text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Lomba</th>
                      <th class="text-white text-center align-middle text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kategori</th>
                      <th class="text-white text-center align-middle text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Juara</th>
                      <th class="text-white text-center align-middle text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tingkatan</th>
                      <th class="text-white text-center align-middle text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Penyelenggara</th>
                      <th class="text-white text-center align-middle text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal</th>
                      <th class="text-white text-center align-middle text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Point</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if (!empty($prestasi_list)): ?>
                      <?php foreach ($prestasi_list as $prestasi): ?>
                        <tr>
                          <td class="text-center align-middle">
                            <p class="text-xs font-weight-bold mb-0"><?= $prestasi['id_prestasi']?></p>
                          </td>
                          <td class="text-center align-middle">
                            <p class="text-xs font-weight-bold mb-0"><?= $prestasi['nama_lomba']?></p>
                          </td>
                          <td class="text-center align-middle">
                            <p class="text-xs font-weight-bold mb-0"><?= $prestasi['nama_kategori']?></p>
                          </td>
                          <td class="text-center align-middle">
                            <p class="text-xs font-weight-bold mb-0"><?= $prestasi['nama_juara']?></p>
                          </td>
                          <td class="text-center align-middle">
                            <p class="text-xs font-weight-bold mb-0"><?= $prestasi['nama_tingkatan']?></p>
                          </td>
                          <td class="text-center align-middle">
                            <p class="text-xs font-weight-bold mb-0"><?= $prestasi['penyelenggara']?></p>
                          </td>
                          <td class="text-center align-middle">
                            <p class="text-xs font-weight-bold mb-0"><?= $prestasi['tanggal']->format('Y-m-d')?></p>
                          </td>
                          <td class="text-center align-middle">
                            <p class="text-xs font-weight-bold mb-0"><?= $prestasi['total_poin']?></p>
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
      <div class="row mt-4">
        <div class="col-12">
          <div class="card">
            <div class="card-header pb-0 px-3">
              <h6 class="mb-0">Daftar Info Lomba yang telah Diverifikasi</h6>
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
                    </tr>
                  </thead>
                  <tbody>
                  <?php if (!empty($info_lomba_list)): ?>
                    <?php foreach ($info_lomba_list as $info_lomba): ?>
                    <tr>
                      <td class="text-center align-middle">
                        <p class="text-xs font-weight-bold mb-0"><?=$info_lomba['id']?></p>
                      </td>
                      <td class="text-center align-middle">
                        <p class="text-xs font-weight-bold mb-0"><?=$info_lomba['nama']?></p>
                      </td>
                      <td class="text-center align-middle">
                        <p class="text-xs font-weight-bold mb-0"><?=$info_lomba['tenggat']?></p>
                      </td>
                      <td class="text-center align-middle">
                        <a href="<?=$info_lomba['link']?>" class="text-xs font-weight-bold mb-0"><?=$info_lomba['link']?></a>
                      </td>
                      <td class="text-center align-middle">
                        <button type="button" class="btn btn-secondary bg-info btn-sm" data-bs-toggle="modal" data-bs-target="#modal-lihatPamflet-1">Lihat Pamflet</button>
                        <div class="modal fade" id="modal-lihatPamflet-1" tabindex="-1" role="dialog" aria-labelledby="modal-lihatPamflet-1" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                            <div class="modal-content">
                              <div class="modal-body p-0">
                                <div class="card">
                                  <img src="app/views/assets/img/img_lomba1.jpg" alt="Pamflet" class="img-fluid" />
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
                    <tr>
                      <td class="text-center align-middle">
                        <p class="text-xs font-weight-bold mb-0">10123</p>
                      </td>
                      <td class="text-center align-middle">
                        <p class="text-xs font-weight-bold mb-0">FESTIDA 2024</p>
                      </td>
                      <td class="text-center align-middle">
                        <p class="text-xs font-weight-bold mb-0">17 November 2024</p>
                      </td>
                      <td class="text-center align-middle">
                        <p class="text-xs font-weight-bold mb-0">https://linkLomba2</p>
                      </td>
                      <td class="text-center align-middle">
                        <button type="button" class="btn btn-secondary bg-info btn-sm" data-bs-toggle="modal" data-bs-target="#modal-lihatPamflet-2">Lihat Pamflet</button>
                        <div class="modal fade" id="modal-lihatPamflet-2" tabindex="-1" role="dialog" aria-labelledby="modal-lihatPamflet-2" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                            <div class="modal-content">
                              <div class="modal-body p-0">
                                <div class="card">
                                  <img src="app/views/assets/img/img_lomba2.jpg" alt="Pamflet" class="img-fluid" />
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>
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
            target="_blank">
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
  <script src="app/views/assets/js/plugins/chartjs.min.js"></script>
  <script>
    var ctx1 = document.getElementById("chart-line").getContext("2d");

    var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

    gradientStroke1.addColorStop(1, "rgba(94, 114, 228, 0.2)");
    gradientStroke1.addColorStop(0.2, "rgba(94, 114, 228, 0.0)");
    gradientStroke1.addColorStop(0, "rgba(94, 114, 228, 0)");
    new Chart(ctx1, {
      type: "line",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Mobile apps",
          tension: 0.4,
          borderWidth: 0,
          pointRadius: 0,
          borderColor: "#5e72e4",
          backgroundColor: gradientStroke1,
          borderWidth: 3,
          fill: true,
          data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
          maxBarThickness: 6,
        }, ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          },
        },
        interaction: {
          intersect: false,
          mode: "index",
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
            },
            ticks: {
              display: true,
              padding: 10,
              color: "#fbfbfb",
              font: {
                size: 11,
                family: "Open Sans",
                style: "normal",
                lineHeight: 2,
              },
            },
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5],
            },
            ticks: {
              display: true,
              color: "#ccc",
              padding: 20,
              font: {
                size: 11,
                family: "Open Sans",
                style: "normal",
                lineHeight: 2,
              },
            },
          },
        },
      },
    });
  </script>
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