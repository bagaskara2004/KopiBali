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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<main class="content px-3 py-2">
    <div class="container min-vh-100">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h4>List Produk</h4>
                </div>
                <div class="col-md-8 text-end">
                    <button type="button" class="btn btn-primary" id="addProductBtn" data-bs-toggle="modal" data-bs-target="#addProductModal">Tambah Produk</button>
                </div>
            </div>
            <div class="card">
                <div class="card-datatable table-responsive pt-0">
                    <table class="datatables-basic table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Foto</th>
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
    </div>
</main>

<!-- Add Product Modal -->
<div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addProductModalLabel">Tambah Produk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="addProductForm">
                <div class="modal-body">
                    <input type="hidden" name="id_shop" value="1">
                    <div class="mb-3">
                        <label for="name_product" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control" id="name_product" name="name_product" required>
                    </div>
                    <div class="mb-3">
                        <label for="description_product" class="form-label">Deskripsi Produk</label>
                        <textarea class="form-control" id="description_product" name="description_product"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="price_product" class="form-label">Harga Produk</label>
                        <input type="number" class="form-control" id="price_product" name="price_product" required>
                    </div>
                    <div class="mb-3">
                        <label for="photo_product" class="form-label">Foto Produk</label>
                        <input type="file" class="form-control" id="photo_product" name="photo_product">
                    </div>
                    <div class="mb-3">
                        <label for="id_categoryProduct" class="form-label">Kategori</label>
                        <select class="form-control" id="id_categoryProduct" name="id_categoryProduct">
                            <!-- Pilihan kategori akan dimuat menggunakan AJAX -->
                        </select>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Product Modal -->
