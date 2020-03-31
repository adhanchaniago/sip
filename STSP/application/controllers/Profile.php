<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	function __construct(){
		parent:: __construct();
		
		ceklogin();
		$this->load->Model(array('Model_profile'));
	}
	
	function input_profile(){
		if(isset($_POST['submit'])){
				//insert data
			$this->Model_profile->insert_profile();
			
		}else{
			$data['listprofile'] = $this->Model_profile->view_profile();
			$this->template->load('template','Profile/input_profile',$data);
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

	function edit_profile(){
		
		if(isset($_POST['submit'])){
				//insert data
			$this->Model_profile->update_profile();
			redirect('Profile/input_profile');
		}else{
			$data['d'] = $this->Model_profile->get()->row_array();
			$data['listprofile'] = $this->Model_profile->view_profile();
			$this->template->load('template','Profile/edit_profile',$data);
			
		}
	}

	
}
