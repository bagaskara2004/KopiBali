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
                    <h4>Shop</h4>
                </div>
                <div class="col-md-8 text-end">
                    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addShopModal">Tambah Shop</button>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-datatable table-responsive pt-0">
                <table class="datatables-basic table">
                    <thead>
                        <tr>
                            <th>Foto</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Telp</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="shopTableBody">
                        <!-- Shop data will be loaded here via AJAX -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<!-- Add Shop Modal -->
<div class="modal fade" id="addShopModal" tabindex="-1" aria-labelledby="addShopModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addShopModalLabel">Tambah Shop</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addShopForm" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" name="address" required>
                    </div>
                    <div class="mb-3">
                        <label for="telp" class="form-label">Telp</label>
                        <input type="text" class="form-control" id="telp" name="telp" required>
                    </div>
                    <div class="mb-3">
                        <label for="maps" class="form-label">Maps</label>
                        <input type="text" class="form-control" id="maps" name="maps" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="mb-3">
                        <label for="gallery" class="form-label">Gallery</label>
                        <input type="file" class="form-control" id="gallery" name="gallery" required>
                    </div>
                    <div class="mb-3">
                        <label for="open" class="form-label">Open</label>
                        <input type="time" class="form-control" id="open" name="open" required>
                    </div>
                    <div class="mb-3">
                        <label for="close" class="form-label">Close</label>
                        <input type="time" class="form-control" id="close" name="close" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        loadShopData();

        // Load shop data
        function loadShopData() {
            $.ajax({
                url: '<?= base_url('shoplist/getShops') ?>',
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    var shopTableBody = $('#shopTableBody');
                    shopTableBody.empty();
                    $.each(response, function(index, shop) {
                        shopTableBody.append('<tr>' +
                            '<td><img src="' + shop.gallery + '" class="img-fixed-size"></td>' +
                            '<td>' + shop.name + '</td>' +
                            '<td>' + shop.email + '</td>' +
                            '<td>' + shop.telp + '</td>' +
                            '<td>edit delete detail</td>' +
                            '</tr>');
                    });
                }
            });
        }

        // Add shop
        $('#addShopForm').submit(function(event) {
            event.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                url: '<?= base_url('shoplist/save') ?>',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        $('#addShopModal').modal('hide');
                        loadShopData();
                    } else {
                        alert('Failed to add shop');
                    }
                }
            });
        });
    });
</script>

<?= $this->endSection() ?>
