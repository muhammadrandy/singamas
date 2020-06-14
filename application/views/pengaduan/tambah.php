
<section class="content-header">
  <h1 style="font-family: semua;">
    Pengaduan
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li>Pengaduan</li>
    <li class="active">Tambah</li>
  </ol>
</section>

<!-- Main content -->
<div class="cantdelete" data-cantdelete="<?=$this->session->flashdata('cantdelete')?>"></div>
<div class="flashdatawarning" data-flashdata="<?=$this->session->flashdata('warning')?>"></div>
<div class="errorimg" data-errorimg="<?=$this->session->flashdata('errorimg')?>"></div>
<section class="content">

  <div class="col-md-6 col-md-offset-3">
          <!-- DIRECT CHAT PRIMARY -->
      <div class="box box-default direct-chat direct-chat-default">
        <div class="box-header with-border">
          <h3 class="box-title" style="font-family: semua;">Tambah Pengaduan</h3>
          <a href="<?=site_url('pengaduan')?>" class="pull-right"><i class="fa fa-chevron-left"></i> Kembali</a>
        </div>
        <!-- /.box-header -->
        <form action="<?=site_url('pengaduan/proses')?>" method="post" enctype="multipart/form-data">
          <div class="box-body">
          <!-- Conversations are loaded here -->
            <div class="direct-chat-messages">
              <!-- Message to the right -->
              <div class="direct-chat-msg right">
                <div class="direct-chat-info clearfix">
                  <span class="direct-chat-name pull-right"><?=$this->utility->user_login()->nama?></span>
                </div>

                <p style="position: absolute;right: 10px; top: 44px;">Sertakan bukti berupa foto</p>
                <div style="position: absolute;width: 223px; top: 70px; right: 10px;">
                  <div class="form-group">
                    <input type="file" name="foto" class="form-control">
                    <small class="pull-right">Jangan pilih jika tidak ada foto</small>
                  </div>
                </div>
                <p style="position: absolute;right: 10px; top: 137px;">Tampilkan di website?</p>
                <div class="form-group pull-right" style="margin-top: 130px; margin-bottom: 33px; position: relative;">
                  <span style="position: absolute; top: 1px; right: 25px;">Ya</span>
                  <label style="position: absolute; right: 20px;">
                    <input type="radio" value="ya" id="ya" name="privasi" class="flat-green">
                  </label><br>
                  <span style="position: absolute; top: 27px; right: 25px;">Tidak</span>
                  <label style="position: absolute; right: 20px;top: 25px;">
                    <input type="radio" value="tidak" id="tidak" name="privasi" class="flat-red">
                  </label>
                </div>
                <!-- /.direct-chat-text -->
              </div>
              <span class="direct-chat-timestamp pull-right"><?=tanggal(date('Y-m-d')) ?></span>
              <!-- /.direct-chat-msg -->
            </div>
            <img src="<?=base_url()?>/assets/front/images/undraw_metrics_gtu7.svg" alt="Image" style="width: 270px; position: absolute;top: 30px;">
            <!-- /.direct-chat-pane -->
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <div class="form-group"> 
              <input type="hidden" name="tanggal" value="<?=date('Y-m-d')?>">
              <textarea name="isi" placeholder="Isi pengaduan..." class="form-control pull-left" style="width: 87%; border-radius: 10px;resize: vertical;"></textarea>
              <button type="submit" name="<?=$page?>" class="btn btn-success pull-right" style="border-radius: 50%; padding: 10px 15px 10px 12px"><i class="fa fa-send" style="font-size: 20px; "></i></button>
            </div>
          </div>
        <!-- /.box-footer-->
        </form>
      </div>
      <!--/.direct-chat -->
    </div>
</section>
