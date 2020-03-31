<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penerimaan_sample extends CI_Controller {

	function __construct(){
		parent:: __construct();
		
		ceklogin();
		$this->load->Model('Model_penerimaan_sample');
		$this->load->Model(array('Model_pelanggan','Model_penerimaan_sample','Model_penjualan_sample'));
			//$this->load->helper(array('form','url'));
	}
	function looping_cetak(){
		
		$id = $this->input->post('no_bukti');
		$data['cetak'] = $this->Model_penerimaan_sample->looping_cetak($id);
		$data['cetak1'] = $this->Model_penerimaan_sample->view_cetak($id);
		$this->load->view('Penerimaan_sample/print',$data);
		
	}
	function update_cetak(){
		if(isset($_POST['submit'])){	
			$no_bukti = $this->input->post('no_bukti');
			$alasan_cetak = $this->input->post('alasan_cetak');
			$cetak = $this->input->post('cetak');
			$looping_cetak = $this->db->get_where('tb_penerimaan_sample',array('no_bukti'=>$no_bukti))->row_array();
			$cetakan = $looping_cetak['cetak'];
			if($cetakan > 2){
				$this->session->set_flashdata("message","<script> alert('Oops.. Gak Bisa Ngeprint Lagi')</script>");
				redirect('Penerimaan_sample/view_penerimaan');
			}else{
				$data = array(
					'no_bukti'    => $no_bukti,
					'alasan_cetak' => $alasan_cetak,
					'cetak' 	   => $cetak,
				);
				$this->db->insert('cetak_ps',$data);
				$this->db->query("UPDATE tb_penerimaan_sample SET cetak = cetak + '$cetak' WHERE no_bukti = '$no_bukti'");
			}
			redirect('Penerimaan_sample/cetak_struk/'.$no_bukti);
		}
		
	}
	function input_penerimaan(){
		if(isset($_POST['submit'])){
			$this->Model_penerimaan_sample->insert_pembayaran();
		}if(isset($_POST['submit2'])){
			$this->Model_penerimaan_sample->insert_cetak_pembayaran();
			
		}else{
			$a = $this->Model_penerimaan_sample->getNomorterakhir()->row_array();
                            //Mengambil Tahun di Sistem
			$tahun    = date('y');
			$id       = ('PS');
			$id1       = ('-');
			$c = array('','I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII');
			$bln		= $c[date('n')];
			$format   = $tahun.$id.$id1.$bln;
			$data['autonumber'] 	= buatkode($a['no_bukti'],$format,4);
			$data['listpelanggan']  = $this->Model_pelanggan->view_pelanggan();
			$data['p'] 				= $this->Model_penerimaan_sample->get_penerimaan()->row_array();
			$this->template->load('template','Penerimaan_sample/input_penerimaan',$data);
		}
	}
	function cetak_struk(){	
		$data['d'] = $this->Model_penerimaan_sample->get()->row_array();
		$this->load->view('Penerimaan_sample/cetak',$data);
		
	}
	function view_penerimaan(){
		$data['listpelanggan']  = $this->Model_pelanggan->view_pelanggan();
		$data['penerimaan'] = $this->Model_penerimaan_sample->view_penerimaan();
		$this->template->load('template','Penerimaan_sample/view_penerimaan',$data);
		
	}
	function input_detail_pembayaran(){
		
			$data=$this->Model_penerimaan_sample->input_detail_pembayaran($nosample,$idpelanggan,$noreff,$total,$sisabayar,$bayar); //dihapus ,$disc2
			echo json_encode($data);
			
		}
		function reset(){
			$user = $this->session->userdata('username');
			$query = "delete from tb_penerimaan_sample_tmp where user = '$user'";
			$this->db->query($query);
			redirect('Penerimaan_sample/view_penerimaan');
		}
		function view_detail_pembayaran(){
			
			$data['list_pembayaran'] = $this->Model_penerimaan_sample->view_detail_pembayaran();
			$this->load->view('Penerimaan_sample/pembayaran_tmp',$data);
			
		}
		function view_detail_pembayaran2(){
			$data['list_tmp'] = $this->Model_penerimaan_sample->view_detail_pembayaran();
			$this->load->view('Penerimaan_sample/data_tmp_tt',$data);
			
		}
		function view_detail_pembayaran3(){
			$data['list_tmp'] = $this->Model_penerimaan_sample->view_detail_pembayaran();
			$this->load->view('Penerimaan_sample/p_walk1',$data);
			
		}
		function data_pn(){
			$id = $this->input->post('no_bukti');
			$data['listdetail'] = $this->Model_penerimaan_sample->data_pn($id);
			$this->load->view('Penerimaan_sample/data_detail',$data);
			
		}
		public function destroy($no_sample,$user)
		{
			$data=$this->Model_penerimaan_sample->delete($user,$no_sample);
		//$this->db->query("UPDATE tb_pembayaran_tmp SET sisa_bayar = sisa_bayar + bayar WHERE no_jual = '$no_jual'");
			$data = ['success'=>200];

			echo json_encode($data);
		}
		function get_data() { 
			$this->load->model('Model_penerimaan_sample');
			$keyword = $this->uri->segment(3);
			$data = $this->db->from('tb_penjualan_sample')->like('no_sample',$keyword)->where('sisa > 0')->get();            
			
			foreach($data->result() as $row)
			{
				$arr['query'] = $keyword;
				$arr['suggestions'][] = array(
					'value'    		  =>$row->no_sample.'/'.$row->id_pelanggan.'/'.$row->no_reff,
					'no_sample'    	  =>$row->no_sample,
					'id_pelanggan'    =>$row->id_pelanggan,
					'no_reff' 		  =>$row->no_reff,
					'total'    		  =>$row->total,
					'sisa'    		  =>$row->sisa,
				);
			}
			echo json_encode($arr);
		}
		

		
		
	}
	?>