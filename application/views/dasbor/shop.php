<!-- Riwayat Belanja -->
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
						<tr class="bg-success">
							<th>No</th>
							<th>Kode</th>
							<th>Tanggal</th>
							<th>Jumlah Total</th>
							<th>Jumlah Item</th>
							<th>Status</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php $i=1; foreach ($pembayaran as $pembayaran) { ?>
						<tr>
							<td><?php echo $i ?></td>
							<td><?php echo $pembayaran->kode_transaksi ?></td>
							<td><?php echo date('d-m-Y',strtotime($pembayaran->tanggal_transaksi)) ?></td>
							<td><?php echo number_format($pembayaran->jumlah_transaksi, '0',',','.') ?></td>
							<td><?php echo $pembayaran->total_item ?></td>
							<td><?php echo $pembayaran->status_pembayaran ?></td>
							<td>
								<div class="btn btn-group">
									<a href="<?php echo base_url('dasbor/detail/'.$pembayaran->kode_transaksi) ?>" class="btn btn-success btn-xs"><i class="fa fa-eye"></i> Detail</a>

									<a href="<?php echo base_url('dasbor/konfirmasi/'.$pembayaran->kode_transaksi) ?>" class="btn btn-info btn-xs"><i class="fa fa-upload"></i> Konfirmasi Bayar</a>

								</div>
							</td>
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
