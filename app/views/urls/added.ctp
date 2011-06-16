<h1>Your URL has been shortened</h1>

<p class="new-url"> <?php echo $this->Html->link(
				$this->Html->url('/' . $hash, true),
				'/' . $hash,
				true
			); ?> <br /><span class="smaller">
<?php echo $this->Html->link(
				'Control Panel',
				'/i/' . $hash,
				true
			); ?></span></p>
