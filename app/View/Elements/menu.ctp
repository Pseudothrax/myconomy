<!-- File: /app/View/Elements/menu.ctp -->

<?php if(isset($menu)): ?>
<ul>
<?php foreach($menu as $item => $url): ?>
  <li><?php echo $this->Html->link($item,$url); ?></li>
<?php endforeach ?>
</ul>
<?php endif ?>
