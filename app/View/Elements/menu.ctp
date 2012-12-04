<!-- File: /app/View/Elements/menu.ctp -->

<?php if(isset($menu)): ?>
<ul>
<?php foreach($menu as $item => $url): ?>
  <?php if($this->Html->url($url) === $this->here): ?>
  <li><?php echo $item; ?></li>
  <?php else: ?>
  <li><?php echo $this->Html->link($item,$url); ?></li>
  <?php endif; ?>
<?php endforeach ?>
</ul>
<?php endif ?>
