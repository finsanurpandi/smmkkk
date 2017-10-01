<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Selamat datang, <?=$user['nama']?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Administrasi</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

    <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <i class="fa fa-bullhorn"></i>
              <h3 class="box-title">Histori Administrasi Mahasiswa</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body box-profile">
            
<!-- CONTENT SHOULD BE HERE -->
<form class="form-inline" method="post">
  <div class="form-group">
    <p class="form-control-static">Tahun ajaran</p>
  </div>
  <div class="form-group">
    <select name="tahunajaran" id="tahunajaran" class="form-control" style="width:auto;" onchange="this.form.submit();">

<?php
  foreach ($allTa as $key => $value) {
?>
      <option value="<?=$value['tahun_ajaran']?>"><?=$value['tahun_ajaran']?></option>

<?php } ?>

    </select>
  </div>
</form>

<hr/>


            <div class="table-responsive">
<table id="example1" class="table table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Tanggal Pembayaran</th>
                  <th>Tanggal Validasi</th>
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
                  <th class="pull-right">Total</th>
                  <th><?=$total?></th>
                </tr>
                </tfoot>
              </table>
              </div>

<strong>Jumlah yang harus dibayar</strong>
    <p class="text-muted">
      Rp. 0,-
    </p>

<strong>Sisa Pembayaran</strong>
    <p class="text-muted">
      Rp. 0,-
    </p>




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

  // Tahun Ajaran
  var tahunAjaran = document.getElementById('tahunajaran');

  for (var i = 0; i < tahunAjaran.options.length; i++) {
    if (tahunAjaran.options[i].value == "<?=$tahunajaran?>") {
      tahunAjaran.options[i].setAttribute('selected', 'true');
    };
  };


</script>
  