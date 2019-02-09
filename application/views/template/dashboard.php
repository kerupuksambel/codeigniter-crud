<!DOCTYPE html>
<html lang="en">
	<head>
		<?php require "include.php"; ?>
		<!-- Custom CSS -->
		<link href="<?php echo base_url('assets/css/sb-admin.css'); ?>" rel="stylesheet">
	</head>
	<body>
		<div id="wrapper">
			<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
				<?php require "header.php"; ?>
				<?php require "sidebar.php"; ?>
			</nav>
			<div id="page-wrapper">
				<div class="container-fluid">
					<?php $this->load->view($page, $data); ?>
				</div>
			</div>
		</div>
		<!-- jQuery -->
		<script src="<?php echo base_url('assets/js/jquery.js');?>"></script>
		<!-- Bootstrap Core JavaScript -->
		<script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
		<script type="text/javascript">
			// $("nav #sidebar li a").click(function(e){
			// 	e.preventDefault();
			// 	$.ajax({
			// 		url: $(this).attr("href"),
			// 		success: function(res){
			// 			$("#page-wrapper .container-fluid").html(res);
			// 		}
			// 	})
			// });
		</script>
	</body>
</html>