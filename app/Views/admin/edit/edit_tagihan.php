<?= $this->extend('builder/templates/main_admin');  ?>

<?= $this->section('content');  ?>
<div class="col py-3">
    <form method="post">
        <div class="mb-3">
            <label for="id_tagihan" class="form-label">ID Tagihan</label>
            <input type="text" class="form-control" id="id_tagihan" name="id_tagihan" value="<?= $tagihan['id_tagihan'] ?>" readonly>
        </div>
        <div class="mb-3">
            <label for="id_pelanggan" class="form-label">ID Pelanggan</label>
            <input type="text" class="form-control" id="id_pelanggan" name="id_pelanggan" value="<?= $tagihan['id_pelanggan'] ?>" readonly>
        </div>
        <div class="mb-3">
            <label for="bulan" class="form-label">Bulan</label>
            <input type="text" class="form-control" id="bulan" name="bulan" value="<?= $tagihan['bulan'] ?>">
        </div>
        <div class="mb-3">
            <label for="tahun" class="form-label">Tahun</label>
            <input type="text" class="form-control" id="tahun" name="tahun" value="<?= $tagihan['tahun'] ?>">
        </div>
        <div class="mb-3">
            <label for="jumlah_meter" class="form-label">Jumlah Meter</label>
            <input type="text" class="form-control" id="jumlah_meter" name="jumlah_meter" value="<?= $tagihan['jumlah_meter'] ?>">
        </div>
        <div class="mb-3">
            <label for="id_status" class="form-label">status</label>
            <select class="form-select" id="id_status" name="id_status">
                <?php
                foreach ($status as $s) { ?>
                    <option value="<?= $s['id_status'] ?>" <?= $tagihan['id_status'] == $s['id_status'] ? 'selected' : '' ?>><?= $s['status'] ?></option>
                <?php }
                ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="id_pengunaan" class="form-label">ID Penggunaan</label>
            <input type="text" class="form-control" id="id_penggunaan" name="id_penggunaan" value="<?= $tagihan['id_penggunaan'] ?>" readonly>
        </div>
        <button type="submit" class="btn btn-primary" formaction="<?= base_url('admin/auth_update_tagihan') ?>">Simpan</button>
        <a href="<?= base_url('admin/kelola_tagihan') ?>" class="btn btn-danger">Batal</a>
    </form>
</div>
<?= $this->endSection();  ?>