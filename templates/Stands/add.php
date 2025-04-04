<h1>أضف قاعة</h1>

<?= $this->Flash->render() ?>
<p>إضافة قاعة لـ: <strong><?= h($hallName) ?></strong></p>

<?= $this->Form->create($stand, ['type' => 'file']) ?>
    <div>
        <?= $this->Form->control('image_file', [
            'type' => 'file',
            'label' => 'صورة',
            'accept' => '.jpg,.jpeg,.png,.gif'
        ]) ?>
    </div>
    <div>
        <?= $this->Form->control('number_of_stands', ['type' => 'number', 'label' => 'عدد القاعات']) ?>
    </div>
    <div>
        <?= $this->Form->button('سجل') ?>
    </div>
<?= $this->Form->end() ?>

<?php if (!empty($stand->image)): ?>
    <h2>Image enregistrée :</h2>
    <img src="<?= $this->Url->build('/img/' . h($stand->image)) ?>" alt="Stand Image" width="200">
<?php endif; ?>