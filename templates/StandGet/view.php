<h1>إدارة القاعة</h1>
<?php if ($stand): ?>
    <p><strong>عدد القاعات:</strong> <?= h($stand->number_of_stands) ?></p>
    <div class="hall-container">
        <img id="hall-image" src="<?= $this->Url->build('/img/' . $stand->image) ?>" alt="Plan" width="800" height="500">
    </div>
<?php else: ?>
    <p>القاعة غير موجودة.</p>
<?php endif; ?>