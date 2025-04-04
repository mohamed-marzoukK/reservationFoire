<?php
$this->assign('title', 'Gestion des Utilisateurs');
?>

<div class="admin-content">
    <div class="admin-header">
        <h1><?= h($admin->name) ?> - Tableau de bord</h1>
        <p>Gestion des utilisateurs</p>
    </div>

    <div class="user-table">
        <table>
            <thead>
                <tr>
                    <th>ID</th> <!-- Suppression de $this->Paginator->sort() -->
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Rôle</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= h($user->id) ?></td>
                    <td><?= h($user->name) ?></td>
                    <td><?= h($user->email) ?></td>
                    <td>
                        <span class="role-badge">
                            <?= h($user->role) ?>
                        </span>
                    </td>
                    <td class="actions">
                        <?= $this->Html->link('Éditer', 
                            ['controller' => 'Users', 'action' => 'edit', $user->id],
                            ['class' => 'btn btn-edit']) ?>
                            
                        <?= $this->Form->postLink('Supprimer',
                            ['controller' => 'Users', 'action' => 'delete', $user->id],
                            ['class' => 'btn btn-delete', 'confirm' => 'Êtes-vous sûr ?'])
                        ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <!-- Suppression de la section pagination -->
</div>