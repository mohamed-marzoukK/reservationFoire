<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Stand $stand
 */
?>
<div class="stands view content">
    <h3><?= h($stand->name) ?></h3>
    <table>
        <tr>
            <th><?= __('Nom du Stand') ?></th>
            <td><?= h($stand->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Coordonnée X1') ?></th>
            <td><?= h($stand->x1) ?></td>
        </tr>
        <tr>
            <th><?= __('Coordonnée Y1') ?></th>
            <td><?= h($stand->y1) ?></td>
        </tr>
        <tr>
            <th><?= __('Coordonnée X2') ?></th>
            <td><?= h($stand->x2) ?></td>
        </tr>
        <tr>
            <th><?= __('Coordonnée Y2') ?></th>
            <td><?= h($stand->y2) ?></td>
        </tr>
        <tr>
            <th><?= __('Largeur') ?></th>
            <td><?= h($stand->width) ?> px</td>
        </tr>
        <tr>
            <th><?= __('Hauteur') ?></th>
            <td><?= h($stand->height) ?> px</td>
        </tr>
        <tr>
            <th><?= __('Angle de Rotation') ?></th>
            <td><?= h($stand->angle) ?>°</td>
        </tr>
        <tr>
            <th><?= __('Créé le') ?></th>
            <td><?= h($stand->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modifié le') ?></th>
            <td><?= h($stand->modified) ?></td>
        </tr>
    </table>

    <div class="related">
        <h4><?= __('Actions') ?></h4>
        <ul>
            <li><?= $this->Html->link(__('Modifier'), ['action' => 'edit', $stand->id]) ?></li>
            <li><?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $stand->id], ['confirm' => __('Êtes-vous sûr de vouloir supprimer {0}?', $stand->name)]) ?></li>
            <li><?= $this->Html->link(__('Liste des Stands'), ['action' => 'index']) ?></li>
        </ul>
    </div>
</div>
