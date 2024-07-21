<?= $this->extend('builder/templates/main_user');  ?>

<?= $this->section('content');  ?>
<div class="col py-3">
    <div class="my-5 table-responsive scrollbar scrollbar-dark" style="height: 50vh; overflow-y: auto;">
        <table class="table align-middle ">
            <thead style="position: sticky; top: 0;z-index: 1; background-color:#fff;">
                <tr>
                    <th class="text-center">Bulan/Tahun Penggunaan</th>
                    <th>Jumlah Meter</th>
                    <th>Meter Awal</th>
                    <th>Meter Akhir</th>
                    <th>Total Bayar</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (empty($pembayaran)) { ?>
                    <tr>
                        <td colspan="5" class="text-center">Tidak ada Penggunaan</td>
                    </tr>
                <?php }
                foreach ($pembayaran as $p) { ?>
                    <tr>
                        <td class="text-center"><?= $p['bulan']  ?>/<?= $p['tahun']  ?></td>
                        <td><?= ($p['meter_akhir'] - $p['meter_awal'])  ?> VA</td>
                        <td><?= $p['meter_awal']  ?> VA</td>
                        <td><?= $p['meter_akhir']  ?> VA</td>
                        <td>Rp.<?= number_format($p['total_bayar'])  ?> </td>
                        <td><?= $p['status']  ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection();  ?>