<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Satuan extends CI_Controller {
	function __construct(){
		parent::__construct();
		ceklogin();
		$this->load->Model('Model_satuan');
	}
	function input_satuan(){
		if(isset($_POST['submit'])){
				//insert data
			$this->Model_satuan->insert_satuan();
			
		}else{
			$data['listsatuan'] = $this->Model_satuan->view_satuan();

			$this->template->load('template','Satuan/input_satuan',$data);
		}
	}
	function hapus_satuan(){
		$id_satuan = $this->uri->segment(3);
		$this->Model_satuan->delete_satuan($id_satuan);
		
		redirect('Satuan/input_satuan');
	}
	function edit_satuan(){
		if(isset($_POST['submit'])){
				//insert data
			$this->Model_satuan->update_satuan();
			redirect('Satuan/input_satuan');
		}else{		
			$data['d'] = $this->Model_satuan->get()->row_array();
			$data['listsatuan'] = $this->Model_satuan->view_satuan();
			$this->template->load('template','Satuan/edit_satuan',$data);
		}
	}
}
