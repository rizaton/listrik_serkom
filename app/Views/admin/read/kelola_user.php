<?= $this->extend('builder/templates/main_admin');  ?>

<?= $this->section('content');  ?>
<div class="col py-3">
    <!-- <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Cari data" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
    </form> -->
    <div class="my-5 table-responsive scrollbar scrollbar-dark" style="height: 50vh; overflow-y: auto;">
        <table class="table align-middle">
            <thead style="position: sticky; top: 0;z-index: 1; background-color:#fff;">
                <tr>
                    <th>id_admin</th>
                    <th>nama_admin</th>
                    <th>username</th>
                    <th>password</th>
                    <th>nama_level</th>
                    <th class="text-center">action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (empty($user)) { ?>
                    <tr>
                        <td colspan="6" class="text-center">Data tidak ditemukan</td>
                    </tr>
                <?php }
                foreach ($user as $u) { ?>
                    <tr>
                        <form method="post">
                            <input type="hidden" name="id_user" id="id_user" value="<?= $u['id_user'] ?>">
                            <td><?= $u['id_user']  ?></td>
                            <td><?= $u['nama_admin']  ?></td>
                            <td><?= $u['username']  ?></td>
                            <td>*****</td>
                            <td><?= $u['nama_level']  ?></td>
                            <td class="d-flex justify-content-center">
                                <button formaction="<?= base_url('admin/edit_user') ?>" class="btn btn-warning mx-1" id="add-data-btn">Edit</button>
                                <button formaction="<?= base_url('admin/delete_user') ?>" class="btn btn-danger mx-1" id="add-data-btn">Delete</button>
                            </td>
                        </form>
                    </tr>
                <?php
                } ?>
            </tbody>
        </table>
    </div>
    <a class="btn btn-primary float-end" href="<?= base_url('/admin/create_user')  ?>" role="button">Tambah User</a>
</div>
<?= $this->endSection();  ?>