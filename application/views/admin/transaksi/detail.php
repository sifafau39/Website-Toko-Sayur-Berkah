<p class="pull-right">
	<div class="btn-group pull-right">
		<a href="<?php echo base_url('admin/transaksi/cetak/'.$pembayaran->kode_transaksi) ?>" target="_blank" title="Cetak" class="btn btn-success btn-sm">
			<i class="fa fa-print"></i> Cetak
		</a>
		<a href="<?php echo base_url('admin/transaksi') ?>" title="Kembali" class="btn btn-info btn-sm">
			<i class="fa fa-backward"></i> Kembali
		</a>
	</div>
</p>

<div class="clearfix"></div><hr>

<table class="table table-bordered">
<thead>
	<tr>
		<th width="20%">Nama Pelanggan</th>
		<th><?php echo $pembayaran->nama_pelanggan ?></th>
	</tr>
	<tr>
		<th width="20%">Kode Pembayaran</th>
		<th><?php echo $pembayaran->kode_transaksi ?></th>
	</tr>
</thead>
<tbody>
	<tr>				
		<td>Tanggal</td>
		<td><?php echo date('d-m-Y',strtotime($pembayaran->tanggal_transaksi)) ?></td>
	</tr>
	<tr>
		<td>Jumlah Total</td>
		<td><?php echo number_format($pembayaran->jumlah_transaksi, '0',',','.') ?></td>
	</tr>
	<tr>
		<td>Status Pembayaran</td>
		<td><?php echo $pembayaran->status_pembayaran ?></td>
	</tr>	
	<tr>
		<td>Bukti Pembayaran</td>
		<td><?php if($pembayaran->bukti_pembayaran =="") { echo 'Belum ada bukti pembayaran'; }else{ 
		?>
			<img src="<?php echo base_url('assets/fashe/images/upload/'.$pembayaran->bukti_pembayaran) ?>" class="img img-thumbnail" width="200">
		<?php } ?>
		</td>
	</tr>
	<tr>
		<td>Tanggal Pembayaran</td>
		<td><?php echo date('d-m-Y', strtotime($pembayaran->tanggal_pembayaran)) ?></td>
	</tr>
	<tr>
		<td>Jumlah Pembayaran</td>
		<td><?php echo number_format($pembayaran->jumlah_pembayaran, '0',',','.') ?></td>
	</tr>
	<tr>
		<td>Pembayaran dari</td>
		<td><?php echo $pembayaran->nama_bank ?> (<?php echo $pembayaran->rekening_pembayaran ?> a.n <?php echo $pembayaran->rekening_pelanggan ?>)
		</td>
	</tr>
	<tr>
		<td>Pembayaran ke</td>
		<td><?php echo $pembayaran->bank ?> (<?php echo $pembayaran->nomor_rekening ?> a.n <?php echo $pembayaran->nama_pemilik ?>)
		</td>
	</tr>
	<tr>
		<td>Status Pembayaran</td>
		<td><?php echo $pembayaran->status_pembayaran ?></td>
	</tr>	
</tbody>
</table>

<hr>

<table class="table table-bordered" width="100%">
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