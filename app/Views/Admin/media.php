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
                    <h4>List Media</h4>
                </div>
            </div>
            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addMediaModal">
                Tambah Media
            </button>
        </div>
        <div class="card">
            <div class="card-datatable table-responsive pt-0">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Category</th>
                            <th>Link Media</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="media-list">
                        <!-- Media data will be appended here by JavaScript -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<!-- Modals -->
<div class="modal fade" id="addMediaModal" tabindex="-1" aria-labelledby="addMediaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="addMediaForm" action="<?= site_url('medialist/saveMedia') ?>" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="addMediaModalLabel">Tambah Media</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_shop" value="1">
                    <div class="mb-3">
                        <label for="link_media" class="form-label">Category</label>
                        <input type="text" class="form-control" id="name_media" name="name_media" required>
                    </div>
                    <div class="mb-3">
                        <label for="link_media" class="form-label">Link Media</label>
                        <input type="text" class="form-control" id="link_media" name="link_media" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="editMediaModal" tabindex="-1" aria-labelledby="editMediaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editMediaForm">
                <div class="modal-header">
                    <h5 class="modal-title" id="editMediaModalLabel">Edit Media</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="editMediaId" name="id">
                    <!-- <input type="hidden" name="id_shop" value="1"> -->
                    <div class="mb-3">
                        <label for="editCategory" class="form-label">Category</label>
                        <input type="text" class="form-control" id="editCategory" name="name_media" required>
                    </div>
                    <div class="mb-3">
                        <label for="editLink" class="form-label">Link Media</label>
                        <input type="text" class="form-control" id="editLink" name="link_media" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        loadMedia();

        function loadMedia() {
            $.ajax({
                url: '<?= site_url('medialist/getMedia') ?>',
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    var mediaTable = '';
                    $.each(response.media, function(index, media) {
                        mediaTable += '<tr>';
                        mediaTable += '<td>' + (index + 1) + '</td>';
                        mediaTable += '<td>' + media.name + '</td>';
                        mediaTable += '<td>' + media.link + '</td>';
                        mediaTable += '<td>';
                        mediaTable += '<button class="btn btn-primary edit-media-btn" data-id="' + media.id_media + '" data-bs-toggle="modal" data-bs-target="#editMediaModal">Edit</button> ';
                        mediaTable += '<form action="<?= site_url('medialist/deleteMedia') ?>" method="post" class="d-inline delete-media-form">';
                        mediaTable += '<input type="hidden" name="id_media" value="' + media.id_media + '">';
                        mediaTable += '<?= csrf_field() ?>';
                        mediaTable += '<button type="submit" class="btn btn-danger">Delete</button>';
                        mediaTable += '</form>';
                        mediaTable += '</tr>';
                    });
                    $('#media-list').html(mediaTable);
                },
                error: function() {
                    alert('Could not load media');
                }
            });
        }

        $('#addMediaForm').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    if (response.status === 'success') {
                        $('#addMediaModal').modal('hide');
                        Swal.fire(
                            'Saved!',
                            'Kategori berhasil disimpan.',
                            'success'
                        )
                        loadMedia();
                        $('.modal-backdrop').remove();
                    } else {
                        Swal.fire(
                            'Error',
                            response.message || 'Could not save media due to an unknown error.',
                            'error'
                        );
                    }
                },
                error: function(xhr, status, error) {
                    Swal.fire(
                        'Error',
                        xhr.responseJSON ? xhr.responseJSON.message : 'Could not save media. Please try again.',
                        'error'
                    );
                }
            });
        });
        $('#media-list').on('click', '.edit-media-btn', function() {
            var id = $(this).data('id');
            $.ajax({
                url: '<?= site_url('medialist/getMediaById') ?>/' + id,
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    if (response && response.id_media) {
                        $('#editMediaId').val(response.id_media);
                        $('#editCategory').val(response.name_media);
                        $('#editLink').val(response.link_media);
                    } else {
                        console.error('Invalid response:', response);
                        alert('Data media tidak ditemukan.');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching media:', xhr, status, error);
                    var errorMessage = xhr.responseJSON ? xhr.responseJSON.message : 'Terjadi kesalahan saat mengambil data media. Silakan coba lagi nanti.';
                    alert(errorMessage);
                }
            });
        });


        $('#editMediaForm').on('submit', function(event) {
            event.preventDefault();
            $.ajax({
                url: '<?= site_url('medialist/updateMedia') ?>',
                type: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    if (response.status === 'success') {
                        $('#editMediaModal').modal('hide');
                        Swal.fire(
                            'Updated!',
                            'Media berhasil diperbarui.',
                            'success'
                        )
                        loadMedia();

                        $('.modal-backdrop').remove();
                    } else {
                        Swal.fire(
                            'Error',
                            response.message || 'Could not update media due to an unknown error.',
                            'error'
                        );
                    }
                },
                error: function(xhr, status, error) {
                    Swal.fire(
                        'Error',
                        xhr.responseJSON ? xhr.responseJSON.message : 'Could not update media. Please try again.',
                        'error'
                    );
                }
            });
        });

        $(document).on('submit', '.delete-media-form', function(e) {
            e.preventDefault();
            var form = $(this);

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: form.attr('action'),
                        method: form.attr('method'),
                        data: form.serialize(),
                        success: function(response) {
                            if (response.status === 'success') {
                                Swal.fire(
                                    'Deleted!',
                                    'Your media has been deleted.',
                                    'success'
                                )
                                loadMedia();

                                $('.modal-backdrop').remove();
                            } else {
                                Swal.fire(
                                    'Failed!',
                                    response.message || 'Could not delete media.',
                                    'error'
                                );
                            }
                        },
                        error: function() {
                            Swal.fire(
                                'Failed!',
                                'Error occurred while deleting media.',
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