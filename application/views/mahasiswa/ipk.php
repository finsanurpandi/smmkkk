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
              <h3 class="box-title">Hasil Studi Mahasiswa (Kumulatif)</h3>
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
      <tr>
        <th>Semester</th>
        <td>:</td>
        <td><?=$semester.' ('.$sem.')'?></td>
      </tr>
    </table>
</div>

<!--   -->
</div>

<div class="table-responsive">
  <table class="table table-striped">
    <tr class="info">
      <th>No</th>
      <th>Kode MK</th>
      <th>Nama MK</th>
      <th>SKS</th>
      <th>Nilai</th>
    </tr>
<form method="post" onsubmit="return confirm('Apakah anda yakin dengan matakuliah yang dipilih?')">
<?php
$totalsks = 0;
$totalnilai = 0;
  for ($i=1; $i <= 8; $i++) {

      
    if ($i !== 7) {
?>
    <tr class="success">
      <th colspan="5">Semester <?=$i?></th>
    </tr>
<?php
    } else {
?>
    <tr class="success">
      <th colspan="5">Semester <?=$i?> - Program Kekhususan : <?=$user['program_kekhususan']?></th>
    </tr>

<?php
    }
$no = 1;
$color = null;
    foreach ($mk as $key => $value) {

      if ($value['semester'] == $i && ($value['program_kekhususan'] == 0 || $value['program_kekhususan'] == $pk)) {
        foreach ($ipk as $key => $hasil) {
          if ($hasil['id_matkul'] == $value['id']) {
            if ($hasil['nilai'] == 0) {
            
?>
      <tr class="danger">
<?php
            } else if ($hasil['nilai'] == 1){
              echo "<tr class='warning'>";
            } else {
              echo "<tr>";
            }
          }
        }
?>
        <td><?=$no++?></td>
        <td><?=$value['kode_matkul']?></td>
        <td><?=$value['nama_matkul']?></td>
        <td><?=$value['sks']?></td>
        <td>
          <?php
            foreach ($ipk as $key => $nilai) {
              if ($nilai['id_matkul'] == $value['id']) {

                    switch ($nilai['nilai']) {
                        case '4':
                          echo "A";
                          $totalsks += $nilai['sks'];
                          $totalnilai += ($nilai['sks']*$nilai['nilai']);
                          break;
                        case '3':
                          echo "B";
                          $totalsks += $nilai['sks'];
                          $totalnilai += ($nilai['sks']*$nilai['nilai']);
                          break;
                        case '2':
                          echo "C";
                          $totalsks += $nilai['sks'];
                          $totalnilai += ($nilai['sks']*$nilai['nilai']);
                          break;
                        case '1':
                          echo "D";
                          $totalsks += $nilai['sks'];
                          $totalnilai += ($nilai['sks']*$nilai['nilai']);
                          break;
                        case '0':
                          echo "E";
                          $totalsks += $nilai['sks'];
                          $totalnilai += ($nilai['sks']*$nilai['nilai']);
                          break;
                        default:
                          # code...
                          break;
                      }

              }

            }
            
          ?>
        </td>
      </tr>
<?php

      }
    
  }
$no = 1;
  }
?>
  </div>
  <tr class="info">
      <th></th>
      <th></th>
      <th>Total SKS</th>
      <th><?=$totalsks?> SKS</th>
      <th><?=@round($totalnilai/$totalsks, 2)?></th>
    </tr>
  
    
  </table>
  
</form> 

<!-- END OF CONTENT  -->
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<script type="text/javascript">
  var semesterMhs = "<?=$semester?>";
  var pk = "<?=$user['program_kekhususan']?>";
</script>
  