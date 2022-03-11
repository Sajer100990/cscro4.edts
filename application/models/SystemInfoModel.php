<?php
class SystemInfoModel extends CI_MODEL {
	private $table;
	private $tableDivision;
	private $tableYear;

	public function __construct() {
		parent:: __construct();
		$this->load->database();
		$this->table = 'system_tbl';
		$this->tableDivision = 'division_tbl';
		$this->tableYear = 'year_tbl';
	}

	public function show_SystemInfo() {
		$sql = 'SELECT * FROM '.$this->table;
		$query = $this->db->query($sql);
		return $query->num_rows() > 0 ? $query->row_array() : NULL;
	}

	public function load_year_list() {
		$sql = 'SELECT * FROM '.$this->tableYear.' ';
		$query = $this->db->query($sql);
		return $query->num_rows() > 0 ?  $query->result() : '';
	}

	public function annual_year($get_ay) {
		$sql = 'SELECT * FROM '.$this->tableYear.' WHERE annual_year = '.$get_ay.' ';
		$query = $this->db->query($sql);
		return $query->num_rows() > 0 ? $query->row_array() : false;
	}

	public function update_systemDetails($ups_title, $ups_header, $ups_footer, $system_id) {
		$sql = 'UPDATE '.$this->table.' SET title = "'.$ups_title.'", header = "'.$ups_header.'", footer = "'.$ups_footer.'" WHERE id = "'.$system_id.'"  ';
        $query = $this->db->query($sql);
        return $query;
	}

	public function update_systemContact($ups_address, $ups_contact, $ups_region, $ups_email, $ups_fb, $system_id) {
		$sql = 'UPDATE '.$this->table.' SET address = "'.$ups_address.'", contact = "'.$ups_contact.'", region = "'.$ups_region.'", email = "'.$ups_email.'", fb = "'.$ups_fb.'" WHERE id = "'.$system_id.'"  ';
        $query = $this->db->query($sql);
        return $query;
	}

	public function update_systemMissionVission($upsmission, $upsvision, $system_id) {
		$sql = 'UPDATE '.$this->table.' SET mission = "'.$upsmission.'", vision = "'.$upsvision.'" WHERE id = "'.$system_id.'"  ';
        $query = $this->db->query($sql);
        return $query;
	}

	public function update_SystemImage($field, $realname, $system_id) {
		$sql = 'UPDATE '.$this->table.' SET '.$field.' = "'.$realname.'" WHERE id = "'.$system_id.'"  ';
        $query = $this->db->query($sql);
        return $query;
	}

	public function save_annual_year($annual_year) {
		$sql = 'INSERT INTO '.$this->tableYear.' (annual_year) VALUES("'.$annual_year.'")';
		$query = $this->db->query($sql);
		return $query;
	}

	public function delete_annual_year($get_annual_year) {
		$sql = 'DELETE FROM '.$this->tableYear.' WHERE annual_year = "'.$get_annual_year.'" ';
		$query = $this->db->query($sql);
		return $query;
	}

	// LOAD SECURITY QUESTION
	public function load_SecurityQuestion($field) {
		$sql = 'SELECT * FROM sq_tbl';
		$query = $this->db->query($sql);
		return $query->num_rows() > 0 ?  $query->result() : '';
	}

	// LOAD DIVISION
	public function load_division($field, $restrict_role) {
		$sql = 'SELECT * FROM division_tbl WHERE div_role != "'.$restrict_role.'" ';
		$query = $this->db->query($sql);
		return $query->num_rows() > 0 ?  $query->result() : '';
	}

	// LOAD DIVISION ROLE
	public function load_divisionRole($division) {
		$sql = 'SELECT * FROM '.$this->tableDivision.' WHERE div_tag = "'.$division.'" ';
		$query = $this->db->query($sql);
		return $query->num_rows() > 0 ?  $query->result() : '';
	}
}
?>