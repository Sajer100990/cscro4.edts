<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RegionUserCtrl extends CI_Controller {
	private $data;
	private $user_session_id;

	public function __construct() {
		parent:: __construct();
		include 'includes/models.php';
		// load year list
		$this->data['year_list'] = $this->SystemInfoModel->load_year_list('*');
		// set system time
		$this->data['current_month'] = date('m');
		$this->data['current_day'] = date('d');
		$this->data['current_year'] = date('Y');
		$this->data['current_year2'] = date('y');
		// load division
		$this->data['load_Division'] = $this->PaldDataModel->load_Division('*');
		// load document entry
		$this->data['user_docEntry'] = $this->PaldDataModel->user_docEntry('*');
		// load document type
		$this->data['user_docType'] = $this->PaldDataModel->user_docType('*');

		// callout session that was set after login
		$this->user_session_id = $this->session->userdata('session_id');
			
		if (!isset($this->user_session_id)) {
			show_404();
		}

		else {
			$this->data['user_data'] = $this->UserModel->user_data('id,role',$this->user_session_id);
			switch ($this->data['user_data']['role']) {
				case 0:
					show_404();
					break;

				case 1: case 2: case 3: case 4: case 5: case 6: case 7:
					$this->data['session_division'] = $this->session->userdata('session_division');
					base_url('user-dashboard');
					break;
				
				default:
					# code...
					break;
			}
		}
	}

	public function UserLogout() {
		$this->user_session_id = $this->session->unset_userdata('session_id');
		$this->user_session_division = $this->session->unset_userdata('session_division');
		redirect(base_url());
	}

	// navigation
	public function user_dashboard() {
		// including script and navigation
		$this->data['nav'] = 'user-dashboard';
		$this->data['pageScript'] = 'pald';
		// set session_division as dynamic

		// call out model function
		$this->data['show_SystemInfo'] = $this->SystemInfoModel->show_SystemInfo();
		$this->data['UserData'] = $this->UserModel->user_data('*', $this->user_session_id);
		
		// this will be include the value of data to pald view
		$this->load->view('region/includes/header',$this->data);
		$this->load->view('region/dashboard',$this->data);
		$this->load->view('region/includes/footer',$this->data);
	}

	public function received_document() {
		// including script and navigation
		$this->data['nav'] = 'Received-Document';
		$this->data['pageScript'] = 'region';
		// set session_division as dynamic

		// call out model for sys info and user data
		$this->data['show_SystemInfo'] = $this->SystemInfoModel->show_SystemInfo();
		$this->data['UserData'] = $this->UserModel->user_data('*', $this->user_session_id);

		// call out division received document
		$get_ay = date("Y");
		$this->data['load_div_entry'] = $this->PaldDataModel->load_DivisionEntry('id, doc_no, subject, sender, month, day, year, remarks', $this->data['session_division'], $get_ay);
		
		// this will be include the value of data to pald view
		$this->load->view('region/includes/header',$this->data);
		$this->load->view('region/dataentry_masterlist_division',$this->data);
		$this->load->view('region/includes/footer',$this->data);
	}

	public function ord_daily_encode() {
		// including script and navigation
		$this->data['nav'] = 'ord_encode';
		$this->data['pageScript'] = 'ord';

		// call out model for sys info and user data
		$this->data['show_SystemInfo'] = $this->SystemInfoModel->show_SystemInfo();
		$this->data['UserData'] = $this->UserModel->user_data('*', $this->user_session_id);

		// this will be include the value of data to pald view
		$this->load->view('region/includes/header',$this->data);
		$this->load->view('region/ord_daily_encode',$this->data);
		$this->load->view('region/includes/footer',$this->data);
	}

	// function
	public function add_ord_entry() {
		
	}
}