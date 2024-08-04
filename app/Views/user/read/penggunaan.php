<?= $this->extend('builder/templates/main_user');  ?>

<?= $this->section('content');  ?>
<div class="col py-3">
    <div class="my-5 table-responsive scrollbar scrollbar-dark" style="height: 50vh; overflow-y: auto;">
        <table class="table align-middle ">
            <thead style="position: sticky; top: 0;z-index: 1; background-color:#fff;">
                <tr>
                    <th>Bulan Penggunaan</th>
                    <th>Tahun Penggunaan</th>
                    <th>Meter Awal</th>
                    <th>Meter Akhir</th>
                    <th>Jumlah Meter</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (empty($penggunaan)) { ?>
                    <tr>
                        <td colspan="5" class="text-center">Tidak ada Penggunaan</td>
                    </tr>
                <?php }
                foreach ($penggunaan as $p) { ?>
                    <tr>
                        <td><?= esc($p['bulan'])  ?></td>
                        <td><?= esc($p['tahun'])  ?></td>
                        <td><?= esc($p['meter_awal'])  ?> VA</td>
                        <td><?= esc($p['meter_akhir'])  ?> VA</td>
                        <td><?= esc(($p['meter_akhir'] - $p['meter_awal']))  ?> vA</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection();  ?>