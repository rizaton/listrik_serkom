<?= $this->extend('builder/templates/main_admin');  ?>

<?= $this->section('content');  ?>
<div class="col py-3">
    <div class="container">
        <div class="flex flex-row justify-content-center row mb-5">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Pelanggan</h5>
                        <p class="card-text">
                            <?php
                            $sum_pelanggan = new \App\Models\Pelanggan();
                            $sum_pelanggan = $sum_pelanggan
                                ->db
                                ->table('pelanggan')
                                ->countAllResults();
                            echo $sum_pelanggan;
                            ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Tagihan Belum Terproses</h5>
                        <p class="card-text">
                            <?php
                            $sum_tagihan = new \App\Models\Tagihan();
                            $sum_tagihan = $sum_tagihan
                                ->db
                                ->table('tagihan')
                                ->where('id_status', 3)
                                ->countAllResults();
                            echo $sum_tagihan;
                            ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Pembayaran</h5>
                        <p class="card-text">
                            <?php
                            $sum_pembayaran = new \App\Models\Pembayaran();
                            $sum_pembayaran = $sum_pembayaran
                                ->db
                                ->table('pembayaran')
                                ->selectSum('id_pembayaran')
                                ->where('id_pembayaran != 0')
                                ->get()->getRow('id_pembayaran');
                            if (!$sum_pembayaran) {
                                $sum_pembayaran = 0;
                            }
                            echo $sum_pembayaran;
                            ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="table-wrapper" style="height: 50vh; overflow-y: auto; overflow-x: hidden;">
                    <table class="table table-striped table-bordered">
                        <thead class="thead-fixed" style="position: sticky; top: 0;z-index: 1; background-color:#fff;">
                            <tr>
                                <th>id_tagihan</th>
                                <th>nama_pelanggan</th>
                                <th>status</th>
                                <th>bulan/tahun</th>
                                <th>aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!$tagihan) {
                                echo '<tr><td colspan="5" class="text-center">Tidak ada Tagihan</td></tr>';
                            }
                            foreach ($tagihan as $t) { ?>
                                <tr>
                                    <td> <?= $t['id_tagihan']  ?> </td>
                                    <td> <?= $t['nama_pelanggan']  ?> </td>
                                    <td><?php
                                        foreach ($status as $s) {
                                            echo $t['id_status'] == $s['id_status'] ? $s['status'] : '';
                                        } ?>
                                    </td>
                                    <td> <?= $t['bulan']  ?>/<?= $t['tahun']  ?> </td>
                                    <td>
                                        <form method="post">
                                            <input type="hidden" name="id_tagihan" id="id_tagihan" value="<?= $t['id_tagihan'] ?>">
                                            <button formaction="<?= base_url('admin/edit_tagihan') ?>" class="btn btn-warning mx-1" id="add-data-btn">Konfirmasi</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-6">
                <div class="table-wrapper" style="height: 50vh; overflow-y: auto; overflow-x: hidden;">
                    <table class="table table-striped table-bordered">
                        <thead class="thead-fixed" style="position: sticky; top: 0;z-index: 1; background-color:#fff;">
                            <tr>
                                <th>id_pembayaran</th>
                                <th>nama_pelanggan</th>
                                <th>status</th>
                                <th>bulan/tahun</th>
                                <th>aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!$pembayaran) {
                                echo '<tr><td colspan="5" class="text-center">Tidak ada Pembayaran</td></tr>';
                            }
                            foreach ($pembayaran as $p) { ?>
                                <tr>
                                    <td> <?= $p['id_tagihan']  ?> </td>
                                    <td> <?= $p['nama_pelanggan']  ?> </td>
                                    <td><?php
                                        foreach ($status as $s) {
                                            echo $p['id_status'] == $s['id_status'] ? $s['status'] : '';
                                        } ?>
                                    </td>
                                    <td> <?= $p['bulan']  ?>/<?= $p['tahun']  ?> </td>
                                    <td>
                                        <form method="post">
                                            <input type="hidden" name="id_pembayaran" id="id_pembayaran" value="<?= $p['id_pembayaran'] ?>">
                                            <button formaction="<?= base_url('admin/edit_pembayaran') ?>" class="btn btn-warning mx-1" id="add-data-btn">Konfirmasi</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection();  ?>