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
          <a class="nav-link" href="index.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-tv-2 text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="index.php?controller=mahasiswa&action=tambahPrestasi">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-credit-card text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Prestasi</span>
          </a>
          <ul>
            <div class="d-flex flex-column justify-content-center" width="10px">
              <ul>
                <li><a class="nav-link active" href="index.php?controller=mahasiswa&action=tambahPrestasi">Tambah Prestasi</a></li>
                <li><a class="nav-link " href="index.php?controller=mahasiswa&action=viewPrestasiVerif">Lomba Terverifikasi</a></li>
                <li><a class="nav-link " href="index.php?controller=mahasiswa&action=viewPrestasiUnverif">Prestasi Ditolak</a></li>
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
  <main class="main-content position-relative border-radius-lg ">
    <div>
      <!-- Navbar -->
      <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl mt-3 mx-3 bg-primary" id="navbarBlur" data-scroll="false">
        <div class="container-fluid py-1 px-3">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
              <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
              <li class="breadcrumb-item text-sm text-white active" aria-current="page">Prestasi</li>
            </ol>
            <h6 class="font-weight-bolder text-white mb-0">Tambahkan Prestasi anda</h6>
          </nav>
        </div>
      </nav>
      <!-- End Navbar -->
      <style>
        .form-container {
          max-width: 1200px;
          /* Lebar lebih besar agar sesuai dengan space */
          margin: 40px auto;
          /* Tambahkan jarak atas-bawah */
          padding: 30px;
          background-color: #f9f9f9;
          border: 1px solid #ddd;
          border-radius: 8px;
          box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .form-group {
          margin-bottom: 20px;
          /* Jarak antar elemen */
        }

        .form-control-label {
          display: block;
          margin-bottom: 8px;
          /* Jarak label dengan input */
          font-weight: bold;
          font-size: 14px;
        }

        .form-control {
          width: 100%;
          padding: 12px;
          border: 1px solid #ccc;
          border-radius: 4px;
          font-size: 14px;
        }

        .form-control:focus {
          border-color: #5e72e4;
          outline: none;
          box-shadow: 0 0 5px rgba(94, 114, 228, 0.5);
        }

        .submit-btn {
          display: inline-block;
          padding: 10px 20px;
          background-color: #5e72e4;
          color: #fff;
          border: none;
          border-radius: 4px;
          font-size: 14px;
          font-weight: bold;
          cursor: pointer;
          text-align: center;
        }

        .submit-btn:hover {
          background-color: #465acb;
        }

        .button-container {
          text-align: left;
          /* Posisi tombol di bawah kiri */
        }
      </style>
      <div class="form-container px-4 mx-4">
        <form action="index.php?controller=mahasiswa&action=tambahPrestasi" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label for="nama" class="form-control-label">Nama Lomba</label>
            <input name="nama" class="form-control" type="text" value="Balap Karung" id="nama">
          </div>
          <div class="form-group">
            <label for="kategori" class="form-control-label">Kategori</label>
            <select name="kategori" class="form-control" id="kategori">
              <option value="" disabled selected>Pilih Kategori</option>
              <?php foreach ($kategoriList as $kategori): ?>
                <option value="<?= htmlspecialchars($kategori['id']) ?>"><?= htmlspecialchars($kategori['nama']) ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="juara" class="form-control-label">Juara</label>
            <select name="juara" class="form-control" id="juara">
              <option value="" disabled selected>Pilih Juara</option>
              <?php foreach ($juaraList as $juara): ?>
                <option value="<?= htmlspecialchars($juara['id']) ?>"><?= htmlspecialchars($juara['nama']) ?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="form-group">
            <label for="tingkatan" class="form-control-label">Tingkatan</label>
            <select name="tingkatan" class="form-control" id="tingkatan">
              <option value="" disabled selected>Pilih Tingkatan</option>
              <?php foreach ($tingkatanList as $tingkatan): ?>
                <option value="<?= htmlspecialchars($tingkatan['id']) ?>"><?= htmlspecialchars($tingkatan['nama']) ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="penyelenggara" class="form-control-label">Penyelenggara</label>
            <input name="penyelenggara" class="form-control" type="text" value="PENS" id="penyelenggara">
          </div>
          <div class="form-group">
            <label for="sertifikat" class="form-control-label">Sertifikat</label>
            <input name="sertifikat" class="form-control" type="file" id="sertifikat" accept="application/pdf">
          </div>
          <div class="form-group">
            <label for="karya" class="form-control-label">Karya (Opsional)</label>
            <input name="karya" class="form-control" type="text" value="github.com" id="karya">
          </div>
          <div class="form-group">
            <label for="surat_tugas" class="form-control-label">Surat Tugas</label>
            <input name="surat_tugas" class="form-control" type="file" id="surat_tugas" accept="application/pdf">
          </div>
          <div class="form-group">
            <label for="tanggal" class="form-control-label">Tanggal Pelaksanaan</label>
            <input name="tanggal" class="form-control" type="date" id="tanggal">
          </div>
          <!-- Kontainer untuk tombol -->
          <div class="button-container">
            <button type="submit" class="submit-btn">Kirim</button>
          </div>
        </form>
      </div>

    </div>
  </main>

  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/argon-dashboard.min.js?v=2.1.0"></script>
</body>

</html>