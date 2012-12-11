<!-- File: /app/View/Elements/actions.ctp -->

<?php if(isset($actions)): ?>
<ul>
    <?php foreach($actions[1] as $item => $url): ?>
    <?php if($actions[0]==$item): ?>
        <li><?php echo $this->Html->link($item,$url,array('class'=>'current_page_item')); ?></li>
        <?php else: ?>
        <li><?php echo $this->Html->link($item,$url); ?></li>
        <?php endif; ?>
    <?php endforeach ?>
</ul>
<?php endif ?>