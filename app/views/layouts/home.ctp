<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php __('Quri'); ?>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('style');

		echo $scripts_for_layout;
	?>
</head>
<body>

<div id="maincontainer">
	<div id="header">
		<?php /*
		<div id="top">
			<div class="quri"><p>Shorten your URL's at quir.co</p></div>
			<div class="nav">
			  <ul>
				<li><a href="index.htm">home</a></li>
				<li><a href="#">login</a></li>
				<li><a href="#">signup</a></li>
				<li><a href="#">contact</a></li>
			  </ul>
			</div>
		</div> */ ?>
		<div style="clear: both"> </div>

		<div id="logo">
					<?php echo $this->Html->link($this->Html->image(
							'logo.png',
							array(
								'alt'=> __('Quri - Squeeze your URL', true),
								'border' => '0'
							)), '/', array('escape' => false));	?>
		</div>
	</div>

	<div id="quriDo">
			<?php echo $this->Session->flash(); ?>

			<?php echo $content_for_layout; ?>
	</div>


	<div id="credits"><p>&copy; 2011 quri.co.uk<p></div>

</div>
	<?php /*
	<div id="container">
		<div id="header">
			<h1><?php echo $this->Html->link(__('CakePHP: the rapid development php framework', true), 'http://cakephp.org'); ?></h1>
		</div>
		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $content_for_layout; ?>

		</div>
		<div id="footer">
			<?php echo $this->Html->link(
					$this->Html->image('cake.power.gif', array('alt'=> __('CakePHP: the rapid development php framework', true), 'border' => '0')),
					'http://www.cakephp.org/',
					array('target' => '_blank', 'escape' => false)
				);
			?>
		</div>
	</div> */ ?>
</body>
</html>