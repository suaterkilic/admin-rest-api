<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Yönetim Paneli</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />


	<link href="http://hayageek.github.io/jQuery-Upload-File/4.0.11/uploadfile.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php admin_import('css/niceCountryInput.css') ?>">

	<link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/fontawesome.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js"></script>
	
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/fontawesome.min.css" rel="stylesheet"> 
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<!-- Fonts and icons -->
	<script src="<?php admin_import('js/plugin/webfont/webfont.min.js'); ?>"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js"></script>
	<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
	<script src="<?php admin_import('js/niceCountryInput.js'); ?>"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['http://<?php echo $_SERVER['SERVER_NAME']; ?>/public/admin/assets/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="<?php admin_import('css/bootstrap.min.css'); ?>">
	<link rel="stylesheet" href="<?php admin_import('css/atlantis.min.css'); ?>">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="<?php admin_import('css/demo.css'); ?>">
</head>
<body data-background-color="dark">
	<div class="wrapper">
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header" data-background-color="dark2">
				
				<a href="<?php url('admin'); ?>" class="logo">
					<img width="100%3" src="<?php admin_import('img/logo.png'); ?>" alt="navbar brand" class="navbar-brand">
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="icon-menu"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
				<div class="nav-toggle">
					<button class="btn btn-toggle toggle-sidebar">
						<i class="icon-menu"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg" data-background-color="dark">
				
				<div class="container-fluid">
					<div class="collapse" id="search-nav">
					</div>
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item dropdown hidden-caret">
							<!--<a class="nav-link dropdown-toggle" href="<?php urlSsl('admin/calendar'); ?>" id="messageDropdown" role="button"  aria-haspopup="true" aria-expanded="false">
							<i class="fas fa-calendar-check"></i>
							</a>
							<a class="nav-link dropdown-toggle" href="#" id="messageDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fa fa-envelope"></i>
								<span class="notification"><?php 
										//$appList = DB::all('appointments_request');
										$appList = DB::appCount();
										echo count($appList);
									?></span>
							</a> -->
							<ul class="dropdown-menu messages-notif-box animated fadeIn" aria-labelledby="messageDropdown">
								<li>
									<div class="dropdown-title d-flex justify-content-between align-items-center">
										Randevu Talepleri 									
									</div>
								</li>
								<!--
								<li>
									<div class="message-notif-scroll scrollbar-outer">
										<div class="notif-center">
											<?php dateList('25/02/2020'); ?>
											<?php 
												$appList= DB::allAppointments();
											if(!empty($appList)): 
												foreach($appList as $key => $value):
											?>
											<a href="#">
												<div class="notif-img"> 
													<i class="far fa-clock"></i>
												</div>
												<div class="notif-content">
													<span class="subject"><?=$value['client_name_surname'];?></span>
													<span class="block">
														<?=$value['client_message'];?>
													</span>
													<span class="time">
														<?php
															$getDate = $value['request_date'];
															$dateResult = dateList($getDate);

															echo $dateResult[0] . ' ' . $dateResult[1] . ' ' . $dateResult[2];
														?>
													</span> 
												</div>
											</a>
											<?php endforeach; ?>

											<?php else: ?>
												<div class="dropdown-title d-flex justify-content-between align-items-center">
													Henüz hiç randevu talebi yok. 									
												</div>
											<?php endif;?>
										</div>
									</div>
								</li>-->
								<li>
									<a class="see-all" href="appointment_request">Tüm Randevuları Gör<i class="fa fa-angle-right"></i> </a>
								</li>
							</ul>
						</li>
						<li class="nav-item dropdown hidden-caret">
							<?php 
								$userList = DB::getProfilePicture();
							?>
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
								<div class="avatar-sm">
									<img style="object-fit:fill" src="<?php url('storage/uploads/'); echo $userList['img']; ?>" alt="..." class="avatar-img rounded-circle">
								</div>
							</a>
						</li>
					</ul>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>