<div class="wrap_header">
	<!-- Logo -->
	<a class="logo">
		<img src="<?php echo base_url('assets/fashe/images/upload/'.$site->logo) ?>">
	</a>
	
<!-- Menu -->
<div class="wrap_menu">
	<nav class="menu">
		<ul class="main_menu">
	
		<!-- HOME -->
			<li>
				<a href="<?php echo base_url('home') ?>">Home</a>
			</li>

		<!-- Menu Produk -->	
			<li>
				<a href="<?php echo base_url('produk') ?>">Produk</a>
			</li>
			
		<!-- Menu Hubungi Kami -->
			<li>
				<a href="<?php echo base_url('kontak') ?>">Hubungi Kami</a>
			</li>

		<!-- Menu Akun -->
			 <li class="dropdown">
				<a href="#" class="nav-link dropdown-toggle arrow" data-toggle="dropdown">Akun</a>
				<ul class="sub_menu">

				<?php if($this->session->userdata('email')) { ?>

	            	<li><a href="<?php echo base_url('dasbor'); ?>">Akun Saya</a></li>
	            	<li><a href="<?php echo base_url('dasbor/shop'); ?>">Order Saya</a></li>
	            	<li><a href="<?php echo base_url('masuk/logout'); ?>">Logout</a></li>

				<?php }else{ ?>

	            	<li><a href="<?php echo base_url('masuk'); ?>">Login</a></li>
	            	<li><a href="<?php echo base_url('registrasi'); ?>">Registrasi</a></li>

            	<?php } ?>
        	</ul>
		</ul>
	</nav>
</div>

<!-- Header Icon -->
<div class="header-icons">

	<?php if($this->session->userdata('email')) { ?>
		<a href="<?php echo base_url('dasbor') ?>" class="header-wrapicon1 dis-block">
			<img src="<?php echo base_url() ?>assets/fashe/images/icons/icon-header-01.png" class="header-icon1" alt="ICON"> <?php echo $this->session->userdata('nama_pelanggan'); ?>&nbsp;
		</a>

	<?php } ?>

	<span class="linedivide1"></span>

	<div class="header-wrapicon2">
		<?php        
    	//cek data belanja ada atau tidak 
    	$keranjang     = $this->cart->contents();
    	?>  

		<img src="<?php echo base_url() ?>assets/fashe/images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
		<span class="header-icons-noti"><?php echo count($keranjang) ?></span>

		<!-- Header shop noti -->
		<div class="header-cart header-dropdown">
			<ul class="header-cart-wrapitem">
				<?php
				//Jika tidak ada data belanjaan
            	if(empty($keranjang)) { 
            	?>
            	<li class="header-cart-item">
            		<p class="alert alert-success">Keranjang Belanja Kosong</p>
            	</li>

            	<?php
            	//Jika ada
            	}else{
            	//Total Belanja
            		$total_belanja = 'Rp. '.number_format($this->cart->total(),'0',',','.');
            	//Tampilkan data belanja
                foreach($keranjang as $keranjang) {
                	$id_produk = $keranjang['id'];
                	//Ambil data produk
                	$produknya = $this->produk_model->detail($id_produk);
            	?>

				<li class="header-cart-item">
					<div class="header-cart-item-img">
						<img src="<?php echo base_url('assets/fashe/images/upload/'.$produknya->foto_produk) ?>" alt="<?php echo $keranjang['name'] ?>">
					</div>

					<div class="header-cart-item-txt">
						<a href="<?php echo base_url('produk/detail/'.$produknya->slug_produk) ?>" class="header-cart-item-name">
							<?php echo $keranjang['name'] ?>
						</a>

						<span class="header-cart-item-info">
							<?php echo $keranjang['qty'] ?> x Rp. <?php echo number_format($keranjang['price'],'0',',','.') ?>
						</span>
					</div>
				</li>
				<?php
				}//Tutup Foreach
				}//Tutup If
				?>

			</ul>

			<div class="header-cart-total">
				Total : <?php if(!empty($keranjang)) { echo $total_belanja; } ?>
			</div>

			<div class="header-cart-buttons">
				<div class="header-cart-wrapbtn">
					<!-- Button -->
					<a href="<?php echo base_url('shop') ?>" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
						Lihat
					</a>
				</div>

				<div class="header-cart-wrapbtn">
					<!-- Button -->
					<a href="<?php echo base_url('shop/checkout') ?>" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
						Check Out
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>

<!-- Header Mobile -->
<div class="wrap_header_mobile">
<!-- Logo moblie -->
<a class="logo-mobile">
<img src="<?php echo base_url('assets/fashe/images/upload/'.$site->logo) ?>">
</a>

