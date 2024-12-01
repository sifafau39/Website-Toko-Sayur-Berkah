<!-- Pesan Sukses -->
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

	<p class="alert alert-success"> Kami akan segera membalas pesan anda melalui Email <a href="<?php echo base_url('kontak') ?>"></a></p>

</div>
</section>
