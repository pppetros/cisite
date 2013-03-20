<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Membership_model extends CI_Model {

	public function validate() 
	{
		$this->db->where('username', $this->input->post('username'));
		$this->db->where('password', md5($this->input->post('password')));

		$query = $this->db->get('members');

		if($query->num_rows == 1){
			return true;
		}
		else {
			return false;
		}

	}

	public function create_member()	
	{
		$new_member_insert_data = array(
			'firstnm' => $this->input->post('first_name'),
			'lastnm' => $this->input->post('last_name'),
			'email' => $this->input->post('email_address'),			
			'username' => $this->input->post('user'),
			'password' => md5($this->input->post('pass')),
			'edu_exper' => $this->input->post('years'),
			'group' => $this->input->post('group')						
		);

		if($insert = $this->db->insert('members', $new_member_insert_data)) 
		{
			return $this->db->insert_id();
		}
		else
		{
			return false;
		}
	}
}

/* End of file membership_model.php */
/* Location: ./application/models/membership_model.php */