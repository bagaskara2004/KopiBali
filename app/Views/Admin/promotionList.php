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
                            <th>Photo</th>
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

<!-- Modal Tambah Promosi -->
<div class="modal fade" id="addPromotionModal" tabindex="-1" aria-labelledby="addPromotionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addPromotionModalLabel">Tambah Promosi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="addPromotionForm" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" name="id_shop" value="1">
                    <div class="mb-3">
                        <label for="title_promotion" class="form-label">Judul Promosi</label>
                        <input type="text" class="form-control" id="title_promotion" name="title_promotion" required>
                    </div>
                    <div class="mb-3">
                        <label for="description_promotion" class="form-label">Deskripsi Promosi</label>
                        <textarea class="form-control" id="description_promotion" name="description_promotion" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="photo_promotion" class="form-label">Foto Promosi</label>
                        <input type="file" class="form-control" id="photo_promotion" name="photo_promotion" required>
                    </div>
                    <div class="mb-3">
                        <label for="start_date" class="form-label">Tanggal Mulai</label>
                        <input type="datetime-local" class="form-control" id="start_date" name="start_date" required>
                    </div>
                    <div class="mb-3">
                        <label for="end_date" class="form-label">Tanggal Selesai</label>
                        <input type="datetime-local" class="form-control" id="end_date" name="end_date" required>
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

<!-- Modal Edit Promosi -->
<div class="modal fade" id="editPromotionModal" tabindex="-1" aria-labelledby="editPromotionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editPromotionModalLabel">Edit Promosi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editPromotionForm" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" name="id_promotion" id="edit_id_promotion">
                    <div class="mb-3">
                        <label for="edit_title_promotion" class="form-label">Judul Promosi</label>
                        <input type="text" class="form-control" id="edit_title_promotion" name="title_promotion" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_description_promotion" class="form-label">Deskripsi Promosi</label>
                        <textarea class="form-control" id="edit_description_promotion" name="description_promotion" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="edit_photo_promotion" class="form-label">Foto Promosi</label>
                        <input type="file" class="form-control" id="edit_photo_promotion" name="photo_promotion">
                        <img id="edit_preview_photo" src="" alt="Preview Photo" class="img-fluid mt-2" style="max-height: 150px;">
                    </div>
                    <div class="mb-3">
                        <label for="edit_start_date" class="form-label">Tanggal Mulai</label>
                        <input type="datetime-local" class="form-control" id="edit_start_date" name="start_date" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_end_date" class="form-label">Tanggal Selesai</label>
                        <input type="datetime-local" class="form-control" id="edit_end_date" name="end_date" required>
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
                        promotionTable += '<td><img src="<?= base_url('photoPromo/') ?>' + promotion.photo + '" alt="' + promotion.title + '" class="img-fixed-size"></td>';
                        promotionTable += '<td>' + promotion.title + '</td>';
                        promotionTable += '<td>' + promotion.description + '</td>';
                        promotionTable += '<td>' + promotion.start + '</td>';
                        promotionTable += '<td>' + promotion.end + '</td>';
                        promotionTable += '<td>';
                        promotionTable += '<a href="#" class="btn btn-primary edit-promotion-btn" data-id="' + promotion.id_promotion + '" data-bs-toggle="modal" data-bs-target="#editPromotionModal">Edit</a> ';
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

        $('#addPromotionForm').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                url: '<?= site_url('promotionlist/save') ?>',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    $('#addPromotionModal').modal('hide'); // Menutup modal
                    $('.modal-backdrop').remove();
                    Swal.fire('Sukses!', 'Promosi berhasil ditambahkan.', 'success');
                    loadPromotions();
                },
                error: function() {
                    Swal.fire('Gagal!', 'Promosi gagal ditambahkan.', 'error');
                }
            });
        });

        $(document).on('click', '.edit-promotion-btn', function() {
            var id = $(this).data('id');
            $.ajax({
                url: '<?= site_url('promotionlist/getPromotion') ?>/' + id,
                type: 'GET',
                dataType: 'json',
                success: function(promotion) {
                    $('#edit_id_promotion').val(promotion.id_promotion);
                    $('#edit_title_promotion').val(promotion.title);
                    $('#edit_description_promotion').val(promotion.description);
                    $('#edit_start_date').val(promotion.start.replace(' ', 'T'));
                    $('#edit_end_date').val(promotion.end.replace(' ', 'T'));
                    $('#edit_preview_photo').attr('src', '<?= base_url('public/photoPromo/') ?>' + promotion.photo);
                },
                error: function() {
                    alert('Could not fetch promotion details');
                }
            });
        });


        $('#editPromotionForm').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);

            if (!$('#edit_photo_promotion').val()) {
                formData.delete('photo_promotion');
            }

            $.ajax({
                url: '<?= site_url('promotionlist/update') ?>',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    $('#editPromotionModal').modal('hide');
                    Swal.fire('Sukses!', 'Promosi berhasil diperbarui.', 'success');
                    loadPromotions();
                    $('.modal-backdrop').remove();
                },
                error: function() {
                    Swal.fire('Gagal!', 'Promosi gagal diperbarui.', 'error');
                }
            });
        });


        $(document).on('submit', '.delete-promotion-form', function(e) {
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
                            Swal.fire('Dihapus!', 'Promosi berhasil dihapus.', 'success');
                            loadPromotions();
                        },
                        error: function() {
                            Swal.fire('Gagal!', 'Promosi tidak dapat dihapus.', 'error');
                        }
                    });
                }
            });
        });
    });
</script>

<?= $this->endSection() ?>