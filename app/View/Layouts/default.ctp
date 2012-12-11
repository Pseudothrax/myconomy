<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php echo $this->Html->charset(); ?>
    <title>Myconomy<?php echo ' - '.$title_for_layout; ?></title>
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
        <div id="logo">
            <h1><a href="index.html">MyConomy</a></h1>
        </div>
        <div id="menu">
            <?php echo $this->element('menu'); ?>
        </div>
    </div>
    <div id="main">
        <div id="page-wrapper">
            <div id="page">
                <?php echo $this->fetch('content'); ?>
            </div>
        </div>
        <?php $sidebar =  $this->fetch('sidebar'); ?>
        <?php if($sidebar != null): ?>
        <div id="sidebar-outer-wrapper">
            <div id="sidebar-inner-wrapper">
                <div id="sidebar">
                    <?php echo $sidebar; ?>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>


</div>
<?php //echo $this->element('sql_dump'); ?>
</body>
</html>
