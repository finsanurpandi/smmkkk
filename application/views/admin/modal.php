<!-- Tambah data mahasiswa -->
<div class="modal fade modal-primary-custom" id="adminTambahMhs" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Data Mahasiswa</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="">
        
        <div class="form-group">
            <label for="npm">NPM</label>
            <input class="form-control" type="text" name="npm" id="npm" onchange="checkNpmAdmin();">
            <div id="statusUser"></div>
        </div>

        <div class="form-group">
            <label for="npm">Nama</label>
            <input class="form-control" type="text" name="nama" id="nama">
        </div>
        
        <div class="form-group">
            <label for="nama">Angkatan</label>
            <input class="form-control" type="year" name="angkatan" id="angkatan">
        </div>

        <div class="form-group">
            <label for="nama">Kelas</label>
            <select name="kelas" class="form-control">
              <option>---</option>
              <option value="A">A</option>
              <option value="B">B</option>
              <option value="C">C</option>
              <option value="D">D</option>
              <option value="E">E</option>
            </select>
        </div>

        <div class="form-group">
            <label for="Jenis Kelamin">Jenis Kelamin</label>
            <br/>
            <label class="radio-inline">
              <input type="radio" name="jeniskelamin" id="inlineRadio1" value="L"> Laki-laki
            </label>
            <label class="radio-inline">
              <input type="radio" name="jeniskelamin" id="inlineRadio2" value="P"> Wanita
            </label>
        </div>
        
            
      </div>
      <div class="modal-footer">
        <button type="reset" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary" name="tambahMahasiswa" id="btnTambahMahasiswa" disabled="true">Tambah</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Tambah data DOSEN -->
<div class="modal fade modal-primary-custom" id="adminTambahDosen" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Data Dosen</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="">
        
        <div class="form-group">
            <label for="npm">NIDN</label>
            <input class="form-control" type="text" name="nidn" id="nidn" onchange="checkNidnAdmin();">
            <div id="statusDosen"></div>
        </div>

        <div class="form-group">
            <label for="npm">NIK</label>
            <input class="form-control" type="text" name="nik" id="nik">
        </div>

        <div class="form-group">
            <label for="npm">Nama</label>
            <input class="form-control" type="text" name="nama" id="nama">
        </div>
        
        <div class="form-group">
            <label for="nama">Gelar Depan</label>
            <input class="form-control" type="text" name="gelar_depan" id="gelar_depan">
        </div>

        <div class="form-group">
            <label for="nama">Gelar Belakang</label>
            <input class="form-control" type="text" name="gelar_belakang" id="gelar_belakang">
        </div>

        <div class="form-group">
            <label for="Jenis Kelamin">Jenis Kelamin</label>
            <br/>
            <label class="radio-inline">
              <input type="radio" name="jeniskelamin" id="inlineRadio1" value="L"> Laki-laki
            </label>
            <label class="radio-inline">
              <input type="radio" name="jeniskelamin" id="inlineRadio2" value="P"> Wanita
            </label>
        </div>

        <div class="form-group">
          <label for="nama">Jabatan Fungsional</label>
          <select class="form-control" name="jabatan_fungsional" id="jabfung" onchange="selectJabfung();">
            <option>---</option>
            <option value="Asisten Ahli">Asisten Ahli</option>
            <option value="Lektor">Lektor</option>
            <option value="Lektor Kepala">Lektor Kepala</option>
            <option value="Guru Besar">Guru Besar</option>
          </select>
        </div>

        <div class="form-group">
          <label for="nama">Golongan</label>
          <select class="form-control" name="golongan" id="golonganAdmin" disabled="true">
            <option></option>
          </select>
        </div>

        <div class="form-group">
          <label for="nama">Jabatan Struktural</label>
          <select class="form-control" name="jabatan_struktural">
            <option>---</option>
            <option value="Asisten Ahli">Asisten Ahli</option>
            <option value="Lektor">Lektor</option>
            <option value="Lektor Kepala">Lektor Kepala</option>
            <option value="Guru Besar">Guru Besar</option>
          </select>
        </div>
        
            
      </div>
      <div class="modal-footer">
        <button type="reset" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary" name="tambahDosen" id="btnTambahDosen" disabled="true">Tambah</button>
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
<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="<?=base_url()?>assets/plugins/daterangepicker/daterangepicker.js"></script>
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


  });
</script>