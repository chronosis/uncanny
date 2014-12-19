<?php
/**
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Pages
 * @since         CakePHP(tm) v 0.10.0.1076
 */

if (!Configure::read('debug')):
	throw new NotFoundException();
endif;

App::uses('Debugger', 'Utility');

$this->Html->script('uncanny', array('block' => 'scriptBottomAfter'));
?>
<h4><?php echo Configure::read('Settings')['Application']['Description']; ?></h4>
<div class="col-md-12">
<div class="row-fluid">
  <div class="col-md-4" class="height: auto; overflow: scroll;">
		<h5>Select Responses<span style="float:right"><?php
			echo $this->Html->link(__('Edit Categories'), array('controller' => 'categories', 'action' => 'index'));
		?></span></h5>
		<div id="responses" class="responses-loading">&nbsp;
		</div>
	</div>
  <div class="col-md-8" style="height: auto;">
		<h5>Preview<span style="float: right;"><button type="button" class="btn btn-primary btn-xs" onClick="Uncanny.selectText('generated')">Select Text</button></span></h5>
		<pre id="generated">This will be replaced with generated text.</pre>
	</div>
</div>
</div>
