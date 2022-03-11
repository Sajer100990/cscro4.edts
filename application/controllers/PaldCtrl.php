<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PaldCtrl extends CI_Controller {
	private $data;
	private $user_session_id;

	public function __construct() {
		parent:: __construct();
		include 'includes/models.php';
		// load year list
		$this->data['year_list'] = $this->SystemInfoModel->load_year_list('*');
		// load excel library
		// $this->load->library('Excel');
		// set system time
		$this->data['current_month'] = date('m');
		$this->data['current_day'] = date('d');
		$this->data['current_year'] = date('Y');
		$this->data['current_year2'] = date('y');
		// call year table


		// callout session that was set after login
		$this->user_session_id = $this->session->userdata('session_id');

		if (!isset($this->user_session_id)) {
			show_404();
		}

		else {
			include 'includes/admin_redirect_path.php';
		}
	}


	// navigation
	public function PaldDataEntry() {
		if (isset($_GET['ay'])) {
			$get_ay = $_GET['ay'];
			$latest_year = date('Y');

			if ($get_ay == $latest_year) {
				// including script and navigation
				$this->data['nav'] = 'DataEntry-PALD';
				$this->data['pageScript'] = 'pald';

				// call out model function
				// calling system info in db
				$this->data['show_SystemInfo'] = $this->SystemInfoModel->show_SystemInfo();
				// calling user data in db
				$this->data['UserData'] = $this->UserModel->user_data('*', $this->user_session_id);
				// calling current data entry in db, EDTS
				$this->data['CurrentListEDTS'] = $this->PaldDataModel->get_paldDataEntry_byDate('*', $this->data['current_month'], $this->data['current_day'], $this->data['current_year2'], $get_ay);
				// load division
				$this->data['load_Division'] = $this->PaldDataModel->load_Division('*');
				// load data entry
				$this->data['user_docEntry'] = $this->PaldDataModel->user_docEntry('*');
				// load data type
				$this->data['user_docType'] = $this->PaldDataModel->user_docType('*');
				// select user list
				$this->data['select_userList'] = $this->UserModel->select_userList('*', '0', '0');

				// this will be include the value of data to admin view
				$this->load->view('admin/includes/header', $this->data);
				$this->load->view('admin/pald_dataEntry', $this->data);
				$this->load->view('admin/includes/footer');
			}
			
			else {
				show_404();
			}
		}

		else {
			show_404();
		}
		
	}

	public function DataEntryMasterlist() {
		if (isset($_GET['ay'])) {
			$get_ay = $_GET['ay'];
			// validate year for if existing
			$validate_year = $this->SystemInfoModel->annual_year($get_ay);

			if ($validate_year != false) {
				// including script and navigation
				$this->data['nav'] = 'DataEntry-Masterlist';
				$this->data['pageScript'] = 'pald';
				// call out model function
				// calling system info in db
				$this->data['show_SystemInfo'] = $this->SystemInfoModel->show_SystemInfo();
				// calling user data in db
				$this->data['UserData'] = $this->UserModel->user_data('*', $this->user_session_id);
				// load all data received
				$this->data['load_DateEntry'] = $this->PaldDataModel->load_DateEntryYear('*', $get_ay);

				// this will be include the value of data to admin view
				$this->load->view('admin/includes/header', $this->data);
				$this->load->view('admin/dataentry_masterlist', $this->data);
				$this->load->view('admin/includes/footer');
			}

			else {
				show_404();
			}
		}

		else {
			show_404();
		}
	}

	public function UploadOldEdtsFile() {
		// including script and navigation
		$this->data['nav'] = 'Upload-Old-EDTS-File';
		$this->data['pageScript'] = 'pald';
		// call out model function
		// calling system info in db
		$this->data['show_SystemInfo'] = $this->SystemInfoModel->show_SystemInfo();
		// calling user data in db
		$this->data['UserData'] = $this->UserModel->user_data('*', $this->user_session_id);

		// this will be include the value of data to admin view
		$this->load->view('admin/includes/header', $this->data);
		$this->load->view('admin/upload_oldEDTS', $this->data);
		$this->load->view('admin/includes/footer');
	}

	public function DataEntryDetails() {
		if (isset($_GET['ay']) AND isset($_GET['id'])) {
			// get url data
			$get_ay = $_GET['ay'];
			$get_id = $_GET['id'];
			$get_item = $_GET['item'];
			// including script and navigation
			if ($get_item == 'today') {
				$this->data['nav'] = 'DataEntry-PALD';
			}

			else {
				$this->data['nav'] = 'DataEntry-Masterlist';
			}
			
			$this->data['pageScript'] = 'pald';
			// call out model function
			// calling system info in db
			$this->data['show_SystemInfo'] = $this->SystemInfoModel->show_SystemInfo();
			// calling user data in db
			$this->data['UserData'] = $this->UserModel->user_data('*', $this->user_session_id);
			// load division
			$this->data['load_Division'] = $this->PaldDataModel->load_Division('*');
			// load data entry
			$this->data['user_docEntry'] = $this->PaldDataModel->user_docEntry('*');
			// load data type
			$this->data['user_docType'] = $this->PaldDataModel->user_docType('*');
			// load user data according to id
			$this->data['load_DateEntryID'] = $this->PaldDataModel->load_DateEntryID('*', $get_id, $get_ay);

			if ($this->data['load_DateEntryID'] != NULL) {
				// this will be include the value of data to admin view
				$this->load->view('admin/includes/header', $this->data);
				$this->load->view('admin/manage_edts_file', $this->data);
				$this->load->view('admin/includes/footer');
			}

			else {
				show_404();
			}
		}

		else {
			show_404();
		}
	}

	public function SpelsMasterlist() {
		// including script and navigation
		$this->data['nav'] = 'SPELS-Masterlist';
		$this->data['pageScript'] = 'pald';
		// call out model function
		// calling system info in db
		$this->data['show_SystemInfo'] = $this->SystemInfoModel->show_SystemInfo();
		// calling user data in db
		$this->data['UserData'] = $this->UserModel->user_data('*', $this->user_session_id);
		// load all data received
		$this->data['load_SpelsData'] = $this->PaldDataModel->load_SpelsData('*');

		// this will be include the value of data to admin view
		$this->load->view('admin/includes/header', $this->data);
		$this->load->view('admin/spels_masterlist', $this->data);
		$this->load->view('admin/includes/footer');
	}

	public function DeleteDataEntry() {
		if (isset($_GET['ay']) AND isset($_GET['id'])) {
			// get url data
			$get_ay = $_GET['ay'];
			$get_id = $_GET['id'];
			$get_item = $_GET['item'];
			if ($get_item == 'today') {
				$this->data['nav'] = 'DataEntry-PALD';
			}

			else {
				$this->data['nav'] = 'DataEntry-Masterlist';
			}
			
			// including script and navigation
			
			$this->data['pageScript'] = 'pald';
			// call out model function
			// calling system info in db
			$this->data['show_SystemInfo'] = $this->SystemInfoModel->show_SystemInfo();
			// calling user data in db
			$this->data['UserData'] = $this->UserModel->user_data('*', $this->user_session_id);
			// load division
			$this->data['load_Division'] = $this->PaldDataModel->load_Division('*');
			// load data entry
			$this->data['user_docEntry'] = $this->PaldDataModel->user_docEntry('*');
			// load data type
			$this->data['user_docType'] = $this->PaldDataModel->user_docType('*');
			// load user data according to id
			$this->data['load_DateEntryID'] = $this->PaldDataModel->load_DateEntryID('*', $get_id, $get_ay);

			if ($this->data['load_DateEntryID'] != NULL) {
				// this will be include the value of data to admin view
				$this->load->view('admin/includes/header', $this->data);
				$this->load->view('admin/delete_edts_file', $this->data);
				$this->load->view('admin/includes/footer');
			}

			else {
				show_404();
			}
		}

		else {
			show_404();
		}
	}



	// function
	public function Logout() {
		$this->user_session_id = $this->session->unset_userdata('session_id');
		redirect(base_url());
	}

	public function PaldGenerateNum() {
		// get AY from ajax
		$get_ay = $this->input->post('get_ay');

		// validate existence for generating document number
		$result = $this->PaldDataModel->get_CurrentpaldDataEntry_byDiv('*', $this->input->post('division'), $this->data['current_month'], $this->data['current_day'], $this->data['current_year2'], $get_ay);


		if ($result != false) {
			// count current data entry
			$get_data_for_count = $this->PaldDataModel->count_current_docSeries('*', $this->input->post('division'), $this->data['current_month'], $this->data['current_day'], $this->data['current_year2'], $get_ay);

			// get 2 digit number count with zero
			if ($get_data_for_count == '9') {
				$latest_count = '10';
			}

			else if ($get_data_for_count < 10) {
				$query_count = $get_data_for_count + 1;
				$latest_count = '0'.$query_count;
			}

			else {
				$latest_count = $get_data_for_count + 1;
			}

			$status = 'Ok';
			$seriesNum = $this->input->post('division').$this->data['current_month'].$this->data['current_day'].$this->data['current_year2'].$latest_count;
		}

		else {
			$status = 'null';
			$seriesNum = $this->input->post('division').$this->data['current_month'].$this->data['current_day'].$this->data['current_year2'].'01';
		}

		echo json_encode(array('status' => $status, 'seriesNum' => $seriesNum));
	}

	public function PaldAdminAddEntry() {
		if ($_POST['action'] == 'submit') {
			// get AY from ajax
			$get_ay = $this->input->post('get_ay');
			$division 		= $this->input->post('division');
			$doc_no 		= $this->input->post('doc_no');
			$doc_entry 		= $this->input->post('doc_entry');
			$doc_type 		= $this->input->post('doc_type');
			$subject 		= $this->input->post('subject');
			$sender 		= $this->input->post('sender');
			$remarks 		= $this->input->post('remarks');
			$user_name 		= $this->input->post('user_name');
			$user_id 		= $this->input->post('user_id');

			// validate doc_no existence
			$val_docNum = $this->PaldDataModel->validate_DocNum('id, doc_no', $doc_no, $get_ay);

			if ($val_docNum != false) {
				// get latest count
				$get_data_for_count = $this->PaldDataModel->count_current_docSeries('*', $this->input->post('division'), $this->data['current_month'], $this->data['current_day'], $this->data['current_year2'], $get_ay);

				// get 2 digit number count with zero
				if ($get_data_for_count == '9') {
					$latest_count = '10';
					$doc_no = $division.$this->data['current_month'].$this->data['current_day'].$this->data['current_year2'].$latest_count;
				}

				else if ($get_data_for_count < 10) {
					$query_count = $get_data_for_count + 1;
					$latest_count = '0'.$query_count;
					$doc_no = $division.$this->data['current_month'].$this->data['current_day'].$this->data['current_year2'].$latest_count;
				}

				else {
					$latest_count = $get_data_for_count + 1;
					$doc_no = $division.$this->data['current_month'].$this->data['current_day'].$this->data['current_year2'].$latest_count;
				}

				// save
				$result = $this->PaldDataModel->SaveAdminPaldEntry($division, $doc_no, $doc_entry, $doc_type, $subject, $sender, $remarks, $user_name, $user_id, $get_ay);
			}

			else {
				// save
				$result = $this->PaldDataModel->SaveAdminPaldEntry($division, $doc_no, $doc_entry, $doc_type, $subject, $sender, $remarks, $user_name, $user_id, $get_ay);
			}

			// get data result
			if ($result) {
				$title = 'Successfully';
				$status = 'success';
				$url = 'DataEntry-PALD?ay='.$get_ay.' ';
				$message = 'Added Data Entry';
			}

			else {
				$title = 'Unable';
				$status = 'warning';
				$url = '';
				$message = 'Add Data Entry';
			}

			echo json_encode(array('title' => $title, 'status' => $status, 'url' => $url, 'message' => $message));
		}
	}

	public function InsertOldEdtsFile2020() {
		if(isset($_FILES["old_edts_file"]["name"])) {
			$update_by = $this->input->post('upBy_id');

			$edts_list = $_FILES["old_edts_file"]["tmp_name"];
			
			// load excel file using PHPExcel's IOFactory
            // change filename to tmp_name of uploaded file
			$excel = PHPExcel_IOFactory::load($edts_list);
			// set active sheet to first sheet
            $excel->setActiveSheetIndex(0);
            // set first row of data series
            $i = 2;

            while ($excel->getActiveSheet()->getCell('A'.$i)->getValue() != "") {
            	// get cells value for field from excel file
            	$m 			= $excel->getActiveSheet()->getCell('I'.$i)->getValue();
            	$d 			= $excel->getActiveSheet()->getCell('J'.$i)->getValue();
            	$year 		= $excel->getActiveSheet()->getCell('K'.$i)->getValue();
            	$year2 		= $excel->getActiveSheet()->getCell('L'.$i)->getValue();
            	$division 	= $excel->getActiveSheet()->getCell('A'.$i)->getValue();
            	$doc_no 	= $excel->getActiveSheet()->getCell('B'.$i)->getValue();
            	$doc_entry 	= $excel->getActiveSheet()->getCell('C'.$i)->getValue();
            	$doc_type 	= $excel->getActiveSheet()->getCell('D'.$i)->getValue();
            	$subject 	= $excel->getActiveSheet()->getCell('E'.$i)->getValue();
            	$sender 	= $excel->getActiveSheet()->getCell('F'.$i)->getValue();
            	$encoded_by = $excel->getActiveSheet()->getCell('G'.$i)->getValue();
            	$remarks 	= $excel->getActiveSheet()->getCell('H'.$i)->getValue();

            	if ($m <= '9') {
            		$month = '0'.$excel->getActiveSheet()->getCell('I'.$i)->getValue();
            	}

            	else {
            		$month = $excel->getActiveSheet()->getCell('I'.$i)->getValue();
            	}

            	if ($d <= '9') {
            		$day = '0'.$excel->getActiveSheet()->getCell('J'.$i)->getValue();
            	}

            	else {
            		$day = $excel->getActiveSheet()->getCell('J'.$i)->getValue();
            	}

            	// save value to db
            	$result = $this->PaldDataModel->insert_old_edts2020($month, $day, $year, $year2, $division, $doc_no, $doc_entry, $doc_type, $subject, $sender, $encoded_by, $remarks, $update_by);

            	// increment loop
            	$i++;
            }


			if ($result) {
				$title = 'Success';
				$status = 'success';
				$url = 'Upload-Old-EDTS-File';
				$message = 'Successfully Uploaded EDTS Data';
			}

			else {
				$title = 'Unable';
				$status = 'warning';
				$url = 'Upload-Old-EDTS-File';
				$message = 'Unable to upload data.';
			}

			echo json_encode(array('title' => $title, 'status' => $status, 'url' => $url, 'message' => $message));
		}
	}

	public function InsertOldEdtsFile2019() {
		if(isset($_FILES["old_edts_file"]["name"])) {
			$update_by = $this->input->post('upBy_id');

			$edts_list = $_FILES["old_edts_file"]["tmp_name"];
			
			// load excel file using PHPExcel's IOFactory
            // change filename to tmp_name of uploaded file
			$excel = PHPExcel_IOFactory::load($edts_list);
			// set active sheet to first sheet
            $excel->setActiveSheetIndex(0);
            // set first row of data series
            $i = 2;

            while ($excel->getActiveSheet()->getCell('A'.$i)->getValue() != "") {
            	// get cells value for field from excel file
            	$m 			= $excel->getActiveSheet()->getCell('I'.$i)->getValue();
            	$d 			= $excel->getActiveSheet()->getCell('J'.$i)->getValue();
            	$year 		= $excel->getActiveSheet()->getCell('K'.$i)->getValue();
            	$year2 		= $excel->getActiveSheet()->getCell('L'.$i)->getValue();
            	$division 	= $excel->getActiveSheet()->getCell('A'.$i)->getValue();
            	$doc_no 	= $excel->getActiveSheet()->getCell('B'.$i)->getValue();
            	$doc_entry 	= $excel->getActiveSheet()->getCell('C'.$i)->getValue();
            	$doc_type 	= $excel->getActiveSheet()->getCell('D'.$i)->getValue();
            	$subject 	= $excel->getActiveSheet()->getCell('E'.$i)->getValue();
            	$sender 	= $excel->getActiveSheet()->getCell('F'.$i)->getValue();
            	$encoded_by = $excel->getActiveSheet()->getCell('G'.$i)->getValue();
            	$remarks 	= $excel->getActiveSheet()->getCell('H'.$i)->getValue();

            	if ($m <= '9') {
            		$month = '0'.$excel->getActiveSheet()->getCell('I'.$i)->getValue();
            	}

            	else {
            		$month = $excel->getActiveSheet()->getCell('I'.$i)->getValue();
            	}

            	if ($d <= '9') {
            		$day = '0'.$excel->getActiveSheet()->getCell('J'.$i)->getValue();
            	}

            	else {
            		$day = $excel->getActiveSheet()->getCell('J'.$i)->getValue();
            	}

            	// save value to db
            	$result = $this->PaldDataModel->insert_old_edts2019($month, $day, $year, $year2, $division, $doc_no, $doc_entry, $doc_type, $subject, $sender, $encoded_by, $remarks, $update_by);

            	// increment loop
            	$i++;
            }


			if ($result) {
				$title = 'Success';
				$status = 'success';
				$url = 'Upload-Old-EDTS-File';
				$message = 'Successfully Uploaded EDTS Data';
			}

			else {
				$title = 'Unable';
				$status = 'warning';
				$url = 'Upload-Old-EDTS-File';
				$message = 'Unable to upload data.';
			}

			echo json_encode(array('title' => $title, 'status' => $status, 'url' => $url, 'message' => $message));
		}
	}

	public function UpdateEdts() {
		if ($_POST['action'] == 'submit') {
			$doc_id 	= $this->input->post('doc_id');
			$month 		= $this->input->post('month');
			$day 		= $this->input->post('day');
			$year 		= $this->input->post('year');
			$year2 		= $this->input->post('year2');
			$division 	= $this->input->post('division');
			$doc_no 	= $this->input->post('doc_no');
			$doc_entry 	= $this->input->post('doc_entry');
			$doc_type 	= $this->input->post('doc_type');
			$subject 	= $this->input->post('subject');
			$sender 	= $this->input->post('sender');
			$remarks 	= $this->input->post('remarks');
			$upBy_id 	= $this->input->post('user_id');
			$get_ay 	= $this->input->post('get_ay');
			$get_item 	= $this->input->post('get_item');

			// update
			$result = $this->PaldDataModel->UpdatePaldDataEntry($month, $day, $year, $year2, $division, $doc_no, $doc_entry, $doc_type, $subject, $sender, $remarks, $upBy_id, $doc_id, $get_ay);

			// get data result
			if ($result) {
				$title = 'Successfully';
				$status = 'success';
				$url = 'DataEntry-Details?ay='.$get_ay.'&id='.$doc_id.'&item='.$get_item;
				$message = 'Updated Data Entry';
			}

			else {
				$title = 'Unable';
				$status = 'Please contact your system administration';
				$url = 'DataEntry-Details?ay='.$get_ay.'&id='.$doc_id;
				$message = 'Update Data Entry';
			}

			echo json_encode(array('title' => $title, 'status' => $status, 'url' => $url, 'message' => $message));
		}
	}

	public function DeleteEdts() {
		if ($_POST['action'] == 'submit') {
			// get data from ajax
			$doc_id = $this->input->post('doc_id');
			$get_ay = $this->input->post('get_ay');
			$get_item = $this->input->post('get_item');

			$result = $this->PaldDataModel->delete_edts($doc_id, $get_ay);

			// get data result
			if ($result) {
				$title = 'Successfully';
				$status = 'success';
				if ($get_item == 'today') {
					$url = 'DataEntry-PALD?ay='.$get_ay.' ';
				}

				else {
					$url = 'DataEntry-Masterlist?ay='.$get_ay.' ';
				}
				$message = 'Delete Data Entry';
			}

			else {
				$title = 'Unable';
				$status = 'Please contact your system administration';
				$url = 'Delete-DataEntry?ay='.$get_ay.'&id='.$doc_id;
				$message = 'Please contact your system administrator';
			}

			echo json_encode(array('title' => $title, 'status' => $status, 'url' => $url, 'message' => $message));
		}
	}

	public function InsertSpelsFile() {
		if(isset($_FILES["spels_file"]["name"])) {
			$update_by = $this->input->post('upBy_id');

			$spels_list = $_FILES["spels_file"]["tmp_name"];
			
			// load excel file using PHPExcel's IOFactory
            // change filename to tmp_name of uploaded file
			$excel = PHPExcel_IOFactory::load($spels_list);
			// set active sheet to first sheet
            $excel->setActiveSheetIndex(0);
            // set first row of data series
            $i = 2;

            while ($excel->getActiveSheet()->getCell('A'.$i)->getValue() != "") {
            	// get cells value for field from excel file
            	$type 			= $excel->getActiveSheet()->getCell('F'.$i)->getValue();
            	$tag 			= $excel->getActiveSheet()->getCell('G'.$i)->getValue();
            	$firstname 		= $excel->getActiveSheet()->getCell('C'.$i)->getValue();
            	$middleinitial 	= $excel->getActiveSheet()->getCell('D'.$i)->getValue();
            	$lastname 		= $excel->getActiveSheet()->getCell('B'.$i)->getValue();
            	$extraname 		= $excel->getActiveSheet()->getCell('E'.$i)->getValue();
            	$coe_issued 	= $excel->getActiveSheet()->getCell('A'.$i)->getValue();

            	// save value to db
            	$result = $this->PaldDataModel->insert_spels_list($type, $tag, $firstname, $middleinitial, $lastname, $extraname, $coe_issued, $update_by);

            	// increment loop
            	$i++;
            }

			if ($result) {
				$title = 'Success';
				$status = 'success';
				$url = 'Upload-Old-EDTS-File';
				$message = 'Successfully Uploaded EDTS Data';
			}

			else {
				$title = 'Unable';
				$status = 'warning';
				$url = 'Upload-Old-EDTS-File';
				$message = 'Unable to upload data.';
			}

			echo json_encode(array('title' => $title, 'status' => $status, 'url' => $url, 'message' => $message));
		}
	}

	public function onday_receiver() {
		if ($_POST['action'] == 'submit') {
			$received_by 	= $this->input->post('received_by');
			$received_division 	= $this->input->post('received_division');

			// update
			$result = $this->PaldDataModel->update_receiver_onday($this->data['current_month'], $this->data['current_day'], $this->data['current_year2'], $received_by, $received_division);

			// get data result
			if ($result) {
				$title = 'Successfully';
				$status = 'success';
				$url = 'DataEntry-PALD';
				$message = 'Updated Receiver';
			}

			else {
				$title = 'Unable';
				$status = 'Please contact your system administration';
				$url = 'DataEntry-PALD';
				$message = 'Update Receiver';
			}

			echo json_encode(array('title' => $title, 'status' => $status, 'url' => $url, 'message' => $message));
		}
	}
}
?>
