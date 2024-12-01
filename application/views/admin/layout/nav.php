<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>

      <!-- MENU DASBOR -->
      <li><a href="<?php echo base_url('admin/dasbor') ?>"><i class="fa fa-dashboard text-aqua"></i> <span>Dasbor</span></a></li>

       <!-- MENU Transaksi -->
      <li><a href="<?php echo base_url('admin/transaksi') ?>"><i class="fa fa-check"></i> <span>Transaksi</span></a></li>

      <!-- MENU Produk -->
      <li class="treeview">
        <a href="#">
          <i class="fa fa-sitemap"></i> <span>Produk</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo base_url('admin/produk') ?>"><i class="fa fa-table"></i> Data Produk</a></li>
          <li><a href="<?php echo base_url('admin/produk/tambah') ?>"><i class="fa fa-plus"></i> Tambah Produk</a></li>
        </ul>
      </li>

      <!-- MENU Rekening -->
       <li><a href="<?php echo base_url('admin/rekening') ?>"><i class="fa fa-dollar"></i> <span>Rekening</span></a></li>

      <!-- MENU USER -->
      <li class="treeview">
        <a href="#">
          <i class="fa fa-lock"></i> <span>Pengguna</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo base_url('admin/user') ?>"><i class="fa fa-table"></i> Data pengguna</a></li>
          <li><a href="<?php echo base_url('admin/user/tambah') ?>"><i class="fa fa-plus"></i> Tambah pengguna</a></li>
        </ul>
      </li>

       <!-- MENU Pesan -->
      <li><a href="<?php echo base_url('admin/kontak') ?>"><i class="fa fa-pencil-square-o"></i> <span>Pesan</span></a></li>
     
     <!-- MENU Konfigurasi -->
      <li class="treeview">
        <a href="#">
          <i class="fa fa-wrench"></i> <span>Pengaturan Website</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo base_url('admin/setting') ?>"><i class="fa fa-home"></i> Pengaturan Umum</a></li>
          <li><a href="<?php echo base_url('admin/setting/logo') ?>"><i class="fa fa-image"></i> Pengaturan Logo</a></li>
          <li><a href="<?php echo base_url('admin/setting/icon') ?>"><i class="fa fa-file-image-o"></i> Pengaturan Icon</a></li>
          </ul>
         </li>
      
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
     <?php echo $title ?>
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          
          <!-- /.box-header -->
          <div class="box-body">
