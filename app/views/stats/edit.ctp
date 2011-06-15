<div class="stats form">
<?php echo $this->Form->create('Stat');?>
	<fieldset>
		<legend><?php __('Edit Stat'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('url_id');
		echo $this->Form->input('country');
		echo $this->Form->input('ip');
		echo $this->Form->input('accessed');
		echo $this->Form->input('useragent');
		echo $this->Form->input('referer');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Stat.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Stat.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Stats', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Urls', true), array('controller' => 'urls', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Url', true), array('controller' => 'urls', 'action' => 'add')); ?> </li>
	</ul>
</div>