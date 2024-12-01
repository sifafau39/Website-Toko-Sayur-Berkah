<?php
//Membuat notifikasi
if($this->session->flashdata('sukses')) {
  echo '<p class="alert alert-success">';
  echo $this->session->flashdata('sukses');
  echo '</div>';
} ?>

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
echo form_open_multipart(base_url('admin/setting/logo'),' class="form-horizontal"');
?>

<div class="form-group form-group-lg">
  <label  class="col-md-3 control-label">Nama Website</label>
  <div class="col-md-8">
    <input type="text" name="nama_web" class="form-control" placeholder="Nama Website" value="<?php echo $setting->nama_web ?>" required>
  </div>
</div>

<div class="form-group form-group-lg">
  <label  class="col-md-3 control-label">Upload Logo Baru</label>
  <div class="col-md-8">
    <input type="file" name="logo" class="form-control" placeholder="Upload Logo Baru" value="<?php echo $setting->logo ?>" required>
    Logo Lama : <br>
    <img src="<?php echo base_url('assets/fashe/images/upload/'.$setting->logo) ?>" class="img img-responsive img-thumbnail" width="200">
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
