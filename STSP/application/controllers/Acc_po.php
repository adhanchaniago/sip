<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Acc_po extends CI_Controller {

	function __construct(){
		parent:: __construct();
		ceklogin();

		$this->load->Model(array('Model_accpo','Model_pembelian'));
		$this->load->helper(array('form','url'));
	}
	
	function view_acc(){
		if(isset($_POST['submit'])){
			$this->Model_accpo->input_acc();
		}else{
			$data['acc'] = $this->Model_accpo->view_acc();
			$this->template->load('template','Accpo/input_acc',$data);
		}

	}
	function ceknota(){
		$nobeli	        = $this->input->get('no_beli');
		$cek 			= $this->db->query("SELECT *,tb_pembelianpo.no_reff as no_reff FROM tb_pembelianpo
		INNER JOIN tb_supplier ON tb_supplier.id_supplier = tb_pembelianpo.id_supplier WHERE no_beli = '$nobeli' GROUP BY no_beli")->num_rows();
		echo $cek;

	}
	function view_tmp_acc(){

		$data['acc'] = $this->Model_accpo->view_acc();
		$this->load->view('Accpo/view_acc',$data);

	}

	function view_tmp_belum_acc(){

		$data['belumacc'] = $this->Model_accpo->view_belum_acc();
		$this->load->view('Accpo/view_belum_acc',$data);

	}
	
	function input_acc(){
		
			$data=$this->Model_accpo->input_acc($nopo,$idsupplier,$noreff,$tgl,$jam,$acc); //dihapus ,$disc2
			echo json_encode($data);

		}

		public function get_data() {    
			$keyword = $this->uri->segment(3);
			$data = $this->db->from('tb_pembelianpo')->like('no_beli',$keyword)->get();            

			foreach($data->result() as $row)
			{
				$arr['query'] = $keyword;
				$arr['suggestions'][] = array(
					'value'    		  =>$row->no_beli,
					'no_beli'    	  =>$row->no_beli,
					'id_supplier'     =>$row->id_supplier,
					'no_reff'      	  =>$row->no_reff,
				);
			}
			echo json_encode($arr);
		}

		
	}
	?>