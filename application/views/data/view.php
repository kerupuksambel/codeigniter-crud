<h2>Data</h2>
<?php
	foreach ($arr as $data) :
		if($data['permission'] == 1){
?>
<a href='view/<?php echo $data["id"]?>'>
	<h2>
		<?php echo $data['data_name']; ?>
	</h2>
</a>
<p>
	<?php echo $data['data_value']; ?>
</p>
<?php 
		}
	endforeach; 
?>