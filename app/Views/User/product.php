<?= $this->extend('User/user.php') ?>

<?= $this->section('Banner') ?>
<div class="container-xxl py-5 bg-dark hero-header mb-5">
    <div class="container text-center my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Product</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center text-uppercase">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">Product</li>
            </ol>
        </nav>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('Content') ?>
<!-- Menu Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h5 class="section-title ff-secondary text-center text-primary fw-normal">Product</h5>
            <h1 class="mb-5">All Product</h1>
        </div>
        <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.1s">
            <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">

            <?php foreach ($dataCategoryProduct as $categoryProduct) {?>
                <li class="nav-item">
                    <a class="d-flex align-items-center text-start mx-3 mt-1 pb-3 <?php echo $categoryProduct['id_categoryProduct'] == 1 ? 'active' : '';?>" data-bs-toggle="pill" href="#tab-<?=$categoryProduct['id_categoryProduct']?>">
                        <div>
                            <h6 class="mt-n1 mb-0"><?= $categoryProduct['name_categoryProduct'] ?></h6>
                        </div>
                    </a>
                </li>
            <?php } ?>

            </ul>
            <div class="tab-content">

                <?php for ($i=0; $i < count($dataCategoryProduct); $i++) {?>
                <div id="tab-<?=$i+1?>" class="tab-pane fade show p-0 <?php echo $i == 0 ? 'active' : '';?>">
                    <div class="row g-4">

                        <?php foreach ($dataProduct as $product) {?>
                        <?php if ($product['id_category'] == $i+1) {?>
                        <div class="col-lg-6">
                            <div class="d-flex align-items-center">
                                <img class="flex-shrink-0 img-fluid rounded" src="photoProduct/<?=$product['photo']?>" alt="" style="width: 80px;">
                                <div class="w-100 d-flex flex-column text-start ps-4">
                                    <h5 class="d-flex justify-content-between border-bottom pb-2">
                                        <span><?= $product['name'] ?></span>
                                        <span class="text-primary"><?= $product['price'] ?></span>
                                    </h5>
                                    <small class="fst-italic"><?= $product['description'] ?></small>
                                </div>
                            </div>
                        </div>
                        <?php }} ?>

                    </div>
                </div>
                <?php } ?>

            </div>
        </div>
    </div>
</div>
<!-- Menu End -->
<?= $this->endSection() ?>