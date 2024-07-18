<?= $this->extend('builder/templates/main_admin');  ?>

<?= $this->section('content');  ?>
<div class="col py-3">
    <form method="post">
        <div class="mb-3">
            <label for="id_tarif" class="form-label">ID Tarif</label>
            <input type="text" class="form-control" id="id_tarif" name="id_tarif" value="<?= $tarif['id_tarif'] ?>" readonly>
        </div>
        <div class="mb-3">
            <label for="daya" class="form-label">Daya</label>
            <input type="text" class="form-control" id="daya" name="daya" value="<?= $tarif['daya'] ?>">
        </div>
        <div class="mb-3">
            <label for="tarif_perkwh" class="form-label">Tarif Perkwh</label>
            <input type="text" class="form-control" id="tarif_perkwh" name="tarif_perkwh" value="<?= $tarif['tarifperkwh'] ?>">
        </div>
        <button type="submit" class="btn btn-primary" formaction="<?= base_url('admin/auth_update_tarif') ?>">Simpan</button>
        <a href="<?= base_url('admin/kelola_tarif') ?>" class="btn btn-danger">Batal</a>
    </form>
</div>
<?= $this->endSection();  ?>