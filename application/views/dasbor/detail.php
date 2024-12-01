<!-- Detail Riwayat Belanja -->
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
					<p> Berikut adalah riwayat belanja anda</p>

				<?php 
				//Jika ada transaksi, tampilkan tabel riwayat belanja
				if($pembayaran) { 
				?>

				<table class="table table-bordered">
					<thead>
						<tr>
							<th width="20%">Kode Transaksi</th>
							<th><?php echo $pembayaran->kode_transaksi ?></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Jumlah Total</td>
							<td><?php echo number_format($pembayaran->jumlah_transaksi, '0',',','.') ?></td>
						</tr>
						<tr>
							<td>Status Pembayaran</td>
							<td><?php echo $pembayaran->status_pembayaran ?></td>
						</tr>
						<tr>				
							<td>Tanggal</td>
							<td><?php echo date('d-m-Y',strtotime($pembayaran->tanggal_transaksi)) ?></td>
						</tr>
					</tbody>
				</table>

				<table class="table table-bordered">
					<thead>
						<tr class="bg-success">
							<th>No</th>
							<th>Kode</th>
							<th>Nama Produk</th>
							<th>Jumlah</th>
							<th>Harga</th>
							<th>Sub Total</th>
						</tr>
					</thead>
					<tbody>
						<?php $i=1; foreach ($transaksi as $transaksi) { ?>
						<tr>
							<td><?php echo $i ?></td>
							<td><?php echo $transaksi->kode_produk ?></td>
							<td><?php echo $transaksi->nama_produk ?></td>
							<td><?php echo number_format($transaksi->jumlah) ?></td>
							<td><?php echo number_format($transaksi->harga, '0',',','.') ?></td>
							<td><?php echo number_format($transaksi->total_harga, '0',',','.') ?></td>
						</tr>
						<?php $i++; } ?>
					</tbody>
				</table>

				<?php 
				//Jika belum ada, tampilkan notifikasi
				}else{ ?>

					<p class="alert alert-success">
						<i class="fa fa-warning"></i> Belum ada data riwayat belanja</p>
					</p>

				<?php } ?>

		</div>
	</div>
</div>
</section>