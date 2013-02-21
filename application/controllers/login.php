
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		
		//$this->load->helper('form');
		if ( $this->session->userdata('is_logged_in') == true ) {
			redirect('site/members_area');
		}

		$data['main_content'] = 'login_form';
		$this->load->view('includes/template', $data);
	}

	public function validate_login()
	{
		$this->load->model('membership_model');
		$query = $this->membership_model->validate();

		if($query)
		{
			$data = array(
				'username' => $this->input->post('username'),
				'is_logged_in' => true
			);
			
			$this->session->set_userdata( $data );
			redirect('site/members_area');
		}
		else
		{
			$this->index();
		}
	}

	public function signup()
	{	
		$data['main_content'] = 'signup_form';
		$this->load->view('includes/template', $data);
	}

	public function create_member()
	{	
		$this->load->library('form_validation');

		$this->form_validation->set_rules('first_name', 'Name', 'trim');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim');
		$this->form_validation->set_rules('email_address', 'Email Address', 'trim|required|valid_email|is_unique[members.email]');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]|is_unique[members.username]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]|max_length[32]');
		$this->form_validation->set_rules('password2', 'Password Confirmation', 'trim|required|matches[password]');
		
		if($this->form_validation->run() == FALSE)
			{
				$data['main_content'] = 'signup_form';
				$this->load->view('includes/template', $data);
			}
		else
		{
			$this->load->model('membership_model');

			if($q = $this->membership_model->create_member())
			{
				$data['main_content'] = 'signup_successful';
				$data['lastid'] = $q;
				$this->load->view('includes/template', $data);
			}
			else
			{
				$this->load->view('signup_form');		
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