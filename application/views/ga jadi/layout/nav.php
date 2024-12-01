<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//Loading konfigurasi website
$site   = $this->setting_model->listing();
?>

<!-- Start Main Top -->
<header class="main-header">
<!-- Start Navigation -->
<nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
<div class="container">
<!-- Start Header Navigation -->
<div class="navbar-header">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
    <i class="fa fa-bars"></i>
</button>
    <a href="index.html" class="logo">
        <img src="<?php echo base_url('assets/freshshop/images/'.$site->logo) ?>" alt="<?php echo $site->nama_web ?> | <?php echo $site->tagline ?>"></a>
</div>
<!-- End Header Navigation -->

<!-- Home -->
<div class="collapse navbar-collapse" id="navbar-menu">
    <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
        <li class="nav-item active"><a class="nav-link" href="<?php echo base_url('home') ?>">Home</a></li>

<!-- Produk -->
        <li class="nav-item"><a class="nav-link" href="<?php echo base_url('produk') ?>">Produk</a></li>

<!-- Tentang Kami -->
        <li class="nav-item"><a class="nav-link" href="<?php echo base_url('tentang_kami') ?>">Tentang Kami</a></li>

<!-- Hubungi Kami -->
        <li class="nav-item"><a class="nav-link" href="<?php echo base_url('kontak') ?>">Hubungi Kami</a></li>

<!-- Akun -->
        <li class="dropdown">
        <a href="#" class="nav-link dropdown-toggle arrow" data-toggle="dropdown">Akun</a>
        <ul class="dropdown-menu">
            <li><a href="<?php echo base_url('login'); ?>">Login</a></li>
            <li><a href="<?php echo base_url('daftar'); ?>">Daftar</a></li>
        </ul>
    </ul>
</div>
<!-- /.navbar-collapse -->

<div class="attr-nav">
    <?php        
    //Check data belanja ada atau tidak 
    $cart_check     = $this->cart->contents();
    ?>  
    <ul>
        <li class="side-menu">
            <a href="#">
                <i class="fa fa-shopping-bag"></i>
                <span class="badge">3</span>
                <p>My Cart</p>
        </li>
    </ul>

<!-- End Atribute Navigation -->
      
<!-- Start Side Menu -->
<div class="side">
    
    <a class="close-side"><i class="fa fa-times"></i></a>
    <li class="cart-box">
        <ul class="cart-list">
            <?php
            //Jika tidak ada data belanjaan
            if(empty($cart_check)) { 
            ?>
                <li>
                    <p class="alert alert-success">Keranjang Belanja Kosong</p>
                </li>
            <?php 

            //Jika ada
            }else{
            //Tampilkan data belanja
                foreach ($cart_check as $cart_check) {
            ?>

            <li>
                <a class="photo"><img src="images/img-pro-01.jpg" class="cart-thumb" alt="" /></a>
                <h6><?php echo $cart_check['name'] ?></h6>
                <p>1x - <span class="price"><?php echo $cart_check['price'] ?></span></p>
            </li>
<?php
}//Tutup Foreach
}//Tutup If
?>
    <li class="total">
                <a href="#" class="btn btn-default hvr-hover btn-cart">VIEW CART</a>
                <span class="float-right"><strong>Total</strong>: $180.00</span>
            </li>
        </ul>
    </li>
    </div>
</div>
<!-- End Side Menu -->
</nav>
<!-- End Navigation -->

</header>
<!-- End Main Top -->