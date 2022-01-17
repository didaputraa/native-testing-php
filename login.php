<?php include 'config.php' ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="asset/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<style>
		#alert-pesan{
			position:fixed;
			width:100%;
			top:0;
		}
		</style>
	</head>
	<body class="bg-light">
		<div class="container">
			<div class="row">
				<div class="col-md-5 mx-auto mt-5 pt-2 bg-white">
					<h3 class="text-center">Login area</h3>
						<div class="form-group">
							<label>Username</label>
							<input id="username" type="text" class="form-control">
						</div>
						<div class="form-group">
							<label>Password</label>
							<input id="password" type="password" class="form-control">
						</div>
						<div class="form-group">
							<div class="float-right pb-3">
								<button onClick="_login()" class="btn btn-outline-primary">Login</button>
							</div>
						</div>
				</div>
			</div>
		</div>
		<div id="alert-pesan"></div>
		
		<script src="asset/jquery.min.js"></script>
		<script src="asset/bootstrap/js/bootstrap.min.js"></script>
		<script>
		const base_url = "<?= $base_url ?>"
		</script>
		<script src="asset/module/login.js"></script>
	</body>
<html>