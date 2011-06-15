<div class="stats view">
<h2><?php  __('Stat');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Country'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $stat['Stat']['country']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('IP'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $stat['Stat']['ip']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Time'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $stat['Stat']['accessed']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('User Agent'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $stat['Stat']['useragent']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Referer'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $stat['Stat']['referer']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Stat', true), array('action' => 'edit', $stat['Stat']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Stat', true), array('action' => 'delete', $stat['Stat']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $stat['Stat']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Stats', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Stat', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Urls', true), array('controller' => 'urls', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Url', true), array('controller' => 'urls', 'action' => 'add')); ?> </li>
	</ul>
</div>
