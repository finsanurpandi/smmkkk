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

            <a href="<?=base_url()?>dosen/jadwal" class="btn btn-primary btn-xs"><i class="fa fa-arrow-left"></i> kembali</a>
            
            <hr/>
<?php

?>
            <div class="table-responsive">
            <form method="post">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>No</th>
                  <th>NPM</th>
                  <th>Nama Mahasiswa</th>
                  <th>Nilai</th>
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
                    <td>
<input type="hidden" name="npm[]" value="<?=$value['npm']?>">
<input type="hidden" name="id_matkul[]" value="<?=$value['id_matkul']?>">
<input type="hidden" name="tahun_ajaran[]" value="<?=$value['tahun_ajaran']?>">
<input type="hidden" name="nidn[]" value="<?=$value['nidn']?>">
<input type="hidden" name="semester_mhs[]" value="<?=$semester_mhs?>">

<label class="radio-inline">
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
</label>
                    </td>
                  </tr>
                <?
                $index++;
                }
                ?>
<tr>

  <td colspan="4">
    <input type="submit" name="submitNilai" value="Kirim Nilai" class="btn btn-primary btn-xs btn-block" onclick="return confirm('Apakah anda yakin akan mengirimkan nilai?')">
    </form>
  </td>
</tr>
              </tbody>
            </table>
            </div>


          <hr/>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  