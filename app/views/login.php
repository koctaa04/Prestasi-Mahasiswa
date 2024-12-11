<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="apple-touch-icon" sizes="76x76" href="app/views/assets/img/apple-icon.png" />
  <link rel="icon" type="image/png" />
  <title>Pencatatan Mahasiswa Berprestasi</title>
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

<body class="">
  <main class="main-content mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
              <div class="card card-plain">
                <div class="card-header pb-0 text-start">
                  <h4 class="font-weight-bolder">Sign In</h4>
                  <p class="mb-0">Masukkan Username dan Password</p>
                </div>
                <div class="card-body">
                  <form role="form" action="" method="post">
                    <?php if (isset($error)): ?>
                      <p style="color: red;"><?php echo $error; ?></p>
                    <?php endif; ?>
                    <select class="form-select w-full mb-4 mx-auto mt-3" name="role">
                      <option value="mahasiswa">Mahasiswa</option>
                      <option value="admin">Admin</option>
                    </select>
                    <div class="mb-3">
                      <input name="username" type="text" class="form-control form-control-lg" placeholder="Username" aria-label="Username" required />
                    </div>
                    <div class="mb-3">
                      <input name="password" type="password" class="form-control form-control-lg" placeholder="Password" aria-label="Password" required />
                    </div>
                    <!-- <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="rememberMe" />
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                      </div> -->
                    <div class="text-center">
                      <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Sign in</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
              <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden">
                <img src="app/views/assets/img/gedung.jpg" style="background-size: cover" />
                <span class="mask bg-gradient-primary opacity-6"></span>
                <h4 class="mt-5 text-white font-weight-bolder position-relative">"Prestasi"</h4>
                <p class="text-white position-relative">"Di balik setiap pencapaian mahasiswa, ada dedikasi, kerja keras, dan perjuangan tanpa henti."</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <!--   Core JS Files   -->
  <script src="app/views/assets/css/argon-dashboard.css?v=2.1.0/js/core/popper.min.js"></script>
  <script src="app/views/assets/css/argon-dashboard.css?v=2.1.0/js/core/bootstrap.min.js"></script>
  <script src="app/views/assets/css/argon-dashboard.css?v=2.1.0/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="app/views/assets/css/argon-dashboard.css?v=2.1.0/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf("Win") > -1;
    if (win && document.querySelector("#sidenav-scrollbar")) {
      var options = {
        damping: "0.5",
      };
      Scrollbar.init(document.querySelector("#sidenav-scrollbar"), options);
    }
  </script>

  <script>
    const select = document.querySelector(".form-select");
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="app/views/assets/css/argon-dashboard.css?v=2.1.0/js/argon-dashboard.min.js?v=2.1.0"></script>
</body>

</html>