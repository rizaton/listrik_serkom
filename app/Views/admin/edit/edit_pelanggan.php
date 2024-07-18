<?= $this->extend('builder/templates/main_admin');  ?>

<?= $this->section('content');  ?>
<div class="col py-3">
    <form method="post">
        <div class="mb-3">
            <label for="id_pelanggan" class="form-label">ID Pelanggan</label>
            <input type="text" class="form-control" id="id_pelanggan" name="id_pelanggan" value="<?= $pelanggan['id_pelanggan'] ?>" readonly>
        </div>
        <div class="mb-3">
            <label for="nama_pelanggan" class="form-label">Nama Pelanggan</label>
            <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" value="<?= $pelanggan['nama_pelanggan'] ?>">
        </div>
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" value="<?= $pelanggan['username'] ?>">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="text" class="form-control" id="password" name="password" value="<?= $pelanggan['password'] ?>" readonly>
        </div>
        <div class="mb-3">
            <label for="nomor_kwh" class="form-label">Nomor KWH</label>
            <input type="text" class="form-control" id="nomor_kwh" name="nomor_kwh" value="<?= $pelanggan['nomor_kwh'] ?>">
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $pelanggan['alamat'] ?>">
        </div>
        <div class="mb-3">
            <label for="id_tarif" class="form-label">Daya</label>
            <select class="form-select" id="id_tarif" name="id_tarif">
                <?php
                foreach ($tarif as $t) { ?>
                    <option value="<?= $t['id_tarif'] ?>" <?= $pelanggan['id_tarif'] == $t['id_tarif'] ? 'selected' : '' ?>><?= $t['daya'] ?>VA</option>
                <?php }
                ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary" formaction="<?= base_url('admin/auth_update_pelanggan') ?>">Simpan</button>
        <a href="<?= base_url('admin/kelola_pelanggan') ?>" class="btn btn-danger">Batal</a>
    </form>
</div>
<?= $this->endSection();  ?>