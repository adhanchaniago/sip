<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gudang extends CI_Controller {

	function __construct(){
		parent:: __construct();
		
		ceklogin();
		$this->load->Model(array('Model_gudang'));
	}
	
	function input_gudang(){
		if(isset($_POST['submit'])){
				//insert data
			$this->Model_gudang->insert_gudang();
			
		}else{
			$data['listgudang'] = $this->Model_gudang->view_gudang();
			$this->template->load('template','Gudang/input_gudang',$data);
		}
	}
	
	function input_k_barang(){
		if(isset($_POST['submit'])){
				//insert data
			$this->Model_barang->insert_k_barang();
			
		}else{
			$data['list_k_barang'] = $this->Model_barang->view_k_barang();
			$this->template->load('template','Barang/input_k_barang',$data);
		}
	}

	function edit_gudang(){
		
		if(isset($_POST['submit'])){
				//insert data
			$this->Model_gudang->update_gudang();
			redirect('Gudang/input_gudang');
		}else{
			$data['d'] = $this->Model_gudang->get()->row_array();
			$data['listgudang'] = $this->Model_gudang->view_gudang();
			$this->template->load('template','Gudang/edit_gudang',$data);
			
		}
	}

	
}
