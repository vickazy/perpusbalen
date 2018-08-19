<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class jenis extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model('M_jenis');
		$this->load->library('PHPExcel');

        if ($this->session->userdata('userdata') == null) {
            redirect('Login');
        }
	}

	public function index()
	{
		$data['judul'] 	= "Jenis Buku";
		$data['menu'] 	= "jenis";
        $data['jenis']   = $this->M_jenis->get_all()->result();
		$this->load->view('jenis/index', $data);
	}

    public function tambah()
    {
        $this->form_validation->set_rules('jenis_buku', 'Jenis', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Gagal!</strong> Jenis Tidak Boleh Kosong.</div>'
                    )
            );

        //jika validasi gagal
        if ($this->form_validation->run() == FALSE) {
            $data['judul']  = "Jenis Buku";
            $data['menu']   = "jenis";
            $data['jenis']   = $this->M_jenis->get_all()->result();
            $this->load->view('jenis/index', $data);
        }else{
            $this->M_jenis->tambah_proses();
            $this->session->set_flashdata('sukses_tambah','1');
            redirect('jenis','refresh');
        }
    }

    public function edit($id_jenis)
    {
        $data['judul']  = "Jenis Buku";
        $data['menu']   = "jenis";
        $data['jenis']= $this->M_jenis->get_by_id($id_jenis)->row_array();
        $this->load->view('jenis/edit', $data);
    }

    public function edit_proses($id_jenis)
    {
        $this->form_validation->set_rules('jenis_buku', 'Jenis', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Gagal!</strong> Jenis Tidak Boleh Kosong.</div>'
                    )
            );

        //jika validasi gagal
        if ($this->form_validation->run() == FALSE) {
            $data['judul']  = "Jenis Buku";
            $data['menu']   = "jenis";
            $data['jenis']= $this->M_jenis->get_by_id($id_jenis)->row_array();
            $this->load->view('jenis/edit', $data);
        }else{
            $this->M_jenis->edit_proses($id_jenis);
            $this->session->set_flashdata('sukses_edit','1');
            redirect('jenis','refresh');
        }
    }

    public function hapus()
    {
        $id_jenis = $this->input->post('id_jenis');

        $this->db->where('id_jenis', $id_jenis);
        $this->db->delete('jenis');

        $this->session->set_flashdata('sukses_hapus','1');
        redirect('jenis','refresh');
    }

	public function data_server()
	{
		$this->load->library('Datatables');
        $this->datatables->select('id_jenis, jenis_buku');
		$this->datatables->from('jenis');
		echo $this->datatables->generate();
	}

}

/* End of file jenis.php */
/* Location: ./application/controllers/jenis.php */ 