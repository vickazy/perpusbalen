<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_login');
	}

	public function index()
	{
		if ($this->session->userdata('userdata') !== null) {
			redirect('Dashboard');
		}
		$data['judul']	= 'LOGIN';
		$this->load->view('login/login', $data);
	}

	public function proses()
	{
		$u = $this->input->post('username');
		$p = md5($this->input->post('password'));

		$this->form_validation->set_rules('username', 'Username', 'required|trim',
				array(
					'required' => '<div class="alert alert-danger">Username Tidak Boleh Kosong.</div>'
					)
			);
		$this->form_validation->set_rules('password', 'Password', 'required|trim',
				array(
					'required' => '<div class="alert alert-danger">Password Tidak Boleh Kosong.</div>'
					)
			);

		if ($this->form_validation->run() == FALSE) {
			$data['judul'] = "LOGIN";
			$this->load->view('login/login', $data);
		}else{
			$cek = $this->M_login->cek_login($u, $p)->num_rows();
			$cek1 = $this->M_login->cek_login($u, $p)->row_array();

			if ($cek > 0) {
				$session['id_petugas'] 	= $cek1['id_petugas'];
				$session['user'] 		= $cek1['user'];
				$session['password'] 		= $cek1['password'];
				$this->session->set_userdata('userdata',$session);
				redirect('Dashboard');
			} else {
				$this->session->set_flashdata('gagal_login', 1);
				redirect('Login');
			}
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('Login');
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */ 