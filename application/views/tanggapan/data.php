
<section class="content-header">
  <h1 style="font-family: semua;">
    Tanggapan
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Tanggapan</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
	<div class="box">

        <div class="cantdelete" data-cantdelete="<?=$this->session->flashdata('cantdelete')?>"></div>
        <div class="flashdatawarning" data-flashdata="<?=$this->session->flashdata('warning')?>"></div>
        <div class="flashdata" data-flashdata="<?=$this->session->flashdata('success')?>"></div>
        <div class="box-header">
          <h3 class="box-title" style="float: left; font-family: semua;">Data Tanggapan</h3>
          <a href="" class="btn btn-sm btn-flat btn-default" style="float: right; margin: 0 4px;"><i class="fa fa-refresh"></i> Refresh</a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="tanggapan" class="table table-striped">
            <thead>
                <tr>
                  <th>No</th>
                  <th>Foto</th>
                  <th>Isi Pengaduan</th>
                  <th>Tanggapan</th>
                  <th>Petugas</th>
                  <th>Status</th>
                  <th style="float: right;margin-right: 3px;">Opsi</th>
                </tr>
            </thead>
            <tbody>
        	<?php 
        		$no = 1;
        		foreach ($tanggapan->result() as $result) { ?>
        		<tr>
                  <td style="width: 5%;"><?=$no++?></td>
                  <td style="width: 190px;">
                    <div style="width: 170px; height: 100px; overflow: hidden;"> 
                      <img src="<?=base_url()?>/uploads/pengaduan/<?=$result->foto?>" width="170px">
                    </div>
                  </td>
                  <td>
                    "<?=$result->isi?>."<br>
                    <small style="margin-top: 10px;">
                      <?=tanggal($result->tgl_pengaduan)?><br>
                    </small>
                  </td>
                  <td>
                    "<?=$result->tanggapan?>."<br>
                    <small><?=tanggal($result->tgl_tanggapan)?></small>
                  </td>
                  <td><?=$result->nama_petugas?></td>
                  <td>
                    <?php if ($result->status == 'belum') {
                      echo '<span class="btn btn-xs btn-warning" style="font-family: semua;border-radius: 11px;padding: 1px 11px;">Belum diproses</i></span>';
                    }elseif($result->status == 'proses'){
                      echo '<span class="btn btn-xs btn-info" style="font-family: semua;border-radius: 11px;padding: 1px 11px;">Proses</i></span>';
                    }elseif($result->status == 'tolak'){
                      echo '<span class="btn btn-xs btn-danger" style="font-family: semua;border-radius: 11px;padding: 1px 11px;">Ditolak</i></span>';
                    }else{
                      echo '<span class="btn btn-xs btn-success" style="font-family: semua;border-radius: 11px;padding: 1px 11px;">Selesai</i></span>';
                    }?>
                  </td>
                  <td align="right">
                  	<a href="<?=site_url('tanggapan/detail/'.$result->id_tanggapan)?>" class="btn btn-sm btn-info"></i><i class="fa fa-search"></i></a>	
                  </td>
                </tr>
        	<?php
        		}
        	 ?>
                
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

</section>
<!-- /.content -->
<script>
	$(document).ready(function () {
		$('#tanggapan').DataTable({
			"columnDefs" : [
                {
                   "targets" : [0, 1, 2, 3, 4, 5, 6],
                   "orderable" : false
                },
                {
                   "targets" : [0, 5],
                   "className" : 'text-center'
                },
                {
                   "targets" : [1, 2, 3, 4],
                   "className" : 'text-left'
                }
            ]
		})
	})
</script>
