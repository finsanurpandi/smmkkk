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
            
            <div class="table-responsive">
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
                $index = 1;
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
                      <a href="<?=base_url()?>dosen/detail_nilai/<?=$this->encrypt->encode($value['id_matkul'])?>/<?=$this->encrypt->encode($value['kelas'])?>" class="btn btn-primary btn-xs" id="inputNilai<?=$index++?>"><i class="fa fa-plus"></i> input nilai</a>
                    </td>
                  </tr>
                <?
                }
                ?>
              </tbody>
            </table>
            </div>
            <div><h3 id="demo"></h3></div>

          <hr/>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      

    </section>
    <!-- /.content -->
  </div>
  <?php
  $waktu_valid = date('M d, Y H:i:s',strtotime($countdown['valid']));
  ?>
  <!-- /.content-wrapper -->
  <script type="text/javascript">
    // var countDownDate = new Date('<?=$waktu_valid?>').getTime();
    // var jadwal = <?=count($jadwal)?>;
    // console.log(jadwal);
    // var x = setInterval(function(){
    //   var now = new Date().getTime();
    //   var distance = countDownDate - now;

    //   var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    //   var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    //   var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    //   var seconds = Math.floor((distance % (1000 * 60)) / 1000);

      
    //   document.getElementById("demo").innerHTML = "Waktu anda tinggal " + days + "hari " + hours + "jam "
    //   + minutes + "menit " + seconds + "detik ";

      
    //   if (distance < 0) {
    //     clearInterval(x);
    //     document.getElementById("demo").innerHTML = "Waktu Anda Habis";
        
    //     for (var i = 1; i <= jadwal; i++) {
    //       var tes = 'inputNilai'+i;
    //       document.getElementById(tes).setAttribute('disabled', 'true'); 
    //       document.getElementById(tes).setAttribute('href', 'javascript: void(0)'); 
    //     };
        
    //   }
    // }, 1000);
  </script>
  