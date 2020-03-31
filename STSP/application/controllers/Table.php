<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Table extends CI_Controller {

	function __construct(){
		parent:: __construct();
		
		ceklogin();
		$this->load->Model(array('Model_acc','Model_penjualan'));
		$this->load->helper(array('form','url'));
	}
	
	function view_table(){
		
		$this->template->load('Template','DataTable/DataTable');
		
	}
	
	
}
?>