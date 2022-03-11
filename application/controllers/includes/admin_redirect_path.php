<?php
	$this->data['user_data'] = $this->UserModel->user_data('id,role',$this->user_session_id);
	switch ($this->data['user_data']['role']) {
		case 0:
			// call out division
			$restrict_role = NULL;
			$this->data['division'] = $this->SystemInfoModel->load_division('div_tag, div_name, div_role', $restrict_role);
			break;

		case 1: case 2: case 3: case 4: case 5: case 6: case 7:
			redirect(base_url('user-dashboard'));
			break;
		
		default:
			# code...
			break;
	}
?>