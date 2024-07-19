<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('/') ?>scripts/scripts.js"></script>
<?php
if (session()->getFlashdata('success') !== null) {
    echo '<script>alert("' . session()->getFlashdata('success') . '")</script>';
} ?>
</body>

</html>