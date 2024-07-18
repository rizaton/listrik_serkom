<?= $this->extend('builder/templates/main_admin');  ?>

<?= $this->section('content');  ?>
<div class="col py-3">
    <form method="post">
        <div class="mb-3">
            <label for="tanggal_pembayaran" class="form-label">Tanggal Pembayaran</label>
            <input type="date" class="form-control" id="tanggal_pembayaran" name="tanggal_pembayaran">
        </div>
        <div class="mb-3">
            <label for="bulan_bayar" class="form-label">Bulan Bayar</label>
            <input type="text" class="form-control" id="bulan_bayar" name="bulan_bayar" placeholder="bulan_bayar">
        </div>
        <div class="mb-3">
            <label for="biaya_admin" class="form-label">Biaya Admin</label>
            <input type="text" class="form-control" id="biaya_admin" name="biaya_admin" placeholder="biaya_admin">
        </div>
        <div class="mb-3">
            <label for="total_bayar" class="form-label">Total Bayar</label>
            <input type="text" class="form-control" id="total_bayar" name="total_bayar" placeholder="total_bayar">
        </div>
        <div class="mb-3">
            <label for="id_tagihan" class="form-label">ID Tagihan</label>
            <input type="text" class="form-control" id="id_tagihan" name="id_tagihan" value="<?= $tagihan['id_tagihan']  ?>" readonly>
        </div>
        <div class="mb-3">
            <label for="id_pelanggan" class="form-label">ID Pelanggan</label>
            <input type="text" class="form-control" id="id_pelanggan" name="id_pelanggan" value="<?= $pelanggan['id_pelanggan']  ?>" readonly>
        </div>
        <div class="mb-3">
            <label for="id_user" class="form-label">Admin</label>
            <select class="form-select" id="id_user" name="id_user">
                <?php
                foreach ($admin as $a) { ?>
                    <option value="<?= $a['id_user'] ?>" <?= $pembayaran['id_user'] == $a['id_user'] ? 'selected' : '' ?>><?= $a['nama_admin'] ?></option>
                <?php }
                ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary" formaction="<?= base_url('admin/auth_create_pembayaran') ?>">Tambah Data</button>
        <a href="<?= base_url('admin/kelola_tagihan') ?>" class="btn btn-danger">Batal</a>
    </form>
</div>
<?= $this->endSection();  ?>