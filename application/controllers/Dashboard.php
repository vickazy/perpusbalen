<?php
class Dashboard extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        $this->load->library(array('form_validation'));
        
    }
    
    function index(){
        $data['judul']  = "Dashboard";
        $data['menu']   = "home";
        $data['buku']   = 1;
        $data['siswa']  = 2;
        $this->load->view('dashboard/index', $data);
    }
}