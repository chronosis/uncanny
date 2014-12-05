<div class="responses index container panel">
	<h2><?php
		echo __('Responses');
		echo "&nbsp;&nbsp;";
		echo $this->Html->link(
			$this->Html->image('add.png', array('alt' => __('New Response'), 'width' => '24px')),
			array('action' => 'add'),
			array('escape' => false, 'title' => __('New Response'))
		);
	?></h2>
	<table class="table table-striped">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('label'); ?></th>
			<th><?php echo $this->Paginator->sort('category_id'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($responses as $response): ?>
	<tr>
		<td><?php echo h($response['Response']['id']); ?>&nbsp;</td>
		<td><?php echo h($response['Response']['label']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($response['Category']['label'], array('controller' => 'categories', 'action' => 'view', $response['Category']['id'])); ?>
		</td>
		<td><?php echo h($response['Response']['description']); ?>&nbsp;</td>
		<td class="actions">
			<?php
				echo $this->Html->link(
					$this->Html->image('view.png', array('alt' => __('View Response'), 'width' => '24px')),
					array('action' => 'view', $response['Response']['id']),
					array('escape' => false, 'title' => __('View Response'))
				);
				echo "&nbsp;";
				echo $this->Html->link(
					$this->Html->image('edit.png', array('alt' => __('Edit Response'), 'width' => '24px')),
					array('action' => 'edit', $response['Response']['id']),
					array('escape' => false, 'title' => __('Edit Response'))
				);
				echo "&nbsp;";
				echo $this->Form->postlink(
					$this->Html->image('delete.png', array('alt' => __('Delete Response'), 'width' => '24px')),
					array('action' => 'delete', $response['Response']['id']),
					array('escape' => false, 'title' => __('Delete Response')),
					__('Are you sure you want to delete # %s?',
					$response['Response']['id'])
				);
			?>
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
