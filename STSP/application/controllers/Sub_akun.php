<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sub_Akun extends CI_Controller {
	function __construct(){
		parent::__construct();
		ceklogin();
		$this->load->Model(array('Model_sub','Model_akun'));
	}
	function input_sub_akun(){
		if(isset($_POST['submit'])){
				//insert data
			$this->Model_sub->insert_sub();
			
		}else{
			
			
			$data['listakun'] = $this->Model_akun->view_akun();
			$data['listsub'] = $this->Model_sub->view_sub();

			$this->template->load('template','Sub_akun/input_sub_akun',$data);
		}
	}
	function hapus_akun(){
		$kode_subakun = $this->uri->segment(3);
		$this->Model_sub->delete_akun($kode_subakun);
		
		redirect('Sub_akun/input_sub_akun');
	}
	function edit_sub_akun(){
		if(isset($_POST['submit'])){
				//insert data
			$this->Model_sub->update_sub();
			redirect('Sub_Akun/input_sub_akun');
		}else{		
			$data['f'] = $this->Model_sub->get()->row_array();
			$data['listakun'] = $this->Model_akun->view_akun();
			$data['listsub'] = $this->Model_sub->view_sub();
			$this->template->load('template','Sub_akun/edit_sub_akun',$data);
		}
	}
}
