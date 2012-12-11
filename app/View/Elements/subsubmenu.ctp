<!-- File: /app/View/Elements/subsubmenu.ctp -->

<?php if(isset($subsubmenu)): ?>
<ul>
    <?php foreach($subsubmenu as $item => $url): ?>
    <?php if($this->Html->url($url) === $this->here): ?>
        <li><?php echo $item; ?></li>
        <?php else: ?>
        <li><?php echo $this->Html->link($item,$url); ?></li>
        <?php endif ?>
    <?php endforeach ?>
</ul>
<?php endif ?>
