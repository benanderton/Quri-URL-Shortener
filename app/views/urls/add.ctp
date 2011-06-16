<?php $this->Html->script(array('https://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js', 'add.js'), array('inline'=>false)) ?>


<?php echo $this->Form->create('Url');?>
	<?php echo $this->Form->input('original', array('class' => 'input', 'label' => false, 'div' => false)); ?>
<?php 
$options = array(
	'label' => false,
	'value' => 'SUBMITTTTT',
	'div' => false,
	'class' => 'submit');
echo $this->Form->end($options);
?>
