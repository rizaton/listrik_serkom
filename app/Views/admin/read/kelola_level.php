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
                    <th>id_level</th>
                    <th>nama_level</th>
                    <th class="text-center">action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (empty($level)) { ?>
                    <tr>
                        <td colspan="3" class="text-center">Data tidak ditemukan</td>
                    </tr>
                <?php
                }
                foreach ($level as $l) { ?>
                    <tr>
                        <form method="post">
                            <input type="hidden" name="id_level" id="id_level" value="<?= $l['id_level'] ?>">
                            <th><?= $l['id_level']  ?></th>
                            <th><?= $l['nama_level']  ?></th>
                            <th class="d-flex justify-content-center">
                                <button formaction="<?= base_url('admin/edit_level') ?>" class="btn btn-warning mx-1" id="add-data-btn">Edit</button>
                                <button formaction="<?= base_url('admin/delete_level') ?>" class="btn btn-danger mx-1" id="add-data-btn">Delete</button>
                            </th>
                        </form>
                    </tr>
                <?php
                } ?>
            </tbody>
        </table>
    </div>
    <a class="btn btn-primary float-end" href="<?= base_url('/admin/create_level')  ?>" role="button">Tambah Level</a>
</div>
<?= $this->endSection();  ?>