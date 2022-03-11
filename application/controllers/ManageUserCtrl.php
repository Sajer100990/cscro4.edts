<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ManageUserCtrl extends CI_Controller {
	private $data;
	private $user_session_id;

	public function __construct() {
		parent:: __construct();
		include 'includes/models.php';
		// load year list
		$this->data['year_list'] = $this->SystemInfoModel->load_year_list('*');
		// call out position
		$this->data['position'] = $this->UserModel->user_position('position');

		// set system time
		$this->data['current_month'] = date('m');
		$this->data['current_day'] = date('d');
		$this->data['current_year'] = date('Y');
		$this->data['current_year2'] = date('y');

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
	public function ManageUserAccount() {
		// including script and navigation
		$this->data['nav'] = 'Manage-UserAccount';
		$this->data['pageScript'] = 'userinfo';

		// call out model function
		// calling system info in db
		$this->data['show_SystemInfo'] = $this->SystemInfoModel->show_SystemInfo();
		// calling user logged data in db
		$this->data['UserData'] = $this->UserModel->user_data('*', $this->user_session_id);
		// callout user list
		$this->data['UserList'] = $this->UserModel->select_userList('id, image, fn, ln, division, position', '0', '0');
		// this will be include the value of data to admin view
		$this->load->view('admin/includes/header', $this->data);
		$this->load->view('admin/manage_userAccount', $this->data);
		$this->load->view('admin/includes/footer');
	}
	
	public function ManageEmployee() {
		// including script and navigation
		$this->data['nav'] = 'Manage-Employee';
		$this->data['pageScript'] = '';

		// call out model function
		$this->data['show_SystemInfo'] = $this->SystemInfoModel->show_SystemInfo();
		$this->data['UserData'] = $this->UserModel->user_data('*', $this->user_session_id);
		
		// callout employee list
		$this->data['EmployeeList'] = $this->UserModel->select_employee('*');
		
		// this will be include the value of data to admin view
		$this->load->view('admin/includes/header',$this->data);
		$this->load->view('admin/employee',$this->data);
		$this->load->view('admin/includes/footer',$this->data);
	}

	public function EditUserAccount() {
		// including script and navigation
		$this->data['nav'] = 'Manage-UserAccount';
		$this->data['pageScript'] = 'userinfo';
		// call out model function
		// calling system info in db
		$this->data['show_SystemInfo'] = $this->SystemInfoModel->show_SystemInfo();
		// calling user data in db
		$this->data['UserData'] = $this->UserModel->user_data('*', $this->user_session_id);
		// callout user list
		$this->data['EditUser'] = $this->UserModel->user_data('*', $_GET['userID']);
		// designate where page to route
		if ($this->data['EditUser']['id'] == $this->user_session_id) {
			// route to admin info
			header('location:'.base_url("Admin-Personal-Info").' ');
		} 

		// designate if id was not found on db
		else if ($this->data['EditUser'] == false) {
			show_404();
		}

		else {
			// route to edit user info
			$this->load->view('admin/includes/header', $this->data);
			$this->load->view('admin/edit_userInfo', $this->data);
			$this->load->view('admin/includes/footer');
		}
	}


	// function
	public function CreateUserAccount() {
		if ($_POST['action'] == 'submit') {
			$division 	= $this->input->post('division');
			
			$div_role = 1;

			$position 	= $this->input->post('position');

			$gender 	= $this->input->post('gender');
				if ($gender == 'male') {
					$user_img = 'male.png';
				} else {
					$user_img = 'female.png';
				}
			$fn 		= $this->input->post('fn');
			$mi 		= $this->input->post('mi');
			$ln 		= $this->input->post('ln');
			$contact 		= $this->input->post('contact');
			$username 		= $this->input->post('username');
				$password 	= '123456';
				$hash_pass 	= password_hash($password, PASSWORD_DEFAULT);
			$account_status = '0';
			$security_code  = $division.rand(111111,999999);
			$upBy_id 		= $this->input->post('upBy_id');

			// validate username if existing in db
			$validate = $this->UserModel->select_username('id, username', $username);
			
			if ($validate > 0) {
				$title = 'Username';
				$status = 'error';
				$message = 'Already used by other.';
				$url = '';	
			}

			else {
				$result = $this->UserModel->create_userAccount($user_img, $fn, $mi, $ln, $gender, $contact, $position, $division, $username, $hash_pass, $div_role, $account_status, $security_code, $upBy_id);

				if ($result) {
					$title = 'Successfully';
					$status = 'success';
					$message = 'Created user account.';
					$url = '';	
				}
				
				else {
					$title = 'Unable';
					$status = 'warning';
					$message = 'Created user account.';
					$url = '';	
				}
			}

			echo json_encode(array('title' => $title, 'status' => $status, 'url' => $url, 'message' => $message));
		}
	}

	public function UpdateUserInfo() {
		if ($_POST['action'] == 'submit') {
			$fn 		= $this->input->post('fn');
			$mi 		= $this->input->post('mi');
			$ln 		= $this->input->post('ln');
			$contact 	= $this->input->post('contact');
			$position 	= $this->input->post('position');
			$user_id 	= $this->input->post('user_id');
			$upBy_id 	= $this->input->post('upBy_id');

			$result = $this->UserModel->update_userInfo($fn, $mi, $ln, $contact, $position, $user_id, $upBy_id);

			if ($result) {
				$title = 'Successfully';
				$status = 'success';
				$message = 'Updated User Info. Reloading Page...';
				$url = 'Edit-UserAccount';
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
			$upBy_id 	= $this->input->post('upBy_id');

			$result = $this->UserModel->update_security($security_question, $security_answerHASH, $user_id, $upBy_id);

			if ($result) {
				$title = 'Successfully';
				$status = 'success';
				$message = 'Updated Security Question';
				$url = 'Edit-UserAccount';
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
			$upBy_id 	= $this->input->post('upBy_id');

			$result = $this->UserModel->update_divRole($division, $div_role, $user_id, $upBy_id);

			if ($result) {
				$title = 'Successfully';
				$status = 'success';
				$message = 'Updated Security Question.';
				$url = 'Edit-UserAccount';
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

	public function imageUpload($path,$filename) {
		$config['upload_path']          = $path;
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['file_name']            = $filename;
	    $this->load->library('upload');
	    return $this->upload->initialize($config);
	}

	public function UpdateImage() {
		$user_id = $_GET['userID'];
		$upBy_id = $this->input->post('upBy_id');

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
				$url = 'Edit-UserAccount';
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

	public function UpdateUsername() {
		if ($_POST['action'] == 'submit') {
			$ups_new_username 	= $this->input->post('ups_new_username');
			$user_id 			= $this->input->post('user_id');
			$upBy_id 			= $this->input->post('upBy_id');

			// validate username for existing
			$username = $ups_new_username;
			$validate = $this->UserModel->select_username('id, username', $username);

			if ($validate) {
				$title = 'Existed';
				$status = 'warning';
				$message = 'Username Already Used.';
				$url = 'Edit-UserAccount';
			}

			else {
				$result = $this->UserModel->update_username($ups_new_username, $user_id, $upBy_id);

				if ($result) {
					$title = 'Successfully';
					$status = 'success';
					$message = 'Updated Username.';
					$url = 'Edit-UserAccount';
				}

				else {
					$title = 'Account!';
					$status = 'error';
					$message = 'Invalid Credential';
					$url = '';
				}
			}

			echo json_encode(array('title' => $title, 'status' => $status, 'url' => $url, 'message' => $message));
		}
	}

	public function UpdatePassword() {
		if ($_POST['action'] == 'submit') {
			$ups_new_password 	= $this->input->post('ups_new_password');
			$ups_password_hash 	= password_hash($ups_new_password, PASSWORD_DEFAULT);
			$user_id 			= $this->input->post('user_id');
			$upBy_id 			= $this->input->post('upBy_id');

			$result = $this->UserModel->update_password($ups_password_hash, $user_id, $upBy_id);

			if ($result) {
				$title = 'Successfully';
				$status = 'success';
				$message = 'Updated Password.';
				$url = 'Edit-UserAccount';
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
}
?>