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
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>No</th>
                  <th>NPM</th>
                  <th>Nama Mahasiswa</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                foreach ($mhs as $key => $value) {
                ?>
                  <tr>
                    <td><?=$no++?></td>
                    <td><?=$value['npm']?></td>
                    <td><?=$value['nama']?></td>
                  </tr>
                <?
                }
                ?>
              </tbody>
            </table>


          <hr/>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  