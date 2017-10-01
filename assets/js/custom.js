// ALERT AUTOCLOSED
window.setTimeout(function() {
    $(".alert.alert-success").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 3000);



// SET ACTIVE MENU

// MENU bak
function bakClearMenu(){
	$('#bakdashboard').remove('.active');
	$('#bakprofil').remove('.active');
	$('#bakregister').remove('.active');
	$('#bakpembayaran').remove('.active');
	
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
		};
};

// ADMIN
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


// MAHASISWA
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