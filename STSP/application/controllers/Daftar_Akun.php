<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar_Akun extends CI_Controller {
	function __construct(){
		parent::__construct();
		ceklogin();
		$this->load->Model(array('Model_akun','Model_kategori_akun'));
	}
	function input_akun(){
		if(isset($_POST['submit'])){
				//insert data
			$this->Model_akun->insert_akun();
			
		}else{
			$a = $this->Model_akun->getNomorterakhir()->row_array();
                            //Mengambil Tahun di Sistem
			$tahun    = date('y');
			$id       = ('A');
			$id1       = ('-');
			$c = array('','I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII');
			$bln		= $c[date('n')];
			$format   = $tahun.$id.$id1.$bln;
			$data['autonumber'] 	= buatkode($a['kode_akun'],$format,4);
			$data['listakun'] = $this->Model_akun->view_akun();
			$data['listkategori'] = $this->Model_kategori_akun->view_kategori();

			$this->template->load('template','Daftar_akun/input_akun',$data);
		}
	}
	function hapus_akun(){
		$kode_akun = $this->uri->segment(3);
		$this->Model_akun->delete_akun($kode_akun);
		
		redirect('Daftar_akun/input_akun');
	}
	function edit_akun(){
		if(isset($_POST['submit'])){
				//insert data
			$this->Model_akun->update_akun();
			redirect('Daftar_Akun/input_akun');
		}else{		
			$data['f'] = $this->Model_akun->get()->row_array();
			$data['listkategori'] = $this->Model_kategori_akun->view_kategori();
			$data['listakun'] = $this->Model_akun->view_akun();
			$this->template->load('template','Daftar_akun/edit_akun',$data);
		}
	}
}
