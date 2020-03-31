<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Acc_sj extends CI_Controller {

	function __construct(){
		parent:: __construct();
		
		ceklogin();
		$this->load->Model(array('Model_acc_sj','Model_penjualan'));
		$this->load->helper(array('form','url'));
	}
	
	function view_acc(){
		if(isset($_POST['submit'])){
			$this->Model_acc_sj->input_acc();
		}else{
			$data['acc'] = $this->Model_acc_sj->view_acc();
			$this->template->load('template','Accsj/input_acc',$data);
		}
		
	}
	function ceknota(){
		$no_sj	        = $this->input->get('no_sj');
		$cek 			= $this->db->query("SELECT * FROM tb_kirim INNER JOIN tb_pelanggan ON tb_kirim.id_pelanggan = tb_pelanggan.id_pelanggan WHERE no_kirim = '$no_sj' GROUP BY no_kirim")->num_rows();
		echo $cek;

	}
	function view_tmp_acc(){
		
		$data['acc'] = $this->Model_acc_sj->view_acc();
		$this->load->view('Accsj/view_acc',$data);
		
	}
	function view_tmp_tidak_acc(){
		
		$data['tidak_acc'] = $this->Model_acc_sj->view_tidak_acc();
		$this->load->view('Accsj/view_tidak_acc',$data);
		
	}
	function input_acc(){
		
			$data=$this->Model_acc_sj->input_acc($nosj,$idpelanggan,$noreff,$tgl,$jam,$total,$acc); //dihapus ,$disc2
			echo json_encode($data);
			
		}
		
		public function get_data() {    
			$keyword = $this->uri->segment(3);
			$data = $this->db->from('tb_kirim')->like('no_kirim',$keyword)->get();            
			
			foreach($data->result() as $row)
			{
				$arr['query'] = $keyword;
				$arr['suggestions'][] = array(
					'value'    		  =>$row->no_kirim,
					'no_sj'    	  	  =>$row->no_kirim,
					'id_pelanggan'    =>$row->id_pelanggan,
					'no_reff_sj' 	  =>$row->no_reff_sj,
				);
			}
			echo json_encode($arr);
		}
		
		
	}
	?>