<!DOCTYPE html>
<html>
<head>
<?php echo $this->Html->charset(); ?>
<title>
<?php __('ToneMe トンミー '); ?>
<?php echo $title_for_layout; ?>
</title>
<?php
echo $this->Html->meta('icon');
echo $this->Html->css('toneme');
//echo $scripts_for_layout;
?>
</head>
<body>
<div id="container">
<div id="header">
<h1><?php echo $this->Html->image('head.png');?></h1>
</div>
<div id="content">
<?php //echo $this->Session->flash(); ?>
<?php //echo $content_for_layout; ?>

    <?= $this->Flash->render() ?>
    <section class="container clearfix">
        <?= $this->fetch('content') ?>
    </section>

</div>
<div id="footer">
<?php /*echo $this->Html->link(
$this->Html->image('powered_by_cake_logo_25.png',
array('alt'=> __('CakePHP: the rapid development php framework', true), 'border' => '0')),
'http://www.cakephp.org/', array('target' => '_blank', 'escape' => false));*/
?>
</div>
</div>
<?php //echo $this->element('sql_dump'); ?>
</body>
</html>
