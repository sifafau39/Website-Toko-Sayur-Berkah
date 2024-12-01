<table class="table table-bordered">
<thead>
	<tr class="bg-success">
		<th>No</th>
		<th>Pelanggan</th>
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
		<td><?php echo $pembayaran->nama_pelanggan ?>
			<br><small>
				Telepon : <?php echo $pembayaran->telepon ?>
				<br>Email : <?php echo $pembayaran->email ?>
				<br>Alamat Pengiriman : <br><?php echo $pembayaran->alamat ?>
		</td>
		<td><?php echo $pembayaran->kode_transaksi ?></td>
		<td><?php echo date('d-m-Y',strtotime($pembayaran->tanggal_transaksi)) ?></td>
		<td><?php echo number_format($pembayaran->jumlah_transaksi, '0',',','.') ?></td>
		<td><?php echo $pembayaran->total_item ?></td>
		<td><?php echo $pembayaran->status_pembayaran ?></td>
		<td>
			<div class="btn btn-group">
				<a href="<?php echo base_url('admin/transaksi/detail/'.$pembayaran->kode_transaksi) ?>" class="btn btn-success btn-xs"><i class="fa fa-eye"></i> Detail</a>
				<a href="<?php echo base_url('admin/transaksi/cetak/'.$pembayaran->kode_transaksi) ?>" target="_blank" class="btn btn-info btn-xs"><i class="fa fa-print"></i> Cetak</a>
			</div>

			<br>
		</td>
	</tr>
	<?php $i++; } ?>
</tbody>
</table>