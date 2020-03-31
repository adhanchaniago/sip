<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan_Sample extends CI_Controller {

	function __construct(){
		parent:: __construct();
		ceklogin();
		$this->load->library('form_validation','session','pagination');
		$this->load->Model(array('Model_pelanggan','Model_kategori','Model_barang','Model_penjualan','Model_sales','Model_surat','Model_penjualan_sample'));
	}
	
	function input_penjualan_sample(){
		
		if(isset($_POST['submit'])){
			
			$this->Model_penjualan_sample->insert_penjualan_sample();
			
		}if(isset($_POST['submit2'])){
			$this->Model_penjualan_sample->insert_penjualan_sample_cetak_thermal();
			
		}if(isset($_POST['submit3'])){
			//$this->Model_penjualan->insert_penjualan_cetakk();
			
		}else{
			$a = $this->Model_penjualan_sample->getNomorterakhir()->row_array();
                            //Mengambil Tahun di Sistem
			$tahun    = date('y');
			$id       = ('S');
			$id1       = ('-');
			$c = array('','I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII');
			$bln		= $c[date('n')];
			$format   = $tahun.$id.$id1.$bln;
			$b = $this->Model_penjualan_sample->getNomorterakhir1()->row_array();
                            //Mengambil Tahun di Sistem
			$tahun    = date('y');
			$id       = ('SJ');
			$id1       = ('-');
			$c = array('','I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII');
			$bln		= $c[date('n')];
			$format2   = $tahun.$id.$id1.$bln;
			$data['autonumber'] 	= buatkode($a['no_sample'],$format,4);
			$data['autonumber1'] 	= buatkode($b['no_sj'],$format2,4);
			$data['listsales'] 		= $this->Model_sales->view_sales();
			$data['listkategori']   = $this->Model_kategori->view_kategori();
			$data['listpelanggan']  = $this->Model_pelanggan->view_pelanggan();
			$data['list_barang'] 	= $this->Model_barang->view_barang();
			$data['list_barang']	= $this->Model_barang->view_barang();
			$data['list_tmp'] 		= $this->Model_penjualan->view_detail_barang();
			$data['pel'] 			= $this->Model_pelanggan->get()->row_array();
			$this->template->load('template','Penjualan_sample/input_penjualan_sample',$data);
		}
	}
	
	function looping_cetak(){
		
		$id = $this->input->post('no_sample');
		$data['cetak'] = $this->Model_penjualan_sample->looping_cetak($id);
		$data['cetak1'] = $this->Model_penjualan_sample->view_cetak($id);
		$this->load->view('Penjualan_sample/print',$data);
		
	}
	function update_cetak1(){
		if(isset($_POST['submit'])){	
			$no_sample = $this->input->post('no_sample');
			$alasan_cetak = $this->input->post('alasan_cetak');
			$cetak = $this->input->post('cetak');
			$looping_cetak = $this->db->get_where('tb_penjualan_sample',array('no_sample'=>$no_sample))->row_array();
			$cetakan = $looping_cetak['cetak'];
			if($cetakan > 2){
				$this->session->set_flashdata("message","<script> alert('Oops.. Gak Bisa Ngeprint Lagi')</script>");
				redirect('Penjualan_sample/view_penjualan_sample');
			}else{
				$data = array(
					'no_sample'    => $no_sample,
					'alasan_cetak' => $alasan_cetak,
					'cetak' 	   => $cetak,
				);
				$this->db->insert('cetak_sample',$data);
				$this->db->query("UPDATE tb_penjualan_sample SET cetak = cetak + '$cetak', alasan_cetak = '$alasan_cetak' WHERE no_sample = '$no_sample'");
			}
			redirect('Penjualan_sample/cetak_struk/'.$no_sample);
		}
		
	}
	function cetak_struk(){	
		$data['d'] = $this->Model_penjualan_sample->get()->row_array();
			//$data['b'] = $this->Model_penjualan->get3()->row_array();	
		$this->load->view('Penjualan_sample/cetak',$data);
		
	}
	public function destroy($user,$id_barang)
	{
		$data=$this->Model_penjualan_sample->delete($user,$id_barang);
		$data = ['success'=>200];

		echo json_encode($data);
	}
	public function get_data() {    
		$this->load->model('Model_barang');
		$keyword = $this->uri->segment(3);
		$id_k_pelanggan = $this->input->post('id_k_pelanggan');
		$data = $this->db->from('tb_barang')->like('nama_barang',$keyword)->where('jual = "Y"')->get();            
		
		foreach($data->result() as $row)
		{
			$arr['query'] = $keyword;
			$arr['suggestions'][] = array(
				'value'    		  =>$row->nama_barang,
				'id_barang'    	  =>$row->id_barang,
				'stok'    	  	  =>$row->stok,
				'satuan_besar'    =>$row->satuan_besar,
				'qty_b'   		  =>$row->qty_b,
				'satuan_kecil'    =>$row->satuan_kecil,
				'qty_k'    		  =>$row->qty_k,
				'modal'    		  =>number_format($row->modal,0,',','.'),
				'harga_jual'      =>number_format($row->harga_jual,0,',','.'),
				'walk'    		  =>number_format($row->walk,0,',','.'),
				'tk'    		  =>number_format($row->tk,0,',','.'),
				'tb'    		  =>number_format($row->tb,0,',','.'),
				'sls'    		  =>number_format($row->sls,0,',','.'),
				'agn'    		  =>number_format($row->agn,0,',','.')
			);
		}
		echo json_encode($arr);
	}
	public function get() {    
		$this->load->model('Model_penjualan');
		$no_jual = $this->uri->segment(3);
		//$id_k_pelanggan = $this->input->post('id_k_pelanggan');
		$data = $this->db->from('tb_penjualan')->like('no_jual',$no_jual)->get();            
		
		foreach($data->result() as $row)
		{
			$arr['query'] = $no_jual;
			$arr['suggestions'][] = array(
				'value'    		  =>$row->no_jual.'/'.$row->id_pelanggan.'/'.$row->no_reff,
				'no_jual'    	  =>$row->no_jual,
				'id_pelanggan' 	  =>$row->id_pelanggan,
				'no_reff' 		  =>$row->no_reff,
				
			);
		}
		echo json_encode($arr);
	}
	
	function input_detail_barang(){
		
			$data=$this->Model_penjualan_sample->input_detail_barang($idbarang,$namabarang,$qtybes,$satuanbes,$hargabeli,$disc,$disc1,$jam); //dihapus ,$disc2
			echo json_encode($data);
			
		}
		function detail_sample(){
			$data['sample_tmp'] = $this->Model_penjualan_sample->detail_sample();
			$this->load->view('Penjualan_Sample/data_tmp_sample',$data);
		}
		
		function view_penjualan_sample(){
			$data['listpenjualan'] = $this->Model_penjualan_sample->view_penjualan_sample();
			$this->template->load('template','Penjualan_Sample/view_penjualan_sample',$data);
			
		}
		function detail_data_sample(){
			$id = $this->input->post('nama_barang');
			$data['listdetailsample'] = $this->Model_penjualan_sample->view_detail_sample($id);
			$this->load->view('Penjualan_Sample/data_detail',$data);
			
		}
		
		
		function view_detail_barang2(){
			$data['sample_tmp'] = $this->Model_penjualan_sample->detail_sample();
			$this->load->view('Penjualan_Sample/data_tmp_tt',$data);
			
		}
		function view_detail_barang3(){
			$data['sample_tmp'] = $this->Model_penjualan_sample->detail_sample();
			$this->load->view('Penjualan_Sample/p_walk1',$data);
			
		}
		
	}
	?>