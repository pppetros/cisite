<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search_model extends CI_Model {
	public function search($choices) {
		
		//Check URI Inputs from table header
		$sort_order = ($choices['sort_order'] == 'desc') ? 'desc' : 'asc';
		$sort_by = ( isset($choices['fields'][$choices['sort_by']]) ) ? $choices['sort_by'] : 'id';
		
		
		//TODO na vgalo to select(*) ginetai kai aploustero
		$q = $this->db->select('*')// 'id, username, password, FirstNM, LastNM, email, edu_exper, date_ref, group' )
				->from('members');
		
		//TODO na ginetai me synartisi opos to kato
		if (strlen($choices['filters']['email']))
		{
			$q->like('email', $choices['filters']['email']);
		}
		if (strlen($choices['filters']['edu_exper']))
		{
			$q->like('edu_exper', $choices['filters']['edu_exper']);
		}
		// count query
		$ret['num_rows'] = $q->get()->num_rows();

		$q = $this->db->from('members')
		  ->limit($choices['limit'], $choices['offset'])
		  ->order_by($sort_by, $sort_order);
		
		//Results query
		//TODO na ginetai me synartisi
		if (strlen($choices['filters']['email']))
		{
			$q->like('email', $choices['filters']['email']);
		}
		if (strlen($choices['filters']['edu_exper']))
		{
			$q->like('edu_exper', $choices['filters']['edu_exper']);
		}

		$ret['rows'] = $q->get()->result();
	
		
		// $this->db->select('COUNT(*) as count', FALSE)
		// 	->from('members');
		// 	//TODO na to ftiakso
		// 	//->where('email', $q);
		
		// $tmp = $q->get()->result();
		
		// $ret['num_rows'] = $tmp[0]->count;
		
		return $ret;
	}
}

/* End of file search_model.php */
/* Location: ./application/models/search_model.php */