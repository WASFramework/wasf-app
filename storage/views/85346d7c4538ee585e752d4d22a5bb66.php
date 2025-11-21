<?php \Wasf\View\Blade::extend('layouts/main'); ?>

<?php \Wasf\View\Blade::section('title', 'Login'); ?>

<?php \Wasf\View\Blade::startSection('content'); ?>

<div class="row justify-content-center">
    <div class="col-md-5">

        <div class="card shadow-lg border-0 rounded-4 p-4"
             style="background: rgba(30,30,46,0.75); backdrop-filter: blur(12px);">

            <h3 class="fw-bold text-center mb-4 text-primary">
                <i class="bi bi-shield-lock-fill"></i> Login
            </h3>

            <form method="POST" action="/login">

                <?php if ($__msg = \Wasf\Support\Flash::get("error")): ?><div class="alert alert-error"><?php echo htmlspecialchars($__msg); ?></div><?php endif; ?>
                <?php if ($__msg = \Wasf\Support\Flash::get("success")): ?><div class="alert alert-success"><?php echo htmlspecialchars($__msg); ?></div><?php endif; ?>

                <div class="mb-3">
                    <label>Email</label>
                    <input name="email" type="email" class="form-control" value="<?php echo htmlspecialchars((string)(old('email') ?? ""), ENT_QUOTES, "UTF-8"); ?>">
                    <?php if(!empty($_SESSION['errors']['email'])): $message = $_SESSION['errors']['email'][0]; ?>
                        <small class="text-danger"><?php echo htmlspecialchars((string)($message ?? ""), ENT_QUOTES, "UTF-8"); ?></small>
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <label>Password</label>
                    <input name="password" type="password" class="form-control">
                    <?php if(!empty($_SESSION['errors']['password'])): $message = $_SESSION['errors']['password'][0]; ?>
                        <small class="text-danger"><?php echo htmlspecialchars((string)($message ?? ""), ENT_QUOTES, "UTF-8"); ?></small>
                    <?php endif; ?>
                </div>

                <button class="btn btn-primary w-100">Login</button>
            </form>

            <div class="text-center mt-4">
                <span class="text-secondary">Belum punya akun?</span>
                <a href="/register" class="fw-semibold text-primary">Register</a>
            </div>

        </div>

    </div>
</div>

<?php \Wasf\View\Blade::endSection(); ?>
