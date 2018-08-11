<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_anggota extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function get_all()
	{
		return $this->db->get('anggota');
	}

	public function get_peminjaman()
	{
		$this->db->where('status', 0);
		return $this->db->get('anggota');
	}

	public function get_pengembalian()
	{
		$this->db->where('status', 1);
		return $this->db->get('anggota');
	}

	public function get_by_id($nis)
	{
		$this->db->where('nis', $nis);
		return $this->db->get('anggota');
	}

	public function insert_multiple($data){    
		$this->db->insert_batch('anggota', $data);  
	}

	public function tambah_proses()
	{
		$data = array(
			'nis' 		=> $this->input->post('nis'), 
			'nama' 		=> $this->input->post('nama'),
			'jk' 		=> $this->input->post('jk'),
			'kelas' 	=> $this->input->post('kelas'),
			);

		$this->db->insert('anggota', $data);
	}

	public function edit_proses($nis)
	{
		$data = array(
			'nis' 		=> $this->input->post('nis'), 
			'nama' 		=> $this->input->post('nama'),
			'jk' 		=> $this->input->post('jk'),
			'kelas' 	=> $this->input->post('kelas'),
			);

		$this->db->where('nis', $nis);
		$this->db->update('anggota', $data);
	}

	public function update_peminjaman($id_anggota, $status)
	{
		$data = array('status' => $status );

		$this->db->where('nis', $id_anggota);
		$this->db->update('anggota', $data);
	}

}

/* End of file M_anggota.php */
/* Location: ./application/models/M_anggota.php */ 