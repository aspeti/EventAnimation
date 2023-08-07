


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V16</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?php echo base_url ();?>estilos/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url ();?>estilos/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url ();?>estilos/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url ();?>estilos/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url ();?>estilos/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url ();?>estilos/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url ();?>estilos/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url ();?>estilos/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url ();?>estilos/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url ();?>estilos/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url ();?>estilos/css/main.css">
<!--===============================================================================================-->
</head>
<body>


						<div class="limiter">
							<div class="container-login100" style="background-image: url('<?php echo base_url ();?>estilos/images/bg-01.jpg');">
												
											<?php
									echo form_open_multipart('usuario/validarUsuario');
									?>
													<form action="#" class="signin-form">
											<div class="wrap-login100 p-t-30 p-b-50">
													<span class="login100-form-title p-b-41">
														LECHE PAGO1
													</span>
													<form class="login100-form validate-form p-b-33 p-t-5">

														<div class="wrap-input100 validate-input" data-validate = "Enter username">
															<input id="login" name="login" class="input100" type="text"  placeholder="Usuario">
															<span class="focus-input100" data-placeholder="&#xe82a;"></span>
														</div>

														<div class="wrap-input100 validate-input" data-validate="Enter password">
															<input id="password-field" name="password" class="input100" type="password"  placeholder="Password">
															<span class="focus-input100" data-placeholder="&#xe80f;"></span>
														</div>

														<div class="container-login100-form-btn m-t-32">
															<button type="submit" class="login100-form-btn">
																INGRESAR
															</button>
														</div>

													</form>
												</div>
											</div>

											</form>
								<?php
									echo form_close();
									?>
						</div>


	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="<?php echo base_url ();?>estilos/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url ();?>estilos/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url ();?>estilos/vendor/bootstrap/js/popper.js"></script>
	<script src="<?php echo base_url ();?>estilos/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url ();?>estilos/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url ();?>estilos/vendor/daterangepicker/moment.min.js"></script>
	<script src="<?php echo base_url ();?>estilos/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url ();?>estilos/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url ();?>estilos/js/main.js"></script>

</body>
</html>
