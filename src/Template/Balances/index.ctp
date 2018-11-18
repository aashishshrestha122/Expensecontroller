<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Balance[]|\Cake\Collection\CollectionInterface $balances
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Balance'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Expenses'), ['controller' => 'Expenses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Expense'), ['controller' => 'Expenses', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="balances index large-9 medium-8 columns content">
    <h3><?= __('Balances') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('amount') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($balances as $balance): ?>
            <tr>
                <td><?= $this->Number->format($balance->id) ?></td>
                <td><?= h($balance->date) ?></td>
                <td><?= $this->Number->format($balance->amount) ?></td>
                <td><?= h($balance->created) ?></td>
                <td><?= h($balance->modified) ?></td>
                <td><?= $this->Number->format($balance->status) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $balance->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $balance->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $balance->id], ['confirm' => __('Are you sure you want to delete # {0}?', $balance->id)]) ?>
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
