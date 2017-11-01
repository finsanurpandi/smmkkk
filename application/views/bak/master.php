<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Selamat datang, <?=$user['nama']?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Master Data</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

    <!-- About Me Box -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <i class="fa fa-bullhorn"></i>
              <h3 class="box-title">Data Master Keuangan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body box-profile">
            
<!-- CONTENT SHOULD BE HERE ... -->

<button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#bakTambahMaster"><i class="fa fa-plus"></i> Tambah</button>

<?php
  if (@$this->session->flashdata('success') == true) {
?>
    <div class="alert alert-success">Data berhasil ditambahkan!
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>

<?php
  }
?>

<hr/>

<div class="table-responsive">
<table id="example1" class="table table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Jenis Keuangan</th>
                  <th>Rincian</th>
                  <th>Besaran</th>
                </tr>
                </thead>
                <tbody>
<?php
$no = 1;
foreach ($master as $key => $value) {
?>
                <tr>
                  <td><?=$no++?></td>
                  <td><?=$value['jenis_keuangan']?></td>
                  <td><?=$value['rincian']?></td>
                  <td><?=$value['besaran']?></td>
                </tr>
<?php
$no++;
}
?>
                </tbody>
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
  