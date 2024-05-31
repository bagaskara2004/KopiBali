<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">

  <link rel="stylesheet" href="/Login/css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <title>Auth</title>
</head>

<body>
  <!-- navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid mt-1">
      <a class="navbar-brand ms-5" href="/">
        <img src="/Login/img/logo.png" alt="Logo" loading="lazy" />
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item me-4">
            <a class="nav-link active" aria-current="page" href="#HOME">HOME</a>
          </li>
          <li class="nav-item me-4">
            <a class="nav-link" href="#ABOUTUS">ABOUT US</a>
          </li>
          <li class="nav-item me-4">
            <a class="nav-link" href="#PRODUK">PRODUK</a>
          </li>
          <li class="nav-item" style="margin-right: 145px;">
            <a class="nav-link" href="#LOGIN">LOGIN</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Login Section -->
  <section class="h-100 gradient-form">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center h-100 pt-5">
        <div class="col-xl-11">
          <div class="row g-5">
            <div class="col-lg-6">
              <div class="card-body p-md-0 mx-md-4">
                <form>
                  <h1 class="mb-4">Login</h1>
                  <p>Login to access your travelwise account</p>
                  <!-- Email input -->
                  <div class="form-outline mb-4">
                    <label class="form-label" for="form2Example1">Email address</label>
                    <input type="email" id="form2Example1" class="form-control" />
                  </div>
                  <!-- Password input -->
                  <div class="form-outline mb-4">
                    <label class="form-label" for="form2Example2">Password</label>
                    <input type="password" id="form2Example2" class="form-control" />
                  </div>
                  <!-- Checkbox -->
                  <div class="form-check mb-4">
                    <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
                    <label class="form-check-label" for="form2Example31"> Remember me </label>
                  </div>
                  <!-- Submit button -->
                  <div class="d-grid">
                    <button type="button" class="btn btn-block text-white ">Sign in</button>
                  </div>
                </form>
              </div>
            </div>
            <div class="col-lg-6 d-none d-lg-flex">
              <img src="/Login/img/gambar_login.jpg" alt="Login image" class="img-fluid">
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Optional JavaScript; choose one of the two! -->
  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/script.js"></script>
  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"></script>
    -->
</body>

</html>
