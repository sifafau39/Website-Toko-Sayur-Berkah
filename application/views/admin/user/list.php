<p>
	<a href="<?php echo base_url('admin/user/tambah') ?>" class="btn btn-success btn-lg">
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
			<th>Nama</th>
			<th>Email</th>
			<th>Username</th>
			<th>Role</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php $i=1; foreach($user as $user) { ?>
			<tr>
				<td><?php echo $i ?></td>
				<td><?php echo $user->nama ?></td>
				<td><?php echo $user->email ?></td>
				<td><?php echo $user->username ?></td>
				<td><?php echo $user->role ?></td>
				<td>
					<a href="<?php echo base_url('admin/user/edit/'.$user->id_user) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit</a> 

					<a href="<?php echo base_url('admin/user/delete/'.$user->id_user) ?>" class="btn btn-danger btn-xs" onclick="return confirm('Apakah anda yakin ingin menghapusnya?')"><i class="fa fa-trash-o"></i> Hapus</a> 
					
				</td>
			</tr>
			<?php $i++; } ?>
	</tbody>
</table>	
