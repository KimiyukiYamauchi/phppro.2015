<div>
    <h3>Find Person</h3>
    <?= $msg ?>
    <?= $this->Form->create() ?>
    <fieldset>
        <?= $this->Form->input('find'); ?>
        <?= $this->Form->button('Submit') ?>
        <?= $this->Form->end() ?>
    </fieldset>
    <table>
    <thead>
        <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>AGE</th>
            <th>MAIL</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($persons as $person): ?>
        <tr>
					<td><?= h($person[0]) ?></td>
					<td><?= h($person[1]) ?></td>
					<td><?= h($person[2]) ?></td>
					<td><?= h($person[3]) ?></td>
        </tr>
            <?php endforeach; ?>
            </tbody>
    </table>
</div>
