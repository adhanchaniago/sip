<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=1,initial-scale=1,user-scalable=1" />
	<title>LOGIN PT. SAMUDRA TEKNIK INDONESIA</title>
	
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/logo1.png">
	<!--===============================================================================================-->	
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>src/login/vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>src/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>src/login/vendor/animate/animate.css">
	<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>src/login/vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>src/login/vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>src/login/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>src/login/css/main.css">
</head>
<body>
	<div class="limiter">
		<?php echo $this->session->flashdata('message');
		?>
		<div class="container">
			<div class="row">
				<div class="wrap-login100" style = "margin-top : -25px;">
					<div class="login100-pic js-tilt" data-tilt>
						<img src="<?php echo base_url();?>src/login/images/img-01.png" alt="IMG">
					</div>

					<form class="login100-form validate-form" action="<?php echo base_url(); ?>Auth/login" method="POST">
						<span class="login100-form-title">
							LOGIN PT. SAMUDRA TEKNIK INDONESIA
						</span>

						<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
							<input class="input100" type="text" name="username" placeholder="Username" autofocus autocomplete="off">
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-user" aria-hidden="true"></i>
							</span>
						</div>

						<div class="wrap-input100 validate-input" data-validate = "Password is required">
							<input class="input100" type="password" name="password" placeholder="Password" autocomplete="off">
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-lock" aria-hidden="true"></i>
							</span>
						</div>

						<div class="container-login100-form-btn">
							<button class="login100-form-btn" name = "submit">
								Login
							</button>
						</div>

						<div class="text-center p-t-12">
							<span class="txt1">
								-
							</span>
							<a class="txt2" href="#">
								-
							</a>
						</div>

						<div class="text-center p-t-136">
							<a class="txt2">
								Created By Samudra Teknik INDONESIA
								<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
							</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>


	<script src="<?php echo base_url();?>src/login/vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="<?php echo base_url();?>src/login/vendor/bootstrap/js/popper.js"></script>
	<script src="<?php echo base_url();?>src/login/vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="<?php echo base_url();?>src/login/vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="<?php echo base_url();?>src/login/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
	<!--===============================================================================================-->
	<script src="<?php echo base_url();?>src/login/js/main.js"></script>

</body>
</html>