<!-- Button show menu -->
<div class="btn-show-menu">
<!-- Header Icon mobile -->
<div class="header-icons-mobile">

	<?php if($this->session->userdata('email')) { ?>
		<a href="<?php echo base_url('dasbor') ?>" class="header-wrapicon1 dis-block">
			<img src="<?php echo base_url() ?>assets/fashe/images/icons/icon-header-01.png" class="header-icon1" alt="ICON"> <?php echo $this->session->userdata('nama_pelanggan'); ?>&nbsp;
		</a>

	<?php } ?>

	<span class="linedivide2"></span>

	<div class="header-wrapicon2">

	<?php        
    	//cart data belanja ada atau tidak 
    	$keranjang_mobile	= $this->cart->contents();
    	$total_belanja 		= 'Rp. '.number_format($this->cart->total(),'0',',','.');
    ?>  

		<img src="<?php echo base_url() ?>assets/fashe/images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
		<span class="header-icons-noti"><?php echo count($keranjang_mobile) ?></span>

		<!-- Header shop noti -->
		<div class="header-cart header-dropdown">
			<ul class="header-cart-wrapitem">

				<?php
				//Jika tidak ada data belanjaan
            	if(empty($keranjang_mobile)) { 
            	?>
            	<li class="header-cart-item">
            		<p class="alert alert-success">Keranjang Belanja Kosong</p>
            	</li>

            	<?php
            	//Jika ada
            	}else{
            	//Total Belanja
            		$total_belanja = 'Rp. '.number_format($this->cart->total(),'0',',','.');
            	//Tampilkan data belanja
                foreach ($keranjang_mobile as $keranjang_mobile) {
                	$id_produk_mobile = $keranjang_mobile['id'];
                	//Ambil data produk
                	$produk_mobile = $this->produk_model->detail($id_produk_mobile);
            	?>

				<li class="header-cart-item">
					<div class="header-cart-item-img">
						<img src="<?php echo base_url('assets/fashe/images/upload/'.$produk_mobile->foto_produk) ?>" alt="<?php echo $keranjang_mobile['name'] ?>">
					</div>

					<div class="header-cart-item-txt">
						<a href="<?php echo base_url('produk/detail/'.$produk_mobile->slug_produk) ?>" class="header-cart-item-name">
							<?php echo $keranjang_mobile['name'] ?>
						</a>

						<span class="header-cart-item-info">
							<?php echo $keranjang_mobile['qty'] ?> x Rp. <?php echo number_format($keranjang_mobile['price'],'0',',','.') ?>
						</span>
					</div>
				</li>
			<?php 
			} //Close Foreach 
			} //Close If
			?>

			</ul>

			<div class="header-cart-total">
				Total: <?php if(!empty($keranjang_mobile)) { echo $total_belanja; } ?>
			</div>

			<div class="header-cart-buttons">
				<div class="header-cart-wrapbtn">
					<!-- Button -->
					<a href="<?php echo base_url('shop') ?>" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
						Lihat
					</a>
				</div>

				<div class="header-cart-wrapbtn">
					<!-- Button -->
					<a href="<?php echo base_url('shop/checkout') ?>" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
						Check Out
					</a>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
			<span class="hamburger-box">
				<span class="hamburger-inner"></span>
			</span>
		</div>
	</div>
</div>

<!-- Menu Mobile -->
<div class="wrap-side-menu" >
<nav class="side-menu">
<ul class="main-menu">
	<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
		<span class="topbar-child1">
			<a class="fa fa-paper-plane"> <?php echo $site->alamat ?></a>
		</span>
	</li>

	<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
		<div class="topbar-child2-mobile">
			<span class="topbar-email">
				<?php echo $site->email ?>
			</span>

			<div class="topbar-language rs1-select2">
				<select class="selection-1" name="time">
					<option><?php echo $site->telepon ?></option>
					<option><?php echo $site->email ?></option>
				</select>
			</div>
		</div>
	</li>

	<li class="item-topbar-mobile p-l-10">
		<div class="container-menu-header">
			<div class="topbar">
				<div class="topbar-social">
            	<?php echo $site->tagline ?>
				</div>
	</li>

<!-- Menu Home Mobile -->		
	<li class="item-menu-mobile">
		<a href="<?php echo base_url('home') ?>">Home</a>
	</li>
	
<!-- Menu Produk Mobile -->
	<li class="item-menu-mobile">
		<a href="<?php echo base_url('produk') ?>">Produk</a>
	</li>

<!-- Menu Hubungi Kami Mobile -->
	<li class="item-menu-mobile">
		<a href="<?php echo base_url('kontak') ?>">Hubungi Kami</a>
	</li>

<!-- Menu Akun Mobile -->
	 <li class="item-menu-mobile">
		<a href="#">Akun</a>
		<ul class="sub-menu">

		<?php if($this->session->userdata('email')) { ?>

        	<li><a href="<?php echo base_url('dasbor'); ?>">Akun Saya</a></li>
        	<li><a href="<?php echo base_url('dasbor/shop'); ?>">Order Saya</a></li>
        	<li><a href="<?php echo base_url('masuk/logout'); ?>">Logout</a></li>

		<?php }else{ ?>

        	<li><a href="<?php echo base_url('masuk'); ?>">Login</a></li>
        	<li><a href="<?php echo base_url('registrasi'); ?>">Registrasi</a></li>

    	<?php } ?>
	</ul>
	<i class="arrow-main-menu fa fa-angle-right" aria-hidden="true"></i>
</ul>
</nav>
</div>

</header>
