<h1>Your URL has been shortened</h1>

<p>Your URL has been shortened to <?php echo $this->Html->link(
				$this->Html->url('/' . $hash, true),
				'/' . $hash,
				true
			); ?> </p>
