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
                    <h4>List Produk</h4>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-datatable table-responsive pt-0">
                <div id="resault"></div>

                <div class="modal" tabindex="-1" id="validasiModaledit" aria-labelledby="validasiModallable" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="validasiModallable">Edit Posting</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <input type="hidden" name="id_validasi_edit" id="id_validasi_edit" value="">
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="text" class="form-control" name="nama" id="nama_edit" required>
                                </div>

                                <div class="mb-3">
                                    <label for="telp" class="form-label">No Telephone</label>
                                    <input type="number" class="form-control" name="telp" id="telp_edit" required>
                                </div>

                                <div class="mb-3">
                                    <label for="foto" class="form-label">Foto</label>
                                    <input type="file" class="form-control" name="foto" id="foto_edit" accept="image/*">
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" onclick="#">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>

                <table class="datatables-basic table">
                    <tr>
                        <th></th>
                        <th>Nama Produk</th>
                        <th>Tanggal</th>
                        </tr>

</main>


<?= $this->endSection() ?>
