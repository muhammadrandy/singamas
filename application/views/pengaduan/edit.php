
<section class="content-header">
  <h1 style="font-family: semua;">
    Pengaduan
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li>Pengaduan</li>
    <li class="active">Edit</li>
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
          <h3 class="box-title" style="font-family: semua;">Edit Pengaduan</h3>
          <div class="box-tools pull-right" style="margin-left: 7px;">
            <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="" data-widget="chat-pane-toggle" data-original-title="Foto">
            <i class="fa fa-image"></i></button>
          </div>
          <a href="<?=site_url('pengaduan')?>" class="pull-right"><i class="fa fa-chevron-left"></i> Kembali</a>
        </div>
        <!-- /.box-header -->
        <form action="<?=site_url('pengaduan/proses')?>" method="post" enctype="multipart/form-data">
          <div class="box-body">
          <!-- Conversations are loaded here -->
            <div class="direct-chat-messages" style="height: auto;">
              <!-- Message to the right -->
              <div class="direct-chat-msg" style="margin-bottom: 80px;">
                <img src="<?=base_url()?>/uploads/pengaduan/<?=$row->foto?>" width="230px" style="margin: 5px;"><br>
                <span class="direct-chat-timestamp" style="margin-top: 3px;
    margin-left: 5px;font-size: 12px;"><?=tanggal(date('Y-m-d')) ?></span>
              </div>
              <div class="direct-chat-msg right" style="margin-top: 20px; width: 240px;">
                <div class="direct-chat-info clearfix" style="position: absolute;top: 10px; right: 13px;">
                  <span class="direct-chat-name pull-right"><?=$this->utility->user_login()->nama?></span>
                </div>

                <p style="position: absolute;right: 12px; top: 37px;">Sertakan bukti berupa foto</p>
                <div style="position: absolute;width: 223px; top: 63px; right: 13px;">
                  <div class="form-group">
                    <input type="file" name="foto" class="form-control">
                    <small class="pull-right">Jangan pilih jika foto tidak diganti</small>
                  </div>
                </div>
                <p style="position: absolute;right: 13px; top: 134px;">Tampilkan di website?</p>
                <div class="form-group pull-right" style="margin-top: 130px; margin-bottom: 33px; position: absolute;top: 30px;right: 13px;">
                  <span style="position: absolute; top: 1px; right: 25px;">Ya</span>
                  <label style="position: absolute; right: 20px;">
                    <input type="radio" value="ya" id="ya" name="privasi" class="flat-green" <?=$row->privasi == 'ya' ? 'checked' : null?>>
                  </label><br>
                  <span style="position: absolute; top: 27px; right: 25px;">Tidak</span>
                  <label style="position: absolute; right: 20px;top: 25px;">
                    <input type="radio" value="tidak" id="tidak" name="privasi" class="flat-red" <?=$row->privasi == 'tidak' ? 'checked' : null?>>
                  </label>
                </div>
                <div class="direct-chat-text" style="position: absolute;right: 13px;top: 212px;"><?=$row->isi?></div>
                <!-- /.direct-chat-text -->
              </div>
              
              <!-- /.direct-chat-msg -->
            </div>
            <!-- /.direct-chat-pane -->
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
              <input type="hidden" name="tanggal" value="<?=date('Y-m-d')?>">
              <input type="hidden" name="id_pengaduan" value="<?=$row->id_pengaduan?>">
              <input type="hidden" name="isip" value="<?=$row->isi?>">
              <textarea name="isi" placeholder="Edit isi pengaduan..." class="form-control pull-left" style="width: 87%; border-radius: 10px;resize: vertical;"></textarea>
              <button type="submit" name="<?=$page?>" class="btn btn-success pull-right" style="border-radius: 50%; padding: 10px 15px 10px 12px"><i class="fa fa-send" style="font-size: 20px; "></i></button>
            </div>
          </div>
        <!-- /.box-footer-->
        </form>
      </div>
      <!--/.direct-chat -->
    </div>
</section>
