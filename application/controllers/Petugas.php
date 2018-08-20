<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Petugas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model('M_petugas');
		$this->load->model('M_jenis');
		$this->load->library('PHPExcel');

        if ($this->session->userdata('userdata') == null) {
            redirect('Login');
        }
	}

	public function index()
	{
		$data['judul'] 	= "Petugas";
		$data['menu'] 	= "petugas";
        $data['petugas']   = $this->M_petugas->get_all()->result();
		$this->load->view('petugas/index', $data);
	}

	public function import()
	{
		$filename = 'petugas.xlsx';

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
            $nama_petugas	= $sheet->getCellByColumnAndRow(1,$i)->getValue();
            $nip            = $sheet->getCellByColumnAndRow(2,$i)->getCalculatedValue();

            if ($nip != '') {
                array_push($data, [
                    'nip'           =>$nip,            
                    'nama_petugas'  =>$nama_petugas,           
                    'user'          =>$nip,            
                    'password'      =>md5($nip),            
                ]);
            }


        }

        $this->M_petugas->insert_multiple($data);
        // $this->M_petugas->dell2();

        unlink($filenya);

        $this->session->set_flashdata('sukses_tambah','1');
        redirect('petugas');

	}

    public function tambah()
    {
        $this->form_validation->set_rules('nip', 'NIP / NIGNP', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Gagal!</strong> NIP / NIGNP Tidak Boleh Kosong.</div>'
                    )
            );
        $this->form_validation->set_rules('nama', 'Nama Petugas', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Gagal!</strong> Nama Petugas Tidak Boleh Kosong.</div>'
                    )
            );

        //jika validasi gagal
        if ($this->form_validation->run() == FALSE) {
            $data['judul']  = "Petugas";
            $data['menu']   = "petugas";
            $data['petugas']   = $this->M_petugas->get_all()->result();
            $this->load->view('petugas/index', $data);
        }else{
            $this->M_petugas->tambah_proses();
            $this->session->set_flashdata('sukses_tambah','1');
            redirect('petugas','refresh');
        }
    }

    public function profil($id_petugas)
    {
        $data['judul']  = "Profil Petugas";
        $data['menu']   = "profil";
        $this->load->view('petugas/profil', $data);
    }

    public function edit($id_petugas)
    {
        $data['judul']  = "Petugas";
        $data['menu']   = "petugas";
        $data['petugas']= $this->M_petugas->get_by_id($id_petugas)->row_array();
        $this->load->view('petugas/edit', $data);
    }

    public function edit_pass($id_petugas)
    {
        $data['judul']  = "Petugas";
        $data['menu']   = "p";
        $this->load->view('petugas/edit_pass', $data);
    }

    public function edit_profil($id_petugas)
    {
        $this->form_validation->set_rules('nip', 'NIP / NIGNP', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Gagal!</strong> NIP / NIGNP Tidak Boleh Kosong.</div>'
                    )
            );
        $this->form_validation->set_rules('nama', 'Nama Petugas', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Gagal!</strong> Nama Petugas Tidak Boleh Kosong.</div>'
                    )
            );

        //jika validasi gagal
        if ($this->form_validation->run() == FALSE) {
            $data['judul']  = "Profil Petugas";
            $data['menu']   = "profil";
            $this->load->view('petugas/profil', $data);
        }else{
            $this->M_petugas->edit_proses($id_petugas);
            $this->session->set_flashdata('sukses_edit','1');
            redirect('petugas/profil/'.$id_petugas,'refresh');
        }
    }

    public function edit_proses($id_petugas)
    {
        $this->form_validation->set_rules('nip', 'NIP / NIGNP', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Gagal!</strong> NIP / NIGNP Tidak Boleh Kosong.</div>'
                    )
            );
        $this->form_validation->set_rules('nama', 'Nama Petugas', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Gagal!</strong> Nama Petugas Tidak Boleh Kosong.</div>'
                    )
            );

        //jika validasi gagal
        if ($this->form_validation->run() == FALSE) {
            $data['judul']  = "Petugas";
            $data['menu']   = "petugas";
            $data['petugas']= $this->M_petugas->get_by_id($id_petugas)->row_array();
            $this->load->view('petugas/edit', $data);
        }else{
            $this->M_petugas->edit_proses($id_petugas);
            $this->session->set_flashdata('sukses_edit','1');
            redirect('petugas','refresh');
        }
    }

    public function edit_pass_proses($id_petugas)
    {
        $this->form_validation->set_rules('password_baru', 'Password', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Error!</strong> Password Tidak Boleh Kosong.</div>'
                    )
            );
        $this->form_validation->set_rules('password_baru_k', 'Konfirmasi Password', 'required|matches[password_baru]|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Error!</strong> Konfirmasi Password Tidak Boleh Kosong.</div>',
                    'matches' => '<div class="alert alert-danger"><strong>Error!</strong> Password Tidak Sama.</div>',
                    )
            );

        //jika validasi gagal
        if ($this->form_validation->run() == FALSE) {
            $data['judul']  = "Petugas";
            $data['menu']   = "p";
            $this->load->view('petugas/edit_pass', $data);
        }else{
            $cek_nik        = $this->db->query("SELECT * FROM petugas WHERE id_petugas = '$id_petugas' ")->row_array();


            $pass_lama_in   = MD5($this->input->post('password'));
            $pass_baru      = MD5($this->input->post('password_baru'));

            if ($cek_nik['password'] == $pass_lama_in) {
                $data = array('password' => $pass_baru);

                $this->db->where('id_petugas', $id_petugas);
                $this->db->update('petugas', $data);

                $this->session->set_flashdata('sukses_edit','1');
                redirect('Petugas/edit_pass/'.$id_petugas);
            } else {
                $this->session->set_flashdata('gagal_edit','1');
                redirect('Petugas/edit_pass/'.$id_petugas);
            }
        }
    }

    public function hapus()
    {
        $id_petugas = $this->input->post('id_petugas');

        $this->db->where('id_petugas', $id_petugas);
        $this->db->delete('petugas');

        $this->session->set_flashdata('sukses_hapus','1');
        redirect('petugas','refresh');
    }

	public function data_server()
	{
		$this->load->library('Datatables');
        $this->datatables->select('id_petugas, nip, nama_petugas');
		$this->datatables->from('petugas');
		echo $this->datatables->generate();
	}

}

/* End of file petugas.php */
/* Location: ./application/controllers/petugas.php */ 