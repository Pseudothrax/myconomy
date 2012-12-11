<!-- File: /app/View/Simulations/admin_index.ctp -->

<table>
  <tr>
	  <th>Simulation Name</th>
      <th>Simulation Class</th>
	  <th>Simulation Owner</th>
	  <th>Date Created</th>
<?php foreach($simulations as $row => $data): ?>
	<tr>
		<?php $name = implode(array($data['Owner']['first_name'],$data['Owner']['last_name']),' '); ?>
		<td><?php echo $this->Html->link($data['Simulation']['name'],array('action'=>'view',$data['Simulation']['id'])); ?></td>
        <td><?php echo $data['Simulation']['class']; ?></td>
        <td><?php echo $name.' (',$this->Html->link($data['Owner']['username'],array('controller'=>'users','action'=>'view',$data['Owner']['id'])).')'; ?></td>	<!--Simulation owner-->
		<td><?php echo $this->time->niceShort($data['Simulation']['created']); ?>
	</tr>
<?php endforeach ?>
</table>
