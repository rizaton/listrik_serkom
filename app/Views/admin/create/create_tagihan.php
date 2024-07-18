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
            <label for="meter_awal" class="form-label">Jumlah Meter</label>
            <input type="text" class="form-control" id="jumlah_meter" name="jumlah_meter" placeholder="Jumlah Meter">
        </div>
        <div class="mb-3">
            <label for="id_pelanggan" class="form-label">ID Pelanggan</label>
            <input type="text" class="form-control" id="id_pelanggan" name="id_pelanggan" value="<?= $pelanggan['id_pelanggan'] ?>" readonly>
        </div>
        <div class="mb-3">
            <label for="id_penggunaan" class="form-label">ID Penggunaan</label>
            <input type="text" class="form-control" id="id_penggunaan" name="id_penggunaan" value="<?= $penggunaan['id_penggunaan'] ?>" readonly>
        </div>
        <input hidden type="text" class="form-control" id="id_status" name="id_status" value="1">
        <button type="submit" class="btn btn-primary" formaction="<?= base_url('admin/auth_create_tagihan') ?>">Tambah Data</button>
        <a href="<?= base_url('admin/kelola_pelanggan') ?>" class="btn btn-danger">Batal</a>
    </form>
</div>
<?= $this->endSection();  ?>