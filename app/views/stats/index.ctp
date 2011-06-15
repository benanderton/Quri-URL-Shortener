<div class="stats index">
	<h2>Country Chart</h2>
	<?php echo $this->GoogleCharts->pie(array('chtt' => 'Visitors by Country', 'chs' => '600x300'),$countryPie); ?>
	<h2>User Agent Chart</h2>
	<?php echo $this->GoogleCharts->pie(array('chtt' => 'User Agents', 'chs' => '600x300'),$useragentPie); ?>
	<h2>Total Clicks</h2>
	<p><?php echo $clicks; ?></p>

	<h2>Unique Clicks</h2>
	<p><?php echo $uniqueClicks; ?></p>

	<h2><?php __('Latest Visitors');?></h2>

	<table cellpadding="0" cellspacing="0">
	<tr>
			<th>Country</th>
			<th>IP Address</th>
			<th>Date Accessed</th>
			<th>User Agent</th>
			<th>Referer</th>
	</tr>
	<?php
	$i = 0;
	foreach ($stats as $stat):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo ($stat['Stat']['country'] == '') ? 'Unknown' : $stat['Stat']['country']; ?>&nbsp;</td>
		<td><?php echo $stat['Stat']['ip']; ?>&nbsp;</td>
		<td><?php echo $stat['Stat']['accessed']; ?>&nbsp;</td>
		<td><?php echo $stat['Stat']['useragent']; ?>&nbsp;</td>
		<td><?php echo $stat['Stat']['referer']; ?>&nbsp;</td>
	</tr>
<?php endforeach; ?>
	</table>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Stat', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Urls', true), array('controller' => 'urls', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Url', true), array('controller' => 'urls', 'action' => 'add')); ?> </li>
	</ul>
</div>