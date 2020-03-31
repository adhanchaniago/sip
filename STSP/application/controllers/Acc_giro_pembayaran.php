<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Acc_giro_pembayaran extends CI_Controller {

	function __construct(){
		parent:: __construct();
		ceklogin();
		$this->load->Model(array('Model_acc_giro_pembayaran','Model_penjualan'));
		$this->load->helper(array('form','url'));
	}
	
	function view_acc_giro(){
		if(isset($_POST['submit'])){
			$this->Model_acc_giro_pembayaran->input_acc();
		}else{
			$data['acc'] = $this->Model_acc_giro_pembayaran->view_acc();
			$this->template->load('template','Acc_giro_pembayaran/input_acc',$data);
		}

	}
	function ceknota(){
		$no_bukti	    = $this->input->get('no_jual');
		$cek 			= $this->db->query("SELECT * FROM tb_penerimaan WHERE no_bukti = '$no_bukti' GROUP BY no_bukti")->num_rows();
		echo $cek;

	}

	function view_tmp_acc(){

		$data['acc'] 	= $this->Model_acc_giro_pembayaran->view_acc();
		$this->load->view('Acc_giro_pembayaran/view_acc',$data);

	}

	function view_tmp_belum_acc(){

		$data['belumacc'] = $this->Model_acc_giro_pembayaran->view_belum_acc();
		$this->load->view('Acc_giro_pembayaran/view_belum_acc',$data);

	}
	
	function input_acc(){
		
		$data=$this->Model_acc_giro_pembayaran->input_acc($nojual,$idsupplier,$tgl,$jam,$totalan,$acc);
			 //dihapus ,$disc2
		echo json_encode($data);

	}

	public function get_data() {    
		$keyword = $this->uri->segment(3);
		$data = $this->db->from('tb_penerimaan')->like('right(no_bukti,4)',$keyword)->where('giro>0')->get();            

		foreach($data->result() as $row)
		{
			$arr['query'] = $keyword;
			$arr['suggestions'][] = array(
				'value'    		  =>$row->no_bukti,
				'no_bukti'    	  =>$row->no_bukti,
				'id_supplier'     =>$row->id_supplier,
				'giro'    	  	  =>number_format($row->giro,0,',','.')
			);
		}
		echo json_encode($arr);
	}

	
}
?>