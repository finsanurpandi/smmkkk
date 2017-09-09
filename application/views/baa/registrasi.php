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
              <h3 class="box-title">Registrasi Mahasiswa</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body box-profile">
            
<!-- CONTENT SHOULD BE HERE ... -->
<button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#baaTambahRegistrasi"><i class="fa fa-plus"></i> Tambah</button>

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
                  <th>NPM</th>
                  <th>Nama</th>
                  <th>Angkatan</th>
                  <th>Tgl Pembayaran</th>
                  <th>Tgl Validasi</th>
                </tr>
                </thead>
                <tbody>
<?php
function convert_date($tgl)
  {
    $tgl = explode(' ', $tgl);
    $tanggal = explode('-', $tgl[0]);

    switch ($tanggal[1]) {
      case '01':
        $tanggal[1] = 'Jan';
        break;
      case '02':
        $tanggal[1] = 'Feb';
        break;
      case '03':
        $tanggal[1] = 'Mar';
        break;
      case '04':
        $tanggal[1] = 'Apr';
        break;
      case '05':
        $tanggal[1] = 'Mei';
        break;
      case '06':
        $tanggal[1] = 'Jun';
        break;
      case '07':
        $tanggal[1] = 'Jul';
        break;
      case '08':
        $tanggal[1] = 'Agu';
        break;
      case '09':
        $tanggal[1] = 'Sep';
        break;
      case '10':
        $tanggal[1] = 'Okt';
        break;
      case '11':
        $tanggal[1] = 'Nov';
        break;
      case '12':
        $tanggal[1] = 'Des';
        break;
    }

    return $tanggal[2].'-'.$tanggal[1].'-'.$tanggal[0].' '.$tgl[1];

  }

$no = 1;
foreach ($pembayaran as $key => $value) {
?>
                <tr>
                  <td><?=$no?></td>
                  <td><?=$value['npm']?></td>
                  <td><?=$value['nama']?></td>
                  <td><?=$value['angkatan']?></td>
                  <td><?=convert_date($value['tgl_pembayaran'])?></td>
                  <td><?=convert_date($value['tgl_validasi'])?></td>
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
  