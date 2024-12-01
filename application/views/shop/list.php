<!-- Cart -->
<section class="cart bgwhite p-t-70 p-b-100">
<div class="container">

	<h1><?php echo $title ?></h1><hr>
	<div class="clearfix"></div>
	<br>

	<?php if($this->session->flashdata('sukses')) {
		echo '<div class="alert alert-warning">';
		echo $this->session->flashdata('sukses');
		echo '</div>';
		} ?>

	<table class="table-shopping-cart">
		<tr class="table-head">
			<th class="column-1">Gambar</th>
			<th class="column-2">Produk</th>
			<th class="column-2">Harga</th>
			<th class="column-4 p-l-70">Jumlah</th>
			<th class="column-4">Sub Total</th>
			<th class="column-6" width="20%"></th>
		</tr>

		<?php 		
		//Looping data keranjang belanja
		foreach ($keranjang as $keranjang) { 
			//Ambil data produk
			$id_produk 	= $keranjang['id'];
			$produk 	= $this->produk_model->detail($id_produk);

			//Form update
			echo form_open(base_url('shop/update_cart/'.$keranjang['rowid']));
		?>

		<tr class="table-row">
			<td class="column-1">
				<div class="cart-img-product b-rad-4 o-f-hidden">
					<img src="<?php echo base_url('assets/fashe/images/upload/'.$produk->foto_produk) ?>" alt="<?php echo $keranjang['name'] ?>">
				</div>
			</td>
			<td class="column-2"><?php echo $keranjang['name'] ?></td>
			<td class="column-3">Rp. <?php echo number_format($keranjang['price'],'0',',','.') ?></td>
			<td class="column-4">
				<div class="flex-w bo5 of-hidden w-size17">
					<button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
						<i class="fs-12 fa fa-minus" aria-hidden="true"></i>
					</button>

					<input class="size8 m-text18 t-center num-product" type="number" name="qty" value="<?php echo $keranjang['qty'] ?>">

					<button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
						<i class="fs-12 fa fa-plus" aria-hidden="true"></i>
					</button>
				</div>
			</td>
			<td class="column-5">Rp. 
			<?php
				$sub_total = $keranjang['price'] * $keranjang['qty'];
				echo number_format($sub_total,'0',',','.');
			?>
			</td>
			<td>
				<button type="submit" name="update" class="btn btn-success btn-sm">
					<i class="fa fa-edit"></i>Update
				</button>

				<a href="<?php echo base_url('shop/delete/'.$keranjang['rowid']) ?>" name="hapus" class="btn btn-warning btn-sm">
					<i class="fa fa-trash-o"></i>Hapus
				</a>
			</td>
		</tr>

		<?php 
		//Form close
		echo form_close();		
		}//End Looping
		?>

		<tr class="bold table-row bg-success text-strong" style="font-weight: bold;">
			
		</style>
			<td colspan="4" class="column-1">Total Belanja</td>
			<td colspan="2" class="column-2">Rp. <?php echo number_format($this->cart->total(),'0',',','.') ?></td>
		</tr>

	</table><br>

	<p class="pull-right">
		<a href="<?php echo base_url('shop/delete') ?>" class="btn btn-danger btn-lg">
			<i class="fa fa-trash-o"></i>Bersihkan Keranjang Belanja
		</a>

		<a href="<?php echo base_url('shop/checkout') ?>" class="btn btn-success btn-lg">
			<i class="fa fa-shopping-cart"></i>Checkout
		</a>
	</p>

<!-- Total -->
<div class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm">
<h5 class="m-text20 p-b-24">
	Total Keranjang Belanja
</h5>

<!--Button-->
<div class="flex-w flex-sb-m p-b-12">
	<span class="s-text18 w-size19 w-full-sm">
		Subtotal: 
	</span>

	<span class="m-text21 w-size20 w-full-sm">
		Rp. <?php echo number_format($this->cart->total(),'0',',','.') ?>
	</span>

</div>
</section>
