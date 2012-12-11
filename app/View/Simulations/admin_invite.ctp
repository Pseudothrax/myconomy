<!-- File: /app/View/Simulations/admin_invite.ctp -->

<?php echo $this->Form->create('RegistrationKey',array('type' => 'post')); ?>
<?php echo $this->Form->input('email'); ?>
<?php echo $this->Form->button('Invite', array('type'=>'submit')); ?>
<?php echo $this->Form->end(); ?>