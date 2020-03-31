<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Giro extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->Model('Model_giro');
		
	}
	function input_giro(){
		if(isset($_POST['submit'])){
				//insert data
			$this->Model_giro->insert_giro();
			
		}else{
			$data['listgiro'] = $this->Model_giro->view_giro();

			$this->template->load('template','Giro/input_giro',$data);
		}
	}
	function cekgiro(){
		$no_giro	    = $this->input->get('no_giro');
		$cek 			= $this->db->query("SELECT * FROM tb_giro WHERE no_giro = '$no_giro' GROUP BY no_giro")->num_rows();
		echo $cek;

	}
	function hapus_Giro(){
		$id_giro = $this->uri->segment(3);
		$this->Model_giro->delete_Giro($id_giro);
		
		redirect('Giro/input_Giro');
	}
	function edit_giro(){
		if(isset($_POST['submit'])){
				//insert data
			$this->Model_giro->update_giro();
			redirect('Giro/input_giro');
		}else{		
			$data['d'] = $this->Model_giro->get()->row_array();
			$data['listgiro'] = $this->Model_giro->view_giro();
			$this->template->load('template','Giro/edit_giro',$data);
		}
	}
}
