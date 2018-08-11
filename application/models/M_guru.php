<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_guru extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function get_all()
	{
		return $this->db->get('guru');
	}

	public function get_by_id($id_guru)
	{
		$this->db->where('id_guru', $id_guru);
		return $this->db->get('guru');
	}

	public function insert_multiple($data){    
		$this->db->insert_batch('guru', $data);  
	}

	public function tambah_proses()
	{
		$data = array(
			'nip' 			=> $this->input->post('nip'), 
			'nama_guru' 	=> $this->input->post('nama'),
			'user' 			=> $this->input->post('nip'),
			'password' 	=> md5($this->input->post('nip')) 
			);

		$this->db->insert('guru', $data);
	}

	public function edit_proses($id_guru)
	{
		$data = array(
			'nip' 			=> $this->input->post('nip'), 
			'nama_guru' 	=> $this->input->post('nama')
			);

		$this->db->where('id_guru', $id_guru);
		$this->db->update('guru', $data);
	}

	

}

/* End of file M_guru.php */
/* Location: ./application/models/M_guru.php */ 