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
                <div class="col-md-8 text-end">
                    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addCategoryModal">Tambah Kategori</button>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-datatable table-responsive pt-0">
                <table class="datatables-basic table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="category-list">
                        <!-- Data kategori akan dimuat di sini menggunakan AJAX -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<!-- Add Category Modal -->
<div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCategoryModalLabel">Tambah Kategori</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addCategoryForm" action="<?php echo site_url('cproduct/save'); ?>" method="post">
                    <div class="mb-3">
                        <label for="name_categoryProduct" class="form-label">Nama Kategori</label>
                        <input type="text" class="form-control" id="name_categoryProduct" name="name_categoryProduct" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit Category Modal -->
<div class="modal fade" id="editCategoryModal" tabindex="-1" aria-labelledby="editCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editCategoryModalLabel">Edit Kategori</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editCategoryForm" action="<?php echo site_url('cproduct/update'); ?>" method="post">
                    <input type="hidden" id="edit_id_categoryProduct" name="id_categoryProduct">
                    <div class="mb-3">
                        <label for="edit_name_categoryProduct" class="form-label">Nama Kategori</label>
                        <input type="text" class="form-control" id="edit_name_categoryProduct" name="name_categoryProduct" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        loadCategories();

        function loadCategories() {
            $.ajax({
                url: '<?= site_url('cproduct/getCategories') ?>',
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    var categoryTable = '';
                    $.each(response.categories, function(index, category) {
                        categoryTable += '<tr>';
                        categoryTable += '<td>' + category.id_categoryProduct + '</td>';
                        categoryTable += '<td>' + category.name_categoryProduct + '</td>';
                        categoryTable += '<td>';
                        categoryTable += '<a href="#" class="btn btn-primary edit-category-btn" data-id="' + category.id_categoryProduct + '" data-bs-toggle="modal" data-bs-target="#editCategoryModal">Edit</a> ';
                        categoryTable += '<form action="<?= site_url('cproduct/delete') ?>" method="post" class="d-inline delete-category-form">';
                        categoryTable += '<input type="hidden" name="id_categoryProduct" value="' + category.id_categoryProduct + '">';
                        categoryTable += '<?= csrf_field() ?>';
                        categoryTable += '</form>';
                        categoryTable += '</td>';
                        categoryTable += '</tr>';
                    });
                    $('#category-list').html(categoryTable);
                },
                error: function() {
                    alert('Could not load categories');
                }
            });
        }

        $(document).on('submit', '.delete-category-form', function(e) {
            e.preventDefault();
            var form = $(this);

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
                                'Kategori berhasil dihapus.',
                                'success'
                            )
                            loadCategories();
                            $('.modal-backdrop').remove();
                        },
                        error: function() {
                            Swal.fire(
                                'Gagal!',
                                'Kategori tidak dapat dihapus.',
                                'error'
                            )
                        }
                    });
                }
            });
        });

        $(document).on('click', '.edit-category-btn', function() {
            var id = $(this).data('id');
            $.ajax({
                url: '<?= site_url('cproduct/getCategory') ?>/' + id,
                type: 'GET',
                dataType: 'json',
                success: function(category) {
                    $('#edit_id_categoryProduct').val(category.id_categoryProduct);
                    $('#edit_name_categoryProduct').val(category.name_categoryProduct);
                },
                error: function() {
                    alert('Could not load category data');
                }
            });
        });

        $('#editCategoryForm').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    $('#editCategoryModal').modal('hide');
                    Swal.fire(
                        'Updated!',
                        'Kategori berhasil diperbarui.',
                        'success'
                    )
                    loadCategories();
                    $('.modal-backdrop').remove();
                },
                error: function() {
                    Swal.fire(
                        'Gagal!',
                        'Kategori tidak dapat diperbarui.',
                        'error'
                    )
                }
            });
        });

        $('#addCategoryForm').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    $('#addCategoryModal').modal('hide');
                    Swal.fire(
                        'Saved!',
                        'Kategori berhasil disimpan.',
                        'success'
                    )
                    loadCategories();
                    $('.modal-backdrop').remove();
                },
                error: function() {
                    Swal.fire(
                        'Gagal!',
                        'Kategori tidak dapat disimpan.',
                        'error'
                    )
                }
            });
        });
    });
</script>

<?= $this->endSection() ?>