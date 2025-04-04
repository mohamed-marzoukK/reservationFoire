<h1>Vue du Stand</h1>
<?= $this->Flash->render() ?>

<?php if ($stand): ?>
    <p><strong>Salle :</strong> <?= $stand->hall ? h($stand->hall->name) : 'Non spécifiée' ?></p>
    <p><strong>Nombre de stands :</strong> <?= h($stand->number_of_stands) ?></p>
    <div class="stand-container">
        <img id="stand-image" src="<?= $this->Url->build('/img/' . h($stand->image)) ?>" alt="Image du Stand" width="800" height="500">
    </div>
<?php else: ?>
    <p>Aucun Stand ajouté.</p>
<?php endif; ?>

<style>
    .stand-container {
        position: relative;
        width: 800px;
        height: 500px;
        border: 1px solid #ccc;
        margin: 20px 0;
    }
    #stand-image {
        display: block;
        max-width: 100%;
        height: auto;
    }
</style>