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
                    <th>id_tarif</th>
                    <th>daya</th>
                    <th>tarif_perkwh</th>
                    <th class="text-center">action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 0;
                foreach ($tarif as $t) { ?>
                    <tr>
                        <th><?= $i + 1; ?></th>
                        <th><?= $t['id_tarif']  ?></th>
                        <th><?= $t['daya']  ?></th>
                        <th><?= $t['tarifperkwh']  ?></th>
                        <th class="d-flex justify-content-center">
                            <a href="<?= base_url('admin/edit_tarif/' . $t['id_tarif']) ?>" class="btn btn-warning mx-1">Edit</a>
                            <a href="<?= base_url('admin/delete_tarif/' . $t['id_tarif']) ?>" class="btn btn-danger mx-1">Delete</a>
                        </th>
                    </tr>
                <?php $i++;
                } ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection();  ?>