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
          <div class="box box-danger">
            <div class="box-header with-border">
              <i class="fa fa-bullhorn"></i>
              <h3 class="box-title">Data Dosen</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body box-profile">
            
<!-- CONTENT SHOULD BE HERE ... -->
<?php
  if (@$this->session->flashdata('success') == true) {
?>
    <div class="alert alert-success">Data berhasil ditambahkan!
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      <br/>
    </div>

<?php
  }
?>

<button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#adminTambahDosen"><i class="fa fa-plus"></i> Tambah</button>

<hr/>
            <div class="table-responsive">
<table id="example1" class="table table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>NIDN</th>
                  <th>NIK</th>
                  <th>Nama</th>
                  <th>Jenis Kelamin</th>
                  <th>Fungsional</th>
                  <th>Golongan</th>
                  <th>Struktural</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
<?php
$no = 1;
foreach ($dosen as $key => $value) {
?>
                <tr>
                  <td><?=$no?></td>
                  <td><?=$value['nidn']?></td>
                  <td><?=$value['nik']?></td>
                  <td>
                  <?php
                    if ($value['gelar_depan'] == null) {
                      echo $value['nama'].', '.$value['gelar_belakang'];
                    } else {
                      echo $value['gelar_depan'].' '.$value['nama'].', '.$value['gelar_belakang'];
                    }
                  ?>
                  </td>
                  <td align="center"><?=$value['jenis_kelamin']?></td>
                  <td><?=$value['jabatan_fungsional']?></td>
                  <td><?=$value['golongan']?></td>
                  <td><?=$value['jabatan_struktural']?></td>
                  <td></td>
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
  