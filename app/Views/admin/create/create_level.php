<?= $this->extend('builder/templates/main_admin');  ?>

<?= $this->section('content');  ?>
<div class="col py-3">
    <form method="post">
        <div class="mb-3">
            <label for="nama_level" class="form-label">Nama Level</label>
            <input type="text" class="form-control" id="nama_level" name="nama_level" placeholder="Akses Level">
        </div>
        <button type="submit" class="btn btn-primary" formaction="<?= base_url('admin/auth_create_level') ?>">Tambah Data</button>
        <a href="<?= base_url('admin/kelola_level') ?>" class="btn btn-danger">Batal</a>
    </form>
</div>
<?= $this->endSection();  ?>