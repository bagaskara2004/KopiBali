<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <style>
        .sidebar {
            background-color: #ffffff;
            /* Warna latar belakang sidebar */
        }

        .navbar {
            background-color: #ffffff;
            /* Warna latar belakang navbar */
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
<?php $session = session(); ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<div class="navbar">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a href="/admin" class="navbar-brand">
                <img src="/img/logo-dark.png" class="w-200 h-45 rounded" alt="...">
            </a>
            <div class="navbar-nav ms-auto">
                <div class="dropdown">
                    <a href="#" class="nav-link dropdown-toggle text-dark" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="/img/team-4.jpg" alt="pfp" width="30" height="30" class="rounded-circle">
                        <span class="d-none d-sm-inline mx-1">
                            <?= session()->get('name') ?>
                        </span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                        <li><a class="dropdown-item" href="/logout">Sign out</a></li>
                    </ul>
                </div>
            </div>
        </div>
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
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white">
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start min-vh-100" id="menu">
                    <li class="nav-item">
                        <a href="/overview" class="nav-link align-middle px-0">
                            <i class="bi bi-clipboard-data fs-3"></i> <span class="ms-1 d-none d-sm-inline">Overview</span>
                        </a>
                    </li>
                    <li>
                        <a href="/productlist" class="nav-link px-0 align-middle">
                            <i class="bi bi-bag fs-3"></i> <span class="ms-1 d-none d-sm-inline">Product</span></a>
                    </li>
                    <li>
                        <a href="/promotion" class="nav-link px-0 align-middle">
                            <i class="bi bi-megaphone fs-3"></i> <span class="ms-1 d-none d-sm-inline">Promotion</span></a>
                    </li>
                    <li>
                        <a href="/userlist/getComment" class="nav-link px-0 align-middle">
                            <i class="bi bi-bell fs-3"></i> <span class="ms-1 d-none d-sm-inline">Commen</span>
                        </a>
                    </li>
                    <li>
                        <a href="/shoplist" class="nav-link px-0 align-middle">
                            <i class="bi bi-shop-window fs-3"></i> <span class="ms-1 d-none d-sm-inline">Shop</span>
                        </a>
                    </li>
                    <li>
                        <a href="/cproduct" class="nav-link px-0 align-middle">
                            <i class="bi bi-card-list fs-3"></i> <span class="ms-1 d-none d-sm-inline">Category Product</span>
                        </a>
                    </li>
                    <li>
                        <a href="/medialist" class="nav-link px-0 align-middle">
                            <i class="bi bi-bell-fill fs-3"></i> <span class="ms-1 d-none d-sm-inline">Media List</span>
                        </a>
                    </li>
                    <li>
                        <a href="/userlist" class="nav-link px-0 align-middle">
                            <i class="bi bi-bell-fill fs-3"></i> <span class="ms-1 d-none d-sm-inline">User List</span>
                        </a>
                    </li>
                </ul>
                <hr>
            </div>
        </div>
        <div class="col py-3">
            <?= $this->renderSection('content') ?>
        </div>
    </div>
    <footer class="content-footer footer bg-footer-theme">
        <div class="container-xxl">
            <div class="footer-container d-flex align-items-center justify-content-between py-2 flex-md-row flex-column">
                <div>
                    <img src="/img/logo-dark.png" class="w-200 h-45 rounded" alt="...">
                    • Copyright ©
                    <script>
                        document.write(new Date().getFullYear());
                    </script>
                </div>
                <div>
                    <a href="#" class="footer-link me-4" target="_blank"><i class="bi bi-facebook"></i></a>
                    <a href="#" target="_blank" class="footer-link me-4"><i class="bi bi-twitter"></i></a>
                    <a href="#" target="_blank" class="footer-link d-none d-sm-inline-block"><i class="bi bi-github"></i></a>
                </div>
            </div>
        </div>
    </footer>
</div>
<!-- Bootstrap Bundle JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<script>
    document.getElementById('sidebarToggle').addEventListener('click', function() {
        document.querySelector('.sidebar').classList.toggle('sidebar-show');
        document.getElementById('contentOverlay').classList.toggle('content-overlay-show');
    });

    document.getElementById('contentOverlay').addEventListener('click', function() {
        document.querySelector('.sidebar').classList.remove('sidebar-show');
        document.getElementById('contentOverlay').classList.remove('content-overlay-show');
    });
</script>