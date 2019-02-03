<?php
	
?>
<table>
	<tr>
		<th>Nama</th>
		<th>Konten</th>
		<th>Tindakan</th>
	</tr>
	<?php foreach($rows as $row): 
		if($row['permission'] == 1){
	?>
	<tr>
		<td><?php echo $row['data_name']; ?></td>
		<td><?php echo $row['data_value']; ?></td>
		<td><a href="<?php echo $link."/".$row['id']; ?>"><?php echo $act; ?></a></td>
	</tr>
	<?php 
		}
	endforeach; ?>
</table>