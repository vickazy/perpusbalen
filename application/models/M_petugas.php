<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_petugas extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function get_all()
	{
		return $this->db->get('petugas');
	}

	public function get_by_id($id_petugas)
	{
		$this->db->where('id_petugas', $id_petugas);
		return $this->db->get('petugas');
	}

	public function insert_multiple($data){    
		$this->db->insert_batch('petugas', $data);  
	}

	public function tambah_proses()
	{
		$data = array(
			'nip' 			=> $this->input->post('nip'), 
			'nama_petugas' 	=> $this->input->post('nama'),
			'user' 			=> $this->input->post('nip'),
			'password' 	=> md5($this->input->post('nip')) 
			);

		$this->db->insert('petugas', $data);
	}

	public function edit_proses($id_petugas)
	{
		$data = array(
			'nip' 			=> $this->input->post('nip'), 
			'nama_petugas' 	=> $this->input->post('nama')
			);

		$this->db->where('id_petugas', $id_petugas);
		$this->db->update('petugas', $data);
	}
}

/* End of file M_petugas.php */
/* Location: ./application/models/M_petugas.php */ 