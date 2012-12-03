<!-- File: /app/View/Elements/submenu.ctp -->

<?php if(isset($submenu)): ?>
<ul>
<?php foreach($submenu as $item => $url): ?>
  <li><?php echo $this->Html->link($item,$url); ?></li>
<?php endforeach ?>
</ul>
<?php endif ?>
