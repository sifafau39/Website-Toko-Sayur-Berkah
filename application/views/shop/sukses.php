<!-- Cart -->
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

		<p class="alert alert-success">
		Terimakasih telah berbelanja. Segera konfirmasi pembayaran agar pesanan dapat kami proses.</p>

</div>
</section>
