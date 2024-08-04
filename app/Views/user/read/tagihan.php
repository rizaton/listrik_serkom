<?= $this->extend('builder/templates/main_user');  ?>

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
                    <th class="text-center">Bulan/Tahun Penggunaan</th>
                    <th>Meter Awal</th>
                    <th>Meter Akhir</th>
                    <th>Jumlah Meter</th>
                    <th>Biaya Admin</th>
                    <th>Total Bayar</th>
                    <th>Status</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (empty($tagihan)) { ?>
                    <tr>
                        <td colspan="8" class="text-center">Tidak ada Tagihan</td>
                    </tr>
                <?php }
                foreach ($tagihan as $t) { ?>
                    <tr>
                        <td class="text-center"><?= esc($t['bulan'])  ?>/<?= esc($t['tahun'])  ?></td>
                        <td><?= esc($t['meter_awal'])  ?> VA</td>
                        <td><?= esc($t['meter_akhir'])  ?> VA</td>
                        <td><?= esc($t['jumlah_meter'])  ?> VA</td>
                        <td>Rp.<?= esc(number_format($t['biaya_admin']))  ?></td>
                        <td>Rp.<?= esc(number_format($t['total_bayar']))  ?></td>
                        <td><?= esc($t['status'])  ?></td>
                        <form method="post">
                            <input type="hidden" name="id_tagihan" id="id_tagihan" value="<?= esc($t['id_tagihan']) ?>">
                            <td class="d-flex justify-content-center">
                                <button formaction="<?= base_url('user/bayar'); ?>" class="btn btn-warning mx-1" id="add-data-btn">Bayar Tagihan</button>
                            </td>
                        </form>
                    </tr>
                <?php
                } ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection();  ?>