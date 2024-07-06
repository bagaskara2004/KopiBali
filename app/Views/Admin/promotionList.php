<?= $this->extend('Admin\admin') ?>
<?= $this->section('content') ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.0/css/bootstrap.min.css" rel="stylesheet">
<!-- Bootstrap Bundle with Popper -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.0/js/bootstrap.bundle.min.js"></script>


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
                    <h4>List Promosi</h4>
                </div>
            </div>
            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addPromotionModal">
                Tambah Promosi
            </button>
        </div>
        <div class="card">
            <div class="card-datatable table-responsive pt-0">
                <table class="datatables-basic table">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Promosi</th>
                            <th>Deskripsi</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Selesai</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="promotion-list">
                        <!-- Data promosi akan dimuat di sini menggunakan AJAX -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<!-- Modal untuk menambahkan promosi -->
<div class="modal fade" id="addPromotionModal" tabindex="-1" aria-labelledby="addPromotionModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addPromotionModalLabel">Tambah Promosi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addPromotionForm">
                    <div class="mb-3">
                        <label for="title_promotion" class="form-label">Promosi</label>
                        <input type="text" class="form-control" id="title_promotion" name="title_promotion" required>
                    </div>
                    <div class="mb-3">
                        <label for="description_promotion" class="form-label">Deskripsi</label>
                        <input type="text" class="form-control" id="description_promotion" name="description_promotion" required>
                    </div>
                    <div class="mb-3">
                        <label for="start_date" class="form-label">Tanggal Mulai</label>
                        <input type="date" class="form-control" id="start_date" name="start_date" required>
                    </div>
                    <div class="mb-3">
                        <label for="end_date" class="form-label">Tanggal Selesai</label>
                        <input type="date" class="form-control" id="end_date" name="end_date" required>
                    </div>
                    <div class="mb-3">
                        <label for="id_shop" class="form-label">ID Toko</label>
                        <input type="number" class="form-control" id="id_shop" name="id_shop" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="editPromotionModal" tabindex="-1" aria-labelledby="editPromotionModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editPromotionModalLabel">Edit Promosi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editPromotionForm">
                    <input type="hidden" id="edit_id_promotion" name="id_promotion">
                    <div class="mb-3">
                        <label for="edit_title_promotion" class="form-label">Promosi</label>
                        <input type="text" class="form-control" id="edit_title_promotion" name="title_promotion" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_description_promotion" class="form-label">Deskripsi</label>
                        <input type="text" class="form-control" id="edit_description_promotion" name="description_promotion" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_start_date" class="form-label">Tanggal Mulai</label>
                        <input type="date" class="form-control" id="edit_start_date" name="start_date" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_end_date" class="form-label">Tanggal Selesai</label>
                        <input type="date" class="form-control" id="edit_end_date" name="end_date" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        loadPromotions();

        function loadPromotions() {
            $.ajax({
                url: '<?= site_url('promotionlist/getPromotions') ?>',
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    var promotionTable = '';
                    $.each(response.promotions, function(index, promotion) {
                        promotionTable += '<tr>';
                        promotionTable += '<td></td>';
                        promotionTable += '<td>' + promotion.title_promotion + '</td>';
                        promotionTable += '<td>' + promotion.description_promotion + '</td>';
                        promotionTable += '<td>' + promotion.start_date + '</td>';
                        promotionTable += '<td>' + promotion.end_date + '</td>';
                        promotionTable += '<td>';
                        promotionTable += '<a href="#" class="btn btn-primary edit-product-btn" data-id="' + promotion.id_promotion + '" data-bs-toggle="modal" data-bs-target="#editProductModal">Edit</a> ';
                        promotionTable += '<form action="<?= site_url('promotionlist/delete') ?>" method="post" class="d-inline delete-promotion-form">';
                        promotionTable += '<input type="hidden" name="id_promotion" value="' + promotion.id_promotion + '">';
                        promotionTable += '<?= csrf_field() ?>';
                        promotionTable += '<button type="submit" class="btn btn-danger">Delete</button>';
                        promotionTable += '</form>';
                        promotionTable += '</td>';
                        promotionTable += '</tr>';
                    });
                    $('#promotion-list').html(promotionTable);
                },
                error: function() {
                    alert('Could not load promotions');
                }
            });
        }

        $('#addPromotionForm').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                url: '<?= site_url('promotionlist/save') ?>',
                type: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    $('#addPromotionModal').modal('hide');
                    loadPromotions();
                    alert('Promotion added successfully');
                },
                error: function() {
                    alert('Failed to add promotion');
                }
            });
        });

        $(document).on('click', '.edit-promotion-btn', function() {
            var id = $(this).data('id');
            $.ajax({
                url: '<?= site_url('promotionlist/getPromotion') ?>/' + id,
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    $('#edit_id_promotion').val(response.id_promotion);
                    $('#edit_title_promotion').val(response.title_promotion);
                    $('#edit_description_promotion').val(response.description_promotion);
                    $('#edit_start_date').val(response.start_date);
                    $('#edit_end_date').val(response.end_date);
                    $('#editPromotionModal').modal('show');
                },
                error: function() {
                    alert('Could not fetch promotion data');
                }
            });
        });

        $('#editPromotionForm').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                url: '<?= site_url('promotionlist/update') ?>',
                type: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    $('#editPromotionModal').modal('hide');
                    loadPromotions();
                    alert('Promotion updated successfully');
                },
                error: function() {
                    alert('Failed to update promotion');
                }
            });
        });

        $(document).on('submit', '.delete-promotion-form', function(e) {
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
                            loadPromotions();
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
    });
</script>

<?= $this->endSection() ?>