<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $title ?></title>
	<style type="text/css" media="print">
		body {
			font-family: Arial;
			font-size: 12px;
		}
		.cetak {
			width: 19cm;
			height: 27cm;
			padding: 1cm;
		}
		table {
			border: solid thin #000;
			border-collapse: collapse;
		}
		td, th {
			padding: 3mm 6mm;
			text-align: left;
			vertical-align: top;
		}
		th {
			background-color: #F5F5F5;
			font-weight: bold;
		}
		h1 {
			text-align: center;
			font-size: 18px;
			text-transform: uppercase;
		}
	</style>

	<style type="text/css" media="screen">
		body {
			font-family: Arial;
			font-size: 12px;
		}
		.cetak {
			width: 19cm;
			height: 27cm;
			padding: 1cm;
		}
		table {
			border: solid thin #000;
			border-collapse: collapse;
		}
		td, th {
			padding: 3mm 6mm;
			text-align: left;
			vertical-align: top;
		}
		th {
			background-color: #F5F5F5;
			font-weight: bold;
		}
		h1 {
			text-align: center;
			font-size: 18px;
			text-transform: uppercase;
		}
	</style>

</head>
<body onload="print()">
	<div class="cetak">
		<h1>Detail Transaksi <?php echo $site->nama_web ?></h1>

		<table class="table table-bordered">
		<thead>
			<tr>
				<th width="20%">Nama Pelanggan</th>
				<th><?php echo $pembayaran->nama_pelanggan ?></th>
			</tr>
			<tr>
				<th width="20%">Kode Transaksi</th>
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

	</div>
</body>
</html>