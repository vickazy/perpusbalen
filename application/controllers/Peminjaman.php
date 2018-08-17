<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Peminjaman extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url', 'form');
        $this->load->model('M_peminjaman');
        $this->load->model('M_anggota');
        $this->load->model('M_guru');
        $this->load->model('M_petugas');
        $this->load->model('M_buku');

        if ($this->session->userdata('userdata') == null) {
            redirect('Login');
        }
    }

    public function index()
    {
        $data['judul']  = "Peminjaman Buku";
        $data['menu']   = "lainnya";
        $data['id_p']   = $this->M_peminjaman->get_id();
        $data['anggota'] = $this->M_anggota->get_peminjaman()->result();
        $data['guru']   = $this->M_guru->get_all()->result();
        $this->load->view('peminjaman/index', $data);
    }

    public function paket()
    {
        $data['judul']  = "Peminjaman Buku Paket";
        $data['menu']   = "paket";
        $data['id_p']   = $this->M_peminjaman->get_id();
        $data['anggota'] = $this->M_anggota->get_peminjaman_paket()->result();
        $data['guru']   = $this->M_guru->get_all()->result();
        $this->load->view('peminjaman/paket', $data);
    }

    public function histori()
    {
        $data['judul']  = "Histori Transaksi";
        $data['menu']   = "histori";
        $data['peminjaman']  = $this->M_peminjaman->get_all()->result();
        $this->load->view('peminjaman/histori', $data);
    }

    public function tambah_proses()
    {
        $total = 0;
        foreach($_POST['kode_buku'] as $k)
        {
            if( ! empty($k)){ $total++; }
        }

        if($total > 0)
        {
            $id_peminjaman      = $this->input->post('id_peminjaman');          //no_nota
            $tanggal_pinjam     = $this->input->post('tanggal_pinjam');      //tanggal
            $tanggal_kembali    = $this->input->post('tanggal_kembali');      //tanggal
            $id_petugas         = $this->input->post('id_petugas');             //kasir
            $id_anggota         = $this->input->post('id_anggota');              //pelanggan
            $id_guru            = $this->input->post('id_guru');              //pelanggan

            if($tanggal_kembali == '')
            {
                echo json_encode(array('status' => 0, 'pesan' => "Isi Tanggal Kembali"));
            }
            elseif($id_anggota == '')
            {
                echo json_encode(array('status' => 0, 'pesan' => "Pilih Peminjam"));
            }
            else
            {
                $hm = 0;
                $err = 0;
                foreach ($_POST['jumlah'] as $jj){
                    // if (!empty($jj)) {
                        $st = $this->M_anggota->get_by_id($id_anggota)->row()->status;
                        $stn = $_POST['jumlah'][$hm];

                        if ($id_guru == "") {
                            if ($st+$stn > 4) {
                                $err++;
                                echo json_encode(array('status' => 0, 'pesan' => "Batas peminjaman <strong>4 Buku</strong>!"));
                                $this->M_anggota->update_status($id_anggota, $st);
                            } else {
                                $this->M_anggota->update_status($id_anggota, $st+$stn); 
                            }
                        }

                    // }
                    $hm++;
                }

                if ($err == 0) {
                    $this->M_peminjaman->tambah_peminjaman($id_peminjaman, $tanggal_pinjam, $tanggal_kembali, $id_petugas, $id_anggota, $id_guru);
                    $cek = $this->M_peminjaman->cek_pinjam($id_anggota)->num_rows();

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

                                    
                                    $insert_d = $this->M_peminjaman->tambah_detail($id_p, $id_b, $jumlah_b);
                                    
                                    // if($insert_d)
                                    // {
                                    $bk         = $this->M_buku->get_jumlah($id_b)->row_array();
                                    $stokk      = $bk['jumlah'];
                                    $stok_new   = $stokk-$jumlah_b;
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
                            echo json_encode(array('status' => 1, 'pesan' => "Transaksi berhasil disimpan !"));
                        }
                        else
                        {
                            echo json_encode(array('status' => 0, 'pesan' => "GAGAL"));
                        }
                }
            }
        }
        else
        {
            echo json_encode(array('status' => 0, 'pesan' => "Masukkan Buku"));
        }
    }

    public function ekspor()
    {
        $data['all']=$this->M_peminjaman->get_all()->result();
        $this->load->view('peminjaman/ekspor', $data);
    }

    public function ajax_kode()
    {
        if($this->input->is_ajax_request())
        {
            $keyword = $this->input->post('keyword');

            $buku = $this->M_buku->cari_kode($keyword);

            if($buku->num_rows() > 0)
            {
                $json['status']     = 1;
                $json['datanya']    = "<ul id='daftar-autocomplete'>";
                foreach($buku->result() as $b)
                {
                    $json['datanya'] .= "
                        <li>
                            <b>Kode</b> : 
                            <span id='kodenya'>".$b->kode_buku."</span> <br />
                            <span id='bukunya'>".$b->judul."</span> <br>
                            <span id='penerbit' style='display:none;'>".$b->penerbit."</span>
                            <span id='pengarang' style='display:none;'>".$b->pengarang."</span>
                        </li>
                    ";
                }
                $json['datanya'] .= "</ul>";
            }
            else
            {
                $json['status']     = 0;
            }

            echo json_encode($json);
        }
    }

    public function ajax_kode_paket()
    {
        if($this->input->is_ajax_request())
        {
            $keyword = $this->input->post('keyword');

            $buku = $this->M_buku->cari_kode_paket($keyword);

            if($buku->num_rows() > 0)
            {
                $json['status']     = 1;
                $json['datanya']    = "<ul id='daftar-autocomplete'>";
                foreach($buku->result() as $b)
                {
                    $json['datanya'] .= "
                        <li>
                            <b>Kode</b> : 
                            <span id='kodenya'>".$b->kode_buku."</span> <br />
                            <span id='bukunya'>".$b->judul."</span> <br>
                            <span id='penerbit' style='display:none;'>".$b->penerbit."</span>
                            <span id='pengarang' style='display:none;'>".$b->pengarang."</span>
                        </li>
                    ";
                }
                $json['datanya'] .= "</ul>";
            }
            else
            {
                $json['status']     = 0;
            }

            echo json_encode($json);
        }
    }

    public function data_server()
    {
        $this->load->library('Datatables');
        $this->datatables->select('transaksi.id_peminjaman, transaksi.tanggal_pinjam, anggota.nama, transaksi.status');
        $this->datatables->from('transaksi');
        $this->datatables->join('anggota', 'transaksi.id_anggota = anggota.nis');
        // $this->datatables->order_by('transaksi.id_peminjaman', 'asc');
        echo $this->datatables->generate();
    }
}

/* End of file peminjaman.php */
/* Location: ./application/controllers/peminjaman.php */ 