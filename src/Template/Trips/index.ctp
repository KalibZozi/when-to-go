<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Trip[]|\Cake\Collection\CollectionInterface $trips
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Trip'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Routes'), ['controller' => 'Routes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Route'), ['controller' => 'Routes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="trips index large-9 medium-8 columns content">
    <h3><?= __('Trips') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('route_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('trip_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('service_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('trip_headsign') ?></th>
                <th scope="col"><?= $this->Paginator->sort('direction_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('block_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('shape_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('wheelchair_accessible') ?></th>
                <th scope="col"><?= $this->Paginator->sort('bikes_allowed') ?></th>
                <th scope="col"><?= $this->Paginator->sort('boarding_door') ?></th>
                <th scope="col"><?= $this->Paginator->sort('data_version') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($trips as $trip): ?>
            <tr>
                <td><?= h($trip->route_id) ?></td>
                <td><?= h($trip->trip_id) ?></td>
                <td><?= h($trip->service_id) ?></td>
                <td><?= h($trip->trip_headsign) ?></td>
                <td><?= $this->Number->format($trip->direction_id) ?></td>
                <td><?= h($trip->block_id) ?></td>
                <td><?= h($trip->shape_id) ?></td>
                <td><?= $this->Number->format($trip->wheelchair_accessible) ?></td>
                <td><?= $this->Number->format($trip->bikes_allowed) ?></td>
                <td><?= $this->Number->format($trip->boarding_door) ?></td>
                <td><?= $this->Number->format($trip->data_version) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $trip->trip_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $trip->trip_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $trip->trip_id], ['confirm' => __('Are you sure you want to delete # {0}?', $trip->trip_id)]) ?>
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
