<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Selamat datang, 
        <?php
        if ($user['gelar_depan'] == null) {
          echo $user['nama'].', '.$user['gelar_belakang'];
        } else {
          echo $user['gelar_depan'].' '.$user['nama'].', '.$user['gelar_belakang'];
        }
        ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Detail Jadwal</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

    <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <i class="fa fa-bullhorn"></i>
              <h3 class="box-title">Detail Jadwal Perkuliahan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body box-profile">
            <strong>Kode - Matakuliah</strong>
            <p class="text-muted">
              <?=$jadwal['kode_matkul'].' - '.$jadwal['nama_matkul']?>
            </p>

            <strong>Hari, Waktu</strong>
            <p class="text-muted">
              <?=$jadwal['hari'].' - '.date('H:i', strtotime($jadwal['jam_mulai'])).'-'.date('H:i', strtotime($jadwal['jam_selesai']))?> WIB
            </p>

            <strong>Ruangan</strong>
            <p class="text-muted">
              <?=$jadwal['ruangan']?>
            </p>

            <a href="<?=base_url()?>dosen/nilai" class="btn btn-primary btn-xs"><i class="fa fa-arrow-left"></i> kembali</a>
            
            <hr/>
<?php
if ($stt_penilaian !== 0) {
  $i = 1;
?>
    <div class="alert alert-success">Anda telah Mengisi data nilai pada <?=$stt_penilaian_row['log']?>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      <br/>
    </div>
<em>*Jika ada perubahan, harap hubungi bagian akademik</em>
<hr/>
<div class="table-responsive">
<table class="table table-hover">
<thead>
  <tr>
    <th>#</th>
    <th>NPM</th>
    <th>NAMA</th>
    <th>TUGAS</th>
    <th>UTS</th>
    <th>UAS</th>
    <th>Nilai Akhir</th>
    <th>Huruf Mutu</th>
  </tr>
<?php
  foreach ($nilai as $key => $value) {
?>
  <tr>
    <td><?=$i++?></td>
    <td><?=$value['npm']?></td>
    <td><?=$value['nama_mhs']?></td>
    <td><?=$value['tugas']?></td>
    <td><?=$value['uts']?></td>
    <td><?=$value['uas']?></td>
    <td><?=$value['nilai_akhir']?></td>
    <td>
<?php
  switch ($value['nilai']) {
    case 4:
      echo "A";
      break;
    case 3:
      echo "B";
      break;
    case 2:
      echo "C";
      break;
    case 1:
      echo "D";
      break;
    case 0:
      echo "E";
      break;
    default:
      echo "T";
      break;
  }
?>
    </td>
  </tr>
<?php } ?>
</thead>
</table>
</div>

<?php
} else {
?>
            <div class="table-responsive">
            <form method="post">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>No</th>
                  <th>NPM</th>
                  <th>Nama Mahasiswa</th>
                  <th width="10%">TUGAS</th>
                  <th width="10%">UTS</th>
                  <th width="10%">UAS</th>
                  <th width="10%">Nilai Akhir</th>
                  <th>Huruf Mutu</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                $index = 0;
                foreach ($krs as $key => $value) {
                  $semester_mhs = ((substr($value['tahun_ajaran'], 0, 4) - $value['angkatan'])*2)+substr($value['tahun_ajaran'], -1);
                ?>
                  <tr>
                    <td><?=$no++?></td>
                    <td><?=$value['npm']?></td>
                    <td><?=$value['nama']?></td>
                    <td><input type="number" class="form-control" name="tugas[]"></td>
                    <td><input type="number" class="form-control" name="uts[]"></td>
                    <td><input type="number" class="form-control" name="uas[]"></td>
                    <td><input type="number" class="form-control" name="nilai_akhir[]"></td>
                    <td>
<input type="hidden" name="npm[]" value="<?=$value['npm']?>">
<input type="hidden" name="id_jadwal[]" value="<?=$value['id_jadwal']?>">
<input type="hidden" name="id_matkul[]" value="<?=$value['id_matkul']?>">
<input type="hidden" name="tahun_ajaran[]" value="<?=$value['tahun_ajaran']?>">
<input type="hidden" name="nidn[]" value="<?=$value['nidn']?>">
<input type="hidden" name="semester_mhs[]" value="<?=$semester_mhs?>">
<select class="form-control" name="nilai[]">
  <option value="">---</option>
  <option value="4">A</option>
  <option value="3">B</option>
  <option value="2">C</option>
  <option value="1">D</option>
  <option value="0">E</option>
  <option value="">T</option>  
</select>

<!-- <label class="radio-inline">
  <input type="radio" name="nilai[<?=$index?>]" id="dosenNilai" value="4"> A
</label>
<label class="radio-inline">
  <input type="radio" name="nilai[<?=$index?>]" id="dosenNilai" value="3"> B
</label>
<label class="radio-inline">
  <input type="radio" name="nilai[<?=$index?>]" id="dosenNilai" value="2"> C
</label>
<label class="radio-inline">
  <input type="radio" name="nilai[<?=$index?>]" id="dosenNilai" value="1"> D
</label>
<label class="radio-inline">
  <input type="radio" name="nilai[<?=$index?>]" id="dosenNilai" value="0"> E
</label>
<label class="radio-inline">
  <input type="radio" name="nilai[<?=$index?>]" id="dosenNilai"> T
</label> -->
                    </td>
                  </tr>
                <?
                $index++;
                }
                ?>
<tr>

  <td colspan="8">
    <input type="submit" name="submitNilai" value="Kirim Nilai" class="btn btn-primary btn-xs btn-block" onclick="return confirm('Apakah anda yakin akan mengirimkan nilai?')">
    </form>
  </td>
</tr>
              </tbody>
            </table>
            </div>
<?php } ?>

          <hr/>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  