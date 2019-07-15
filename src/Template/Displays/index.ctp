<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Display[]|\Cake\Collection\CollectionInterface $displays
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Display'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Devices'), ['controller' => 'Devices', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Device'), ['controller' => 'Devices', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Stops'), ['controller' => 'Stops', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Stop'), ['controller' => 'Stops', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Routes'), ['controller' => 'Routes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Route'), ['controller' => 'Routes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="displays index large-9 medium-8 columns content">
    <h3><?= __('Displays') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('device_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('line_no') ?></th>
                <th scope="col"><?= $this->Paginator->sort('stop_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('route_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('direction') ?></th>
                <th scope="col"><?= $this->Paginator->sort('headsign') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($displays as $display): ?>
            <tr>
                <td><?= $this->Number->format($display->id) ?></td>
                <td><?= $display->has('device') ? $this->Html->link($display->device->id, ['controller' => 'Devices', 'action' => 'view', $display->device->id]) : '' ?></td>
                <td><?= $this->Number->format($display->line_no) ?></td>
                <td><?= $display->has('stop') ? $this->Html->link($display->stop->stop_id, ['controller' => 'Stops', 'action' => 'view', $display->stop->stop_id]) : '' ?></td>
                <td><?= $display->has('route') ? $this->Html->link($display->route->route_id, ['controller' => 'Routes', 'action' => 'view', $display->route->route_id]) : '' ?></td>
                <td><?= $this->Number->format($display->direction) ?></td>
                <td><?= h($display->headsign) ?></td>
                <td><?= h($display->created) ?></td>
                <td><?= h($display->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $display->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $display->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $display->id], ['confirm' => __('Are you sure you want to delete # {0}?', $display->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
