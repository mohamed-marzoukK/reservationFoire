<h1>Ajouter un hall</h1>

<?= $this->Form->create($admin, ['type' => 'file']) ?>
    <div>
        <?= $this->Form->control('image_file', [
            'type' => 'file',
            'label' => 'Image',
            'accept' => '.jpg,.jpeg,.png,.gif'
        ]) ?>
    </div>
    <div>
        <?= $this->Form->control('nb_hall', ['type' => 'number', 'label' => 'Nombre de Halls']) ?>
    </div>
    <div>
        <?= $this->Form->button('Soumettre') ?>
    </div>
<?= $this->Form->end() ?>

<?php if (!empty($admin->image)): ?>
    <h2>Image enregistrée :</h2>
    <img src="<?= $this->Url->build('/img/' . h($admin->image)) ?>" alt="Admin Image" width="200">
<?php endif; ?>
