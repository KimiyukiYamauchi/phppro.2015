<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Tune'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Artists'), ['controller' => 'Artists', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Artist'), ['controller' => 'Artists', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Feelings'), ['controller' => 'Feelings', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Feeling'), ['controller' => 'Feelings', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tunes index large-9 medium-8 columns content">
    <h3><?= __('Tunes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('artist_id') ?></th>
                <th><?= $this->Paginator->sort('feeling_id') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tunes as $tune): ?>
            <tr>
                <td><?= $this->Number->format($tune->id) ?></td>
                <td><?= h($tune->name) ?></td>
                <td><?= $tune->has('artist') ? $this->Html->link($tune->artist->name, ['controller' => 'Artists', 'action' => 'view', $tune->artist->id]) : '' ?></td>
                <td><?= $tune->has('feeling') ? $this->Html->link($tune->feeling->name, ['controller' => 'Feelings', 'action' => 'view', $tune->feeling->id]) : '' ?></td>
                <td><?= h($tune->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $tune->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tune->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $tune->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tune->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
