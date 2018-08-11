<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Anggota extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model('M_anggota');
		$this->load->library('PHPExcel');
	}

	public function index()
	{
		$data['judul'] 	= "Anggota";
		$data['menu'] 	= "anggota";
        $data['anggota']   = $this->M_anggota->get_all()->result();
		$this->load->view('anggota/index', $data);
	}

	public function import()
	{
		$filename = 'anggota.xlsx';

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

        for ($k=3; $k <= 4; $k++) { 
            $sheet          = $Object->setActiveSheetIndex($k); //$k adalah nomor sheetnya
            $highestRow     = $Object->setActiveSheetIndex($k)->getHighestRow();
            $highestColumn  = $Object->setActiveSheetIndex($k)->getHighestColumn();

            $data = [];
            $numrow = 1;
            $kls = 'r';

            for ($i=4; $i <= $highestRow; $i++) { 
                $kelas          = $sheet->getCellByColumnAndRow(0,$i)->getValue();
                $nis            = $sheet->getCellByColumnAndRow(1,$i)->getValue();
                $nama_anggota   = $sheet->getCellByColumnAndRow(2,$i)->getValue();
                $jk             = $sheet->getCellByColumnAndRow(3,$i)->getValue();

                if (substr($kelas,0,5) != '' && substr($kelas,0,5) == 'KELAS') {
                    $kls = substr($kelas,-3);
                }else{
                    if ($kls != '') {
                        $kls = $kls;
                    } else {
                        $kls = '';
                    }
                }

                if ($jk == 'P' || $jk == 'L') {
                    array_push($data, [
                        'nis'           =>$nis,            
                        'nama'          =>$nama_anggota,           
                        'jk'            =>$jk,            
                        'kelas'         =>$kls          
                    ]);
                }
            }

            $this->M_anggota->insert_multiple($data);   
        }

        // $this->M_anggota->dell2();

        unlink($filenya);

        $this->session->set_flashdata('sukses_tambah','1');
        redirect('anggota/index/'.$kls);

	}

    public function tambah()
    {
        $this->form_validation->set_rules('nis', 'NIS', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Gagal!</strong> NIS Tidak Boleh Kosong.</div>'
                    )
            );
        $this->form_validation->set_rules('nama', 'Nama Anggota', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Gagal!</strong> Nama Anggota Tidak Boleh Kosong.</div>'
                    )
            );
        $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Gagal!</strong> Kelamin Tidak Boleh Kosong.</div>'
                    )
            );
        $this->form_validation->set_rules('kelas', 'Kelas', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Gagal!</strong> Kelas Tidak Boleh Kosong.</div>'
                    )
            );

        //jika validasi gagal
        if ($this->form_validation->run() == FALSE) {
            $data['judul']  = "Anggota";
            $data['menu']   = "anggota";
            $data['anggota']   = $this->M_anggota->get_all()->result();
            $this->load->view('anggota/index', $data);
        }else{
            $this->M_anggota->tambah_proses();
            $this->session->set_flashdata('sukses_tambah','1');
            redirect('anggota','refresh');
        }
    }

    public function edit($nis)
    {
        $data['judul']  = "Anggota";
        $data['menu']   = "anggota";
        $data['anggota']= $this->M_anggota->get_by_id($nis)->row_array();
        $this->load->view('anggota/edit', $data);
    }

    public function edit_proses($nis)
    {
        $this->form_validation->set_rules('nis', 'NIS', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Gagal!</strong> NIS Tidak Boleh Kosong.</div>'
                    )
            );
        $this->form_validation->set_rules('nama', 'Nama Anggota', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Gagal!</strong> Nama Anggota Tidak Boleh Kosong.</div>'
                    )
            );
        $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Gagal!</strong> Kelamin Tidak Boleh Kosong.</div>'
                    )
            );
        $this->form_validation->set_rules('kelas', 'Kelas', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Gagal!</strong> Kelas Tidak Boleh Kosong.</div>'
                    )
            );

        //jika validasi gagal
        if ($this->form_validation->run() == FALSE) {
            $data['judul']  = "Anggota";
            $data['menu']   = "anggota";
            $data['anggota']= $this->M_anggota->get_by_id($nis)->row_array();
            $this->load->view('anggota/edit', $data);
        }else{
            $this->M_anggota->edit_proses($nis);
            $this->session->set_flashdata('sukses_edit','1');
            redirect('anggota','refresh');
        }
    }

    public function hapus()
    {
        $nis = $this->input->post('nis');

        $this->db->where('nis', $nis);
        $this->db->delete('anggota');

        $this->session->set_flashdata('sukses_hapus','1');
        redirect('anggota','refresh');
    }

	public function data_server()
	{
		$this->load->library('Datatables');
        $this->datatables->select('nis, nama, kelas, jk');
		$this->datatables->from('anggota');
		echo $this->datatables->generate();
	}

}

/* End of file anggota.php */
/* Location: ./application/controllers/anggota.php */ 