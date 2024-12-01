<!-- Sukses Konfirmasi Pembayaran -->
<section class="bgwhite p-t-55 p-b-65">
<div class="container">
<div class="row">
	<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
		<div class="leftbar p-r-20 p-r-0-sm">
			<?php include('menu.php') ?>
		</div>
	</div>

	<div class="col-sm-6 col-md-9 col-lg-9 p-b-50">

				<h2><?php echo $title ?></h2>
				<hr>

	<?php if($this->session->flashdata('sukses')) {
		echo '<div class="alert alert-warning">';
		echo $this->session->flashdata('sukses');
		echo '</div>';
		} ?>

		<p class="alert alert-success">
		Terimakasih, telah melakukan pembayaran.<br><br>

		Untuk proses pengiriman pesanan akan kami infokan melalui Email.
		</p>

</div>
</section>