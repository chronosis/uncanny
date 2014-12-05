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
		<legend><?php echo __('Add Annotation'); ?>&nbsp;<?php echo $this->Html->link(
			$this->Html->image('list.png', array('alt' => __('List Annotations'), 'width' => '24px', 'style' => 'vertical-align: middle; margin-top: -3px;')),
			array('action' => 'index'),
			array('escape' => false, 'title' => __('List Annotations'))
		); ?></legend>
	<?php
		echo $this->Form->hidden('response_id');
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
	<h3><?php echo __('Other Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Responses'), array('controller' => 'responses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Response'), array('controller' => 'responses', 'action' => 'add')); ?> </li>
	</ul>
</div>
