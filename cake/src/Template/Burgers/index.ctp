<table>
<tr>
<th>ID</th>
<th>商品名</th>
<th>価格</th>
</tr>
<?php foreach($burgers as $tn){ ?>
<tr>
<td><?php echo h($tn->id); ?></td>
<td><?php echo h($tn->name); ?></td>
<td><?php echo h($tn->price); ?></td<>
</tr>
<?php } ?> 
</table>
<?php
debug($burgers); 
?>
