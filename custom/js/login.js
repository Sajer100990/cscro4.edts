// declaring global baseurl
var baseUrl  = $('#base_url').val();

// for key press enter
function login_enter() {
	var input = document.getElementById("username");
	var input = document.getElementById("password");
	input.addEventListener("keyup", function(event) {
	  	if (event.keyCode === 13) {
	  	 	event.preventDefault();
	   		document.getElementById("mySubmitLogin").click();
	  	}
	});
}

function login() {
	var username  = $('#username').val();
	var password  = $('#password').val();
	var action   = 'submit';
	var data     = {
		username: username,
		password: password,
		action: action
	}

	if (username == "") {
		$('#username').focus();
		alert('Username Require');
		return false;
	}

	else if(password == "") {
		$('#password').focus();
		alert('Password Require');
		return false;
	}

	else {
		$.post(baseUrl + 'UserLogin', data, function(responce) {
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
				$('#username').focus();
				$('#password').val('');

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