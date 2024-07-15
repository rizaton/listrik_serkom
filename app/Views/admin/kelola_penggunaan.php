<?= $this->extend('builder/templates/main_admin');  ?>

<?= $this->section('content');  ?>
<div class="col py-3">
    <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Cari data" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
    <div class="my-5 table-responsive scrollbar scrollbar-dark" style="height: 70vh; overflow-y: auto;">
        <table class="table align-middle ">
            <thead style="position: sticky; top: 0;z-index: 1; background-color:#fff;">
                <tr>
                    <th>#</th>
                    <th>id_penggunaan</th>
                    <th>nama_pelanggan</th>
                    <th>bulan/tahun</th>
                    <th>meter_awal</th>
                    <th>meter_akhir</th>
                    <th class="text-center">action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 0;
                // for ($i = 0; $i < 50; $i++) {
                foreach ($penggunaan as $p) { ?>
                    <tr>
                        <td><?= $i + 1; ?></td>
                        <td><?= $p['id_penggunaan']  ?></td>
                        <td><?= $p['nama_pelanggan']  ?></td>
                        <td><?= $p['bulan']  ?>/<?= $p['tahun']  ?></td>
                        <td><?= $p['meter_awal']  ?></td>
                        <td><?= $p['meter_akhir']  ?></td>
                        <td class="d-flex justify-content-center">
                            <a href="<?= base_url('admin/edit_penggunaan/' . $p['id_penggunaan']) ?>" class="btn btn-warning mx-1">Edit</a>
                            <a href="<?= base_url('admin/delete_penggunaan/' . $p['id_penggunaan']) ?>" class="btn btn-danger mx-1">Delete</a>
                        </td>
                    </tr>
                <?php $i++;
                    // }
                } ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection();  ?>