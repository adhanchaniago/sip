<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_jalan extends CI_Controller {

	function __construct(){
		parent:: __construct();
		
		ceklogin();
		$this->load->Model(array('Model_barang','Model_surat'));
			//$this->load->helper(array('form','url'));
	}

	function cektemp(){
		$user		 	    = $this->session->userdata('username');	
		$query1 			= $this->db->query("SELECT * FROM tb_detail_tmp INNER JOIN tb_barang ON tb_detail_tmp.id_barang = tb_barang.id_barang 
			WHERE tb_detail_tmp.user='$user'")->num_rows();
		echo $query1;
	}
	
	function surat_jalan(){
		if(isset($_POST['submit'])){
				//insert data
			$this->Model_surat->insert_surat_jalan();
			redirect('surat_jalan/view_surat_jalan');
		}if(isset($_POST['submit2'])){
			$this->Model_surat->insert_surat_cetak();
			redirect('surat_jalan/cetak_struk/'.$no_jual);
		}else{
			$a = $this->Model_surat->getNomorterakhir1()->row_array();
                            //Mengambil Tahun di Sistem
			$tahun    = date('y');
			$id       = ('SJ');
			$id1       = ('-');
			$c = array('','I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII');
			$bln		= $c[date('n')];
			$format   = $tahun.$id.$id1.$bln;			
			$data['autonumber'] 	 = buatkode($a['no_kirim'],$format,4);

			$id = $this->input->post('id_barang');
			$data['listdetail'] = $this->Model_surat->data_sj($id);
			$data['pj'] = $this->Model_surat->view_sj();
			$data['d'] = $this->Model_surat->get()->row_array();
			$this->template->load('template','surat_jalan/surat_jalan',$data);
			
		}
	}
	
	
	
	function edit_surat_jalan(){
		if(isset($_POST['submit'])){
			$this->Model_surat->insert_retur_sj();
		}if(isset($_POST['submit2'])){
			$this->Model_surat->insert_retur_sj_cetak();
		}else{	
			$a = $this->Model_surat->getNomorterakhir()->row_array();
                            //Mengambil Tahun di Sistem
			$tahun    = date('y');
			$id       = ('RSJ');
			$id1       = ('-');
			$c = array('','I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII');
			$bln		= $c[date('n')];
			$format   = $tahun.$id.$id1.$bln;			
			$data['autonumber'] 	= buatkode($a['no_sj_retur'],$format,4);
			$id = $this->input->post('id_barang');
			$data['listdetail'] = $this->Model_surat->data_sj($id);
			$data['pj'] = $this->Model_surat->view_sj();
			$data['d'] = $this->Model_surat->getretur()->row_array();
			$this->template->load('template','surat_jalan/edit_surat_jalan',$data);
		}
	}
	
	function edit_detail_surat(){
		if(isset($_POST['submit1'])){
				//insert data
			$this->Model_surat->update_detail_surat();
			$data = $this->db->get('tb_detail_kirim');
			redirect('surat_jalan/view_surat_jalan'.$data->no_sj);
		}else{
			$id = $this->input->post('id_barang');
			$data['listdetail'] = $this->Model_surat->data_sj($id);
			$data['pj'] = $this->Model_surat->view_sj();
			$data['d'] = $this->Model_surat->get3()->row_array();
			$this->template->load('template','surat_jalan/edit_surat_barang',$data);
			
		}
	}
	
	public function delete_kirim($no_sj){
		$this->Model_surat->delete_kirim($no_sj);
		$this->Model_surat->delete_detail_kirim($no_sj);
		redirect('surat_jalan/view_surat_jalan');
	}
	
	function looping_cetak_sj(){
		
		$id = $this->input->post('no_kirim');
		$data['cetak'] = $this->Model_surat->looping_cetak_sj($id);
		$data['cetak1'] = $this->Model_surat->view_cetak($id);
		$this->load->view('Surat_jalan/print_sj',$data);
		
	}
	
	function update_cetak_sj(){
		$no_kirim = $this->input->post('no_kirim');
		$alasan_cetak = $this->input->post('alasan_cetak');
		$cetak = $this->input->post('cetak');
		$looping_cetak = $this->db->get_where('tb_kirim',array('no_kirim'=>$no_kirim))->row_array();
		$cetakan = $looping_cetak['cetak'];
		if($cetakan > 2){
			$this->session->set_flashdata("message","<script> alert('Oops.. Gak Bisa Ngeprint Lagi')</script>");
			redirect('Surat_jalan/view_histori_surat');
		}else{
			$data = array(
				'no_kirim'        => $no_kirim,
				'alasan_cetak' => $alasan_cetak,
				'cetak' 	   => $cetak,
			);
			$this->db->insert('cetak_sj',$data);
			$this->db->query("UPDATE tb_kirim SET cetak = cetak + '$cetak', alasan_cetak = '$alasan_cetak' WHERE no_kirim = '$no_kirim'");
		}
		redirect('Surat_jalan/cetak_struk_a5/'.$no_kirim);
	}
	
	function update_cetak_retur(){
		$no_sj_retur = $this->input->post('no_sj_retur');
		$alasan_cetak = $this->input->post('alasan_cetak');
		$cetak = $this->input->post('cetak');
		$looping_cetak = $this->db->get_where('sj_retur',array('no_sj_retur'=>$no_sj_retur))->row_array();
		$cetakan = $looping_cetak['cetak'];
		if($cetakan > 2){
			$this->session->set_flashdata("message","<script> alert('Oops.. Gak Bisa Ngeprint Lagi')</script>");
			redirect('Surat_jalan/view_sj_retur');
		}else{
			$data = array(
				'no_sj_retur'  => $no_sj_retur,
				'alasan_cetak' => $alasan_cetak,
				'cetak' 	   => $cetak,
			);
			$this->db->insert('cetak_sj_retur',$data);
			$this->db->query("UPDATE sj_retur SET cetak = cetak + '$cetak' WHERE no_sj_retur = '$no_sj_retur'");
		}
		redirect('Surat_jalan/cetak_struk_retur_a5/'.$no_sj_retur);
	}
	function reset(){
		$user = $this->session->userdata('username');
		$query = "delete from tb_detail_tmp where user = '$user'";
		$this->db->query($query);
		redirect('surat_jalan/view_surat_jalan');
	}
	function reset_tmp_retur(){
		$user = $this->session->userdata('username');
		$query = "delete from sj_retur_tmp where user = '$user'";
		$this->db->query($query);
		redirect('surat_jalan/view_histori_surat');
	}	
	
	function view_surat_jalan(){
		$data['pk'] = $this->Model_surat->view_sjln();
		$this->template->load('template','Surat_jalan/view_surat_jalan',$data);
	}
	function view_histori_surat(){
		$id = $this->input->post('id_barang');
		$data['rtr'] = $this->Model_surat->view_sj_rtr();
		$data['pj'] = $this->Model_surat->view_sj();
		$data['psj'] = $this->Model_surat->view_sj1($id);
		$data['pk'] = $this->Model_surat->view_sjln();
		$data['d'] = $this->Model_surat->get()->row_array();
		$this->template->load('template','Surat_jalan/view_histori_surat',$data);
	}
	function view_sj_retur(){
		$id = $this->input->post('id_barang');
		$data['rtr'] = $this->Model_surat->view_sj_rtr();
		$this->template->load('template','Surat_jalan/view_histori_retur',$data);
	}
	function input_detail(){

			$data=$this->Model_surat->input_detail($idbarang,$hargasatuan,$satuanbesar,$modal,$jmlkrm,$disc,$disc1); //dihapus ,$disc2
			echo json_encode($data);

		}
		function input_detail_retur(){
			
			$data=$this->Model_surat->input_detail_retur($no_jl,$no_sj,$idbarang,$namabarang,$satuanbesar,$jmlkrm);
			echo json_encode($data);
			
		}
		public function destroy($user,$id_barang)
		{
			$data=$this->Model_surat->d_retur_tmp($user,$id_barang);
			$data = ['success'=>200];

			echo json_encode($data);
		}
		function view_detail(){
			$data['list_tmp'] = $this->Model_surat->view_detail();
			$this->load->view('Surat_jalan/data_tmp',$data);
		}
		function view_detail_retur(){
			
			
			$data['list_tmp'] = $this->Model_surat->view_detail_retur();
			$this->load->view('Surat_jalan/data_retur_tmp',$data);
			
		}
		public function get_barang() {    
			$keyword = $this->uri->segment(3);
			$nono = $this->uri->segment(4);
			$data = $this->db->query("SELECT * FROM tb_detail_penjualan
				INNER JOIN tb_barang ON tb_detail_penjualan.id_barang = tb_barang.id_barang
				WHERE tb_barang.nama_barang LIKE '%$nono%' AND tb_detail_penjualan.no_jual = '$keyword'");    
			foreach($data->result() as $row)
			{
				$arr['query'] = $keyword.$nono;
				$arr['suggestions'][] = array(
					'value'    		  =>$row->nama_barang,
					'id_barang'    	  =>$row->id_barang,
					'satuan_besar'    =>$row->satuan_besar,
					'sisa_kirim'	  =>$row->qtyb-$row->terkirim,
					'harga_beli'      =>$row->harga_beli,
					'modal'		      =>$row->modal,
					'disc'      	  =>$row->disc,
					'disc1'      	  =>$row->disc1
				);
			}
			echo json_encode($arr);
		}
		public function get_barang_edit() {   
			$keyword = $this->uri->segment(3);
			$nono = $this->uri->segment(4);
			$data = $this->db->query("SELECT * FROM tb_kirim 
				INNER JOIN tb_detail_kirim ON tb_kirim.no_kirim = tb_detail_kirim.no_kirim 
				INNER JOIN tb_barang ON tb_detail_kirim.id_barang = tb_barang.id_barang 
				WHERE tb_kirim.no_kirim = '$keyword' AND  nama_barang LIKE '%$nono%'");    
			foreach($data->result() as $row)
			{
				$arr['query'] = $keyword.$nono;
				$arr['suggestions'][] = array(
					'value'    		  =>$row->nama_barang,
					'id_barang'    	  =>$row->id_barang,
					'satuan_besar'    =>$row->satuan_besar,
					'jml_krm'  		  =>$row->jml_krm,
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
		public function get_sales_order() {   
			$keyword = $this->uri->segment(3);
			$data = $this->db->query("SELECT * FROM tb_penjualan 
				WHERE tb_penjualan.no_jual = '$keyword'");    
			foreach($data->result() as $row)
			{
				$arr['query'] = $keyword;
				$arr['suggestions'][] = array(
					'value'    		  =>$row->no_jual,
					'no_jual'    	  	  =>$row->no_jual,
				);
			}
			echo json_encode($arr);
		}
		function data_sj(){
			$id = $this->input->post('id_barang');
			$data['listdetail'] = $this->Model_surat->data_sj($id);
			$this->load->view('Surat_jalan/data_sj',$data);
			
		}
		function data_terkirim(){
			$id = $this->input->post('id_barang');
			$data['listdetail'] = $this->Model_surat->data_terkirim($id);
			$this->load->view('Surat_jalan/terkirim',$data);
			
		}
		function data_retur(){
			$id = $this->input->post('id_barang');
			$data['listdetail'] = $this->Model_surat->data_retur($id);
			$this->load->view('Surat_jalan/retur',$data);
			
		}
		
		function cetak_struk(){	
			$data['d'] = $this->Model_surat->get1()->row_array();
			$this->load->view('Surat_jalan/cetak',$data);
			
		}
		function cetak_struk_a5(){	
			$data['d'] = $this->Model_surat->get5()->row_array();
			$this->load->view('Surat_jalan/cetak_a4',$data);
			
		}
		
		function cetak_struk_retur(){	
			$data['d'] = $this->Model_surat->get4()->row_array();
			$this->load->view('Surat_jalan/cetak_retur',$data);
			
		}
		
		function cetak_struk_retur_a5(){	
			$data['d'] = $this->Model_surat->get6()->row_array();
			$this->load->view('Surat_jalan/cetak_a4_retur',$data);
			
		}
		
		function looping_cetak_retur(){
			
			$id = $this->input->post('no_sj_retur');
			$data['cetak'] = $this->Model_surat->looping_cetak_retur($id);
			$data['cetak1'] = $this->Model_surat->view_cetak_retur($id);
			$this->load->view('Surat_jalan/print_retur_sj',$data);
			
		}
		
		function get_data_no_sales(){
			$keyword = $this->uri->segment(3);
			$this->db->select('*');
			$this->db->from('tb_penjualan');
			$this->db->where('stok > 0');
			$this->db->where('acc','0');
			$this->db->like('no_jual',$keyword);
			$data = $this->db->get();
			foreach($data->result() as $row)
			{
				$arr['query'] = $keyword;
				$arr['suggestions'][] = array(
					'value'    		  =>$row->no_jual,
					'no_jual'     =>$row->no_jual,
				);
			}
			echo json_encode($arr);
		}
		
	}
	?>