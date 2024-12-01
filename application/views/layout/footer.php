<?php

//Load konfigurasi website
$site   = $this->setting_model->listing();

?>

<!-- Footer -->
<footer class="bg5 p-t-45 p-b-43 p-l-45 p-r-45">
<div class="flex-w p-b-90">

	<div class="ftco-footer-widget w-size8 p-t-30 p-l-15 p-r-15">
		<h4 class="s-text12 p-b-30">
			<?php echo $site->nama_web ?>
		</h4>

		<div>
			<li class="p-b-9">
				<a><?php echo $site->tagline ?>
				</a>
			</li>
		</div>
	</div>

	<div class="ftco-footer-widget w-size12 p-t-30 p-l-15 p-r-15"> 
		<h4 class="s-text12 p-b-30">
			Menu
		</h4>
		<ul>
			<li class="p-b-9">
				<a href="<?php echo base_url('kontak') ?>">
				Hubungi Kami
				</a>
			</li>
		</ul>
	</div>

	<div class="w-size15 p-t-30 p-l-15 p-r-15">
		<h4 class="s-text12 p-b-30">
			Bantuan
		</h4>

		<ul>
			<li class="p-b-9">
				<a href="<?php echo base_url('shop') ?>">
					Keranjang Belanja
				</a>
			</li>

			<li class="p-b-9">
				<a href="<?php echo base_url('shop/checkout') ?>">
					Pesanan
				</a>
			</li>
		</ul>
	</div>

	<div class="ftco-footer-widget w-size10 p-t-30 p-l-20 p-r-20">
		<h4 class="s-text12 p-b-30">
			Punya Pertanyaan?
		</h4>

		<ul>
			<li class="p-b-9">
				<a class="fa fa-phone-square">
					<?php echo $site->telepon ?>
				</a>
			</li>

			<li class="p-b-9">
				<a class="fa fa-envelope-o">
					<?php echo $site->email ?>
				</a>
			</li>

			<li class="p-b-9">
				<a class="fa fa-map-marker">
					<?php echo $site->alamat ?>
				</a>
			</li>
		</ul>
	</div>

	</div>
</div>

<div class="t-center p-l-15 p-r-15">

	<div class="t-center s-text8 p-t-20">
		Copyright © 2022 All rights reserved. |  by <a href="http://tokosayurberkah.epizy.com/" target="_blank">Toko Sayur Berkah</a>
	</div>
</div>
</footer>

<!-- Back to top -->
<div class="btn-back-to-top bg0-hov" id="myBtn">
	<span class="symbol-btn-back-to-top">
		<i class="fa fa-angle-double-up" aria-hidden="true"></i>
	</span>
</div>

<!-- Container Selection1 -->
<div id="dropDownSelect1"></div>



<!--===============================================================================================-->
<script type="text/javascript" src="<?php echo base_url();?>assets/fashe/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="<?php echo base_url();?>assets/fashe/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="<?php echo base_url();?>assets/fashe/vendor/bootstrap/js/popper.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/fashe/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="<?php echo base_url();?>assets/fashe/vendor/select2/select2.min.js"></script>
<script type="text/javascript">
	$(".selection-1").select2({
		minimumResultsForSearch: 20,
		dropdownParent: $('#dropDownSelect1')
	});
</script>
<!--===============================================================================================-->
<script type="text/javascript" src="<?php echo base_url();?>assets/fashe/vendor/slick/slick.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/fashe/js/slick-custom.js"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="<?php echo base_url();?>assets/fashe/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="<?php echo base_url();?>assets/fashe/vendor/lightbox2/js/lightbox.min.js"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="<?php echo base_url();?>assets/fashe/vendor/sweetalert/sweetalert.min.js"></script>
<script type="text/javascript">
	$('.block2-btn-addcart').each(function(){
		var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
		$(this).on('click', function(){
			swal(nameProduct, "is added to cart !", "success");
		});
	});

	$('.block2-btn-addwishlist').each(function(){
		var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
		$(this).on('click', function(){
			swal(nameProduct, "is added to wishlist !", "success");
		});
	});
</script>

<!--===============================================================================================-->
<script src="<?php echo base_url();?>assets/fashe/js/main.js"></script>

</body>
</html>