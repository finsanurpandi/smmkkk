<!-- Tambah data jadwal -->
<div class="modal fade modal-primary-custom" id="baaTambahJadwal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Data Jadwal Matakuliah</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="">
        
        <div class="form-group">
            <label for="npm">Kode - Matakuliah</label>
            <select class="form-control select2" style="width:100%;" name="kode-matkul" onchange="selectMatkul();">
            	<option selected="selected"></option>
            	<?php
            		$periode = substr($this->session->tahun_ajaran, -1);
					switch ($periode) {
					  case 1:
					    $periode = 1;
					    break;
					  case 2:
					    $periode = 0;
					    break;
					}
            		foreach ($matkul as $key => $value) {
            			if ($value['semester'] % 2 == $periode) {
            	?>
					<option value="<?=$value['id'].','.$value['kode_matkul'].','.$value['nama_matkul'].','.$value['sks'].','.$value['semester']?>"><?=$value['kode_matkul'].' - '.$value['nama_matkul']?></option>
            	<?php
            			}
            		}
            	?>
            </select>
        </div>

        <div class="form-group">
            <label for="npm">NIDN - Nama Dosen</label>
            <select class="form-control select2" style="width:100%;" name="nidn-dosen">
            	<option selected="selected"></option>
            	<?php
            		foreach ($dosen as $key => $value) {
            	?>
					<option value="
					<?php
					if ($value['gelar_depan'] == null) {
                      echo $value['nidn'].'-'.$value['nama'].', '.$value['gelar_belakang'];
                    } else {
                      echo $value['nidn'].'-'.$value['gelar_depan'].' '.$value['nama'].', '.$value['gelar_belakang'];
                    }
                    ?>
					">
					<?php
	                    if ($value['gelar_depan'] == null) {
	                      echo $value['nama'].', '.$value['gelar_belakang'];
	                    } else {
	                      echo $value['gelar_depan'].' '.$value['nama'].', '.$value['gelar_belakang'];
	                    }
	                  ?>
					</option>
            	<?php
            		}
            	?>
            </select>
        </div>
		
        <div class="form-group">
            <label for="nama">Perkuliahan</label>
            <select name="perkuliahan" class="form-control">
              <option value="R">Regular</option>
              <option value="NR">Non Regular</option>
            </select>
        </div>

        <!-- <div class="form-group">
            <label for="nama">Kelas</label>
            <select name="kelas" class="form-control">
              <option>---</option>
              <option value="A">A</option>
              <option value="B">B</option>
              <option value="C">C</option>
              <option value="D">D</option>
              <option value="E">E</option>
            </select>
        </div> -->

        <div class="form-group">
            <label for="nama">Kelas</label><br/>
            <label class="checkbox-inline">
              <input type="checkbox" name="kelas[]" value="A"> A
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" name="kelas[]" value="B"> B
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" name="kelas[]" value="C"> C
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" name="kelas[]" value="D"> D
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" name="kelas[]" value="E"> E
            </label>
        </div>

        <div class="form-group">
            <label for="nama">Hari</label>
            <select class="form-control" name="hari">
            	<option>---</option>
            	<option value="Senin">Senin</option>
            	<option value="Selasa">Selasa</option>
            	<option value="Rabu">Rabu</option>
            	<option value="Kamis">Kamis</option>
            	<option value="Jum'at">Jum'at</option>
            	<option value="Sabtu">Sabtu</option>
            </select>
        </div>

        <div class="bootstrap-timepicker">
                <div class="form-group">
                  <label>Jam Mulai</label>

                  <div class="input-group">
                    <input type="text" class="form-control timepicker" name="jam_mulai">

                    <div class="input-group-addon">
                      <i class="fa fa-clock-o"></i>
                    </div>
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->
              </div>

        <div class="bootstrap-timepicker">
                <div class="form-group">
                  <label>Jam Selesai</label>

                  <div class="input-group">
                    <input type="text" class="form-control timepicker" name="jam_selesai">

                    <div class="input-group-addon">
                      <i class="fa fa-clock-o"></i>
                    </div>
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->
              </div>

        <div class="form-group">
            <label for="nama">Ruangan</label>
            <select class="form-control" name="ruangan">
            	<option>---</option>
            	<option value="Aula">Aula</option>
            	<option value="2">2</option>
            	<option value="3">3</option>
            	<option value="4">4</option>
            	<option value="6">6</option>
            </select>
        </div>
    
      </div>
      <div class="modal-footer">
        <button type="reset" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary" name="tambahJadwal" id="btnTambahJadwal">Tambah</button>
        </form>
      </div>
    </div>
  </div>
</div>






<script src="https://code.jquery.com/jquery-2.2.3.min.js" integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo=" crossorigin="anonymous"></script>

<!-- InputMask -->
<script src="<?=base_url()?>assets/plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?=base_url()?>assets/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?=base_url()?>assets/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- Select2 -->
<script src="<?=base_url()?>assets/plugins/select2/select2.full.min.js"></script>
<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="<?=base_url()?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap time picker -->
<script src="<?=base_url()?>assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- bootstrap datepicker -->
<script src="<?=base_url()?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- bootstrap color picker -->
<script src="<?=base_url()?>assets/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="<?=base_url()?>assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>


<!-- ajax script -->
<script type="text/javascript" src="<?=base_url()?>assets/js/ajax.js"></script> 

<!-- SCRIPT -->
<script>
var baseurl = "<?=base_url()?>";

  $(function () {

  	$(".select2").select2({
  		dropdownParent: $('#baaTambahJadwal')
  	});

    //Datemask dd/mm/yyyy
    $("#timemask").inputmask("hh:mm:ss", {"placeholder": "hh:mm:ss"});

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    });

    //Datemask dd/mm/yyyy
    $("#timemaskPembayaran").inputmask("hh:mm:ss", {"placeholder": "hh:mm:ss"});

    //Date picker
    $('#datepickerPembayaran').datepicker({
      autoclose: true
    });

    //Timepicker
    $(".timepicker").timepicker({
      showInputs: false,
      maxHours: 24,
      showMeridian: false
    });


  });
</script>