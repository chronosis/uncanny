<div class="responses form">
<?php echo $this->Form->create('Response', array(
	'inputDefaults' => array(
		'div' => 'form-group',
		'label' => array(
			'class' => 'col col-md-1 control-label'
		),
		'wrapInput' => 'col col-md-11',
		'class' => 'form-control'
	),
	'class' => 'well form-horizontal'
) ); ?>
	<fieldset>
		<legend><?php echo __('Add Response'); ?>&nbsp;<?php echo $this->Html->link(
			$this->Html->image('list.png', array('alt' => __('List Response'), 'width' => '24px','style' => 'vertical-align: middle; margin-top: -3px;')),
			array('action' => 'index'),
			array('escape' => false, 'title' => __('List Response'))
		); ?></legend>
	<?php
		if (!(array_key_exists('category_id', $this->passedArgs)))	 {
			echo $this->Form->input('category_id', array(
				'wrapInput' => 'col col-md-3'
			));
		} else {
			echo $this->Form->input('category_id', array(
				'wrapInput' => 'col col-md-3',
				'selected' => $this->passedArgs['category_id'],
				'readonly',
				'disabled'
			));
			echo $this->Form->hidden('category_id', array (
				'value' => $this->passedArgs['category_id']
			));
		}
		echo $this->Form->input('label', array(
			'wrapInput' => 'col col-md-3',
			'type' => 'text',
			'maxlength' => 45
		));
		echo $this->Form->input('description', array(
			'wrapInput' => 'col col-md-6',
			'type' => 'text',
			'maxlength' => 255
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
