<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- style -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Style/user.css">
    <!-- icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <title><?= $title ?></title>
</head>

<body data-bs-theme="light">
    <nav class="navbar navbar-expand-lg bg-body shadow position-sticky top-0 z-3">
        <div class="container d-flex justify-content-between">
            <div class="d-flex">
                <button type="button" class="button-icon mx-1" id="btnNavbar"><i class="bi  bi-list fs-3"></i></button>
                <a class="navbar-brand" href="#">Coffee</a>
            </div>
            <div class="d-flex justify-content-end">
                <button type="button" class="button-icon mx-1"><i class="bi bi-search"></i></button>
                <div class="vr my-2"></div>
                <button type="button" class="button-icon mx-1" id="tema"><i class="bi bi-sun-fill"></i></button>
                <a href="#" class="button-primary">Login</a>
            </div>
        </div>
        <div class="container d-none shadow" id="navbar-link">
            <ul class="navbar-nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Product</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Promotion</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Gallery</a>
                </li>
            </ul>
        </div>
    </nav>

    <?= $this->renderSection('Content') ?>

    <footer>
        <div class="container py-5 footer-content">
            <div class="subscribe-title text-light">
                <h4>Subscribe Email</h4>
                <p class="fs-7">to find out the latest information on this website</p>
            </div>
            <form action="/" method="post" class="d-flex w-75 mb-5">
                <input type="email" placeholder="Input Email" class="w-100 px-3 bg-light border-0 text-dark">
                <button type="submit" class="button-primary ms-1">Submit</button>
            </form>
            <div class="row">
                <div class="col-12 col-md-4 text-center">
                    <div class="card background-black mb-3 border-0">
                        <div class="card-header border-0 text-light background-gray">Coffee</div>
                        <div class="card-body">
                            <p class="card-text text-light">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 text-center">
                    <div class="card background-black mb-3 border-0">
                        <div class="card-header border-0 text-light background-gray">Contact</div>
                        <div class="card-body text-light">
                            <i class="bi bi-whatsapp fs-3 m-2"></i>
                            <i class="bi bi-instagram fs-3 m-2"></i>
                            <i class="bi bi-facebook fs-3 m-2"></i>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 text-center">
                    <div class="card background-black border-0">
                        <div class="card-header border-0 text-light background-gray">Location</div>
                        <div class="card-body text-light">
                            <p class="card-text">
                                <i class="bi bi-geo-alt-fill"></i>
                                jalan pengangguran
                            </p>
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3942.8527291037726!2d115.15971477501627!3d-8.799903491252605!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd244c13ee9d753%3A0x6c05042449b50f81!2sPoliteknik%20Negeri%20Bali!5e0!3m2!1sid!2sid!4v1715525729745!5m2!1sid!2sid" width="300" height="100" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="fs-7 text-light background-brown p-3 text-center">Copyright 2024 All Right Reserved</div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/Script/user.js"></script>
</body>

</html>