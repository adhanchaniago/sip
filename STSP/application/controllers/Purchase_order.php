<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Purchase_order extends CI_Controller {

	function __construct(){
		parent:: __construct();
		ceklogin();
		$this->load->library('form_validation','session');
		$this->load->Model(array('Model_pelanggan','Model_supplier','Model_kategori','Model_barang','Model_purchase','Model_pembelian'));
	}
	function cekbarang(){
		$user = $this->session->userdata('username');
		$cek 			= $this->db->query("SELECT * FROM tb_detail_b_barangpo WHERE user = '$user'")->num_rows();
		echo $cek;

	}
	function cekbarangpo(){
		$user = $this->session->userdata('username');
		$cek 			= $this->db->query("SELECT * FROM tb_tmp_po WHERE user = '$user'")->num_rows();
		echo $cek;

	}

	function maskmoney(){

		$this->load->view('pembelian/maskmoney');

	}

	function input_purchase(){

		if(isset($_POST['submit'])){
			
			$this->Model_purchase->insert_pembelian();
			
		}if(isset($_POST['submit2'])){
			$this->Model_purchase->insert_pembelian_cetak();
			
		}if(isset($_POST['submit3'])){
			$this->Model_purchase->insert_pembelian_cetakk();
			
		}else{
			$a = $this->Model_purchase->getNomorterakhir()->row_array();
                            //Mengambil Tahun di Sistem
			$tahun    = date('y');
			$id       = ('PO');
			$id1       = ('-');
			$c = array('','I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII');
			$bln		= $c[date('n')];
			$format   = $tahun.$id.$id1.$bln;
			
			$data['autonumber'] 	= buatkode($a['no_beli'],$format,4);
			$data['listpelanggan']  = $this->Model_purchase->view_supplier_mu();
			$data['list_barang'] = $this->Model_barang->view_barang();
			$data['list_barang']	= $this->Model_barang->view_barang();
			$data['list_tmp'] = $this->Model_purchase->view_detail_barang();
			$data['nopo'] = $this->Model_purchase->view_po();
			
			$this->template->load('template','Purchase_order/input_purchase',$data);
		}
	}
	
	function edit_Pembelian(){

		if(isset($_POST['submit'])){
			$this->Model_purchase->update_pembelian();
		}else{

			$data['p'] 			= $this->Model_purchase->get_retur()->row_array();
			$data['alasan'] 	= $this->Model_purchase->view_alasan_edit();
			$this->template->load('template','Purchase_order/edit_pembelian',$data);
		}
	}
	function riset(){ 
		$query = "truncate tb_barang_edit";
		$this->db->query($query);
		$no_edit = $this->uri->segment(3);
		$sql = "DELETE FROM edit_pb WHERE no_edit = '$no_edit'";
		$this->db->query($sql);
		redirect('Pembelian/view_pembelian');
	}
	function input_po(){

		if(isset($_POST['submit'])){
			$this->Model_pembelian->input_po();
		}if(isset($_POST['submit2'])){
			$this->Model_pembelian->input_po_cetak();
		}else{
			$a = $this->Model_pembelian->getNomorterakhir5()->row_array();
                            //Mengambil Tahun di Sistem
			$tahun    = date('y');
			$id       = ('PO');
			$id1       = ('-');
			$c = array('','I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII');
			$bln		= $c[date('n')];
			$format   = $tahun.$id.$id1.$bln;
			$b = $this->Model_pembelian->getNomorterakhirpj()->row_array();
                            //Mengambil Tahun di Sistem
			$tahun    = date('y');
			$id       = ('B');
			$id1       = ('-');
			$c = array('','I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII');
			$bln		= $c[date('n')];
			$format1   = $tahun.$id.$id1.$bln;
			
			$data['autonumber'] 	= buatkode($a['no_po'],$format,4);
			$data['autonumber1'] 	= buatkode($b['no_jual'],$format1,4);
			$data['listpelanggan']  = $this->Model_pelanggan->view_pelanggan();
			$data['listsupplier']  = $this->Model_supplier->view_supplier_mu();
			$data['list_po'] = $this->Model_pembelian->view_po();
			$this->template->load('template','Pembelian/input_po',$data);
		}
	}
	function input_retur(){

		if(isset($_POST['submit'])){
			
			$this->Model_purchase->insert_retur();
			
		}else{
			$a = $this->Model_purchase->getRetur()->row_array();
                            //Mengambil Tahun di Sistem
			$tahun    = date('y');
			$id       = ('RPO');
			$id1       = ('-');
			$c = array('','I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII');
			$bln		= $c[date('n')];
			$format   = $tahun.$id.$id1.$bln;			
			$data['autonumber'] 	= buatkode($a['no_retur'],$format,4);
			$data['listsupplier']  = $this->Model_supplier->view_supplier();
			$data['p'] 				= $this->Model_purchase->get_retur()->row_array();
			$this->template->load('template','Purchase_order/input_retur',$data);
		}
	}
	
	function riset2(){	
		$query = "truncate tb_tmp_po";
		$this->db->query($query);
		redirect('Pembelian/input_po');

	}
	function riset3(){	
		$user = $this->session->userdata('username');
		$query = "DELETE FROM tb_retur_po_tmp WHERE user = '$user'";
		$this->db->query($query);
		redirect('Purchase_order/view_purchase');

	}
	function cetak_po(){	
		$data['d'] = $this->Model_pembelian->get_po()->row_array();	
		$this->load->view('Pembelian/cetak',$data);

	}
	
	function cetak_nota(){	
		$data['d'] = $this->Model_pembelian->get1()->row_array();
		$this->load->view('Pembelian/cetak_a4',$data);

	}
	public function destroy_edit($user,$id_barang)
	{
		$data=$this->Model_purchase->delete_edit($user,$id_barang);
		$data = ['success'=>200];

		echo json_encode($data);
	}
	public function destroy_retur($user,$id_barang)
	{
		$data=$this->Model_purchase->delete_barang_retur($user,$id_barang);
		$data = ['success'=>200];

		echo json_encode($data);
	}
	public function destroy($user,$id_barang)
	{
		$data=$this->Model_purchase->delete($user,$id_barang);
		$data = ['success'=>200];

		echo json_encode($data);
	}
	public function destroy2($id_brg,$user)
	{
		$data=$this->Model_pembelian->delete_retur($user,$id_brg);
		$data = ['success'=>200];

		echo json_encode($data);
	}
	public function destroy3($user,$idbarang)
	{
		$data=$this->Model_pembelian->delete_kirim($user,$idbarang);
		$data = ['success'=>200];

		echo json_encode($data);
	}
	public function destroy4($user,$idbarang)
	{
		$data=$this->Model_pembelian->delete_po($user,$idbarang);
		$data = ['success'=>200];

		echo json_encode($data);
	}
	function data_barang(){
		$data=$this->Model_pembelian->barang_list();
		echo json_encode($data);
	}
	function get_data_retur() {    
		$keyword = $this->uri->segment(3);
		$nono = $this->uri->segment(4);
		$data = $this->db->query("SELECT * FROM tb_detail_pembelianpo INNER JOIN tb_barang ON tb_detail_pembelianpo.id_barang = tb_barang.id_barang 
			WHERE nama_barang LIKE '%$nono%' AND no_beli = '$keyword' ");       
		
		foreach($data->result() as $row)
		{
			$arr['query'] = $keyword.$nono;
			$arr['suggestions'][] = array(
				'value'    		  =>$row->nama_barang,
				'id_barang'    	  =>$row->id_barang,
				'nama_barang'  	  =>$row->nama_barang,
				'stok'   		  =>$row->stok,
				'qty_b'   		  =>$row->qtyb,
				'satuan_besar'    =>$row->satuan_besar,
				'harga_beli1'     =>$row->harga_beli/$row->kurs_tukar,
				'harga_beli'      =>$row->harga_beli/$row->kurs_tukar,
				'kurs_tukar'      =>$row->kurs_tukar,
				'modal_t'    	  =>number_format($row->modal_t,0,',',','),
				'modal'    		  =>number_format($row->modal,0,',',','),
				'disc'   		  =>$row->disc,
				'disc1'   		  =>$row->disc1,
				'disc2'   		  =>$row->disc2,
			);
		}
		echo json_encode($arr);
	}
	public function get_data() {    
		$this->load->model('Model_barang');
		$keyword = $this->uri->segment(3);
		$data = $this->db->from('tb_barang')->like('nama_barang',rawurldecode($keyword),$keyword)->where('jual = "Y"')->get();            

		foreach($data->result() as $row)
		{
			$arr['query'] = $keyword;
			$arr['suggestions'][] = array(
				'value'    		  =>$row->nama_barang,
				'id_barang'    	  =>$row->id_barang,
				'nama_barang'      =>$row->nama_barang,
				'satuan_besar'    =>$row->satuan_besar,
				'qty_b'   		  =>$row->qty_b,
				'stok'   		  =>$row->stok + $row->po,
				'satuan_kecil'    =>$row->satuan_kecil,
				'qty_k'    		  =>$row->qty_k,
				'modal_status'    =>number_format($row->modal_status,0,',',','),
				'modal'    		  =>number_format($row->modal,0,',',','),
				'modal_t'    	  =>$row->modal_t,
				'mod'    		  =>$row->modal_t,
				'rupiah'    	  =>$row->modal_t,
				'pricelist'       =>number_format($row->pricelist,0,',',','),
				'pl1'       	  =>$row->pricelist,
				'harga_jual'      =>number_format($row->harga_jual,0,',',','),
				'hajul1'      	  =>$row->harga_jual,
				'walk'    		  =>number_format($row->walk,0,',',','),
				'walkk1'    	  =>$row->walk,
				'tk'    		  =>number_format($row->tk,0,',',','),
				'tkw1'    		  =>$row->tk,
				'tb'    		  =>number_format($row->tb,0,',',','),
				'tbn1'    		  =>$row->tb,
				'sls'    		  =>number_format($row->sls,0,',',','),
				'slss1'    		  =>$row->sls,
			);
		}
		echo json_encode($arr);
	}
	
	
	
	public function get_data_edit() {    
		$keyword = $this->uri->segment(3);
		$nono 	 = $this->uri->segment(4);
		$data 	 = $this->db->query("SELECT * FROM tb_detail_pembelianpo INNER JOIN tb_barang ON tb_detail_pembelianpo.id_barang = tb_barang.id_barang 
			WHERE nama_barang LIKE '%$nono%' AND no_beli = '$keyword' "); 

		foreach($data->result() as $row)
		{
			$arr['query'] = $keyword.$nono;
			$arr['suggestions'][] = array(
				'value'    		  =>$row->nama_barang,
				'id_barang'    	  =>$row->id_barang,
				'nama_barang'      =>$row->nama_barang,
				'satuan_besar'    =>$row->satuan_besar,
				'qty_b'   		  =>$row->qty_b,
				'qtyb'   		  =>$row->qtyb,
				'stok'   		  =>$row->stok,
				'satuan_kecil'    =>$row->satuan_kecil,
				'qty_k'    		  =>$row->qty_k,
				'modal_status'    =>number_format($row->modal_status,0,',','.'),
				'mod'    		  =>$row->modal,
				'modal'    		  =>number_format($row->modal,0,',','.'),
				'modal_t'    	  =>$row->modal_t,
				'pricelist'       =>number_format($row->pricelist,0,',',','),
				'pl1'       	  =>$row->pricelist,
				'harga_jual'      =>number_format($row->harga_jual,0,',',','),
				'hajul1'      	  =>$row->harga_jual/$row->kurs_tukar,
				'harga_beli1'     =>$row->harga_beli/$row->kurs_tukar,
				'harga_beli'      =>$row->harga_beli/$row->kurs_tukar,
				'walk'    		  =>number_format($row->walk,0,',',','),
				'walkk1'    	  =>$row->walk,
				'tk'    		  =>number_format($row->tk,0,',',','),
				'tkw1'    		  =>$row->tk,
				'tb'    		  =>number_format($row->tb,0,',',','),
				'tbn1'    		  =>$row->tb,
				'sls'    		  =>number_format($row->sls,0,',',','),
				'slss1'    		  =>$row->sls,
				'disc'    		  =>$row->disc,
				'disc1'    		  =>$row->disc1,
				'disc2'    		  =>$row->disc2,
			);
		}
		echo json_encode($arr);
	}
	
	
	function input_detail_barang(){
		
			$data=$this->Model_purchase->input_detail_barang($idbarang,$modalterakhir,$handling,$modalt,$stok,$qtybes,$satuanbes,$modal,$hargabeli,$modal,$ppn,$disc,$disc1,$disc2,$jam,$pl,$hajul,$walkk,$tkw,$tbn,$slss,$kurs,$simbol); //dihapus ,$disc2
			echo json_encode($data);

		}
		function update_harga(){

			$data=$this->Model_pembelian->update_harga($idbar,$pl,$hajul,$walkk,$tkw,$tbn,$slss); //dihapus ,$disc2
			echo json_encode($data);

		}
		function input_detail_po(){

			$data=$this->Model_pembelian->input_detail_po($idbarang,$kurs,$kodemu,$qtybes,$satuanbes,$jam); //dihapus ,$disc2
			echo json_encode($data);

		}
		function input_detail_po_edit(){

			$data=$this->Model_pembelian->input_detail_po_edit($idbarang,$qtybes,$satuanbes,$jam); //dihapus ,$disc2
			echo json_encode($data);

		}
		function input_barang_edit(){

			$data=$this->Model_purchase->input_barang_edit($nobel,$idbarang,$modalt,$stok,$qtybes,$satuanbes,$hargabeli,$modal,$ppn,$disc,$disc1,$disc2,$jam,$pl,$hajul,$walkk,$tkw,$tbn,$slss,$modal_terakhir); //dihapus ,$disc2
			echo json_encode($data);

		}
		function input_barang_retur(){

			$data=$this->Model_purchase->input_barang_retur($noretur,$nobel,$idbarang,$modalt,$stok,$qtybes,$satuanbes,$modal,$hargabeli,$modal,$ppn,$disc,$disc1,$disc2,$jam,$kurs,$simbol); //dihapus ,$disc2
			echo json_encode($data);

		}
		function input_detail_retur(){

			$data=$this->Model_pembelian->input_detail_retur($idbrg,$qty,$satuan,$hargajual,$ppnan,$diskon1,$diskon2,$diskon3,$jam1); //dihapus ,$disc2
			echo json_encode($data);

		}
		function input_detail(){

			$data=$this->Model_pembelian->input_detail($idbarang,$satuanbesar,$jmlkrm,$noju); //dihapus ,$disc2
			echo json_encode($data);

		}

		function view_detail(){
			$data['list_tmp'] = $this->Model_pembelian->view_detail();
			$this->load->view('Surat_jalan/data_tmp',$data);
		}
		function view_detail_po(){
			$data['list_po'] = $this->Model_pembelian->view_detail_po();
			$this->load->view('Pembelian/data_tmp_po',$data);
		}
		function view_detail_po_edit(){
			$data['list_po'] = $this->Model_pembelian->view_detail_po();
			$this->load->view('Pembelian/data_tmp_po',$data);
		}
		function view_purchase(){
			$data['pembelian'] = $this->Model_purchase->view_purchase();  
			$this->template->load('template','Purchase_order/view_purchase',$data);

		}

		function view_retur(){
			$id = $this->input->post('no_beli');
			$data['listretur'] = $this->Model_purchase->view_retur();
			$data['list_tmp'] = $this->Model_purchase->view_detail_barang_retur();
			$this->template->load('template','Purchase_order/view_retur',$data);

		}
		function looping_edit(){
			$id = $this->input->post('no_beli');
			$data['edit'] = $this->Model_purchase->looping_edit($id);
			$data['edit1'] = $this->Model_purchase->view_edit($id);
			$this->load->view('Purchase_order/alasan_edit',$data);
		}
		function looping_edit_po(){
			$id = $this->input->post('no_po');
			$data['edit'] = $this->Model_pembelian->looping_edit_po($id);
			$data['edit1'] = $this->Model_pembelian->view_alasan_edit_po($id);
			$this->load->view('Pembelian/alasan_edit_po',$data);
		}
		function looping_cetak_po(){
			$id = $this->input->post('no_po');
			$data['cetak'] = $this->Model_pembelian->looping_cetak_po($id);
			$data['cetak1'] = $this->Model_pembelian->view_alasan_cetak_po($id);
			$this->load->view('Pembelian/print',$data);
		}
		function alasan_cetak_po(){
			if(isset($_POST['submit'])){	
				$no_po = $this->input->post('no_po');
				$alasan_cetak = $this->input->post('alasan_cetak');
				$cetak = $this->input->post('cetak');
				$looping_cetak = $this->db->get_where('tb_po',array('no_po'=>$no_po))->row_array();
				$cetakan = $looping_cetak['cetak'];
				if($cetakan > 2){
					$this->session->set_flashdata("message","<script> alert('Oops.. Gak Bisa Ngeprint Lagi')</script>");
					redirect('Pembelian/input_po');
				}else{
					$data = array(
						'no_po'        => $no_po,
						'alasan_cetak' => $alasan_cetak,
						'cetak' 	   => $cetak,
					);
					$this->db->insert('cetak_po',$data);
					$this->db->query("UPDATE tb_po SET cetak = cetak + '$cetak' WHERE no_po = '$no_po'");
					redirect('Pembelian/cetak_po/'.$no_po);
				}
			}
		}
		function looping_batal(){
			$id = $this->input->post('no_po');
			$data['batal'] = $this->Model_pembelian->looping_batal($id);
			$this->load->view('Pembelian/pembatalan',$data);
		}
		function pembatalan(){
			if(isset($_POST['submit'])){	
				$no_po = $this->input->post('no_po');
				$batal = $this->input->post('batal');


				$data = array(
					'no_po'        => $no_po,
					'batal' 	   => $batal,
				);
				$this->db->where('no_po',$no_po);
				$this->db->update('tb_po',$data);
				$data = $this->db->from('tb_detail_po')->like('no_po',$no_po)->get();
				foreach($data->result() as $h){
					$this->db->query("UPDATE tb_barang SET stok = stok - '$h->qty',po = po - '$h->qty' WHERE id_barang = '$h->id_barang'");
				}
				$this->db->query("UPDATE tb_detail_po SET stok = 0 WHERE no_po = '$no_po'");
				redirect('Pembelian/input_po/');
			}
		}
		function update_edit(){
			if(isset($_POST['submit'])){
				$a = $this->Model_pembelian->getNomorterakhir7()->row_array();
                            //Mengambil Tahun di Sistem
				$tahun    = date('y');
				$id       = ('A');
				$id1       = ('-');
				$c = array('','I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII');
				$bln		= $c[date('n')];
				$format   = $tahun.$id.$id1.$bln;

				$data['autonumber'] 	= buatkode($a['no_edit'],$format,4);
				$no_edit	= $data['autonumber'];
				$no_beli = $this->input->post('no_beli');
				$alasan_edit = $this->input->post('alasan_edit');
				$edit = $this->input->post('edit');
				$data = array(
					'no_edit'      => $no_edit,
					'no_beli'      => $no_beli,
					'alasan_edit'  => $alasan_edit,
					'edit' 	   	   => $edit,
					'user' 	   	   => $this->session->userdata('username'),
				);
				$this->db->insert('edit_pb',$data);
				redirect('Pembelian/edit_pembelian/'.$no_beli);	
			}
		}
		function alasan_edit_po(){
			if(isset($_POST['submit'])){
				$no_po = $this->input->post('no_po');
				$alasan_edit = $this->input->post('alasan_edit');
				$data = array(
					'no_po'      	=> $no_po,
					'alasan_edit'  => $alasan_edit,
					'user' 	   	   => $this->session->userdata('username'),
				);
				$this->db->insert('tmp_edit_po',$data);
				redirect('Pembelian/edit_po/'.$no_po);	
			}
		}
		function alasan_edit_pembelian(){
			if(isset($_POST['submit'])){
				$no_beli = $this->input->post('no_beli');
				$alasan_edit = $this->input->post('alasan_edit');
				$data = array(
					'no_beli'      => $no_beli,
					'alasan_edit'  => $alasan_edit,
					'user' 	   	   => $this->session->userdata('username'),
				);
				$this->db->insert('t_editpo',$data);
				redirect('Purchase_order/edit_Pembelian/'.$no_beli);	
			}
		}
		function edit_po(){

			if(isset($_POST['submit'])){
				$this->Model_pembelian->edit();
			}else{
				
				$data['p'] 	= $this->Model_pembelian->get_po()->row_array();
				$data['edit'] 	= $this->Model_pembelian->tmp_edit_po();
				$data['pelanggan']  = $this->Model_pelanggan->view_pelanggan();
				$data['supplier']  = $this->Model_supplier->view_supplier();
				$data['nojual']  = $this->Model_penjualan->view_penjualan();
				$this->template->load('template','Pembelian/edit_po',$data);
			}
		}
		function riset_edit_po(){
			$user = $this->session->userdata('username');;
			$sql = "DELETE FROM tmp_edit_po WHERE user = '$user'";
			$this->db->query($sql);
			redirect('Pembelian/input_po');
		}
		function riset_edit_pembelian(){
			$user = $this->session->userdata('username');
			$query = "DELETE FROM tb_detail_b_barangpo WHERE user = '$user'";
			$this->db->query($query);
			redirect('Purchase_order/input_purchase');
		}
		function view_cash(){
			$data['list_tmp'] = $this->Model_pembelian->view_detail_barang();
			$data['listPembelian'] = $this->Model_pembelian->view_cash();
			$this->template->load('template','Pembelian/view_cash',$data);

		}
		function detail_po(){
			$id = $this->input->post('id_barang');
			$data['detail_po'] = $this->Model_pembelian->detail_po($id);
			$this->load->view('Pembelian/data_po',$data);
		}
		function detail_data(){
			$id = $this->input->post('id_barang');
			$data['listdetail'] = $this->Model_purchase->detail_purchase($id);
			$this->load->view('Purchase_order/data_detail',$data);

		}
		function detail_retur_po(){
			$id = $this->input->post('id_barang');
			$data['listdetail'] = $this->Model_purchase->detail_retur_po($id);
			$this->load->view('Purchase_order/detail_retur_pb',$data);

		}
		function Pembelian_data(){
			$id = $this->input->post('no_jual');
			$data['Pembelian_data'] = $this->Model_pembelian->Pembelian_data($id);
			$this->load->view('Pembelian/Pembelian_data',$data);

		}
		function detail_retur(){
			$id = $this->input->post('id_barang');
			$data['listdetail'] = $this->Model_purchase->detail_Pembelian($id);
			$data['listretur'] = $this->Model_purchase->detail_retur($id);
			$this->load->view('Purchase_order/detail_retur',$data);

		}
		function view_detail_retur(){
			
			
			$data['list_tmp'] = $this->Model_pembelian->view_detail_retur();
			$this->load->view('Pembelian/data_retur_tmp',$data);
			
		}
		function view_detail_barang(){
			
			$data['list_tmp'] = $this->Model_purchase->view_detail_barang();
			$this->load->view('Purchase_order/data_tmp',$data);
			
		}
		function view_detail_barang_retur(){
			
			$data['list_tmp'] = $this->Model_pembelian->view_detail_barang_retur();
			$this->load->view('Pembelian/data_retur_tmp',$data);
			
		}
		
		function view_detail_barang2(){
			$data['list_tmp'] = $this->Model_purchase->view_detail_barang();
			$this->load->view('Purchase_order/data_tmp_tt',$data);
			
		}
		function view_detail_barang3(){
			$data['list_tmp'] = $this->Model_purchase->view_detail_barang();
			$this->load->view('Purchase_order/p_walk1',$data);
			
		}
		function view_barang_edit(){
			
			$data['list_tmp'] = $this->Model_purchase->view_barang_edit();
			$this->load->view('Purchase_order/data_tmp_edit',$data);
			
		}
		function view_barang_edit2(){
			$data['list_tmp'] = $this->Model_purchase->view_barang_edit();
			$this->load->view('Purchase_order/data_tmp_tt_edit',$data);
			
		}
		function view_barang_edit3(){
			$data['list_tmp'] = $this->Model_purchase->view_barang_edit();
			$this->load->view('Purchase_order/p_walk2',$data);
			
		}
		
		function view_barang_retur(){
			
			$data['list_tmp'] = $this->Model_purchase->view_detail_barang_retur();
			$this->load->view('Purchase_order/data_tmp_retur',$data);
			
		}
		function view_barang_retur2(){ 
			
			$data['list_tmp'] = $this->Model_purchase->view_detail_barang_retur();
			$this->load->view('Purchase_order/data_tmp_tt_retur',$data);
			
		}
		function view_barang_retur3(){
			
			$data['list_tmp'] = $this->Model_purchase->view_detail_barang_retur();
			$this->load->view('Purchase_order/p_walk3',$data);
			
		}
		
	}
	?>