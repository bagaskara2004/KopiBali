<?= $this->extend('Component/user.php') ?>
<?= $this->section('Content') ?>
<div class="container py-3">
    <div class="d-flex justify-content-center mt-3 mb-5">
        <div class="nav-product">
            <button type="button" class="nav-product-items text-secondary">Latte</button>
            <button type="button" class="nav-product-items bg-body">Robusta</button>
            <button type="button" class="nav-product-items text-secondary">Acabica</button>
        </div>
    </div>
    <div class="list-product">
        <?php for ($i = 0; $i < 7; $i++) { ?>
            <div class="card background-yellow border-0" style="min-width: 200px; width:200px;">
                <img src="/Asset/coffee.png" class="card-img-top" alt="...">
                <div class="card-body position-relative p-2">
                    <div class="d-flex justify-content-between">
                        <p class="card-title text-dark fs-7 fw-medium text-break">Capucino</p>
                        <p class="card-text fs-7 text-dark">RP.20.000</p>
                    </div>
                    <a href="#" class="button-primary w-100">Detail</a>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<?= $this->endSection() ?>