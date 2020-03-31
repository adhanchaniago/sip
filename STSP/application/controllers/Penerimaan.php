<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penerimaan extends CI_Controller {

	function __construct(){
		parent:: __construct();
		
		ceklogin();
		$this->load->Model('Model_penerimaan');
		$this->load->Model(array('Model_pelanggan','Model_penerimaan','Model_penjualan'));
			//$this->load->helper(array('form','url'));
	}
	function looping_cetak(){
		
		$id = $this->input->post('no_bukti');
		$data['cetak'] = $this->Model_penerimaan->looping_cetak($id);
		$data['cetak1'] = $this->Model_penerimaan->view_cetak($id);
		$this->load->view('Penerimaan/print',$data);
		
	}
	function input_bebas(){

			$this->Model_penerimaan->insert_bebas();
	}
	function update_cetak(){
		if(isset($_POST['submit'])){	
			$no_bukti = $this->input->post('no_bukti');
			$alasan_cetak = $this->input->post('alasan_cetak');
			$cetak = $this->input->post('cetak');
			$looping_cetak = $this->db->get_where('tb_pembayaran',array('no_bukti'=>$no_bukti))->row_array();
			$cetakan = $looping_cetak['cetak'];
			if($cetakan > 2){
				$this->session->set_flashdata("message","<script> alert('Oops.. Gak Bisa Ngeprint Lagi')</script>");
				redirect('Penerimaan/view_penerimaan');
			}else{
				$data = array(
					'no_bukti'      => $no_bukti,
					'alasan_cetak'  => $alasan_cetak,
					'cetak' 	    => $cetak,
					'user' 	  	    => $this->session->userdata('username'),
				);
				$this->db->insert('cetak_penerimaan',$data);
				$this->db->query("UPDATE tb_pembayaran SET cetak = cetak + '$cetak' WHERE no_bukti = '$no_bukti'");
				redirect('Penerimaan/cetak_struk/'.$no_bukti);
			}
		}
	}
	function input_penerimaan(){
		if(isset($_POST['submit'])){
			$this->Model_penerimaan->insert_pembayaran();
		}if(isset($_POST['submit2'])){
			$this->Model_penerimaan->insert_cetak_pembayaran();
			
		}else{
			$a = $this->Model_penerimaan->getNomorterakhir()->row_array();
                            //Mengambil Tahun di Sistem
			$tahun    = date('y');
			$id       = ('PN');
			$id1       = ('-');
			$c = array('','I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII');
			$bln		= $c[date('n')];
			$format   = $tahun.$id.$id1.$bln;
			$data['autonumber'] 	= buatkode($a['no_bukti'],$format,4);
			$data['listpelanggan']  = $this->Model_pelanggan->view_pelanggan();
			$data['listpenjualan'] = $this->Model_penerimaan->view_penjualan();
			$data['p'] 				= $this->Model_penerimaan->get_penerimaan()->row_array();
			$this->template->load('template','Penerimaan/input_penerimaan',$data);
		}
	}
	function cetak_struk(){	
		$data['d'] = $this->Model_penerimaan->get()->row_array();
		$this->load->view('Penerimaan/cetak',$data);
		
	}
	function view_penerimaan(){
		$data['listpelanggan']  = $this->Model_penerimaan->view_pel();
		$data['penerimaan'] = $this->Model_penerimaan->view_penerimaan();
		$data['listpenjualan'] = $this->Model_penjualan->view_penjualan();
		$this->template->load('template','Penerimaan/view_penerimaan',$data);
		
	}
	function input_detail_pembayaran(){
		
			$data=$this->Model_penerimaan->input_detail_pembayaran($nojual,$idpelanggan,$noreff,$total,$sisabayar,$bayar); //dihapus ,$disc2
			echo json_encode($data);
			
		}
		function reset(){
			$query = "truncate tb_pembayaran_tmp";
			$this->db->query($query);
			redirect('Penerimaan/view_penerimaan');
		}
		function view_detail_pembayaran(){
			
			$data['list_pembayaran'] = $this->Model_penerimaan->view_detail_pembayaran();
			$this->load->view('Penerimaan/pembayaran_tmp',$data);
			
		}
		function view_detail_pembayaran2(){
			$data['list_tmp'] = $this->Model_penerimaan->view_detail_pembayaran();
			$this->load->view('Penerimaan/data_tmp_tt',$data);
			
		}
		function view_detail_pembayaran3(){
			$data['list_tmp'] = $this->Model_penerimaan->view_detail_pembayaran();
			$this->load->view('Penerimaan/p_walk1',$data);
			
		}
		function data_pn(){
			$id = $this->input->post('no_bukti');
			$data['listdetail'] = $this->Model_penerimaan->data_pn($id);
			$this->load->view('Penerimaan/data_detail',$data);
			
		}
		public function destroy($no_jual,$user)
		{
			$data=$this->Model_penerimaan->delete($user,$no_jual);
		//$this->db->query("UPDATE tb_pembayaran_tmp SET sisa_bayar = sisa_bayar + bayar WHERE no_jual = '$no_jual'");
			$data = ['success'=>200];

			echo json_encode($data);
		}
		function get_data() { 
			$keyword = $this->uri->segment(3);
			$d = $this->uri->segment(4);
			$this->db->select('*');
			$this->db->from('tb_penjualans');
			$this->db->where('sisa > 0');
			$this->db->where('id_pelanggan',$keyword);
			$this->db->where('no_reff',$d);
			$data = $this->db->get(); 
			foreach($data->result() as $row)
			{
				$arr['query'] = $keyword.$d;
				$arr['suggestions'][] = array(
					'value'    		  =>$row->no_jual.'/'.$row->id_pelanggan.'/'.$row->no_reff,
					'no_jual'    	  =>$row->no_jual,
					'id_pelanggan'    =>$row->id_pelanggan,
					'no_reff' 		  =>$row->no_reff,
					'totalan2'    	  =>$row->total,
					'total'    	  	  =>number_format($row->total),
					'by2'    	 	  =>number_format($row->sisa),
					'sisa'    		  =>$row->sisa,
				);
			}
			echo json_encode($arr);
		}
		function get_data_pelanggan(){
			$keyword = $this->uri->segment(3);
			$this->db->select('*');
			$this->db->from('tb_pelanggan');
			$this->db->like('nama_pelanggan',$keyword);
			$data = $this->db->get();
			foreach($data->result() as $row)
			{
				$arr['query'] = $keyword;
				$arr['suggestions'][] = array(
					'value'    		  =>$row->nama_pelanggan,
					'id_pelanggan'    =>$row->id_pelanggan,
				);
			}
			echo json_encode($arr);
		}

		
		
	}
	?>