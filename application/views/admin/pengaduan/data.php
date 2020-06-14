
<section class="content-header">
  <h1 style="font-family: semua;">
    Pengaduan
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Pengaduan</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
	<div class="box">

        <div class="cantdelete" data-cantdelete="<?=$this->session->flashdata('cantdelete')?>"></div>
        <div class="flashdatawarning" data-flashdata="<?=$this->session->flashdata('warning')?>"></div>
        <div class="flashdata" data-flashdata="<?=$this->session->flashdata('success')?>"></div>
        <div class="box-header">
          <h3 class="box-title" style="float: left; font-family: semua;">Data Pengaduan</h3>
          <a href="" class="btn btn-sm btn-flat btn-default" style="float: right; margin: 0 4px;"><i class="fa fa-refresh"></i> Refresh</a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="pengaduan" class="table table-striped">
            <thead>
                <tr>
                  <th>No</th>
                  <th>Foto</th>
                  <th>Tanggal</th>
                  <th>Isi Pengaduan</th>
                  <th>Masyarakat</th>
                  <th>Status</th>
                  <th style="float: right;margin-right: 7px;">Opsi</th>
                </tr>
            </thead>
            <tbody>
        	<?php 
        		$no = 1;
        		foreach ($pengaduan->result() as $result) { ?>
        		<tr>
                  <td style="width: 5%;"><?=$no++?></td>
                  <td style="width: 190px;">
                    <div style="width: 170px; height: 100px; overflow: hidden;"> 
                      <img src="<?=base_url()?>uploads/pengaduan/<?=$result->foto?>" width="170px">
                    </div>
                  </td>
                  <td style="width: 148px;"><?=tanggal($result->tgl_pengaduan)?></td>
                  <td style="width: 300px;"><?=$result->isi?></td>
                  <td><?=$result->nama?></td>
                  <td>
                    <?php if ($result->status == 'belum') {
                      echo '<span class="btn btn-xs btn-warning" style="font-family: semua;border-radius: 11px;padding: 1px 11px;">Belum diproses</i></span>';
                    }elseif($result->status == 'proses'){
                      echo '<span class="btn btn-xs btn-info" style="font-family: semua;border-radius: 11px;padding: 1px 11px;">Proses</i></span>';
                    }elseif($result->status == 'tolak'){
                      echo '<span class="btn btn-xs btn-danger" style="font-family: semua;border-radius: 11px;padding: 1px 11px;;">Ditolak</i></span>';
                    }else{
                      echo '<span class="btn btn-xs btn-success" style="font-family: semua;border-radius: 11px;padding: 1px 11px;">Selesai</i></span>';
                    }?>
                  </td>
                  <td align="right" style="margin-right: 4px;">
                  <?php if ($result->status == 'selesai' || $result->status == 'tolak'){ ?>
                  	<a href="<?=site_url('sistem/pengaduan/detail/'.$result->id_pengaduan)?>" class="btn btn-sm btn-info" style="padding: 3px 14px;border-radius: 14px;font-size: 13px;"></i><i class="fa fa-search"></i></a>	
                  <?php }elseif ($result->status == 'proses') { ?>
                  	<a href="<?=site_url('sistem/pengaduan/selesai/'.$result->id_pengaduan)?>" class="btn btn-sm btn-primary selesai" style="padding: 3px 14px;border-radius: 14px;font-size: 13px;"></i><i class="fa fa-check"></i></a>
                  <?php }elseif($result->status == 'belum'){ ?>
              		<a href="<?=site_url('sistem/pengaduan/prosespengaduan/'.$result->id_pengaduan)?>" class="btn btn-sm btn-success" style="padding: 3px 14px;border-radius: 14px;font-size: 13px;"></i><i class="fa fa-share"></i></a>
              	  <?php } ?>
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
		$('#pengaduan').DataTable({
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
