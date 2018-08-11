<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_buku extends CI_Model {

	public function get_all()
	{
		return $this->db->get('buku');
	}

	public function get_by_id($kode_buku)
	{
		$q = $this->db->query("SELECT * FROM buku, jenis
						WHERE buku.id_jenis = jenis.id_jenis
						AND buku.kode_buku = '$kode_buku' ");

		return $q;			
	}

	public function insert_multiple($data){    
		$this->db->insert_batch('buku', $data);  
	}

	public function tambah_proses()
	{
		$data = array(
                'tanggal'		=> $this->input->post('tanggal'),           
                'no_inventaris' => $this->input->post('no_inventaris'),           
                'penerbit'     	=> $this->input->post('penerbit'),           
                'pengarang'     => $this->input->post('pengarang'),           
                'judul'    		=> $this->input->post('judul'),         
                'asal'     		=> $this->input->post('asal'),         
                'bahasa'     	=> $this->input->post('bahasa'),         
                'harga' 		=> $this->input->post('harga'),    
                'no_induk' 		=> $this->input->post('jumlah'),  
                'keterangan'    => $this->input->post('keterangan'),    
                'jumlah'        => $this->input->post('jumlah'),    
                'id_jenis' 	    =>$this->input->post('id_jenis')    
            );

		$this->db->insert('buku', $data);
	}

	public function edit_proses($kode_buku)
	{
		$data = array(
                'tanggal'		=> $this->input->post('tanggal'),           
                'no_inventaris' => $this->input->post('no_inventaris'),           
                'penerbit'     	=> $this->input->post('penerbit'),           
                'pengarang'     => $this->input->post('pengarang'),           
                'judul'    		=> $this->input->post('judul'),         
                'asal'     		=> $this->input->post('asal'),         
                'bahasa'     	=> $this->input->post('bahasa'),         
                'harga' 		=> $this->input->post('harga'),    
                'no_induk' 		=> $this->input->post('jumlah'),  
                'keterangan'    => $this->input->post('keterangan'),    
                'jumlah'        => $this->input->post('jumlah'),    
                'id_jenis' 	    =>$this->input->post('id_jenis')    
            );

		$this->db->where('kode_buku', $kode_buku);
		$this->db->update('buku', $data);
	}

	public function cari_kode($keyword)
	{
		$sql = "
			SELECT 
				kode_buku, judul, penerbit, pengarang
			FROM 
				buku 
			WHERE  
				jumlah > 0 
				AND ( 
					kode_buku LIKE '%".$this->db->escape_like_str($keyword)."%' 
					OR judul LIKE '%".$this->db->escape_like_str($keyword)."%' 
				)
		";

		return $this->db->query($sql);
	}

	public function get_jumlah($kode)
	{
		return $this->db
			->select('*')
			->where('kode_buku', $kode)
			->limit(1)
			->get('buku');
	}

	public function update_jumlah($kode_buku, $jumlah)
	{
		$data = array('jumlah' => $jumlah );


		$this->db->where('kode_buku', $kode_buku);
		$this->db->update('buku', $data);
	}

}

/* End of file M_buku.php */
/* Location: ./application/models/M_buku.php */ 