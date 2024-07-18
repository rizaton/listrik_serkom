<?= $this->extend('builder/templates/main_admin');  ?>

<?= $this->section('content');  ?>
<div class="col py-3 scrollbar scrollbar-dark" style="height: 90vh; overflow-y: auto;">
    <form method="post">
        <div class="mb-3">
            <label for="id_pembayaran" class="form-label">ID Pembayaran</label>
            <input type="text" class="form-control" id="id_pembayaran" name="id_pembayaran" value="<?= $pembayaran['id_pembayaran'] ?>" readonly>
        </div>
        <div class="mb-3">
            <label for="id_tagihan" class="form-label">ID Tagihan</label>
            <input type="text" class="form-control" id="id_tagihan" name="id_tagihan" value="<?= $pembayaran['id_tagihan'] ?>" readonly>
        </div>
        <div class="mb-3">
            <label for="tanggal_pembayaran" class="form-label">Tanggal Pembayaran</label>
            <input type="date" class="form-control" id="tanggal_pembayaran" name="tanggal_pembayaran" value="<?= $pembayaran['tanggal_pembayaran'] ?>">
        </div>
        <div class="mb-3">
            <label for="biaya_admin" class="form-label">Biaya Admin</label>
            <input type="text" class="form-control" id="biaya_admin" name="biaya_admin" value="<?= $pembayaran['biaya_admin'] ?>">
        </div>
        <div class="mb-3">
            <label for="total_bayar" class="form-label">Total Bayar</label>
            <input type="text" class="form-control" id="total_bayar" name="total_bayar" value="<?= $pembayaran['total_bayar'] ?>">
        </div>
        <div class="mb-3">
            <label for="jumlah_meter" class="form-label">Jumlah Meter</label>
            <input type="text" class="form-control" id="jumlah_meter" name="jumlah_meter" value="<?= $pembayaran['jumlah_meter'] ?>" readonly>
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
        <button type="submit" class="btn btn-primary" formaction="<?= base_url('admin/auth_update_pembayaran') ?>">Simpan</button>
        <a href="<?= base_url('admin/kelola_pembayaran') ?>" class="btn btn-danger">Batal</a>
    </form>
</div>
<?= $this->endSection();  ?>