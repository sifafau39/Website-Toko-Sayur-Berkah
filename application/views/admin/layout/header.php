<?php

//Load konfigurasi website
$site   = $this->setting_model->listing();

?>

<header class="main-header">
    <!-- Logo -->
    <a href="<?php echo base_url('admin/dasbor') ?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>Toko Sayur Berkah</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Toko Sayur Berkah</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
       <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
             <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
         
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url('assets/fashe/images/upload/'.$site->logo) ?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $this->session->userdata('nama'); ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url('assets/fashe/images/upload/'.$site->logo) ?>" class="img-circle" alt="User Image">

                <p>
                  <?php echo $this->session->userdata('nama'); ?> - <?php echo $this->session->userdata('role'); ?>
                  <small><?php echo date('d M Y') ?></small>
                </p>
              </li>
            
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <a href="<?php echo base_url('login/logout') ?>" class="btn btn-default btn-flat">Logout</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  
