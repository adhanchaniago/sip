<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mata_uang extends CI_Controller {
	function __construct(){
		parent::__construct();
		ceklogin();
		$this->load->Model('Model_mata_uang');
	}
	function input_mata_uang(){
		if(isset($_POST['submit'])){
				//insert data
			$this->Model_mata_uang->insert_mata_uang();
			
		}else{
			$data['listmatauang'] = $this->Model_mata_uang->view_mata_uang();

			$this->template->load('template','Mata_uang/input_mata_uang',$data);
		}
	}
	function hapus_mata_uang(){
		$kode_mata_uang = $this->uri->segment(3);
		$this->Model_mata_uang->delete_mata_uang($kode_mata_uang);
		
		redirect('Mata_uang/input_mata_uang');
	}
	function edit_mata_uang(){
		if(isset($_POST['submit'])){
				//insert data
			$this->Model_mata_uang->update_mata_uang();
			redirect('Mata_uang/input_mata_uang');
		}else{		
			$data['d'] = $this->Model_mata_uang->get()->row_array();
			$data['listmatauang'] = $this->Model_mata_uang->view_mata_uang();
			$this->template->load('template','Mata_uang/edit_mata_uang',$data);
		}
	}
}
