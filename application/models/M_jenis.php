<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_jenis extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function get_all()
	{
		return $this->db->get('jenis');
	}

	public function insert_multiple($data){    
		$this->db->insert_batch('jenis', $data);  
	}

}

/* End of file M_jenis.php */
/* Location: ./application/models/M_jenis.php */ 