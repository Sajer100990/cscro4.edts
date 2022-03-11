// declaring global baseurl
var baseUrl  = $('#base_url').val();

// datatable
$(document).ready(function() {
    var table = $('#example').DataTable( {
        lengthChange: false,
        // for another extraction functionalities
        // buttons: [ 'copy', 'excel', 'pdf', 'colvis', 'print' ] 
        // buttons: [ 'copy', 'excel', 'print' ]
    });
 
    table.buttons().container()
        .appendTo( '#example_wrapper .col-sm-6:eq(0)' );
});

function create_user() {
	var fn  = $('#fn').val();
	var mi  = $('#mi').val();
	var ln  = $('#ln').val();
	var gender  = $('#gender').val();
	var contact  = $('#contact').val();
	var position  = $('#position').val();
	var division  = $('#division').val();
	var username  = $('#username').val();
	var upBy_id  	= $('#upBy_id').val();

	var action   = 'submit';

	var data     = {
		fn: fn,
		mi: mi,
		ln: ln,
		gender: gender,
		contact: contact,
		position: position,
		division: division,
		username: username,
		upBy_id: upBy_id,
		action: action
	}

	if (fn == "" || ln == "" || gender == "" || division == "" || position == "") {
		swal({
            title: "Empty Field(s)",
            text: "Please fill all the field(s)",
            type: "warning",
            timer: 1000,
            showConfirmButton: false
        });
	}

	else {
		$.post(baseUrl + 'Create-UserAccount', data, function(responce) {
			var data = JSON.parse(responce);
			var url = data.url;

			if (data.status == 'success') {
				swal ({
					title: data.title,
	                text: data.message,
	                type: data.status,
	                timer: 1000,
	                showConfirmButton: false
	            }, function() {
	               	window.location.href = url;
				});
			}

			else {
				swal({
	                title: data.title,
	                text: data.message,
	                type: data.status,
	                timer: 1000,
	                showConfirmButton: false
	            });
			}
		});
	}
}

function update_user_info() {
	var fn  		= $('#fn').val();
	var mi  		= $('#mi').val();
	var ln  		= $('#ln').val();
	var contact 	= $('#contact').val();
	var position  	= $('#position').val();
	var division  	= $('#division').val();
	var user_id  	= $('#user_id').val();
	var upBy_id  	= $('#upBy_id').val();
	var action   	= 'submit';

	var data = {
		fn : fn,
		mi : mi,
		ln : ln,
		contact : contact,
		position : position,
		division : division,
		user_id : user_id,
		upBy_id : upBy_id,
		action : action
	}

	if (fn == ''|| ln == '' || position == '') {
		alert('no');
	}

	else {
		$.post(baseUrl + 'Update-User-Info', data, function(responce) {
			var data = JSON.parse(responce);
			var url = data.url;

			if (data.status == 'success') {
				swal ({
					title: data.title,
	                text: data.message,
	                type: data.status,
	                timer: 1000,
	                showConfirmButton: false
	            }, function() {
	               	window.location.href = url + '?userID=' + user_id;
				});
			}

			else {
				swal({
	                title: data.title,
	                text: data.message,
	                type: data.status,
	                timer: 1000,
	                showConfirmButton: false
	            });
			}
		});
	}
}

function update_user_security() {
	var security_question = $('#security_question').val();
	var security_answer = $('#security_answer').val();
	var security_answer1 = $('#security_answer1').val();
	var user_id  	= $('#user_id').val();
	var upBy_id  	= $('#upBy_id').val();
	var action   	= 'submit';

	var data = {
		security_question : security_question,
		security_answer : security_answer,
		user_id : user_id,
		upBy_id : upBy_id,
		action : action
	}

	if (security_answer == "" || security_answer1 == "") {
		$('#security_answer').focus();

		swal ({
			title: "Empty",
            text: "Please Fill All The Field(s).",
            type: "error",
            timer: 1000,
            showConfirmButton: false
        });
		return false;
	}

	else if (security_answer != security_answer1) {
		$('#security_answer').focus();
		swal ({
			title: "Invalid",
            text: "Security Answer Don't Match",
            type: "warning",
            timer: 1000,
            showConfirmButton: false
        });
		return false;
	}

	else {
		$.post(baseUrl + 'Update-User-Security', data, function(responce) {
			var data = JSON.parse(responce);
			var url = data.url;

			if (data.status == 'success') {
				swal ({
					title: data.title,
	                text: data.message,
	                type: data.status,
	                timer: 1000,
	                showConfirmButton: false
	            }, function() {
	               	window.location.href = url + '?userID=' + user_id;
				});
			}

			else {
				swal({
	                title: data.title,
	                text: data.message,
	                type: data.status,
	                timer: 1000,
	                showConfirmButton: false
	            });
			}
		});
	}
}

