<?= $this->extend('Admin\admin') ?>
<?= $this->section('content') ?>

<style>
    .img-fixed-size {
        width: 40px;
        height: 40px;
        object-fit: cover;
        border-radius: 50%;
    }
</style>
<main class="content px-3 py-2">
    <div class="container min-vh-100">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h4>Edit Shop</h4>
                </div>

            </div>
        </div>
        <div class="card">
            <div class="card-datatable table-responsive pt-0">
                <?php if (session()->getFlashdata('message')) : ?>
                    <div class="alert alert-success">
                        <?= session()->getFlashdata('message') ?>
                    </div>
                <?php endif; ?>
                <form action="<?= base_url('shoplist/update/' . $shop['id_shop']) ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field() ?>

                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?= old('name', $shop['name'] ?? '') ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?= old('email', $shop['email'] ?? '') ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" name="address" value="<?= old('address', $shop['address'] ?? '') ?>" required>
                    </div>
                    <div class="mb-3">

                        <label for="telp" class="form-label">Telephone</label>
                        <input type="text" class="form-control" id="telp" name="telp" value="<?= old('telp', $shop['telp'] ?? '') ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="maps" class="form-label">Maps</label>
                        <input type="text" class="form-control" id="maps" name="maps" value="<?= old('maps', $shop['maps'] ?? '') ?>">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" value="<?= old('password', $shop['password'] ?? '') ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="gallery" class="form-label">Gallery</label>
                        <input type="file" class="form-control" id="gallery" name="gallery" accept="image/*">
                    </div>
                    <div class="mb-3">
                        <label for="open" class="form-label">Open</label>
                        <label for="open" class="form-label">Open Time</label>
                        <input type="time" class="form-control" id="open" name="open" value="<?= old('open', $shop['open'] ?? '') ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="close" class="form-label">Close</label>
                        <label for="close" class="form-label">Close Time</label>
                        <input type="time" class="form-control" id="close" name="close" value="<?= old('close', $shop['close'] ?? '') ?>" required>

                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</main>

<?= $this->endSection() ?>