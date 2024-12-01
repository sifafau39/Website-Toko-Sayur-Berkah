<?php

defined('BASEPATH') OR exit('No direct script access allowed');
//Loading konfigurasi website
$site   = $this->setting_model->listing();
?>

<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<!-- Mobile Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Icon website diambil dari setting icon -->
<link rel="icon" type="image/png" href="<?php echo base_url('assets/freshshop/images/'.$site->icon) ?>">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="<?php echo base_url();?>assets/freshshop/css/bootstrap.min.css">
<!-- Site CSS -->
<link rel="stylesheet" href="<?php echo base_url();?>assets/freshshop/css/style.css">
<!-- Responsive CSS -->
<link rel="stylesheet" href="<?php echo base_url();?>assets/freshshop/css/responsive.css">
<!-- Custom CSS -->
<link rel="stylesheet" href="<?php echo base_url();?>assets/freshshop/css/custom.css">

<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

</head>

<body>