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
                <?php
                if (empty($tagihan)) { ?>
                    <tr>
                        <td colspan="8" class="text-center">Data tidak ditemukan</td>
                    </tr>
                <?php }
                foreach ($tagihan as $t) { ?>
                    <tr>
                        <form method="post">
                            <input type="hidden" name="id_tagihan" id="id_tagihan" value="<?= $t['id_tagihan'] ?>">
                            <td><?= $t['id_tagihan']  ?></td>
                            <td><?= $t['nama_pelanggan']  ?></td>
                            <td><?= $t['bulan']  ?>/<?= $t['tahun']  ?></td>
                            <td><?= $t['jumlah_meter']  ?> Watt</td>
                            <td><?= $t['meter_awal']  ?> Watt</td>
                            <td><?= $t['meter_akhir']  ?> Watt</td>
                            <td><?php
                                foreach ($status as $s) {
                                    echo $t['id_status'] == $s['id_status'] ? $s['status'] : '';
                                } ?>
                            </td>
                            <td class="d-flex justify-content-center">
                                <button formaction="<?= base_url('admin/edit_tagihan') ?>" class="btn btn-warning mx-1" id="add-data-btn">Edit</button>
                                <button formaction="<?= base_url('admin/delete_tagihan') ?>" class="btn btn-danger mx-1" id="add-data-btn">Delete</button>
                            </td>
                        </form>
                    </tr>
                <?php
                } ?>
            </tbody>
        </table>
    </div>
    <a class="btn btn-primary float-end" href="<?= base_url('/admin/kelola_penggunaan')  ?>" role="button">Tambah Tagihan</a>
</div>
<?= $this->endSection();  ?>