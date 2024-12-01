<?php

//Load konfigurasi website
$site   = $this->setting_model->listing();

?>

<!-- Title Page -->
<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(<?php echo base_url() ?>assets/fashe/images/upload/produkbanner5.jpg);">
	<h2 class="l-text2 t-center">
		Hubungi Kami
	</h2>
	<p class="m-text13 t-center">
		<?php echo $site->nama_web ?> | Kami siap melayani kendala anda
	</p>

</section>

<!-- content page -->
<section class="bgwhite p-t-66 p-b-60">
	<div class="container">
		<h1><?php echo $title ?></h1><hr>
		<div class="clearfix"></div>
		<br>

		<?php if($this->session->flashdata('sukses')) {
			echo '<div class="alert alert-warning">';
			echo $this->session->flashdata('sukses');
			echo '</div>';
			} ?>
	
		<div class="col-md-6 p-b-30">
			<?php 
			//Display error
			echo validation_errors('<div class="alert alert-warning">','</div>');

			//Form Open
			echo form_open(base_url('kontak'), 'class="leave-comment"'); ?>

					<div class="bo4 of-hidden size15 m-b-20">
						<input type="text" name="nama" class="form-control sizefull s-text7 p-l-22 p-r-22" placeholder="Nama" value="<?php echo set_value('nama') ?>" required>
					</div>

					<div class="bo4 of-hidden size15 m-b-20">
						<input type="email" name="email" class="form-control sizefull s-text7 p-l-22 p-r-22" placeholder="Email" value="<?php echo set_value('email') ?>" required>
					</div>	

					<div class="bo4 of-hidden size15 m-b-20">
						<input type="text" name="telepon" class="form-control sizefull s-text7 p-l-22 p-r-22" placeholder="Telepon" value="<?php echo set_value('telepon') ?>" required>
					</div>
						<textarea name="pesan" class="form-control sizefull s-text7 p-l-22 p-r-22" placeholder="Pesan"><?php echo set_value('pesan') ?></textarea>
					</div>

					<div class="w-size25">
						<!-- Button -->
						<button class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4">
							Kirim
						</button>
					</div>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</section>
