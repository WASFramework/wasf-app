<?php
// Map type → bootstrap alert class
$map = [
    'success' => 'success',
    'error'   => 'danger',
    'warning' => 'warning',
    'info'    => 'info'
];

$alertType = $map[$type] ?? 'secondary';
?>
<div class="alert alert-<?= $alertType ?> d-flex align-items-center gap-2 mb-3">
    <i class="bi bi-info-circle"></i>
    <span><?= htmlspecialchars($message) ?></span>
</div>
