<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Trip $trip
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Trips'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Routes'), ['controller' => 'Routes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Route'), ['controller' => 'Routes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="trips form large-9 medium-8 columns content">
    <?= $this->Form->create($trip) ?>
    <fieldset>
        <legend><?= __('Add Trip') ?></legend>
        <?php
            echo $this->Form->control('route_id');
            echo $this->Form->control('service_id');
            echo $this->Form->control('trip_headsign');
            echo $this->Form->control('direction_id');
            echo $this->Form->control('block_id');
            echo $this->Form->control('shape_id');
            echo $this->Form->control('wheelchair_accessible');
            echo $this->Form->control('bikes_allowed');
            echo $this->Form->control('boarding_door');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
