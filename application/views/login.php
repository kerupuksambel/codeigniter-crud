<?php 
	if(isset($msg)){
		echo $msg;
	}
	echo form_open('login/verify'); 
?>
	<label for="username">Username</label>
	<input type="text" name="username"/>
	<label for="password">Password</label>
	<input type="password" name="password"/>
	<input type="submit" value="Submit"/>
</form>