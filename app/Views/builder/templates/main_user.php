<?= $this->include('builder/components/header');  ?>
<div class="overflow-scroll">
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <?= $this->include('builder/components/sidebar_user');  ?>
            <div class="col">
                <?= $this->include('builder/components/nav_user');  ?>
                <div class="py-3">
                    <?= $this->renderSection('content');  ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->include('builder/components/footer');  ?>