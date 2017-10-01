<?php
$periode = substr($this->session->tahun_ajaran, -1);
switch ($periode) {
  case 1:
    $periode = 1;
    break;
  case 2:
    $periode = 0;
    break;
}

$semester = ((substr($this->session->tahun_ajaran, 0,4)-$mahasiswa['angkatan'])*2)+substr($this->session->tahun_ajaran, -1);
switch ($semester) {
  case 1:
    $sem = 'Satu';
    break;
  case 2:
    $sem = 'Dua';
    break;
  case 3:
    $sem = 'Tiga';
    break;
  case 4:
    $sem = 'Empat';
    break;
  case 5:
    $sem = 'Lima';
    break;
  case 6:
    $sem = 'Enam';
    break;
  case 7:
    $sem = 'Tujuh';
    break;
  case 8:
    $sem = 'Delapan';
    break;
  case 9:
    $sem = 'Sembilan';
    break;
  case 10:
    $sem = 'Sepuluh';
    break;
  case 11:
    $sem = 'Sebelas';
    break;
  case 12:
    $sem = 'Dua Belas';
    break;
  case 13:
    $sem = 'Tiga Belas';
    break;
  case 14:
    $sem = 'Empat Belas';
    break;
}



switch ($mahasiswa['program_kekhususan']) {
  case 'Hukum Keperdataan':
    $pk = 1;
    break;
  case 'Hukum Pidana':
    $pk = 2;
    break;
  case 'Hukum Tata Negara':
    $pk = 3;
    break;
  case '':
    $pk = 0;
    break;
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
        <li class="active">Profil</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

    <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <i class="fa fa-bullhorn"></i>
              <h3 class="box-title">Perwalian Mahasiswa</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body box-profile">

<!-- CONTENT SHOULD BE HERE  -->
<br/>
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12">
  <table class="table borderless">
      <tr>
        <th>NPM</th>
        <td>:</td>
        <td><?=$mahasiswa['npm']?></td>
      </tr>
      <tr>
        <th>Nama</th>
        <td>:</td>
        <td><?=$mahasiswa['nama']?></td>
      </tr>
      <tr>
        <th>Email</th>
        <td>:</td>
        <td><?=$mahasiswa['email']?></td>
      </tr>
      <tr>
        <th>Program Kekhususan</th>
        <td>:</td>
        <td>

<?php
if ($mahasiswa == 7 && $mahasiswa['program_kekhususan'] !== null) {
  echo $mahasiswa['program_kekhususan'];  
} else {
  echo '-';
}

?>

        </td>
      </tr>
      <tr>
        <th>Dosen Wali</th>
        <td>:</td>
        <td>
        <?php
        if ($user['gelar_depan'] == null) {
          echo $user['nama'].', '.$user['gelar_belakang'];
        } else {
          echo $user['gelar_depan'].' '.$user['nama'].', '.$user['gelar_belakang'];
        }
        
        ?>
        </td>
      </tr>
      <tr>
        <th>NIK</th>
        <td>:</td>
        <td><?=$user['nik']?></td>
      </tr>
    </table>
</div>

<div class="col-md-6 col-sm-6 col-xs-12">
  <table class="table borderless">
      <tr>
        <th>Semester</th>
        <td>:</td>
        <td><?=$semester.' ('.$sem.')'?></td>
      </tr>
      <tr>
        <th>IPK</th>
        <td>:</td>
        <td>NAMA</td>
      </tr>
      <tr>
        <th>IPS</th>
        <td>:</td>
        <td>NAMA</td>
      </tr>
      <tr>
        <th>SKS Lulus</th>
        <td>:</td>
        <td>NAMA</td>
      </tr>
      <tr>
        <th>Batas</th>
        <td>:</td>
        <td>NAMA</td>
      </tr>
    </table>
</div>
</div>

<div class="table-responsive">
  <table class="table table-striped">
    <tr class="danger">
      <th>No</th>
      <th>Kode Matkul</th>
      <th>Nama Matkul</th>
      <th>SKS</th>
      <th>Semester</th>
    </tr>

<?php
$no = 1;
$totalSks = 0;
  foreach ($data_krs as $key => $value) {
?>
    <tr>
      <td><?=$no++?></td>
      <td><?=$value['kode_matkul']?></td>
      <td><?=$value['nama_matkul']?></td>
      <td><?=$value['sks']?></td>
      <td><?=$value['semester']?></td>
    </tr>
<?php
  $totalSks += $value['sks'];
  }
?>
  <tr class="danger">
      <th></th>
      <th></th>
      <th></th>
      <th>Total</th>
      <th><?=$totalSks?> SKS</th>
    </tr>
  </table>
</div>
<hr/>

<div class="row">
  <div class="col-md-6 col-xs-12">
    <?php

?>


<strong>Status Validasi Dosen Wali</strong>
    <p class="text-muted">
      <?php
        if ($sttperwalian[0]['v_dosen'] == 0){
          echo "<span class='label label-warning'>Menunggu Validasi</span>";
        } else {
          echo "<span class='label label-success'>Sudah divalidasi</span>";
          echo '<br/>'.$sttperwalian[0]['tgl_v_dosen'];
        }
      ?>
    </p>

<form method="post">
<?php
  if ($sttperwalian[0]['v_dosen'] == 0){
?>
<button class="btn btn-success btn-xs" name="v_dosen" onclick="return confirm('Apakah anda yakin akan memvalidasi perwalian mahasiswa tersebut?')"><i class="fa fa-check"></i> Validasi</button>
<?php } ?>
</form>
<hr/>
<a href="<?=base_url()?>dosen/perwalian" class="btn btn-primary btn-xs"><i class="fa fa-arrow-left"></i> Kembali</a>


  </div>
  <div class="col-md-6 col-xs-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Chat</h3>
      </div>
      <div class="panel-body">
      <table class="table">
<?php

  foreach ($chat as $key => $value) {
    if ($value['from'] == $mahasiswa['nidn']) {
      echo "<tr class='success'><td><strong>You: </strong><br/>";
      echo $value['pesan']."</td></tr>";
    } elseif ($value['from'] == $mahasiswa['npm']) {
      echo "<tr class='warning'><td><strong>Mahasiswa: </strong><br/>";
      echo $value['pesan']."</td></tr>";
    } else {
      echo "<tr class='info'><td><strong>Bagian Akademik: </strong><br/>";
      echo $value['pesan']."</td></tr>";
    }
    
  }
?>


      </table>
      </div>
    </div>

    <form method="post" class="form-horizontal">
      <div class="form-group">
        <div class="col-sm-10">
          <input type="text" id="cMess"  class="form-control" name="message" placeholder="Tulis pesan...">
        </div>
        <div class="col-sm-2">
          <input type="submit" class="form-control btn btn-primary btn-sm" value="Kirim" name="kirimChat">
        </div>
      </div>
    </form>

  </div>
</div>



<!-- END OF CONTENT  -->
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  