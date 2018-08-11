<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_peminjaman extends CI_Model {

	public function get_id()
	{
		$q 	= $this->db->query("select MAX(LEFT(id_peminjaman,10)) as tanggal_fak from transaksi");
		$tgl 		= date("Y-m-d");
		$tgl_fak 	= $q->row_array();
		$tgl_faktur	= $tgl_fak['tanggal_fak']; 
		$kd = "";
		
		if ($q->num_rows() > 0) {
			if ($tgl == $tgl_faktur) {
				$id = $this->db->query("select MAX(MID(id_peminjaman, 12 , 10)) as id_fak from transaksi WHERE tanggal_pinjam = '$tgl'");
				foreach($id->result() as $k)
	            {
	                $tmp = ((int)$k->id_fak)+1;
	                $kd = sprintf("%1s", $tmp);
	            }
			}else{
				$kd = "1";
			}
		}

        return $tgl."-".$kd;
	}

	public function get_id_peminjaman($id_peminjaman)
	{
		$this->db->where('id_peminjaman', $id_peminjaman);
		return $this->db->get('transaksi', $id_peminjaman);
	}

	public function tambah_peminjaman($id_peminjaman, $tanggal_pinjam, $tanggal_kembali, $id_petugas, $id_anggota, $id_guru)
	{
		$data = array(
			'id_peminjaman'		=> $id_peminjaman,
			'tanggal_pinjam'	=> $tanggal_pinjam,
			'tanggal_kembali'	=> $tanggal_kembali,
			'id_petugas'		=> $id_petugas,
			'id_anggota'		=> $id_anggota,
			'id_guru'		=> $id_guru,
			'kembali_tanggal'	=> '',
			'status'			=> 'P',
			'denda'				=> 0,
		);
		$this->db->insert('transaksi', $data);
	}

	public function tambah_detail($id_peminjaman, $kode_buku, $jumlah)
	{
		$data = array(
			'id_peminjaman' => $id_peminjaman, 
			'kode_buku' 	=> $kode_buku, 
			'jumlah' 		=> $jumlah,
			'status'		=> 'P'
		);

		$this->db->insert('detail_transaksi', $data);
	}

	public function update($id_peminjaman, $tanggal_sekarang)
	{
		$selisih = $this->db->query("SELECT datediff($tanggal_sekarang, tanggal_kembali) as selisih 
			FROM `transaksi` WHERE id_peminjaman = '$id_peminjaman' ")->row()->selisih;

		if ($selisih > 0) {
			$denda = 100 * $selisih;
		} else {
			$denda = 0;
		}		

		$data = array(
			'kembali_tanggal' 	=> $tanggal_sekarang,
			'denda'				=> $denda,
			'status'			=> 'K'
		);

		$status = array('status' => 'K' );

		$this->db->where('id_peminjaman', $id_peminjaman);
		$this->db->update('transaksi', $data);

		$this->db->where('id_peminjaman', $id_peminjaman);
		$this->db->update('detail_transaksi', $status);
	}

	public function cari_kode($keyword)
	{
		$q = $this->db->query("SELECT transaksi.id_peminjaman, transaksi.tanggal_pinjam, transaksi.tanggal_kembali, petugas.nama_petugas, buku.kode_buku, buku.judul, buku.penerbit, buku.pengarang, detail_transaksi.jumlah
			FROM transaksi, detail_transaksi, buku, anggota, petugas
			WHERE transaksi.id_peminjaman = detail_transaksi.id_peminjaman
			AND transaksi.id_anggota = anggota.nis
			AND transaksi.id_petugas = petugas.id_petugas
			AND detail_transaksi.kode_buku = buku.kode_buku
			AND detail_transaksi.status = 'P'
			AND transaksi.id_anggota = '$keyword' ");
		return $q;
	}

	public function cari_kode_guru($keyword)
	{
		$r = $this->db->query("SELECT transaksi.id_peminjaman, transaksi.tanggal_pinjam, transaksi.tanggal_kembali, petugas.nama_petugas, guru.nama_guru, buku.kode_buku, buku.judul, buku.penerbit, buku.pengarang, detail_transaksi.jumlah 
			FROM transaksi, detail_transaksi, buku, anggota, petugas, guru
			WHERE transaksi.id_peminjaman = detail_transaksi.id_peminjaman
			AND transaksi.id_anggota = anggota.nis
			AND transaksi.id_petugas = petugas.id_petugas
			AND transaksi.id_guru = guru.id_guru
			AND detail_transaksi.kode_buku = buku.kode_buku
			AND detail_transaksi.status = 'P'
			AND transaksi.id_anggota = '$keyword' ");
		return $r;
	}

}

/* End of file M_peminjaman.php */
/* Location: ./application/models/M_peminjaman.php */ 