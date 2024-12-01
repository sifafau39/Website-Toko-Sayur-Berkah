<table class="table table-bordered">
<thead>
	<tr class="bg-success">
		<th>No</th>
		<th>Nama</th>
		<th>Email</th>
		<th>Telepon</th>
		<th>Tanggal Pesan</th>
		<th>Pesan</th>
		<th></th>
	</tr>
</thead>
<tbody>
	<?php $i=1; foreach($kontak as $kontak) { ?>
	<tr>
		<td><?php echo $i ?></td>
		<td><?php echo $kontak->nama ?></td>
		<td><?php echo $kontak->email ?></td>
		<td><?php echo $kontak->telepon ?></td>
		<td><?php echo date('d-m-Y',strtotime($kontak->tanggal_pesan)) ?></td>
		<td><?php echo $kontak->pesan ?></td>
		<td>
			<a href="<?php echo base_url('admin/kontak/delete/'.$kontak->id_kontak) ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin ingin menghapus pesan ini?')"><i class="fa fa-trash-o"></i> Hapus</a>  				
		</td>
	</tr>
	<?php $i++; } ?>
</tbody>
</table>