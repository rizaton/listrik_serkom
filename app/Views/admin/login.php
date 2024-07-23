<?= $this->extend('builder/templates/log_admin');  ?>

<?= $this->section('content');  ?>
<div class="container login-container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Login Admin</h2>
                    <form method="post" action="<?= base_url('/auth_admin');  ?>">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input name="username" autocomplete="username" type="text" class="form-control" id="username" placeholder="Enter username" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input name="password" autocomplete="current-password" type="password" class="form-control" id="password" placeholder="Enter password" required>
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="rememberMe">
                            <label class="form-check-label" for="rememberMe">Remember me</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                    <?php
                    try {
                        $found = session()->getFlashdata('found');
                    } catch (\Throwable $th) {
                        $found = false;
                    }
                    if ($found = false) {
                    ?>
                        <div class="mt-4 alert alert-primary d-flex align-items-center" role="alert">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                            </svg>
                            <div>
                                Invalid username or password.
                            </div>
                        </div>
                    <?php
                    } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection();  ?>