<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<link href="asset/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="asset/dataTable/dataTables.min.css" rel="stylesheet">
		<link href="asset/dataTable/Responsive-2.2.9/css/responsive.bootstrap4.min.css" rel="stylesheet">
		
		<script src="asset/jquery.min.js"></script>
		<script src="asset/bootstrap/js/bootstrap.min.js"></script>
		<script src="asset/dataTable/datatables.min.js"></script>
		<script>
		const base_url = "<?= $base_url ?>";
		const sesi 	   = "<?= $_SESSION['log-user']['role'] ?>";
		</script>
		<style>
		#btn-logout{cursor:pointer}
		</style>
	</head>
	<body class="bg-light">
	
		<div class="container">
		<nav class="navbar navbar-light bg-light">
			<a class="navbar-brand" href="#">Simpel CRUD</a>
			<ul class="nav">
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" id="dropdownUser" href="javascript:" data-toggle="dropdown"><?= $_SESSION['log-user']['nama'] ?></a>
					<div class="dropdown-menu" aria-labelledby="dropdownUser">
						<a class="dropdown-item" id="btn-logout">logout</a>
					</div>
				</li>
			</ul>
		</nav>
		</div>
		
		<div class="container mt-3 bg-white p-2 shadow-sm" id="ajax-content-html" style="min-height:450px">
		<?php include $path; ?>
		</div>
		
		<script>
		$('#btn-logout').on('click', function(){
			$.ajax({
				url: base_url + '/api/logout.php'
			}).done(function(res){
				window.location = window.location.href;
			});
		})
		</script>
	</body>
</html>