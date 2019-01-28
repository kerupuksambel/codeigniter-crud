<h2>Data</h2>
<?php
	foreach ($arr as $data) :
?>
<a href='view/<?php echo $data["id"]?>'>
	<h5><?php echo $data['data_name']; ?></h5>
</a>
<p><?php echo $data['data_value']; ?></p>
<?php endforeach; ?>