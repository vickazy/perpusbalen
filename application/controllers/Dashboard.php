<?php
class Dashboard extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        $this->load->library(array('form_validation'));

        $this->load->model('M_buku');
        $this->load->model('M_anggota');
        $this->load->model('M_peminjaman');

        if ($this->session->userdata('userdata') == null) {
            redirect('Login');
        }
    }
    
    function index(){

        $data['judul']  = "Dashboard";
        $data['menu']   = "home";
        $data['buku']   = $this->M_buku->get_all()->num_rows();
        $data['anggota']  = $this->M_anggota->get_all()->num_rows();
        $data['transaksi']  = $this->M_peminjaman->get_all()->num_rows();
        $data['jenis']  = $this->M_peminjaman->get_jenis()->result();
        $this->load->view('dashboard/index', $data);
    }
}