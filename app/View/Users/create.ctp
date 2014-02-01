<?php echo $this->Form->create('User'); ?>
	<div class="row">
		<div class="col-md-6 col-lg-6">
			<?php 
				echo $this->Form->input('username', array('class' => 'form-control', 'required' => 'required'));
				echo $this->Form->input('email', array('class' => 'form-control', 'required' => 'required'));
				echo $this->Form->input('password', array('class' => 'form-control', 'required' => 'required'));
				echo $this->Form->input('rol', array('options' => array('User' => 'User', 'Admin' => 'Admin'), 'class' => 'form-control', 'required' => 'required'));
				echo $this->Form->input('location', array('class' => 'form-control', 'required' => 'required'));
			?>
		</div>
		<div class="col-md-6 col-lg-6">
			<?php 
				echo $this->Form->input('name', array('class' => 'form-control', 'required' => 'required'));
				?>
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
				echo $this->Form->input('active', array('type' => 'checkbox', 'value' => 1));
			?>
			<button type="submit" class="btn btn-block btn-lg btn-primary">Guardar</button>
		</div>
	</div>
<?php echo $this->Form->end(); ?>