<section class="content-header">
  <h1 style="font-family: semua;">
    Dashboard
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Dashboard</li>
  </ol>
</section>
<section class="content">
  <?php if ($this->utility->petugas_login()->level == 'admin'){ ?>
    <div class="col-md-5" style="margin-top: 20px;">
    <div class="col-md-12 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-red"><i class="fa fa-exclamation-triangle"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Jumlah Pengaduan</span>
        <span class="info-box-number"><?=$pengaduan?></span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <div class="col-md-12 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-green"><i class="fa fa-tty"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Jumlah Tanggapan</span>
        <span class="info-box-number"><?=$tanggapan?></span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <div class="col-md-12 col-sm-6 col-xs-12">
    <div class="info-box">
        <span class="info-box-icon bg-yellow"><i class="fa fa-users"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Jumlah Masyarakat</span>
          <span class="info-box-number"><?=$masyarakat?></span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <div class="col-md-127col-sm-6 col-xs-12">
      <div class="info-box">
          <span class="info-box-icon bg-aqua"><i class="fa fa-user-plus"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Jumlah Petugas</span>
            <span class="info-box-number"><?=$petugas?></span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
  </div>
  <div class="col-md-7" style="margin-top: 37px;">
    <img src="<?=base_url()?>/assets/img/dash.png">
  </div>
  <?php }else{ ?>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-red"><i class="fa fa-exclamation-triangle"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Jumlah Pengaduan</span>
          <span class="info-box-number"><?=$pengaduan?></span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-green"><i class="fa fa-tty"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Jumlah Tanggapan</span>
          <span class="info-box-number"><?=$tanggapan?></span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
  <?php } ?>
</section>