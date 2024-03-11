<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

	<title>LukkMTA:RP</title>
	
	<!-- CORE CSS -->
	<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700' rel='stylesheet' type='text/css'> 
	<link href="assets/css/theme.min.css" rel="stylesheet">

</head>

<body>
	<div id="wrapper">
		<section class="hero hero-panel" style="background-image: url(assets/img/cover/cover-login.png);">
			<div class="container relative">
				<div class="row">
					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 pull-none margin-auto">
						<div class="panel panel-default panel-login">
							<div class="panel-heading">
								<h3 class="panel-title"><i class="fa fa-user"></i>Aktivace účtu</h3>
							</div>
							
							<div class="animated fadeIn">
								<div class="panel-body">							
									<form name="login" method="post">
										<div id="ajax"></div>

											<div class='form-group input-icon-left'>
												<i class='fa fa-lock'></i>
                                                <input type='text' class='form-control' name='serial' id='serial' placeholder='Tvůj MTA serial'>
											</div>
											
											<div class='form-group input-icon-left'>
												<i class='fa fa-lock'></i> 
												<input type='password' class='form-control' name='password' id='password' placeholder='Tvé přihlašovací heslo'>
											</div>

											<div class='form-group input-icon-left'>
												<i class='fa fa-lock'></i> 
												<input type='password' class='form-control' name='password2' id='password2' placeholder='Opět přihlašovací heslo'>
											</div>
											

											<button type='submit' class='btn btn-primary btn-block' onclick=''>Aktivovat účet</button>

										</div>


									</form>

									<?php 
										include("inc/mtaConn.php");
										

										if ($_SERVER["REQUEST_METHOD"] == "POST") {
											$serial = isset($_POST['serial']) ? $_POST['serial'] : '';
											$password = isset($_POST['password']) ? $_POST['password'] : '';
											$password2 = isset($_POST['password2']) ? $_POST['password2'] : '';
								

											if (isset($_POST['serial']) && isset($_POST['password']) && isset($_POST['password2'])) {
												$activateAccount = $mta->getResource('web')->call->verifyAccount($serial, $password, $password2);
												if ($activateAccount[0] == true) {
													echo '
													<div class="panel-footer">
													'.	$activateAccount[1] .'
													</div>
													';
												} else {
													echo '
													<div class="panel-footer">
													'.	$activateAccount[1] .'
													</div>
													';
												}
											}
											
										}
									?>
								</div>
								
								<div class="panel-footer">
									S nikým nesdílej citlivé údaje!
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
	
	<footer>
		<div class="container">
			<div class="widget row">
				<div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
					<h4 class="title">Informace</h4>
					<p>
						Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus error nulla nostrum fuga dolorem neque est non, nam nemo, nobis ab alias distinctio asperiores cumque aliquid nisi tempora maiores ex!
					</p>
				</div>
			</div>
		</div>
		
		<div class="footer-bottom">
			<div class="container">
				&copy; 2024 . Veškeré práva vyhrazena.<br>
				<i>Design and coding by <a href="https://github.com/Lukkay">Lukk</a> & <a href="https://github.com/sirasjad">Sira</a>.</i>
			</div>
		</div>
	</footer>
	
	<!-- JAVASCRIPT -->

</body>
</html>