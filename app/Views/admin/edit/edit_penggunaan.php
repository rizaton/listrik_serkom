<?= $this->extend('builder/templates/main_admin');  ?>

<?= $this->section('content');  ?>
<div class="col py-3">
    <form method="post">
        <div class="mb-3">
            <label for="id_penggunaan" class="form-label">ID Penggunaan</label>
            <input type="text" class="form-control" id="id_penggunaan" name="id_penggunaan" value="<?= $penggunaan['id_penggunaan'] ?>" readonly>
        </div>
        <div class="mb-3">
            <label for="id_pelanggan" class="form-label">ID Pelanggan</label>
            <input type="text" class="form-control" id="id_pelanggan" name="id_pelanggan" value="<?= $penggunaan['id_pelanggan'] ?>" readonly>
        </div>
        <div class="mb-3">
            <label for="bulan" class="form-label">Bulan</label>
            <input type="text" class="form-control" id="bulan" name="bulan" value="<?= $penggunaan['bulan'] ?>">
        </div>
        <div class="mb-3">
            <label for="tahun" class="form-label">Tahun</label>
            <input type="text" class="form-control" id="tahun" name="tahun" value="<?= $penggunaan['tahun'] ?>">
        </div>
        <div class="mb-3">
            <label for="meter_awal" class="form-label">Meter Awal</label>
            <input type="text" class="form-control" id="meter_awal" name="meter_awal" value="<?= $penggunaan['meter_awal'] ?>">
        </div>
        <div class="mb-3">
            <label for="meter_akhir" class="form-label">Meter Akhir</label>
            <input type="text" class="form-control" id="meter_akhir" name="meter_akhir" value="<?= $penggunaan['meter_akhir'] ?>">
        </div>
        <button type="submit" class="btn btn-primary" formaction="<?= base_url('admin/auth_update_penggunaan') ?>">Simpan</button>
        <a href="<?= base_url('admin/kelola_penggunaan') ?>" class="btn btn-danger">Batal</a>
    </form>
</div>
<?= $this->endSection();  ?>