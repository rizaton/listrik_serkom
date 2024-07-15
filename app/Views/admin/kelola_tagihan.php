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
                    <th>id_tagihan</th>
                    <th>nama_pelanggan</th>
                    <th>bulan/tahun</th>
                    <th>jumlah_meter</th>
                    <th>meter_awal</th>
                    <th>meter_akhir</th>
                    <th>status</th>
                    <th class="text-center">action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 0;
                foreach ($tagihan as $t) { ?>
                    <tr>
                        <td><?= $i + 1; ?></td>
                        <td><?= $t['id_tagihan']  ?></td>
                        <td><?= $t['nama_pelanggan']  ?></td>
                        <td><?= $t['bulan']  ?>/<?= $t['tahun']  ?></td>
                        <td><?= $t['jumlah_meter']  ?></td>
                        <td><?= $t['meter_awal']  ?></td>
                        <td><?= $t['meter_akhir']  ?></td>
                        <td><?php
                            if ($t['status'] == 0) {
                                echo "Belum Lunas";
                            } else if ($t['status'] == 1) {
                                echo "Lunas";
                            } else {
                                echo "Dalam Proses";
                            }
                            ?></td>
                        <td class="d-flex justify-content-center">
                            <a href="<?= base_url('admin/edit_tagihan/' . $t['id_tagihan']) ?>" class="btn btn-warning mx-1">Edit</a>
                            <a href="<?= base_url('admin/delete_tagihan/' . $t['id_tagihan']) ?>" class="btn btn-danger mx-1">Delete</a>
                        </td>
                    </tr>
                <?php $i++;
                } ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection();  ?>