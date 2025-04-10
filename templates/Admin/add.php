<h1>أضف قاعة</h1>

<?= $this->Form->create($admin, ['type' => 'file']) ?>
    <div>
        <?= $this->Form->control('image_file', [
            'type' => 'file',
            'label' => 'صورة',
            'accept' => '.jpg,.jpeg,.png,.gif'
        ]) ?>
    </div>
    <div>
        <?= $this->Form->control('nb_hall', ['type' => 'number', 'label' => 'عدد القاعات']) ?>
    </div>
    <div>
        <?= $this->Form->button('سجل') ?>
    </div>
<?= $this->Form->end() ?>

<?php if (!empty($admin->image)): ?>
    <h2>Image enregistrée :</h2>
    <img src="<?= $this->Url->build('/img/' . h($admin->image)) ?>" alt="Admin Image" width="200">
<?php endif; ?>
