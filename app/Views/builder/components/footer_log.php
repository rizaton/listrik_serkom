<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<?php
if (session()->getFlashdata('found') !== null) {
    echo '<script>alert("Login Gagal")</script>';
} ?>
</body>

</html>