<?= $this->extend('builder/templates/main_admin');  ?>

<?= $this->section('content');  ?>
<div class="col py-3">
    <form method="post">
        <div class="mb-3">
            <label for="id_user" class="form-label">ID User</label>
            <input type="text" class="form-control" id="id_user" name="id_user" value="<?= $user['id_user'] ?>" readonly>
        </div>
        <div class="mb-3">
            <label for="nama_admin" class="form-label">Nama User</label>
            <input type="text" class="form-control" id="nama_admin" name="nama_admin" value="<?= $user['nama_admin'] ?>">
        </div>
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" value="<?= $user['username'] ?>">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="text" class="form-control" id="password" name="password" value="<?= $user['password'] ?>" readonly>
        </div>
        <div class="mb-3">
            <label for="id_level" class="form-label">Level</label>
            <select class="form-select" id="id_level" name="id_level">
                <?php
                foreach ($level as $l) { ?>
                    <option value="<?= $l['id_level'] ?>" <?= $user['id_level'] == $l['id_level'] ? 'selected' : '' ?>><?= $l['nama_level'] ?></option>
                <?php }
                ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary" formaction="<?= base_url('admin/auth_update_user') ?>">Simpan</button>
        <a href="<?= base_url('admin/kelola_user') ?>" class="btn btn-danger">Batal</a>
    </form>
</div>
<?= $this->endSection();  ?>