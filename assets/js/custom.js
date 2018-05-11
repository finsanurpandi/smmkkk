// ALERT AUTOCLOSED
window.setTimeout(function() {
    $(".alert.alert-success").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 3000);



// SET ACTIVE MENU

// MENU BAK
function bakClearMenu(){
	$('#bakdashboard').remove('.active');
	$('#bakprofil').remove('.active');
	$('#bakregister').remove('.active');
	$('#bakpembayaran').remove('.active');
  $('#bakmaster').remove('.active');
	
}

if (role == 3) {
	if (uri == '') {
			bakClearMenu();
			$('#bakdashboard').addClass('active');
		} else if (uri == 'profil') { 
			$('#bakprofil').addClass('active');
		} else if (uri == 'registrasi') { 
			$('#bakregister').addClass('active');
		} else if (uri == 'pembayaran' || uri == 'detailpembayaran') { 
			$('#bakpembayaran').addClass('active');
		} else if (uri == 'master') { 
      $('#bakmaster').addClass('active');
    };
};

// MENU BAA
function baaClearMenu(){
  $('#baaprofil').remove('.active');
  $('#baaperwalian').remove('.active');
  $('#baajadwal').remove('.active');
}

if (role == 4) {
  if (uri == '') {
      baaClearMenu();
    } else if (uri == 'profil') { 
      $('#baaprofil').addClass('active');
    } else if (uri == 'perwalian' || uri == 'detail_perwalian') { 
      $('#baaperwalian').addClass('active');
    } else if (uri == 'jadwal') { 
      $('#baajadwal').addClass('active');
    } else if (uri == 'mahasiswa') { 
      $('#baamahasiswa').addClass('active');
    } else if (uri == 'dosen') { 
      $('#baadosen').addClass('active');
    }
};

// MENU DOSEN
function dosenClearMenu(){
  $('#dosenprofil').remove('.active');
  $('#dosenperwalian').remove('.active');
  $('#dosenjadwal').remove('.active');
  $('#dosennilai').remove('.active');
  
}

if (role == 2) {
  if (uri == '') {
      dosenClearMenu();
    } else if (uri == 'profil') { 
      $('#dosenprofil').addClass('active');
    } else if (uri == 'perwalian') { 
      $('#dosenperwalian').addClass('active');
    } else if (uri == 'jadwal') { 
      $('#dosenjadwal').addClass('active');
    } else if (uri == 'nilai') { 
      $('#dosennilai').addClass('active');
    };
};

// MENU MAHASISWA
function mhsClearMenu(){
  $('#mhsprofil').remove('.active');
  $('#mhsperwalian').remove('.active');
  $('#mhsperkuliahan').remove('.active');
  $('#mhsnilai').remove('.active');
  $('#mhsadministrasi').remove('.active');
}

if (role == 1) {
  if (uri == '') {
      mhsClearMenu();
    } else if (uri == 'profil' || uri == 'editdata') { 
      $('#mhsprofil').addClass('active');
    } else if (uri == 'perwalian' || uri == 'krs') { 
      $('#mhsperwalian').addClass('active');
    } else if (uri == 'perkuliahan') { 
      $('#mhsperkuliahan').addClass('active');
    } else if (uri == 'nilai' || uri == 'nilai_semester' || uri == 'nilai_kumulatif') { 
      $('#mhsnilai').addClass('active');
    } else if (uri == 'administrasi') {
      $('#mhsadministrasi').addClass('active');
    };
};


// ADMIN -------------------------------------------------
//SELECT JABFUNG
function selectJabfung(){
	$('#golonganAdmin option').remove();

	$('#golonganAdmin').prop('disabled', false);

	var asistenAhli = [ {'value':'III/a', 'text':'III/a'},
						{'value':'III/b', 'text':'III/b'}
					  ];  
    
    var lektor = [ {'value':'III/c', 'text':'III/c'},
						{'value':'III/d', 'text':'III/d'}
					  ]; 

    var lektorKepala = [ {'value':'IV/a', 'text':'IV/a'},
						{'value':'IV/b', 'text':'IV/b'},
						{'value':'IV/c', 'text':'IV/c'}
					  ]; 

    var guruBesar = [ {'value':'IV/d', 'text':'IV/d'},
						{'value':'IV/e', 'text':'IV/e'}
					  ]; 

	var jabfung = $('#jabfung').find(":selected").text();


  	if (jabfung == 'Asisten Ahli') {
  		$.each(asistenAhli, function(i){
  			$('#golonganAdmin').append($('<option></option>')
  						.attr('value', asistenAhli[i]['value'])
  						.text(asistenAhli[i]['text']));
  		});
  	} else if (jabfung == 'Lektor') {
  		$.each(lektor, function(i){
  			$('#golonganAdmin').append($('<option></option>')
  						.attr('value', lektor[i]['value'])
  						.text(lektor[i]['text']));
  		});
  	} else if (jabfung == 'Lektor Kepala') {
  		$.each(lektorKepala, function(i){
  			$('#golonganAdmin').append($('<option></option>')
  						.attr('value', lektorKepala[i]['value'])
  						.text(lektorKepala[i]['text']));
  		});
  	} else if (jabfung == 'Guru Besar') {
  		$.each(guruBesar, function(i){
  			$('#golonganAdmin').append($('<option></option>')
  						.attr('value', guruBesar[i]['value'])
  						.text(guruBesar[i]['text']));
  		});
  	} else {
  		$('#golonganAdmin').prop('disabled', true);
  	}
};  // END OF FUNCTION SELECT JABFUNG

// BAA -----------------------------------------------------
function selectMatkul()
{
	
}



// ---------------------------------------------------------


// MAHASISWA -------------------------------------------------
// activeTab('orangtua');


function activeTab(tab){
	$('.nav-tabs a[href="#' + tab + '"]').tab('show');
}

uri = uri.split('=');

activeTab(uri[1]);

// SUM SKS

//data = parseInt($('.checkbox1').attr('data-valuetwo'));

    $('.checkbox1').change(function() {
    	var sum = 0;
        $('input:checkbox:checked').each(function(){
	       //sum += isNaN(parseInt($(this).val())) ? 0 : parseInt($(this).val());
	        // sum += isNaN(parseInt($(this).attr('data-valuetwo'))) ? 0 : parseInt($(this).attr('data-valuetwo'));
	        sum += isNaN(parseInt($(this).data('valuetwo'))) ? 0 : parseInt($(this).data('valuetwo'));
	      	// console.log($(this).attr('data-valuetwo'));
	      });
        
        $('#sum').html(sum);
        $('#totalSks').val(sum);
    	//console.log(sum);
    });
    
    if (semesterMhs == 7 && (pk == "" || pk == null)) {
    	$('#infoKekhususan').modal('show');
	};