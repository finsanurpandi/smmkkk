<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Selamat datang, 
        <?php
       	echo $user['nama'];
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
              <h3 class="box-title">Jadwal Matakuliah</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body box-profile">

<!-- CONTENT SHOULD BE HERE -->
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
<form class="form-inline" method="post" action="">
  <div class="form-group">
    <p class="form-control-static">Semester</p>
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

<button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#adminTambahJadwal"><i class="fa fa-plus"></i> Tambah</button>

<hr/>
<div class="table-responsive">
<table id="dosenwali" class="table table-hover">
<thead>
  <tr>
    <th>No</th>
    <th>Hari</th>
    <th>Waktu</th>
    <th>Kode - Matakuliah</th>
    <th>SKS</th>
    <th>Kelas</th>
    <th>Ruang</th>
    <th>NIDN - Dosen</th>
    <th>Aksi</th>
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
    <td><?=date('H:i', strtotime($value['jam_mulai'])).'-'.date('H:i', strtotime($value['jam_selesai']))?></td>
    <td><?=$value['kode_matkul'].' - '.$value['nama_matkul']?></td>
    <td><?=$value['sks']?></td>
    <td><?=$value['kelas']?></td>
    <td><?=$value['ruangan']?></td>
    <td><?=$value['nidn'].' - '.$value['nama_dosen']?></td>
    <td>
      
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

  var tahunajaran = document.getElementById('tahunajaran');

    for (var i = 0; i < tahunajaran.options.length; i++) {
      if (tahunajaran.options[i].value == <?=$tahunajaran?>) {
        tahunajaran.options[i].setAttribute('selected', 'true');
      };
    };

var ta = <?=$tahunajaran?>;
console.log(ta);
</script>
  