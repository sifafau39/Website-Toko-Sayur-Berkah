<!-- Konfirmasi Pembayaran -->
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
					<tbody>
						<tr>
							<td width="20%">Kode Transaksi</td>
							<td>
								<?php echo $pembayaran->kode_transaksi ?>
							</td>
						</tr>
						<tr>
							<td>Tanggal</td>
							<td>
								<?php echo date('d-m-Y',strtotime($pembayaran->tanggal_transaksi)) ?>
							</td>
						</tr>
						<tr>
							<td>Jumlah Total</td>
							<td>
								<?php echo number_format($pembayaran->jumlah_transaksi, '0',',','.') ?>
							</td>
						</tr>
						<tr>
							<td>Status Pembayaran</td>
							<td>
								<?php echo $pembayaran->status_pembayaran ?>
							</td>
						</tr>
						<tr>
							<td>Bukti Pembayaran</td>
							<td>
								<?php if($pembayaran->bukti_pembayaran !="") { ?>
									<img src="<?php echo base_url('assets/fashe/images/upload/'.$pembayaran->bukti_pembayaran) ?>" class="img img-thumbnail" width="200">
								<?php }else{ echo 'Belum ada bukti pembayaran'; } ?>
							</td>
						</tr>
					</tbody>
				</table>

				<?php 
				//Error upload
				if(isset($error)) {
					echo '<p class="alert alert-warning">'.$error.'</p>';
				}

				//Notifikasi erro
				echo validation_errors('<p class="alert alert-warning">','</p>');

				//Form open
				echo form_open_multipart(base_url('dasbor/konfirmasi/'.$pembayaran->kode_transaksi));

				?>

				<table class="table">
						<tr>
							<td>Pembayaran ke</td>
							<td>
								<select name="id_rekening" class="form-control">
									<?php foreach ($rekening as $rekening) { ?>
									<option value="<?php echo $rekening->id_rekening ?>" <?php if($pembayaran->id_rekening==$rekening->id_rekening) { echo "selected"; } ?>>
										<?php echo $rekening->nama_bank ?> ( 
										<?php echo $rekening->nomor_rekening ?> a.n 
										<?php echo $rekening->nama_pemilik ?>)
									</option>
									<?php } ?>
								</select>
							</td>
						</tr>
					<tbody>
						<tr>
							<td>Tanggal Pembayaran</td>
							<td><input type="text" name="tanggal_pembayaran" class="form-control-lg" placeholder="dd-mm-yy" value="<?php if(isset($_POST['tanggal_pembayaran'])) { echo set_value('tanggal_pembayaran'); }elseif($pembayaran->tanggal_pembayaran!="") { echo $pembayaran->tanggal_pembayaran; }else{ echo date('d-m-Y'); } ?>">
							</td>
						</tr>
						<tr>
							<td>Jumlah Pembayaran</td>
							<td><input type="text" name="jumlah_pembayaran" class="form-control-lg" placeholder="Jumlah Pembayaran" value="<?php if(isset($_POST['jumlah_pembayaran'])) { echo set_value('jumlah_pembayaran'); }else{ echo number_format($pembayaran->jumlah_transaksi, '0',',','.'); } ?>">
							</td>
						</tr>
						<tr>
							<td>Nama Bank/E-wallet</td>
							<td>
								<input type="text" name="nama_bank" class="form-control-lg" placeholder="Nama Bank/E-wallet" value="<?php echo $pembayaran->nama_bank ?>">
								<small>Misal: BANK BCA atau GOPAY</small>
							</td>
						</tr>
						<tr>
							<td>Nomor Rekening/E-wallet</td>
							<td>
								<input type="text" name="rekening_pembayaran" class="form-control-lg" placeholder="Nomor Rekening/E-wallet" value="<?php echo $pembayaran->rekening_pembayaran ?>">
							</td>
						</tr>
						<tr>
							<td>Nama Pemilik Rekening/E-wallet</td>
							<td>
								<input type="text" name="rekening_pelanggan" class="form-control-lg" placeholder="Nama Pemilik Rekening/E-wallet" value="<?php echo $pembayaran->rekening_pelanggan ?>">
							</td>
						</tr>
						<tr>
							<td>Upload Bukti Pembayaran</td>
							<td>
								<input type="file" name="bukti_pembayaran" class="form-control" placeholder="Upload Bukti Pembayaran">
							</td>
						</tr>
						<tr>
							<td></td>
							<td>
								<div class="btn-group">
									<button class="btn btn-success btn-lg" type="submit" name="submit"><i class="fa fa-upload"></i> Submit
									</button>
									<button class="btn btn-info btn-lg" type="reset" name="reset"><i class="fa fa-times"></i> Reset 
									</button>
								</div>
							</td>
						</tr>
					</tbody>
				</table>

				<?php
				//Form close
				echo form_close();

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
