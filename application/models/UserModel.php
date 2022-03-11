<?php
class UserModel extends CI_MODEL {
	private $table;
    private $tablePosition;
    private $employee;

	public function __construct() {
		parent:: __construct();
		$this->load->database();
		$this->table = 'user_tbl';
        $this->tablePosition = 'position_tbl';
        $this->employee = 'employee_tbl';
	}

    public function user_position($field) {
        $sql = 'SELECT '.$field.' FROM '.$this->tablePosition.' ORDER BY position ASC ';
        $query = $this->db->query($sql);
        return $query->num_rows() > 0 ?  $query->result() : '';
    }

    public function select_userList($field, $acc_status, $role) {
        $sql = 'SELECT '.$field.' FROM '.$this->table.' WHERE acc_status = "'.$acc_status.'" AND role != "'.$role.'" ORDER BY fn ASC ';
        $query = $this->db->query($sql);
        return $query->num_rows() > 0 ?  $query->result() : '';
    }

	public function select_username($field, $username) {
        $sql = 'SELECT '.$field.' FROM '.$this->table.' WHERE username = "'.$username.'" ';
        $query = $this->db->query($sql);
        return $query->num_rows() > 0 ? $query->row_array() : false;
    }

    public function user_data($field, $user_id) {
        $sql = 'SELECT '.$field.' FROM '.$this->table.' WHERE id = "'.$user_id.'" ';
        $query = $this->db->query($sql);
        return $query->num_rows() > 0 ? $query->row_array() : false;
    }

    public function update_userInfo($fn, $mi, $ln, $contact, $position, $user_id, $upBy_id) {
        $sql = 'UPDATE '.$this->table.' SET fn = "'.$fn.'", mi = "'.$mi.'", ln = "'.$ln.'", contact = "'.$contact.'", position = "'.$position.'", update_by = "'.$upBy_id.'" WHERE id = "'.$user_id.'"';
        $query = $this->db->query($sql);
        return $query;
    }

    public function update_security($security_question, $security_answerHASH, $user_id, $upBy_id) {
        $sql = 'UPDATE '.$this->table.' SET security_question = "'.$security_question.'", security_answer = "'.$security_answerHASH.'", update_by = "'.$upBy_id.'" WHERE id = "'.$user_id.'"  ';
        $query = $this->db->query($sql);
        return $query;
    }

    public function update_divRole($division, $div_role, $user_id, $upBy_id) {
        $sql = 'UPDATE '.$this->table.' SET division = "'.$division.'", role = "'.$div_role.'", update_by = "'.$upBy_id.'" WHERE id = "'.$user_id.'" ';
        $query = $this->db->query($sql);
        return $query;
    }

    public function update_username($ups_new_username, $user_id, $upBy_id) {
        $sql = 'UPDATE '.$this->table.' SET username = "'.$ups_new_username.'", update_by = "'.$upBy_id.'" WHERE id = "'.$user_id.'" ';
        $query = $this->db->query($sql);
        return $query;
    }

    public function update_password($ups_password_hash, $user_id, $upBy_id) {
        $sql = 'UPDATE '.$this->table.' SET password = "'.$ups_password_hash.'", update_by = "'.$upBy_id.'" WHERE id = "'.$user_id.'"  ';
        $query = $this->db->query($sql);
        return $query;
    }

    public function update_UserImage($realname, $user_id, $upBy_id) {
        $sql = 'UPDATE '.$this->table.' SET image = "'.$realname.'", update_by = "'.$upBy_id.'" WHERE id = "'.$user_id.'"  ';
        $query = $this->db->query($sql);
        return $query;
    }

    public function create_userAccount($user_img, $fn, $mi, $ln, $gender, $contact, $position, $division, $username, $hash_pass, $div_role, $account_status, $security_code, $upBy_id) {
        $sql = 'INSERT INTO '.$this->table.' (image, fn, mi, ln, gender, contact, position, division, username, password, role, acc_status, security_code, update_by) 
            VALUES("'.$user_img.'", "'.$fn.'", "'.$mi.'", "'.$ln.'", "'.$gender.'", "'.$contact.'", "'.$position.'", "'.$division.'", "'.$username.'", "'.$hash_pass.'", "'.$div_role.'", "'.$account_status.'", "'.$security_code.'", "'.$upBy_id.'")  '; 
        $query = $this->db->query($sql);
        return $query;
    }
    
}
?>