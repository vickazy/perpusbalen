<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Buku extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model('M_buku');
		$this->load->model('M_jenis');
		$this->load->library('PHPExcel');
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

        $sheet          = $Object->setActiveSheetIndex(1); //1 adalah nomor sheetnya
        $highestRow     = $Object->setActiveSheetIndex(1)->getHighestRow();
        $highestColumn  = $Object->setActiveSheetIndex(1)->getHighestColumn();

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
                'id_jenis' 	    =>$this->input->post('id_jenis')    
            ]);

        }

        $this->M_buku->insert_multiple($data);
        // $this->M_buku->dell2();

        unlink($filenya);

        $this->session->set_flashdata('sukses_tambah','1');
        redirect('Buku');

	}

	public function data_server()
	{
		$this->load->library('Datatables');
        $this->datatables->select('kode_buku, judul, tanggal, no_inventaris, jenis.jumlah');
        $this->datatables->join('jenis', 'buku.id_jenis = jenis.id_jenis');
		$this->datatables->from('buku');
		echo $this->datatables->generate();
	}

}

/* End of file Buku.php */
/* Location: ./application/controllers/Buku.php */ 