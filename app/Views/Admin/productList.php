<?= $this->extend('Admin\admin') ?>
<?= $this->section('content') ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<style>
    .img-fixed-size {
        width: 40px;
        height: 40px;
        object-fit: cover;
        border-radius: 50%;
    }
    .checkbox {
        width: 30px;
        height: 30px;
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
                <table class="datatables-basic table">
                    <tr>
                        <th></th>
                        <th>Nama Produk</th>
                        <th>Deskripsi</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                        <th>Rekomendasi</th>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Kopi</td>
                        <td>Kopi Mantap</td>
                        <td>10000</td>
                        <td>
                            <a href="#" class="btn btn-primary">Edit</a>
                            <a href="#" class="btn btn-danger">Delete</a>
                        <td><input type="checkbox" class="checkbox" id="vehicle1" name="vehicle1" value="Bike"></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</main>


<?= $this->endSection() ?>
