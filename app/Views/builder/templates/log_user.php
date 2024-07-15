<?= $this->include('builder/components/header_log');  ?>
<?= $this->include('builder/components/nav_log_user');  ?>
<div class="content">
    <?= $this->renderSection('content');  ?>
</div>
<?= $this->include('builder/components/footer_log');  ?>