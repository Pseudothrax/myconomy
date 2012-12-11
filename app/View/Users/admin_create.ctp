<!-- File: /app/View/Simulations/admin_create.ctp -->

<?php echo $this->Form->create('User',array('type' => 'post')); ?>
<?php echo $this->Form->input('first_name'); ?>
<?php echo $this->Form->input('last_name'); ?>
<?php echo $this->Form->input('email'); ?>
<?php echo $this->Form->input('type', array('type'=>'select', 'options'=>array('student'=>'student','instructor'=>'instructor'))); ?>
<?php echo $this->Form->input('username'); ?>
<?php echo $this->Form->input('password'); ?>
<?php echo $this->Form->button('Create', array('type'=>'submit')); ?>
<?php echo $this->Form->end(); ?>
