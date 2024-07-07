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
                    <h4>Category Product</h4>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-datatable table-responsive pt-0">
                <table class="datatables-basic table">
                    <tr>
                        <th></th>
                        <th>Email</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                    <tr>
                        <td></td>
                        <td>anjay@gmail.com</td>
                        <td>2021-10-10</td>
                        <td>
                            <a href="#" class="btn btn-primary">Edit</a>
                            <a href="#" class="btn btn-danger">Delete</a>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</main>


<?= $this->endSection() ?>
