<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Guru extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model('M_guru');
		$this->load->model('M_jenis');
		$this->load->library('PHPExcel');
	}

	public function index()
	{
		$data['judul'] 	= "Guru";
		$data['menu'] 	= "guru";
        $data['guru']   = $this->M_guru->get_all()->result();
		$this->load->view('guru/index', $data);
	}

	public function import()
	{
		$filename = 'guru.xlsx';

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

        $sheet          = $Object->setActiveSheetIndex(0); //0 adalah nomor sheetnya
        $highestRow     = $Object->setActiveSheetIndex(0)->getHighestRow();
        $highestColumn  = $Object->setActiveSheetIndex(0)->getHighestColumn();

        $data = [];
        $numrow = 1;

        for ($i=1; $i <= $highestRow; $i++) { 
            $nama_guru	= $sheet->getCellByColumnAndRow(1,$i)->getValue();
            $nip            = $sheet->getCellByColumnAndRow(2,$i)->getCalculatedValue();

            if ($nip != '') {
                array_push($data, [
                    'nip'           =>$nip,            
                    'nama_guru'  =>$nama_guru,           
                    'user'          =>$nip,            
                    'password'      =>md5($nip),            
                ]);
            }


        }

        $this->M_guru->insert_multiple($data);
        // $this->M_guru->dell2();

        unlink($filenya);

        $this->session->set_flashdata('sukses_tambah','1');
        redirect('guru');

	}

    public function tambah()
    {
        $this->form_validation->set_rules('nip', 'NIP / NIGNP', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Gagal!</strong> NIP / NIGNP Tidak Boleh Kosong.</div>'
                    )
            );
        $this->form_validation->set_rules('nama', 'Nama guru', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Gagal!</strong> Nama guru Tidak Boleh Kosong.</div>'
                    )
            );

        //jika validasi gagal
        if ($this->form_validation->run() == FALSE) {
            $data['judul']  = "Guru";
            $data['menu']   = "guru";
            $data['guru']   = $this->M_guru->get_all()->result();
            $this->load->view('guru/index', $data);
        }else{
            $this->M_guru->tambah_proses();
            $this->session->set_flashdata('sukses_tambah','1');
            redirect('guru','refresh');
        }
    }

    public function edit($id_guru)
    {
        $data['judul']  = "Guru";
        $data['menu']   = "guru";
        $data['guru']= $this->M_guru->get_by_id($id_guru)->row_array();
        $this->load->view('guru/edit', $data);
    }

    public function edit_proses($id_guru)
    {
        $this->form_validation->set_rules('nip', 'NIP / NIGNP', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Gagal!</strong> NIP / NIGNP Tidak Boleh Kosong.</div>'
                    )
            );
        $this->form_validation->set_rules('nama', 'Nama guru', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Gagal!</strong> Nama guru Tidak Boleh Kosong.</div>'
                    )
            );

        //jika validasi gagal
        if ($this->form_validation->run() == FALSE) {
            $data['judul']  = "Guru";
            $data['menu']   = "guru";
            $data['guru']= $this->M_guru->get_by_id($id_guru)->row_array();
            $this->load->view('guru/edit', $data);
        }else{
            $this->M_guru->edit_proses($id_guru);
            $this->session->set_flashdata('sukses_edit','1');
            redirect('guru','refresh');
        }
    }

    public function hapus()
    {
        $id_guru = $this->input->post('id_guru');

        $this->db->where('id_guru', $id_guru);
        $this->db->delete('guru');

        $this->session->set_flashdata('sukses_hapus','1');
        redirect('guru','refresh');
    }

	public function data_server()
	{
		$this->load->library('Datatables');
        $this->datatables->select('id_guru, nip, nama_guru');
		$this->datatables->from('guru');
		echo $this->datatables->generate();
	}

}

/* End of file guru.php */
/* Location: ./application/controllers/guru.php */ 