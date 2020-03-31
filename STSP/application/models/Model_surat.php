<?php

class Model_surat extends CI_Model{
	
	
	function get(){
		$no_jl = $this->uri->segment(3);
		$query = "SELECT *,tb_penjualan.no_reff as no_roff,tb_penjualan.keterangan as keterangan
		FROM tb_penjualan 
		INNER JOIN tb_pelanggan ON tb_penjualan.id_pelanggan=tb_pelanggan.id_pelanggan
		WHERE tb_penjualan.no_jual ='$no_jl'";
		return $this->db->query($query);
		return $this->db->get_where('tb_penjualan',array('no_jl'=>$no_jl));
	}
	public function getAllSurat($offset, $limit){
		$query = $this->db->query("SELECT tb_sj.no_jl,tb_sj.no_sj,tb_sj.stok,tb_sj.no_reff,tb_sj.status_kirim,tb_sj.no_sjln,tb_sj.no_urut,tb_sj.keterangan,tb_sj.ke_alamat,tb_pelanggan.id_pelanggan,nama_pelanggan
			FROM tb_sj INNER JOIN tb_pelanggan ON tb_sj.id_pelanggan = tb_pelanggan.id_pelanggan WHERE tb_sj.status_kirim = 1 ORDER BY tb_sj.no_jl DESC LIMIT $offset, $limit");
		return $query;
	}
	public function getAllSurat_count(){
		$query = $this->db->query("SELECT * FROM tb_sj");
		return $query->num_rows();
	}
	public function getAllHistori($offset1, $limit1){
		$query = $this->db->query("SELECT tb_kirim.no_jln,tb_kirim.no_sj,tb_kirim.cetak,tb_kirim.alasan_cetak,tb_kirim.no_jl,tb_kirim.no_sjln,tb_kirim.noreff,tb_kirim.id_pelanggan,tb_kirim.tgl,tb_kirim.user,tb_kirim.ke_alamat,tb_kirim.keterangan,tb_pelanggan.id_pelanggan,nama_pelanggan
			FROM tb_kirim INNER JOIN tb_pelanggan ON tb_kirim.id_pelanggan = tb_pelanggan.id_pelanggan ORDER BY tb_kirim.no_sj DESC LIMIT $offset1, $limit1");
		return $query;
	}
	public function getAllHistori_count(){
		$query = $this->db->query("SELECT * FROM tb_kirim");
		return $query->num_rows();
	}
	public function getAllSJretur($offset2, $limit2){
		$query = $this->db->query("SELECT sj_retur.no_sj_retur,sj_retur.no_sj,sj_retur.no_sjl,sj_retur.no_sjln,sj_retur.noreff,sj_retur.tgl,sj_retur.user,sj_retur.keterangan,tb_pelanggan.id_pelanggan,nama_pelanggan
			FROM sj_retur INNER JOIN tb_pelanggan ON sj_retur.id_pelanggan = tb_pelanggan.id_pelanggan  ORDER BY sj_retur.no_sj_retur DESC LIMIT $offset2, $limit2");
		return $query;
	}
	public function getAllSJretur_count(){
		$query = $this->db->query("SELECT * FROM sj_retur");
		return $query->num_rows();
	}
	function looping_cetak_retur($id){
		$query = "SELECT * from sj_retur where no_sj_retur = '$id'";
		return $this->db->query($query);
	}

	
	function get1(){
		$no_kirim = $this->uri->segment(3);
		$query2 = "SELECT tb_kirim.no_kirim,tb_kirim.no_sj,tb_kirim.no_jl,tb_kirim.noreff,tb_kirim.no_sjln,tb_kirim.id_pelanggan,nama_pelanggan,tb_kirim.ke_alamat,tb_kirim.keterangan,tb_kirim.user,tb_pelanggan.no_reff,tb_kirim.tgl,tb_kirim.user FROM tb_kirim INNER JOIN tb_pelanggan ON tb_kirim.id_pelanggan = tb_pelanggan.id_pelanggan WHERE tb_kirim.no_kirim = '$no_kirim'";
		return $this->db->query($query2);
		return $this->db->get_where('tb_kirim',array('no_kirim'=>$no_kirim));
	}
	function get5(){
		$no_kirim = $this->uri->segment(3);
		$query2 = "SELECT tb_kirim.no_kirim,tb_kirim.no_so,tb_kirim.no_reff_sj,tb_kirim.no_reff_so,tb_kirim.id_pelanggan,nama_pelanggan,tb_kirim.ke_alamat,tb_kirim.keterangan,tb_kirim.user,tb_kirim.tgl,tb_kirim.user FROM tb_kirim INNER JOIN tb_pelanggan ON tb_kirim.id_pelanggan = tb_pelanggan.id_pelanggan WHERE tb_kirim.no_kirim = '$no_kirim'";
		return $this->db->query($query2);
		return $this->db->get_where('tb_kirim',array('no_kirim'=>$no_kirim));
	}
	function get2(){
		$no_kirim = $this->uri->segment(3);
		$query2 = "SELECT tb_kirim.no_jl,tb_kirim.no_sj,tb_kirim.no_sjln,tb_kirim.noreff, tb_kirim.no_jl,tb_kirim.id_pelanggan,nama_pelanggan,tb_kirim.no_jln,tb_kirim.tgl,tb_kirim.ke_alamat,tb_kirim.keterangan,tb_detail_kirim.id_barang,nama_barang,tb_detail_kirim.satuan_besar,tb_detail_kirim.jml_krm FROM tb_kirim INNER JOIN tb_detail_kirim ON tb_kirim.no_sj=tb_detail_kirim.no_sj INNER JOIN tb_pelanggan ON tb_kirim.id_pelanggan=tb_pelanggan.id_pelanggan INNER JOIN tb_barang ON tb_detail_kirim.id_barang=tb_barang.id_barang WHERE tb_kirim.no_kirim = '$no_kirim'";
		return $this->db->query($query2);
		return $this->db->get_where('tb_kirim',array('no_jl'=>$no_jl));
	}
	function get3(){
		$no = $this->uri->segment(3);
		$query3 = "SELECT tb_detail_kirim.no,tb_detail_kirim.no_sj,tb_detail_kirim.ket_edit,tb_detail_kirim.no_jl,tb_detail_kirim.id_barang,nama_barang,tb_detail_kirim.satuan_besar,tb_detail_kirim.jml_krm FROM tb_detail_kirim INNER JOIN tb_barang ON tb_detail_kirim.id_barang=tb_barang.id_barang WHERE tb_detail_kirim.no = '$no'";
		return $this->db->query($query3);
		return $this->db->get_where('tb_detail_kirim',array('no'=>$no));
	}
	function getretur(){
		$no_kirim = $this->uri->segment(3);
		$query3 = "SELECT * FROM tb_kirim INNER JOIN tb_pelanggan ON tb_kirim.id_pelanggan = tb_pelanggan.id_pelanggan WHERE tb_kirim.no_kirim = '$no_kirim'";
		return $this->db->query($query3);
		return $this->db->get_where('tb_kirim',array('no_kirim'=>$no_kirim));
	}
	function get4(){
		$no_sj_retur = $this->uri->segment(3);
		$query3 = "SELECT sj_retur.no_sj_retur,sj_retur.no_sj,sj_retur.no_sjln,sj_retur.noreff,sj_retur.tgl,sj_retur.user,sj_retur.keterangan,tb_pelanggan.id_pelanggan,nama_pelanggan
		FROM sj_retur INNER JOIN tb_pelanggan ON sj_retur.id_pelanggan = tb_pelanggan.id_pelanggan WHERE sj_retur.no_sj_retur = '$no_sj_retur'";
		return $this->db->query($query3);
		return $this->db->get_where('sj_retur',array('no_sj_retur'=>$no_sj_retur));
	}
	function get6(){
		$no_sj_retur = $this->uri->segment(3);
		$query3 = "SELECT sj_retur.no_sj_retur,sj_retur.no_sj,sj_retur.no_sjln,sj_retur.tgl,sj_retur.user,sj_retur.keterangan,tb_pelanggan.id_pelanggan,nama_pelanggan
		FROM sj_retur INNER JOIN tb_pelanggan ON sj_retur.id_pelanggan = tb_pelanggan.id_pelanggan WHERE sj_retur.no_sj_retur = '$no_sj_retur'";
		return $this->db->query($query3);
		return $this->db->get_where('sj_retur',array('no_sj_retur'=>$no_sj_retur));
	}
	
	function view_sj(){
		$query = "SELECT tb_sj.no_jl,tb_sj.no_sj,tb_sj.stok,tb_sj.no_reff,tb_sj.status_kirim,tb_sj.status_terkirim,tb_sj.no_sjln,tb_sj.no_urut,tb_sj.keterangan,tb_sj.ke_alamat,tb_pelanggan.id_pelanggan,nama_pelanggan
		FROM tb_sj INNER JOIN tb_pelanggan ON tb_sj.id_pelanggan = tb_pelanggan.id_pelanggan WHERE tb_sj.status_kirim = 1 AND acc = 0 ORDER BY tb_sj.no_jl desc";
		return $this->db->query($query);
		
	}
	function view_sj_rtr(){
		$query = "SELECT sj_retur.no_sj_retur,sj_retur.cetak,sj_retur.no_sj,sj_retur.no_sjln,sj_retur.tgl,sj_retur.user,sj_retur.keterangan,tb_pelanggan.id_pelanggan,nama_pelanggan
		FROM sj_retur INNER JOIN tb_pelanggan ON sj_retur.id_pelanggan = tb_pelanggan.id_pelanggan  ORDER BY sj_retur.no_sj_retur desc";
		return $this->db->query($query);
		
	}
	function view_sj1($id){
		$query = "SELECT tb_kirim.no_sj,tb_kirim.no_jl,tb_kirim.no_jln,tb_detail_kirim.id_barang,tb_detail_kirim.satuan_besar,tb_detail_kirim.jml_krm,tb_barang.nama_barang 
		FROM tb_kirim INNER JOIN tb_detail_kirim ON tb_kirim.no_sj = tb_detail_kirim.no_sj INNER JOIN tb_barang ON tb_detail_kirim.id_barang = tb_barang.id_barang WHERE tb_kirim.no_sj = '$id' "; 
		return $this->db->query($query);
		
	}
	function view_cetak($id){
		$query = "SELECT * FROM cetak_sj WHERE no_kirim = '$id'";
		return $this->db->query($query);
	}
	function looping_cetak_sj($id){
		$query = "SELECT * FROM tb_kirim where tb_kirim.no_kirim = '$id'";
		return $this->db->query($query);
	}
	function view_sjln(){
		$query = "SELECT tb_kirim.no_kirim,tb_kirim.no_so,tb_kirim.cetak,tb_kirim.alasan_cetak,tb_kirim.status,tb_kirim.no_reff_sj,tb_kirim.no_reff_so,tb_kirim.id_pelanggan,tb_kirim.tgl,tb_kirim.jatuh_tempo,tb_kirim.user,tb_kirim.ke_alamat,tb_kirim.keterangan,tb_pelanggan.id_pelanggan,nama_pelanggan
		FROM tb_kirim INNER JOIN tb_pelanggan ON tb_kirim.id_pelanggan = tb_pelanggan.id_pelanggan where acc = 0 ORDER BY tb_kirim.no_kirim DESC";
		return $this->db->query($query);
		
	}
	function data_sj($id){
		
		$query = "SELECT tb_sj.no_jl,surat_jalan.id_barang,surat_jalan.qtyb,surat_jalan.harga_satuan,surat_jalan.satuan_besar,surat_jalan.sisa_kirim,terkirim,surat_jalan.jml_krm,tb_barang.nama_barang 
		FROM tb_sj INNER JOIN surat_jalan ON tb_sj.no_jl = surat_jalan.no_jl INNER JOIN tb_barang ON surat_jalan.id_barang = tb_barang.id_barang WHERE tb_sj.no_jl = '$id'"; //dhapus ,disc2
		return $this->db->query($query);
	}
	function data_terkirim($id){
		
		$query = "SELECT tb_kirim.no_kirim,tb_detail_kirim.id_barang,tb_detail_kirim.harga_satuan,tb_detail_kirim.satuan_besar,tb_detail_kirim.jml_krm,tb_barang.nama_barang 
		FROM tb_kirim INNER JOIN tb_detail_kirim ON tb_kirim.no_kirim = tb_detail_kirim.no_kirim INNER JOIN tb_barang ON tb_detail_kirim.id_barang = tb_barang.id_barang WHERE tb_kirim.no_kirim = '$id'"; //dhapus ,disc2
		return $this->db->query($query);
	}
	function data_retur($id){
		
		$query = "SELECT sj_retur.no_sj_retur,sj_retur_detail.id_barang,sj_retur_detail.nama_barang,sj_retur_detail.satuan_besar,sj_retur_detail.jml
		FROM sj_retur INNER JOIN sj_retur_detail ON sj_retur.no_sj_retur = sj_retur_detail.no_sj_retur WHERE sj_retur.no_sj_retur = '$id'"; //dhapus ,disc2
		return $this->db->query($query);
	}
	function view_detail(){
		$user = $this->session->userdata('username');	
		$query = "SELECT tb_detail_tmp.id_barang,jml_krm,tb_detail_tmp.harga_satuan,user,tb_barang.satuan_besar,tb_barang.nama_barang FROM tb_detail_tmp INNER JOIN tb_barang ON tb_detail_tmp.id_barang = tb_barang.id_barang WHERE tb_detail_tmp.user='$user'"; //dihapus disc2,
		$query1= $this->db->query($query);
		return $query1->result_array();
		
	}
	function view_detail_retur(){
		$user		 	    = $this->session->userdata('username');	
		$query = "SELECT * from sj_retur_tmp WHERE user='$user'"; //dihapus disc2,
		$query1= $this->db->query($query);
		return $query1->result_array();
		
	}
	
	function view_cetak_retur($id){
		$query = "SELECT * FROM cetak_sj_retur WHERE no_sj_retur = '$id'";
		return $this->db->query($query);
	}
	function looping_cetak($id){
		$query = "SELECT * from sj_retur where sj_retur.no_sj_retur = '$id'";
		return $this->db->query($query);
	}
	function input_detail(){
		$idbarang 			= $this->input->post('idbarang');
		$satuanbesar		= $this->input->post('satuanbesar');
		$hargasatuan		= $this->input->post('hargasatuan');
		$disc 				= $this->input->post('disc');
		$disc1 				= $this->input->post('disc1');
		$jmlkrm 			= $this->input->post('jmlkrm');
		$modal 				= $this->input->post('modal');
		$user		 	    = $this->session->userdata('username');

			$data = array(

				'id_barang'		=> $idbarang,
				'satuan_besar'	=> $satuanbesar,
				'harga_satuan'	=> $hargasatuan,
				'disc'			=> $disc,
				'disc1'			=> $disc1,
				'jml_krm'		=> $jmlkrm,
				'modal'			=> $modal,
				'user'			=> $this->session->userdata('username')


			);

			$query = $this->db->query("SELECT * FROM tb_detail_tmp WHERE id_barang = '$idbarang' AND user = '$user'");
			$result = $query->result_array();
			$count = count($result);

			if (empty($count)) {
				
				$this->db->insert('tb_detail_tmp',$data);
				
			}
			elseif ($count == 1) {

				$this->db->where('id_barang', $data['id_barang'])AND $this->db->where('user', $data['user']);
				$this->db->update('tb_detail_tmp',$data);
				
			}
		
	}
	function input_detail_retur(){
		$no_sj 					= $this->input->post('no_sj');
		$idbarang 				= $this->input->post('idbarang');
		$namabarang 			= $this->input->post('namabarang');
		$satuanbesar			= $this->input->post('satuanbesar');
		$jmlkrm 				= $this->input->post('jmlkrm');
		$user		 	    	= $this->session->userdata('username');
		
			
			$data = array(
				'no_sj'			=> $no_sj,
				'id_barang'		=> $idbarang,
				'nama_barang'	=> $namabarang,
				'satuan_besar'	=> $satuanbesar,
				'jml_krm'		=> $jmlkrm,
				'user'			=> $this->session->userdata('username')

			);
			
			$query1 = $this->db->query("SELECT * FROM sj_retur_tmp WHERE id_barang = '$idbarang' AND user = '$user'");
			$result1 = $query1->result_array();
			$count1 = count($result1);

			if (empty($count1)) {
				
				$this->db->insert('sj_retur_tmp',$data);
				
			}elseif ($count1 == 1) {
				
				$this->db->where('id_barang', $data['id_barang']) AND $this->db->where('user', $data['user']);
				$this->db->update('sj_retur_tmp',$data);
				
			}
			
		
	}
	function sj(){
		
		$query = "SELECT * FROM surat_jalan";
		$this->db->query($query);
		
	}
	
	
	function update_detail_surat(){
		$no_sj 					= $this->input->post('no_sj');
		$no_jl 					= $this->input->post('no_jl');
		$id_barang 				= $this->input->post('id_barang');
		$satuan_besar			= $this->input->post('satuan_besar');
		$jml_krm 				= $this->input->post('jml_krm');
		$ket_edit 				= $this->input->post('ket_edit');
		
		$surat_jalan = $this->db->get_where('surat_jalan',array('id_barang'=>$id_barang,'no_jl'=>$no_jl))->row_array();
		$sisakirim = $surat_jalan['sisa_kirim'];
		$jml_kirim = $surat_jalan['jml_krm'];
		$qtyb	= $surat_jalan['qtyb'];
		$detail_kirim = $this->db->get('tb_detail_kirim',array('id_barang'=>$id_barang,'no_jl'=>$no_jl))->row_array();
		$jumlah_kirim = $detail_kirim['jml_krm'];
		$sisa_kirim = $detail_kirim['sisa_kirim'];
		$qty = $detail_kirim['qtyb'];
		$no_jln = $detail_kirim['no_jl'];
		if($jml_krm > $sisakirim){
			$this->session->set_flashdata("message","<script> alert('Oops.. Harga Jual Kurang Dari Modal')</script>");
		}else{
			$data = array(
				'no_sj'			=> $no_sj,
				'no_jl'			=> $no_jl,
				'sisa_kirim'	=> $sisakirim,
				'id_barang'		=> $id_barang,
				'satuan_besar'	=> $satuan_besar,
				'jml_krm'		=> $jml_krm,
				'ket_edit'		=> $ket_edit

			);
			
			
			$this->db->where('no_sj',$no_sj) AND $this->db->where('id_barang',$id_barang) AND $this->db->where('no_jl',$no_jl);
			$this->db->update('tb_detail_kirim',$data);
			$this->db->query("UPDATE surat_jalan SET sisa_kirim = qtyb - jml_krm WHERE no_jl = '$no_jl' AND id_barang = '$id_barang'");
			$this->db->query("UPDATE tb_detail_kirim SET sisa_kirim = qtyb - '$jml_krm' WHERE no_jl = '$no_jl' AND id_barang = '$id_barang'");
				//$this->db->query("UPDATE tb_sj SET jml_krm = jml_krm + '$jml_krm', stok = qtyb - jml_krm WHERE no_jl ='$no_jl'");	
		}
		redirect('surat_jalan/view_surat_jalan/');
		
		
		
	}
			function delete_kirim($no_sj){ //delete data berdasarkan nim
				$this->db->where('no_sj',$no_sj);
			  $this->db->delete('tb_kirim'); //query delete data mahasiswa
			}
			 function delete_detail_kirim($no_sj){ //delete data berdasarkan nim
			 	$this->db->where('no_sj',$no_sj);
			 	$this->db->delete('tb_detail_kirim');
			 	
			 }
			 function getNomorterakhir(){
			 	$query = "SELECT * FROM sj_retur where MID(tgl,6,2)=MONTH(now()) ORDER BY no_sj_retur DESC LIMIT 1";
			 	return $this->db->query($query);
			 }
			 function getNomorterakhir1(){
			 	$query = "SELECT * FROM tb_kirim where MID(tgl,6,2)=MONTH(now()) ORDER BY no_kirim DESC LIMIT 1";
			 	return $this->db->query($query);
			 }
			 function insert_retur_sj(){
			 	$a = $this->Model_surat->getNomorterakhir()->row_array();
                            //Mengambil Tahun di Sistem
			 	$tahun    = date('y');
			 	$id       = ('RSJ');
			 	$id1       = ('-');
			 	$c = array('','I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII');
			 	$bln		= $c[date('n')];
			 	$format   = $tahun.$id.$id1.$bln;			
			 	$data['autonumber'] 	 = buatkode($a['no_sj_retur'],$format,4);
			 	$no_sj_retur		 	 = $data['autonumber'];
			 	$no_so		 			 = $this->input->post('no_so');
			 	$no_sj		 			 = $this->input->post('no_sj');
			 	$no_sjln		 		 = $this->input->post('no_sjln');
			 	$id_pelanggan		 	 = $this->input->post('id_pelanggan');
			 	$tgl		 			 = $this->input->post('tgl');
			 	$keterangan		 		 = $this->input->post('keterangan');
			 	$user	 		         = $this->session->userdata('username');
			 	$query = $this->db->query("SELECT * FROM sj_retur_tmp WHERE user='$user'");
			 	$result = $query->result_array();
			 	$count = count($result);
			 	if (empty($count)) {	
			 		$this->session->set_flashdata("message","<script> alert('Oops.. Barang Belum Di Isi')</script>");
			 		redirect('Surat_jalan/edit_surat_jalan/'.$no_sj);
			 	}else{
			 		
			 		$data = array(
			 			'no_sj_retur' =>$no_sj_retur,
			 			'no_sj' 	  =>$no_sj,
			 			'no_sjln' 	  =>$no_sjln,
			 			'id_pelanggan' =>$id_pelanggan,
			 			'tgl' 		   =>$tgl,
			 			'keterangan' =>$keterangan,
			 			'user' 		 =>$this->session->userdata('username'),
			 			
			 		);
			 		$insert_retur = $this->db->insert('sj_retur',$data);
			 	}
			 	$user = $this->session->userdata('username');
			 	$input_detail_retur = $this->db->from('sj_retur_tmp')->like('user',$user)->get();
			 	foreach ($input_detail_retur->result() as $d){
			 		$data_tmp = array(
			 			
			 			'no_sj_retur'   		=> $no_sj_retur,
			 			'id_barang'				=> $d->id_barang,
			 			'nama_barang'			=> $d->nama_barang,
			 			'satuan_besar'			=> $d->satuan_besar,
			 			'jml'					=> $d->jml_krm,
			 			
			 		);
			 		$this->db->insert('sj_retur_detail',$data_tmp);
					$this->db->query("UPDATE tb_penjualan SET stok = stok + '$d->jml_krm' WHERE no_jual = '$no_so'");
					$this->db->query("UPDATE tb_barang SET stok = stok + '$d->jml_krm' WHERE id_barang = '$d->id_barang'");
					$this->db->query("UPDATE tb_detail_penjualan SET sisa_kirim = sisa_kirim + '$d->jml_krm',terkirim = terkirim - '$d->jml_krm' WHERE id_barang = '$d->id_barang' AND no_jual = '$no_so'");
					$this->db->query("UPDATE tb_detail_b_barangps SET qtyb = qtyb - '$d->jml_krm' WHERE id_barang = '$d->id_barang' AND no_jual = '$no_sj'");
					$this->db->query("UPDATE tb_detail_kirim SET jml_krm = jml_krm - '$d->jml_krm' WHERE id_barang = '$d->id_barang' AND no_kirim = '$no_sj'");
			 	}
			 	
			 	$query = "delete from sj_retur_tmp where user='$d->user'";
			 	$this->db->query($query);
			 	redirect('Surat_jalan/view_surat_jalan');
			 }
			 function insert_retur_sj_cetak(){
			 	$a = $this->Model_surat->getNomorterakhir()->row_array();
                            //Mengambil Tahun di Sistem
			 	$tahun    = date('y');
			 	$id       = ('RSJ');
			 	$id1       = ('-');
			 	$c = array('','I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII');
			 	$bln		= $c[date('n')];
			 	$format   = $tahun.$id.$id1.$bln;			
			 	$data['autonumber'] 	 = buatkode($a['no_sj_retur'],$format,4);
			 	$no_sj_retur		 	 = $data['autonumber'];
			 	$no_so		 			 = $this->input->post('no_so');
			 	$no_sj		 			 = $this->input->post('no_sj');
			 	$no_sjln		 		 = $this->input->post('no_sjln');
			 	$id_pelanggan		 	 = $this->input->post('id_pelanggan');
			 	$tgl		 			 = $this->input->post('tgl');
			 	$keterangan		 		 = $this->input->post('keterangan');
			 	$user	 		         = $this->session->userdata('username');
			 	$query = $this->db->query("SELECT * FROM sj_retur_tmp WHERE user='$user'");
			 	$result = $query->result_array();
			 	$count = count($result);
			 	if (empty($count)) {	
			 		$this->session->set_flashdata("message","<script> alert('Oops.. Barang Belum Di Isi')</script>");
			 		redirect('Surat_jalan/edit_surat_jalan/'.$no_sj);
			 	}else{
			 		
			 		$data = array(
			 			'no_sj_retur' =>$no_sj_retur,
			 			'no_sj' 	  =>$no_sj,
			 			'no_sjln' 	  =>$no_sjln,
			 			'id_pelanggan' =>$id_pelanggan,
			 			'tgl' 		   =>$tgl,
			 			'keterangan' =>$keterangan,
			 			'cetak' 	 =>1,
			 			'user' 		 =>$this->session->userdata('username'),
			 			
			 		);
			 		$insert_retur = $this->db->insert('sj_retur',$data);
			 	}
			 	$user = $this->session->userdata('username');
			 	$input_detail_retur = $this->db->from('sj_retur_tmp')->like('user',$user)->get();
			 	foreach ($input_detail_retur->result() as $d){
			 		$data_tmp = array(
			 			
			 			'no_sj_retur'   		=> $no_sj_retur,
			 			'id_barang'				=> $d->id_barang,
			 			'nama_barang'			=> $d->nama_barang,
			 			'satuan_besar'			=> $d->satuan_besar,
			 			'jml'					=> $d->jml_krm,
			 			
			 		);
			 		$this->db->insert('sj_retur_detail',$data_tmp);
					$this->db->query("UPDATE tb_penjualan SET stok = stok + '$d->jml_krm' WHERE no_jual = '$no_so'");
					$this->db->query("UPDATE tb_barang SET stok = stok + '$d->jml_krm' WHERE id_barang = '$d->id_barang'");
					$this->db->query("UPDATE tb_detail_penjualan SET sisa_kirim = sisa_kirim + '$d->jml_krm',terkirim = terkirim - '$d->jml_krm' WHERE id_barang = '$d->id_barang' AND no_jual = '$no_so'");
					$this->db->query("UPDATE tb_detail_b_barangps SET qtyb = qtyb + '$d->jml_krm' WHERE id_barang = '$d->id_barang' AND no_jual = '$no_sj'");
					$this->db->query("UPDATE tb_detail_kirim SET jml_krm = jml_krm + '$d->jml_krm' WHERE id_barang = '$d->id_barang' AND no_kirim = '$no_sj'");
			 	}
			 	
			 	$query = "delete from sj_retur_tmp where user='$d->user'";
			 	$this->db->query($query);
			 	redirect('Surat_jalan/cetak_struk_retur_a5/'.$no_sj_retur);
			 }
			 function insert_surat_jalan(){
		//update tb_sj
				$a = $this->Model_surat->getNomorterakhir1()->row_array();
                            //Mengambil Tahun di Sistem
				$tahun    = date('y');
				$id       = ('SJ');
				$id1       = ('-');
				$c = array('','I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII');
				$bln		= $c[date('n')];
				$format   = $tahun.$id.$id1.$bln;			
				$data['autonumber'] 	 = buatkode($a['no_kirim'],$format,4);
				
			 	$no_kirim		 = $data['autonumber'];
			 	$no_reff_sj		 = $this->input->post('no_reff_sj');
			 	$no_so		     = $this->input->post('no_so');
			 	$no_reff_so		 = $this->input->post('no_reff_so');
			 	$id_pelanggan	 = $this->input->post('id_pelanggan');
			 	$jatuh_tempo	 = $this->input->post('jatuh_tempo');
			 	$tgl	 		 = $this->input->post('tgl');
			 	$ke_alamat	 	 = $this->input->post('ke_alamat');
			 	$keterangan	 	 = $this->input->post('keterangan');
			 	$user	 		 = $this->session->userdata('username');
			 	$query = $this->db->query("SELECT * FROM tb_detail_tmp WHERE user='$user'");
			 	$result = $query->result_array();
			 	$count = count($result);
			 	if (empty($count)) {	
			 		$this->session->set_flashdata("message","<script> alert('Oops.. Barang Belum Di Isi')</script>");
			 		redirect('Surat_jalan/surat_jalan/'.$no_jl.'/'.$id_pelanggan.'/'.$noreff);
			 	}else{
			 		$data = array(
			 			
			 			'no_kirim'			=> $no_kirim,
			 			'no_reff_sj'		=> $no_reff_sj,
			 			'no_so'				=> $no_so,
			 			'no_reff_so'		=> $no_reff_so,
			 			'id_pelanggan'		=> $id_pelanggan,
			 			'jatuh_tempo'		=> $jatuh_tempo,
			 			'tgl'				=> $tgl,
			 			'ke_alamat'			=> $ke_alamat,
			 			'keterangan'		=> $keterangan,
			 			'user'				=> $this->session->userdata('username')
			 			
			 			
			 		);
			 		
			 		$this->db->insert('tb_kirim',$data);
			 		$this->db->query("UPDATE tb_pelanggan SET no_sjln=no_sjln + 1 WHERE id_pelanggan = '$id_pelanggan'");
			 		
			 	}
			 	$user = $this->session->userdata('username');
			 	$input_detail_kirim = $this->db->from('tb_detail_tmp')->like('user',$user)->get();
			 	$stk = 0;
			 	foreach ($input_detail_kirim->result() as $d){
			 		$data_tmp = array(
			 			
			 			'no_kirim'   	=> $no_kirim,
			 			'id_barang'		=> $d->id_barang,
			 			'satuan_besar'	=> $d->satuan_besar,
			 			'harga_satuan'	=> $d->harga_satuan,
			 			'disc'			=> $d->disc,
			 			'disc1'			=> $d->disc1,
			 			'jml_krm'		=> $d->jml_krm,
			 			
			 			
			 			
			 			
			 		);
			 		
			 		$data_tmp2 = array(

			 			'no_jual'   	=> $no_kirim,
			 			'id_barang'		=> $d->id_barang,
			 			'qtyb'			=> $d->jml_krm,
			 			'satuan_besar'	=> $d->satuan_besar,
			 			'harga_beli'	=> $d->harga_satuan,
			 			'disc'			=> $d->disc,
			 			'disc1'			=> $d->disc1,
			 			'modal'			=> $d->modal,
			 			'komisi'		=> 10,
			 			'jam'			=> date('H:i:s'),
			 			'user'			=> $this->session->userdata('username'),
			 			
			 			
			 			

			 		);
			 		$this->db->insert('tb_detail_kirim',$data_tmp);
			 		$this->db->insert('tb_detail_b_barangps',$data_tmp2);
					$this->db->query("UPDATE tb_barang SET stok = stok - '$d->jml_krm' WHERE id_barang = '$d->id_barang'");
					$this->db->query("UPDATE tb_penjualan SET stok = stok - '$d->jml_krm' WHERE no_jual = '$no_so'");
					$this->db->query("UPDATE tb_detail_penjualan SET sisa_kirim = sisa_kirim - '$d->jml_krm',terkirim = terkirim + '$d->jml_krm' WHERE id_barang = '$d->id_barang' AND no_jual = '$no_so'");
			 	}
			 	$query = "delete from tb_detail_tmp where user='$d->user'";
			 	$this->db->query($query);
			 	redirect('surat_jalan/view_surat_jalan');
			 }
			 function insert_surat_cetak(){
		//update tb_sj
				$a = $this->Model_surat->getNomorterakhir1()->row_array();
                            //Mengambil Tahun di Sistem
				$tahun    = date('y');
				$id       = ('SJ');
				$id1       = ('-');
				$c = array('','I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII');
				$bln		= $c[date('n')];
				$format   = $tahun.$id.$id1.$bln;			
				$data['autonumber'] 	 = buatkode($a['no_kirim'],$format,4);
				
			 	$no_kirim		 = $data['autonumber'];
			 	$no_reff_sj		 = $this->input->post('no_reff_sj');
			 	$no_so		     = $this->input->post('no_so');
			 	$no_reff_so		 = $this->input->post('no_reff_so');
			 	$id_pelanggan	 = $this->input->post('id_pelanggan');
			 	$jatuh_tempo	 = $this->input->post('jatuh_tempo');
			 	$tgl	 		 = $this->input->post('tgl');
			 	$ke_alamat	 	 = $this->input->post('ke_alamat');
			 	$keterangan	 	 = $this->input->post('keterangan');
			 	$user	 		 = $this->session->userdata('username');
			 	$query = $this->db->query("SELECT * FROM tb_detail_tmp WHERE user='$user'");
			 	$result = $query->result_array();
			 	$count = count($result);
			 	if (empty($count)) {	
			 		$this->session->set_flashdata("message","<script> alert('Oops.. Barang Belum Di Isi')</script>");
			 		redirect('Surat_jalan/surat_jalan/'.$no_jl.'/'.$id_pelanggan.'/'.$noreff);
			 	}else{
			 		$data = array(
			 			
			 			'no_kirim'			=> $no_kirim,
			 			'no_reff_sj'		=> $no_reff_sj,
			 			'no_so'				=> $no_so,
			 			'no_reff_so'		=> $no_reff_so,
			 			'id_pelanggan'		=> $id_pelanggan,
			 			'jatuh_tempo'		=> $jatuh_tempo,
			 			'tgl'				=> $tgl,
			 			'ke_alamat'			=> $ke_alamat,
			 			'cetak'				=> 1,
			 			'keterangan'		=> $keterangan,
			 			'user'				=> $this->session->userdata('username')
			 			
			 			
			 		);
			 		
			 		$this->db->insert('tb_kirim',$data);
			 		$this->db->query("UPDATE tb_pelanggan SET no_sjln=no_sjln + 1 WHERE id_pelanggan = '$id_pelanggan'");
			 		
			 	}
			 	$user = $this->session->userdata('username');
			 	$input_detail_kirim = $this->db->from('tb_detail_tmp')->like('user',$user)->get();
			 	$stk = 0;
			 	foreach ($input_detail_kirim->result() as $d){
			 		$data_tmp = array(
			 			
			 			'no_kirim'   	=> $no_kirim,
			 			'id_barang'		=> $d->id_barang,
			 			'satuan_besar'	=> $d->satuan_besar,
			 			'harga_satuan'	=> $d->harga_satuan,
			 			'disc'			=> $d->disc,
			 			'disc1'			=> $d->disc1,
			 			'jml_krm'		=> $d->jml_krm,
			 			
			 			
			 			
			 			
			 		);
			 		
			 		$data_tmp2 = array(

			 			'no_jual'   	=> $no_kirim,
			 			'id_barang'		=> $d->id_barang,
			 			'qtyb'			=> $d->jml_krm,
			 			'satuan_besar'	=> $d->satuan_besar,
			 			'harga_beli'	=> $d->harga_satuan,
			 			'disc'			=> $d->disc,
			 			'disc1'			=> $d->disc1,
			 			'komisi'		=> 10,
			 			'jam'			=> date('H:i:s'),
			 			'user'			=> $this->session->userdata('username'),
			 			
			 			
			 			

			 		);
			 		$this->db->insert('tb_detail_kirim',$data_tmp);
			 		$this->db->insert('tb_detail_b_barangps',$data_tmp2);
					$this->db->query("UPDATE tb_penjualan SET stok = stok - '$d->jml_krm' WHERE no_jual = '$no_so'");
					$this->db->query("UPDATE tb_barang SET stok = stok - '$d->jml_krm' WHERE id_barang = '$d->id_barang'");
					$this->db->query("UPDATE tb_detail_penjualan SET sisa_kirim = sisa_kirim - '$d->jml_krm',terkirim = terkirim + '$d->jml_krm' WHERE id_barang = '$d->id_barang' AND no_jual = '$no_so'");
			 	}
			 	$query = "delete from tb_detail_tmp where user='$d->user'";
			 	$this->db->query($query);
			 	redirect('surat_jalan/cetak_struk_a5/'.$no_kirim);
			 }
			 function d_retur_tmp($user,$idbarang)
			 { 
			 	$barang = $this->db->get_where('sj_retur_tmp',array('id_barang'=>$idbarang))->row_array();
			 	$idbarang = $barang['id_barang'];
			 	$user = $this->session->userdata('username');
			 	$sql  = "DELETE FROM sj_retur_tmp WHERE user='$user' AND id_barang = '$idbarang'";
			 	return $this->db->query($sql,array($user,$idbarang));
			 }


			}
			?>