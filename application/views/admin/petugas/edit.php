<section class="content-header">
  <h1 style="font-family: semua;">
    Petugas
    <small>Pengguna</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li>Petugas</li>
    <li class="active">Edit</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="box" style="padding-bottom: 30px;">
        <div class="box-header">
          <h3 class="box-title" style="float: left; font-family: semua;">Edit Petugas</h3>
          <a href="<?=site_url('sistem/petugas/data')?>" class="btn btn-sm btn-flat btn-warning" style="float: right;"><i class="fa fa-chevron-left"></i> Kembali</a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        	<div class="col-md-4 col-md-offset-4">
        		<form action="" method="post">
	                <input type="hidden" name="id" value="<?=$row->id_petugas?>">
	                <div class="form-group <?=form_error('nama') ? 'has-error' : null;?>">
	                  <label for="nama">Nama Lengkap</label>
	                  <input type="text" class="form-control" value="<?=$this->input->post('nama') ?? $row->nama_petugas?>" name="nama" id="nama" >
	                  <span class="help-block"><?=form_error('nama')?></span>
	                </div>
	                <div class="form-group <?=form_error('telepon') ? 'has-error' : null;?>">
	                  <label for="telepon">Telepon</label>
	                  <input type="number" class="form-control" value="<?=$this->input->post('telepon') ?? $row->telp?>" name="telepon" id="telepon" >
	                  <span class="help-block"><?=form_error('telepon')?></span>
	                </div>
	                <div class="form-group <?=form_error('level') ? 'has-error' : null;?>">
		                <label for="level">Level</label>
		                <select class="form-control select2" id="level" name="level">
	                    <option disabled selected>- pilih -</option>
	                    <?php $level = $this->input->post('level') ? $this->input->post('level') : $row->level ?>
	                    <option value="admin" <?=$level == 'admin' ? 'selected' : null ?>>Administrator</option>
	                    <option value="petugas" <?=$level == 'petugas' ? 'selected' : null ?>>Petugas</option>
		                </select>
	                  	<span class="help-block"><?=form_error('level')?></span>
			        </div>
	                <div class="form-group <?=form_error('username') ? 'has-error' : null;?>">
	                  <label for="username">Username</label>
	                  <input type="text" class="form-control" value="<?=$this->input->post('username') ?? $row->username?>" name="username" id="username" >
	                  <span class="help-block"><?=form_error('username')?></span>
	                </div>
	                <div class="form-group <?=form_error('password') ? 'has-error' : null;?>">
	                  <label for="password">Password</label>
	                  <input type="password" value="<?=$this->input->post('password') ?? $row->password?>" class="form-control" name="password" id="password">
	                  <span class="help-block"><?=form_error('password')?></span>
	                </div>
	                <div class="form-group <?=form_error('passwordconf') ? 'has-error' : null;?>">
	                  <label for="passwordconf">Konfirmasi Password</label>
	                  <input type="password" value="<?=$this->input->post('password') ?? $row->password?>" class="form-control" name="passwordconf" id="passwordconf">
	                  <span class="help-block"><?=form_error('passwordconf')?></span>
	                </div>
	                <div class="checkbox">
	                  <label>
	                    <input type="checkbox" id="show"> Show password
	                  </label>
	                </div>
	              	<button type="submit" name="edit" class="btn btn-sm btn-success"><i class="fa fa-paper-plane"></i> Simpan</button>
	              	<button type="reset" class="btn btn-sm btn-default"><i class="fa fa-refresh"></i> Batal</button>
	            </form>
        	</div>
     
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
</section>
<script type="text/javascript">
    $(document).ready(function(){       
        $('#show').click(function(){
            if($(this).is(':checked')){
                $('#password').attr('type','text');
                $('#passwordconf').attr('type','text');
            }else{
                $('#password').attr('type','password');
                $('#passwordconf').attr('type','password');
            }
        });
    });
</script>