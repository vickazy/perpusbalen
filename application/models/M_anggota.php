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
		return $this->db->query("SELECT * FROm anggota 
								WHERE status < 4");
	}

	public function get_peminjaman_paket()
	{
		return $this->db->query("SELECT * FROM anggota");
	}

	public function get_pengembalian()
	{
		$q = $this->db->query("SELECT * FROM transaksi, detail_transaksi, anggota
								WHERE transaksi.id_peminjaman = detail_transaksi.id_peminjaman
								AND transaksi.id_anggota = anggota.nis
								AND detail_transaksi.status = 'P'
								AND transaksi.id_guru=0
								GROUP BY transaksi.id_peminjaman");
		
		return $q;
	}

	public function get_pengembalian_paket()
	{
		$r =  $this->db->query("SELECT * FROM transaksi, detail_transaksi, anggota, guru
								WHERE transaksi.id_peminjaman = detail_transaksi.id_peminjaman
								AND transaksi.id_anggota = anggota.nis
								AND transaksi.id_guru = guru.id_guru
								AND detail_transaksi.status = 'P'
								AND transaksi.id_guru!=0
								GROUP BY transaksi.id_peminjaman");
		return $r;
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

	public function update_status($id_anggota, $status)
	{
		$data = array('status' => $status );

		$this->db->where('nis', $id_anggota);
		$this->db->update('anggota', $data);
	}

}

/* End of file M_anggota.php */
/* Location: ./application/models/M_anggota.php */ 