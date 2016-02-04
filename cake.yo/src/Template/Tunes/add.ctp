<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Tunes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Artists'), ['controller' => 'Artists', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Artist'), ['controller' => 'Artists', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Feelings'), ['controller' => 'Feelings', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Feeling'), ['controller' => 'Feelings', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tunes form large-9 medium-8 columns content">
    <?= $this->Form->create($tune) ?>
    <fieldset>
        <legend><?= __('Add Tune') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('artist_id', ['options' => $artists]);
            echo $this->Form->input('feeling_id', ['options' => $feelings]);
            echo $this->Form->input('comcont');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
