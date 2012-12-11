<!-- File: /app/View/Elements/menu.ctp -->

<?php if(isset($menu)): ?>
<ul>
<?php foreach($menu[1] as $item => $url): ?>
  <?php if($menu[0]==$item): ?>
  <li><?php echo $this->Html->link($item,$url,array('class'=>'current_page_item')); ?></li>
  <?php else: ?>
  <li><?php echo $this->Html->link($item,$url); ?></li>
  <?php endif; ?>
<?php endforeach ?>
</ul>
<?php endif ?>