function update_DivRole() {
	var division 		= $('#division').val();
	var old_division 	= $('#old_division').val();
	var user_id 		= $('#user_id').val();
	var upBy_id  		= $('#upBy_id').val();
	var action  		= 'submit';

	var data = {
		division : division,
		user_id : user_id,
		upBy_id : upBy_id,
		action : action
	}

	$.post(baseUrl + 'Update-User-DivRole', data, function(responce) {
		var data = JSON.parse(responce);
		var url = data.url;

		if (data.status == 'success' && old_division != division) {
			swal ({
				title: data.title,
                text: data.message,
                type: data.status,
                timer: 1000,
                showConfirmButton: false
            }, function (){
            	window.location.href = url + '?userID=' + user_id;
            });
		}

		else {
			swal({
                title: data.title,
                text: data.message,
                type: data.status,
                timer: 1000,
                showConfirmButton: false
            });
		}
	});
}

function update_image() {
	var formData 	= new FormData($('#imgFile')[0]);
	var user_id 	= $('#user_id').val();
	var upBy_id  	= $('#upBy_id').val();
	
	$.ajax({
		url : baseUrl + 'Update-User-Image?userID=' + user_id,
		type : 'post',
		dataType : 'json',
		data : formData,
		async :false,
		cache : false,
		contentType : false,
		processData : false,
		success : function(data) {
			if (data.status == 'success') {
				swal ({
					title: data.title,
	                text: data.message,
	                type: data.status,
	                timer: 1000,
	                showConfirmButton: false
	            }, function (){
	            	window.location.href = data.url + '?userID=' + user_id;
	            });
			}

			else {
				swal({
	                title: data.title,
	                text: data.message,
	                type: data.status,
	                timer: 1000,
	                showConfirmButton: false
	            }, function (){
	            	window.location.href = data.url + '?userID=' + user_id;
	            });
			}
		}
	});
}

function update_user_username() {
	var ups_new_username 		= $('#ups_new_username').val();
	var retype_username 	= $('#retype_username').val();
	var user_id 		= $('#user_id').val();
	var upBy_id  		= $('#upBy_id').val();
	var action  		= 'submit';

	var data = {
		ups_new_username : ups_new_username,
		user_id : user_id,
		upBy_id : upBy_id,
		action : action
	}

	if (ups_new_username != retype_username) {
		swal({
            title: "Incorrect",
            text: "Please Retype Username Again",
            type: "warning",
            timer: 1000,
            showConfirmButton: false
        });
	}

	else {
		$.post(baseUrl + 'Update-User-Username', data, function(responce) {
			var data = JSON.parse(responce);
			var url = data.url;

			if (data.status == 'success') {
				swal ({
					title: data.title,
	                text: data.message,
	                type: data.status,
	                timer: 1000,
	                showConfirmButton: false
	            }, function (){
	            	window.location.href = data.url + '?userID=' + user_id;
	            });
			}

			else {
				swal({
	                title: data.title,
	                text: data.message,
	                type: data.status,
	                timer: 1000,
	                showConfirmButton: false
	            });
			}
		});
	}
}

function update_user_password() {
	var ups_new_password 		= $('#ups_new_password').val();
	var ups_retype_password 	= $('#ups_retype_password').val();
	var user_id 		= $('#user_id').val();
	var upBy_id  		= $('#upBy_id').val();
	var action  		= 'submit';

	var data = {
		ups_new_password : ups_new_password,
		user_id : user_id,
		upBy_id : upBy_id,
		action : action
	}

	if (ups_new_password != ups_retype_password) {
		swal({
            title: "Incorrect",
            text: "Please Retype password Again",
            type: "warning",
            timer: 1000,
            showConfirmButton: false
        });
	}

	else {
		$.post(baseUrl + 'Update-User-Password', data, function(responce) {
			var data = JSON.parse(responce);
			var url = data.url;

			if (data.status == 'success') {
				swal ({
					title: data.title,
	                text: data.message,
	                type: data.status,
	                timer: 1000,
	                showConfirmButton: false
	            }, function (){
	            	window.location.href = data.url + '?userID=' + user_id;
	            });
			}

			else {
				swal({
	                title: data.title,
	                text: data.message,
	                type: data.status,
	                timer: 1000,
	                showConfirmButton: false
	            });
			}
		});
	}
}