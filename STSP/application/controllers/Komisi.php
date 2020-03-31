<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Komisi extends CI_Controller {

	function __construct(){
		parent::__construct();
		
		$this->load->Model(array('Model_komisi','Model_barang','Model_kategori','Model_sales'));
		ceklogin();
		
	}
	function input_komisi(){

		if(isset($_POST['submit'])){
				//insert data
			$this->Model_komisi->insert_komisi();
		}else{
			$a = $this->Model_komisi->getlastnumberm()->row_array();
			$tahun    = date('y');
			$id       = ('KM');
			$id1       = ('-');
			$format   = $tahun.$id.$id1;
			$data['akhir'] 	= buatkode($a['id_komisi'],$format,4);
			$data['list_k_barang'] = $this->Model_barang->view_barang();
			$data['list_kategori'] = $this->Model_kategori->view_kategori();                                                                                                                               
			$data['listsales'] = $this->Model_sales->view_sales();
			$data['listkomisi'] = $this->Model_komisi->view_komisi();
			$this->template->load('template','Komisi/input_komisi',$data);
		}

	}

	function hapus_komisi(){

		$id_komisi = $this->uri->segment(3);
		$this->Model_komisi->delete_komisi($id_komisi);
		
		redirect('Komisi/input_komisi');

	}

	function edit_komisi(){
		
		if(isset($_POST['submit'])){
				//insert data
			$this->Model_komisi->update_komisi();
			redirect('Komisi/input_komisi');
		}else{		
			$data['d'] = $this->Model_komisi->get()->row_array();
			$data['list_k_barang'] = $this->Model_barang->view_k_barang();
			$data['list_kategori'] = $this->Model_kategori->view_kategori();                                                                                                                               
			$data['listsales'] = $this->Model_sales->view_sales();
			$data['listkomisi'] = $this->Model_komisi->view_komisi();
			$this->template->load('template','Komisi/edit_komisi',$data);
			
			
			
		}
	}



}
