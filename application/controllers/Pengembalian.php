<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pengembalian extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url', 'form');
        $this->load->model('M_peminjaman');
        $this->load->model('M_anggota');
        $this->load->model('M_guru');
        $this->load->model('M_petugas');
        $this->load->model('M_buku');
    }

    public function index()
    {
        $data['judul']  = "Pengembalian";
        $data['menu']   = "pengembalian";
        $data['id_p']   = $this->M_peminjaman->get_id();
        $data['anggota'] = $this->M_anggota->get_pengembalian()->result();
        $data['guru']   = $this->M_guru->get_all()->result();
        $this->load->view('pengembalian/index', $data);
    }

    public function proses()
    {
        $total = 0;
        foreach($_POST['kode_buku'] as $k)
        {
            if( ! empty($k)){ $total++; }
        }

        if($total > 0)
        {
            $id_peminjaman      = $this->input->post('id_peminjaman');          //no_nota
            $tanggal_sekarang     = $this->input->post('tanggal_sekarang');
            $id_anggota     = $this->input->post('id_anggota');

            if($tanggal_sekarang == '')
            {
                echo json_encode(array('status' => 0, 'pesan' => "Isi Tanggal Sekarang"));
            }
            else
            {
                $this->M_peminjaman->update($id_peminjaman, $tanggal_sekarang);
                $this->M_anggota->update_peminjaman($id_anggota, 0);

                $id_peminjaman = $this->M_peminjaman->get_id_peminjaman($id_peminjaman)->row()->id_peminjaman;

                    $inserted   = 0;
                    $no_array   = 0;
                    foreach($_POST['kode_buku'] as $k)
                    {
                        if( ! empty($k))
                        {
                            $id_p           = $id_peminjaman;
                            $id_b           = $_POST['kode_buku'][$no_array];
                            $jumlah_b       = $_POST['jumlah'][$no_array];

                            // $insert_d = $this->M_peminjaman->tambah_detail($id_p, $id_b, $jumlah_b);
                            
                            // if($insert_d)
                            // {
                                $bk         = $this->M_buku->get_jumlah($id_b)->row_array();
                                $stokk      = $bk['jumlah'];
                                $stok_new   = $stokk+$jumlah_b;
                                $this->M_buku->update_jumlah($id_b, $stok_new);

                                // if ($update_b) {
                                    $inserted++;    
                                // }
                            // }
                        }
                        $no_array++;
                    }

                    if($inserted > 0)
                    {
                        echo json_encode(array('status' => 1, 'pesan' => "Transaksi berhasil !"));
                    }
                    else
                    {
                        echo json_encode(array('status' => 0, 'pesan' => "GAGAL"));
                    }
            }
        }
        else
        {
            echo json_encode(array('status' => 0, 'pesan' => "Masukkan Buku"));
        }
    }

    public function cari_kode()
    {
        if($this->input->is_ajax_request())
        {
            $keyword    = $this->input->post('id_anggota');

            $trans      = $this->M_peminjaman->cari_kode($keyword);
            $trans_guru = $this->M_peminjaman->cari_kode_guru($keyword);

            if($trans_guru->num_rows() > 0)
            {
                $json['status']     = 1;
                $no = 1;
                $json['hasil'] = "";
                foreach($trans_guru->result() as $b)
                {
                    $json['hasil'] .= "
                        <tr>
                            <td>".$no."</td>
                            <td width='30px'> <input type='text' class='form-control' name='kode_buku[]' value=".$b->kode_buku." readonly /></td> <br />
                            <td >".$b->judul."</td> <br>
                            <td >".$b->penerbit."</td>
                            <td >".$b->pengarang."</td>
                            <td width='30px'> <input type='text' class='form-control' name='jumlah[]' value=".$b->jumlah." readonly /></td>
                        </tr>
                    ";
                    $no++;
                }

                $json['id_peminjaman']  = $trans_guru->row()->id_peminjaman;
                $json['tanggal_pinjam'] = $trans_guru->row()->tanggal_pinjam;
                $json['tanggal_kembali']= $trans_guru->row()->tanggal_kembali;
                $json['guru']           = $trans_guru->row()->nama_guru;
                $json['petugas']        = $trans_guru->row()->nama_petugas;
            }
            elseif ($trans->num_rows() > 0) {
                $json['status']     = 1;
                $no = 1;
                $json['hasil'] = "";
                foreach($trans->result() as $b)
                {
                    $json['hasil'] .= "
                        <tr>
                            <td>".$no."</td>
                            <td >".$b->kode_buku."</td> <br />
                            <td >".$b->judul."</td> <br>
                            <td >".$b->penerbit."</td>
                            <td >".$b->pengarang."</td>
                            <td >".$b->jumlah."</td>
                        </tr>
                    ";
                    $no++;
                }

                $json['id_peminjaman']  = $trans->row()->id_peminjaman;
                $json['tanggal_pinjam'] = $trans->row()->tanggal_pinjam;
                $json['tanggal_kembali']= $trans->row()->tanggal_kembali;
                $json['guru']           = "Tidak Ada";
                $json['petugas']        = $trans->row()->nama_petugas;
            }
            else
            {
                $json['status']     = 0;
                $json['pesan']      = "Tidak Ada Peminjaman atas Nama tersebut";
            }

            echo json_encode($json);
        }
    }
}

/* End of file peminjaman.php */
/* Location: ./application/controllers/peminjaman.php */ 