<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Display $display
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Display'), ['action' => 'edit', $display->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Display'), ['action' => 'delete', $display->id], ['confirm' => __('Are you sure you want to delete # {0}?', $display->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Displays'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Display'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Devices'), ['controller' => 'Devices', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Device'), ['controller' => 'Devices', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Stops'), ['controller' => 'Stops', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Stop'), ['controller' => 'Stops', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Routes'), ['controller' => 'Routes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Route'), ['controller' => 'Routes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="displays view large-9 medium-8 columns content">
    <h3><?= h($display->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Device') ?></th>
            <td><?= $display->has('device') ? $this->Html->link($display->device->id, ['controller' => 'Devices', 'action' => 'view', $display->device->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Stop') ?></th>
            <td><?= $display->has('stop') ? $this->Html->link($display->stop->stop_id, ['controller' => 'Stops', 'action' => 'view', $display->stop->stop_id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Route') ?></th>
            <td><?= $display->has('route') ? $this->Html->link($display->route->route_id, ['controller' => 'Routes', 'action' => 'view', $display->route->route_id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Headsign') ?></th>
            <td><?= h($display->headsign) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($display->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Line No') ?></th>
            <td><?= $this->Number->format($display->line_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Direction') ?></th>
            <td><?= $this->Number->format($display->direction) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($display->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($display->modified) ?></td>
        </tr>
    </table>
</div>
