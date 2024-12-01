<?php
//Membuat notifikasi
if($this->session->flashdata('sukses')) {
  echo '<p class="alert alert-success">';
  echo $this->session->flashdata('sukses');
  echo '</div>';
}
?>

<?php

//error upload
if(isset($error)) {
  echo '<p class="alert alert-warning">';
  echo $error;
  echo '</p>';
}
//Notifikasi error
echo validation_errors('<div class="alert alert-warning">', '<div>');

//Form open
echo form_open_multipart(base_url('admin/setting'),' class="form-horizontal"');
?>

<div class="form-group form-group-lg">
  <label  class="col-md-3 control-label">Nama Website</label>
  <div class="col-md-8">
    <input type="text" name="nama_web" class="form-control" placeholder="Nama Website" value="<?php echo $setting->nama_web ?>" required>
  </div>
</div>

<div class="form-group form-group-lg">
  <label  class="col-md-3 control-label">Tagline</label>
  <div class="col-md-8">
    <input type="text" name="tagline" class="form-control" placeholder="Tagline" value="<?php echo $setting->tagline ?>" required>
  </div>
</div>

<div class="form-group form-group-lg">
  <label  class="col-md-3 control-label">Email</label>
  <div class="col-md-8">
    <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $setting->email ?>" required>
  </div>
</div>

<div class="form-group form-group-lg">
  <label  class="col-md-3 control-label">Website</label>
  <div class="col-md-8">
    <input type="text" name="website" class="form-control" placeholder="Website" value="<?php echo $setting->website ?>" required>
  </div>
</div>

<div class="form-group form-group-lg">
  <label  class="col-md-3 control-label">Telepon</label>
  <div class="col-md-8">
    <input type="text" name="telepon" class="form-control" placeholder="Telepon" value="<?php echo $setting->telepon ?>" required>
  </div>
</div>

<div class="form-group form-group-lg">
  <label  class="col-md-3 control-label">Alamat</label>
  <div class="col-md-8">
    <textarea name="alamat" class="form-control" placeholder="Alamat"><?php echo $setting->alamat ?></textarea>
  </div>
</div>

<div class="form-group">
  <label  class="col-md-3 control-label"></label>
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