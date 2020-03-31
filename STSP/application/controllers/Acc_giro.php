<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Acc_giro extends CI_Controller {

	function __construct(){
		parent:: __construct();
		ceklogin();
		$this->load->Model(array('Model_acc_giro','Model_penjualan'));
		$this->load->helper(array('form','url'));
	}
	
	function view_acc_giro(){
		if(isset($_POST['submit'])){
			$this->Model_acc_giro->input_acc_giro();
		}else{
			$data['acc'] = $this->Model_acc_giro->view_acc_giro();
			$this->template->load('template','Acc_giro/input_acc_giro',$data);
		}

	}
	function ceknota(){
		$no_bukti	    = $this->input->get('no_jual');
		$cek 			= $this->db->query("SELECT * FROM tb_pembayaran WHERE no_bukti = '$no_bukti' GROUP BY no_bukti")->num_rows();
		echo $cek;

	}

	function view_tmp_acc_giro(){

		$data['acc'] = $this->Model_acc_giro->view_acc_giro();
		$this->load->view('Acc_giro/view_acc_giro',$data);

	}

	function view_tmp_belum_acc_giro(){

		$data['belumacc'] = $this->Model_acc_giro->view_belum_acc_giro();
		$this->load->view('Acc_giro/view_belum_acc_giro',$data);

	}
	
	function input_acc_giro(){
		
		$data=$this->Model_acc_giro->input_acc_giro($nojual,$idpelanggan,$tgl,$jam,$totalan,$acc);
			 //dihapus ,$disc2
		echo json_encode($data);

	}

	public function get_data() {    
		$keyword = $this->uri->segment(3);
		$data = $this->db->from('tb_pembayaran')->like('right(no_bukti,4)',$keyword)->where('giro>0')->get();            

		foreach($data->result() as $row)
		{
			$arr['query'] = $keyword;
			$arr['suggestions'][] = array(
				'value'    		  =>$row->no_bukti,
				'no_bukti'    	  =>$row->no_bukti,
				'id_pelanggan'    =>$row->id_pelanggan,
				'totalan'    	  =>number_format($row->totalan,0,',','.')
			);
		}
		echo json_encode($arr);
	}

	
}
?>