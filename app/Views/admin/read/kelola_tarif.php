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
                    <th>id_tarif</th>
                    <th>daya</th>
                    <th>tarif_perkwh</th>
                    <th class="text-center">action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (empty($tarif)) { ?>
                    <tr>
                        <td colspan="4" class="text-center">Data tidak ditemukan</td>
                    </tr>
                <?php }
                foreach ($tarif as $t) { ?>
                    <tr>
                        <form method="post">
                            <input type="hidden" name="id_tarif" id="id_tarif" value="<?= $t['id_tarif'] ?>">
                            <td><?= $t['id_tarif']  ?></td>
                            <td><?= $t['daya']  ?>VA</td>
                            <td>Rp.<?= $t['tarifperkwh']  ?></td>
                            <td class="d-flex justify-content-center">
                                <button formaction="<?= base_url('admin/edit_tarif') ?>" class="btn btn-warning mx-1" id="add-data-btn">Edit</button>
                                <button formaction="<?= base_url('admin/delete_tarif') ?>" class="btn btn-danger mx-1" id="add-data-btn">Delete</button>
                            </td>
                        </form>
                    </tr>
                <?php
                } ?>
            </tbody>
        </table>
    </div>
    <a class="btn btn-primary float-end" href="<?= base_url('/admin/create_tarif')  ?>" role="button">Tambah Tarif</a>
</div>
<?= $this->endSection();  ?>