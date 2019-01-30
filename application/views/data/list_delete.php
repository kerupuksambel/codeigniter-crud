<table>
	<tr>
		<th>Nama</th>
		<th>Konten</th>
		<th>Tindakan</th>
	</tr>
	<?php foreach($rows as $row): ?>
	<tr>
		<td><?php echo $row['data_name']; ?></td>
		<td><?php echo $row['data_value']; ?></td>
		<td><a href="<?php echo "delete/".$row['id']; ?>">Delete</a></td>
	</tr>
	<?php endforeach; ?>
</table>