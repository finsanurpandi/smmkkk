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
        <li class="active">Profil</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

    <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <i class="fa fa-bullhorn"></i>
              <h3 class="box-title">Pengumuman Penting</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body box-profile">

<!-- CONTENT SHOULD BE HERE -->
<div class="table-responsive">
<table id="dosenwali" class="table table-hover">
<thead>
  <tr>
    <th>No</th>
    <th>NPM</th>
    <th>Nama</th>
    <th>Status</th>
    <th>Aksi</th>
  </tr>
</thead>
<tbody>
<?php
  $no = 1;
  foreach ($mahasiswa as $key => $value) {
?>
  <tr>
    <td><?=$no++?></td>
    <td><?=$value['npm']?></td>
    <td><?=$value['nama']?></td>
    <td>
      <?php
        foreach ($status as $key => $nilai) {
          if ($nilai['npm'] == $value['npm'] && $nilai['v_dosen'] == 0) {
            echo "<span class='label label-danger'>Belum disetujui</span>";
          } elseif ($nilai['npm'] == $value['npm'] && $nilai['v_dosen'] == 1) {
            echo "<span class='label label-success'>Sudah disetujui</span>";
          }
        }
      ?>
    </td>
    <td>
      <a href="<?=base_url()?>dosen/detail_perwalian/<?=$this->encrypt->encode($value['npm'])?>" class="btn btn-primary btn-xs"><i class="fa fa-search"></i> detail</a>
    </td>
  </tr>

<?php } ?>
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
    $("#dosenwali").DataTable({
      "autoWidth": false
    });
  });
</script>
  