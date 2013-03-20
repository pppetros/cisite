<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function is_logged_in() 
	{
		$is_logged_in = $this->session->userdata('is_logged_in');
		if (( ! isset($is_logged_in) ) || ( $is_logged_in != true )) 
		{
	 		return false;
		}
		else 
		{
			return true;
		}
	}

	public function validate_login()
	{
		$query = $this->membership_model->validate();
		if($query)
		{
			$data = array(
				'username' => $this->input->post('username'),
				'is_logged_in' => true
			);
			$this->session->set_userdata( $data );
		}
		redirect('/');
	}

	public function create_member()
	{	
		$this->load->library('form_validation');

		$this->form_validation->set_rules('first_name', 'Name', 'trim');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim');
		$this->form_validation->set_rules('email_address', 'Email Address', 'trim|required|valid_email|is_unique[members.email]');
		$this->form_validation->set_rules('user', 'Username', 'trim|required|min_length[3]|is_unique[members.username]');
		$this->form_validation->set_rules('pass', 'Password', 'trim|required|min_length[3]|max_length[32]');
		$this->form_validation->set_rules('pass2', 'Password Confirmation', 'trim|required|matches[pass]');
		$this->form_validation->set_rules('group', 'Κλάδος', 'trim');
		$this->form_validation->set_rules('years', 'Έτη υπηρεσίας', 'trim|is_natural_no_zero|less_than[26]');
		
		if($this->form_validation->run() == FALSE)
			{			
				$data['login_content']= 'login_form';
				$data['banner_content'] = 'signup_form';
				$this->load->view('includes/template', $data);
			}
		else
		{
			if($q = $this->membership_model->create_member())
			{				
				$data['login_content']= 'login_form';
				$data['banner_content'] = 'signup_successful';
				//$data['lastid'] = $q;
				$this->load->view('includes/template', $data);
			}
			else
			{
				$data['login_content']= 'login_form';
				$data['banner_content'] = 'signup_dberror';
				$this->load->view('includes/template', $data);		
			}
		}

	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('/');
	}

}

/* End of file login.php */
/* Location: ./application/controllers/login.php */