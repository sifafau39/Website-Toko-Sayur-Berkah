<?php
//Notifikasi error
echo validation_errors('<div class="alert alert-warning">', '<div>');

//Form open
echo form_open(base_url('admin/user/edit/' .$user->id_user),' class="form-horizontal"');
?>

<div class="form-group form-group-lg">
  <label  class="col-sm-2 control-label">Nama Pengguna</label>
  <div class="col-md-5">
    <input type="text" name="nama" class="form-control" placeholder="Nama Pengguna" value="<?php echo $user->nama ?>" required>
  </div>
</div>

<div class="form-group form-group-lg">
  <label  class="col-sm-2 control-label">Email</label>
  <div class="col-md-5">
    <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $user->email ?>" required>
  </div>
</div>

<div class="form-group form-group-lg">
  <label  class="col-sm-2 control-label">Username</label>
  <div class="col-md-5">
    <input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo $user->username ?>" readonlye>
  </div>
</div>

<div class="form-group">
  <label  class="col-sm-2 control-label">Password</label>
  <div class="col-md-5">
    <input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo $user->password ?>" required>
  </div>
</div>

<div class="form-group">
  <label  class="col-sm-2 control-label">Role</label>
  <div class="col-md-5">
    <select name="role" class="form-control">
      <option value="admin">Admin</option>
      <option value="user" <?php if($user->role=="user") {echo "selected"; } ?>></option>
    </select>
  </div>
</div>

<div class="form-group">
  <label  class="col-sm-2 control-label"></label>
  <div class="col-md-5">
    <button class="btn btn-success btn-lg" name="submit" type="submit">
    	<i class="fa fa-save"></i> Simpan
    </button>
    <button class="btn btn-info btn-lg" name="reset" type="reset">
    	<i class="fa fa-times"></i> Reset
    </button>
  </div>
</div>


<?php echo form_close(); ?>