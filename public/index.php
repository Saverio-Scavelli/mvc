<?php

require_once '../app/init.php';

$app = new App($match);
?>
<h1>AltoRouter</h1>

<h3>Current request: </h3>
<pre>
	Target: <?php var_dump($match['target']); ?>
	Params: <?php var_dump($match['params']); ?>
	Name: 	<?php var_dump($match['name']); ?>
</pre>

<h3>Try these requests: </h3>
<p><a href="<?php echo $router->generate('home'); ?>">GET <?php echo $router->generate('home'); ?></a></p>
<p><a href="<?php echo $router->generate('users_show', array('id' => 5)); ?>">GET <?php echo $router->generate('users_show', array('id' => 5)); ?></a></p>

<p><form action="<?php echo $router->generate('users_do', array('id' => 10, 'action' => 'update')); ?>" method="post"><button type="submit">
	<?php echo $router->generate('users_do', array('id' => 10, 'action' => 'update')); ?></button></form></p>
	<p><form action="<?php echo $router->generate('users_do', array('id' => 10, 'action' => 'delete')); ?>" method="post"><button type="submit">
		<?php echo $router->generate('users_do', array('id' => 10, 'action' => 'delete')); ?></button></form></p>
