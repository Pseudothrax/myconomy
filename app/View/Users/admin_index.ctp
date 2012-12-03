<!-- File: /app/View/Simulations/admin_home.ctp -->

<?php echo $this->element('menu'); ?>
<h3>Admin Index</h3>

<?php echo $this->Form->create('Test'); ?>
<?php echo $this->Form->button('Submit',array('type'=>'submit')); ?>
<?php echo $this->Form->end(); ?>

<?php echo $this->Html->link('Test Link',array('admin'=>true,'instructor'=>false,'controller'=>'users','action'=>'index'));


