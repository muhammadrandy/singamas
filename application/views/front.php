<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Pengaduan Masyarakat</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="<?=base_url()?>/assets/img/title.png" type="image/x-icon" />
    <link rel="stylesheet" href="<?=base_url()?>/assets/front/fonts/icomoon/style.css">
    <link rel="stylesheet" href="<?=base_url()?>/assets/front/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url()?>/assets/front/css/jquery-ui.css">
    <link rel="stylesheet" href="<?=base_url()?>/assets/front/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?=base_url()?>/assets/front/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?=base_url()?>/assets/front/css/owl.theme.default.min.css">

    <link rel="stylesheet" href="<?=base_url()?>/assets/front/css/jquery.fancybox.min.css">

    <link rel="stylesheet" href="<?=base_url()?>/assets/front/css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="<?=base_url()?>/assets/front/fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="<?=base_url()?>/assets/front/css/aos.css">

    <link rel="stylesheet" href="<?=base_url()?>/assets/front/css/style.css">

    <link rel="stylesheet" href="<?=base_url()?>/assets/plugins/iCheck/all.css">

    <script src="<?=base_url()?>/assets/front/js/jquery-3.3.1.min.js"></script>

    <link rel="stylesheet" href="<?=base_url()?>/assets/bower_components/font-awesome/css/font-awesome.min.css">

    <script src="<?=base_url()?>/assets/bower_components/sweetalert2/dist/sweetalert2.all.min.js"></script>


    <style>
      @font-face{
        font-family: semua;
        src:url(<?=base_url()?>/assets/front/fonts/Montserrat-Regular.ttf);
      }
      *{
        font-family: semua;
      }
      .h-entry .meta {
        color: #222222 !important;
      }
      @media (max-width: 990px){
        .minilogo{
          width: 125px !important;
        }
        #daftar{
          margin-top: 10px !important;
        }
        .section-title{
          font-size: 26px !important;
        }
        .lead{
          font-size: 14px !important;
        }
        .atas{
          margin-top: 30px !important;
        }
        .daftars{
          display: none !important;
        }
        .site-menu .daftar{
          margin-top: 10px !important;
        }
        .login{
          display: none !important;
        }
        .beranda{
          margin-top: 40px !important;
          text-align: center;
        }
        .beranda h1{
          font-size: 37px !important;
        }
        img.banner{
          width: 370px !important;
          display: block !important;
          float: none !important;
          margin: 80px auto 0 !important 
        }
        .chat{
          margin-top: 3rem;
        }

      }
      .clearfix{
        display: none !important;
      }
      header.site-navbar.shrink img{
        width: 160px !important;
        transition: .4s;
      }
      header.site-navbar.shrink{
        padding-top: 14px !important;
      }
      .btn.start:hover{
        background-color: #28a745;
        color: #fff !important;
      }
    </style>

  </head>
   <div class="loginfail" data-loginfail="<?=$this->session->flashdata('loginfail')?>"></div>
   <div class="ceknik" data-ceknik="<?=$this->session->flashdata('ceknik')?>"></div>
   <div class="cekuser" data-cekuser="<?=$this->session->flashdata('cekuser')?>"></div>
   <div class="daftar" data-daftar="<?=$this->session->flashdata('daftar')?>"></div>
   <div class="mail" data-mail="<?=$this->session->flashdata('mail')?>"></div>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
  

  <div id="overlayer"></div>
  <div class="loader">
    <div class="spinner-border text-primary" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </div>


  <div class="site-wrap"  id="beranda">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
   
    <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">

      <div class="container">
        <div class="row align-items-center">
          
          <div class="col-6 col-md-3 col-xl-4 d-block minilogowrap">
            <img src="<?=base_url()?>/assets/front/images/web1.png" style="width: 184px;margin-top: -10px; transition: .4s;" class="minilogo">
          </div>

          <div class="col-12 col-md-9 col-xl-8 main-menu">
  
            <nav class="site-navigation position-relative text-right" role="navigation">

              <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block ml-0 pl-0" style="font-size: 14px;">
                <li><a href="#beranda" class="nav-link">Beranda</a></li>
                <li><a href="#tentang" class="nav-link">Tentang</a></li>
                <li><a href="#pengaduan" class="nav-link">Pengaduan</a></li>
                <li><a href="#kontak" class="nav-link">Kontak</a></li>
                <li><a href="#login" class="nav-link btn btn-sm text-white" style="padding: 5px 17px;background-color: #33b7e5;
    border-color: #33b7e5; margin-left: 10px;font-size: 14px;">Login</a></li>
                <li><a href="#daftar" class="nav-link btn btn-sm btn-success text-white" style="padding: 5px 17px; margin-left: 7px;font-size: 14px;">Daftar</a></li>
              </ul>
            </nav>
          </div>


          <div class="col-6 col-md-9 d-inline-block d-lg-none ml-md-0" ><a href="#" class="site-menu-toggle js-menu-toggle text-black float-right"><span class="icon-menu h3"></span></a></div>

        </div>
  
      </div>
      
    </header>
    

    <div class="site-blocks-cover" style="overflow: hidden;">
      <div class="container">
        <div class="row align-items-center justify-content-center">

          <div class="col-md-12" style="position: relative;margin-top: -40px;" data-aos="fade-up" data-aos-delay="200">
            
            <img src="<?=base_url()?>/assets/front/images/landing.png" alt="Image" class="img-fluid banner" style="float: right;">
            <div class="clearfix"></div>
            <div class="row mb-4" data-aos="fade-up" data-aos-delay="200">
              <div class="col-lg-12 beranda" style="margin-top: 60px;">
                <h1 style="font-size: 45px;">Pengaduan Masyarakat Berbasis Online </h1>
                <p class="mb-4">Layanan atau sarana interaksi masyarakat dan pemerintah berbasis online untuk pengawasan dan pelayanan pemerintah kepada masyarakat.</p>
                <a href="#login" class="btn start buatPengaduan" style="
    border: 2px solid #28a745; color: #28a745; transition: .7s;">Buat Pengaduan</a>
              </div>
              
              
  
            </div>

          </div>
        </div>
      </div>
    </div>  


    <div class="site-section" id="tentang">
      <div class="container mt-5">
        <div class="row mb-1 justify-content-center text-center"  data-aos="fade-up">
          <div class="col-7 text-center mb-5">
            <h2 class="section-title">Langkah Membuat Pengaduan</h2>
            <p class="lead" style="font-size: 1rem;">Berikut langkah-langkah untuk membuat pengaduan</p>
          </div>
        </div>
        <div class="row align-items-stretch mt-5">
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up">
            
            <div class="unit-4 d-block">
              <div class="unit-4-icon mb-3">
                <span class="icon-wrap"><span class="text-primary icon-user-plus"></span></span>
              </div>
              <div>
  
                <h3>1. Daftar</h3>
                <p>Mendaftarkan diri dengan klik tombol daftar pada navigasi</p>
              </div>
            </div>

          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up" data-aos-delay="200">

            <div class="unit-4 d-block">
              <div class="unit-4-icon mb-3">
                <span class="icon-wrap"><span class="text-primary icon-verified_user"></span></span>
              </div>
              <div>
                <h3>2. Login</h3>
                <p>Login sesuai data yang didaftarkan dengan klik tombol login pada navigasi</p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up"  data-aos-delay="300">
            <div class="unit-4 d-block">
              <div class="unit-4-icon mb-3">
  
                <span class="icon-wrap"><span class="text-primary icon-subtitles"></span></span>
              </div>
              <div>
                <h3>3. Buat Pengaduan</h3>
                <p>Silahkan buat pengaduan dan tunggu tanggapan yang diberikan</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <div class="site-section" id="pengaduan">
      <div class="container mt-5">
        <div class="row mb-5">
          <div class="col-12 text-center">
            <h2 class="section-title mb-3">Pengaduan</h2>
          </div>
        </div>

        <div class="row">
          <?php if ($tanggapan->num_rows() < 1): ?>

          <div class="col-md-12 py-4 mx-2" style="background-color: #f1f1f1; border-radius: 10px;">
            <h5 class="text-center">Tidak ada pengaduan</h5>
          </div>
            
          <?php endif ?>
        <?php 
          $no = 1;
          foreach ($tanggapan->result() as $row) { ?>
          <div class="col-md-4 col-xs-6 mb-4" data-aos="fade-up">
            <div class="h-entry">
              <div class="foto" style="height: 200px; overflow: hidden;border-radius: 10px;">
                <img src="<?=base_url()?>/uploads/pengaduan/<?=$row->foto?>" alt="Image" class="img-fluid">
              </div>
              <div class="meta mt-2 mb-2"><?=$row->nama?> <span class="mx-2">&bullet;</span> <?=tanggal($row->tgl_pengaduan)?>
              <p class="mt-2" style="margin-bottom: 7px;">"<?=$row->isi?>."</p>
              <p><a type="button" data-toggle="modal" data-target="#modal-default<?=$row->id_tanggapan?>" style="color: #649bf6;">Lihat tanggapan</a></p>
              </div>
            </div>
          </div>
         <div class="modal fade" id="modal-default<?=$row->id_tanggapan?>">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Detail Pengaduan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                  </div>
                  <div class="modal-body">
                    <div class="row">
                      <div class="col-md-6">
                        <img src="<?=base_url()?>/uploads/pengaduan/<?=$row->foto?>" width="360px" style="border-radius: 4px;">
                      </div>
                      <div class="col-md-6">
                        <div class="col-md-12 chat mb-3">
                          <h4 style="font-size: 17px;text-align: center;">Isi Pengaduan <hr></h4>
                        </div>
                        <div class="mt-2 mb-3">
                          <p style="float: right;font-size: 14px;margin-bottom: 0px;"><?=$row->nama?><span class="mx-2">&bullet;</span><small>Masyarakat</small></p><br>
                          <div class="" style="float: right; padding: 7px 17px;border-radius: 10px 0px 20px 10px;font-size: 14px; background-color: #e4e4e4d6;border:none;margin-bottom: 4px;"><?=$row->isi?>.
                          </div><br>
                        </div>
                        <p style="font-size: 11px; float: right;margin-right: 15px;"><?=tanggal($row->tgl_pengaduan)?></p>
                        <div class="clearfix"></div>
                        <div class="mb-2" style="margin-top: 4rem;">
                          <p style="float: left;font-size: 14px;margin-bottom: 0px;display: block;"><?=$row->nama_petugas?><span class="mx-2">&bullet;</span><small>Petugas</small></p><br>
                          <div class="" style="float: left; padding: 7px 17px;border-radius: 0px 10px 10px 20px;font-size: 14px; background-color: #e4e4e4d6;border:none;display: block;"><?=$row->tanggapan?>.
                          </div>
                        </div>
                        <div style="clear: both;"></div>
                        <p class="mt-1" style="font-size: 11px; float: left;display: block;margin-left: 15px;"><?=tanggal($row->tgl_pengaduan)?></p>
                        <label style="margin-left: 77px;margin-top: 30px;">
                          <input type="radio" class="flat-green" checked>
                        </label><br>
                        <p style="margin-left: 155px;font-size: 14px;margin-top: -7px;">Selesai</p>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->    
         <?php } ?>
        </div>
      </div>
    </div>

    <div class="site-section" id="login">
      <div class="container">
        <div class="row mt-5">
          <div class="col-12 mb-5 text-center">
            <h2 class="section-title">Login</h2>
          </div>
          <div class="col-lg-6 login" data-aos="fade-right">
            <img src="<?=base_url()?>/assets/front/images/undraw_gift_card_6ekc.svg" alt="Image" class="img-fluid">
          </div>
          <div class="col-lg-6 pl-lg-5 ml-auto" data-aos="fade-left">
            <div style="padding: 20px;">
              <center><span class="text-primary icon-verified_user" style="font-size: 60px;"></span></center>
              <form action="<?=site_url('auth/proses')?>" method="post" class="form">
                <div class="form-group">
                  <label for="username">Username</label>
                  <input type="text" class="form-control" name="username" id="username" placeholder="Username" style="font-family: semua;" required>
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" name="password" id="password" placeholder="Password" style="font-family: semua;" required>
                </div>
                <div class="form-group">
                  <button type="submit" name="login" class="btn btn-sm btn-primary btn-block mt-4">Login</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section" id="daftar">
      <div class="container">
        <div class="row mt-5">
          <div class="col-12 mb-5 text-center">
            <h2 class="section-title">Daftar</h2>
          </div>
          <div class="col-lg-5 pl-lg-5 ml-auto" data-aos="fade-right" style="margin-top: -30px;">
            <div>
              <form action="<?=site_url('masyarakat/tambah')?>" method="post" class="form">
                <div class="form-group">
                  <label for="nik">NIK</label>
                  <input type="number" class="form-control" name="nik" id="nik" placeholder="NIK" min="0" style="font-family: semua; font-size: 14px;" required>
                </div>
                <div class="form-group">
                  <label for="nama">Nama Lengkap</label>
                  <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Lengkap" style="font-family: semua; font-size: 14px;" required>
                </div>
                <div class="form-group">
                  <label for="telepon">Telepon</label>
                  <input type="number" class="form-control" name="telepon" id="telepon" placeholder="Telepon" min="0" style="font-family: semua; font-size: 14px;" required>
                </div>

                <div class="form-group">
                  <label for="usernames">Username</label>
                  <input type="text" class="form-control" name="usernames" id="usernames" placeholder="Username" style="font-family: semua; font-size: 14px;" required>
                </div>
                <div class="form-group">
                  <label for="passwords">Password</label>
                  <input type="password" class="form-control" name="passwords" id="passwords" placeholder="Password" style="font-family: semua; font-size: 14px;" required>
                  <input type="checkbox" id="show" value="lihat" style="float: right; margin-top: -27px; margin-right: 12px;">
                </div>      
                <div class="form-goup">
                  <button type="submit" name="tambah" class="btn btn-sm btn-success btn-block mt-2">Daftar</button>
                </div>
              </form>
            </div>
          </div>
          <div class="col-lg-7 daftars" data-aos="fade-left">
            <img src="<?=base_url()?>/assets/front/images/undraw_metrics_gtu7.svg" alt="Image" class="img-fluid">
          </div>
        </div>
      </div>
    </div>

    <div class="site-section bg-image2 overlay" id="kontak" style="background-image: url('<?=base_url()?>/assets/front/images/hero_1.jpg');">
      <div class="container">
        <div class="row mb-5">
          <div class="col-12 text-center">
            <h2 class="section-title mt-5 mb-3 text-white">Kontak</h2>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-lg-7 mb-5">

            

            <form action="<?=site_url('mail')?>" method="post" class="p-5 bg-white">
              
              <h2 class="h4 text-black mb-5">Kirim Pesan</h2> 

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="namamail">Nama Lengkap</label> 
                  <input type="text" id="namamail" name="namamail" class="form-control" style="font-family: semua; font-size: 14px">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="email">Email</label> 
                  <input type="email" id="email" name="email" class="form-control" style="font-family: semua;font-size: 14px">
                </div>
              </div>

              <div class="row form-group">
                
                <div class="col-md-12">
                  <label class="text-black" for="subjek">Subjek</label> 
                  <input type="text" name="subjek" id="subjek" class="form-control" style="font-family: semua;font-size: 14px">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="pesan">Pesan</label> 
                  <textarea name="pesan" id="pesan" cols="30" rows="7" class="form-control rounded" placeholder="Tulis pesan..." style="font-family: semua;font-size: 14px"></textarea>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <button type="submit" name="kirimpesan" class="btn btn-sm btn-primary mr-2 mb-2"><span class="icon-send"></span> Kirim</button>
                </div>
              </div>

  
            </form>
          </div>
        
        </div>
        
      </div>
    </div>

    <div class="footer py-5 text-center">
      <div class="container">
        <div class="row mb-2">
          <div class="col-12">
            <p class="mb-0" style="font-size: 29px;">
              <a href="#" class="p-3"><span class="icon-facebook"></span></a>
              <a href="#" class="p-3"><span class="icon-twitter"></span></a>
              <a href="#" class="p-3"><span class="icon-instagram"></span></a>
              <a href="#" class="p-3"><span class="icon-whatsapp"></span></a>
              <a href="#" class="p-3"><span class="icon-github"></span></a>
            </p>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <p class="mb-0">
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Sistem Pengaduan Masyarakat Online
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
          </div>
        </div>
      </div>
    </div>
  </div> <!-- .site-wrap -->
  <script src="<?=base_url()?>/assets/front/js/jquery-ui.js"></script>
  <script src="<?=base_url()?>/assets/front/js/popper.min.js"></script>
  <script src="<?=base_url()?>/assets/front/js/bootstrap.min.js"></script>
  <script src="<?=base_url()?>/assets/front/js/owl.carousel.min.js"></script>
  <script src="<?=base_url()?>/assets/front/js/jquery.countdown.min.js"></script>
  <script src="<?=base_url()?>/assets/front/js/bootstrap-datepicker.min.js"></script>
  <script src="<?=base_url()?>/assets/front/js/jquery.easing.1.3.js"></script>
  <script src="<?=base_url()?>/assets/front/js/aos.js"></script>
  <script src="<?=base_url()?>/assets/plugins/iCheck/icheck.min.js"></script>
  <script src="<?=base_url()?>/assets/front/js/jquery.fancybox.min.js"></script>
  <script src="<?=base_url()?>/assets/front/js/jquery.sticky.js"></script>
  <script src="<?=base_url()?>/assets/front/js/main.js"></script>
  <script type="text/javascript">
    $(document).ready(function () {
      $('input[type="radio"].flat-red').iCheck({
      radioClass   : 'iradio_flat-red'
    })
    $('input[type="radio"].flat-blue').iCheck({
      radioClass   : 'iradio_flat-blue'
    })
    $('input[type="radio"].flat-green').iCheck({
      radioClass   : 'iradio_flat-green'
    })
    const loginfail = $('.loginfail').data('loginfail');
    if (loginfail) {
      Swal.fire({
          type: 'error',
          title: 'Gagal!',
          text: loginfail,
          showConfirmButton: false,
          timer: 2000
        });
    }
    const mail = $('.mail').data('mail');
    if (mail) {
      Swal.fire({
          type: 'success',
          title: 'Berhasil!',
          text: mail,
          showConfirmButton: false,
          timer: 2000
        });
    }
    const daftar = $('.daftar').data('daftar');
    if (daftar) {
      Swal.fire({
          type: 'success',
          title: 'Berhasil!',
          text: daftar,
          showConfirmButton: false,
          timer: 2000
        });
    }
    const ceknik = $('.ceknik').data('ceknik');
    if (ceknik) {
      Swal.fire({
          type: 'warning',
          title: 'Peringatan!',
          text: ceknik,
          showConfirmButton: false,
          timer: 2000
        });
    }
    const cekuser = $('.cekuser').data('cekuser');
    if (cekuser) {
      Swal.fire({
          type: 'warning',
          title: 'Peringatan!',
          text: cekuser,
          showConfirmButton: false,
          timer: 2000
        });
    }
  })
  </script>
  </body>
</html>