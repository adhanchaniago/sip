<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct(){
		parent:: __construct();
		ceklogin();
		
		$this->load->Model('Model_pelanggan');
		$this->load->helper(array('form','url'));
	}
	
	function index()
	{
		//$x['data']=$this->Model_absen->get_data_stok();
		$this->template->load('template','welcome_message');
	}
	
	function view_kasbon(){
		$data['kasbon'] = $this->Model_kasbon->view_kasbon();
		$this->template->load('template','welcome_message');	
		
		
	}
}
