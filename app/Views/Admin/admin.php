<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <style>
        .sidebar {
            background-color: #ffffff; /* Warna latar belakang sidebar */
        }

        @media (max-width: 576px) {
            .sidebar {
                position: absolute;
                z-index: 1000;
                height: 100vh;
                width: 100px;
                left: -250px;
                transition: left 0.3s;
            }

            .sidebar-show {
                left: 0;
            }

            .content-overlay {
                position: fixed;
                top: 0;
                left: 0;
                width: 100vw;
                height: 100vh;
                z-index: 999;
                display: none;
            }

            .content-overlay-show {
                display: block;
            }

        }
    </style>
</head>

<div class="navbar">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <a href="/admin" class="container-fluid d-flex justify-content-center">
            <img src="/Asset/logocoffeeadmin.png" class="w-50 h-50 rounded" alt="...">
        </a>
    </nav>
        <div class="col py-3">
            <button class="btn btn-outline-primary d-sm-none" id="sidebarToggle">
                <i class="bi bi-list"></i></button>
            <div id="contentOverlay" class="content-overlay"></div>
        </div>
</div>

<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-sm-3 col-md-2 sidebar px-sm-2 px-0">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li class="nav-item">
                        <a href="#" class="nav-link align-middle px-0">
                            <i class="bi bi-clipboard-data-fill fs-3"></i> <span class="ms-1 d-none d-sm-inline">Overview</span>
                        </a>
                    </li>
                    <li>
                        <a href="/productlist" class="nav-link px-0 align-middle">
                            <i class="bi bi-bag-fill fs-3"></i> <span class="ms-1 d-none d-sm-inline">Product</span></a>
                    </li>
                    <li>
                        <a href="#" class="nav-link px-0 align-middle">
                            <i class="bi bi-image-fill fs-3"></i> <span class="ms-1 d-none d-sm-inline">Galery</span></a>
                    </li>
                    <li>
                        <a href="/promotion" class="nav-link px-0 align-middle">
                            <i class="bi bi-megaphone-fill fs-3"></i> <span class="ms-1 d-none d-sm-inline">Promotion</span></a>
                    </li>
                    <li>
                        <a href="/subcription" class="nav-link px-0 align-middle">
                            <i class="bi bi-bell-fill fs-3"></i> <span class="ms-1 d-none d-sm-inline">Subciption</span>
                        </a>
                    </li>
                </ul>
                <hr>
                <div class="dropdown pb-4">
                    <a href="#" class="d-flex align-items-center text-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="/Asset/profil.png" alt="hugenerd" width="30" height="30" class="rounded-circle">
                        <span class="d-none d-sm-inline mx-1">Mas Admin</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Sign out</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col py-3">
           <?= $this->renderSection('content') ?>
        </div>
    </div>
</div>
<!-- Bootstrap Bundle JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<script>
    document.getElementById('sidebarToggle').addEventListener('click', function () {
        document.querySelector('.sidebar').classList.toggle('sidebar-show');
        document.getElementById('contentOverlay').classList.toggle('content-overlay-show');
    });

    document.getElementById('contentOverlay').addEventListener('click', function () {
        document.querySelector('.sidebar').classList.remove('sidebar-show');
        document.getElementById('contentOverlay').classList.remove('content-overlay-show');
    });
</script>


