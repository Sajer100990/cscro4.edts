// declaring global baseurl
var baseUrl  = $('#base_url').val();

function Update_SystemDetails() {
	var system_id  = $('#system_id').val();
	var ups_title  = $('#ups_title').val();
	var ups_header  = $('#ups_header').val();
	var ups_footer  = $('#ups_footer').val();

	var action   = 'submit';

	var data     = {
		system_id: system_id,
		ups_title: ups_title,
		ups_header: ups_header,
		ups_footer: ups_footer,
		action: action
	}

	if (ups_title == "" || ups_header == "" || ups_footer == "") {
		swal({
	        title: "Empty",
	        text: "Please fill all the field(s)",
	        type: "warning",
	        timer: 1000,
	        showConfirmButton: false
	    });
	}

	else {
		$.post(baseUrl + 'Update-SystemDetails', data, function(responce) {
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

function Update_systemContact() {
	var system_id  = $('#system_id').val();
	var ups_address  = $('#ups_address').val();
	var ups_contact  = $('#ups_contact').val();
	var ups_region  = $('#ups_region').val();
	var ups_email  = $('#ups_email').val();
	var ups_fb  = $('#ups_fb').val();

	var action   = 'submit';

	var data     = {
		system_id: system_id,
		ups_address: ups_address,
		ups_contact: ups_contact,
		ups_region: ups_region,
		ups_email: ups_email,
		ups_fb: ups_fb,
		action: action
	}

	if (ups_address == "" || ups_contact == "" || ups_region == "" || ups_email == "") {
		swal({
	        title: "Empty",
	        text: "Please fill all the field(s)",
	        type: "warning",
	        timer: 1000,
	        showConfirmButton: false
	    });
	}

	else {
		$.post(baseUrl + 'Update-SystemContact', data, function(responce) {
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

function Update_systemMissionVision() {
	var system_id  = $('#system_id').val();
	var upsmission = document.getElementById("myTextarea").value;
	var upsvision = document.getElementById("myTextarea1").value;

	var action   = 'submit';

	var data     = {
		system_id: system_id,
		upsmission: upsmission,
		upsvision: upsvision,
		action: action
	}

	if (upsmission == "" || upsvision == "") {
		swal({
	        title: "Empty",
	        text: "Please fill all the field(s)",
	        type: "warning",
	        timer: 1000,
	        showConfirmButton: false
	    });
	}

	else {
		$.post(baseUrl + 'Update-SystemMissionVission', data, function(responce) {
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

function Update_WebIcon() {
	var formData = new FormData($('#imgIcon')[0]);

	$.ajax({
		url : baseUrl + 'Update-WebIcon',
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

function Update_WebBanner() {
	var formData = new FormData($('#imgBanner')[0]);

	$.ajax({
		url : baseUrl + 'Update-WebBanner',
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

function Update_WebSideBanner() {
	var formData = new FormData($('#imgSideBanner')[0]);

	$.ajax({
		url : baseUrl + 'Update-WebSideBanner',
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

function add_year() {
	var annual_year  = $('#annual_year').val();
	var action   = 'submit';

	var data     = {
		annual_year: annual_year,
		action: action
	}

	if (annual_year == "") {
		$('#annual_year').focus();
		alert('Year Require');
		return false;
	}

	else {
		$.post(baseUrl + 'addAnnualYear', data, function(responce) {
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

function delete_annual_year() {
	// get AY from url
	var url = new URL(document.URL);
	var search_params = url.searchParams;
	var get_annual_year = search_params.get('annual_year');

	var action = 'submit';

	var data     = {
		get_annual_year: get_annual_year,
		action: action
	}

	$.post(baseUrl + 'delAnnualYear', data, function(responce) {
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