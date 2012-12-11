<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php echo $this->Html->charset(); ?>
    <title>Myconomy<?php if(isset($page_title)) echo ' - '.$page_title; ?></title>
    <?php
    echo $this->Html->css('myconomy');

    echo $this->fetch('meta');
    echo $this->fetch('css');
    echo $this->fetch('script');
    ?>
</head>
<body>
<div id="container">
    <div id="header">
        <h1><?php echo $this->Html->link($cakeDescription, 'http://cakephp.org'); ?></h1>
    </div>
    <div id="content">
        <?php echo $this->fetch('content'); ?>
    </div>
    <div id="footer">

    </div>
</div>
<?php echo $this->element('sql_dump'); ?>
</body>
</html>
