<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Acc extends CI_Controller {

	function __construct(){
		parent:: __construct();
		ceklogin();
		$this->load->Model(array('Model_acc','Model_penjualan'));
		$this->load->helper(array('form','url'));
	}
	
	function view_acc(){
		if(isset($_POST['submit'])){
			$this->Model_acc->input_acc();
		}else{
			$data['acc'] = $this->Model_acc->view_acc();
			$this->template->load('template','Acc/input_acc',$data);
		}

	}
	
	function ceknota(){
		$no_jual	    = $this->input->get('no_jual');
		$cek 			= $this->db->query("SELECT * FROM tb_penjualans WHERE no_jual = '$no_jual' GROUP BY no_jual")->num_rows();
		echo $cek;

	}
	
	function view_tmp_acc(){

		$data['acc'] = $this->Model_acc->view_acc();
		$this->load->view('Acc/view_acc',$data);

	}

	function view_tmp_belum_acc(){

		$data['belumacc'] = $this->Model_acc->view_belum_acc();
		$this->load->view('Acc/view_belum_acc',$data);

	}
	
	function input_acc(){
		
		$data=$this->Model_acc->input_acc($nojual,$idpelanggan,$noroff,$tgl,$jam,$total,$acc);
			 //dihapus ,$disc2
		echo json_encode($data);

	}

	function cekacc(){
		$no_jual	    = $this->input->get('no_jual');
		$cek 			= $this->db->query("SELECT * FROM tb_acc WHERE no_jual = '$no_jual' AND acc != 0 ")->num_rows();
		echo $cek;

	}

	public function get_data() {    
		$keyword = $this->uri->segment(3);
		$data = $this->db->from('tb_penjualans')->like('no_jual',$keyword)->where('sisa=0')->get();            

		foreach($data->result() as $row)
		{
			$arr['query'] = $keyword;
			$arr['suggestions'][] = array(
				'value'    		  =>$row->no_jual,
				'no_jual'    	  =>$row->no_jual,
				'id_pelanggan'    =>$row->id_pelanggan,
				'id_sales'    	  =>$row->id_sales,
				'acc1'	 		  =>$row->acc,
				'no_reff' 		  =>$row->no_reff,
				'total'    		  =>$row->total,
				'total_komisi'    =>$row->total_komisi,
				'sisa'    		  =>number_format($row->sisa,0,',','.')
			);
		}
		echo json_encode($arr);
	}

	
}
?>