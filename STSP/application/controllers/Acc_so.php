<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Acc_so extends CI_Controller {

	function __construct(){
		parent:: __construct();
		
		$this->load->Model(array('Model_acc_so','Model_penjualan'));
		$this->load->helper(array('form','url'));
	}
	
	function view_acc(){
		if(isset($_POST['submit'])){
			$this->Model_acc_so->input_acc();
		}else{
			$data['acc'] = $this->Model_acc_so->view_acc();
			$this->template->load('template','AccSO/input_acc',$data);
		}
		
	}
	function ceknota(){
		$no_jual	    = $this->input->get('no_jual');
		$cek 			= $this->db->query("SELECT *,tb_penjualan.no_reff as no_roff FROM tb_penjualan INNER JOIN tb_pelanggan ON tb_penjualan.id_pelanggan = tb_pelanggan.id_pelanggan WHERE no_jual = '$no_jual' GROUP BY no_jual")->num_rows();
		echo $cek;

	}
	function view_tmp_acc(){
		
		$data['acc'] = $this->Model_acc_so->view_acc();
		$this->load->view('AccSO/view_acc',$data);
		
	}
	function view_tmp_tidak_acc(){
		
		$data['tidak_acc'] = $this->Model_acc_so->view_tidak_acc();
		$this->load->view('AccSO/view_tidak_acc',$data);
		
	}
	function input_acc(){
		
			$data=$this->Model_acc_so->input_acc($nojual,$idpelanggan,$noreff,$tgl,$jam,$acc); //dihapus ,$disc2
			echo json_encode($data);
			
		}
		
		public function get_data() {    
			$keyword = $this->uri->segment(3);
			$data = $this->db->from('tb_penjualan')->like('no_reff',$keyword)->where('sisa<=0')->get();            
			
			foreach($data->result() as $row)
			{
				$arr['query'] = $keyword;
				$arr['suggestions'][] = array(
					'value'    		  =>$row->no_jual,
					'no_jualan'    	  =>$row->no_jual,
					'no_jual'      	  =>$row->no_jual,
					'id_pelanggan'    =>$row->id_pelanggan,
					'no_reff' 		  =>$row->no_reff,
				);
			}
			echo json_encode($arr);
		}
		
		
	}
	?>