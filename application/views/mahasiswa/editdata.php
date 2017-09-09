<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Selamat datang, <?=$user['nama']?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Profil</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

    <!-- About Me Box -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <i class="fa fa-bullhorn"></i>
              <h3 class="box-title">Edit Data Mahasiswa</h3>
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
                <li><a href="#orangtua" data-toggle="tab" id="editOrtuMhs">Orang Tua</a></li>
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
                  <label for="exampleInputEmail1">NPM</label>
                  <input class="form-control" value="<?=$user['npm']?>" disabled>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Nama Mahasiswa</label>
                  <input class="form-control" value="<?=$user['nama']?>" disabled>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Kelas</label>
                  <input class="form-control" value="<?=$user['kelas']?>" disabled>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Tahun Masuk</label>
                  <input class="form-control" value="<?=$user['angkatan']?>" disabled>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Tempat Lahir</label>
                  <input type="text" class="form-control" name="tempat_lahir" value="<?=$user['tempat_lahir']?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Tanggal Lahir</label>
                  <input type="date" class="form-control" name="tanggal_lahir" value="<?=$user['tanggal_lahir']?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Alamat</label>
                  <textarea class="form-control" name="alamat" rows="3"><?=$user['alamat']?>
                  </textarea>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">No Telepon</label>
                  <input type="number" class="form-control" name="no_tlp" value="<?=$user['no_tlp']?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email</label>
                  <input type="email" class="form-control" name="email" value="<?=$user['email']?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Status Tempat Tinggal</label>
                  <select class="form-control" name="stt_tempat_tinggal" id="tempat_tinggal">
                    <option>Rumah Sendiri</option>
                    <option>Rumah Orang Tua</option>
                    <option>Kontrakan</option>
                    <option>Asrama</option>
                  </select>
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
                <div class="tab-pane" id="orangtua">
<!-- FORM EDIT ORANG TUA -->
<?php
  if (@$this->session->flashdata('ortusuccess') == true) {
?>
    <div class="alert alert-success">Data berhasil di-update!
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
                  <label for="exampleInputEmail1">Nama Ayah</label>
                  <input class="form-control" name="nama_ayah" value="<?=$ortu['nama_ayah']?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Ibu</label>
                  <input type="text" class="form-control" name="nama_ibu" value="<?=$ortu['nama_ibu']?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Alamat</label>
                  <textarea class="form-control" name="alamat" rows="3"><?=$ortu['alamat']?>
                  </textarea>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">No Telepon</label>
                  <input type="number" class="form-control" name="no_tlp" value="<?=$ortu['no_tlp']?>">
                </div>
               
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary btn-xs" name="updateOrtu"><i class="fa fa-refresh"></i> Update</button>
              </div>
            </form>
<!-- END OF FORM EDIT ORANG TUA -->                  
                </div>
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

  // Tempat Tinggal
  var tempatTinggal = document.getElementById('tempat_tinggal');

  for (var i = 0; i < tempatTinggal.options.length; i++) {
    if (tempatTinggal.options[i].value == "<?=$user['status_tempat_tinggal']?>") {
      tempatTinggal.options[i].setAttribute('selected', 'true');
    };
  };

  var uri = "<?=current_full_url()?>";

</script>

  