<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Acc_pembayaran extends CI_Controller {

	function __construct(){
		parent:: __construct();
		ceklogin();
		$this->load->Model(array('Model_accpembayaran','Model_pembelian'));
		$this->load->helper(array('form','url'));
	}
	
	function view_accpembayaran(){
		if(isset($_POST['submit'])){
			$this->Model_accpembayaran->input_acc();
		}else{
			$data['acc'] = $this->Model_accpembayaran->view_acc();
			$this->template->load('template','Accpenerimaan/input_accpembayaran',$data);
		}
		
	}
	function ceknota(){
		$nobeli	        = $this->input->get('no_beli');
		$cek 			= $this->db->query("SELECT * FROM tb_pembelian WHERE no_beli = '$nobeli' GROUP BY no_beli")->num_rows();
		echo $cek;

	}
	function view_tmp_acc(){
		
		$data['acc'] = $this->Model_accpembayaran->view_acc();
		$this->load->view('Accpenerimaan/view_accpembayaran',$data);
		
	}
	function view_tmp_tidak_acc(){
		
		$data['tidak_acc'] = $this->Model_accpembayaran->view_tidak_acc();
		$this->load->view('Accpenerimaan/view_tidak_acc',$data);
		
	}
	
	function input_acc(){
		
			$data=$this->Model_accpembayaran->input_acc($nobeli,$idsupplier,$noroff,$tgl,$jam,$total,$acc); //dihapus ,$disc2
			echo json_encode($data);
			
		}
		
		public function get_data() {    
			$keyword = $this->uri->segment(3);
			$data = $this->db->from('tb_pembelian')->like('no_beli',$keyword)->where('sisa=0')->get();            
			
			foreach($data->result() as $row)
			{
				$arr['query'] = $keyword;
				$arr['suggestions'][] = array(
					'value'    		  =>$row->no_beli,
					'no_beli'    	  =>$row->no_beli,
					'id_supplier'     =>$row->id_supplier,
					'no_reff' 		  =>$row->no_reff,
					'total'    		  =>number_format($row->total,0,',','.'),
					'sisa'    		  =>number_format($row->sisa,0,',','.')
				);
			}
			echo json_encode($arr);
		}
		
		
	}
	?>