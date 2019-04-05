<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Trip $trip
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Trip'), ['action' => 'edit', $trip->trip_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Trip'), ['action' => 'delete', $trip->trip_id], ['confirm' => __('Are you sure you want to delete # {0}?', $trip->trip_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Trips'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Trip'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Routes'), ['controller' => 'Routes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Route'), ['controller' => 'Routes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="trips view large-9 medium-8 columns content">
    <h3><?= h($trip->trip_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Route Id') ?></th>
            <td><?= h($trip->route_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Trip Id') ?></th>
            <td><?= h($trip->trip_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Service Id') ?></th>
            <td><?= h($trip->service_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Trip Headsign') ?></th>
            <td><?= h($trip->trip_headsign) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Block Id') ?></th>
            <td><?= h($trip->block_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Shape Id') ?></th>
            <td><?= h($trip->shape_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Direction Id') ?></th>
            <td><?= $this->Number->format($trip->direction_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Wheelchair Accessible') ?></th>
            <td><?= $this->Number->format($trip->wheelchair_accessible) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Bikes Allowed') ?></th>
            <td><?= $this->Number->format($trip->bikes_allowed) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Boarding Door') ?></th>
            <td><?= $this->Number->format($trip->boarding_door) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data Version') ?></th>
            <td><?= $this->Number->format($trip->data_version) ?></td>
        </tr>
    </table>
</div>
