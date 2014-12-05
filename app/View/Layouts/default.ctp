<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		// Latest compiled and minified CSS
		echo $this->Html->css('https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css');

		// Optional theme
		//echo $this->Html->css('https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css');

		//echo $this->Html->css('cake.generic');
		echo $this->Html->css('custom');

		// Latest version of JQuery
		$this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js', array('block' => 'scriptBottom'));

		// Latest version of jQuery-JSON (required for Bootstrap)
		$this->Html->script('https://jquery-json.googlecode.com/files/jquery.json-2.3.min.js', array('block' => 'scriptBottom'));

		// Latest compiled and minified JavaScript
		$this->Html->script('https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js', array('block' => 'scriptBottom'));
	?>
</head>
<body>
	<div id="outer" class="outer">
		<div id="container" class="container-fluid">
			<div id="header">
				<h1><?php echo $this->Html->link(
					Configure::read('Settings')['Application']['Name'] . ' v' .Configure::read('Settings')['Application']['Version'],
					['controller' => 'pages', 'action' => 'display', 'home']);
					?></h1>
			</div>
			<div id="content">

				<?php echo $this->Session->flash(); ?>

				<?php echo $this->fetch('content'); ?>
			</div>
			<div id="footer">
				<?php echo $this->Html->link(
						$this->Html->image('cake.power.gif', array('border' => '0')),
						'http://www.cakephp.org/',
						array('target' => '_blank', 'escape' => false, 'id' => 'cake-powered')
					);
				?>
			</div>
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
	<?php echo $this->fetch('scriptBottom'); ?>
	<?php echo $this->fetch('scriptBottomAfter'); ?>
</body>
</html>
