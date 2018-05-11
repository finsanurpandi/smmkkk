<?php
        if ($user['gelar_depan'] == null) {
          $nama = $user['nama'].', '.$user['gelar_belakang'];
        } else {
          $nama = $user['gelar_depan'].' '.$user['nama'].', '.$user['gelar_belakang'];  
        }

    if ($user['jenis_kelamin'] == 'L') {
        $jk = "Laki-Laki";
      } else {
        $jk =  "Perempuan";
      }
?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Selamat datang, <?=$user['nama']?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?=base_url()?>dosen/profil">Profil</a></li>
        <li class="active">Edit Profil</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

    <!-- About Me Box -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <i class="fa fa-bullhorn"></i>
              <h3 class="box-title">Edit Data Dosen</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body box-profile">
            
<!-- CONTENT SHOULD BE HERE ... -->
<div class="row" style="min-height:300px;">
    <div  class="col-sm-10">
        <div class="col-xs-12 col-md-4">
            <!-- required for floating -->
            <!-- Nav tabs -->
            <ul class="nav nav-tabs tabs-left">
                <li class="active"><a href="#profile" data-toggle="tab" id="editProfilMhs">Profil</a></li>
                <li><a href="#password" data-toggle="tab" id="editPassDosen">Ubah Password</a></li>
                <li><a href="<?=base_url()?>dosen/profil"><i class="fa fa-arrow-left"/></i> Kembali</a></li>
            </ul>
        </div>
        <div class="col-xs-12 col-md-8">
            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane active" id="profile">
<!-- FORM EDIT PROFILE -->
<!-- error message for upload file -->
<!-- error message for upload file -->
<?php
if ($error == true) {
?>

<div class="alert alert-danger alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <h4><i class="icon fa fa-ban"></i> Alert!</h4>
  <?=$error?>
</div>

<?php } ?>

<?php
  if (@$this->session->flashdata('profilsuccess') == true) {
?>
    <div class="alert alert-success">Data berhasil di-update!
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>

<?php
  }
?>
            <form role="form" method="post" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">NIDN</label>
                  <input class="form-control" value="<?=$user['nidn']?>" disabled>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">NIK</label>
                  <input class="form-control" value="<?=$user['nik']?>" disabled>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama</label>
                  <input class="form-control" value="<?=$nama?>" disabled>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Jenis Kelamin</label>
                  <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                    <option>Laki-laki</option>
                    <option>Perempuan</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Tempat Lahir</label>
                  <input type="text" class="form-control" name="tempat_lahir" value="<?=$user['tempat_lahir']?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Tanggal Lahir</label>
                  <input type="date" class="form-control" name="tgl_lahir" value="<?=$user['tgl_lahir']?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Jabatan Fungsional</label>
                  <input class="form-control" value="<?=$user['jabatan_fungsional']?>" disabled>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Golongan</label>
                  <input class="form-control" value="<?=$user['golongan']?>" disabled>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">No Telepon</label>
                  <input type="number" class="form-control" name="no_hp" value="<?=$user['no_hp']?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email</label>
                  <input type="email" class="form-control" name="email" value="<?=$user['email']?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Picture Image</label>
                  <div class="row">
                    <div class="col-md-2">
                      <?php
                      if ($user['image'] == null) {
                        if ($user['jenis_kelamin'] == 'L') {
                          echo "<img src='".base_url('assets/uploads/profiles/default_male.jpg')."' class='profile-user-img img-responsive img-circle' alt='User Image'>";
                        } else {
                          echo "<img src='".base_url('assets/uploads/profiles/default_female.jpg')."' class='profile-user-img img-responsive img-circle' alt='User Image'>";
                        };
                      } else {
                      ?>
                        <img src="<?=base_url('assets/uploads/profiles/'.$user['image'])?>" class="profile-user-img img-responsive img-circle" alt="User Image">
                      <?php
                      } 
                     ?>
                    </div>
                    <div class="col-md-8">
                      <input type="file" id="exampleInputFile" name="gambar">
                      <input type="hidden" name="path" value="<?=$user['image']?>">
                      <p class="help-block">- Disarankan menggunakan gambar dengan ratio 1:1</p>
                      <p class="help-block">- Kosongkan jika tidak akan mengganti picture image</p>
                    </div>
                  </div>
                  
                </div>
                <!-- <div class="checkbox">
                  <label>
                    <input type="checkbox"> Check me out
                  </label>
                </div> -->
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary btn-xs" name="updateProfil">Update</button>
              </div>
            </form>
<!-- END OF FORM EDIT PROFILE -->
                </div>
<div class="tab-pane" id="password">
<!-- FORM EDIT PASSWORD -->
<?php
  if (@$this->session->flashdata('passsuccess') == true) {
?>
    <div class="alert alert-danger">Password salah
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>

<?php
  }
?>
            <form role="form" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Password Lama</label>
                  <input type="password" class="form-control" name="passOld" value="" id="passOld" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Password Baru</label>
                  <input type="password" class="form-control" name="passNew" value="" id="passNew" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Konfirmasi Password</label>
                  <input type="password" class="form-control" name="passConf" value="" id="passConf" required>
                </div>
                <input type="hidden" value="<?=$login['password']?>" name='userPass' id="userPass">
               <div id="messageError" style="color:red;">

               </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary btn-xs" name="updatePass" disabled="true" id="btnSubmitPass"><i class="fa fa-refresh"></i> Update</button>
              </div>
            </form>
<!-- END OF FORM EDIT PASSWORD -->                 
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>


<!-- END OF CONTENT -->

            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<script type="text/javascript">
  var baseurl = "<?=base_url()?>";

  // Jenis Kelamin
  var jeniskelamin = document.getElementById('jenis_kelamin');

  for (var i = 0; i < jeniskelamin.options.length; i++) {
    if (jeniskelamin.options[i].value == "<?=$jk?>") {
      jeniskelamin.options[i].setAttribute('selected', 'true');
    };
  };

  var uri = "<?=current_full_url()?>";

  var passNew = document.getElementById('passNew');
  var passConf = document.getElementById('passConf');
  var messageError = document.getElementById('messageError');
  var btnSubmitPass = document.getElementById('btnSubmitPass');

  passNew.onkeyup = function(){
    if (this.value !== passConf.value) {
      messageError.innerHTML = "*Password baru dan konfirmasi tidak sama";
    } else {
      messageError.innerHTML = "";
    }
  }

  passConf.onkeyup = function(){
    if (this.value !== passNew.value) {
      messageError.innerHTML = "*Password baru dan konfirmasi tidak sama";
      btnSubmitPass.disabled = true;
    } else {
      messageError.innerHTML = "";
      btnSubmitPass.disabled = false;
    }
  }

</script>

  