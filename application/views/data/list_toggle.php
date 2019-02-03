<?php

?>
<table>
	<tr>
		<th>Nama</th>
		<th>Konten</th>
		<th>Status</th>
		<th>Tindakan</th>
	</tr>
	<?php foreach($rows as $row): 
		if($row['permission'] == 0){
			$text = "Hidden";
			$act = "Show";
		}else{
			$text = "Shown";
			$act = "Hide";
		}
	?>
	<tr>
		<td>
			<?php echo $row['data_name']; ?>
		</td>
		<td>
			<?php echo $row['data_value']; ?>
		</td>
		<td>
			<?php echo $text?>
		</td>
		<td><a href="<?php echo "toggle/".$row['id']; ?>"><?php echo $act; ?></a></td>
	</tr>
	<?php endforeach; ?>
</table>