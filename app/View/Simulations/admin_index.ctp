<!-- File: /app/View/Simulations/admin_index.ctp -->

<?php echo $this->element('menu'); ?>
<h3>Admin Simulation List</h3> 
<?php echo $this->element('submenu'); ?>

<table>
  <tr>
	  <th>Simulation Name</th>
	  <th>Simulation Owner</th>
	  <th>Date Created</th>
<?php foreach($simulations as $row => $data): ?>
	<tr>
		<?php $name = implode(array($data['Owner']['first_name'],$data['Owner']['last_name']),' '); ?>
		<td><?php echo $this->Html->link($data['Simulation']['name'],array('action'=>'view',$data['Simulation']['id'])); ?></td>					<!--Simulation name-->
		<td><?php echo $name.' (',$this->Html->link($data['Owner']['username'],array('controller'=>'users','action'=>'view',$data['Owner']['id'])).')'; ?></td>	<!--Simulation owner-->
		<td><?php echo $this->time->niceShort($data['Simulation']['created']); ?>
	</tr>
<?php endforeach ?>
</table>