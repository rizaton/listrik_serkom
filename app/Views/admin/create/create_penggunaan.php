<?= $this->extend('builder/templates/main_admin');  ?>

<?= $this->section('content');  ?>
<div class="col py-3">
    <form method="post">
        <div class="mb-3">
            <label for="bulan" class="form-label">Bulan</label>
            <input type="text" class="form-control" id="bulan" name="bulan" placeholder="Bulan">
        </div>
        <div class="mb-3">
            <label for="tahun" class="form-label">Tahun</label>
            <input type="text" class="form-control" id="tahun" name="tahun" placeholder="Tahun">
        </div>
        <div class="mb-3">
            <label for="meter_awal" class="form-label">Meter Awal</label>
            <input type="text" class="form-control" id="meter_awal" name="meter_awal" placeholder="Meter Awal">
        </div>
        <div class="mb-3">
            <label for="meter_akhir" class="form-label">Meter Akhir</label>
            <input type="text" class="form-control" id="meter_akhir" name="meter_akhir" placeholder="Meter Akhir">
        </div>
        <div class="mb-3">
            <label for="id_pelanggan" class="form-label">ID Pelanggan</label>
            <input type="text" class="form-control" id="id_pelanggan" name="id_pelanggan" value="<?= $pelanggan['id_pelanggan'] ?>" readonly>
        </div>
        <button type="submit" class="btn btn-primary" formaction="<?= base_url('admin/auth_create_penggunaan') ?>">Tambah Data</button>
        <a href="<?= base_url('admin/kelola_pelanggan') ?>" class="btn btn-danger">Batal</a>
    </form>
</div>
<?= $this->endSection();  ?>