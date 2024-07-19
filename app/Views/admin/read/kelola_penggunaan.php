<?= $this->extend('builder/templates/main_admin');  ?>

<?= $this->section('content');  ?>
<div class="col py-3">
    <!-- <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Cari data" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
    </form> -->
    <div class="my-5 table-responsive scrollbar scrollbar-dark" style="height: 50vh; overflow-y: auto;">
        <table class="table align-middle ">
            <thead style="position: sticky; top: 0;z-index: 1; background-color:#fff;">
                <tr>
                    <th>id_penggunaan</th>
                    <th>nama_pelanggan</th>
                    <th>bulan/tahun</th>
                    <th>meter_awal</th>
                    <th>meter_akhir</th>
                    <th class="text-center">action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (empty($penggunaan)) { ?>
                    <tr>
                        <td colspan="6" class="text-center">Data tidak ditemukan</td>
                    </tr>
                <?php }
                foreach ($penggunaan as $p) { ?>
                    <tr>
                        <td><?= $p['id_penggunaan']  ?></td>
                        <td><?= $p['nama_pelanggan']  ?></td>
                        <td><?= $p['bulan']  ?>/<?= $p['tahun']  ?></td>
                        <td><?= $p['meter_awal']  ?> VA</td>
                        <td><?= $p['meter_akhir']  ?> VA</td>
                        <td class="d-flex justify-content-center">
                            <form method="post">
                                <input type="hidden" name="id_penggunaan" id="id_penggunaan" value="<?= $p['id_penggunaan'] ?>">
                                <input type="hidden" name="id_pelanggan" id="id_pelanggan" value="<?= $p['id_pelanggan'] ?>">
                                <input type="hidden" name="meter_awal" id="meter_awal" value="<?= $p['meter_awal'];  ?>">
                                <input type="hidden" name="meter_akhir" id="meter_akhir" value="<?= $p['meter_akhir'];  ?>">
                                <button formaction="<?= base_url('admin/create_tagihan') ?>" class="btn btn-primary" id="add-data-btn">Tambah Tagihan</button>
                                <button formaction="<?= base_url('admin/edit_penggunaan') ?>" class="btn btn-warning mx-1" id="add-data-btn">Edit</button>
                                <button formaction="<?= base_url('admin/delete_penggunaan') ?>" class="btn btn-danger mx-1" id="add-data-btn">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php
                } ?>
            </tbody>
        </table>
    </div>
    <a class="btn btn-primary float-end" href="<?= base_url('/admin/kelola_pelanggan')  ?>" role="button">Tambah Penggunaan</a>
</div>
<?= $this->endSection();  ?>