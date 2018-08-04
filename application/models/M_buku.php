<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_buku extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function get_all()
	{
		return $this->db->get('buku');
	}

	public function insert_multiple($data){    
		$this->db->insert_batch('buku', $data);  
	}

}

/* End of file M_buku.php */
/* Location: ./application/models/M_buku.php */ 