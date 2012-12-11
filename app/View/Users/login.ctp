<?php $this->start('sidebar'); ?>

<h2>Log In</h2>
<ul class="style1">
    <li class="first">
        <?php echo $this->Session->flash('auth'); ?>
        <?php echo $this->Form->create('User', array('id'=>'form1')); ?>
        <?php echo $this->Form->input('username',array('type'=>'text','label'=>'Username:')); ?>
        <?php echo $this->Form->input('password',array('type'=>'password','label'=>'Password:')); ?>
        <?php echo $this->Form->button("Login",array('type'=>'submit')); ?>
    </li>
    <li><a href="forgetPwd.html">Forgot Password?</a></li>
</ul>

<?php $this->end(); ?>

<div id="banner"></div>