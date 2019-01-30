<?php 
	echo validation_errors();
	$target = "data/update/".$id;
	echo form_open($target); 
?>
	<label for="name">Nama</label><br/>
	<input type="text" name="name" value='<?php echo $nama; ?>'/><br/>
	<label for="content">Konten</label>
	<br/>
	<textarea name="content" cols="50" rows="20"><?php echo $konten;?></textarea>
	<br/>
	<input type="submit"></input>
</form>