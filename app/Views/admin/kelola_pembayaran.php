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
                    <th>id_pembayaran</th>
                    <th>nama_pelanggan</th>
                    <th>biaya_admin</th>
                    <th>total_bayar</th>
                    <th class="text-center">status</th>
                    <th>jumlah_meter</th>
                    <th>nama_admin</th>
                    <th>tanggal_pembayaran</th>
                    <th class="text-center">action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 0;
                foreach ($pembayaran as $p) { ?>
                    <tr>
                        <td><?= $i + 1; ?></td>
                        <td><?= $p['id_pembayaran']  ?></td>
                        <td><?= $p['nama_pelanggan']  ?></td>
                        <td><?= number_format($p['biaya_admin'])  ?></td>
                        <td><?= number_format($p['total_bayar'])  ?></td>
                        <td>
                            <?php
                            if ($p['status'] == 0) {
                                echo "<a href=\"" . base_url('admin/proses_pembayaran/' . $p['id_pembayaran']) . "\" class=\"btn btn-success mx-1\">Proses</a>";
                            } else if ($p['status'] == 1) {
                                echo "<a href=\"" . base_url('admin/lunas_pembayaran/' . $p['id_pembayaran']) . "\" class=\"btn btn-danger mx-1\">Lunas</a>";
                            } else {
                                echo "<a href=\"" . base_url('admin/batal_pembayaran/' . $p['id_pembayaran']) . "\" class=\"btn btn-success mx-1\">Batal</a>";
                            }
                            ?></td>
                        <td><?= $p['jumlah_meter']  ?></td>
                        <td><?= $p['nama_admin']  ?></td>
                        <td><?= $p['tanggal_pembayaran']  ?></td>
                        <td class="d-flex justify-content-center">
                            <a href="<?= base_url('admin/edit_pembayaran/' . $p['id_pembayaran']) ?>" class="btn btn-warning mx-1">Edit</a>
                            <a href="<?= base_url('admin/delete_pembayaran/' . $p['id_pembayaran']) ?>" class="btn btn-danger mx-1">Delete</a>
                        </td>
                    </tr>
                <?php $i++;
                } ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection();  ?>