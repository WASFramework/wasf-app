<?php \Wasf\View\Blade::extend('layouts.main'); ?>
<?php \Wasf\View\Blade::section('title', 'My Profile'); ?>
<?php \Wasf\View\Blade::startSection('content'); ?>

    <?php if ($__msg = \Wasf\Support\Flash::get("success")): ?><div class="alert alert-success"><?php echo htmlspecialchars($__msg); ?></div><?php endif; ?>
    <?php if ($__msg = \Wasf\Support\Flash::get("error")): ?><div class="alert alert-error"><?php echo htmlspecialchars($__msg); ?></div><?php endif; ?>

    <div class="container py-5 d-flex justify-content-center">

        <div class="card shadow-sm" style="max-width: 420px; width: 100%;">
            <div class="card-body text-center">

                <div class="mb-3">
                    <?php if ($user->photo): ?>
                        <img src="/uploads/profile/<?php echo htmlspecialchars((string)($user->photo ?? ""), ENT_QUOTES, "UTF-8"); ?>" 
                             class="rounded-circle shadow-sm"
                             width="120" height="120"
                             style="object-fit: cover;">
                    <?php else: ?>
                        <div class="rounded-circle bg-secondary text-white d-flex justify-content-center align-items-center"
                             style="width:120px; height:120px; font-size:40px;">
                            <?php echo htmlspecialchars((string)(strtoupper(substr($user->name, 0, 1)) ?? ""), ENT_QUOTES, "UTF-8"); ?>
                        </div>
                    <?php endif; ?>
                </div>

                <h3 class="mb-0"><?php echo htmlspecialchars((string)($user->name ?? ""), ENT_QUOTES, "UTF-8"); ?></h3>
                <p class="text-muted mb-3"><?php echo htmlspecialchars((string)($user->email ?? ""), ENT_QUOTES, "UTF-8"); ?></p>

                <div class="d-grid gap-2">
                    <a href="/profile/edit" class="btn btn-primary">
                        Edit Profile
                    </a>

                    <a href="/logout" class="btn btn-outline-danger">
                        Logout
                    </a>
                </div>

            </div>
        </div>

    </div>

<?php \Wasf\View\Blade::endSection(); ?>
