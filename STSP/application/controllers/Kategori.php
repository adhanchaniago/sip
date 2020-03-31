<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->Model('Model_kategori');
		ceklogin();
		
	}
	function input_kategori(){

		if(isset($_POST['submit'])){
				//insert data
			$this->Model_kategori->insert_kategori();
			
		}else{
			$data['listkategori'] = $this->Model_kategori->view_kategori();
			$this->template->load('template','Kategori/input_kategori',$data);
		}

	}
	function hapus_kategori(){
		$id_kategori = $this->uri->segment(3);
		$this->Model_kategori->delete_kategori($id_kategori);
		
		redirect('Kategori/input_k_skategori');

	}

	function edit_kategori(){
		
		if(isset($_POST['submit'])){
				//insert data
			$this->Model_kategori->update_kategori();
			redirect('Kategori/input_kategori');
		}else{		
			$data['d'] = $this->Model_kategori->get()->row_array();
			$data['listkategori'] = $this->Model_kategori->view_kategori();
			$this->template->load('template','Kategori/edit_kategori',$data);
			
		}
	}



}
