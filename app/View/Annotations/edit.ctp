<div class="annotations form">
<?php echo $this->Form->create('Annotation', array(
	'inputDefaults' => array(
		'div' => 'form-group',
		'label' => array(
			'class' => 'col col-md-1 control-label'
		),
		'wrapInput' => 'col col-md-11',
		'class' => 'form-control'
	),
	'class' => 'well form-horizontal'));
?>
	<fieldset>
		<legend><?php echo __('Edit Annotation'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('response_id');
		echo $this->Form->input('label', array(
			'wrapInput' => 'col col-md-3',
			'type' => 'text',
			'maxlength' => 45
		));
		echo $this->Form->input('body', array(
			'wrapInput' => 'col col-md-11',
			'type' => 'textarea',
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Annotation.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Annotation.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Annotations'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Responses'), array('controller' => 'responses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Response'), array('controller' => 'responses', 'action' => 'add')); ?> </li>
	</ul>
</div>
