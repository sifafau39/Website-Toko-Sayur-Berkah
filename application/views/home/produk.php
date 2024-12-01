<!-- New Product -->
<section class="newproduct bgwhite p-t-45 p-b-105">
<div class="container">
<div class="sec-title p-b-60">
<h3 class="m-text5 t-center">
	Produk Terbaru
</h3>
</div>

<!-- Slide2 -->
<div class="wrap-slick2">
<div class="slick2">

<?php foreach($produk as $produk) { ?>
	<div class="item-slick2 p-l-15 p-r-15">

<?php 
//Form untuk memproses belanjaan
echo form_open(base_url('shop/add')); 
//Elemen yang dibawa
echo form_hidden('id', $produk->id_produk);
echo form_hidden('qty', 1);
echo form_hidden('price', $produk->harga_produk);
echo form_hidden('name', $produk->nama_produk);
//Elemen redirect
echo form_hidden('redirect_page', str_replace('index.php/','',current_url()));
?>

		<!-- Block2 -->
		<div class="block2">
			<div class="block2-img wrap-pic-w of-hidden pos-relative block2">
				<img src="<?php echo base_url('assets/fashe/images/upload/'.$produk->foto_produk) ?>" alt="<?php echo $produk->nama_produk ?>">

				<div class="block2-overlay trans-0-4">

					<div class="block2-btn-addcart w-size1 trans-0-4">

						<!-- Button Belanja -->
						<button type="submit" value="submit" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
							Tambah Keranjang
						</button>
					</div>
				</div>
			</div>

			<div class="block2-txt p-t-20">
				<a href="<?php echo base_url('produk/detail/'.$produk->slug_produk) ?>" class="block2-name dis-block s-text3 p-b-5">
					<?php echo $produk->nama_produk ?>
				</a>

				<span class="block2-price m-text6 p-r-5">
					Rp. <?php echo number_format($produk->harga_produk, '0',',','.') ?><small> <?php echo $produk->keterangan_harga ?></small>
				</span>
			</div>
		</div>
<?php
//Close form
echo form_close();
?>

</div>

<?php } ?>

</div>
</div>

</div>
</section>