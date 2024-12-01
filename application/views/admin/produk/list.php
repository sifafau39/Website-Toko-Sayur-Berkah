<p>
	<a href="<?php echo base_url('admin/produk/tambah') ?>" class="btn btn-success btn-lg">
		<i class="fa fa-plus"></i> Tambah Baru
	</a>
</p>

<?php
//Membuat notifikasi
if($this->session->flashdata('sukses')) {
	echo '<p class="alert alert-success">';
	echo $this->session->flashdata('sukses');
	echo '</div>';
}
?>

<table class="table table-bordered" id="example1">
	<thead>
		<tr>
			<th>NO</th>
			<th>Gambar</th>
			<th>Nama Produk</th>
			<th>Harga Produk</th>
			<th>Keterangan Harga</th>
			<th>Stok Produk</th>
			<th>Keterangan Produk</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; foreach($produk as $produk) { ?>
			<tr>
				<td><?php echo $no ?></td>
				<td>
					<img src="<?php echo base_url('assets/fashe/images/upload/'.$produk->foto_produk) ?>" class="img-img-responsive img-thumbnail" width="60">
				</td>
				<td><?php echo $produk->nama_produk ?></td>
				<td><?php echo number_format($produk->harga_produk, '0',',','.') ?></td>
				<td><?php echo $produk->keterangan_harga ?></td>
				<td><?php echo $produk->stok_produk ?></td>
				<td><?php echo $produk->keterangan_produk ?></td>
				<td>
					<a href="<?php echo base_url('admin/produk/edit/'.$produk->id_produk) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit</a>  
					
					<?php include('delete.php') ?>
				</td>
			</tr>
			<?php $no++; } ?>
	</tbody>
</table>	