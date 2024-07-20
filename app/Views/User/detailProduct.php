<?= $this->extend('User/user.php') ?>
<?= $this->section('Banner') ?>
<div class="container-fluid py-5 bg-dark hero-header mb-5">
    <div class="container text-center my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Detail Product</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center text-uppercase">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="/product">Product</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">Detail</li>
            </ol>
        </nav>
    </div>
</div>
<?= $this->endSection() ?>
<?= $this->section('Content') ?>
<div class="container mb-5 mt-5">
    <div class="row">
        <div class="col-12 col-sm-7 col-md-6 col-lg-4 mt-4">
            <img src="/photoProduct/<?=$dataProduct['photo']?>" class="card-img-top shadow rounded" alt="...">
        </div>
        <div class="col-12 col-sm-5 col-md-6 col-lg-8 mt-4">
            <div class="text-center fw-bold "><?=$dataProduct['name']?></div>
            <hr>
            <p><span class="fw-bold">Price :</span> <?=$dataProduct['price']?></p>
            <p><span class="fw-bold">Kategori :</span> <?=$dataProduct['category']?></p>
            <p><span class="fw-bold">Description :</span> <?=$dataProduct['description']?></p>
        </div>
    </div>
</div>
<?= $this->endSection() ?>