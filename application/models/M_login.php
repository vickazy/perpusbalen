<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_login extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function cek_login($u, $p)
	{
		$this->db->where('user', $u);
		$this->db->where('password', $p);

		return $this->db->get('petugas');
	}

}

/* End of file M_login.php */
/* Location: ./application/models/M_login.php */ 