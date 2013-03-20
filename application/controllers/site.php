<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends CI_Controller {

	//Metavlites pou pairnane sto model gia query se db
	private $choices = array();
	//Metavlites pou pernane sto view
	private $data = array();

	public function __construct()
   	{
        parent::__construct();
        $this->choices['limit'] = 4;
		$this->choices['fields'] = array(
			'id' => 'ID', 
			'username' => 'Username', 
			//'password' => 'Password', 
			'FirstNM' => 'First Name', 
			'LastNM' => 'Last Name', 
			'email' => 'Email', 
			'edu_exper' => 'Έτη προϋπηρεσίας', 
			'date_ref' => 'Ημερομηνία αναφοράς', 
			'group' => 'Ειδικότητα'
		);
		($this->session->userdata('is_logged_in') == true) ? $this->data['login_content'] = 'login_succ' : $this->data['login_content'] = 'login_form';
   	}

	public function index($sort_by = 'id', $sort_order = 'asc', $offset = 0) {

		$this->choices['sort_by'] = $sort_by;
		$this->choices['sort_order'] = $sort_order;
		$this->choices['offset'] = $offset;
		
		//TODO Na to kano me function
		$this->choices['filters']['email'] = $this->input->get('f_email');
		$this->choices['filters']['edu_exper'] = $this->input->get('f_edu_exper');
		// print_r($this->choices['filters']);
		// die();

		//Remember last submitted Filters
		//TODO Na to kano me function
		$this->session->set_userdata('f_email', $this->choices['filters']['email']);
		$this->session->set_userdata('f_edu_exper', $this->choices['filters']['edu_exper']);
		
		//TODO add more filters from form	
		$results = $this->search_model->search($this->choices);
		
		//Pass $data values to template
		$this->data['fields'] = $this->choices['fields'];
		$this->data['members'] = $results['rows'];
		$this->data['num_results'] = $results['num_rows'];
		$this->data['sort_by'] = $sort_by;
		$this->data['sort_order'] = $sort_order;
		$this->data['banner_head'] = 'banner_form';
		$this->data['banner_content'] = 'banner_table';
		
		//Pagination
		$this->load->library('pagination');
			$config = array();
			$config['base_url'] = site_url("site/index/$sort_by/$sort_order");
			$config['total_rows'] = $this->data['num_results'];
			$config['per_page'] = $this->choices['limit'];
			$config['uri_segment'] = 5;
			$config['suffix'] = "?f_email=" . $this->session->userdata('f_email');
			//TODO Gia polla filtra
			//$config['suffix'] = '?'.http_build_query($_GET, '', "&");
			$config['first_url'] = $config['base_url'].$config['suffix'];
		$this->pagination->initialize($config);
		
		$this->data['pagination'] = $this->pagination->create_links();	
		$this->load->view('includes/template', $this->data);
	}

	public function signup()
	{	
		$this->data['login_content']= 'login_form';
		$this->data['banner_content'] = 'signup_form';
		$this->load->view('includes/template', $this->data);
	}
}

/* End of file site.php */
/* Location: ./application/controllers/site.php */