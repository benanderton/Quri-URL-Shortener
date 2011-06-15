<div class="urls view">
<h2><?php  __('Url');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $url['Url']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Original'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $url['Url']['original']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Hash'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $url['Url']['hash']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('QR Code'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->GoogleCharts->qr(array('chl' => $this->Html->url('/', true) . $url['Url']['hash'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Stats'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link(__('View Statistics', true), array('controller' => 'stats', $url['Url']['id'])); ?>
			&nbsp;
		</dd>

	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Url', true), array('action' => 'edit', $url['Url']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Url', true), array('action' => 'delete', $url['Url']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $url['Url']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Urls', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Url', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