<div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="editProductModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProductModalLabel">Edit Produk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editProductForm">
                <div class="modal-body">
                    <input type="hidden" id="edit_id_product" name="id_product">
                    <div class="mb-3">
                        <label for="edit_name_product" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control" id="edit_name_product" name="name_product" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_description_product" class="form-label">Deskripsi Produk</label>
                        <textarea class="form-control" id="edit_description_product" name="description_product"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="edit_price_product" class="form-label">Harga Produk</label>
                        <input type="text" class="form-control" id="edit_price_product" name="price_product" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_photo_product" class="form-label">Foto Produk</label>
                        <input type="file" class="form-control" id="edit_photo_product" name="photo_product">
                        <img id="current_photo_product" src="" class="img-thumbnail mt-2" style="max-height: 100px;">
                    </div>
                    <div class="mb-3">
                        <label for="edit_id_categoryProduct" class="form-label">Kategori</label>
                        <select class="form-control" id="edit_id_categoryProduct" name="id_categoryProduct">
                            <!-- Pilihan kategori akan dimuat menggunakan AJAX -->
                        </select>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="edit_recomended" name="recomended" value="1">
                        <label class="form-check-label" for="edit_recomended">Rekomendasi</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        loadProducts();
        loadCategories();

        function loadProducts() {
            loadCategories();
            $.ajax({
                url: '<?= site_url('productlist/getProducts') ?>',
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    var productTable = '';
                    $.each(response.products, function(index, product) {
                        productTable += '<tr>';
                        productTable += '<td>' + (index + 1) + '</td>';
                        productTable += '<td><img src="<?= base_url('photoProduct/') ?>' + product.photo_product + '" alt="' + product.name_product + '" class="img-fixed-size"></td>';
                        productTable += '<td>' + product.name_product + '</td>';
                        productTable += '<td>' + product.photo_product + '</td>';
                        productTable += '<td>' + product.description_product + '</td>';
                        productTable += '<td>Rp' + product.price_product + '</td>';
                        productTable += '<td>';
                        productTable += '<a href="#" class="btn btn-primary edit-product-btn" data-id="' + product.id_product + '" data-bs-toggle="modal" data-bs-target="#editProductModal">Edit</a> ';
                        productTable += '<form action="<?= site_url('productlist/deleteProduct') ?>" method="post" class="d-inline delete-product-form">';
                        productTable += '<input type="hidden" name="id_product" value="' + product.id_product + '">';
                        productTable += '<?= csrf_field() ?>';
                        productTable += '<button type="submit" class="btn btn-danger">Delete</button>';
                        productTable += '</form>';
                        productTable += '</td>';
                        productTable += '<td><input type="checkbox" class="form-check-input checkbox-recomended" data-id="' + product.id_product + '" ' + (product.recomended == 1 ? 'checked' : '') + '></td>';
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

            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: 'Anda tidak akan dapat mengembalikan ini!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus itu!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: form.attr('action'),
                        method: form.attr('method'),
                        data: form.serialize(),
                        success: function(response) {
                            Swal.fire(
                                'Dihapus!',
                                'Data Anda telah dihapus.',
                                'success'
                            )
                            loadProducts();
                            $('.modal-backdrop').remove();
                        },
                        error: function() {
                            Swal.fire(
                                'Gagal!',
                                'Terjadi kesalahan saat menghapus data.',
                                'error'
                            )
                        }
                    });
                }
            });
        });

        $('#addProductForm').on('submit', function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                url: '<?= site_url('productlist/saveProduct') ?>',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    $('#addProductModal').modal('hide');
                    $('#addProductForm')[0].reset();
                    loadProducts();
                    $('.modal-backdrop').remove();
                    Swal.fire(
                        'Berhasil!',
                        'Produk berhasil ditambahkan.',
                        'success'
                    )
                },
                error: function() {
                    Swal.fire(
                        'Gagal!',
                        'Terjadi kesalahan saat menambahkan produk.',
                        'error'
                    )
                }
            });
        });

        $(document).on('click', '.edit-product-btn', function() {
            var productId = $(this).data('id');
            $.ajax({
                url: '<?= site_url('productlist/getProductById') ?>/' + productId,
                type: 'GET',
                dataType: 'json',
                success: function(product) {

                    $('#edit_id_product').val(product.id_product);
                    $('#edit_name_product').val(product.name);
                    $('#edit_description_product').val(product.description);
                    $('#edit_price_product').val(product.price);
                    $('#current_photo_product').attr('src', '<?= base_url('photoProduct/') ?>' + product.photo);
                    $('#edit_id_categoryProduct').val(product.id_categoryProduct);
                    $('#edit_recomended').prop('checked', product.recomended == 1);


                }
            });
        });

        $('#editProductForm').on('submit', function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                url: '<?= site_url('productlist/updateProduct') ?>',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    $('#editProductModal').modal('hide');

                    alert('Produk berhasil diperbarui');

                    loadProducts();
                    $('.modal-backdrop').remove();

                },
                error: function(xhr, status, error) {
                    console.error('Status: ' + status);
                    console.error('Error: ' + error);
                    console.error('Response: ' + xhr.responseText);
                    alert('Terjadi kesalahan. Silakan coba lagi.');
                }
            });
        });



        function loadCategories() {
            $.ajax({
                url: '<?= site_url('productlist/getCategories') ?>',
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    var categoryOptions = '<option value="">Pilih Kategori</option>';
                    $.each(response.categories, function(index, category) {
                        categoryOptions += '<option value="' + category.id_categoryProduct + '">' + category.name_categoryProduct + '</option>';
                    });
                    $('#id_categoryProduct').html(categoryOptions);
                    $('#edit_id_categoryProduct').html(categoryOptions);
                },
                error: function() {
                    alert('Could not load categories');
                }
            });
        }

        $(document).on('change', '.checkbox-recomended', function() {
            var id_product = $(this).data('id');
            var recomended = $(this).is(':checked') ? 1 : 0;
            $.ajax({
                url: '<?= site_url('productlist/updateRecomended') ?>/' + id_product,
                type: 'POST',
                data: {
                    recomended: recomended
                },
                success: function(response) {
                    Swal.fire(
                        'Berhasil!',
                        'Status rekomendasi berhasil diperbarui.',
                        'success'
                    )
                },
                error: function() {
                    Swal.fire(
                        'Gagal!',
                        'Terjadi kesalahan saat memperbarui status rekomendasi.',
                        'error'
                    )
                }
            });
        });
    });
</script>

<?= $this->endSection() ?>