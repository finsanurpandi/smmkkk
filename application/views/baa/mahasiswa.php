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
              <h3 class="box-title">Data Mahasiswa</h3>
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

<button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#adminTambahMhs"><i class="fa fa-plus"></i> Tambah</button>

<hr/>
            <div class="table-responsive">
<table id="example1" class="table table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>NPM</th>
                  <th>Nama</th>
                  <th>Angkatan</th>
                  <th>Kelas</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
<?php
$no = 1;
foreach ($mhs as $key => $value) {
?>
                <tr>
                  <td><?=$no?></td>
                  <td><?=$value['npm']?></td>
                  <td><?=$value['nama']?></td>
                  <td><?=$value['angkatan']?></td>
                  <td><?=$value['kelas']?></td>
                  <td>
                    <a href="<?=base_url()?>baa/detail_mahasiswa/<?=$this->encrypt->encode($value['npm'])?>" class="btn btn-primary btn-xs"><i class="fa fa-search"></i> detail</a>
                  </td>
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
  