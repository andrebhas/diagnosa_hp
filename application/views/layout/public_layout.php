<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= $title ?> | <?php echo $this->config->item('nama_sistem') ?></title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="<?= base_url()?>assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url()?>assets/css/icons/fontawesome/styles.min.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url()?>assets/css/minified/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url()?>assets/css/minified/core.min.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url()?>assets/css/minified/components.min.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url()?>assets/css/minified/colors.min.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script type="text/javascript" src="<?= base_url()?>assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="<?= base_url()?>assets/js/core/libraries/bootstrap.min.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script type="text/javascript" src="<?= base_url()?>assets/js/core/app.js"></script>
	<!-- /theme JS files -->

</head>
<!--  sidebar-xs -->
<body class="navbar-top">

	<!-- Main navbar -->
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="navbar-header">
			<a class="navbar-brand" href="index.html"><?php echo $this->config->item('nama_sistem') ?></a>

			<ul class="nav navbar-nav pull-right visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
				<li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
			</ul>
		</div>

		<div class="navbar-collapse collapse" id="navbar-mobile">
			<ul class="nav navbar-nav">
				<li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				
								<li><a href="<?php echo base_url('auth.html') ?>"><i class="fa fa-sign-in"></i> <span>Login</span></a></li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->


	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<?php $this->load->view('layout/public_sidebar'); ?>

			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Page header -->
				<div class="page-header">
					<div class="page-header-content">
						<div class="page-title text-center">
							<h4> 
							<span class="text-semibold">
								<?php echo $title ?>	
							</span> 
							</h4>
						</div>
					</div>

					<div class="breadcrumb-line">
						<?php echo $breadcrumbs ?>
					</div>
				</div>
				<!-- /page header -->

			<?php $this->load->view($content); ?>

			<!-- Footer -->
			<div class="text-center">
				   &copy; 2017. <a href="<?php echo base_url() ?>"> <?php echo $this->config->item('nama_sistem') ?></a> by <a href="http://facebook.com" target="_blank">Ari Fandi</a>
			</div>
			<!-- /footer -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->

</body>
</html>
