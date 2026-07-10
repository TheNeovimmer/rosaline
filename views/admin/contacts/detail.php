<div class="mb-3">
    <a href="<?= url('admin/contacts') ?>" class="btn btn-outline-dark btn-sm">← Back</a>
</div>
<div class="card border-0 shadow-sm">
    <div class="card-header bg-white fw-semibold">Message from <?= e($message['name']) ?></div>
    <div class="card-body">
        <div class="mb-3"><strong>Name:</strong> <?= e($message['name']) ?></div>
        <div class="mb-3"><strong>Email:</strong> <?= e($message['email']) ?></div>
        <?php if (!empty($message['phone'])): ?><div class="mb-3"><strong>Phone:</strong> <?= e($message['phone']) ?></div><?php endif; ?>
        <div class="mb-3"><strong>Subject:</strong> <?= e($message['subject'] ?? 'No subject') ?></div>
        <div class="mb-3"><strong>Date:</strong> <?= formatDate($message['created_at']) ?></div>
        <hr>
        <p><?= nl2br(e($message['message'])) ?></p>
    </div>
</div>
