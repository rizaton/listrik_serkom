<?= $this->extend('builder/templates/main_admin');  ?>

<?= $this->section('content');  ?>
<div class="col py-3">
    <form method="post">
        <div class="mb-3">
            <label for="daya" class="form-label">Daya</label>
            <input type="text" class="form-control" id="daya" name="daya" placeholder="Daya" required>
        </div>
        <div class="mb-3">
            <label for="tarif_perkwh" class="form-label">Tarif Per KWH</label>
            <input step="0.01" type="number" class="form-control" id="tarif_perkwh" name="tarif_perkwh" placeholder="Tarif Per KWH" required>
        </div>
        <button type="submit" class="btn btn-primary" formaction="<?= base_url('admin/auth_create_tarif') ?>">Tambah Data</button>
        <a href="<?= base_url('admin/kelola_tarif') ?>" class="btn btn-danger">Batal</a>
    </form>
</div>
<?= $this->endSection();  ?>