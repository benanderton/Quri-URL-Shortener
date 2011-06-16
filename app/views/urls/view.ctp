<div>
	<div class="quri-info">
	<h2>Original</h2>
	<p>	<?php echo $this->Html->link(
					$this->Html->url($url['Url']['original']),
					$url['Url']['original'],
					true
				); ?></p>

	<h2>Quri URL</h2>
	<p>	<?php echo $this->Html->link(
					$this->Html->url('/' . $url['Url']['hash'], true),
					'/' . $url['Url']['hash'],
					true
				); ?></p>

	<h2>Statistics</h2>
	<p>	<?php echo $this->Html->link(__('View Statistics', true), array('controller' => 'stats', $url['Url']['hash'])); ?></p>
	</div>



	<div class="qr-container">
		<?php echo $this->GoogleCharts->qr(array('chl' => $this->Html->url('/', true) . $url['Url']['hash'], 'chs' => '300x300')); ?>
	</div>

	<div class="push"></div>



		
		<?php //echo $this->Html->link(__('View Statistics', true), array('controller' => 'stats', $url['Url']['id'])); ?>

</div>
