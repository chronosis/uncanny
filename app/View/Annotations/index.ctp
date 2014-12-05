<div class="annotations index container panel">
	<h2><?php echo __('Annotations'); ?></h2>
	<table class="table table-striped">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('response_id'); ?></th>
			<th><?php echo $this->Paginator->sort('label'); ?></th>
			<th><?php echo $this->Paginator->sort('body'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($annotations as $annotation): ?>
	<tr>
		<td><?php echo h($annotation['Annotation']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($annotation['Response']['label'], array('controller' => 'responses', 'action' => 'view', $annotation['Response']['id'])); ?>
		</td>
		<td><?php echo h($annotation['Annotation']['label']); ?>&nbsp;</td>
		<td><?php echo h($annotation['Annotation']['body']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $annotation['Annotation']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $annotation['Annotation']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $annotation['Annotation']['id']), array(), __('Are you sure you want to delete # %s?', $annotation['Annotation']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="pagination">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Annotation'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Responses'), array('controller' => 'responses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Response'), array('controller' => 'responses', 'action' => 'add')); ?> </li>
	</ul>
</div>
