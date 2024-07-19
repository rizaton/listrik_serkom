<?= $this->extend('builder/templates/main_admin');  ?>

<?= $this->section('content');  ?>
<div class="col py-3">
    <form method="post">
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
        </div>
        <div class="mb-3">
            <label for="nama_pelanggan" class="form-label">Nama pelanggan</label>
            <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" placeholder="Nama pelanggan" required>
        </div>
        <div class="mb-3">
            <label for="nomor_kwh" class="form-label">Nomor kWh</label>
            <input type="text" class="form-control" id="nomor_kwh" name="nomor_kwh" placeholder="Nomor kWh" required>
        </div>
        <div class="mb-3">
            <label for="Alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" required>
        </div>
        <div class="mb-3">
            <label for="id_tarif" class="form-label">Daya</label>
            <select class="form-select" id="id_tarif" name="id_tarif">
                <?php
                foreach ($tarif as $t) { ?>
                    <option value="<?= $t['id_tarif'] ?>"><?= $t['daya'] ?>VA</option>
                <?php }
                ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary" formaction="<?= base_url('admin/auth_create_pelanggan') ?>">Tambah Data</button>
        <a href="<?= base_url('admin/kelola_pelanggan') ?>" class="btn btn-danger">Batal</a>
    </form>
</div>
<?= $this->endSection();  ?>