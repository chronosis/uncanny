<div class="responses view container panel">
<h2><?php
	echo __('Response');
	echo "&nbsp;&nbsp;";
	echo $this->Html->link(
		$this->Html->image('list.png', array('alt' => __('List Response'), 'width' => '24px')),
		array('action' => 'index'),
		array('escape' => false, 'title' => __('List Response'))
	);
	echo "&nbsp;";
	echo $this->Html->link(
		$this->Html->image('add.png', array('alt' => __('New Response'), 'width' => '24px')),
		array('action' => 'add'),
		array('escape' => false, 'title' => __('New Response'))
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
?></h2>
	<dl class="dl-horizontal">
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($response['Response']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Label'); ?></dt>
		<dd>
			<?php echo h($response['Response']['label']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Category'); ?></dt>
		<dd>
			<?php echo $this->Html->link($response['Category']['label'], array('controller' => 'categories', 'action' => 'view', $response['Category']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($response['Response']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Body'); ?></dt>
		<dd>
			<?php echo nl2br(h($response['Response']['body'])); ?>
		</dd>
	</dl>
</div>
<div class="responses view container panel">
	<h2><?php
		echo __('Annotations');
		echo "&nbsp;&nbsp;";
		echo $this->Html->link(
			$this->Html->image('add.png', array('alt' => __('New Annotation'), 'width' => '24px')),
			array('action' => 'add', 'controller' => 'Annotations', 'response_id' => $response['Response']['id']),
			array('escape' => false, 'title' => __('New Annotation'))
		);
		?></h2>
	<table class="table table-striped">
	<thead>
	<tr>
			<th><?php echo __('Id'); ?></th>
			<th><?php echo __('Label'); ?></th>
			<th><?php echo __('Body'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($response['Annotation'] as $annotation): ?>
	<tr>
		<td><?php echo h($annotation['id']); ?>&nbsp;</td>
		<td><?php echo h($annotation['label']); ?>&nbsp;</td>
		<td><?php echo h($annotation['body']); ?>&nbsp;</td>
		<td class="actions">
			<?php
				echo $this->Html->link(
					$this->Html->image('view.png', array('alt' => __('View Annotation'), 'width' => '24px')),
					array('action' => 'view', 'controller' => 'Annotations', $annotation['id']),
					array('escape' => false, 'title' => __('View Annotation'))
				);
				echo "&nbsp;";
				echo $this->Html->link(
					$this->Html->image('edit.png', array('alt' => __('Edit Annotation'), 'width' => '24px')),
					array('action' => 'edit', 'controller' => 'Annotations', $annotation['id']),
					array('escape' => false, 'title' => __('Edit Annotation'))
				);
				echo "&nbsp;";
				echo $this->Form->postlink(
					$this->Html->image('delete.png', array('alt' => __('Delete Annotation'), 'width' => '24px')),
					array('action' => 'delete', 'controller' => 'Annotations', $annotation['id']),
					array('escape' => false, 'title' => __('Delete Annotation')),
					__('Are you sure you want to delete # %s?',
					$annotation['id'])
				);
			?>
		</td>
	</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
	<br/>
</div>
