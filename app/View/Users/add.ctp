<div class="users form">
<?php echo $this->Form->create('User', array(
	'inputDefaults' => array(
		'div' => 'form-group',
		'label' => array(
			'class' => 'col col-md-1 control-label'
		),
		'wrapInput' => 'col col-md-11',
		'class' => 'form-control'
	),
	'class' => 'well form-horizontal'
)); ?>
	<fieldset>
		<legend><?php echo __('Add User'); ?></legend>
	<?php
		echo $this->Form->input('username', array(
			'wrapInput' => 'col col-md-3'
		));
		echo $this->Form->input('password', array(
			'wrapInput' => 'col col-md-3'
		));
		echo $this->Form->input('role', array(
    	'options' => array('admin' => 'Admin', 'user' => 'User'),
			'wrapInput' => 'col col-md-3'
    ));
		echo $this->Form->submit(__('Submit'), array(
			'wrapInput' => 'col col-md-offset-1',
			'class' => 'col-md-offset-1 btn btn-primary'
		));
	?>
	</fieldset>
<?php echo $this->Form->end(); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?></li>
	</ul>
</div>
