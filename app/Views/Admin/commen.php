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
                    <h4>List Users with No Posts</h4>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-datatable table-responsive pt-0">
                <table class="datatables-basic table" id="userTable">
                    <thead>
                        <tr>
                            <th>Email</th>
                            <th>Nama</th>
                            <th>Comment</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user) : ?>
                            <tr>
                                <td><?= esc($user['email']) ?></td>
                                <td><?= esc($user['name']) ?></td>
                                <td><?= esc($user['comment']) ?></td>
                                <td>
                                    <form method="post" action="/userlist/updatePostStatus">
                                        <input type="hidden" name="id_user" value="<?= $user['id_user'] ?>">
                                        <button type="submit" name="action" value="1" class="btn btn-success btn-sm">Ya</button>
                                        <button type="submit" name="action" value="2" class="btn btn-danger btn-sm">Tidak</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<?= $this->endSection() ?>