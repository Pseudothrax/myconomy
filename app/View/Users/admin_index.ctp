<!-- File: /app/View/Simulations/admin_index.ctp -->

<h3>Admin Users</h3>
<?php echo $this->element('submenu'); ?>

<table>
<tr>
    <th>User Name</th>
    <th>User Type</th>
    <th>Date Created</th>
    <?php foreach($users as $row => $data): ?>
    <tr>
        <?php $name = implode(array($data['User']['first_name'],$data['User']['last_name']),' '); ?>
        <td><?php echo $name.' (',$this->Html->link($data['User']['username'],array('controller'=>'users','action'=>'view',$data['User']['id'])).')'; ?></td>
        <td><?php echo $data['User']['type']; ?></td>
        <td><?php echo $this->time->niceShort($data['User']['created']); ?>
    </tr>
    <?php endforeach ?>
</table>
