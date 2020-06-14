
<section class="content-header">
  <h1 style="font-family: semua;">
    Tanggapan
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li>Tanggapan</li>
    <li class="active">Detail</li>
  </ol>
</section>

<!-- Main content -->
<div class="cantdelete" data-cantdelete="<?=$this->session->flashdata('cantdelete')?>"></div>
<div class="flashdatawarning" data-flashdata="<?=$this->session->flashdata('warning')?>"></div>
<div class="flashdata" data-flashdata="<?=$this->session->flashdata('success')?>"></div>
<section class="content">

	<div class="col-md-6 col-md-offset-3">
          <!-- DIRECT CHAT PRIMARY -->
      <div class="box box-default direct-chat direct-chat-default">
        <div class="box-header with-border">
          <h3 class="box-title" style="font-family: semua;">Detail Tanggapan</h3>
          <div class="box-tools pull-right" style="margin-left: 7px;">
            <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="" data-widget="chat-pane-toggle" data-original-title="Foto">
            <i class="fa fa-image"></i></button>
          </div>
          <a href="<?=site_url('tanggapan')?>" class="pull-right"><i class="fa fa-chevron-left"></i> Kembali</a>
        </div>
        <!-- /.box-header -->
        <form action="<?=site_url('tanggapan/Detail')?>" method="post">
          <div class="box-body">
          <!-- Conversations are loaded here -->
            <div class="direct-chat-messages">
              <!-- Message. Default to the left -->
              <div class="direct-chat-msg right">
                <div class="direct-chat-info clearfix">
                  <span class="direct-chat-name pull-right" style="margin-right: 7px;"><?=$row->nama?></span>
                </div><!-- /.direct-chat-img -->
                <div class="clearfix">
                  <img src="../../../web/uploads/pengaduan/<?=$row->foto?>" width="230px" style="margin: 5px; float: right;">
                </div>
                <div class="direct-chat-text pull-right">
                  <?=$row->isi?>
                </div>
                <div class="clearfix"></div>
                <span class="direct-chat-timestamp pull-right" style="margin-top: 4px; margin-right: 7px; font-size: 12px;"><?=tanggal($row->tgl_pengaduan)?></span>
                
              </div>
              <!-- /.direct-chat-msg -->

              <!-- Message to the right -->
              <div class="direct-chat-msg left">
                <div class="direct-chat-info clearfix">
                  <span class="direct-chat-name pull-left"><?=$row->nama_petugas?></span>
                </div>
                <div class="form-group pull-left" style="margin-top: 8px; margin-bottom: 33px; position: relative;">
                  <?php if ($row->status == 'tolak'): ?>
                  <span style="position: absolute; top: 1px; left: 25px;">Tolak</span>
                  <label style="position: absolute; left: 0px;">
                    <input type="radio" value="tolak" id="tolak" name="status" class="flat-red" checked>
                  </label><br>
                  <?php endif ?>
                  <?php if ($row->status == 'selesai'): ?> 
                  <span style="position: absolute; top: 1px; left: 25px;">Selesai</span>
                  <label style="position: absolute; left: 0px;">
                    <input type="radio" value="selesai" id="selesai" name="status" class="flat-green" checked>
                  </label>
                  <?php endif ?>
                  <?php if ($row->status == 'proses'): ?> 
                  <span style="position: absolute; top: 1px; left: 25px;">Proses</span>
                  <label style="position: absolute; left: 0px;">
                    <input type="radio" value="proses" id="proses" name="status" class="flat-blue" checked>
                  </label>
                  <?php endif ?>
                </div>
                <div class="direct-chat-text pull-left" style="margin-top: 10px;">
                  <?=$row->tanggapan?>
                </div>
                <!-- /.direct-chat-text -->
              </div>
              <span class="direct-chat-timestamp pull-left" style="font-size: 12px;margin-top: -4px;margin-left: 4px;"><?=tanggal($row->tgl_tanggapan) ?></span>
              <!-- /.direct-chat-msg -->
            </div>
            <!--/.direct-chat-messages-->

            <!-- Contacts are loaded here -->
            <div class="direct-chat-contacts">
              <ul class="contacts-list">
                <li>
                  <a href="#">

                    <div class="contacts-list-info">
                      <span class="contacts-list-name">
                        <?=$row->nama?>
                        <small class="contacts-list-date pull-right"><?=tanggal($row->tgl_pengaduan)?></small>
                      </span>
                  	<center>
                      	<img src="../../../web/uploads/pengaduan/<?=$row->foto?>" width="470px" style="margin: 10px 0;">
                  	</center>
                    </div>
                    <!-- /.contacts-list-info -->
                  </a>
                </li>
                <!-- End Contact Item -->
              </ul>
              <!-- /.contatcts-list -->
            </div>
            <!-- /.direct-chat-pane -->
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <div class="form-group">
              <textarea name="tanggapan" class="form-control pull-left" style="width: 87%; border-radius: 10px;resize: vertical;" disabled></textarea>
              <button type="submit" name="submit" class="btn btn-success pull-right" style="border-radius: 50%; padding: 10px 15px 10px 12px" disabled><i class="fa fa-send" style="font-size: 20px; "></i></button>
            </div>
          </div>
        <!-- /.box-footer-->
        </form>
      </div>
      <!--/.direct-chat -->
    </div>
</section>