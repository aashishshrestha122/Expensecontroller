<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Expense $expense
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Expense'), ['action' => 'edit', $expense->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Expense'), ['action' => 'delete', $expense->id], ['confirm' => __('Are you sure you want to delete # {0}?', $expense->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Expenses'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Expense'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Balances'), ['controller' => 'Balances', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Balance'), ['controller' => 'Balances', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="expenses view large-9 medium-8 columns content">
    <h3><?= h($expense->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Balance') ?></th>
            <td><?= $expense->has('balance') ? $this->Html->link($expense->balance->id, ['controller' => 'Balances', 'action' => 'view', $expense->balance->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($expense->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($expense->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Amount') ?></th>
            <td><?= $this->Number->format($expense->amount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $this->Number->format($expense->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($expense->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($expense->modified) ?></td>
        </tr>
    </table>
</div>
