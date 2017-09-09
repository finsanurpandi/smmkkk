<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Selamat datang, <?=$user['nama']?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Profil</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

    <!-- About Me Box -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <i class="fa fa-bullhorn"></i>
              <h3 class="box-title">Profil Mahasiswa</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body box-profile">
            
<!-- CONTENT SHOULD BE HERE ... -->
<!-- PROFIL -->
<!-- About Me Box -->
            <!-- /.box-header -->
<div class="box-body box-profile">
<div class="row">
        <div class="col-md-2 text-center">
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
          
        </div> <!-- col-md-2 -->

<div class="col-md-10">

    <strong>NPM</strong>
    <p class="text-muted">
      <?=$user['npm']?>
    </p>

    <strong>Nama</strong>
    <p class="text-muted">
      <?=$user['nama']?>
    </p>

    <strong>Angkatan</strong>
    <p class="text-muted">
      <?=$user['angkatan']?>
    </p>

    <strong>Kelas</strong>
    <p class="text-muted">
      <?=$user['kelas']?>
    </p>

    <strong>Jenis Kelamin</strong>
    <p class="text-muted">
      <?php
      if ($user['jenis_kelamin'] == 'L') {
        echo "Laki-Laki";
      } else {
        echo "Perempuan";
      }
      ?>
    </p>

    <strong>Program Kekhususan</strong>
    <p class="text-muted">
      <?php

      if ($user['program_kekhususan'] == null) {
        echo "-";
      } else {
        echo $user['program_kekhususan'];
      }
      
      ?>
    </p> 

    <strong>Dosen Wali</strong>
    <p class="text-muted">
      <?=$user['nidn']?>
    </p>   


</div> <!-- col-md-10 -->      
</div> <!-- ROW -->
<hr/>

<div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Profile</a></li>
    <li role="presentation"><a href="#orangtua" aria-controls="messages" role="tab" data-toggle="tab">Orang Tua</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <!-- PROFILE -->
    <div role="tabpanel" class="tab-pane fade in active" id="profile"> 
      <table class="table" style="width: 100%">
        <tr>
          <td width="20%"><strong>Jenis Kelamin</strong></td>
          <td width="5%">:</td>
          <td width="75%">
            <?php
              if ($user['jenis_kelamin'] == 'L') {
                echo "Laki-Laki";
              } else {
                echo "Perempuan";
              }
            ?>
          </td>
        </tr>
        <tr>
          <td><strong>Tempat Lahir</strong></td>
          <td>:</td>
          <td><?=$user['tempat_lahir']?></td>
        </tr>
        <tr>
          <td><strong>Tanggal Lahir</strong></td>
          <td>:</td>
          <td><?=$user['tempat_lahir']?></td>
        </tr>
        <tr>
          <td><strong>Alamat</strong></td>
          <td>:</td>
          <td><?=$user['alamat']?></td>
        </tr>
        <tr>
          <td><strong>No Telepon</strong></td>
          <td>:</td>
          <td><?=$user['no_tlp']?></td>
        </tr>
        <tr>
          <td><strong>Email</strong></td>
          <td>:</td>
          <td><?=$user['email']?></td>
        </tr>
        <tr>
          <td><strong>Status Tempat Tinggal</strong></td>
          <td>:</td>
          <td><?=$user['status_tempat_tinggal']?></td>
        </tr>
      </table>
      <a href="<?=base_url()?>mahasiswa/editdata?tab=profile" class="btn btn-success btn-xs">Edit Data</a>
    </div>
    
    <!-- ORANG TUA -->
    <div role="tabpanel" class="tab-pane fade" id="orangtua">
      <table class="table" style="width: 100%">
        <tr>
          <td width="20%"><strong>Nama Ayah</strong></td>
          <td width="5%">:</td>
          <td width="75%"><?=$ortu['nama_ayah']?></td>
        </tr>
        <tr>
          <td><strong>Nama Ibu</strong></td>
          <td>:</td>
          <td><?=$ortu['nama_ibu']?></td>
        </tr>
        <tr>
          <td><strong>Alamat</strong></td>
          <td>:</td>
          <td><?=$ortu['alamat']?></td>
        </tr>
        <tr>
          <td><strong>No Telepon</strong></td>
          <td>:</td>
          <td><?=$ortu['no_tlp']?></td>
        </tr>
        
      </table>
      <a href="<?=base_url()?>mahasiswa/editdata?tab=orangtua" class="btn btn-success btn-xs">Edit Data</a>
    </div>
  </div>

</div>


</div> <!-- Box Body -->
              

<br/>


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
</script>

  