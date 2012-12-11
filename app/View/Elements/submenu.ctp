<!-- File: /app/View/Elements/submenu.ctp -->

<?php if(isset($submenu)): ?>
<ul>
<?php foreach($submenu[1] as $item => $url): ?>
  <?php if($submenu[0]==$item): ?>
  <li><?php echo $this->Html->link($item,$url,array('class'=>'current_page_item')); ?></li>
  <?php else: ?>
  <li><?php echo $this->Html->link($item,$url); ?></li>
  <?php endif ?>
<?php endforeach ?>
</ul>
<?php endif; ?>