<!-- Registrasi Sukses -->
<section class="bgwhite p-t-70 p-b-100">
<div class="container">

	<h1><?php echo $title ?></h1><hr>
	<div class="clearfix"></div>
	<br>

	<?php if($this->session->flashdata('sukses')) {
		echo '<div class="alert alert-warning">';
		echo $this->session->flashdata('sukses');
		echo '</div>';
		} ?>

	<p class="alert alert-success">Registrasi Telah Dilakukan  
		<br> Sekarang anda bisa melakukan Checkout <a href="<?php echo base_url('shop/checkout') ?>" class="btn btn-warning btn-sm"><i class="fa fa-shopping-cart"></i> Checkout </a></p>

</div>
</section>
