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
            display: flex;
            width: 18%;
            padding: 15px;
            background-color: #293339;
            /* Warna latar belakang sidebar */
        }

        .content {
            width: 100%;
            padding: 15px;
        }

        .nav-link {
            color: #FFFFFF;
            font-size: 120%;
            font-family: "Poppins", sans-serif;
            font-weight: 700;
            font-style: normal;
            /* Warna teks link belum diklik */
        }

        .btn{
            font-family: "Poppins", sans-serif;
            font-weight: 700;
            font-style: normal;
        }

        .table {
            font-family: "Poppins", sans-serif;
            font-weight: 700;
            font-style: normal;
        }

        .nav-link:hover {
            color: red;
        }

        .sidebar-logo {
            padding: 1.2rem;
        }

        .sidebar-logo-alt {
            display: none;
        }

        .dropdown-divider{
            color: #FFFFFF;
        }

        .sidebar-profile-name {
            color: #FFFFFF;
        }

        @media (max-width: 1294px) {
            .nav-link {
                font-size: 85%;
            }

            .sidebar-logo {
                display: none;
                width: 150px;
            }

            .sidebar-logo-alt {
                display: flex;
                justify-content: center;
                padding: 1.2rem;
            }

        }

        .sidebar-btn {
            margin-left: 55px;
        }

        @media (max-width: 576px) {
            .sidebar {
                position: absolute;
                z-index: 1000;
                height: 110vh;
                width: 75px;
                left: -250px;
                transition: left 0.3s;
            }

            .sidebar-logo {
                display: none;
            }

            .sidebar-logo-alt {
                display: none;
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
            
        }
    </style>
</head>
<?php $session = session(); ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar px-sm-2 px-0">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white">
                <div class="sidebar-logo">
                    <a href="/admin" class="navbar-brand">
                        <img src="/img/logo.png" class="w-200 h-45 rounded" alt="...">
                    </a>
                </div>
                <div class="sidebar-logo-alt">
                    <a href="/admin" class="navbar-brand">
                        <img src="/img/logo2.png" class="rounded" alt="...">
                    </a>
                </div>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start min-vh-100" id="menu">
                    <li class="nav-item mb-3">
                        <a href="/overview" class="nav-link align-middle px-0">
                            <i class="bi bi-clipboard-data fs-3"></i> <span class="ms-1 d-none d-sm-inline">Overview</span>
                        </a>
                    </li>
                    <li class="nav-item mb-3">
                        <a href="/productlist" class="nav-link px-0 align-middle">
                            <i class="bi bi-bag fs-3"></i> <span class="ms-1 d-none d-sm-inline">Product</span></a>
                    </li>
                    <li class="nav-item mb-3">
                        <a href="/promotion" class="nav-link px-0 align-middle">
                            <i class="bi bi-megaphone fs-3"></i> <span class="ms-1 d-none d-sm-inline">Promotion</span></a>
                    </li>
                    <li class="nav-item mb-3">
                        <a href="/userlist/getComment" class="nav-link px-0 align-middle">
                            <i class="bi bi-bell fs-3"></i> <span class="ms-1 d-none d-sm-inline">Comment</span>
                        </a>
                    </li>
                    <li class="nav-item mb-3">
                        <a href="/shoplist" class="nav-link px-0 align-middle">
                            <i class="bi bi-shop-window fs-3"></i> <span class="ms-1 d-none d-sm-inline">Shop</span>
                        </a>
                    </li>
                    <li class="nav-item mb-3">
                        <a href="/cproduct" class="nav-link px-0 align-middle">
                            <i class="bi bi-card-list fs-3"></i> <span class="ms-1 d-none d-sm-inline">Category Product</span>
                        </a>
                    </li>
                    <li class="nav-item mb-3">
                        <a href="/medialist" class="nav-link px-0 align-middle">
                            <i class="bi bi-view-list fs-3"></i> <span class="ms-1 d-none d-sm-inline">Media List</span>
                        </a>
                    </li>
                    <li class="nav-item mb-3">
                        <a href="/userlist" class="nav-link px-0 align-middle">
                            <i class="bi bi-person-vcard fs-3"></i> <span class="ms-1 d-none d-sm-inline">User List</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <div class="navbar-profile">
                            <ul class="navbar-nav">
                                <li class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle text-dark" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                                        <img src="/img/team-4.jpg" alt="pfp" width="30" height="30" class="rounded-circle">
                                        <span class="sidebar-profile-name d-none d-sm-inline mx-1">
                                            <?= session()->get('name') ?>
                                        </span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                                        <li>
                                            <span class="sidebar-profile-name d-inline d-sm-none mx-1">
                                                Halo <?= session()->get('name') ?>
                                            </span>
                                        </li>
                                        <li>
                                            <hr class="dropdown-divider d-inline d-sm-none mx-1">
                                        </li>
                                        <li><a class="dropdown-item" href="/logout">Sign out</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
                <hr>
            </div>
        </div>
        <div class="content col py-3" >
            <div class="navbar">
                <nav>
                    <div class="container-fluid d-flex justify-content-between">
                        <div class="sidebar-btn d-flex align-items-center">
                            <button class="navbar-toggler d-sm-none" type="button" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="contents">
            <?= $this->renderSection('content') ?>
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
    </div>
</div>
<!-- Bootstrap Bundle JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<script>

    document.addEventListener("DOMContentLoaded", function() {
        const sidebar = document.querySelector(".sidebar");
        const contents = document.getElementById('contents')
        const toggler = document.querySelector('.navbar-toggler');

        toggler.addEventListener("click", function() {
            sidebar.classList.toggle("sidebar-show");
        });

        contents.addEventListener("click", function() {
            if (sidebar.classList.contains("sidebar-show")) {
                sidebar.classList.remove("sidebar-show");
            }
        });
    });

</script>