<?php 
	$n = validation_errors();
	if($n != ""){
		echo "<div class='alert-danger alert'>".validation_errors()."</div>";
	}
	echo form_open('data/add'); 
?>
	<label for="name">Nama</label><br/>
	<input type="text" name="name"/><br/>
	<label for="content">Konten</label>
	<br/>
	<textarea name="content" cols="50" rows="20"></textarea>
	<br/>
	<input type="submit"></input>
</form>