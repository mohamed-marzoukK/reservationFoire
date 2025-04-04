<div class="users form">
    <?= $this->Flash->render() ?>
    <h3>S'inscrire</h3>
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Veuillez entrer vos informations') ?></legend>
        <?= $this->Form->control('email', ['required' => true, 'label' => 'Adresse email']) ?>
        <?= $this->Form->control('password', ['required' => true, 'label' => 'Mot de passe']) ?>
        <!-- Optionnel : Ajouter d'autres champs comme 'role' si nécessaire -->
        <!-- <?= $this->Form->control('role', ['options' => ['user' => 'Utilisateur', 'admin' => 'Administrateur'], 'default' => 'user']) ?> -->
    </fieldset>
    <?= $this->Form->submit(__('S\'inscrire')) ?>
    <?= $this->Form->end() ?>
    <p>Déjà un compte ? <?= $this->Html->link('Se connecter', ['action' => 'login']) ?></p>
</div>