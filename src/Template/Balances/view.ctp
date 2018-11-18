<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Balance $balance
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Balance'), ['action' => 'edit', $balance->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Balance'), ['action' => 'delete', $balance->id], ['confirm' => __('Are you sure you want to delete # {0}?', $balance->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Balances'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Balance'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Expenses'), ['controller' => 'Expenses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Expense'), ['controller' => 'Expenses', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="balances view large-9 medium-8 columns content">
    <h3><?= h($balance->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($balance->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Amount') ?></th>
            <td><?= $this->Number->format($balance->amount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $this->Number->format($balance->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date') ?></th>
            <td><?= h($balance->date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($balance->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($balance->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Expenses') ?></h4>
        <?php if (!empty($balance->expenses)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Balance Id') ?></th>
                <th scope="col"><?= __('Title') ?></th>
                <th scope="col"><?= __('Amount') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($balance->expenses as $expenses): ?>
            <tr>
                <td><?= h($expenses->id) ?></td>
                <td><?= h($expenses->balance_id) ?></td>
                <td><?= h($expenses->title) ?></td>
                <td><?= h($expenses->amount) ?></td>
                <td><?= h($expenses->created) ?></td>
                <td><?= h($expenses->modified) ?></td>
                <td><?= h($expenses->status) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Expenses', 'action' => 'view', $expenses->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Expenses', 'action' => 'edit', $expenses->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Expenses', 'action' => 'delete', $expenses->id], ['confirm' => __('Are you sure you want to delete # {0}?', $expenses->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
