<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sales extends CI_Controller {

	function __construct(){
		parent::__construct();
		ceklogin();
		$this->load->Model('Model_sales');
		
	}
	function view_sales(){
		$data['listsales'] = $this->Model_sales->view_sales();
		$this->template->load('template','Sales/view_sales',$data);
	}
	function cetak_sales(){
		$data['d'] = $this->Model_sales->get_cetak()->row_array();
		$this->load->view('Sales/cetak',$data);
	}
	function cetak_sales_seluruh(){
		$this->load->view('Sales/cetak_seluruh');
	}
	function reset_sales(){
		$this->Model_sales->reset_sales();
		redirect('Sales/view_sales');
	}
	function input_sales(){

		if(isset($_POST['submit'])){
			$this->Model_sales->input_sales();
			
		}else{
			$a = $this->Model_sales->getNomorterakhir()->row_array();
			$id2       = ('');
			$format3   = $id2;
			$data['autonumber'] 	= buatkode($a['kode_sales'],$format3,'3');
			$data['listsales'] = $this->Model_sales->view_sales();

			$this->template->load('template','Sales/input_sales',$data);
		}

	}
	function hapus_kategori(){

		$id_kategori = $this->uri->segment(3);
		$this->Model_kategori->delete_kategori($id_kategori);
		
		redirect('Kategori/input_kategori');

	}

	function edit_sales(){
		
		if(isset($_POST['submit'])){
				//insert data
			$this->Model_sales->update_sales();
			redirect('Sales/view_sales');
		}else{		
			$data['d'] = $this->Model_sales->get()->row_array();
			$data['listsales'] = $this->Model_sales->view_sales();
			$this->template->load('template','Sales/edit_sales',$data);
			
		}
	}



}
