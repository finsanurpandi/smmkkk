// ALERT AUTOCLOSED
window.setTimeout(function() {
    $(".alert.alert-success").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 3000);



// SET ACTIVE MENU

// MENU BAA
function BaaClearMenu(){
	$('#baadashboard').remove('.active');
	$('#baaprofil').remove('.active');
	$('#baaregister').remove('.active');
	$('#baapembayaran').remove('.active');
	
}

if (role == 3) {
	if (uri == '') {
			BaaClearMenu();
			$('#baadashboard').addClass('active');
		} else if (uri == 'profil') { 
			$('#baaprofil').addClass('active');
		} else if (uri == 'registrasi') { 
			$('#baaregister').addClass('active');
		} else if (uri == 'pembayaran' || uri == 'detailpembayaran') { 
			$('#baapembayaran').addClass('active');
		};
};



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