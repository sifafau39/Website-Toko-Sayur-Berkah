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
echo form_open_multipart(base_url('admin/produk/edit/'.$produk->id_produk),' class="form-horizontal"');
?>

<div class="form-group form-group-lg">
  <label  class="col-sm-2 control-label">Nama Produk</label>
  <div class="col-md-5">
    <input type="text" name="nama_produk" class="form-control" placeholder="Nama Produk" value="<?php echo $produk->nama_produk ?>" required>
  </div>
</div>

<div class="form-group form-group-lg">
  <label  class="col-sm-2 control-label">Kode Produk</label>
  <div class="col-md-5">
    <input type="text" name="kode_produk" class="form-control" placeholder="Kode Produk" value="<?php echo $produk->kode_produk ?>" required>
  </div>
</div>

<div class="form-group form-group-lg">
  <label  class="col-sm-2 control-label">Harga Produk</label>
  <div class="col-md-5">
    <input type="number" name="harga_produk" class="form-control" placeholder="Harga Produk" value="<?php echo $produk->harga_produk ?>" required>
  </div>
</div>

<div class="form-group form-group-lg">
  <label  class="col-sm-2 control-label">Keterangan Harga</label>
  <div class="col-md-5">
    <input type="text" name="keterangan_harga" class="form-control" placeholder="Keterangan Harga" value="<?php echo set_value('keterangan_harga') ?>" required>
  </div>
</div>

<div class="form-group form-group-lg">
  <label  class="col-sm-2 control-label">Stok Produk</label>
  <div class="col-md-5">
    <input type="text" name="stok_produk" class="form-control" placeholder="Stok Produk" value="<?php echo $produk->stok_produk ?>" required>
  </div>
</div>

<div class="form-group form-group-lg">
  <label  class="col-sm-2 control-label">Keterangan Produk</label>
  <div class="col-md-10">
    <input type="text" name="keterangan_produk" class="form-control" placeholder="Keterangan Produk" value="<?php echo $produk->keterangan_produk ?>" required>
  </div>
</div>

<div class="form-group">
  <label  class="col-sm-2 control-label">Foto Produk</label>
  <div class="col-md-5">
    <input type="file" name="foto_produk" class="form-control">
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