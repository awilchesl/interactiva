<?php echo $this->Form->create('User'); ?>
<div class="row">
	<div class="col-md-4 col-lg-4">
		<?php 
			echo $this->Form->input('username', array('label' => 'Nombre de usuarios (Username)', 'class' => 'form-control', 'required' => 'required'));
			echo $this->Form->input('password', array('class' => 'form-control', 'required' => 'required'));
			echo $this->Form->input('email', array('label' => 'Email','type' => 'email', 'class' => 'form-control', 'required' => 'required'));
		?>
	</div>
	<div class="col-md-4 col-lg-4">
		<div class="form-inline">
			<?php echo $this->Form->input('birthdate', array(
				'label' => 'Fecha de nacimiento',
			    'dateFormat' => 'DMY',
			    'minYear' => date('Y') - 70,
			    'maxYear' => date('Y') - 12,
			    'before' => '',
			    'after' => '',
			    'between' => '<div class="clearfix"></div>',
			    'separator' => ' ',
			    'class' => 'form-control',
			    'required' => 'required'));
			?>
		</div>
		<?php 
			echo $this->Form->input('name', array('label' => 'Nombre Completo','class' => 'form-control', 'required' => 'required')); 
			echo $this->Form->input('location', array('label' => 'Ubicación', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Bogota, Colombia')); 
		?>
		<hr>
		<button type="submit" class="btn btn-block btn-lg btn-primary">Registrarme</button>
		
	</div>
</div>
<?php echo $this->Form->end(); ?>