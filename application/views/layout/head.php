<?php

//Loading konfigurasi website
$site   = $this->setting_model->listing();

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Home</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
<!-- Icon website diambil dari setting icon -->
	<link rel="icon" type="image/png" href="<?php echo base_url('assets/fashe/images/upload/'.$site->icon) ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/fashe/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/fashe/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/fashe/fonts/themify/themify-icons.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/fashe/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/fashe/fonts/elegant-font/html-css/style.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/fashe/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/fashe/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/fashe/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/fashe/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/fashe/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/fashe/vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/fashe/vendor/lightbox2/css/lightbox.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/fashe/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/fashe/css/main.css">
<!--===============================================================================================-->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/fashe/css/flaticon.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/fashe/fonts/flaticon.css">

	<style type="text/css" media="screen">
		ul.pagination{
			padding: 0 10px;
			background-color: green;
			border-radius: 10px;
		}
		.pagination a, .pagination b {
			padding: 10px 20px;
			
			text-decoration: none;
			float: left;
		}
		.pagination a{
			background-color: green;
			color: white;
		}
		.pagination b{
			background-color: brown;
			color: white;
		}
		.pagination a:hover {
			background-color: brown;
		}
	</style>

</head>
<body class="animsition">