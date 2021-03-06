<!DOCTYPE html>
<html>
<head>
	<title>Print pengaduan</title>
	<style type="text/css">
		*{
			font-family: sans-serif;
		}
		th{
			padding: 10px !important;
			text-align: center; 
		}
		td{
			font-size: 13px !important;
		}/*
		td.center{
			padding: 7px 40px !important;
			text-align: center; 
		}
		td.left{
			padding: 7px 12px !important;
		}*/
	</style>		
	<?php 
		function tanggall($tanggal){
        $bulan = array (
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $pecahkan = explode('-', $tanggal);
     
        return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
    }
	 ?>
</head>
<body>	
		<img src="assets/img/login.png" width="90px" style="float: left; margin-top: 20px; margin-left: 10px;">
		<img src="assets/img/bgr.png" width="64px" style="float: right; margin-top: 24px; margin-right: 10px;">
		<div style="margin-right: 100px;">
			<h2 align="center" style="margin-bottom:10px;">Sistem Pengaduan Masyarakat<br>Berbasis Online</h2>
			<center><small align="center">Jl. Raya Jakarta-Bogor No.44, Cibinong, Bogor, Jawa Barat</small></center>
		</div>
	<hr style="margin-bottom: 1px;">
	<center ><h4 style="margin-bottom: 7px;"><b>Laporan Pengaduan</b></h4></center><br>
	<small style="float: left;">

		<?php 
		if ($awal) {
			echo "Pengaduan tanggal ";
			if ($awal != $akhir){ 
				echo tanggall($awal).' - '.tanggall($akhir).' :';
			}else{
				echo tanggall($awal);
			}
		}else{
			echo "Semua data pengaduan :";
		}
		 
		?>
	</small>
	<small style="float: right;">Oleh <?=$petugas == 'admin' ? 'Administrator' : 'Petugas'?></small>
	<table border="1px" cellspacing="0" style="border-color: #000;font-size: 15px;margin-top: 30px;">
    <thead>
        <tr>
          <th>No</th>
          <th>Tanggal</th>
          <th>Isi Pengaduan</th>
          <th>Masyarakat</th>
          <th>Status</th>
        </tr>
    </thead>
    <tbody>
	<?php 
		$no = 1;
		foreach ($pengaduan as $result) { ?>
		<tr>
          <td style="width: 20px; text-align: center;"><?=$no++?></td>
          <td style="padding: 7px 10px; width:120px;text-align: center;"><?=tanggall($result->tgl_pengaduan)?></td>
          <td style="width: 225px;padding: 7px 10px;"><?=$result->isi?></td>
          <td style="padding: 7px 10px; width:130px; text-align: center;"><?=$result->nama?></td>
          <td style="padding: 7px 10px; width: 100px; text-align: center;">
            <?php if ($result->status == 'belum') {
              echo 'Belum diproses';
            }elseif($result->status == 'proses'){
              echo 'Proses';
            }elseif($result->status == 'tolak'){
              echo 'Ditolak';
            }else{
              echo 'Selesai';
            }?>
          </td>
        </tr>
	<?php
		}
	 ?>
        
    </tbody>
  </table>
</body>
</html>