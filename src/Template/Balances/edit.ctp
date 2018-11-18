<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Balance $balance
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $balance->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $balance->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Balances'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Expenses'), ['controller' => 'Expenses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Expense'), ['controller' => 'Expenses', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="balances form large-9 medium-8 columns content">
    <?= $this->Form->create($balance) ?>
    <fieldset>
        <legend><?= __('Edit Balance') ?></legend>
        <?php
            echo $this->Form->control('date');
            echo $this->Form->control('amount');
            echo $this->Form->control('status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
