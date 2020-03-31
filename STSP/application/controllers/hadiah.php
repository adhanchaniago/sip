<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Hadiah extends CI_Controller {

	function __construct(){
		parent:: __construct();
		
		ceklogin();
		$this->load->Model(array('Model_hadiah','Model_pelanggan'));
		$this->load->library('session');

    // Load Pagination library
		$this->load->library('pagination');
	}		
	function detail_data(){
		$id = $this->input->post('id_barang');
		$data['listdetail'] = $this->Model_hadiah->detail_Pembelian($id);
		$this->load->view('Hadiah/data_detail',$data);
		
	}
	function detail_pemberian(){
		$id = $this->input->post('id_barang');
		$data['listdetail'] = $this->Model_hadiah->detail_pemberian($id);
		$this->load->view('Hadiah/data_detail_pemberian',$data);
		
	}
	function view_pembelian(){
		$data['listpembelian'] = $this->Model_hadiah->view_Pembelian();
		$this->template->load('template','Hadiah/view_pembelian',$data);
		
	}	
	
	
	function view_penjualan(){
		$data['list_pemberian'] = $this->Model_hadiah->view_pemberian();
		$this->template->load('template','Hadiah/view_penjualan',$data);
		
	}
	function looping_cetak_hadiah(){
		
		$id = $this->input->post('no_pemberian');
		$data['cetak'] = $this->Model_hadiah->looping_cetak_hadiah($id);
		$data['cetak1'] = $this->Model_hadiah->cetak_a5($id);
		$this->load->view('Hadiah/print',$data);
		
	}
	function update_cetak(){
		if(isset($_POST['submit'])){	
			$no_pemberian = $this->input->post('no_pemberian');
			$alasan_cetak = $this->input->post('alasan_cetak');
			$cetak = $this->input->post('cetak');
			$looping_cetak = $this->db->get_where('tb_pemberian_hadiah',array('no_pemberian'=>$no_pemberian))->row_array();
			$cetakan = $looping_cetak['cetak'];
			if($cetakan > 2){
				$this->session->set_flashdata("message","<script> alert('Oops.. Gak Bisa Ngeprint Lagi')</script>");
				redirect('Hadiah/view_penjualan');
			}else{
				$data = array(
					'no_pemberian'       => $no_pemberian,
					'alasan' 	   		 => $alasan_cetak,
					'cetak' 	         => $cetak,
					'user'		         => $this->session->userdata('username'),
				);
				$this->db->insert('cetak_hadiah',$data);
				$this->db->query("UPDATE tb_pemberian_hadiah SET cetak = cetak + '$cetak' WHERE no_pemberian = '$no_pemberian'");
			}
			redirect('Hadiah/cetak_struk/'.$no_pemberian);
			
		}
		
	}
	function input_Pembelian(){
		if(isset($_POST['submit'])){
			
			$this->Model_hadiah->insert_pembelian();
			
		}if(isset($_POST['submit2'])){
			
			$this->Model_hadiah->insert_pembelian_cetak();
			
		}else{
			$a = $this->Model_hadiah->getNomorterakhir()->row_array();
                            //Mengambil Tahun di Sistem
			$tahun    = date('y');
			$id       = ('BH');
			$id1       = ('-');
			$c = array('','I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII');
			$bln		= $c[date('n')];
			$format   = $tahun.$id.$id1.$bln;
			
			$data['autonumber'] 	= buatkode($a['no_beli'],$format,4);
			$this->template->load('template','Hadiah/input_pembelian',$data);
		}
	}
	
	function reset_pembelian(){
		$user = $this->session->userdata('username');
		$query = "delete from pembelian_hadiah_tmp where user='$user'";
		$this->db->query($query);
		redirect('Hadiah/input_pembelian');
		
	}
	function reset_pemberian(){
		$user = $this->session->userdata('username');
		$query = "delete from tmp_pemberian_hadiah where user='$user'";
		$this->db->query($query);
		redirect('Hadiah/input_penjualan');
		
	}
	function input_penjualan(){
		if(isset($_POST['submit'])){
			
			$this->Model_hadiah->insert_pemberian();
			
		}if(isset($_POST['submit3'])){
			
			$this->Model_hadiah->insert_pemberian_cetak();
			
		}else{
			$a = $this->Model_hadiah->getNomorterakhir1()->row_array();
                            //Mengambil Tahun di Sistem
			$tahun    = date('y');
			$id       = ('KH');
			$id1       = ('-');
			$c = array('','I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII');
			$bln		= $c[date('n')];
			$format   = $tahun.$id.$id1.$bln;
			
			$data['autonumber'] 	= buatkode($a['no_pemberian'],$format,4);
			$data['listpelanggan']  = $this->Model_pelanggan->view_pelanggan();
			$this->template->load('template','Hadiah/input_pemberian',$data);
		}
	}
	function cetak_struk(){	
		$data['d'] = $this->Model_hadiah->get_cetak()->row_array();
		$this->load->view('Hadiah/cetak',$data);
		
	}
	function cetak_struk_pembelian(){	
		$data['d'] = $this->Model_hadiah->get_cetak1()->row_array();
		$this->load->view('Hadiah/cetak_pembelian_hadiah',$data);
		
	}
	function view_bayarb(){
		$data['list_tmp'] = $this->Model_hadiah->view_pembelian_tmp();
		$this->load->view('Hadiah/p_walk1',$data);
		
	}
	function view_bayarj(){
		$data['list_tmp'] = $this->Model_hadiah->view_pemberian_tmp();
		$this->load->view('Hadiah/p_walk2',$data);
		
	}
	
	function view_hadiah(){
		if(isset($_POST['submit'])){
				//insert data
			$this->Model_hadiah->insert_hadiah();
		}else{
			$data['list_barang'] = $this->Model_hadiah->view_hadiah();
			$this->template->load('template','Hadiah/view_hadiah',$data);
		}					
	}
	
	function edit_hadiah(){
		
		if(isset($_POST['submit'])){
				//insert data
			$this->Model_hadiah->update_hadiah();
			redirect('Hadiah/input_hadiah');
		}else{
			$data['d'] = $this->Model_hadiah->get2()->row_array();
			$data['list_barang'] = $this->Model_hadiah->view_hadiah();
			$this->template->load('template','Hadiah/edit_hadiah',$data);
			
		}
	}
	public function get_data() {    
		$this->load->model('Model_hadiah');
		$keyword = $this->uri->segment(3);
		$data = $this->db->from('tb_hadiah')->like('nama_barang',$keyword)->get();            
		
		foreach($data->result() as $row)
		{
			$arr['query'] = $keyword;
			$arr['suggestions'][] = array(
				'value'    		  =>$row->nama_barang,
				'id_barang'    	  =>$row->id_barang,
				'stok'   		  =>$row->stok,
				'harga_jual'      =>number_format($row->harga_jual,0,',','.')
			);
		}
		echo json_encode($arr);
	}
	function input_pembelian_hadiah(){
		
			$data=$this->Model_hadiah->input_pembelian_hadiah($idbarang,$qtybes,$modal,$hargabeli,$disc,$jam); //dihapus ,$disc2
			echo json_encode($data);
			
		}
		function input_pemberian_hadiah(){
			
			$data=$this->Model_hadiah->input_pemberian_hadiah($idbarang,$stok,$qtybes,$modal,$jam); //dihapus ,$disc2
			echo json_encode($data);
			
		}
		function view_pembelian_tmp(){
			
			$data['list_tmp'] = $this->Model_hadiah->view_pembelian_tmp();
			$this->load->view('Hadiah/data_tmp',$data);
			
		}
		function view_pemberian_tmp(){
			
			$data['list_tmp'] = $this->Model_hadiah->view_pemberian_tmp();
			$this->load->view('Hadiah/data_tmp_pemberian',$data);
			
		}
		function view_detail_harga(){
			$data['list_tmp'] = $this->Model_hadiah->view_pembelian_tmp();
			$this->load->view('Hadiah/data_tmp_tt',$data);
			
		}
		function data_tt_pemberian(){
			$data['list_tmp'] = $this->Model_hadiah->view_pemberian_tmp();
			$this->load->view('Hadiah/data_tmp_tt_pemberian',$data);
			
		}
		public function destroy($user,$id_barang)
		{
			$data=$this->Model_hadiah->delete($user,$id_barang);
			$data = ['success'=>200];

			echo json_encode($data);
		}
		public function destroy1($user,$id_barang)
		{
			$data=$this->Model_hadiah->delete_pemberian($user,$id_barang);
			$data = ['success'=>200];

			echo json_encode($data);
		}
		
		function delete_barang()
		{
			$penjualan = $this->db->get_where('tb_detail_pembelian',array('id_barang'=>$id_barang))->row_array();
			$id_barang =   $this->uri->segment(3);
			if($penjualan['id_barang'] == $id_barang){
				echo "GAGAL";
			}elseif($penjualan['id_barang'] == 0){
				$this->Model_barang->delete_barang($id_barang);
				redirect('Barang/view_barang');
			}
		}
	}
	?>
