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
<body class="normal">

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
		<div id="logo" class="main">
					<?php echo $this->Html->link($this->Html->image(
							'logosmall.png',
							array(
								'alt'=> __('Quri - Squeeze your URL', true),
								'border' => '0'
							)), '/', array('escape' => false));	?>
		</div>
	</div>
	<div id="main">
			<?php echo $this->Session->flash(); ?>

			<?php echo $content_for_layout; ?>
	</div>

	<div id="credits"><p>&copy; 2011 quri.co.uk<p></div>

</div>

</body>
</html>