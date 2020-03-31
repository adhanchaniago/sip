<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller {

	function __construct(){
		parent:: __construct();
		
		ceklogin();
		$this->load->Model('Model_pembayaran');
		$this->load->Model(array('Model_supplier','Model_pembayaran','Model_penjualan'));
			//$this->load->helper(array('form','url'));
	}
	function looping_cetak(){
		
		$id = $this->input->post('no_bukti');
		$data['cetak'] = $this->Model_pembayaran->looping_cetak($id);
		$data['cetak1'] = $this->Model_pembayaran->view_cetak($id);
		$this->load->view('Pembayaran/print',$data);
		
	}

	function input_bebas(){

		$this->Model_pembayaran->insert_bebas();
	}
	function update_cetak(){
		if(isset($_POST['submit'])){	
			$no_bukti = $this->input->post('no_bukti');
			$alasan_cetak = $this->input->post('alasan_cetak');
			$cetak = $this->input->post('cetak');
			$looping_cetak = $this->db->get_where('tb_penerimaan',array('no_bukti'=>$no_bukti))->row_array();
			$cetakan = $looping_cetak['cetak'];
			if($cetakan > 2){
				$this->session->set_flashdata("message","<script> alert('Oops.. Gak Bisa Ngeprint Lagi')</script>");
				redirect('Pembayaran/view_pembayaran');
			}else{
				$data = array(
					'no_bukti'      => $no_bukti,
					'alasan_cetak' 		=> $alasan_cetak,
					'cetak' 	   => $cetak,
					'user' 	  	 => $this->session->userdata('username'),
				);
				$this->db->insert('cetak_pembayaran',$data);
				$this->db->query("UPDATE tb_penerimaan SET cetak = cetak + '$cetak' WHERE no_bukti = '$no_bukti'");
				redirect('Pembayaran/cetak_struk/'.$no_bukti);
			}
		}
	}
	function input_pembayaran(){
		if(isset($_POST['submit'])){
			$this->Model_pembayaran->insert_pembayaran();
		}if(isset($_POST['submit2'])){
			$this->Model_pembayaran->insert_cetak_pembayaran();
			
		}else{
			$a = $this->Model_pembayaran->getNomorterakhir()->row_array();
                            //Mengambil Tahun di Sistem
			$tahun    = date('y');
			$id       = ('PB');
			$id1       = ('-');
			$c = array('','I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII');
			$bln		= $c[date('n')];
			$format   = $tahun.$id.$id1.$bln;
			$data['autonumber'] 	= buatkode($a['no_bukti'],$format,4);
			$data['listpelanggan']  = $this->Model_supplier->view_supplier();
			$data['p'] 				= $this->Model_pembayaran->get_pembayaran()->row_array();
			$this->template->load('template','Pembayaran/input_pembayaran',$data);
		}
	}
	function cetak_struk(){	
		$data['d'] = $this->Model_pembayaran->get()->row_array();
		$this->load->view('Pembayaran/cetak',$data);
		
	}
	function view_pembayaran(){
		$data['listpelanggan']  = $this->Model_pembayaran->view_supplier();
		$data['Pembayaran'] = $this->Model_pembayaran->view_pembayaran();
		$this->template->load('template','Pembayaran/view_pembayaran',$data);
		
	}
	function input_detail_pembayaran(){
		
			$data=$this->Model_pembayaran->input_detail_pembayaran($nobeli,$idsupplier,$id,$noreff,$total,$sisabayar,$bayar); //dihapus ,$disc2
			echo json_encode($data);
			
		}
		function reset(){
			$query = "truncate tb_penerimann_tmp";
			$this->db->query($query);
			redirect('Pembayaran/view_pembayaran');
		}
		function view_detail_pembayaran(){
			
			$data['list_pembayaran'] = $this->Model_pembayaran->view_detail_pembayaran();
			$this->load->view('Pembayaran/pembayaran_tmp',$data);
			
		}
		function view_detail_pembayaran2(){
			$data['list_tmp'] = $this->Model_pembayaran->view_detail_pembayaran();
			$this->load->view('Pembayaran/data_tmp_tt',$data);
			
		}
		function view_detail_pembayaran3(){
			$data['list_tmp'] = $this->Model_pembayaran->view_detail_pembayaran();
			$this->load->view('Pembayaran/p_walk1',$data);
			
		}
		function data_pn(){
			$id = $this->input->post('no_bukti');
			$data['listdetail'] = $this->Model_pembayaran->data_pn($id);
			$this->load->view('Pembayaran/data_detail',$data);
			
		}
		public function destroy($no_beli,$user)
		{
			$data=$this->Model_pembayaran->delete($user,$no_beli);
		//$this->db->query("UPDATE tb_pembayaran_tmp SET sisa_bayar = sisa_bayar + bayar WHERE no_jual = '$no_jual'");
			$data = ['success'=>200];

			echo json_encode($data);
		}
		function get_data() { 
			$keyword = $this->uri->segment(3);
			$d = $this->uri->segment(4);
			$this->db->select('*');
			$this->db->from('tb_pembelian');
			$this->db->where('sisa > 0');
			$this->db->where('id_supplier',$keyword);
			$this->db->where('no_reff',$d);
			$data = $this->db->get();  
			foreach($data->result() as $row)
			{
				$arr['query'] = $keyword.$d;
				$arr['suggestions'][] = array(
					'value'    		  =>$row->no_beli.'/'.$row->id_supplier.'/'.$row->no_reff,
					'no_beli'    	  =>$row->no_beli,
					'id_supplier'     =>$row->id_supplier,
					'no_reff' 		  =>$row->no_reff,
					'total'    		  =>number_format($row->total),
					'totalan2'    	  =>$row->total,
					'sisa'    		  =>number_format($row->sisa),
					'sisaan2'    	  =>$row->sisa,
				);
			}
			echo json_encode($arr);
		}
		function get_data_supplier(){
			$keyword = $this->uri->segment(3);
			$this->db->select('*');
			$this->db->from('tb_supplier');
			$this->db->like('nama_supplier',$keyword);
			$data = $this->db->get();
			foreach($data->result() as $row)
			{
				$arr['query'] = $keyword;
				$arr['suggestions'][] = array(
					'value'    		  =>$row->nama_supplier,
					'id_supplier'     =>$row->id_supplier,
				);
			}
			echo json_encode($arr);
		}

		
		
	}
	?>