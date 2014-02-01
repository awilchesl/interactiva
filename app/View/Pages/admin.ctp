<?php echo $this->Html->link('<i class="glyphicon glyphicon-plus"></i> Agregar', '/pages/create', array('class' => 'btn btn-primary pull-right', 'escape' => false)); ?>
<pre>
<?php print_r($paginsb); ?>
</pre>
 de Paginas</h1>
<table class="table">
	<tr>
		<th>ID</th>
		<th>Pagename</th>
		<th>Email</th>
		<th>Nombre</th>
		<th>Rol</th>
		<th></th>
	</tr>
	<?php foreach ($pages as $page): ?>
	<tr>
		<td><?php echo $page['Page']['id']; ?></td>
		<td><?php echo $page['Page']['username']; ?></td>
		<td><?php echo $page['Page']['email']; ?></td>
		<td><?php echo $page['Page']['name']; ?></td>
		<td><?php echo $page['Page']['rol']; ?></td>
		<td>
			<?php echo $this->Html->link('<i class="glyphicon glyphicon-eye-open"></i>', array('controller' => 'users', 'action' => 'read', $page['Page']['id'], 'full_base' => true), array('class' => 'btn btn-info btn-xs', 'escape' => false)); ?>
			<?php echo $this->Html->link('<i class="glyphicon glyphicon-edit"></i>', array('controller' => 'users', 'action' => 'update', $page['Page']['id'], 'full_base' => true), array('class' => 'btn btn-warning btn-xs', 'escape' => false)); ?>
			<?php echo $this->Form->postLink('<i class="glyphicon glyphicon-remove"></i>',
                array('action' => 'destroy', $page['Page']['id']),
                array('escape' => false, 'confirm' => 'Are you sure?', 'class' => 'btn btn-danger btn-xs')     
            )?>
		</td>
	</tr>
	<?php endforeach; ?>
</table>
<?php echo $this->Paginator->numbers(array('before' => '<ul class="pagination">', 'after' => '</ul>', 'separator' => '', 'tag' => 'li', 'currentTag' => 'a', 'currentClass' => 'active')); ?>