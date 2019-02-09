<html>
<head>
	<?php require "template/include.php"; ?>
	<link href="<?php echo base_url('assets/css/login.css') ?>" type="text/css" rel="stylesheet"/>
</head>
<body>
	<div class="login-page">
		<div class="form">
<?php 
	if(isset($msg)){
		echo "<div class='alert alert-danger'>".$msg."</div>";
	}
	echo form_open('login/verify', array('class' => 'login-form')); 
?>
				<label for="username">Username</label>
				<input type="text" name="username"/>
				<label for="password">Password</label>
				<input type="password" name="password"/>
				<input type="submit" value="Submit"/>
			</form>
		</div>
	</div>
</body>