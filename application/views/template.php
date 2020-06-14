<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <title>Pengaduan Masyarakat | Masyarakat</title>

  <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <link rel="icon" href="<?=base_url()?>/assets/img/title.png" type="image/x-icon" />
  <link rel="stylesheet" href="<?=base_url()?>/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?=base_url()?>/assets/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?=base_url()?>/assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?=base_url()?>/assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="<?=base_url()?>/assets/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?=base_url()?>/assets/bower_components/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="<?=base_url()?>/assets/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="<?=base_url()?>/assets/plugins/iCheck/all.css">
  <link rel="stylesheet" href="<?=base_url()?>/assets/bower_components/morris.js/morris.css">
  <script src="<?=base_url()?>/assets/bower_components/jquery/dist/jquery.min.js"></script>
  <script src="<?=base_url()?>/assets/bower_components/sweetalert2/dist/sweetalert2.all.min.js"></script>
  <style type="text/css">
  	@font-face{
        font-family: semua;
        src:url(<?=base_url()?>assets/font/Montserrat-Regular.ttf);
    }
    *{
    	font-family: semua;
    	font-weight: 100;
    }
    body{
      font-size: 13px !important;
    }
    th{
      font-weight: 700;
    }
    label{
      font-weight: 400;
    }
    button{
      outline: none !important;
    }
    .content-wrapper {
      min-height: 800px !important;
    }
    .direct-chat-messages {
      height: auto;
    }
    .direct-chat-contacts {
      height: auto;
    }
    .contacts-list-info {
      margin-left: 5px;
    }
    .direct-chat-text {
        margin: 40px 90px 0 5px !important;
    }
    .direct-chat-msg.right .direct-chat-text {
        margin: 5px 5px 0 90px !important;
    }.direct-chat-msg.right .direct-chat-text.edit {
        margin: 90px 5px 0 90px !important;
    }
    .btn{
      outline: none !important;
    }
    .swal2-title{
      font-family: semua !important;
    }
    .swal2-popup{
      font-family: semua !important;
      font-size: 1.6rem !important;
    }
    .user-panel>.info>p{
      font-weight: 400 !important;
    }
    .skin-red .sidebar-form{
      margin: 0 10px 10px !important;
    }
    .treeview>ul.treeview-menu{
      padding: 3px 20px !important;
    }
    .sidebar-menu li i.fa{
      font-size: 17px !important;
    }
    .treeview-menu li i.fa{
      font-size: 12px !important;
    }
    .sidebar-menu>li>a>.fa{
      width: 25px !important;
    }
    .select2-container .select2-selection--single .select2-selection__rendered{
      padding-left: 2px !important;
    }
    .select2-container--default .select2-selection--single .select2-selection__rendered{
      line-height: 29px !important;
    }
    .select2-container--default .select2-selection--single {
      border: 1px solid #d2d6de !important;
      border-radius: 0 !important; 
    }
    .select2-container .select2-selection--single{
      height: 34px !important;
    }
    .select2-container--default .select2-selection--single
    .select2-selection__arrow{
      right: 4px !important;
      top: 4px !important;
    }
    .info-box-content {
        padding: 7px 11px !important;
    }
    .info-box-text{
      text-transform: capitalize !important;
      font-size: 15px !important;
    }
    .info-box-number {
      display: block;
      font-weight: bold;
      margin-top: 10px;
      font-size: 30px;
    }
  </style>
</head>
  <div class="loginsuccess" data-loginsuccess="<?=$this->session->flashdata('loginsuccess')?>"></div>
<body class="hold-transition skin-blue fixed sidebar-mini">
<div class="wrapper">
  <header class="main-header">
<!-- Site wrapper -->
    <!-- Logo -->
    <a href="" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">
        <img src="<?=base_url()?>/assets/img/miniHeader.png" style="width: 40px;">
      </span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">
        <img src="<?=base_url()?>/assets/img/header.png" style="width: 155px;">
      </span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?=base_url()?>/assets/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs">
                Masyarakat
              </span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header" style="height: 177px;">
                <img src="<?=base_url()?>/assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                <p>
                  <?=$this->utility->user_login()->nama?><br>
                  <small>NIK : <?=$this->utility->user_login()->nik?></small>
                  <small>Telepon : <?=$this->utility->user_login()->telp?></small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div align="center">
                  <a href="<?=site_url('auth/logout')?>" class="btn btn-default btn-flat logout" style="color: #dd4b39;"><i class="fa fa-power-off"></i> Logout</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?=base_url()?>/assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?=$this->utility->user_login()->nama?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" class="sidebar-form">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Main Navigation</li>
        <li <?=$this->uri->segment(1) == '' || $this->uri->segment(1) == 'dashboard' ? 'class="active"' : null?>>
          <a href="<?=site_url('dashboard')?>">
            <i class="fa fa-dashboard"></i> <span style="font-size: 13px;">Dashboard</span>
          </a>
        </li>

        <li <?=$this->uri->segment(1) == 'pengaduan' ? 'class="active"' : null?>>
          <a href="<?=site_url('pengaduan')?>">
            <i class="fa fa-exclamation-triangle"></i> <span style="font-size: 13px;">Pengaduan</span>
          </a>
        </li>
        <li <?=$this->uri->segment(1) == 'tanggapan' ? 'class="active"' : null?>>
          <a href="<?=site_url('tanggapan')?>">
            <i class="fa fa-tty"></i> <span style="font-size: 13px;">Tanggapan</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?php echo $contents; ?>
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.18
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->

<script src="<?=base_url()?>/assets/bower_components/moment/min/moment.min.js"></script>
<script src="<?=base_url()?>/assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="<?=base_url()?>/assets/bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="<?=base_url()?>/assets/bower_components/sweetalert2/sweetalert.js"></script>
<script src="<?=base_url()?>/assets/plugins/iCheck/icheck.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?=base_url()?>/assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?=base_url()?>/assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>

<script src="<?=base_url()?>/assets/bower_components/raphael/raphael.min.js"></script>

<!-- DataTables -->
<script src="<?=base_url()?>/assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>/assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- FastClick -->
<script src="<?=base_url()?>/assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url()?>/assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=base_url()?>/assets/dist/js/demo.js"></script>
<script>
  $(document).ready(function () {
    const loginsuccess = $('.loginsuccess').data('loginsuccess');
    if (loginsuccess) {
      Swal.fire({
          type: 'success',
          title: 'Berhasil!',
          text: loginsuccess,
          showConfirmButton: false,
          timer: 2000
        });
    }
    $('.sidebar-menu').tree()
    $('.select2').select2()
    $('.select3').select2()
    //Flat red color scheme for iCheck
    $('input[type="radio"].flat-red').iCheck({
      radioClass   : 'iradio_flat-red'
    })
    $('input[type="radio"].flat-blue').iCheck({
      radioClass   : 'iradio_flat-blue'
    })
    $('input[type="radio"].flat-green').iCheck({
      radioClass   : 'iradio_flat-green'
    })
  })

</script>
</body>
</html>
