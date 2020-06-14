 <section class="content-header">
  <h1 style="font-family: semua;">
    Tanggapan
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li>Report</li>
    <li class="active">Tanggapan</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
	<div class="box">
		<div class="cantdelete" data-cantdelete="<?=$this->session->flashdata('cantdelete')?>"></div>
        <div class="flashdatawarning" data-flashdata="<?=$this->session->flashdata('warning')?>"></div>
        <div class="flashdata" data-flashdata="<?=$this->session->flashdata('success')?>"></div>
        <div class="box-header" style="margin-bottom: -17px;">
          <h3 class="box-title" style="float: left; font-family: semua;">Data Tanggapan</h3><br>
          <form class="pull-right" action="<?=site_url('sistem/report/tanggapan')?>" method="post" style="margin-top: -17px;">
	        <div class="form-group pull-left">
          	<a href="" class="btn btn-sm btn-default" style="float: left; margin: 0 7px 0 0;"><i class="fa fa-refresh"></i></a>
	          <div class="input-group">
	            <button type="button" class="btn btn-sm btn-default pull-right" id="daterange-btn" style="border-radius: 3px 0px 0px 3px;">
	              <span><?=$detail != '' ? $detail : 'Pilih Tanggal '?>  </span>
	              <i class="fa fa-calendar"></i>
	              <input type="hidden" name="awal" id="awal" value="<?=$awal != '' ? $awal : ''?>">
	              <input type="hidden" name="akhir" id="akhir" value="<?=$akhir != '' ? $akhir : ''?>">
	              <input type="hidden" id="awalSwal" value="<?=$awal != '' ? tanggal($awal) : ''?>">
	              <input type="hidden" id="akhirSwal" value="<?=$akhir != '' ? tanggal($akhir) : ''?>">
	            </button>
	          </div>
	        </div>
	        <?php if ($detail == ''){ ?>	
          	<a class="btn btn-sm btn-success print" href="<?=site_url('sistem/report/printTanggapan')?>" style="float: right; margin: 0 0 0 7px;"><i class="fa fa-print"></i> Cetak</a>
	        <?php } else{ ?>
          	<a class="btn btn-sm btn-success print" href="<?=site_url('sistem/report/printTanggapan/'.$awal.'/'.$akhir)?>" style="float: right; margin: 0 0 0 7px;"><i class="fa fa-print"></i> Cetak</a>
	        <?php } ?>
	        <div class="form-group pull-right">
	            <button type="submit" name="cari" class="btn btn-sm btn-info" style="border-radius: 0px 3px 3px 0px;"><i class="fa fa-search"></i></button>
	        </div>
	      </form>
        </div>
        <!-- /.box-header -->
                <div class="box-body">
          <table id="tanggapan" class="table table-striped">
            <thead>
                <tr>
                  <th>No</th>
                  <th>Foto</th>
                  <?php if ($this->utility->petugas_login()->level == 'petugas'): ?>
                  <th>Masyarakat</th>
                  <?php endif ?>
                  <th>Isi Pengaduan</th>
                  <th>Tanggapan</th>
                  <?php if ($this->utility->petugas_login()->level == 'admin'): ?>
                  <th>Petugas</th>
                  <?php endif ?>
                  <th>Status</th>
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
                      <img src="<?=base_url()?>uploads/pengaduan/<?=$result->foto?>" width="170px">
                    </div>
                  </td>
                  <?php if ($this->utility->petugas_login()->level == 'petugas'): ?>
                  <td><?=$result->nama?></td>
                  <?php endif ?>
                  <td>
                    "<?=$result->isi?>."<br>
                    <small style="margin-top: 10px;">
                      <?=tanggal($result->tgl_pengaduan)?><br>
                      <?php if ($this->utility->petugas_login()->level == 'admin'): ?>
                      dari <?=$result->nama?>
                      <?php endif ?>
                    </small>
                  </td>
                  <td>
                    "<?=$result->tanggapan?>."<br>
                    <small><?=tanggal($result->tgl_tanggapan)?></small>
                  </td>
                  <?php if ($this->utility->petugas_login()->level == 'admin'): ?>
                  <td><?=$result->nama_petugas?></td>
                  <?php endif ?>
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
    	$('#daterange-btn').daterangepicker({
	      ranges   : {
	        'Hari ini'    : [moment(), moment()],
	        'Kemarin'     : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
	        '7 hari lalu' : [moment().subtract(6, 'days'), moment()],
	        'Bulan ini'   : [moment().startOf('month'), moment().endOf('month')],
	        'Minggu ini'   : [moment().startOf('week'), moment().endOf('week')],
	        'Bulan lalu'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
	      },
	      startDate: moment().subtract(29, 'days'),
	      endDate  : moment()
	      },
	      function (start, end) {
	        $('#daterange-btn span').html(start.format('D, MMMM YYYY') + ' - ' + end.format('D, MMMM YYYY'))
	        $('#awal').val(start.format('Y-M-D'))
	        $('#akhir').val(end.format('Y-M-D'))
	      }
	    ),
		$('#tanggapan').DataTable({
			"columnDefs" : [
                {
                   "targets" : [0, 1, 2, 3, 4, 5],
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
