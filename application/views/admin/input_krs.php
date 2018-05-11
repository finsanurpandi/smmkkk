<?php

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
              <h3 class="box-title">Kartu Rencana Studi (KRS)</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body box-profile">

<!-- CONTENT SHOULD BE HERE  -->
            
<br/>

<form class="" method="post" action="">
        <div class="form-group">
            <label for="npm">NPM - Nama Mahasiswa</label>
            <select class="form-control select3" style="width:100%;" name="npm">
              <option selected="selected"></option>
              <?php
                foreach ($mahasiswa as $key => $value) {
              ?>
              <option value="<?=$value['npm']?>"><?=$value['npm'].' - '.$value['nama']?></option>
              <?php } ?>
            </select>
        </div>
  <div class="form-group">
    <label>Tahun Akademik</label>
    <select name="tahunajaran" id="tahunajaran" class="form-control" style="width:auto;" onchange="this.form.submit();">
    <option value="">--</option>

<?php
  foreach ($allTa as $key => $value) {
?>
      <option value="<?=$value['tahun_ajaran']?>"><?=$value['tahun_ajaran']?></option>

<?php } ?>

    </select>
  </div>
</form>
<hr/>
<?php
  if ($krs == true) {
$periode = substr($ta, -1);
switch ($periode) {
  case 1:
    $periode = 1;
    break;
  case 2:
    $periode = 0;
    break;
}

$semester = ((substr($this->session->tahun_ajaran, 0,4)-$mhs['angkatan'])*2)+substr($this->session->tahun_ajaran, -1);
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



switch ($mhs['program_kekhususan']) {
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
<form method="post" onsubmit="return confirm('Apakah anda yakin dengan matakuliah yang dipilih?')">
<h3>NPM - Nama Mahasiswa : <?=$mhs['npm'].' - '.$mhs['nama']?></h3>
<h3>Tahun Akademik : <?=@$ta?></h3>
<div class="table-responsive">
  <table class="table table-striped">
    <tr class="info">
      <th>No</th>
      <th>Kode MK</th>
      <th>Nama MK</th>
      <th>SKS</th>
      <th>Pilih</th>
    </tr>
<?php

  for ($i=1; $i <= 8; $i++) {
    if ($i % 2 == $periode) {
      
    if ($i !== 7) {
?>
    <tr class="success">
      <th colspan="5">Semester <?=$i?></th>
    </tr>
<?php
    } else {
?>
    <tr class="success">
      <th colspan="5">Semester <?=$i?> - Program Kekhususan : <?=$mhs['program_kekhususan']?></th>
    </tr>

<?php
    }
$no = 1;
    foreach ($mk as $key => $value) {
      if ($value['semester'] == $i && ($value['program_kekhususan'] == 0 || $value['program_kekhususan'] == $pk)) {
?>
      <tr>
        <td><?=$no++?></td>
        <td><?=$value['kode_matkul']?></td>
        <td><?=$value['nama_matkul']?></td>
        <td><?=$value['sks']?></td>
        <td>
          <input type="checkbox" class="checkbox1" name="kode_matkul[]" value="<?=$value['id'].','.$value['kode_matkul']?>" data-valuetwo="<?=$value['sks']?>">
        </td>
      </tr>
<?php
      }
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
      <th><i id="sum"></i></th>
      <th>SKS</th>
    </tr>
  <tr>
      <th></th>
      <th></th>
      <th>
        <span class="pull-right">Periksa kembali pilihan matakuliahnya sebelum menekan tombol PILIH</span>
      </th>
      <th colspan="2">
        <input type="hidden" name="totalSks" id="totalSks" >
        <input type="hidden" name="npm" value="<?=$mhs['npm']?>">
        <input type="hidden" name="kelas" value="<?=$mhs['kelas']?>">
        <input type="hidden" name="tahun_ajaran" value="<?=$ta?>">
        <input type="hidden" name="submitKrs" value="Pilih" class="btn btn-primary btn-sm">
        <button type="submit" class="btn btn-primary btn-sm">
          <i class='fa fa-check'></i> Pilih
        </button>
      </th>
    </tr>
    
  </table>
  
</form> 

<?php } ?>

<!-- END OF CONTENT  -->
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<script src="https://code.jquery.com/jquery-2.2.3.min.js" integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo=" crossorigin="anonymous"></script>
<!-- bootstrap color picker -->
<script src="<?=base_url()?>assets/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
<script src="<?=base_url()?>assets/plugins/select2/select2.full.min.js"></script>

<script type="text/javascript">

  var semesterMhs = "<?=$semester?>";
  var pk = "<?=$user['program_kekhususan']?>";

  var tahunajaran = document.getElementById('tahunajaran');

    for (var i = 0; i < tahunajaran.options.length; i++) {
      if (tahunajaran.options[i].value == <?=$tahunajaran?>) {
        tahunajaran.options[i].setAttribute('selected', 'true');
      };
    };

  $(function () {
    $(".select2").select2();
  });
</script>
  