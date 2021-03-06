// CHECK USERNAME AVAILABILITY FOR BAK
function checkUsername(){
    var username = $('#npm').val();

    $.ajax({
      method: "post",
      url: baseurl+"ajax/usernameAvailability",
      data: { username:username },
      success: function(res){
          res = res.split(',');

          if (res[0] == 1) {
            checkRegistration(res[1]);
          } else {
            $('#statusNpm').html("<p class='text-danger'><span class='glyphicon glyphicon-remove'></span> NPM Tidak Terdaftar</p>");
            $('#btnTambahRegistrasi').prop('disabled', true);
            $('#nama').val("");
          }
          
      }
    });
};

function checkRegistration(npm){
	$.ajax({
		method: "post",
		url: baseurl+"ajax/checkRegistration",
		data: {npm:npm},
		success: function(res){
			res = res.split(',');

			if (res[0] == 1) {
				$('#statusNpm').html("<p class='text-danger'><span class='glyphicon glyphicon-remove'></span> NPM Sudah Melakukan Registrasi</p>");
	            $('#btnTambahRegistrasi').prop('disabled', true);
	            $('#nama').val("");
	          } else {
	            $('#statusNpm').html("<p class='text-success'><span class='glyphicon glyphicon-ok'></span> NPM Belum Registrasi</p> ");
	          	$('#btnTambahRegistrasi').prop('disabled', false);
	          	$('#nama').val(res[1]);
	          }
		}
	});
}

// CHECK NPM AVAILABILITY
function checkNpm(){
    var npm= $('#npmPembayaran').val();

    $.ajax({
      method: "post",
      url: baseurl+"ajax/checkNpm",
      data: { npm:npm },
      success: function(res){
      	res = res.split(',');

          if (res[0] == 1) {
            $('#statusUser').html("<p class='text-success'><span class='glyphicon glyphicon-ok'></span> NPM Terdaftar</p> ");
          	$('#btnTambahPembayaran').prop('disabled', false);
          	$('#namaPembayaran').val(res[1]);
          } else {
            $('#statusUser').html("<p class='text-danger'><span class='glyphicon glyphicon-remove'></span> NPM Tidak Terdaftar</p>");
            $('#btnTambahPembayaran').prop('disabled', true);
            $('#namaPembayaran').val("");
          }
          
      }
    });
};

// CHECK USERNAME AVAILABILITY FOR ADMIN
// CHECK NPM AVAILABILITY
function checkNpmAdmin(){
    var npm= $('#npm').val();

    $.ajax({
      method: "post",
      url: baseurl+"ajax/checkNpm",
      data: { npm:npm },
      success: function(res){
        res = res.split(',');

          if (res[0] == 1) {
            $('#statusUser').html("<p class='text-danger'><span class='glyphicon glyphicon-remove'></span> NPM Sudah Terdaftar</p> ");
            $('#btnTambahMahasiswa').prop('disabled', true);
          } else {
            $('#statusUser').html("<p class='text-success'><span class='glyphicon glyphicon-ok'></span> NPM Belum Terdaftar</p>");
            $('#btnTambahMahasiswa').prop('disabled', false);
          }
          
      }
    });
};

// CHECK NIDN AVAILABILITY
function checkNidnAdmin(){
    var nidn= $('#nidn').val();

    $.ajax({
      method: "post",
      url: baseurl+"ajax/checkNidn",
      data: { nidn:nidn },
      success: function(res){
        res = res.split(',');

          if (res[0] == 1) {
            $('#statusDosen').html("<p class='text-danger'><span class='glyphicon glyphicon-remove'></span> NIDN Sudah Terdaftar</p> ");
            $('#btnTambahDosen').prop('disabled', true);
          } else {
            $('#statusDosen').html("<p class='text-success'><span class='glyphicon glyphicon-ok'></span> NIDN Belum Terdaftar</p>");
            $('#btnTambahDosen').prop('disabled', false);
          }
          
      }
    });
};