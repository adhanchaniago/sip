<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Acc_ps extends CI_Controller {

	function __construct(){
		parent:: __construct();
		ceklogin();
		
		$this->load->Model(array('Model_accps','Model_penjualan_sample'));
		$this->load->helper(array('form','url'));
	}
	
	function view_acc(){
		if(isset($_POST['submit'])){
			$this->Model_accps->input_acc();
		}else{
			$data['acc'] = $this->Model_accps->view_acc();
			$this->template->load('template','AccPS/input_acc',$data);
		}
		
	}
	function view_tmp_acc(){
		
		$data['acc'] = $this->Model_accps->view_acc();
		$this->load->view('AccPS/view_acc',$data);
		
	}
	
	function input_acc(){
		
			$data=$this->Model_accps->input_acc($nosample,$idpelanggan,$noroff,$tgl,$jam,$total,$acc); //dihapus ,$disc2
			echo json_encode($data);
			
		}
		
		public function get_data() {    
			$keyword = $this->uri->segment(3);
			$data = $this->db->from('tb_penjualan_sample')->like('no_sample',$keyword)->where('sisa=0')->get();            
			
			foreach($data->result() as $row)
			{
				$arr['query'] = $keyword;
				$arr['suggestions'][] = array(
					'value'    		  =>$row->no_sample,
					'no_sample'    	  =>$row->no_sample,
					'id_pelanggan'    =>$row->id_pelanggan,
					'no_reff' 		  =>$row->no_reff,
					'total'    		  =>number_format($row->total,0,',','.'),
					'sisa'    		  =>number_format($row->sisa,0,',','.')
				);
			}
			echo json_encode($arr);
		}
		
		
	}
	?>