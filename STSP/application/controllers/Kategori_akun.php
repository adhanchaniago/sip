<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_akun extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->Model('Model_kategori_akun');
		ceklogin();
		
	}
	function input_kategori(){

		if(isset($_POST['submit'])){
				//insert data
			$this->Model_kategori_akun->insert_kategori();
			
		}else{
			$a = $this->Model_kategori_akun->getNomorterakhir()->row_array();
                            //Mengambil Tahun di Sistem
			$tahun    = date('y');
			$id       = ('KA');
			$id1       = ('-');
			$c = array('','I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII');
			$bln		= $c[date('n')];
			$format   = $tahun.$id.$id1.$bln;
			$data['autonumber'] 	= buatkode($a['kode_kategori'],$format,4);
			$data['listkategori'] = $this->Model_kategori_akun->view_kategori();
			$this->template->load('template','Kategori_akun/input_kategori',$data);
		}

	}
	function hapus_kategori(){
		$kode_kategori = $this->uri->segment(3);
		$this->Model_kategori_akun->delete_kategori($kode_kategori);
		
		redirect('Kategori_akun/input_kategori');

	}

	function edit_kategori(){
		
		if(isset($_POST['submit'])){
				//insert data
			$this->Model_kategori_akun->update_kategori();
			redirect('Kategori_akun/input_kategori');
		}else{		
			$data['d'] = $this->Model_kategori_akun->get()->row_array();
			$data['listkategori'] = $this->Model_kategori_akun->view_kategori();
			$this->template->load('template','Kategori_akun/edit_kategori',$data);
			
		}
	}



}
