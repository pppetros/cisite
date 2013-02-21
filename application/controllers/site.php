<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends CI_Controller {

	// function __construct()
	// {
	// 	parent::Controller();
	// }

	public function is_logged_in() 
	{
		$is_logged_in = $this->session->userdata('is_logged_in');
		if (( ! isset($is_logged_in) ) || ( $is_logged_in != true )) {
	 		return false;
		}
		else {
			return true;
		}
	}

	public function members_area()
	{
		$data['main_content'] = 'logged_in_area';
		
		$lgin = $this->is_logged_in();
		if (  $lgin ) {
		 	$this->load->view('includes/template', $data);
		}
		else {
			redirect('login');
		}
	}


}

/* End of file site.php */
/* Location: ./application/controllers/site.php */