// declaring global baseurl
var baseUrl  = $('#base_url').val();

// datatable
$(document).ready(function() {
    var table = $('#example').DataTable( {
        lengthChange: false,
        // for another extraction functionalities
        // buttons: [ 'copy', 'excel', 'pdf', 'colvis', 'print' ] 
        buttons: [ 'copy', 'excel', 'print' ]
    });
 
    table.buttons().container()
        .appendTo( '#example_wrapper .col-sm-6:eq(0)' );
} );

function GenerateNum() {
	// get AY from url
	var url = new URL(document.URL);
	var search_params = url.searchParams;
	var get_ay = search_params.get('ay');
	// get data from page
	var division  = $('#division').val();

	var data = {
		division : division,
		get_ay : get_ay
	}

	$.post(baseUrl + 'GenerateNum-PALD', data, function(responce) {
		var data = JSON.parse(responce);

		if (data.status == 'ok') {
			var seriesNum = data.seriesNum;
			document.getElementById("doc_no").innerHTML = seriesNum;
		}

		else if (division == 'null_value') {
			document.getElementById("doc_no").innerHTML = '';
		}

		else {
			var seriesNum = data.seriesNum;
			document.getElementById("doc_no").innerHTML = seriesNum;
		}
	});
}

function add_PaldENtry() {
	// get AY from url
	var url = new URL(document.URL);
	var search_params = url.searchParams;
	var get_ay = search_params.get('ay');
	// get data from page
	var division  	= $('#division').val();
	var doc_no  	= $('#doc_no').text();
	var doc_entry 	= $('#doc_entry').val();
	var doc_type  	= $('#doc_type').val();
	var subject  	= $('#subject').val();
	var sender  	= $('#sender').val();
	var remarks  	= $('#remarks').val();
	var user_name  	= $('#user_name').val();
	var user_id  	= $('#user_id').val();
	var action   	= 'submit';

	var data = {
		division : division,
		doc_no : doc_no,
		doc_entry : doc_entry,
		doc_type : doc_type,
		subject : subject,
		sender : sender,
		remarks : remarks,
		user_name : user_name,
		user_id : user_id,
		get_ay : get_ay,
		action : action
	}

	if (division == 'null_value' || doc_entry == 'null_value' ||  doc_type == 'null_value') {
		alert('Select Entry');
	}

	else {
		$.post(baseUrl + 'PaldAdminAddEntry', data, function(responce) {
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

function update_edts() {
	// get AY from url
	var url = new URL(document.URL);
	var search_params = url.searchParams;
	var get_ay = search_params.get('ay');
	var get_item = search_params.get('item');

	// get data from page
	var doc_id = $('#doc_id').val();
	var month = $('#month').val();
	var day = $('#day').val();
	var year = $('#year').val();
	var year2 = $('#year2').val();
	var division = $('#division').val();
	var doc_no = $('#doc_no').val();

	var doc_entry = $('#doc_entry').val();
	var doc_type = $('#doc_type').val();
	var subject = $('#subject').val();
	var sender = $('#sender').val();
	var remarks = $('#remarks').val();
	
	var user_name  	= $('#user_name').val();
	var user_id  	= $('#user_id').val();
	var action   = 'submit';

	var data = {
		doc_id : doc_id,
		month : month,
		day : day,
		year : year,
		year2 : year2,
		division : division,
		doc_id : doc_id,
		division : division,
		doc_no : doc_no,
		doc_entry : doc_entry,
		doc_type : doc_type,
		subject : subject,
		sender : sender,
		remarks : remarks,
		user_name : user_name,
		user_id : user_id,
		get_ay : get_ay,
		get_item : get_item,
		action : action
	}

	$.post(baseUrl + 'UpdateEdts', data, function(responce) {
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

function delete_edts() {
	// get AY from url
	var url = new URL(document.URL);
	var search_params = url.searchParams;
	var get_ay = search_params.get('ay');
	var get_item = search_params.get('item');
	// get data from page
	var doc_id = $('#doc_id').val();
	var action   = 'submit';

	var data = {
		doc_id : doc_id,
		get_ay : get_ay,
		get_item : get_item,
		action : action
	}

	$.post(baseUrl + 'DeleteEdts', data, function(responce) {
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

function upload_oldExtDocs() {
	var old_edts_file = $('#old_edts_file').val();

	if (old_edts_file == "" || select_year == "null") {
		swal ({
			title: 'Empty',
            text: 'Please supply all inputs.',
            type: 'warning',
            timer: 1000,
            showConfirmButton: false
        });
	}

	else {
		var select_year = $('#select_year').val();
		if (select_year == '2019') {
			var route_to = 'InsertOldEdtsFile2019';
		}

		else {
			var route_to = 'InsertOldEdtsFile2020';
		}

		var formData = new FormData($('#form_old_edts')[0]);
		var upBy_id  = $('#upBy_id').val();

		$.ajax({
			url : baseUrl + route_to,
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
		            }, function (){
		            	window.location.href = data.url;
		            });
				}
			}
		});
	}
}

function upload_spels() {
	var spels_file = $('#spels_file').val();

	if (spels_file == "") {
		swal ({
			title: 'Empty',
            text: 'Please select file to upload.',
            type: 'warning',
            timer: 1000,
            showConfirmButton: false
        });
	}

	else {
		var formData = new FormData($('#form_spels_file')[0]);
		var upBy_id  = $('#upBy_id').val();

		$.ajax({
			url : baseUrl + 'InsertSpelsFile',
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
		            }, function (){
		            	window.location.href = data.url;
		            });
				}
			}
		});
	}
}

// ******************************************************************************


// for user
function GenerateNum_user() {
	var division  = $('#division').val();

	var data = {
		division : division
	}

	$.post(baseUrl + 'GenerateNum-PALDuser', data, function(responce) {
		var data = JSON.parse(responce);

		if (data.status == 'ok') {
			var seriesNum = data.seriesNum;
			document.getElementById("doc_no").innerHTML = seriesNum;
		}

		else if (division == 'null_value') {
			document.getElementById("doc_no").innerHTML = '';
		}

		else {
			var seriesNum = data.seriesNum;
			document.getElementById("doc_no").innerHTML = seriesNum;
		}
	});
}

function add_PaldENtry_user() {
	var division  	= $('#division').val();
	var doc_no  	= $('#doc_no').text();
	var doc_entry 	= $('#doc_entry').val();
	var doc_type  	= $('#doc_type').val();
	var subject  	= $('#subject').val();
	var sender  	= $('#sender').val();
	var remarks  	= $('#remarks').val();
	var user_name  	= $('#user_name').val();
	var user_id  	= $('#user_id').val();
	var action   = 'submit';

	var data = {
		division : division,
		doc_no : doc_no,
		doc_entry : doc_entry,
		doc_type : doc_type,
		subject : subject,
		sender : sender,
		remarks : remarks,
		user_name : user_name,
		user_id : user_id,
		action : action
	}

	if (division == 'null_value' || doc_entry == 'null_value' ||  doc_type == 'null_value') {
		alert('Select Entry');
	}

	else {
		$.post(baseUrl + 'PaldAddEntryUser', data, function(responce) {
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

function update_PaldEntry_user() {
	var division  	= $('#division').val();
	var month  		= $('#month').val();
	var day  		= $('#day').val();
	var year  		= $('#year').val();
	var doc_entry  	= $('#doc_entry').val();
	var doc_type  	= $('#doc_type').val();
	var subject  	= $('#subject').val();
	var sender  	= $('#sender').val();
	var remarks  	= $('#remarks').val();
	var upBy_id  	= $('#upBy_id').val();
	var doc_id  	= $('#doc_id').val();
	var action   	= 'submit';

	var data = {
		division : division,
		month : month,
		day : day,
		year : year,
		doc_entry : doc_entry,
		doc_type : doc_type,
		subject : subject,
		sender : sender,
		remarks : remarks,
		upBy_id : upBy_id,
		doc_id : doc_id,
		action : action
	}

	
	$.post(baseUrl + 'PaldUpdateDataEntryUser', data, function(responce) {
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

function onday_receiver() {
	var received_by  	= $('#received_by').val();
	var received_division  	= $('#received_division').val();
	var action   = 'submit';

	var data = {
		received_by : received_by,
		received_division : received_division,
		action : action
	}

	if (received_by == "" || received_division == "null_value") {
		alert('Please complete the data');
	}

	else {
		$.post(baseUrl + 'onday_receiver', data, function(responce) {
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