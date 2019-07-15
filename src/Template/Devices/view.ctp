<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Device $device
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Device'), ['action' => 'edit', $device->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Device'), ['action' => 'delete', $device->id], ['confirm' => __('Are you sure you want to delete # {0}?', $device->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Devices'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Device'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Displays'), ['controller' => 'Displays', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Display'), ['controller' => 'Displays', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="devices view large-9 medium-8 columns content">
    <h3><?= h($device->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Serial No') ?></th>
            <td><?= h($device->serial_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= h($device->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $device->has('user') ? $this->Html->link($device->user->id, ['controller' => 'Users', 'action' => 'view', $device->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($device->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($device->created) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Displays') ?></h4>
        <?php if (!empty($device->displays)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Device Id') ?></th>
                <th scope="col"><?= __('Line No') ?></th>
                <th scope="col"><?= __('Stop Id') ?></th>
                <th scope="col"><?= __('Route Id') ?></th>
                <th scope="col"><?= __('Direction') ?></th>
                <th scope="col"><?= __('Headsign') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($device->displays as $displays): ?>
            <tr>
                <td><?= h($displays->id) ?></td>
                <td><?= h($displays->device_id) ?></td>
                <td><?= h($displays->line_no) ?></td>
                <td><?= h($displays->stop_id) ?></td>
                <td><?= h($displays->route_id) ?></td>
                <td><?= h($displays->direction) ?></td>
                <td><?= h($displays->headsign) ?></td>
                <td><?= h($displays->created) ?></td>
                <td><?= h($displays->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Displays', 'action' => 'view', $displays->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Displays', 'action' => 'edit', $displays->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Displays', 'action' => 'delete', $displays->id], ['confirm' => __('Are you sure you want to delete # {0}?', $displays->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
