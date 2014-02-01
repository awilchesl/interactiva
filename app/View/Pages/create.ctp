<?php echo $this->Form->create('Page'); ?>
	<?php 
		echo $this->Form->input('title', array('class' => 'form-control', 'required' => 'required'));
		echo $this->Form->input('content', array('class' => 'ckeditor', 'required' => 'required'));
		echo $this->Form->input('active', array('class' => 'form-control', 'required' => 'required'));
	?>

	<button type="submit" class="btn btn-block btn-lg btn-primary">Guardar</button>
<?php echo $this->Form->end(); ?>