<!-- Info boxes -->
  <div class="row">
  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-aqua"><i class="fa fa-book"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Total Data Produk</span>
        <span class="info-box-number"><?php echo $this->dasbor_model->total_produk()->total; ?><small> Produk</small></span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-red"><i class="fa fa-users"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Pelanggan</span>
        <span class="info-box-number"><?php echo $this->dasbor_model->total_pelanggan()->total; ?><small> Orang</small></span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>

  <!-- /.col -->
  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-yellow"><i class="fa fa-shopping-cart"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Transaksi</span>
        <span class="info-box-number"><?php echo $this->dasbor_model->total_transaksi()->total; ?><small> Transaksi</small></span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>

   <!-- /.col -->
  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-green"><i class="fa fa-money"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Nilai Transaksi</span>
        <span class="info-box-number">Rp <?php echo number_format($this->dasbor_model->total_nilai_transaksi()->total, '0',',','.') ?><br><small> Semua Transaksi</small></span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
</div>

