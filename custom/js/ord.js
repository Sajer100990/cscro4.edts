// declaring global baseurl
var baseUrl  = $('#base_url').val();

function GenerateNum() {
	
}

function add_ord_entry() {
	// get data from page
	var division  			= $('#division').val();
	var doc_no  			= $('#doc_no').text();
	var doc_entry  			= $('#doc_entry').val();
	var doc_type  			= $('#doc_type').val();
	var fd_type  			= $('#fd_type').val();
	var subject  			= $('#subject').val();
	var sender  			= $('#sender').val();
	var action_officer  	= $('#action_officer').val();
	var receiving_division  = $('#receiving_division').val();
	var remarks  			= $('#remarks').val();
	var action   			= 'submit';

	var data = {
		division : division,
		doc_no : doc_no,
		doc_entry : doc_entry,
		doc_type : doc_type,
		fd_type : fd_type,
		subject : subject,
		sender : sender,
		action_officer : action_officer,
		receiving_division : receiving_division,
		remarks : remarks,
		action : action
	}

	// if (division == 'null_value' || doc_entry == 'null_value' ||  doc_type == 'null_value' ||  fd_type == 'null_value' ||  action_officer == 'null_value' ||  receiving_division == 'null_value') {
	// 	alert('Select Entry');
	// }

	if (division == 'null_value') {
		alert('Select Entry');
	}
	else {
		$.post(baseUrl + 'add_ord_entry', data, function(responce) {
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