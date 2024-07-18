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
                    <th>id_pelanggan</th>
                    <th>nama_pelanggan</th>
                    <th>username</th>
                    <th>password</th>
                    <th>nomor_kwh</th>
                    <th>alamat</th>
                    <th>daya</th>
                    <th class="text-center">action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (empty($pelanggan)) { ?>
                    <tr>
                        <td colspan="8" class="text-center">Data tidak ditemukan</td>
                    </tr>
                <?php }
                foreach ($pelanggan as $p) { ?>
                    <tr>
                        <form method="post">
                            <input type="hidden" name="id_pelanggan" id="id_pelanggan" value="<?= $p['id_pelanggan'] ?>">
                            <td><?= $p['id_pelanggan']  ?></td>
                            <td><?= $p['nama_pelanggan']  ?></td>
                            <td><?= $p['username']  ?></td>
                            <td>*****</td>
                            <td><?= $p['nomor_kwh']  ?></td>
                            <td><?= $p['alamat']  ?></td>
                            <td><?= $p['daya']  ?></td>
                            <td class="d-flex justify-content-center">
                                <button formaction="<?= base_url('admin/create_penggunaan') ?>" class="btn btn-primary" id="add-data-btn">Tambah Penggunaan</button>
                                <button formaction="<?= base_url('admin/edit_pelanggan') ?>" class="btn btn-warning mx-1" id="add-data-btn">Edit</button>
                                <button formaction="<?= base_url('admin/delete_pelanggan') ?>" class="btn btn-danger mx-1" id="add-data-btn">Delete</button>
                            </td>
                        </form>
                    </tr>
                <?php
                } ?>
            </tbody>
        </table>
    </div>
    <a class="btn btn-primary float-end" href="<?= base_url('/admin/create_pelanggan')  ?>" role="button">Tambah Pelanggan</a>
</div>
<?= $this->endSection();  ?>