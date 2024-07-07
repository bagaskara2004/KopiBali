<?= $this->extend('Admin\admin') ?>
<?= $this->section('content') ?>


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
            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addProductModal">
                Tambah Produk
            </button>
        </div>
        <div class="card">
            <div class="card-datatable table-responsive pt-0">
                <table class="datatables-basic table">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Nama Produk</th>
                            <th>Deskripsi</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                            <th>Rekomendasi</th>
                        </tr>
                    </thead>
                    <tbody id="product-list">
                        <!-- Data produk akan dimuat di sini menggunakan AJAX -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<!-- Add Product Modal -->
<div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addProductModalLabel">Tambah Produk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addProductForm" action="<?php echo site_url('productlist/save'); ?>" method="post">
                    <div class="mb-3">
                        <label for="name_product" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control" id="name_product" name="name_product" required>
                    </div>
                    <div class="mb-3">
                        <label for="description_product" class="form-label">Deskripsi Produk</label>
                        <input type="text" class="form-control" id="description_product" name="description_product" required>
                    </div>
                    <div class="mb-3">
                        <label for="price_product" class="form-label">Harga Produk</label>
                        <input type="number" class="form-control" id="price_product" name="price_product" required>
                    </div>
                    <div class="mb-3">
                        <label for="id_categoryProduct" class="form-label">ID Kategori Produk</label>
                        <input type="number" class="form-control" id="id_categoryProduct" name="id_categoryProduct" required>
                    </div>
                    <div class="mb-3">
                        <label for="id_shop" class="form-label">ID Toko</label>
                        <input type="number" class="form-control" id="id_shop" name="id_shop" required>
                    </div>
                    <div class="mb-3">
                        <label for="recomended" class="form-label">Rekomendasi</label>
                        <select class="form-control" id="recomended" name="recomended" required>
                            <option value="1">Ya</option>
                            <option value="0">Tidak</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit Product Modal -->
<div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="editProductModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProductModalLabel">Edit Produk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editProductForm" action="<?php echo site_url('productlist/update'); ?>" method="post">
                    <input type="hidden" id="edit_id_product" name="id_product">
                    <div class="mb-3">
                        <label for="edit_name_product" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control" id="edit_name_product" name="name_product" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_description_product" class="form-label">Deskripsi Produk</label>
                        <input type="text" class="form-control" id="edit_description_product" name="description_product" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_price_product" class="form-label">Harga Produk</label>
                        <input type="number" class="form-control" id="edit_price_product" name="price_product" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_id_categoryProduct" class="form-label">ID Kategori Produk</label>
                        <input type="number" class="form-control" id="edit_id_categoryProduct" name="id_categoryProduct" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_id_shop" class="form-label">ID Toko</label>
                        <input type="number" class="form-control" id="edit_id_shop" name="id_shop" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_recomended" class="form-label">Rekomendasi</label>
                        <select class="form-control" id="edit_recomended" name="recomended" required>
                            <option value="1">Ya</option>
                            <option value="0">Tidak</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {

        loadProducts();

        function loadProducts() {
            $.ajax({
                url: '<?= site_url('productlist/getProducts') ?>',
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    var productTable = '';
                    $.each(response.products, function(index, product) {
                        productTable += '<tr>';
                        productTable += '<td></td>';
                        productTable += '<td>' + product.name_product + '</td>';
                        productTable += '<td>' + product.description_product + '</td>';
                        productTable += '<td>Rp' + product.price_product + '</td>';
                        productTable += '<td>';
                        productTable += '<a href="#" class="btn btn-primary edit-product-btn" data-id="' + product.id_product + '" data-bs-toggle="modal" data-bs-target="#editProductModal">Edit</a> ';
                        productTable += '<form action="<?= site_url('productlist/delete') ?>" method="post" class="d-inline delete-product-form">';
                        productTable += '<input type="hidden" name="id_product" value="' + product.id_product + '">';
                        productTable += '<?= csrf_field() ?>';
                        productTable += '<button type="submit" class="btn btn-danger">Delete</button>';
                        productTable += '</form>';
                        productTable += '</td>';
                        productTable += '<td><input type="checkbox" class="checkbox" id="vehicle1" name="vehicle1" value="Bike"></td>';
                        productTable += '</tr>';
                    });
                    $('#product-list').html(productTable);
                },
                error: function() {
                    alert('Could not load products');
                }
            });
        }

        $(document).on('submit', '.delete-product-form', function(e) {
            e.preventDefault();
            var form = $(this);

            // Use SweetAlert for delete confirmation
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: 'Anda tidak akan dapat mengembalikan ini!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: form.attr('action'),
                        type: 'POST',
                        data: form.serialize(),
                        success: function(response) {
                            Swal.fire(
                                'Dihapus!',
                                'Produk berhasil dihapus.',
                                'success'
                            )
                            loadProducts();
                        },
                        error: function() {
                            Swal.fire(
                                'Gagal!',
                                'Produk tidak dapat dihapus.',
                                'error'
                            )
                        }
                    });
                }
            });
        });

        $(document).on('click', '.edit-product-btn', function() {
            var id = $(this).data('id');
            $.ajax({
                url: '<?= site_url('productlist/getProduct') ?>/' + id,
                type: 'GET',
                dataType: 'json',
                success: function(product) {
                    $('#edit_id_product').val(product.id_product);
                    $('#edit_name_product').val(product.name_product);
                    $('#edit_description_product').val(product.description_product);
                    $('#edit_price_product').val(product.price_product);
                    $('#edit_id_categoryProduct').val(product.id_categoryProduct);
                    $('#edit_id_shop').val(product.id_shop);
                    $('#edit_recomended').val(product.recomended);
                },
                error: function() {
                    alert('Could not load product data');
                }
            });
        });

        $('#editProductForm').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    $('#editProductModal').modal('hide');
                    Swal.fire(
                        'Updated!',
                        'Produk berhasil diperbarui.',
                        'success'
                    )
                    loadProducts();
                },
                error: function() {
                    Swal.fire(
                        'Gagal!',
                        'Produk tidak dapat diperbarui.',
                        'error'
                    )
                }
            });
        });
    });
</script>

<?= $this->endSection() ?>
