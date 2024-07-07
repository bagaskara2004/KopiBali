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
                    <h4>List Subscription</h4>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-datatable table-responsive pt-0">
                <table class="datatables-basic table" id="subscriptionTable">
                    <thead>
                        <tr>
                            <th>Email</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        loadUserData();

        function loadUserData() {
            $.ajax({
                url: '<?= base_url('subcriptionlist/getUser') ?>',
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    var users = response.users;
                    var tableBody = $('#subscriptionTable tbody');
                    tableBody.empty();

                    if (users.length > 0) {
                        users.forEach(function(user) {
                            var row = '<tr>' +
                                '<td>' + user.email_user + '</td>' +
                                '<td>' + user.date + '</td>' +
                                '<td>' +
                                '<a href="#" class="btn btn-danger delete-user" data-id="' + user.id_user + '">Delete</a>' +
                                '</td>' +
                                '</tr>';
                            tableBody.append(row);
                        });
                    } else {
                        tableBody.append('<tr><td colspan="4">No users found</td></tr>');
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }

        $(document).on('click', '.delete-user', function(e) {
            e.preventDefault();
            var userId = $(this).data('id');

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '<?= base_url('subcriptionlist/deleteUser') ?>',
                        type: 'POST',
                        data: {
                            id_user: userId
                        },
                        success: function(response) {
                            Swal.fire(
                                'Deleted!',
                                'User has been deleted.',
                                'success'
                            );
                            loadUserData();
                        },
                        error: function(xhr, status, error) {
                            Swal.fire(
                                'Error!',
                                'There was a problem deleting the user.',
                                'error'
                            );
                        }
                    });
                }
            });
        });
    });
</script>

<?= $this->endSection() ?>