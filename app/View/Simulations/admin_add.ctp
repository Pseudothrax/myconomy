<!-- File: /app/View/Simulations/admin_add.ctp -->

<h1>Add Simulation</h1>

<?php echo $this->Form->create('Simulation',array('type' => 'post')); ?>
<?php echo $this->Form->input('name'); ?>
<?php echo $this->Form->input('owner_id', array('type'=>'select', 'options'=>$instructors)); ?>
<?php echo $this->Form->button('Create', array('type'=>'submit')); ?>
<?php echo $this->Form->end(); ?>
<?php unset($simulation); ?>
