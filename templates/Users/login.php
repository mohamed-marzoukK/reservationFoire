<div class="users form">
    <?= $this->Flash->render() ?>
    <h3>Login</h3>
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Please enter your username and password') ?></legend>
        <?= $this->Form->control('email', ['required' => true]) ?>
        <?= $this->Form->control('password', ['required' => true]) ?>
    </fieldset>
    <?= $this->Form->submit(__('Login')) ?>
    <?= $this->Form->end() ?>
    <p>Pas de compte ? <?= $this->Html->link('S\'inscrire', ['action' => 'add']) ?></p>
</div>