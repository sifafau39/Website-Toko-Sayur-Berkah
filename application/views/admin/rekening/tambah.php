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
echo form_open_multipart(base_url('admin/rekening/tambah/'),' class="form-horizontal"');
?>

<div class="form-group form-group-lg">
  <label  class="col-sm-4 control-label">Nama Bank/E-wallet</label>
  <div class="col-md-5">
    <input type="text" name="nama_bank" class="form-control" placeholder="Nama Bank/E-wallet" value="<?php echo set_value('nama_bank') ?>" required>
  </div>
</div>

<div class="form-group form-group-lg">
  <label  class="col-sm-4 control-label">Nomor Rekening/E-wallet</label>
  <div class="col-md-5">
    <input type="number" name="nomor_rekening" class="form-control" placeholder="Nomor Rekening/E-wallet" value="<?php echo set_value('nomer_rekening') ?>" required>
  </div>
</div>

<div class="form-group form-group-lg">
  <label  class="col-sm-4 control-label">Nama Pemilik Rekening/E-wallet</label>
  <div class="col-md-5">
    <input type="text" name="nama_pemilik" class="form-control" placeholder="Nama Pemilik Rekening/E-wallet" value="<?php echo set_value('nama_pemilik') ?>" required>
  </div>
</div>

<div class="form-group">
  <label  class="col-sm-4 control-label"></label>
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