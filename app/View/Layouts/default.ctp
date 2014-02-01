<?php
/**
 *
 *
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
		<?php echo __d('stack_title', 'Stack de Desarrollo CakePHP'); ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');
		echo $this->Html->css('bootstrap.min');
		echo $this->Html->css('animate');
		echo $this->Html->css('jquery.fancybox');
		echo $this->Html->css('flick/jquery-ui-1.10.4.custom.min');
		echo $this->Html->css('main');
		echo $this->Html->script('jquery-1.11.0.min');
		echo $this->Html->script('bootstrap.min');
		echo $this->Html->script('jquery.mousewheel-3.0.6.pack');
		echo $this->Html->script('jquery.fancybox.pack');
		echo $this->Html->script('jquery-ui-1.10.4.custom.min');
		echo $this->Html->script('editor/ckeditor.js');
		echo $this->Html->script('main');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container">
		<header></header>
		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<footer>
		</footer>
	</div>
	<?php #echo $this->element('sql_dump'); ?>
</body>
</html>
