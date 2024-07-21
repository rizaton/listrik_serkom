<?= $this->extend('builder/templates/main_user');  ?>

<?= $this->section('content');  ?>
<div class="col py-3" style="height: 90vh; overflow-y: auto;">
    <form method="post">
        <div class="container-fluid py-3">
            <span class="navbar-brand mb-0 h1">Konfirmasi Pembayaran</span>
        </div>
        <div class="mb-3">
            <label for="id_pembayaran" class="form-label">ID Pembayaran</label>
            <input type="text" class="form-control" id="id_pembayaran" name="id_pembayaran" value="<?= $tagihan['id_pembayaran'] ?>" readonly>
        </div>
        <div class="mb-3">
            <label for="nama_pelanggan" class="form-label">Nama Pelanggan</label>
            <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" value="<?= $tagihan['nama_pelanggan'] ?>" readonly>
        </div>
        <div class="mb-3">
            <label for="bulan" class="form-label">Bulan</label>
            <input type="text" class="form-control" id="bulan" name="bulan" value="<?= $tagihan['bulan'] ?>" readonly>
        </div>
        <div class="mb-3">
            <label for="tahun" class="form-label">Tahun</label>
            <input type="text" class="form-control" id="tahun" name="tahun" value="<?= $tagihan['tahun'] ?>" readonly>
        </div>
        <div class="mb-3">
            <label for="meter_awal" class="form-label">Meter Awal</label>
            <input type="text" class="form-control" id="meter_awal" name="meter_awal" value="<?= $tagihan['meter_awal'] ?>" readonly>
        </div>
        <div class="mb-3">
            <label for="meter_akhir" class="form-label">Meter Akhir</label>
            <input type="text" class="form-control" id="meter_akhir" name="meter_akhir" value="<?= $tagihan['meter_akhir'] ?>" readonly>
        </div>
        <div class="mb-3">
            <label for="jumlah_meter" class="form-label">Jumlah Meter</label>
            <input type="text" class="form-control" id="jumlah_meter" name="jumlah_meter" value="<?= $tagihan['jumlah_meter'] ?>" readonly>
        </div>
        <input type="hidden" name="id_tagihan" id="id_tagihan" value="<?= $tagihan['id_tagihan'] ?>">
        <button type="submit" class="btn btn-primary" formaction="<?= base_url('user/auth_bayar') ?>">Bayar</button>
        <a href="<?= base_url('user/tagihan') ?>" class="btn btn-danger">Batal</a>
    </form>
</div>
<?= $this->endSection();  ?>