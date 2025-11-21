<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>500 Server Error</title>
    <link href="/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center vh-100">
<div class="container text-center">
    <h1 class="display-1 fw-bold">500</h1>
    <p class="lead text-muted">Terjadi kesalahan pada server.</p>

    <?php if (!empty($message)): ?>
        <div class="alert alert-secondary mt-3">
            <?= htmlspecialchars($message); ?>
        </div>
    <?php endif; ?>

    <a href="/" class="btn btn-primary">Kembali</a>
</div>
</body>
</html>
