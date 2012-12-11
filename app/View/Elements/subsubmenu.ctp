<!-- File: /app/View/Elements/subsubmenu.ctp -->

<?php if(isset($subsubmenu)): ?>
<ul>
<?php foreach($subsubmenu[1] as $item => $url): ?>
    <?php if($subsubmenu[0]==$item): ?>
    <li><?php echo $this->Html->link($item,$url,array('class'=>'current_page_item')); ?></li>
    <?php else: ?>
    <li><?php echo $this->Html->link($item,$url); ?></li>
    <?php endif ?>
    <?php endforeach ?>
</ul>
<?php endif ?>
