<?= $this->extend('builder/templates/main_admin');  ?>

<?= $this->section('content');  ?>
<div class="col py-3">
    <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Cari data" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
    <div class="my-5 table-responsive scrollbar scrollbar-dark" style="height: 70vh; overflow-y: auto;">
        <table class="table align-middle">
            <thead style="position: sticky; top: 0;z-index: 1; background-color:#fff;">
                <tr>
                    <th>#</th>
                    <th>id_admin</th>
                    <th>nama_admin</th>
                    <th>username</th>
                    <th>password</th>
                    <th>nama_level</th>
                    <th class="text-center">action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 0;
                foreach ($user as $u) { ?>
                    <tr>
                        <td><?= $i + 1; ?></td>
                        <td><?= $u['id_user']  ?></td>
                        <td><?= $u['nama_admin']  ?></td>
                        <td><?= $u['username']  ?></td>
                        <td>*****</td>
                        <td><?= $u['nama_level']  ?></td>
                        <td class="d-flex justify-content-center">
                            <a href="<?= base_url('admin/edit_user/' . $u['id_user']) ?>" class="btn btn-warning mx-1">Edit</a>
                            <a href="<?= base_url('admin/delete_user/' . $u['id_user']) ?>" class="btn btn-danger mx-1">Delete</a>
                        </td>
                    </tr>
                <?php $i++;
                } ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection();  ?>