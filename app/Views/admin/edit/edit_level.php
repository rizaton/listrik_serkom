<?= $this->extend('builder/templates/main_admin');  ?>

<?= $this->section('content');  ?>
<div class="col py-3">
    <form method="post">
        <div class="mb-3">
            <label for="id_level" class="form-label">ID Level</label>
            <input type="text" class="form-control" id="id_level" name="id_level" value="<?= $level['id_level'] ?>" readonly>
        </div>
        <div class="mb-3">
            <label for="nama_level" class="form-label">Nama Level</label>
            <input type="text" class="form-control" id="nama_level" name="nama_level" value="<?= $level['nama_level'] ?>">
        </div>
        <button type="submit" class="btn btn-primary" formaction="<?= base_url('admin/auth_update_level') ?>">Simpan</button>
        <a href="<?= base_url('admin/kelola_level') ?>" class="btn btn-danger">Batal</a>
    </form>
</div>
<?= $this->endSection();  ?>