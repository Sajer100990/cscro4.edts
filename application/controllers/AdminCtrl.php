<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminCtrl extends CI_Controller {
	private $data;
	private $user_session_id;

	public function __construct() {
		parent:: __construct();
		include 'includes/models.php';
		// load year list
		$this->data['year_list'] = $this->SystemInfoModel->load_year_list('*');
		// callout session that was set after login
		$this->user_session_id = $this->session->userdata('session_id');
		// call out position
		$this->data['position'] = $this->UserModel->user_position('position');
		// exporting database
		$this->load->helper('url');
		$this->load->helper('file');
		$this->load->helper('download');
		$this->load->library('zip');

		if (!isset($this->user_session_id)) {
			show_404();
		}

		else {
			include 'includes/admin_redirect_path.php';
		}
	}

	// navigation
	public function AdminDashboard() {
		// including script and navigation
		$this->data['nav'] = 'Admin-Dashboard';
		$this->data['pageScript'] = 'adminDashboard';

		// call out model function
		$this->data['show_SystemInfo'] = $this->SystemInfoModel->show_SystemInfo();
		$this->data['UserData'] = $this->UserModel->user_data('*', $this->user_session_id);
		
		// this will be include the value of data to admin view
		$this->load->view('admin/includes/header',$this->data);
		$this->load->view('admin/dashboard',$this->data);
		$this->load->view('admin/includes/footer',$this->data);
	}

	public function PersonalInfo() {
		// including script and navigation
		$this->data['nav'] = 'Admin-Personal-Info';
		$this->data['pageScript'] = 'adminpersonal';

		// call out model function
		$this->data['show_SystemInfo'] = $this->SystemInfoModel->show_SystemInfo();
		$this->data['UserData'] = $this->UserModel->user_data('*', $this->user_session_id);
			if ($this->data['UserData'] == '0') {
				$this->data['UserData_role'] = 'Administrator';
			}

			else {
				$this->data['UserData_role'] = 'Administrator';
			}

		// load security question
		$this->data['security_question'] = $this->SystemInfoModel->load_SecurityQuestion('*');
		
		// this will be include the value of data to admin view
		$this->load->view('admin/includes/header',$this->data);
		$this->load->view('admin/personal_info',$this->data);
		$this->load->view('admin/includes/footer',$this->data);
	}

	public function ManageSystemInfo() {
		// including script and navigation
		$this->data['nav'] = 'Admin-Manage-SystemInfo';
		$this->data['pageScript'] = 'systeminfo';

		// call out model function
		$this->data['show_SystemInfo'] = $this->SystemInfoModel->show_SystemInfo();
		$this->data['UserData'] = $this->UserModel->user_data('*', $this->user_session_id);
		
		// this will be include the value of data to admin view
		$this->load->view('admin/includes/header',$this->data);
		$this->load->view('admin/system_info',$this->data);
		$this->load->view('admin/includes/footer',$this->data);
	}

	public function ManageReceived() {
		if (isset($_GET['division'])) {
			if ($_GET['division'] == "") {
				show_404();
			}

			elseif ($_GET['division'] != 'PALD' AND $_GET['division'] != 'LSD' AND $_GET['division'] != 'PSED' AND $_GET['division'] != 'MSD' AND $_GET['division'] != 'HRD' AND $_GET['division'] != 'ESD' AND $_GET['division'] != 'ORD') {
				show_404();
			}

			else {
				// get division particular div
				$get_div = $_GET['division'];
				// get AY
				$get_ay = $_GET['ay'];
				// including script and navigation
				$this->data['nav'] = 'Admin-Manage-Received';
				$this->data['pageScript'] = '';

				// call out model function
				$this->data['show_SystemInfo'] = $this->SystemInfoModel->show_SystemInfo();
				$this->data['UserData'] = $this->UserModel->user_data('*', $this->user_session_id);

				// show esd data list
				$this->data['load_DivisionEntry'] = $this->PaldDataModel->load_DivisionEntry('*', $get_div, $get_ay);
				
				// this will be include the value of data to admin view
				$this->load->view('admin/includes/header',$this->data);
				$this->load->view('admin/dataentry_div_received',$this->data);
				$this->load->view('admin/includes/footer',$this->data);
			}
		}

		else {
			show_404();
		}
	}

	public function DeleteAnnualYear() {
		if (isset($_GET['annual_year'])) {
			if ($_GET['annual_year'] == "") {
				show_404();
			}

			else {
				// get AY
				$get_annual_year = $_GET['annual_year'];
				// validate year existence
				$validate_year = $this->SystemInfoModel->annual_year($get_annual_year);

				if ($validate_year != false) {
					// including script and navigation
					$this->data['nav'] = 'Admin-Manage-SystemInfo';
					$this->data['pageScript'] = 'systeminfo';

					// call out model function
					$this->data['show_SystemInfo'] = $this->SystemInfoModel->show_SystemInfo();
					$this->data['UserData'] = $this->UserModel->user_data('*', $this->user_session_id);

					// this will be include the value of data to admin view
					$this->load->view('admin/includes/header',$this->data);
					$this->load->view('admin/delete_annual_year',$this->data);
					$this->load->view('admin/includes/footer',$this->data);
				}

				else {
					show_404();
				}
			}
		}

		else {
			show_404();
		}
	}

	public function ExportDatabase() {
		// including script and navigation
		$this->data['nav'] = 'Export-Database';
		$this->data['pageScript'] = 'systeminfo';

		// call out model function
		$this->data['show_SystemInfo'] = $this->SystemInfoModel->show_SystemInfo();
		$this->data['UserData'] = $this->UserModel->user_data('*', $this->user_session_id);
		
		// this will be include the value of data to admin view
		$this->load->view('admin/includes/header',$this->data);
		$this->load->view('admin/export_db',$this->data);
		$this->load->view('admin/includes/footer',$this->data);
	}

	// function
	public function Logout() {
		$this->user_session_id = $this->session->unset_userdata('session_id');
		redirect(base_url());
	}

	public function UpdatePersonalInfo() {
		if ($_POST['action'] == 'submit') {
			$fn 		= $this->input->post('fn');
			$mi 		= $this->input->post('mi');
			$ln 		= $this->input->post('ln');
			$contact 	= $this->input->post('contact');
			$position 	= $this->input->post('position');
			$division 	= '';
			$user_id 	= $this->input->post('user_id');
			$upBy_id 	= $user_id;
			$role = 0;

			$result = $this->UserModel->update_userInfo($fn, $mi, $ln, $contact, $position, $user_id, $upBy_id);

			if ($result) {
				$title = 'Successfully';
				$status = 'success';
				$message = 'Updated Personal Info. Reloading Page...';
				$url = 'Admin-Personal-Info';
			}

			else {
				$title = 'Information!';
				$status = 'error';
				$message = 'Invalid Credential';
				$url = '';
			}

			echo json_encode(array('title' => $title, 'status' => $status, 'url' => $url, 'message' => $message));
		}
	}

	public function UpdateSecurity() {
		if ($_POST['action'] == 'submit') {
			$security_question 	= $this->input->post('security_question');
			$security_answer 	= $this->input->post('security_answer');
			$security_answerHASH = password_hash($security_answer, PASSWORD_DEFAULT);
			$user_id 	= $this->input->post('user_id');
			$upBy_id 	= $user_id;

			$result = $this->UserModel->update_security($security_question, $security_answerHASH, $user_id, $upBy_id);

			if ($result) {
				$title = 'Successfully';
				$status = 'success';
				$message = 'Updated Security Question';
				$url = 'Admin-Personal-Info';
			}

			else {
				$title = 'Security!';
				$status = 'error';
				$message = 'Invalid Credential';
				$url = '';
			}

			echo json_encode(array('title' => $title, 'status' => $status, 'url' => $url, 'message' => $message));
		}
	}

	public function UpdateDivRole() {
		if ($_POST['action'] == 'submit') {
			$division 	= $this->input->post('division');
				// load role designated from division
				$load_role = $this->SystemInfoModel->load_divisionRole($division);
				foreach ($load_role as $list) {
					$div_role = $list->div_role;
				}
				
			$user_id 	= $this->input->post('user_id');
			$upBy_id 	= $user_id;

			$result = $this->UserModel->update_divRole($division, $div_role, $user_id, $upBy_id);

			if ($result) {
				$title = 'Successfully';
				$status = 'success';
				$message = 'Updated Security Question.';
				$url = 'Admin-Logout';
			}

			else {
				$title = 'Security!';
				$status = 'error';
				$message = 'Invalid Credential';
				$url = '';
			}

			echo json_encode(array('title' => $title, 'status' => $status, 'url' => $url, 'message' => $message));
		}
	}

	public function UpdateUsername() {
		if ($_POST['action'] == 'submit') {
			$ups_new_username 	= $this->input->post('ups_new_username');
			$user_id 			= $this->input->post('user_id');
			$upBy_id 	= $user_id;

			$result = $this->UserModel->update_username($ups_new_username, $user_id, $upBy_id);

			if ($result) {
				$title = 'Successfully';
				$status = 'success';
				$message = 'Updated Username.';
				$url = 'Admin-Logout';
			}

			else {
				$title = 'Account!';
				$status = 'error';
				$message = 'Invalid Credential';
				$url = '';
			}

			echo json_encode(array('title' => $title, 'status' => $status, 'url' => $url, 'message' => $message));
		}
	}

	public function UpdatePassword() {
		if ($_POST['action'] == 'submit') {
			$ups_old_password 	= $this->input->post('ups_old_password');
			$ups_new_password 	= $this->input->post('ups_new_password');
			$password 			= $this->input->post('password');
			$user_id 			= $this->input->post('user_id');
			$upBy_id 			= $user_id;

			if (password_verify($ups_old_password, $password)) {
				$ups_password_hash = password_hash($ups_new_password, PASSWORD_DEFAULT);

				$result = $this->UserModel->update_password($ups_password_hash, $user_id, $upBy_id);

				if ($result) {
					$title = 'Successfully';
					$status = 'success';
					$message = 'Updated Password.';
					$url = 'Admin-Logout';
				}

				else {
					$title = 'Account!';
					$status = 'error';
					$message = 'Invalid Credential';
					$url = '';
				}
			}

			else {
				$title = 'Account!';
				$status = 'error';
				$message = 'Invalid Credential';
				$url = $password;
			}

			echo json_encode(array('title' => $title, 'status' => $status, 'url' => $url, 'message' => $message));
		}
	}

	public function imageUpload($path,$filename) {
		$config['upload_path']          = $path;
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['file_name']            = $filename;
	    $this->load->library('upload');
	    return $this->upload->initialize($config);
	}

	public function UpdateImage() {
		$user_id = $_GET['user_id'];
		$upBy_id 	= $user_id;

		$path = './assets/image/user';
		$filename = date('ymdhis');
		$this->imageUpload($path,$filename);

		if (!$this->upload->do_upload('image')) {
			$title = 'Unabled';
			$status = 'error';
			$message = 'Unable to upload image type.';
			$url = '';
		}

		else {
			$image = $this->upload->data();
			$realname = $filename.$image['file_ext'];

			$result = $this->UserModel->update_UserImage($realname, $user_id, $upBy_id);

			if ($result) {
				$title = 'Success';
				$status = 'success';
				$message = 'Updated User Image.';
				$url = 'Admin-Personal-Info';
			}
			
			else {
				$title = 'Unabled';
				$status = 'warning';
				$message = 'Unable to upload user image.';
				$url = '';
			}
		}

		echo json_encode(array('title' => $title, 'status' => $status, 'url' => $url, 'message' => $message));
	}

	public function UpdateSystemDetails() {
		if ($_POST['action'] == 'submit') {
			$ups_title 	= $this->input->post('ups_title');
			$ups_header = $this->input->post('ups_header');
			$ups_footer = $this->input->post('ups_footer');
			$system_id 	= $this->input->post('system_id');

			$result = $this->SystemInfoModel->update_systemDetails($ups_title, $ups_header, $ups_footer, $system_id);

			if ($result) {
				$title = 'Successfully';
				$status = 'success';
				$message = 'Updated System Details.';
				$url = 'Admin-Manage-SystemInfo';
			}

			else {
				$title = 'Unabled';
				$status = 'warning';
				$message = 'Update system details.';
				$url = '';
			}
		}

		echo json_encode(array('title' => $title, 'status' => $status, 'url' => $url, 'message' => $message));
	}

	public function UpdateSystemContact() {
		if ($_POST['action'] == 'submit') {
			$ups_address 	= $this->input->post('ups_address');
			$ups_contact 	= $this->input->post('ups_contact');
			$ups_region 	= $this->input->post('ups_region');
			$ups_email 	= $this->input->post('ups_email');
			$ups_fb 	= $this->input->post('ups_fb');
			$system_id 	= $this->input->post('system_id');

			$result = $this->SystemInfoModel->update_systemContact($ups_address, $ups_contact, $ups_region, $ups_email, $ups_fb, $system_id);

			if ($result) {
				$title = 'Successfully';
				$status = 'success';
				$message = 'Updated system Contact.';
				$url = 'Admin-Manage-SystemInfo';
			}

			else {
				$title = 'Unabled';
				$status = 'warning';
				$message = 'Update system contact.';
				$url = '';
			}
		}

		echo json_encode(array('title' => $title, 'status' => $status, 'url' => $url, 'message' => $message));
	}

	public function UpdateSystemMissionVision() {
		if ($_POST['action'] == 'submit') {
			$upsmission = $this->input->post('upsmission');
			$upsvision = $this->input->post('upsvision');
			$system_id 	= $this->input->post('system_id');

			$result = $this->SystemInfoModel->update_systemMissionVission($upsmission, $upsvision, $system_id);

			if ($result) {
				$title = 'Successfully';
				$status = 'success';
				$message = 'Updated system Contact.';
				$url = 'Admin-Manage-SystemInfo';
			}

			else {
				$title = 'Unabled';
				$status = 'warning';
				$message = 'Update system contact.';
				$url = '';
			}

		}

		echo json_encode(array('title' => $title, 'status' => $status, 'url' => $url, 'message' => $message));
	}

	public function UpdateIcon() {
		$system_id = 1;

		$path = './assets/image/system';
		$filename = date('ymdhis');
		$this->imageUpload($path,$filename);

		if (!$this->upload->do_upload('SystemIcon')) {
			$title = 'Unabled';
			$status = 'error';
			$message = 'Unable to upload image type.';
			$url = '';
		}

		else {
			$image = $this->upload->data();
			$realname = $filename.$image['file_ext'];
			$field = 'icon';

			$result = $this->SystemInfoModel->update_SystemImage($field, $realname, $system_id);

			if ($result) {
				$title = 'Success';
				$status = 'success';
				$message = 'Updated System Icon.';
				$url = 'Admin-Manage-SystemInfo';
			}
			
			else {
				$title = 'Unabled';
				$status = 'warning';
				$message = 'Unable to upload system icon.';
				$url = '';
			}
		}

		echo json_encode(array('title' => $title, 'status' => $status, 'url' => $url, 'message' => $message));
	}

	public function UpdateBanner() {
		$system_id = 1;

		$path = './assets/image/system';
		$filename = date('ymdhis');
		$this->imageUpload($path,$filename);

		if (!$this->upload->do_upload('banner')) {
			$title = 'Unabled';
			$status = 'error';
			$message = 'Unable to upload image type.';
			$url = '';
		}

		else {
			$image = $this->upload->data();
			$realname = $filename.$image['file_ext'];
			$field = 'banner';

			$result = $this->SystemInfoModel->update_SystemImage($field, $realname, $system_id);

			if ($result) {
				$title = 'Success';
				$status = 'success';
				$message = 'Updated System Banner.';
				$url = 'Admin-Manage-SystemInfo';
			}
			
			else {
				$title = 'Unabled';
				$status = 'warning';
				$message = 'Unable to upload system banner.';
				$url = '';
			}
		}

		echo json_encode(array('title' => $title, 'status' => $status, 'url' => $url, 'message' => $message));
	}

	public function UpdateSideBanner() {
		$system_id = 1;

		$path = './assets/image/system';
		$filename = date('ymdhis');
		$this->imageUpload($path,$filename);

		if (!$this->upload->do_upload('sideBanner')) {
			$title = 'Unabled';
			$status = 'error';
			$message = 'Unable to upload image type.';
			$url = '';
		}

		else {
			$image = $this->upload->data();
			$realname = $filename.$image['file_ext'];
			$field = 'sidebar_logo';

			$result = $this->SystemInfoModel->update_SystemImage($field, $realname, $system_id);

			if ($result) {
				$title = 'Success';
				$status = 'success';
				$message = 'Updated System Side Banner.';
				$url = 'Admin-Manage-SystemInfo';
			}
			
			else {
				$title = 'Unabled';
				$status = 'warning';
				$message = 'Unable to upload system side banner.';
				$url = '';
			}
		}

		echo json_encode(array('title' => $title, 'status' => $status, 'url' => $url, 'message' => $message));
	}

	public function addAnnualYear() {
		if ($_POST['action'] == 'submit') {
			$annual_year = $this->input->post('annual_year');

			// check for existence
			$validate_year = $this->SystemInfoModel->annual_year($annual_year);

			if ($validate_year != false) {
				$title = 'Unable';
				$status = 'warning';
				$url = '';
				$message = 'Year already exist.';
			}

			else {
				// save year
				$save_year = $this->SystemInfoModel->save_annual_year($annual_year);

				// get data result
				if ($save_year) {
					$title = 'Successfully';
					$status = 'success';
					$url = 'Admin-Manage-SystemInfo';
					$message = 'Added Data Entry';
				}

				else {
					$title = 'Unable';
					$status = 'warning';
					$url = '';
					$message = 'Add Year. Please try again.';
				}
			}

			echo json_encode(array('title' => $title, 'status' => $status, 'url' => $url, 'message' => $message));
		}
	}

	public function delAnnualYear() {
		if ($_POST['action'] == 'submit') {
			$get_annual_year = $this->input->post('get_annual_year');

			// delete
			$delete_year = $this->SystemInfoModel->delete_annual_year($get_annual_year);

			// get data result
			if ($delete_year) {
				$title = 'Successfully';
				$status = 'success';
				$url = 'Admin-Manage-SystemInfo';
				$message = 'Deleted Year';
			}

			else {
				$title = 'Unable';
				$status = 'warning';
				$url = '';
				$message = 'To delete. Please try again.';
			}

			echo json_encode(array('title' => $title, 'status' => $status, 'url' => $url, 'message' => $message));
		}
	}

	public function exportDB() {
		$this->load->dbutil();
		$db_format = array('format'=>'zip','filename'=>'csc_db_backup.sql');
		$backup=& $this->dbutil->backup($db_format);
		$dbname = 'backup-on-'.date('Y-m-d').'.zip';
		$save = 'assets/database/'.$dbname;
		write_file($save, $backup);
		force_download($dbname, $backup);
	}
}
?>