// declaring global baseurl
var baseUrl  = $('#base_url').val();

function update_personal_info() {
	var fn  		= $('#fn').val();
	var mi  		= $('#mi').val();
	var ln  		= $('#ln').val();
	var contact 	= $('#contact').val();
	var position  	= $('#position').val();
	var user_id  	= $('#user_id').val();
	var upBy_id  	= $('#upBy_id').val();
	var action   	= 'submit';

	var data = {
		fn : fn,
		mi : mi,
		ln : ln,
		contact : contact,
		position : position,
		user_id : user_id,
		upBy_id : upBy_id,
		action : action
	}

	if (fn == '' || ln == '' || contact == '' || position == '') {
		alert('Please complete your details');
	}

	else {
		$.post(baseUrl + 'Admin-Update-Personal-Info', data, function(responce) {
			var data = JSON.parse(responce);
			var url = data.url;

			if (data.status == 'success') {
				swal ({
					title: data.title,
	                text: data.message,
	                type: data.status,
	                timer: 1000,
	                showConfirmButton: false
	            }
	   //          , function() {
	   //             	window.location.href = url;
				// }
				);
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

function update_admin_security() {
	var security_question = $('#security_question').val();
	var security_answer = $('#security_answer').val();
	var security_answer1 = $('#security_answer1').val();
	var user_id  	= $('#user_id').val();
	var action   	= 'submit';

	var data = {
		security_question : security_question,
		security_answer : security_answer,
		user_id : user_id,
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
		$.post(baseUrl + 'Admin-Update-Security', data, function(responce) {
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

function update_admin_DivRole() {
	var division 		= $('#division').val();
	var old_division 	= $('#old_division').val();
	var user_id 		= $('#user_id').val();
	var upBy_id 		= $('#upBy_id').val();
	var action  		= 'submit';

	var data = {
		division : division,
		user_id : user_id,
		upBy_id : upBy_id,
		action : action
	}

	$.post(baseUrl + 'Admin-Update-DivRole', data, function(responce) {
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

function update_admin_username() {
	var ups_old_username 	= $('#ups_old_username').val();
	var ups_new_username 	= $('#ups_new_username').val();
	var ups_retype_username = $('#ups_retype_username').val();
	var username 			= $('#username').val();
	var user_id 			= $('#user_id').val();
	var action  			= 'submit';

	var data = {
		ups_new_username : ups_new_username,
		user_id : user_id,
		action : action
	}

	if (ups_old_username == "" || ups_new_username == "" || ups_retype_username == "") {
		$('#ups_old_username').focus();

		swal ({
			title: "Empty",
            text: "Please Fill All The Field(s).",
            type: "error",
            timer: 1000,
            showConfirmButton: false
        });
		return false;
	}

	else if (ups_old_username != username) {
		$('#ups_old_username').focus();
		swal ({
			title: "Username",
            text: "Old Username Don't Match",
            type: "error",
            timer: 1000,
            showConfirmButton: false
        });
		return false;
	}

	else if (ups_new_username != ups_retype_username) {
		$('#ups_retype_username').focus();
		swal ({
			title: "Username",
            text: "Please retype username.",
            type: "warning",
            timer: 1000,
            showConfirmButton: false
        });
		return false;
	}

	else {
		$.post(baseUrl + 'Admin-Update-Username', data, function(responce) {
			var data = JSON.parse(responce);
			var url = data.url;

			if (data.status == 'success' && ups_old_username != ups_new_username) {
				swal ({
					title: data.title,
	                text: data.message,
	                type: data.status,
	                timer: 1000,
	                showConfirmButton: false
	            }, function (){
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

function update_admin_password() {
	var ups_old_password 	= $('#ups_old_password').val();
	var ups_new_password 	= $('#ups_new_password').val();
	var ups_retype_password = $('#ups_retype_password').val();
	var password 			= $('#password').val();
	var user_id 			= $('#user_id').val();
	var action  			= 'submit';

	var data = {
		ups_old_password : ups_old_password,
		ups_new_password : ups_new_password,
		password : password,
		user_id : user_id,
		action : action
	}

	if (ups_old_password == "" || ups_new_password == "" || ups_retype_password == "") {
		$('#ups_old_password').focus();

		swal ({
			title: "Empty",
            text: "Please Fill All The Field(s).",
            type: "error",
            timer: 1000,
            showConfirmButton: false
        });
		return false;
	}

	else {
		$.post(baseUrl + 'Admin-Update-Password', data, function(responce) {
			var data = JSON.parse(responce);
			var url = data.url;

			if (data.status == 'success' && ups_old_password != ups_new_password) {
				swal ({
					title: data.title,
	                text: data.message,
	                type: data.status,
	                timer: 1000,
	                showConfirmButton: false
	            }, function (){
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

function update_admin_image() {
	var formData = new FormData($('#imgFile')[0]);
	var user_id 			= $('#user_id').val();
	
	$.ajax({
		url : baseUrl + 'Admin-Update-Image?user_id=' + user_id,
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
	            	window.location.href = data.url;
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
		}
	});
}