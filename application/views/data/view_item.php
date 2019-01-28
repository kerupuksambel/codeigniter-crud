<!-- <h2>Data</h2> -->
<?php
	foreach ($arr as $data) :
?>
<h2><?php echo $data['data_name']; ?></h2>
<p><?php echo $data['data_value']; ?></p>
<?php endforeach; ?>