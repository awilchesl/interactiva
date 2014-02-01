<div class="row">
	<div class="col-md-4 col-lg-4">
	</div>
	<div class="col-md-4 col-lg-4">
		<?php echo $this->Form->create('User'); ?>
		<?php 
			echo $this->Form->input('username', array('class' => 'form-control', 'required' => 'required'));
			echo $this->Form->input('password', array('class' => 'form-control', 'required' => 'required'));
		?>
		<button type="submit" class="btn btn-block btn-lg btn-primary">Entrar</button>
		<?php echo $this->Form->end(); ?>
	</div>
</div>