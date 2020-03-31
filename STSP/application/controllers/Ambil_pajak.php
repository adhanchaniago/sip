<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ambil_pajak extends CI_Controller {

	function __construct(){
		parent:: __construct();
		
		ceklogin();
		$this->load->Model(array('Model_pajak','Model_penjualan'));
		$this->load->helper(array('form','url'));
	}
	
	function view_pajak(){
		if(isset($_POST['submit'])){
			$this->Model_pajak->input_pajak();
		}else{
			$data['pajak'] = $this->Model_pajak->view_pajak();
			$this->template->load('template','Pajak/input_accpajak',$data);
		}
		
	}
	function view_tmp_pajak(){
		
		$data['pajak'] = $this->Model_pajak->view_pajak();
		$this->load->view('Pajak/view_accpajak',$data);
		
	}
	
	function input_pajak(){
		
			$data=$this->Model_pajak->input_pajak($nojual,$idpelanggan,$noreff,$tgl,$acp); //dihapus ,$disc2
			echo json_encode($data);
			
		}
		
		public function get_data() {    
			$keyword = $this->uri->segment(3);
			$data = $this->db->from('tb_penjualan')->like('no_jual',$keyword)->get();            
			
			foreach($data->result() as $row)
			{
				$arr['query'] = $keyword;
				$arr['suggestions'][] = array(
					'value'    		  =>$row->no_jual,
					'no_jual'    	  =>$row->no_jual,
					'id_pelanggan'    =>$row->id_pelanggan,
					'no_reff' 		  =>$row->no_reff
				);
			}
			echo json_encode($arr);
		}
		
		
	}
	?>