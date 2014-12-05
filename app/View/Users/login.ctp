<div class="users form">
<?php echo $this->Session->flash('auth'); ?>
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
        <legend>
            <?php echo __('Please enter your username and password'); ?>
        </legend>
        <?php
        echo $this->Form->input('username',  array(
          'wrapInput' => 'col col-md-3'
        ));
        echo $this->Form->input('password', array(
          'wrapInput' => 'col col-md-3'
        ));
        echo $this->Form->submit(__('Login'), array(
          'wrapInput' => 'col col-md-offset-1',
          'class' => 'col-md-offset-1 btn btn-primary'
        ));
    ?>
    </fieldset>
<?php echo $this->Form->end(); ?>
</div>
