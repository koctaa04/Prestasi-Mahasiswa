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
        <img src="app/views/assets/img/siPresma1.png" width="40" height="40" class="navbar-brand-img h-100" alt="main_logo" />
        <span class="ms-1 font-weight-bold">SiPresma</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0" />
    <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link " href="index.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-tv-2 text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../pages/prestasi-mahasiswa.html">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-credit-card text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Prestasi</span>
          </a>
          <ul>
            <div class="d-flex flex-column justify-content-center" width="10px">
              <ul>
                <li><a class="nav-link " href="index.php?controller=mahasiswa&action=tambahPrestasi">Tambah Prestasi</a></li>
                <li><a class="nav-link " href="index.php?controller=mahasiswa&action=viewPrestasiVerif">Lomba Terverifikasi</a></li>
                <li><a class="nav-link active" href="index.php?controller=mahasiswa&action=viewPrestasiUnverif">Prestasi Ditolak</a></li>
              </ul>
            </div>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?controller=mahasiswa&action=viewInformasiLomba">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-app text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Informasi Lomba</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?controller=mahasiswa&action=viewProfilMahasiswa">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-collection text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Profil Mahasiswa</span>
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
    <div>
      <!-- Navbar -->
      <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl mt-3 mx-3 bg-primary" id="navbarBlur" data-scroll="false">
        <div class="container-fluid py-1 px-3">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
              <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
              <li class="breadcrumb-item text-sm text-white active" aria-current="page">Info</li>
            </ol>
            <h6 class="font-weight-bolder text-white mb-0">Data anda ditolak, edit untuk melakukan perbaikkan!</h6>
          </nav>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="container mt-5" style="padding-left: 1.5rem; padding-right: 1.5rem;">
        <?php
        if (isset($_SESSION['message'])) { ?>
          <div class="alert alert-success mx-4" role="alert">
            <strong>Success!</strong> <?= $_SESSION['message'] ?>
          </div>

        <?php }
        unset($_SESSION['message']); ?>
        <div class="card mt-5 px-4">
          <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered rounded align-items-center mb-0">
              <thead class="bg-gradient-primary text-white">
                <tr>
                  <th class="text-center">#</th>
                  <th>Nama Lomba</th>
                  <th>Kategori</th>
                  <th>Juara</th>
                  <th>Tingkatan</th>
                  <th>Penyelenggara</th>
                  <th class="text-center">Sertifikat</th>
                  <th class="text-center">Karya</th>
                  <th class="text-center">Surat Tugas</th>
                  <th>Tanggal</th>
                  <th>Total Poin</th>
                  <th>Status</th>
                  <th>Alasan Penolakan</th>
                  <th class="text-center">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php if (!empty($unverifiedPrestasi)): ?>
                  <?php $no = 1;
                  foreach ($unverifiedPrestasi as $presVerif): ?>
                    <tr>
                      <td class="text-center"><?= $no++ ?></td>
                      <td class="text-sm font-weight-bold"><?= htmlspecialchars($presVerif['nama_lomba']) ?></td>
                      <td class="text-sm"><?= htmlspecialchars($presVerif['nama_kategori']) ?></td>
                      <td class="text-sm"><?= htmlspecialchars($presVerif['nama_juara']) ?></td>
                      <td class="text-sm"><?= htmlspecialchars($presVerif['nama_tingkatan']) ?></td>
                      <td class="text-sm"><?= htmlspecialchars($presVerif['penyelenggara']) ?></td>
                      <td class="text-sm text-center">
                        <!-- Tombol untuk Sertifikat -->
                        <a href="app/views/<?= htmlspecialchars($presVerif['sertifikat']) ?>" target="_blank" class="btn btn-sm btn-info">Lihat</a>
                      </td>
                      <td class="text-sm text-center">
                        <!-- Tombol untuk Karya -->
                        <a href="<?= htmlspecialchars($presVerif['karya']) ?>" target="_blank" class="btn btn-sm btn-info">Lihat</a>
                      </td>
                      <td class="text-sm text-center">
                        <!-- Tombol untuk Surat Tugas -->
                        <a href="app/views/<?= htmlspecialchars($presVerif['surat_tugas']) ?>" target="_blank" class="btn btn-sm btn-info">Lihat</a>
                      </td>

                      <td class="text-sm"><?= htmlspecialchars($presVerif['tanggal']->format('Y-m-d')) ?></td>
                      <td class="text-sm"><?= htmlspecialchars($presVerif['total_poin']) ?></td>
                      <td class="text-sm"><?= htmlspecialchars($presVerif['verifikasi']) ?></td>
                      <td class="text-sm"><?= htmlspecialchars($presVerif['alasan_penolakan'] ?? '-') ?></td>
                      <td class="text-sm text-center">
                        <button <?= $presVerif['verifikasi'] == "Pending" ? '' : '' ?> class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal-edit-verif-">Edit</button>

                        <!-- Modal -->
                        <div class="modal fade" id="modal-edit-verif-" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-body p-0">
                                <div class="card card-plain">
                                  <div class="card-header pb-0 text-left">
                                    <h3 class="font-weight-bolder text-info text-gradient text-center">Edit Prestasi Saya</h3>
                                    <p class="mb-0 text-center">Masukkan Perubahan</p>
                                  </div>
                                  <div class="card-body">
                                    <form action="index.php?controller=mahasiswa&action=editPrestasi" method="POST" enctype="multipart/form-data">
                                      <input name="id" class="form-control" type="hidden" value="<?= htmlspecialchars($presVerif['id_prestasi']) ?>" id="nama">
                                      <div class="form-group">
                                        <label for="nama" class="form-control-label">Nama Lomba</label>
                                        <input name="nama" class="form-control" type="text" value="<?= htmlspecialchars($presVerif['nama_lomba']) ?>" id="nama">
                                      </div>
                                      <div class="form-group">
                                        <label for="kategori" class="form-control-label">Kategori</label>
                                        <select name="kategori" class="form-control" id="kategori">
                                          <option value="" disabled>Pilih Kategori</option>
                                          <?php foreach ($kategoriList as $kategori): ?>
                                            <option value="<?= htmlspecialchars($kategori['id']) ?>"
                                              <?= isset($presVerif['kategori']) && $presVerif['nama_kategori'] == $kategori['nama'] ? 'selected' : ''; ?>>
                                              <?= htmlspecialchars($kategori['nama']) ?>
                                            </option>
                                          <?php endforeach; ?>
                                        </select>
                                      </div>

                                      <div class="form-group">
                                        <label for="juara" class="form-control-label">Juara</label>
                                        <select name="juara" class="form-control" id="juara">
                                          <option value="" disabled >Pilih Juara</option>
                                          <?php foreach ($juaraList as $juara): ?>
                                            <option value="<?= htmlspecialchars($juara['id']) ?>"
                                              <?= isset($presVerif['juara']) && $presVerif['nama_juara'] == $juara['nama'] ? 'selected' : ''; ?>>
                                              <?= htmlspecialchars($juara['nama']) ?>
                                            </option>
                                          <?php endforeach; ?>
                                        </select>
                                      </div>

                                      <div class="form-group">
                                        <label for="tingkatan" class="form-control-label">Tingkatan</label>
                                        <select name="tingkatan" class="form-control" id="tingkatan">
                                          <option value="" disabled>Pilih Tingkatan</option>
                                          <?php foreach ($tingkatanList as $tingkatan): ?>
                                            <option value="<?= htmlspecialchars($tingkatan['id']) ?>"
                                              <?= isset($presVerif['tingkatan']) && $presVerif['nama_tingkatan'] == $tingkatan['nama'] ? 'selected' : ''; ?>>
                                              <?= htmlspecialchars($tingkatan['nama']) ?>
                                            </option>
                                          <?php endforeach; ?>
                                        </select>
                                      </div>
                                      <div class="form-group">
                                        
                                        <label for="penyelenggara" class="form-control-label">Penyelenggara</label>
                                        <input name="penyelenggara" class="form-control" type="text" value="<?= htmlspecialchars($presVerif['penyelenggara']) ?>" id="penyelenggara">
                                      </div>
                                      <div class="form-group">
                                        <label for="sertifikat" class="form-control-label">Sertifikat</label>
                                        <input name="sertifikat" class="form-control" type="file" id="sertifikat" accept="application/pdf">
                                      </div>
                                      <div class="form-group">
                                        <label for="karya" class="form-control-label">Karya (Opsional)</label>
                                        <input name="karya" class="form-control" type="text" value="<?= htmlspecialchars($presVerif['nama_lomba']) ?>" id="karya">
                                      </div>
                                      <div class="form-group">
                                        <label for="surat_tugas" class="form-control-label">Surat Tugas</label>
                                        <input name="surat_tugas" class="form-control" type="file" id="surat_tugas" accept="application/pdf">
                                      </div>
                                      <div class="form-group">
                                        <label for="tanggal" class="form-control-label">Tanggal Pelaksanaan</label>
                                        <input name="tanggal" class="form-control" type="date" id="tanggal" value="<?= $presVerif['tanggal']->format('Y-m-d') ?>">
                                      </div>
                                      <button type="submit" class="btn btn-primary mt-3">Kirim</button>
                                    </form>
                                  </div>
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



      <style>
        .table {
          border-collapse: separate;
          border-spacing: 0;
        }

        .table thead th {
          color: white;
          /* Atur teks menjadi putih */
        }


        .table-bordered {
          border: 2px solid #ddd;
        }

        .table thead th {
          text-transform: uppercase;
          font-size: 0.85rem;
        }

        .table-responsive {
          overflow-x: auto;
        }

        .table {
          width: 100%;
          /* Memastikan tabel memanfaatkan seluruh lebar */
          max-width: 100%;
        }

        .container {
          max-width: 100%;
          /* Memanfaatkan lebar penuh halaman */
          margin-top: 5rem;
          /* Tetap menjaga jarak atas */
          margin-left: 1px;
          /* Memberikan jarak dari sidebar */
        }


        .table tbody tr {
          background-color: #fff;
          /* Warna putih untuk latar belakang */
        }

        .table tbody tr td {
          color: #000;
          /* Warna hitam untuk teks */
        }

        .table-striped tbody tr:nth-of-type(odd) {
          background-color: #f8f9fa;
          /* Warna abu-abu terang untuk baris ganjil */
        }

        .table-hover tbody tr:hover {
          background-color: rgba(0, 123, 255, 0.1);
        }

        .btn-info {
          background-color: #007bff;
          border: none;
        }

        .btn-info:hover {
          background-color: #0056b3;
        }

        .container {
          margin-top: 5rem;
          /* Memberikan jarak atas */
          margin-left: 12px;
          /* Memberikan jarak dari sidebar */
        }
      </style>
      <!--   Core JS Files   -->
      <script src="app/views/assets/js/core/popper.min.js"></script>
      <script src="app/views/assets/js/core/bootstrap.min.js"></script>
      <script src="app/views/assets/js/plugins/perfect-scrollbar.min.js"></script>
      <script src="app/views/assets/js/plugins/smooth-scrollbar.min.js"></script>
      </script>
      <!-- Github buttons -->
      <script async defer src="https://buttons.github.io/buttons.js"></script>
      <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
      <script src="app/views/assets/js/argon-dashboard.min.js?v=2.1.0"></script>
</body>

</html>