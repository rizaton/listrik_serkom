<?= $this->include('builder/components/header');  ?>
<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col py-3">
            <?= $this->include('builder/components/nav_user');  ?>
            <?= $this->renderSection('content');  ?>
        </div>
    </div>
</div>
<?= $this->include('builder/components/footer');  ?>