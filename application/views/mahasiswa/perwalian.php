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

$semester = ((substr($this->session->tahun_ajaran, 0,4)-$user['angkatan'])*2)+substr($this->session->tahun_ajaran, -1);
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



switch ($user['program_kekhususan']) {
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
        <td><?=$user['npm']?></td>
      </tr>
      <tr>
        <th>Nama</th>
        <td>:</td>
        <td><?=$user['nama']?></td>
      </tr>
      <tr>
        <th>Email</th>
        <td>:</td>
        <td><?=$user['email']?></td>
      </tr>
      <tr>
        <th>Program Kekhususan</th>
        <td>:</td>
        <td>
        
<?php
if ($semester == 7 && $user['program_kekhususan'] == null) {
?>

<form class="form-inline" method="post">
  <div class="form-group">
    <select name="programkekhususan" class="form-control" style="width:auto;">
      <option value="Hukum Keperdataan">Hukum Keperdataan</option>
      <option value="Hukum Pidana">Hukum Pidana</option>
      <option value="Hukum Tata Negara">Hukum Tata Negara</option>
    </select>
  </div>
  <div class="form-group">
    <input type="submit" class="form-control btn btn-primary btn-sm" value="Pilih" name="pilihPk">
  </div>
</form>

<?php
} elseif ($semester == 7 && $user['program_kekhususan'] !== null) {
  echo $user['program_kekhususan'];  
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
        if ($dosen_wali['gelar_depan'] == null) {
          echo $dosen_wali['nik'].' - '.$dosen_wali['nama'].', '.$dosen_wali['gelar_belakang'];
        } else {
          echo $dosen_wali['nik'].' - '.$dosen_wali['gelar_depan'].' '.$dosen_wali['nama'].', '.$dosen_wali['gelar_belakang'];
        }
        
        ?>
        </td>
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
      <th>Add/Drop</th>
    </tr>

<?php
$no = 1;
$totalSks = 0;
$id_matkul = array();
  foreach ($data_krs as $key => $value) {
?>
    <tr>
      <td><?=$no++?></td>
      <td><?=$value['kode_matkul']?></td>
      <td><?=$value['nama_matkul']?></td>
      <td><?=$value['sks']?></td>
      <td><?=$value['semester']?></td>
      <td>
      <?php
        if (($sttperwalian[0]['v_dosen'] == 1) || ($sttperwalian[0]['v_baa'] == 1)) {
      ?>
      <a href="#" class="btn btn-default btn-xs disabled"><i class="fa fa-remove"></i> drop</a>
      <?php } else {
      ?>
      <form method="post">
        <input type="hidden" name="id" value="<?=$value['id']?>">
        <button class="btn btn-danger btn-xs" name="drop_matkul" onclick="return confirm('Apakah anda yakin akan menghapus matakuliah <?=$value['nama_matkul']?>')"><i class="fa fa-remove"></i> drop</button>
      </form>
      <?php } ?>
      </td>
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
      <th>
      <?php
        if (($sttperwalian[0]['v_dosen'] == 1) || ($sttperwalian[0]['v_baa'] == 1)) {
      ?>
      <a href="#" class="btn btn-default btn-xs disabled"><i class="fa fa-plus"></i> add</a>
      <?php } else {
      ?>
      <a href="<?=base_url()?>mahasiswa/add" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> add</a>
      <?php } ?>
      </th>
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
          echo "<span class='label label-danger'><i class='fa fa-close'></i> Menunggu Validasi </span>";
        } else {
          echo "<span class='label label-success'><i class='fa fa-check'></i> Sudah disetujui pada tanggal ".date('d-m-Y H:i',strtotime($sttperwalian[0]['tgl_v_dosen']))." WIB</span>";
        }
      ?>
    </p>

<strong>Status Validasi Bagian Akademik</strong>
    <p class="text-muted">
      <?php
        if ($sttperwalian[0]['v_baa'] == 0){
          echo "<span class='label label-danger'><i class='fa fa-close'></i> Menunggu Validasi </span>";
        } else {
          echo "<span class='label label-success'><i class='fa fa-check'></i> Sudah disetujui pada tanggal ".date('d-m-Y H:i',strtotime($sttperwalian[0]['tgl_v_baa']))." WIB</span>";
        }
      ?>
    </p>

<?php
  if (($sttperwalian[0]['v_dosen'] == 0) || ($sttperwalian[0]['v_baa'] == 0)) {
?>
<a href="#" class="btn btn-primary btn-sm disabled"><i class="fa fa-print"></i> Cetak KRS</a>
<?php
  } else {
?>
<a href="#" class="btn btn-primary btn-sm" onclick="window.print();"><i class="fa fa-print"></i> Cetak KRS</a>
<?php } ?>



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
    if ($value['from'] == $user['nidn']) {
      echo "<tr class='success'><td><strong>Dosen Wali: </strong><br/>";
      echo $value['pesan']."</td></tr>";
    } elseif ($value['from'] == $user['npm']) {
      echo "<tr class='warning'><td><strong>You: </strong><br/>";
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


  