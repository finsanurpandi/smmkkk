<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Selamat datang, <?=$user['nama']?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Detail Pembayaran</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

    <!-- About Me Box -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <i class="fa fa-bullhorn"></i>
              <h3 class="box-title">Detail Pembayaran Mahasiswa</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body box-profile">
            
<!-- CONTENT SHOULD BE HERE ... -->
<!-- PROFIL -->
<!-- About Me Box -->
            <!-- /.box-header -->
<div class="box-body box-profile">
<div class="row">
        <div class="col-md-2 text-center">
                <?php
                  if ($user['image'] == null) {
                    if ($user['jenis_kelamin'] == 'L') {
                      echo "<img src='".base_url('assets/uploads/profiles/default_male.jpg')."' class='profile-user-img img-responsive img-circle' alt='User Image'>";
                    } else {
                      echo "<img src='".base_url('assets/uploads/profiles/default_female.jpg')."' class='profile-user-img img-responsive img-circle' alt='User Image'>";
                    };
                  } else {
                  ?>
                    <img src="<?=base_url('assets/uploads/profiles/'.$user['image'])?>" class="profile-user-img img-responsive img-circle" alt="User Image">
                  <?php
                  } 
                 ?>
          
        </div>

<div class="col-md-10">
    <strong>NPM</strong>
    <p class="text-muted">
      <?=$mhs['npm']?>
    </p>

    <strong>Nama</strong>
    <p class="text-muted">
      <?=$mhs['nama']?>
    </p>

    <strong>Angkatan</strong>
    <p class="text-muted">
      <?=$mhs['angkatan']?>
    </p>

    <strong>Kelas</strong>
    <p class="text-muted">
      <?=$mhs['kelas']?>
    </p>

    <strong>Jenis Kelamin</strong>
    <p class="text-muted">
      <?php
      if ($mhs['jenis_kelamin'] == 'L') {
        echo "Laki-Laki";
      } else {
        echo "Perempuan";
      }
      ?>
    </p>

</div>      
</div>
</div>
              

<br/>


            <div class="table-responsive">
<table id="example1" class="table table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Tanggal Pembayaran</th>
                  <th>Tanggal Validasi</th>
                  <th>Bukti Nomor Pembayaran</th>
                  <th>Jumlah</th>
                </tr>
                </thead>
                <tbody>
<?php
$no = 1;
$total = 0;
foreach ($pembayaran as $key => $value) {
?>
                <tr>
                  <td><?=$no?></td>
                  <td><?=$value['tgl_pembayaran']?></td>
                  <td><?=$value['tgl_validasi']?></td>
                  <td><?=$value['no_bukti_pembayaran']?></td>
                  <td><?=$value['jumlah']?></td>
                </tr>
<?php
$no++;
$total += $value['jumlah'];
}
?>
                </tbody>
                <tfoot>
                <tr>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th class="pull-right">Total</th>
                  <th><?=$total?></th>
                </tr>
                </tfoot>
              </table>
              </div>

<strong>Jumlah yang harus dibayar</strong>
    <p class="text-muted">
      <?=$mhs['kelas']?>
    </p>

<strong>Sisa Pembayaran</strong>
    <p class="text-muted">
      <?=$mhs['kelas']?>
    </p>

<a href="<?=base_url()?>bak/pembayaran" class="btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i> kembali</a>
<!-- END OF CONTENT -->

            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  