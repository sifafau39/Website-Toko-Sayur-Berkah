<!-- Login Pelanggan -->
<section class="bgwhite p-t-70 p-b-100">
<div class="container">

	<h1><?php echo $title ?></h1><hr>
	<div class="clearfix"></div>
	<br>

	<div class="col-md-12">
		<?php
	    //Notifikasi error
	    echo validation_errors('<div class="alert alert-sucess">','</div>');

	    //Notifikasi gagal login
	    if($this->session->flashdata('warning')) {
	      echo '<div class="alert alert-warning">';
	      echo $this->session->flashdata('warning');
	      echo '</div>';
	    }

	    //Notifikasi Logout
	     if($this->session->flashdata('sukses')) {
	      echo '<div class="alert alert-success">';
	      echo $this->session->flashdata('sukses');
	      echo '</div>';
	    }

	    //Form open login
	    echo form_open(base_url('masuk'));
	    ?>

		<table class="table">
			<tbody>
				<tr>
					<td>Email (Username)</td>
					<td><input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo set_value('email') ?>" required></td>
				</tr>
				<tr>
					<td>Password</td>
					<td><input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo set_value('password') ?>" required></td>
				</tr>

				<tr>
					<td></td>
					<td>
						<button class="btn btn-success btn-lg" type="submit">
							<i class="fa fa-save"></i> Login
						</button>
						<button class="btn btn-default btn-lg" type="reset">
							<i class="fa fa-times"></i> Reset
						</button>
					</td>
				</tr>
			</tbody>
		</table>

		<?php echo form_close(); ?>
	</div>

</div>
</section>
