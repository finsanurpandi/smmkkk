<!-- Tambah data registrasi mahasiswa -->
<div class="modal fade modal-primary-custom" id="bakTambahRegistrasi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Data Registrasi Mahasiswa</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="">
        
        <div class="form-group">
            <label for="npm">NPM</label>
            <input class="form-control" type="text" name="npm" id="npm" onchange="checkUsername();">
            <div id="statusNpm"></div>
        </div>

        <div class="form-group">
            <label for="npm">Nama</label>
            <input class="form-control" type="text" name="nama" id="nama" disabled>
        </div>
        
        <div class="form-group">
            <label for="nama">Tanggal Pembayaran</label>
            <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="datepicker" name="tanggal">
            </div>
        </div>

        <div class="form-group">
            <label for="nama">Waktu Pembayaran</label>
            <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-clock-o"></i>
              </div>
              <input type="text" class="form-control" id="timemask" name="waktu">
            </div>
        </div>
        
            
      </div>
      <div class="modal-footer">
        <button type="reset" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary" name="tambahRegistrasi" id="btnTambahRegistrasi" disabled="true">Tambah</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Tambah data pembayaran mahasiswa -->
<div class="modal fade modal-primary-custom" id="bakTambahPembayaran" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Data Pembayaran Mahasiswa</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="">
        
        <div class="form-group">
            <label for="npm">NPM</label>
            <input class="form-control" type="text" name="npm" id="npmPembayaran" onchange="checkNpm();">
            <div id="statusUser"></div>
        </div>

        <div class="form-group">
            <label for="npm">Nama</label>
            <input class="form-control" type="text" name="nama" id="namaPembayaran" disabled>
        </div>

        <div class="form-group">
            <label for="npm">Jumlah Pembayaran</label>
            <input class="form-control" type="number" name="jumlah">
        </div>
        
        <div class="form-group">
            <label for="nama">Tanggal Pembayaran</label>
            <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="datepickerPembayaran" name="tanggal">
            </div>
        </div>

        <div class="form-group">
            <label for="nama">Waktu Pembayaran</label>
            <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-clock-o"></i>
              </div>
              <input type="text" class="form-control" id="timemaskPembayaran" name="waktu">
            </div>
        </div>
        
            
      </div>
      <div class="modal-footer">
        <button type="reset" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary" name="tambahPembayaran" id="btnTambahPembayaran" disabled="true">Tambah</button>
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