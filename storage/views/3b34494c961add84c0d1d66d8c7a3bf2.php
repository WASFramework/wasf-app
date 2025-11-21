<?php \Wasf\View\Blade::extend('layouts.main'); ?>
<?php \Wasf\View\Blade::section('title', 'Edit Profile'); ?>
<?php \Wasf\View\Blade::startSection('content'); ?>

    <?php if ($__msg = \Wasf\Support\Flash::get("success")): ?><div class="alert alert-success"><?php echo htmlspecialchars($__msg); ?></div><?php endif; ?>
    <?php if ($__msg = \Wasf\Support\Flash::get("error")): ?><div class="alert alert-error"><?php echo htmlspecialchars($__msg); ?></div><?php endif; ?>

    <div class="container py-4">

        <div class="row justify-content-center">
            <div class="col-md-6">

                <div class="card shadow-sm">
                    <div class="card-body">

                        <h3 class="mb-4 text-center">Edit Profile</h3>

                        <form action="/profile/edit" method="POST" enctype="multipart/form-data">

                            <?php echo '<input type="hidden" name="_token" value="3a8fad31b0637b5adb947a4e59582bcdb9809bb2d1a421909b9ecdf89ed02033">'; ?>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Name</label>
                                <input type="text" name="name" class="form-control" value="<?php echo htmlspecialchars((string)($user->name ?? ""), ENT_QUOTES, "UTF-8"); ?>" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Email</label>
                                <input type="email" name="email" class="form-control" value="<?php echo htmlspecialchars((string)($user->email ?? ""), ENT_QUOTES, "UTF-8"); ?>" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Photo</label>
                                <input type="file" name="photo" class="form-control">

                                <?php if ($user->photo): ?>
                                    <div class="mt-2">
                                        <img src="/uploads/profile/<?php echo htmlspecialchars((string)($user->photo ?? ""), ENT_QUOTES, "UTF-8"); ?>" 
                                             class="img-thumbnail" width="120">
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">
                                    Save Changes
                                </button>
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>

    </div>

<?php \Wasf\View\Blade::endSection(); ?>
