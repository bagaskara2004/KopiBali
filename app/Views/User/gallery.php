<?= $this->extend('Component/user.php') ?>
<?= $this->section('Content') ?>
<div class="container py-3">
    <h4 class="text-gallery mt-3 mb-5">Gallery</h4>
    <div class="list-gallery">
        <?php for ($i = 0; $i < 7; $i++) { ?>
            <div class="card background-yellow border-0 p-3" style="min-width: 200px; width:200px;">
                <img src="Asset/gallery.png" class="card-img-top" alt="...">
            </div>
        <?php } ?>
    </div>
</div>
<?= $this->endSection() ?>