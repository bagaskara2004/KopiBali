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
            <form id="addMediaForm">
                <div class="modal-header">
                    <h5 class="modal-title" id="addMediaModalLabel">Tambah Media</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <input type="text" class="form-control" id="category" name="category" required>
                    </div>
                    <div class="mb-3">
                        <label for="link" class="form-label">Link Media</label>
                        <input type="text" class="form-control" id="link" name="link" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
                    <div class="mb-3">
                        <label for="editCategory" class="form-label">Category</label>
                        <input type="text" class="form-control" id="editCategory" name="category" required>
                    </div>
                    <div class="mb-3">
                        <label for="editLink" class="form-label">Link Media</label>
                        <input type="text" class="form-control" id="editLink" name="link" required>
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
                        mediaTable += '<button class="btn btn-danger delete-media-btn" data-id="' + media.id_media + '">Delete</button>';
                        mediaTable += '</td>';
                        mediaTable += '</tr>';
                    });
                    $('#media-list').html(mediaTable);
                },
                error: function() {
                    alert('Could not load media');
                }
            });
        }

        $('#addMediaForm').on('submit', function(event) {
            event.preventDefault();
            $.ajax({
                url: '<?= site_url('medialist/saveMedia') ?>',
                type: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    $('#addMediaModal').modal('hide');
                    loadMedia();
                },
                error: function() {
                    alert('Could not save media');
                }
            });
        });

        $('#media-list').on('click', '.edit-media-btn', function() {
            var id = $(this).data('id');
            $.ajax({
                url: '<?= site_url('getMediaById') ?>/' + id,
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    $('#editMediaId').val(response.id_media);
                    $('#editCategory').val(response.name);
                    $('#editLink').val(response.link);
                },
                error: function() {
                    alert('Could not fetch media details');
                }
            });
        });

        $('#editMediaForm').on('submit', function(event) {
            event.preventDefault();
            $.ajax({
                url: '<?= site_url('updateMedia') ?>',
                type: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    $('#editMediaModal').modal('hide');
                    loadMedia();
                },
                error: function() {
                    alert('Could not update media');
                }
            });
        });

        $('#media-list').on('click', '.delete-media-btn', function() {
            if (confirm('Are you sure you want to delete this media?')) {
                var id = $(this).data('id');
                $.ajax({
                    url: '<?= site_url('deleteMedia') ?>',
                    type: 'POST',
                    data: {
                        id: id
                    },
                    success: function(response) {
                        loadMedia();
                    },
                    error: function() {
                        alert('Could not delete media');
                    }
                });
            }
        });
    });
</script>

<?= $this->endSection() ?>