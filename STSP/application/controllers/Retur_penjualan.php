<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Retur_penjualan extends CI_Controller {

	function __construct(){
		parent:: __construct();
		ceklogin();
		$this->load->library('form_validation','session','pagination');
		$this->load->Model(array('Model_pelanggan','Model_kategori','Model_barang','Model_penjualan','Model_sales','Model_surat'));
	}
	function json() { //get product data and encode to be JSON object
		header('Content-Type: application/json');
		echo $this->Model_penjualan->json();
	}
	
	public function lihat_retur(){
		if($this->uri->segment(3)==""){
			$offset1=0;
		}else{
			$offset1=$this->uri->segment(3);
		}
		$limit1 = 5; 
		$data['retur'] = $this->Model_penjualan->getAllRetur($offset1, $limit1);
		$data['count'] = $this->Model_penjualan->getAllRetur_total(); 
		$config = array();
		$config['base_url'] = base_url().'Penjualan/lihat_retur/';
		$config['per_page'] = $limit1;
		$config['uri_segment'] = 3;
		$config['num_links'] = 5;  
		$config['first_tag_open'] = '<li>';
		$config['first_link'] = 'First';
		$config['first_tag_close'] = '</li>';
		$config['prev_link'] = 'Prev';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href>';
		$config['cur_tag_close'] = '</a></li>';
		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_link'] = 'Last';
		$config['last_tag_close'] = '</li>';
		$config['total_rows'] = $data['count'];
		$this->pagination->initialize($config);
		$this->session->set_userdata('rows', $this->uri->segment(3));
		$data['error'] = "";         
		$this->template->load('template','Penjualan/view_retur',$data);
	} 
	function view_retur(){
		redirect('Retur_penjualan/lihat_retur');
	//$data['listretur'] = $this->Model_penjualan->view_detail_retur1();
	//$data['retur'] = $this->Model_penjualan->view_retur();
	//$data['listpelanggan'] = $this->Model_pelanggan->view_pelanggan();
	//$this->template->load('template','Penjualan/view_retur',$data);
		
	}
	function input_penjualan(){
		
		if(isset($_POST['submit'])){
			
			$this->Model_penjualan->insert_penjualan();
			
		}if(isset($_POST['submit2'])){
			$this->Model_penjualan->insert_penjualan_cetak();
			
		}if(isset($_POST['submit3'])){
			$this->Model_penjualan->insert_penjualan_cetakk();
			
		}else{
			$a = $this->Model_penjualan->getNomorterakhir()->row_array();
                            //Mengambil Tahun di Sistem
			$tahun    = date('y');
			$id       = ('J');
			$id1       = ('-');
			$c = array('','I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII');
			$bln		= $c[date('n')];
			$format   = $tahun.$id.$id1.$bln;
			$b = $this->Model_penjualan->getNomorterakhir1()->row_array();
                            //Mengambil Tahun di Sistem
			$tahun    = date('y');
			$id       = ('SJ');
			$id1       = ('-');
			$c = array('','I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII');
			$bln		= $c[date('n')];
			$format2   = $tahun.$id.$id1.$bln;
			$data['autonumber'] 	= buatkode($a['no_jual'],$format,4);
			$data['autonumber1'] 	= buatkode($b['no_sj'],$format2,4);
			$data['listsales'] 		= $this->Model_sales->view_sales();
			$data['listkategori']   = $this->Model_kategori->view_kategori();
			$data['listpelanggan']  = $this->Model_pelanggan->view_pelanggan();
			$data['list_barang'] 	= $this->Model_barang->view_barang();
			$data['list_barang']	= $this->Model_barang->view_barang();
			$data['list_tmp'] 		= $this->Model_penjualan->view_detail_barang();
			$data['pel'] 			= $this->Model_pelanggan->get()->row_array();
			$this->template->load('template','Penjualan/input_penjualan',$data);
		}
	}
	
	function looping_cetak(){
		
		$id = $this->input->post('no_jual');
		$data['cetak'] = $this->Model_penjualan->looping_cetak($id);
		$data['cetak1'] = $this->Model_penjualan->view_cetak($id);
		$data['cetak2'] = $this->Model_penjualan->view_cetak_a5($id);
		$this->load->view('Penjualan/print',$data);
		
	}
	function looping_cetak_retur(){
		
		$id = $this->input->post('no_retur');
		$data['cetak'] = $this->Model_penjualan->looping_cetak_retur($id);
		$data['cetak1'] = $this->Model_penjualan->view_cetak_retur($id);
		$data['cetak2'] = $this->Model_penjualan->view_cetak_retur_a5($id);
		$this->load->view('Penjualan/print_retur',$data);
		
	}
	
	function update_cetak1(){
		if(isset($_POST['submit'])){	
			$no_jual = $this->input->post('no_jual');
			$alasan_cetak = $this->input->post('alasan_cetak');
			$cetak = $this->input->post('cetak');
			$looping_cetak = $this->db->get_where('tb_penjualan',array('no_jual'=>$no_jual))->row_array();
			$cetakan = $looping_cetak['cetak'];
			if($cetakan > 2){
				$this->session->set_flashdata("message","<script> alert('Oops.. Gak Bisa Ngeprint Lagi')</script>");
				redirect('Penjualan/view_penjualan');
			}else{
				$data = array(
					'no_jual'      => $no_jual,
					'alasan_cetak' => $alasan_cetak,
					'cetak' 	   => $cetak,
				);
				$this->db->insert('cetak',$data);
				$this->db->query("UPDATE tb_penjualan SET cetak = cetak + '$cetak', alasan_cetak = '$alasan_cetak' WHERE no_jual = '$no_jual'");
			}
			redirect('Penjualan/cetak_struk/'.$no_jual);
			
		}if(isset($_POST['submit2'])){
			$no_jual = $this->input->post('no_jual');
			$alasan_cetak = $this->input->post('alasan_cetak');
			$cetak = $this->input->post('cetak');
			$loop_cetak = $this->db->get_where('tb_penjualan',array('no_jual'=>$no_jual))->row_array();
			$cetakann = $loop_cetak['cetak_a5'];
			if($cetakann > 2){
				$this->session->set_flashdata("message","<script> alert('Oops.. Gak Bisa Ngeprint Lagi')</script>");
				redirect('Penjualan/view_penjualan');
			}else{
				$data = array(
					'no_jual'      => $no_jual,
					'alasan_cetak' => $alasan_cetak,
					'cetak' 	   => $cetak,
				);
				$this->db->insert('cetak_a5',$data);
				$this->db->query("UPDATE tb_penjualan SET cetak = cetak + '$cetak', alasan_cetak = '$alasan_cetak' WHERE no_jual = '$no_jual'");
			}
			redirect('Penjualan/cetak_nota/'.$no_jual);
			
		}
		
	}
	function update_cetak_retur(){
		if(isset($_POST['submit'])){	
			$no_retur = $this->input->post('no_retur');
			$alasan_cetak = $this->input->post('alasan_cetak');
			$cetak = $this->input->post('cetak');
			
			$data = array(
				'no_retur'     => $no_retur,
				'alasan_cetak' => $alasan_cetak,
				'cetak' 	   => $cetak,
			);
			$this->db->insert('cetak_retur',$data);
			$this->db->query("UPDATE tb_retur SET cetak = cetak + '$cetak', alasan_cetak = '$alasan_cetak' WHERE no_retur = '$no_retur'");
			redirect('Penjualan/cetak_retur/'.$no_retur);
			
		}if(isset($_POST['submit2'])){
			$no_retur = $this->input->post('no_retur');
			$alasan_cetak = $this->input->post('alasan_cetak');
			$cetak = $this->input->post('cetak');
			
			$data = array(
				'no_retur'     => $no_retur,
				'alasan_cetak' => $alasan_cetak,
				'cetak' 	   => $cetak,
			);
			$this->db->insert('cetak_retura5',$data);
			$this->db->query("UPDATE tb_retur SET cetak = cetak + '$cetak', alasan_cetak = '$alasan_cetak' WHERE no_retur = '$no_retur'");
			redirect('Penjualan/cetak_a4_retur/'.$no_retur);
			
		}
		
	}
	function input_retur_noju(){
		
		if(isset($_POST['submit'])){
			
			$this->Model_penjualan->insert_retur_noju();
			
		}if(isset($_POST['submit2'])){
			$this->Model_penjualan->insert_retur_noju_cetak();
			
		}if(isset($_POST['submit3'])){
			$this->Model_penjualan->insert_retur_noju_cetak_a4();
			
		}else{
			$a = $this->Model_penjualan->getNomorterakhir2()->row_array();
                            //Mengambil Tahun di Sistem
			$tahun    = date('y');
			$id       = ('R');
			$id1       = ('-');
			$c = array('','I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII');
			$bln		= $c[date('n')];
			$format   = $tahun.$id.$id1.$bln;			
			$data['autonumber'] 	= buatkode($a['no_retur'],$format,4);
			$data['listpelanggan']  = $this->Model_pelanggan->view_pelanggan();
			$data['p'] 				= $this->Model_penjualan->get_retur()->row_array();
			$this->template->load('template','Penjualan/input_retur_noju',$data);
		}
	}
	
	function input_po(){
		
		if(isset($_POST['submit'])){
			
			//$this->Model_penjualan->insert_retur_noju();
			
		}else{
			
			//$data['listpelanggan']  = $this->Model_pelanggan->view_pelanggan();
			$this->template->load('template','Penjualan/input_po');
		}
	}
	function input_retur2(){
		
		if(isset($_POST['submit'])){
			
			//$this->Model_penjualan->insert_retur_noju();
			
		}if(isset($_POST['submit2'])){
			//$this->Model_penjualan->insert_retur_cetak();
			
		}else{
			$a = $this->Model_penjualan->getNomorterakhir2()->row_array();
                            //Mengambil Tahun di Sistem
			$tahun    = date('y');
			$id       = ('R');
			$id1       = ('-');
			$c = array('','I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII');
			$bln		= $c[date('n')];
			$format   = $tahun.$id.$id1.$bln;			
			$data['autonumber'] 	= buatkode($a['no_retur'],$format,4);
			//$data['autonumber1'] 	= buatkode($b['no_sj'],$format2,4);
			//$data['listsales'] 	= $this->Model_sales->view_sales();
			//$data['listkategori']  = $this->Model_kategori->view_kategori();
			$data['listpelanggan']  = $this->Model_penjualan->view_penjualan();
			$data['p'] 				= $this->Model_penjualan->get_re()->row_array();
			//$data['list_barang'] 	= $this->Model_barang->view_barang();
			//$data['list_barang']	= $this->Model_barang->view_barang();
			//$data['list_tmp'] 	= $this->Model_penjualan->view_detail_barang();
			//$data['pel'] 			= $this->Model_pelanggan->get()->row_array();
			$this->template->load('template','Penjualan/input_retur1',$data);
		}
	}
	function edit_penjualan(){
		if(isset($_POST['submit'])){
			
			//$this->Model_penjualan->insert_retur_noju();
			
		}else{
			$data['d'] 	= $this->Model_penjualan->get_edit_penjualan()->row_array();
			$this->template->load('template','Penjualan/edit_penjualan',$data);
		}
	}
	
	function input_retur(){
		
		if(isset($_POST['submit'])){
			
			$this->Model_penjualan->insert_retur();
			
		}if(isset($_POST['submit2'])){
			$this->Model_penjualan->insert_retur_cetak();
			
		}else{
			$a = $this->Model_penjualan->getNomorterakhir2()->row_array();
                            //Mengambil Tahun di Sistem
			$tahun    = date('y');
			$id       = ('R');
			$id1       = ('-');
			$c = array('','I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII');
			$bln		= $c[date('n')];
			$format   = $tahun.$id.$id1.$bln;			
			$data['autonumber'] 	= buatkode($a['no_retur'],$format,4);
			//$data['autonumber1'] 	= buatkode($b['no_sj'],$format2,4);
			//$data['listsales'] 		= $this->Model_sales->view_sales();
			//$data['listkategori']   = $this->Model_kategori->view_kategori();
			$data['listpelanggan']  = $this->Model_pelanggan->view_pelanggan();
			//$data['list_barang'] 	= $this->Model_barang->view_barang();
			//$data['list_barang']	= $this->Model_barang->view_barang();
			//$data['list_tmp'] 		= $this->Model_penjualan->view_detail_barang();
			//$data['pel'] 			= $this->Model_pelanggan->get()->row_array();
			$this->template->load('template','Penjualan/input_retur',$data);
		}
	}
	function riset(){	
		$query = "truncate tb_detail_b_barangP";
		$this->db->query($query);
		$query1 = "truncate tb_retur_tmp";
		$this->db->query($query1);
		redirect('Penjualan/input_penjualan');
		
	}
	function riset_retur(){	
		$query = "truncate retur_tmp";
		$this->db->query($query);
		redirect('Penjualan/view_penjualan');
		
	}
	function cetak_struk(){	
		$data['d'] = $this->Model_penjualan->get()->row_array();
			//$data['b'] = $this->Model_penjualan->get3()->row_array();	
		$this->load->view('Penjualan/cetak',$data);
		
	}
	function display_printer(){	
		$this->load->view('Penjualan/display_printer');
		
	}
	function cetak_langsung(){	
		$this->load->view('Penjualan/cetak_langsung');
		
	}
	function cetak_langsungan(){	
		$this->load->view('Penjualan/cetak_langsungan');
		
	}
	function versi(){	
		$this->load->view('Penjualan/versi');
		
	}
	function cetak_nota(){	
		$data['d'] = $this->Model_penjualan->get1()->row_array();
		$this->load->view('Penjualan/cetak_a4',$data);
		
	}
	public function destroy($user,$id_barang)
	{
		$data=$this->Model_penjualan->delete($user,$id_barang);
		$data = ['success'=>200];

		echo json_encode($data);
	}
	public function destroy2($id_brg,$user)
	{
		$data=$this->Model_penjualan->delete_retur($user,$id_brg);
		$data = ['success'=>200];

		echo json_encode($data);
	}
	public function destroy3($user,$idbarang)
	{
		$data=$this->Model_penjualan->delete_kirim($user,$idbarang);
		$data = ['success'=>200];

		echo json_encode($data);
	}
	public function destroy4($user,$idbarang)
	{
		$data=$this->Model_penjualan->d_retur_tmp($user,$idbarang);
		$data = ['success'=>200];

		echo json_encode($data);
	}
	function data_barang(){
		$data=$this->Model_penjualan->barang_list();
		echo json_encode($data);
	}
	function hapus_barang(){
		$id_barang=$this->input->post('kode');
		$data=$this->Model_penjualan->hapus_barang($id_barang);
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
		
			$data=$this->Model_penjualan->input_detail_barang($idbarang,$qtybes,$satuanbes,$modal,$hargabeli,$disc,$disc1,$jam); //dihapus ,$disc2
			echo json_encode($data);
			
		}
		function input_detail_retur(){
			
			$data=$this->Model_penjualan->input_detail_retur($idplg,$idbrg,$qty,$satuan,$hargajual,$diskon1,$diskon2,$jam); //dihapus ,$disc2
			echo json_encode($data);
			
		}
		function input_detail_retur1(){
			
			$data=$this->Model_penjualan->input_detail_retur1($noju,$idbarang,$qtybes,$satuanbes,$modal,$hargabeli,$disc,$disc1); //dihapus ,$disc2
			echo json_encode($data);
			
		}
		function input_detail_retur2(){
			
			$data=$this->Model_penjualan->input_detail_retur2($idpelanggan,$idbarang,$qtybes,$satuanbes,$modal,$hargabeli,$disc,$disc1); //dihapus ,$disc2
			echo json_encode($data);
			
		}
		function input_detail(){
			
			$data=$this->Model_penjualan->input_detail($idbarang,$hargasatuan,$satuanbesar,$jmlkrm,$noju); //dihapus ,$disc2
			echo json_encode($data);
			
		}
		
		function view_detail(){
			$data['list_tmp'] = $this->Model_penjualan->view_detail();
			$this->load->view('Surat_jalan/data_tmp',$data);
		}
		function retur_tmp(){
			$data['retur_tmp'] = $this->Model_penjualan->retur_tmp();
			$this->load->view('Penjualan/retur_tmp',$data);
		}
		function edit_detail(){
			$this->load->view('Penjualan/detail_edit');
		}
		
		
		function view_cash(){
			$data['list_tmp'] = $this->Model_penjualan->view_detail_barang();
			$data['listpenjualan'] = $this->Model_penjualan->view_cash();
			$this->template->load('template','Penjualan/view_cash',$data);
			
		}
		
		
		function cetak_retur(){	
			$data['d'] = $this->Model_penjualan->get2()->row_array();
			$this->load->view('Penjualan/cetak_retur',$data);
			
		}
		function cetak_list(){	
			$data['d'] = $this->Model_penjualan->get3()->row_array();	
			$this->load->view('Penjualan/cetak_list',$data);
			
		}
		function cetak_a4_retur(){	
			$data['d'] = $this->Model_penjualan->get2()->row_array();	
			$this->load->view('Penjualan/cetak_a4_retur',$data);
			
		}
		function retur_detail(){
			$id = $this->input->post('id_barang');
			$data['listretur'] = $this->Model_penjualan->view_detail_retur1($id);
			$this->load->view('Penjualan/retur_detail',$data);
			
		}
		
		function detail_data(){
			$id = $this->input->post('id_barang');
			$data['listdetail'] = $this->Model_penjualan->detail_penjualan($id);
			$data['listretur'] = $this->Model_penjualan->detail_retur($id);
			$this->load->view('Penjualan/data_detail',$data);
			
		}
		function penjualan_data(){
			$id = $this->input->post('no_jual');
			$data['penjualan_data'] = $this->Model_penjualan->penjualan_data($id);
			$this->load->view('Penjualan/penjualan_data',$data);
			
		}
		function detail_retur(){
			$id = $this->input->post('id_barang');
			$data['listdetail'] = $this->Model_penjualan->detail_penjualan($id);
			$data['listretur'] = $this->Model_penjualan->detail_retur($id);
			$this->load->view('Penjualan/detail_retur',$data);
			
		}
		function view_detail_retur(){
			
			$data['list_tmp'] = $this->Model_penjualan->view_detail_retur();
			$this->load->view('Penjualan/data_retur_tmp',$data);
			
		}
		function view_detail_barang(){
			
			$data['list_tmp'] = $this->Model_penjualan->view_detail_barang();
			$this->load->view('Penjualan/data_tmp',$data);
			
		}
		
		function view_detail_barang2(){
			$data['list_retur'] = $this->Model_penjualan->view_detail_retur();
			$data['list_tmp'] = $this->Model_penjualan->view_detail_barang();
			$this->load->view('Penjualan/data_tmp_tt',$data);
			
		}
		function view_total_retur(){
			$data['list_retur'] = $this->Model_penjualan->retur_tmp();
			$this->load->view('Penjualan/data_tmp_rr',$data);
			
		}
		
		function view_retur_total(){
			$data['list_retur'] = $this->Model_penjualan->retur_tmp();
			$this->load->view('Penjualan/retur_tmp_tt',$data);
		}
		function view_detail_barang3(){
			$data['list_retur'] = $this->Model_penjualan->view_detail_retur();
			$data['list_tmp'] = $this->Model_penjualan->view_detail_barang();
			$this->load->view('Penjualan/p_walk1',$data);
			
		}
		function view_detail_barang4(){
			$data['retur_tmp'] = $this->Model_penjualan->retur_tmp();
			$data['list_tmp'] = $this->Model_penjualan->view_detail_barang();
			$this->load->view('Penjualan/p_walk2',$data);
			
		}
		function hapusitem()
		{
			$id_barang = $this->input->get('id');
			$result = $this->Model_penjualan->hapusitem($id_barang);
		}
		function cek_stok(){
			$data=$this->Model_penjualan->stok($kode);
			echo json_encode($data);
		}
		
	}
	?>