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
        <li class="active">Nilai</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

    <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <i class="fa fa-bullhorn"></i>
              <h3 class="box-title">Data Perkuliahan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body box-profile">
            
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Hari</th>
                  <th>Waktu</th>
                  <th>Kode - Matakuliah</th>
                  <th>Kelas</th>
                  <th>Ruangan</th>
                  <th>Semester</th>
                  <th>Detail</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                foreach ($jadwal as $key => $value) {
                ?>
                  <tr>
                    <td><?=$no++?></td>
                    <td><?=$value['hari']?></td>
                    <td><?=date('H:i', strtotime($value['jam_mulai'])).'-'.date('H:i', strtotime($value['jam_selesai']))?> WIB</td>
                    <td><?=$value['kode_matkul'].' - '.$value['nama_matkul']?></td>
                    <td><?=$value['kelas']?></td>
                    <td><?=$value['ruangan']?></td>
                    <td><?=$value['semester']?></td>
                    <td>
                      <a href="<?=base_url()?>dosen/detail_nilai/<?=$this->encrypt->encode($value['id_matkul'])?>/<?=$this->encrypt->encode($value['kelas'])?>" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> input nilai</a>
                    </td>
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
  