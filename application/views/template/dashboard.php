<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>CodeIgniter CRUD</title>
		<!-- Bootstrap Core CSS -->
		<link href="assets/css/bootstrap.min.css" rel="stylesheet">
		<!-- Custom CSS -->
		<link href="assets/css/sb-admin.css" rel="stylesheet">
		<!-- Morris Charts CSS -->
		<link href="assets/css/plugins/morris.css" rel="stylesheet">
		<!-- Custom Fonts -->
		<link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<div id="wrapper">
			<!-- Navigation -->
			<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
				<!-- Brand and toggle get grouped for better mobile display -->
				<?php require "header.php"; ?>
				<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
				<?php require "sidebar.php"; ?>
				<!-- /.navbar-collapse -->
			</nav>
			<div id="page-wrapper">
				<div class="container-fluid">
					<?php $this->load->view($page, $data); ?>
				</div>
				<!-- /.container-fluid -->
			</div>
			<!-- /#page-wrapper -->
		</div>
		<!-- /#wrapper -->
		<!-- jQuery -->
		<script src="assets/js/jquery.js"></script>
		<!-- Bootstrap Core JavaScript -->
		<script src="assets/js/bootstrap.min.js"></script>
		<script type="text/javascript">
			$("nav #sidebar li a").click(function(e){
				e.preventDefault();
				$.ajax({
					url: $(this).attr("href"),
					success: function(res){
						$("#page-wrapper .container-fluid").html(res);
					}
				})
			});
		</script>
	</body>
</html>