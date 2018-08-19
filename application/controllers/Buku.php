<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Buku extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model('M_buku');
		$this->load->model('M_jenis');
		$this->load->library('PHPExcel');

        if ($this->session->userdata('userdata') == null) {
            redirect('Login');
        }
	}

	public function index()
	{
		$data['judul'] 	= "Buku";
		$data['menu'] 	= "buku";
        $data['buku']   = $this->M_buku->get_all()->result();
		$data['jenis'] 	= $this->M_jenis->get_all()->result();
		$this->load->view('buku/index', $data);
	}

	public function import()
	{
		$filename = 'buku.xlsx';

        $config['upload_path']      = './upload/';
        $config['file_name']        = $filename;
        $config['allowed_types']    = 'xlsx|xls|csv';
        $config['max_size']         = 102400;
        
        $this->load->library('upload', $config);
        
        if ( ! $this->upload->do_upload('filenya')){
            $error = array('error' => $this->upload->display_errors());
        }else{
            $data       = $this->upload->data('filenya');
            $filenya    = FCPATH.'./upload/'.$filename;

            try {
                $file_type  = PHPExcel_IOFactory::identify($filenya);
                $reader     = PHPExcel_IOFactory::createReader('Excel2007');
                $Object     = $reader->load($filenya);
            } catch (Exception $e) {
                die('Error '. $e->getMessage());
            }
        }

        for ($k=0; $k <= 4; $k++) { 
            
            $sheet          = $Object->setActiveSheetIndex($k); //$k adalah nomor sheetnya
            $highestRow     = $Object->setActiveSheetIndex($k)->getHighestRow();
            $highestColumn  = $Object->setActiveSheetIndex($k)->getHighestColumn();

            $data = [];
            $numrow = 1;

            for ($i=5; $i <= $highestRow; $i++) { 
                $tanggal 		= $sheet->getCellByColumnAndRow(1,$i)->getValue();
                $no_inventaris	= $sheet->getCellByColumnAndRow(2,$i)->getValue();
                $pp 			= $sheet->getCellByColumnAndRow(3,$i)->getValue();
                $judul  		= $sheet->getCellByColumnAndRow(4,$i)->getValue();
                $asal  			= $sheet->getCellByColumnAndRow(5,$i)->getValue();
                $bahasa  		= $sheet->getCellByColumnAndRow(6,$i)->getValue();
                $harga  		= $sheet->getCellByColumnAndRow(7,$i)->getCalculatedValue();
                $no_induk  		= $sheet->getCellByColumnAndRow(8,$i)->getValue();
                $jum 	  		= $sheet->getCellByColumnAndRow(9,$i)->getValue();
                $keterangan  	= $sheet->getCellByColumnAndRow(10,$i)->getValue();

                if ($jum != '') {
                    $jumlah = $jum;
                }

                $pisah 	= explode("/", $pp);

                if ($jum != '') {
                    array_push($data, [
                        'tanggal'		=>$tanggal,           
                        'no_inventaris' =>$no_inventaris,           
                        'penerbit'     	=>$pisah[0],           
                        'pengarang'     =>$pisah[1],           
                        'judul'    		=>$judul,         
                        'asal'     		=>$asal,         
                        'bahasa'     	=>$bahasa,         
                        'harga' 		=>$harga,    
                        'no_induk' 		=>$no_induk,  
                        'keterangan'    =>$keterangan,    
                        'jumlah'        =>$jum,    
                        'id_jenis' 	    =>$this->input->post('id_jenis')    
                    ]);
                }

            }

            $this->M_buku->insert_multiple($data);
            // $this->M_buku->dell2();
        }

        unlink($filenya);

        $this->session->set_flashdata('sukses_tambah','1');
        redirect('Buku');

	}

    public function tambah()
    {
        $this->form_validation->set_rules('judul', 'Judul Buku', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Gagal!</strong> Judul Buku Tidak Boleh Kosong.</div>'
                    )
            );
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Gagal!</strong> Tanggal Boleh Kosong.</div>'
                    )
            );
        $this->form_validation->set_rules('penerbit', 'penerbit', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Gagal!</strong> Penerbit Tidak Boleh Kosong.</div>'
                    )
            );
        $this->form_validation->set_rules('bahasa', 'bahasa', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Gagal!</strong> Bahasa Tidak Boleh Kosong.</div>'
                    )
            );
        $this->form_validation->set_rules('jumlah', 'jumlah', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Gagal!</strong> Jumlah Tidak Boleh Kosong.</div>'
                    )
            );
        $this->form_validation->set_rules('no_inventaris', 'no_inventaris', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Gagal!</strong> No Inventaris Tidak Boleh Kosong.</div>'
                    )
            );
        $this->form_validation->set_rules('pengarang', 'pengarang', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Gagal!</strong> Pengarang Tidak Boleh Kosong.</div>'
                    )
            );
        $this->form_validation->set_rules('asal', 'asal', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Gagal!</strong> Asal Tidak Boleh Kosong.</div>'
                    )
            );
        $this->form_validation->set_rules('harga', 'harga', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Gagal!</strong> Harga Tidak Boleh Kosong.</div>'
                    )
            );
        $this->form_validation->set_rules('keterangan', 'keterangan', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Gagal!</strong> Keterangan Tidak Boleh Kosong.</div>'
                    )
            );

        //jika validasi gagal
        if ($this->form_validation->run() == FALSE) {
            $data['judul']  = "Buku";
            $data['menu']   = "buku";
            $data['modal_show'] = "$('#modal-form').modal('show');";
            $data['buku']   = $this->M_buku->get_all()->result();
            $data['jenis']  = $this->M_jenis->get_all()->result();
            $this->load->view('buku/index', $data);
        }else{
            $this->M_buku->tambah_proses();
            $this->session->set_flashdata('sukses_tambah','1');
            redirect('buku','refresh');
        }
    }

    public function edit($kode_buku)
    {
        $data['judul']  = "Buku";
        $data['menu']   = "buku";
        $data['buku']   = $this->M_buku->get_by_id($kode_buku)->row_array();
        $data['jenis']  = $this->M_jenis->get_all()->result();
        $this->load->view('buku/edit', $data);
    }

    public function edit_proses($kode_buku)
    {
        $this->form_validation->set_rules('judul', 'Judul Buku', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Gagal!</strong> Judul Buku Tidak Boleh Kosong.</div>'
                    )
            );
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Gagal!</strong> Tanggal Boleh Kosong.</div>'
                    )
            );
        $this->form_validation->set_rules('penerbit', 'penerbit', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Gagal!</strong> Penerbit Tidak Boleh Kosong.</div>'
                    )
            );
        $this->form_validation->set_rules('bahasa', 'bahasa', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Gagal!</strong> Bahasa Tidak Boleh Kosong.</div>'
                    )
            );
        $this->form_validation->set_rules('jumlah', 'jumlah', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Gagal!</strong> Jumlah Tidak Boleh Kosong.</div>'
                    )
            );
        $this->form_validation->set_rules('no_inventaris', 'no_inventaris', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Gagal!</strong> No Inventaris Tidak Boleh Kosong.</div>'
                    )
            );
        $this->form_validation->set_rules('pengarang', 'pengarang', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Gagal!</strong> Pengarang Tidak Boleh Kosong.</div>'
                    )
            );
        $this->form_validation->set_rules('asal', 'asal', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Gagal!</strong> Asal Tidak Boleh Kosong.</div>'
                    )
            );
        $this->form_validation->set_rules('harga', 'harga', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Gagal!</strong> Harga Tidak Boleh Kosong.</div>'
                    )
            );
        $this->form_validation->set_rules('keterangan', 'keterangan', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Gagal!</strong> Keterangan Tidak Boleh Kosong.</div>'
                    )
            );

        //jika validasi gagal
        if ($this->form_validation->run() == FALSE) {
            $data['judul']  = "Buku";
            $data['menu']   = "buku";
            $data['buku']   = $this->M_buku->get_by_id($kode_buku)->row_array();
            $data['jenis']  = $this->M_jenis->get_all()->result();
            $this->load->view('buku/edit', $data);
        }else{
            $this->M_buku->edit_proses($kode_buku);
            $this->session->set_flashdata('sukses_edit','1');
            redirect('buku','refresh');
        }
    }

    public function hapus()
    {
        $kode_buku = $this->input->post('kode_buku');

        $this->db->where('kode_buku', $kode_buku);
        $this->db->delete('buku');

        $this->session->set_flashdata('sukses_hapus','1');
        redirect('buku','refresh');
    }

	public function data_server()
	{
		$this->load->library('Datatables');
        $this->datatables->select('kode_buku, judul, tanggal, no_inventaris, buku.jumlah');
        $this->datatables->join('jenis', 'buku.id_jenis = jenis.id_jenis');
		$this->datatables->from('buku');
		echo $this->datatables->generate();
	}

        public function cek_jumlah()
    {
        if($this->input->is_ajax_request())
        {
            $kode = $this->input->post('kode_buku');
            $jumlah = $this->input->post('jumlah');

            $get_jumlah = $this->M_buku->get_jumlah($kode);
            if($jumlah > $get_jumlah->row()->jumlah)
            {
                echo json_encode(array('status' => 0, 'pesan' => "jumlah untuk <b>".$get_jumlah->row()->judul."</b> saat ini hanya tersisa <b>".$get_jumlah->row()->jumlah."</b> !"));
            }
            else
            {
                echo json_encode(array('status' => 1));
            }
        }
    }

}

/* End of file Buku.php */
/* Location: ./application/controllers/Buku.php */ 