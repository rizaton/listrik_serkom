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
                    <th>id_pembayaran</th>
                    <th>nama_pelanggan</th>
                    <th>biaya_admin</th>
                    <th>total_bayar</th>
                    <th>jumlah_meter</th>
                    <th>nama_admin</th>
                    <th>tanggal_pembayaran</th>
                    <th class="text-center">action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (empty($pembayaran)) { ?>
                    <tr>
                        <td colspan="8" class="text-center">Data tidak ditemukan</td>
                    </tr>
                <?php }
                foreach ($pembayaran as $p) { ?>
                    <tr>
                        <form method="post">
                            <input type="hidden" name="id_pembayaran" id="id_pembayaran" value="<?= $p['id_pembayaran'] ?>">
                            <td><?= $p['id_pembayaran']  ?></td>
                            <td><?= $p['nama_pelanggan']  ?></td>
                            <td>Rp.<?= number_format($p['biaya_admin'])  ?></td>
                            <td>Rp.<?= number_format($p['total_bayar'])  ?></td>
                            <td><?= $p['jumlah_meter']  ?> VA</td>
                            <td><?php
                                foreach ($admin as $a) {
                                    echo $p['id_user'] == $a['id_user'] ? $a['nama_admin'] : '';
                                } ?>
                            </td>
                            <td><?= $p['tanggal_pembayaran']  ?></td>
                            <td class="d-flex justify-content-center">
                                <button formaction="<?= base_url('admin/edit_pembayaran') ?>" class="btn btn-warning mx-1" id="add-data-btn">Edit</button>
                                <button formaction="<?= base_url('admin/delete_pembayaran') ?>" class="btn btn-danger mx-1" id="add-data-btn">Delete</button>
                            </td>
                        </form>
                    </tr>
                <?php
                } ?>
            </tbody>
        </table>
    </div>
    <a class="btn btn-primary float-end" href="<?= base_url('/admin/kelola_tagihan')  ?>" role="button">Tambah Pembayaran</a>
</div>
<?= $this->endSection();  ?>