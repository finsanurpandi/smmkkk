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
              <h3 class="box-title">Registrasi Mahasiswa</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body box-profile">
            
<!-- CONTENT SHOULD BE HERE ... -->
<button class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah</button>
<hr/>
            <div class="table-responsive">
<table id="example1" class="table table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>NPM</th>
                  <th>Nama</th>
                  <th>Angkatan</th>
                  <th>Jumlah</th>
                  <th>Tgl Pembayaran</th>
                  <th>Tgl Validasi</th>
                </tr>
                </thead>
                <tbody>
<?php
$no = 1;
foreach ($pembayaran as $key => $value) {
?>
                <tr>
                  <td><?=$no?></td>
                  <td><?=$value['npm']?></td>
                  <td><?=$value['nama']?></td>
                  <td><?=$value['angkatan']?></td>
                  <td><?=$value['jumlah']?></td>
                  <td><?=$value['tgl_pembayaran']?></td>
                  <td><?=$value['tgl_validasi']?></td>
                </tr>
<?php
$no++;
}
?>
                </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>NPM</th>
                  <th>Nama</th>
                  <th>Angkatan</th>
                  <th>Jumlah</th>
                  <th>Tgl Pembayaran</th>
                  <th>Tgl Validasi</th>
                </tr>
                </tfoot>
              </table>
              </div>

<!-- END OF CONTENT -->

            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<script type="text/javascript">
    $(function () {
    //DATA TABLES
    $("#example1").DataTable({
      "autoWidth": false
    });
  });
</script>
  