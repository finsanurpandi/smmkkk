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
              <h3 class="box-title">Hasil Studi Mahasiswa (Semester)</h3>
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
      <tr>
        <th>Semester</th>
        <td>:</td>
        <td><?=$semester.' ('.$sem.')'?></td>
      </tr>
    </table>
</div>

<!-- <div class="col-md-6 col-sm-6 col-xs-12">
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
</div> -->
</div>
<hr/>
<form class="form-inline" method="post">
  <div class="form-group">
    <p class="form-control-static">Semester</p>
  </div>
  <div class="form-group">
    <select name="tahunajaran" id="tahunajaran" class="form-control" style="width:auto;" onchange="this.form.submit();">

<?php
  foreach ($allTa as $key => $value) {
    $smstr = ((substr($value['tahun_ajaran'], 0,4)-$user['angkatan'])*2)+substr($value['tahun_ajaran'], -1);
?>
      <option value="<?=$value['tahun_ajaran']?>"><?=$smstr?></option>

<?php } ?>

    </select>
  </div>
</form>
<hr/>

<div class="table-responsive">
<table id="example1" class="table table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Kode - Nama Matakuliah</th>
                  <th>SKS</th>
                  <th>AM</th>
                  <th>HM</th>
                </tr>
                </thead>
                <tbody>
<?php
$no = 1;
$total = 0;
$totalnilai = 0;
$totalsks = 0;
foreach ($ips as $key => $value) {
?>
                <tr>
                  <td><?=$no?></td>
                  <td><?=$value['kode_matkul'].' - '.$value['nama_matkul']?></td>
                  <td><?=$value['sks']?></td>
                  <td><?=$value['nilai']?></td>
                  <td>
                    <?php
                      switch ($value['nilai']) {
                        case '4':
                          echo "A";
                          break;
                        case '3':
                          echo "B";
                          break;
                        case '2':
                          echo "C";
                          break;
                        case '1':
                          echo "D";
                          break;
                        case '0':
                          echo "E";
                          break;
                        default:
                          # code...
                          break;
                      }
                    ?>
                  </td>
                </tr>
<?php
$no++;
$total += $value['sks'];
if ($value['nilai'] !== null) {
  $totalnilai += ($value['sks'] * $value['nilai']); 
  $totalsks += $value['sks'];
} else {
  continue;
}

}
?>
                </tbody>
                <tfoot>
                <tr>
                  <th></th>
                  <th></th>
                  <th>Total <?=$total?> SKS</th>
                  <th colspan="2">IP Semester => <?=@round($totalnilai/$totalsks, 2)?></th>
                  
                </tr>
                </tfoot>
              </table>
              </div>
              <small>
              <em>Keterangan :</em><br/>
              <em>AM = Angka Mutu</em>
              <br/>
              <em>HM = Huruf Mutu</em>
              </small>


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
  var tahunajaran = document.getElementById('tahunajaran');

    for (var i = 0; i < tahunajaran.options.length; i++) {
      if (tahunajaran.options[i].value == <?=$tahunajaran?>) {
        tahunajaran.options[i].setAttribute('selected', 'true');
      };
    };
  </script>


  