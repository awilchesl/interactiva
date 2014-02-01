<?php echo $this->Html->link('<i class="glyphicon glyphicon-plus"></i> Agregar', '/users/create', array('class' => 'btn btn-primary pull-right', 'escape' => false)); ?>
<pre>
	<?php print_r($users); ?>
</pre>
<h1>Administrador de usuarios</h1>
<table class="table">
	<tr>
		<th>ID</th>
		<th>Username</th>
		<th>Email</th>
		<th>Nombre</th>
		<th>Rol</th>
		<th></th>
	</tr>
	<?php foreach ($users as $user): ?>
	<tr>
		<td><?php echo $user['User']['id']; ?></td>
		<td><?php echo $user['User']['username']; ?></td>
		<td><?php echo $user['User']['email']; ?></td>
		<td><?php echo $user['User']['name']; ?></td>
		<td><?php echo $user['User']['rol']; ?></td>
		<td>
			<?php echo $this->Html->link('<i class="glyphicon glyphicon-eye-open"></i>', array('controller' => 'users', 'action' => 'read', $user['User']['id'], 'full_base' => true), array('class' => 'btn btn-info btn-xs', 'escape' => false)); ?>
			<?php echo $this->Html->link('<i class="glyphicon glyphicon-edit"></i>', array('controller' => 'users', 'action' => 'update', $user['User']['id'], 'full_base' => true), array('class' => 'btn btn-warning btn-xs', 'escape' => false)); ?>
			<?php echo $this->Form->postLink('<i class="glyphicon glyphicon-remove"></i>',
                array('action' => 'destroy', $user['User']['id']),
                array('escape' => false, 'confirm' => 'Are you sure?', 'class' => 'btn btn-danger btn-xs')     
            )?>
		</td>
	</tr>
	<?php endforeach; ?>
</table>
<?php echo $this->Paginator->numbers(array('before' => '<ul class="pagination">', 'after' => '</ul>', 'separator' => '', 'tag' => 'li', 'currentTag' => 'a', 'currentClass' => 'active')); ?>