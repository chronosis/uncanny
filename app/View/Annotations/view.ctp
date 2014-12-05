<div class="annotations view">
<h2><?php echo __('Annotation'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($annotation['Annotation']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Response'); ?></dt>
		<dd>
			<?php echo $this->Html->link($annotation['Response']['label'], array('controller' => 'responses', 'action' => 'view', $annotation['Response']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Label'); ?></dt>
		<dd>
			<?php echo h($annotation['Annotation']['label']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Body'); ?></dt>
		<dd>
			<?php echo h($annotation['Annotation']['body']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Annotation'), array('action' => 'edit', $annotation['Annotation']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Annotation'), array('action' => 'delete', $annotation['Annotation']['id']), array(), __('Are you sure you want to delete # %s?', $annotation['Annotation']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Annotations'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Annotation'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Responses'), array('controller' => 'responses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Response'), array('controller' => 'responses', 'action' => 'add')); ?> </li>
	</ul>
</div>
