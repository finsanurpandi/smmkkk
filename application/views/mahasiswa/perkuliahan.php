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
        <li class="active">Perkuliahan</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

    <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <i class="fa fa-bullhorn"></i>
              <h3 class="box-title">Jadwal Perkuliahan Mahasiswa</h3>
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
if ($user['program_kekhususan'] == null) {
  echo '-';
} else {
  echo $user['program_kekhususan'];
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

<?php
if ($sttperwalian !== 0) {

?>

<div class="table-responsive">
  <table class="table table-striped">
    <tr class="danger">
      <th>Hari</th>
      <th>Waktu</th>
      <th>Nama Matkul</th>
      <th>Ruang</th>
      <th>Dosen</th>
    </tr>

<?php
$tjadwal = count($jadwal);
$day0 = 0;
$day1 = 0; 
$day2 = 0; 
$day3 = 0; 
$day4 = 0; 
$day5 = 0; 


for ($i=0; $i < $tjadwal; $i++) { 
  switch (strtolower($jadwal[$i]['hari'])) {
    case 'senin':
      $day0 += 1;
      $waktu0[] = date('H:i', strtotime($jadwal[$i]['jam_mulai'])).'-'.date('H:i', strtotime($jadwal[$i]['jam_selesai']));
      $matkul0[] = $jadwal[$i]['kode_matkul'].' - '.$jadwal[$i]['nama_matkul'];
      $ruang0[] = $jadwal[$i]['ruangan'];
      $dosen0[] = $jadwal[$i]['nama_dosen'];
      break;
    case 'selasa':
      $day1 += 1;
      $waktu1[] = date('H:i', strtotime($jadwal[$i]['jam_mulai'])).'-'.date('H:i', strtotime($jadwal[$i]['jam_selesai']));
      $matkul1[] = $jadwal[$i]['kode_matkul'].' - '.$jadwal[$i]['nama_matkul'];
      $ruang1[] = $jadwal[$i]['ruangan'];
      $dosen1[] = $jadwal[$i]['nama_dosen'];
      break;
    case 'rabu':
      $day2 += 1;
      $waktu2[] = date('H:i', strtotime($jadwal[$i]['jam_mulai'])).'-'.date('H:i', strtotime($jadwal[$i]['jam_selesai']));
      $matkul2[] = $jadwal[$i]['kode_matkul'].' - '.$jadwal[$i]['nama_matkul'];
      $ruang2[] = $jadwal[$i]['ruangan'];
      $dosen2[] = $jadwal[$i]['nama_dosen'];
      break;
    case 'kamis':
      $day3 += 1;
      $waktu3[] = date('H:i', strtotime($jadwal[$i]['jam_mulai'])).'-'.date('H:i', strtotime($jadwal[$i]['jam_selesai']));
      $matkul3[] = $jadwal[$i]['kode_matkul'].' - '.$jadwal[$i]['nama_matkul'];
      $ruang3[] = $jadwal[$i]['ruangan'];
      $dosen3[] = $jadwal[$i]['nama_dosen'];
      break;
    case 'jum\'at':
      $day4 += 1;
      $waktu4[] = date('H:i', strtotime($jadwal[$i]['jam_mulai'])).'-'.date('H:i', strtotime($jadwal[$i]['jam_selesai']));
      $matkul4[] = $jadwal[$i]['kode_matkul'].' - '.$jadwal[$i]['nama_matkul'];
      $ruang4[] = $jadwal[$i]['ruangan'];
      $dosen4[] = $jadwal[$i]['nama_dosen'];
      break;
    case 'sabtu':
      $day5 += 1;
      $waktu5[] = date('H:i', strtotime($jadwal[$i]['jam_mulai'])).'-'.date('H:i', strtotime($jadwal[$i]['jam_selesai']));
      $matkul5[] = $jadwal[$i]['kode_matkul'].' - '.$jadwal[$i]['nama_matkul'];
      $ruang5[] = $jadwal[$i]['ruangan'];
      $dosen5[] = $jadwal[$i]['nama_dosen'];
      break;
  }
}

$thari = count($hari);


for ($i=0; $i < $thari; $i++) { 
  $loop = 0;

  for ($j=0; $j < ${'day'.$i} ; $j++) { 
    echo "<tr>";

    if (${'day'.$i} > 1) {
      

      if ($loop < 1) {
        echo "<td rowspan=".${'day'.$i}.">".ucfirst($hari[$i])."</td>";
        $loop += 1;
      }

 
    } else {
      echo "<td>".ucfirst($hari[$i])."</td>";
    }

    echo "<td>".${'waktu'.$i}[$j]."3</td>";
    echo "<td>".${'matkul'.$i}[$j]."</td>";
    echo "<td>".${'ruang'.$i}[$j]."</td>";
    echo "<td>".${'dosen'.$i}[$j]."</td>";
    echo "</tr>";
  }
  
}
echo "</table>";

?>

 </div>

<?php } else { ?>
<div class="alert alert-danger" role="alert"><p class="text-center">Anda belum melakukan perwalian</p></div>
<?php } ?>
<hr/>




<!-- END OF CONTENT  -->
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  