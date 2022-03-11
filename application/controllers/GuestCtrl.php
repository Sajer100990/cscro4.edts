<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GuestCtrl extends CI_Controller {
	private $data;

	public function __construct() {
		parent:: __construct();
		include 'includes/models.php';
		// load year list
		$this->data['year_list'] = $this->SystemInfoModel->load_year_list('*');
		// callout session that was set after login
		$this->user_session_id = $this->session->userdata('session_id');
		// select * details of user
		$this->data['user_data'] = $this->UserModel->user_data('*', $this->user_session_id);
		if ($this->user_session_id != "") {
			switch ($this->data['user_data']['role']) {
				case 0:
					redirect('Admin-Dashboard');
					break;

				// RO Division
				case 1: case 2: case 3: case 4: case 5: case 6: case 7:
					redirect(base_url('user-dashboard'));
					break;
				
				default:
					# code...
					break;
			}
		}
	}

	public function index() {
		// call out model function
		$this->data['show_SystemInfo'] = $this->SystemInfoModel->show_SystemInfo();
		// this will be include the value of data to home view
		$this->load->view('guest/home',$this->data);
	}

	public function UserLogin() {
		if ($_POST['action'] == 'submit') {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$result = $this->UserModel->select_username('id, role, username, password, acc_status, division', $username);

			if ($result != false) {
				if (password_verify($password, $result['password']) AND $result['acc_status'] == 0) {
					// create variable session that contain user id after login
					$this->session->set_userdata(array('session_id' => $result['id']));

					switch($result['role']) {
						case 0:
							$title = 'Success!';
							$status = 'success';
							$message = 'Login as Administrator.';
							$url = base_url('Admin-Dashboard');
							break;

						case 1: case 2: case 3: case 4: case 5: case 6: case 6:
							$this->session->set_userdata(array('session_division' => $result['division']));
							$title = 'Success!';
							$status = 'success';
							$message = 'Login.';
							$url = base_url('user-dashboard');
							break;

						default:
							$this->user_session_id = $this->session->unset_userdata('session_id');
							$url = base_url();
							break;
					}
				}

				else {
					$title = 'Invalid Account!';
					$status = 'error';
					$message = 'Invalid Password.';
					$url = '';
				}
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
