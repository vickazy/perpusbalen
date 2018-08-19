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

	public function get_by_id($id_jenis)
	{
		$this->db->where('id_jenis', $id_jenis);
		return $this->db->get('jenis');
	}

	public function insert_multiple($data){    
		$this->db->insert_batch('jenis', $data);  
	}

	public function tambah_proses()
	{
		$data = array(
			'id_jenis' 			=> $this->input->post('id_jenis'), 
			'jenis_buku' 		=> $this->input->post('jenis_buku'),
			);

		$this->db->insert('jenis', $data);
	}

	public function edit_proses($id_jenis)
	{
		$data = array(
			'jenis_buku' 		=> $this->input->post('jenis_buku')
			);

		$this->db->where('id_jenis', $id_jenis);
		$this->db->update('jenis', $data);
	}

}

/* End of file M_jenis.php */
/* Location: ./application/models/M_jenis.php */ 