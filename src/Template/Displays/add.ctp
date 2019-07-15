<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Display $display
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Displays'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Devices'), ['controller' => 'Devices', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Device'), ['controller' => 'Devices', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Stops'), ['controller' => 'Stops', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Stop'), ['controller' => 'Stops', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Routes'), ['controller' => 'Routes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Route'), ['controller' => 'Routes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="displays form large-9 medium-8 columns content">
    <?= $this->Form->create($display) ?>
    <fieldset>
        <legend><?= __('Add Display') ?></legend>
        <?php
            echo $this->Form->control('device_id', ['options' => $devices, 'empty' => true]);
            echo $this->Form->control('line_no');
            echo $this->Form->control('stop_id', ['options' => $stops, 'empty' => true]);
            echo $this->Form->control('route_id', ['options' => $routes, 'empty' => true]);
            echo $this->Form->control('direction');
            echo $this->Form->control('headsign');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
