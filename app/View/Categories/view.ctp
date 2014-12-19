<div class="categories view container panel">
<h2>
<?php
	echo __('Category');
	echo "&nbsp;&nbsp;";
	echo $this->Html->link(
		$this->Html->image('list.png', array('alt' => __('List Categories'), 'width' => '24px')),
		array('action' => 'index'),
		array('escape' => false, 'title' => __('List Categories'))
	);
	echo "&nbsp;";
	echo $this->Html->link(
		$this->Html->image('add.png', array('alt' => __('New Category'), 'width' => '24px')),
		array('action' => 'add'),
		array('escape' => false, 'title' => __('New Category'))
	);
	echo "&nbsp;";
	echo $this->Html->link(
		$this->Html->image('edit.png', array('alt' => __('Edit Category'), 'width' => '24px')),
		array('action' => 'edit', $category['Category']['id']),
		array('escape' => false, 'title' => __('Edit Category'))
	);
	echo "&nbsp;";
	echo $this->Form->postlink(
		$this->Html->image('delete.png', array('alt' => __('Delete Category'), 'width' => '24px')),
		array('action' => 'delete', $category['Category']['id']),
		array('escape' => false, 'title' => __('Delete Category')),
		__('Are you sure you want to delete # %s?',
		$category['Category']['id'])
	);
?></h2>
	<dl class="dl-horizontal">
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($category['Category']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Label'); ?></dt>
		<dd>
			<?php echo h($category['Category']['label']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sort Order'); ?></dt>
		<dd>
			<?php echo h($category['Category']['sort_order']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="related">
	<h3>
<?php
	echo __('Related Responses');
	echo "&nbsp;&nbsp;";
	echo $this->Html->link(
		$this->Html->image('list.png', array('alt' => __('List Response'), 'width' => '24px')),
		array('controller' => 'responses', 'action' => 'index'),
		array('escape' => false, 'title' => __('List Response'))
	);
	echo "&nbsp;";
	echo $this->Html->link(
		$this->Html->image('add.png', array('alt' => __('New Response'), 'width' => '24px')),
		array('controller' => 'responses', 'action' => 'add'),
		array('escape' => false, 'title' => __('New Response'))
	);
	echo "&nbsp;";
?></h3>
	<?php if (!empty($category['responses'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Label'); ?></th>
		<th><?php echo __('Body'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Category Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($category['responses'] as $responses): ?>
		<tr>
			<td><?php echo $responses['id']; ?></td>
			<td><?php echo $responses['label']; ?></td>
			<td><?php echo $responses['body']; ?></td>
			<td><?php echo $responses['description']; ?></td>
			<td><?php echo $responses['category_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'responses', 'action' => 'view', $responses['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'responses', 'action' => 'edit', $responses['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'responses', 'action' => 'delete', $responses['id']), array(), __('Are you sure you want to delete # %s?', $responses['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Responses'), array('controller' => 'responses', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
