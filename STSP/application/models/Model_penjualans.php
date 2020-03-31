<?php

class Model_penjualans extends CI_Model{
	
	function barang_list(){
		$hasil=$this->db->query("SELECT * FROM tb_detail_b_barangps");
		return $hasil->result();
	}

	function hapus_barang($id_barang){
		$hasil=$this->db->query("DELETE FROM tb_detail_b_barangps WHERE id_barang='$id_barang'");
		return $hasil;
		
	}

	function view_sales_order(){
		$hasil=$this->db->query("SELECT * FROM tb_detail_b_barangps 
			INNER JOIN tb_penjualan on tb_detail_b_barangps.no_jual = tb_penjualan.no_jual INNER JOIN tb_pelanggan ON tb_penjualan.id_pelanggan = tb_pelanggan.id_pelanggan GROUP BY tb_penjualan.no_jual
			");
		return $hasil;
		
	}

	function view_akun(){
		$no_jual = $this->uri->segment(3);
		$query3 = "SELECT * FROM daftar_akun";
		return $this->db->query($query3);
	}
	

	function get_penjualan(){
		$no_jual = $this->uri->segment(3);
		$query3 = "SELECT *,tb_pelanggan.no_reff as no_reff FROM tb_kirim INNER JOIN tb_pelanggan ON tb_kirim.id_pelanggan = tb_pelanggan.id_pelanggan where no_kirim = '$no_jual'";
		return $this->db->query($query3);
	}
	
	function view_detail_barang(){
		$no_jual	 = $this->input->post('no_jual');
		$query = "SELECT * FROM tb_detail_b_barangps
		INNER JOIN tb_barang ON tb_detail_b_barangps.id_barang = tb_barang.id_barang WHERE tb_detail_b_barangps.no_jual = '$no_jual'";
		$query1= $this->db->query($query);
		return $query1->result_array();
		
	}
	function view_detail_barang2(){
		$no_jual = $this->uri->segment(3);
		$query = "SELECT * FROM tb_detail_b_barangps
		INNER JOIN tb_barang ON tb_detail_b_barangps.id_barang = tb_barang.id_barang WHERE tb_detail_b_barangps.no_jual = '$no_jual'";
		$query1= $this->db->query($query);
		return $query1->result_array();
		
	}
	

	function view_detail_barangsj(){
		$user 		 = $this->session->userdata('username');
		$no_jl	 = $this->input->post('no_jual');

		$query = "SELECT * FROM surat_jalan
		INNER JOIN tb_barang ON tb_barang.id_barang = surat_jalan.id_barang WHERE surat_jalan.no_jl = '$no_jl'
		";
		$query1= $this->db->query($query);
		return $query1->result_array();
		
	}
	
	public function getAllPenjualan($offset, $limit){
		$query = $this->db->query("SELECT tb_penjualans.no_jual,tb_penjualans.no_reff,tb_penjualans.sisa2,tb_penjualans.ket_pel,tb_penjualans.no_sjln,tb_penjualans.keterangan,tb_penjualans.total,tb_penjualans.total_belanja,tb_penjualans.total_retur,user,potongan,nominal1,nominal2,sisa,cetak,acc,status_kirim,status_terkirim,
			tb_pelanggan.id_pelanggan,nama_pelanggan,tb_penjualans.tgl_invoice,tb_penjualans.tempo,no_sj,tb_penjualans.jatuh_tempo
			FROM tb_penjualans INNER JOIN tb_pelanggan ON tb_penjualans.id_pelanggan = tb_pelanggan.id_pelanggan ORDER BY tb_penjualans.no_jual DESC LIMIT $offset, $limit");
		return $query;
	}

	public function getAllPenjualan_count(){
		$query = $this->db->query("SELECT * FROM tb_penjualans");
		return $query->num_rows();
	}

	public function getAllRetur($limit,$offset){
		$query = "SELECT tb_retur.no_retur,tb_retur.cetak,tb_retur.no_jual,tb_retur.no_reff_inv,tb_retur.tanggal,tb_retur.id_pelanggan,tb_retur.no_reff,tb_retur.keterangan,tb_retur.total,tb_retur.potongan,tb_retur.ongkir1,tb_retur.nominal1,tb_retur.cash,tb_retur.debet,tb_retur.bank1,tb_retur.transfer,tb_retur.bank2,tb_retur.giro,tb_retur.ket_giro,tb_retur.user,tb_pelanggan.id_pelanggan,nama_pelanggan FROM tb_retur INNER JOIN tb_pelanggan ON tb_retur.id_pelanggan = tb_pelanggan.id_pelanggan ORDER BY tb_retur.no_retur DESC LIMIT $offset, $limit";
		return $this->db->query($query);
	}
	public function getAllRetur_count(){
		$query = $this->db->query("SELECT * FROM tb_retur");
		return $query->num_rows();
	}
	function json() {
		$this->datatables->select('tb_penjualans.no_jual,tb_penjualans.no_reff,tb_penjualans.tgl_invoice,tb_penjualans.id_pelanggan,tb_pelanggan.nama_pelanggan,tb_penjualans.total,tb_penjualans.sisa,tb_penjualans.jatuh_tempo,tb_penjualans.cetak,tb_penjualans.status_kirim,tb_penjualans.acc,tb_penjualans.no_sj,tb_penjualans.keterangan,tb_penjualans.user,tb_penjualans.tempo');
		$this->datatables->from('tb_penjualans');
		$this->datatables->join('tb_pelanggan', 'tb_penjualans.id_pelanggan = tb_pelanggan.id_pelanggan','left');
		$this->datatables->add_column('view', '<a href="Penjualan/input_retur_noju/$1" class="btn btn-xs btn-primary"><i class = "fa fa-mail-forward"></i></a>', 'no_jual');
		return $this->datatables->generate();
	}
	function view_cash(){
		$query = "SELECT tb_penjualans.no_jual,tb_penjualans.no_reff,tb_penjualans.ket_pel,tb_penjualans.no_sjln,tb_penjualans.keterangan,tb_penjualans.total,tb_penjualans.total_belanja,tb_penjualans.total_retur,user,potongan,nominal1,nominal2,sisa,cetak,acc,status_kirim,
		tb_pelanggan.id_pelanggan,nama_pelanggan,tb_penjualans.tgl_invoice,tb_penjualans.tempo,no_sj,tb_penjualans.jatuh_tempo
		FROM tb_penjualans INNER JOIN tb_pelanggan ON tb_penjualans.id_pelanggan = tb_pelanggan.id_pelanggan
		where tb_penjualans.id_pelanggan = 'Cash3' AND tb_pelanggan.id_pelanggan='Cash2' AND tb_pelanggan.id_pelanggan='Cash1' ORDER BY tb_penjualans.no_jual desc";
		return $this->db->query($query);
		
	}
	function get(){
		$no_jual = $this->uri->segment(3);
		$query2 = "SELECT tb_penjualans.no_jual,tb_penjualans.cetak,tb_penjualans.dp,ket_alamat,ket_retur,tb_penjualans.keterangan,tb_penjualans.total,tb_penjualans.user,tb_penjualans.jatuh_tempo,tb_penjualans.potongan,tb_penjualans.ongkir1,tb_penjualans.nominal1,tb_penjualans.ongkir2,tb_penjualans.nominal2,tb_penjualans.debet,tb_penjualans.bank1,tb_penjualans.transfer,tb_penjualans.bank2,tb_penjualans.cash,tb_penjualans.giro,tb_penjualans.ket_giro,tb_penjualans.sisa2,tb_penjualans.kembali,tb_penjualans.no_reff, tb_penjualans.id_pelanggan,nama_pelanggan,tb_penjualans.deposit,tb_detail_penjualans.id_barang,nama_barang,qtyb,tb_detail_penjualans.harga_beli,tb_detail_penjualans.disc,tb_detail_penjualans.disc1,tb_detail_penjualans.satuan_besar FROM tb_penjualans INNER JOIN tb_pelanggan ON tb_penjualans.id_pelanggan=tb_pelanggan.id_pelanggan INNER JOIN tb_detail_penjualans ON tb_penjualans.no_jual=tb_detail_penjualans.no_jual INNER JOIN tb_barang ON tb_detail_penjualans.id_barang=tb_barang.id_barang WHERE tb_penjualans.no_jual = '$no_jual'";
		return $this->db->query($query2);
		return $this->db->get_where('tb_detail_penjualans',array('no_jual'=>$no_jual));
	}
	function get3(){
		$no_jual = $this->uri->segment(3);
		$query2 = "SELECT tb_penjualans.no_jual,ket_alamat,ket_retur,tb_penjualans.keterangan,tb_penjualans.total,tb_penjualans.user,tb_penjualans.jatuh_tempo,tb_penjualans.potongan,tb_penjualans.ongkir1,tb_penjualans.nominal1,tb_penjualans.ongkir2,tb_penjualans.nominal2,tb_penjualans.debet,tb_penjualans.bank1,tb_penjualans.transfer,tb_penjualans.bank2,tb_penjualans.cash,tb_penjualans.giro,tb_penjualans.ket_giro,tb_penjualans.sisa2,tb_penjualans.kembali,tb_penjualans.no_reff, tb_penjualans.id_pelanggan,nama_pelanggan,tb_detail_penjualans.id_barang,nama_barang,qtyb,tb_detail_penjualans.harga_beli,tb_detail_penjualans.disc,tb_detail_penjualans.disc1,tb_detail_penjualans.satuan_besar FROM tb_penjualans INNER JOIN tb_pelanggan ON tb_penjualans.id_pelanggan=tb_pelanggan.id_pelanggan INNER JOIN tb_detail_penjualans ON tb_penjualans.no_jual=tb_detail_penjualans.no_jual INNER JOIN tb_barang ON tb_detail_penjualans.id_barang=tb_barang.id_barang WHERE tb_penjualans.no_jual = '$no_jual'";
		return $this->db->query($query2);
		return $this->db->get_where('tb_detail_penjualans',array('no_jual'=>$no_jual));
	}
	function get1(){
		$no_jual = $this->uri->segment(3);
		$query2 = "SELECT tb_penjualans.no_jual,ket_alamat,tb_penjualans.cetak,tb_penjualans.tgl_invoice,ket_retur,tb_penjualans.keterangan,tb_penjualans.total,tb_penjualans.user,tb_penjualans.jatuh_tempo,tb_penjualans.potongan,tb_penjualans.dpp,tb_penjualans.ppn,tb_penjualans.ongkir1,tb_penjualans.nominal1,tb_penjualans.ongkir2,tb_penjualans.nominal2,tb_penjualans.debet,tb_penjualans.bank1,tb_penjualans.transfer,tb_penjualans.bank2,tb_penjualans.cash,tb_penjualans.giro,tb_penjualans.dp,tb_penjualans.deposit,tb_penjualans.ket_giro,tb_penjualans.sisa2,tb_penjualans.kembali,tb_penjualans.no_reff, tb_penjualans.id_pelanggan,nama_pelanggan,tb_detail_penjualans.id_barang,nama_barang,qtyb,tb_detail_penjualans.harga_beli,tb_detail_penjualans.disc,tb_detail_penjualans.disc1,tb_detail_penjualans.satuan_besar FROM tb_penjualans INNER JOIN tb_pelanggan ON tb_penjualans.id_pelanggan=tb_pelanggan.id_pelanggan INNER JOIN tb_detail_penjualans ON tb_penjualans.no_jual=tb_detail_penjualans.no_jual INNER JOIN tb_barang ON tb_detail_penjualans.id_barang=tb_barang.id_barang WHERE tb_penjualans.no_jual = '$no_jual'";
		return $this->db->query($query2);
		return $this->db->get_where('tb_detail_penjualans',array('no_jual'=>$no_jual));
	}
	function get2(){
		$no_retur = $this->uri->segment(3);
		$query2 = "SELECT tb_retur.no_retur,tb_retur.no_jual,tb_retur.no_reff,tb_retur.no_reff_inv,tb_retur.tanggal,tb_retur.keterangan,tb_retur.total,tb_retur.potongan,tb_retur.ongkir1,tb_retur.nominal1,tb_retur.cash,tb_retur.debet,tb_retur.bank1,tb_retur.transfer,tb_retur.bank2,tb_retur.giro,tb_retur.ket_giro,tb_retur.user,tb_pelanggan.id_pelanggan,nama_pelanggan FROM tb_retur INNER JOIN tb_pelanggan ON tb_retur.id_pelanggan = tb_pelanggan.id_pelanggan WHERE tb_retur.no_retur = '$no_retur'";
		return $this->db->query($query2);
		return $this->db->get_where('tb_detail_penjualans',array('no_jual'=>$no_jual));
	}
	function get_retur(){
		$no_jual = $this->uri->segment(3);
		$query3 = "SELECT tb_penjualans.no_jual,tb_penjualans.no_reff,tb_penjualans.id_pelanggan,tb_pelanggan.nama_pelanggan,tb_pelanggan.no_reff_retur,tb_pelanggan.id_k_pelanggan from tb_penjualans 
		INNER JOIN tb_pelanggan ON tb_penjualans.id_pelanggan=tb_pelanggan.id_pelanggan  WHERE tb_penjualans.no_jual='$no_jual'";
		return $this->db->query($query3);
	}
	function get_re(){
		$id_pelanggan = $this->uri->segment(3);
		$query3 = "SELECT tb_penjualans.no_jual,tb_penjualans.no_reff,tb_penjualans.id_pelanggan,tb_pelanggan.nama_pelanggan,tb_pelanggan.no_reff_retur,tb_pelanggan.id_k_pelanggan from tb_penjualans 
		INNER JOIN tb_pelanggan ON tb_penjualans.id_pelanggan=tb_pelanggan.id_pelanggan  WHERE tb_penjualans.id_pelanggan='$id_pelanggan' ";
		return $this->db->query($query3);
	}

	function get_edit_penjualan(){
		$no_jual = $this->uri->segment(3);
		$query3 = "SELECT tb_penjualans.no_jual,tb_penjualans.no_reff,tb_penjualans.id_k_pelanggan,tb_penjualans.ket_alamat,tb_penjualans.no_urut,tb_penjualans.ket_pel,tb_penjualans.jatuh_tempo,tb_penjualans.no_sjln,tb_penjualans.keterangan,tb_penjualans.total,tb_penjualans.total_belanja,tb_penjualans.total_retur,user,potongan,nominal1,nominal2,sisa,cetak,acc,status_kirim,
		tb_pelanggan.id_pelanggan,nama_pelanggan,tb_penjualans.tgl_invoice,tb_penjualans.tempo,no_sj,tb_penjualans.jatuh_tempo
		FROM tb_penjualans INNER JOIN tb_pelanggan ON tb_penjualans.id_pelanggan = tb_pelanggan.id_pelanggan WHERE tb_penjualans.no_jual = '$no_jual'";
		return $this->db->query($query3);
		return $this->db->get_where('tb_detail_penjualans',array('no_jual'=>$no_jual));
	}
	function view_penjualan(){
		$query = "SELECT tb_penjualans.no_jual,tb_penjualans.batal,tb_penjualans.no_reff,tb_penjualans.sisa2,tb_penjualans.ket_pel,tb_penjualans.no_sjln,tb_penjualans.keterangan,tb_penjualans.total,tb_penjualans.total_belanja,tb_penjualans.total_retur,user,potongan,nominal1,nominal2,sisa,cetak,acc,status_kirim,status_terkirim,
		tb_pelanggan.id_pelanggan,nama_pelanggan,tb_penjualans.tgl_invoice,tb_penjualans.tempo,no_sj,tb_penjualans.jatuh_tempo
		FROM tb_penjualans INNER JOIN tb_pelanggan ON tb_penjualans.id_pelanggan = tb_pelanggan.id_pelanggan  WHERE tb_penjualans.acc = 0 ORDER BY tb_penjualans.no_jual desc";
		return $this->db->query($query);		
	}
	function penjualan_data($id){
		$query = "SELECT * from tb_penjualans where tb_penjualans.no_jual = '$id'";
		return $this->db->query($query);
	}
	function detail_penjualan($id){
		$query = "SELECT tb_penjualans.no_jual,tb_penjualans.no_sj,tb_penjualans.ket_alamat,tb_penjualans.ket_retur,tb_penjualans.total,tb_penjualans.dp,tb_penjualans.deposit,tb_penjualans.potongan,tb_penjualans.dpp,tb_penjualans.ppn,tb_penjualans.ongkir1,tb_penjualans.ongkir2,tb_penjualans.nominal1,
		tb_penjualans.nominal2,tb_penjualans.cash,tb_penjualans.debet,tb_penjualans.bank1,tb_penjualans.transfer,tb_penjualans.bank2,acc,
		tb_penjualans.giro,tb_penjualans.kembali,tb_penjualans.sisa,tb_penjualans.sisa2,tb_penjualans.ket_giro,tb_detail_penjualans.id_barang,nama_barang,qtyb,tb_barang.satuan_besar,harga_beli,disc,disc1 FROM tb_penjualans INNER JOIN tb_detail_penjualans 
		ON tb_penjualans.no_jual = tb_detail_penjualans.no_jual INNER JOIN tb_barang ON tb_detail_penjualans.id_barang = tb_barang.id_barang  WHERE tb_penjualans.no_jual = '$id'"; //dhapus ,disc2
		return $this->db->query($query);
	}
	function detail_retur($id){
		
		$query = "SELECT tb_penjualans.no_jual,tb_penjualans.ket_retur,tb_detail_retur.id_barang,nama_barang,qtyb,tb_barang.satuan_besar,harga_beli,disc,disc1 FROM tb_penjualans INNER JOIN tb_detail_retur 
		ON tb_penjualans.no_jual = tb_detail_retur.no_jual INNER JOIN tb_barang ON tb_detail_retur.id_barang = tb_barang.id_barang  WHERE tb_penjualans.no_jual = '$id'"; //dhapus ,disc2
		return $this->db->query($query);
	}

	function view_retur(){
		$no_retur = "19R-";
		$query = "SELECT tb_retur.no_retur,tb_retur.cetak,tb_retur.no_jual,tb_retur.no_reff_inv,tb_retur.tanggal,tb_retur.id_pelanggan,tb_retur.no_reff,tb_retur.keterangan,tb_retur.total,tb_retur.potongan,tb_retur.ongkir1,tb_retur.nominal1,tb_retur.cash,tb_retur.debet,tb_retur.bank1,tb_retur.transfer,tb_retur.bank2,tb_retur.giro,tb_retur.ket_giro,tb_retur.user,tb_pelanggan.id_pelanggan,nama_pelanggan FROM tb_retur INNER JOIN tb_pelanggan ON tb_retur.id_pelanggan = tb_pelanggan.id_pelanggan WHERE tb_retur.no_retur LIKE '%$no_retur%' ORDER BY tb_retur.no_retur desc";
		return $this->db->query($query);
	}

	function view_detail_retur1($id){
		$query = "SELECT tb_retur.no_retur,tb_retur.tanggal,tb_retur.keterangan,tb_retur.total,tb_retur.dpp,tb_retur.ppn,tb_retur.potongan,tb_retur.ongkir1,tb_retur.nominal1,tb_retur.cash,tb_retur.debet,tb_retur.bank1,tb_retur.transfer,tb_retur.bank2,tb_retur.giro,tb_retur.ket_giro,tb_retur.user,
		retur_detail.id_barang,retur_detail.qtyb,retur_detail.satuan_besar,retur_detail.harga_beli,retur_detail.disc,retur_detail.disc1,tb_barang.nama_barang FROM tb_retur INNER JOIN retur_detail ON tb_retur.no_retur = retur_detail.no_retur
		INNER JOIN tb_barang ON retur_detail.id_barang = tb_barang.id_barang WHERE tb_retur.no_retur = '$id'";
		return $this->db->query($query);
	}

	function view_detail(){
		$user = $this->session->userdata('username');	
		$query = "SELECT tb_detail_tmp.id_barang,jml_krm,tb_detail_tmp.harga_satuan,user,tb_detail_tmp.no_jl,tb_barang.satuan_besar,tb_barang.nama_barang FROM tb_detail_tmp INNER JOIN tb_barang ON tb_detail_tmp.id_barang = tb_barang.id_barang WHERE tb_detail_tmp.user='$user'"; //dihapus disc2,
		$query1= $this->db->query($query);
		return $query1->result_array();
		
	}
	function view_cetak($id){
		$query = "SELECT * FROM cetak WHERE no_jual = '$id'";
		return $this->db->query($query);
	}
	function view_cetak_a5($id){
		$query = "SELECT * FROM cetak_a5 WHERE no_jual = '$id'";
		return $this->db->query($query);
	}
	function looping_cetak($id){
		$query = "SELECT * from tb_penjualans where tb_penjualans.no_jual = '$id'";
		return $this->db->query($query);
	}


		//cetak Retur//;

	function looping_cetak_retur($id){
		$query = "SELECT * from tb_retur where tb_retur.no_retur = '$id'";
		return $this->db->query($query);
	}
	function view_cetak_retur($id){
		$query = "SELECT * FROM cetak_retur WHERE no_retur = '$id'";
		return $this->db->query($query);
	}
	function view_cetak_retur_a5($id){
		$query = "SELECT * FROM cetak_retura5 WHERE no_retur = '$id'";
		return $this->db->query($query);
	}
	function looping_batal($id){
		$query = "SELECT * from tb_penjualans where tb_penjualans.no_jual = '$id'";
		return $this->db->query($query);
	}
	function insert_bebas(){
		$kode_akun 			= $this->input->post('kode_akun');
		$nama1 				= $this->input->post('nama1');
		$nama2 				= $this->input->post('nama2');

		$data = array(

			'kode_akun'		=> $kode_akun,

		);
		$this->db->where('nama1', $nama1);
		$this->db->where('nama2', $nama2);
		$this->db->update('tb_bebas',$data);

	}
	function input_detail_barang(){
		$idbarang 			= $this->input->post('idbarang');
		$qtybes				= $this->input->post('qtybes');
		$nojual				= $this->input->post('nojual');
		$stok				= $this->input->post('stok');
		$satuanbes 			= $this->input->post('satuanbes');
		$modal 		   		= $this->input->post('modal');
		$jual	 		    = $this->input->post('jual');
		$disc 		        = $this->input->post('disc');
		$disc1		        = $this->input->post('disc1');
		$komisi		        = $this->input->post('komisi');
		$jam		        = date('H:i:s');
		$user		 	    = $this->session->userdata('username');

		$data = array(


			'id_barang'		=> $idbarang,
			'qtyb'			=> $qtybes,
			'satuan_besar'	=> $satuanbes,
			'modal'			=> $modal,
			'harga_beli'	=> str_replace(",", "", $jual),
			'disc'			=> $disc,
			'disc1'			=> $disc1,
			'jam'			=> $jam,
			'komisi'		=> $komisi,



		);

		$this->db->where(array('id_barang'=>$idbarang,'no_jual'=>$nojual));
		$this->db->update('tb_detail_b_barangps',$data);
			  // $this->db->query("UPDATE tb_barang SET stok = stok + $stok - '$qtybes' WHERE id_barang = '$idbarang'");


		
	}
	function input_detail_retur(){
		$idbrg 			= $this->input->post('idbrg');
		$idplg 			= $this->input->post('idplg');
		$qty			= $this->input->post('qty');
		$satuan 		= $this->input->post('satuan');
		$hargajual 		= $this->input->post('hargajual');
		$diskon1 		= $this->input->post('diskon1');
		$diskon2 		= $this->input->post('diskon2');
		$jam 			= date('H:i:s');
		$user 			= $this->session->userdata('username');
		$data = array(
			'id_pelanggan'	=> $idplg,
			'id_barang'		=> $idbrg,
			'qtyb'			=> $qty,
			'satuan_besar'	=> $satuan,
			'harga_beli'	=> $hargajual,
			'disc'			=> $diskon1,
			'disc1'			=> $diskon2,
			'jam'			=> $jam,
			'user'			=> $this->session->userdata('username')
		);
		$q = $this->db->query("SELECT * FROM tb_detail_b_barangps WHERE user = '$user'");
		$r = $q->result_array();
		$c = count($r);

		$qry = $this->db->query("SELECT * FROM tb_retur_tmp WHERE user = '$user'");
		$rst = $qry->result_array();
		$cnt = count($rst);

		$brg = $this->db->query("SELECT * FROM tb_detail_penjualans WHERE id_barang = '$idbrg' AND id_pelanggan = '$idplg'");
		$br = $brg->result_array();
		$b = count($br);

		if (empty($c)) {
			echo "";
		}elseif (empty($b)) {
			echo"";
		}elseif($c + $cnt > 24){
			echo "";
		}else{
			$query = $this->db->query("SELECT * FROM tb_retur_tmp WHERE id_barang = '$idbrg' AND user = '$user'");
			$result = $query->result_array();
			$count = count($result);

			if (empty($count)) {
				
				$this->db->insert('tb_retur_tmp',$data);
				
			}
			elseif ($count == 1) {

				$this->db->where('id_barang', $data['id_barang']) AND $this->db->where('user', $data['user']);
				$this->db->update('tb_retur_tmp',$data);
			}
		}
	}
	function input_detail_retur1(){
		$idbarang 			= $this->input->post('idbarang');
		$noju 				= $this->input->post('noju');
		$qtybes				= $this->input->post('qtybes');
		$satuanbes	 		= $this->input->post('satuanbes');
		$modal		 		= $this->input->post('modal');
		$hargabeli 			= $this->input->post('hargabeli');
		$disc 				= $this->input->post('disc');
		$disc1 				= $this->input->post('disc1');
		$user 				= $this->session->userdata('username');

		$brg = $this->db->get_where('tb_detail_penjualans',array('id_barang'=>$idbarang,'no_jual'=>$noju))->row_array();
		$hrg = $brg['harga_beli'];
		$dis1 = $brg['disc'];
		$dis2 = $brg['disc1'];
		
		if($hargabeli !== $hrg){
			echo "GAGAL";
		}elseif($disc !== $dis1){
			echo "GAGAL";
		}elseif($disc1 !== $dis2){
			echo "GAGAL";
		}elseif($qtybes == 0){
			echo "GAGAL";
		}else{
			$data = array(
				'id_barang'		=> $idbarang,
				'no_jual'		=> $noju,
				'qtyb'			=> $qtybes,
				'satuan_besar'	=> $satuanbes,
				'modal'			=> str_replace(".", "", $modal),
				'harga_beli'	=> str_replace(".", "", $hargabeli),
				'disc'			=> $disc,
				'disc1'			=> $disc1,
				'user'			=> $this->session->userdata('username')
			);
			$qry = $this->db->query("SELECT * FROM retur_tmp WHERE user = '$user'");
			$rst = $qry->result_array();
			$cnt = count($rst);
			
			if($cnt > 24){
				echo '<script type=text/javascript> alert("You Have Successfully updated this Record!");</script>';
			}else{
				$query = $this->db->query("SELECT * FROM retur_tmp WHERE id_barang = '$idbarang' AND user = '$user'");
				$result = $query->result_array();
				$count = count($result);

				if (empty($count)) {

					$this->db->insert('retur_tmp',$data);

				}
				elseif ($count == 1) {

					$this->db->where('id_barang', $data['id_barang']) AND $this->db->where('user', $data['user']);
					$this->db->update('retur_tmp',$data);
				}
			}
		}
	}
	function input_detail_retur2(){
		$idpelanggan		= $this->input->post('idpelanggan');
		$idbarang 			= $this->input->post('idbarang');
		$qtybes				= $this->input->post('qtybes');
		$satuanbes	 		= $this->input->post('satuanbes');
		$modal		 		= $this->input->post('modal');
		$hargabeli 			= $this->input->post('hargabeli');
		$disc 				= $this->input->post('disc');
		$disc1 				= $this->input->post('disc1');
		$user 				= $this->session->userdata('username');

		$barang = $this->db->get_where('tb_detail_penjualans',array('id_barang'=>$idbarang,'id_pelanggan'=>$idpelanggan))->row_array();
		$stok = $barang['qtyb'];

		if($qtybes > $stok){
			echo "GAGAL";
		}elseif($qtybes == 0){
			echo "GAGAL";
		}else{
			$data = array(
				'id_barang'		=> $idbarang,
				'id_pelanggan'	=> $idpelanggan,
				'qtyb'			=> $qtybes,
				'satuan_besar'	=> $satuanbes,
				'modal'			=> str_replace(".", "", $modal),
				'harga_beli'	=> str_replace(".", "", $hargabeli),
				'disc'			=> $disc,
				'disc1'			=> $disc1,
				'user'			=> $this->session->userdata('username')
			);
			$qry = $this->db->query("SELECT * FROM retur_tmp WHERE user = '$user'");
			$rst = $qry->result_array();
			$cnt = count($rst);
			
			if($cnt > 24){
				echo '<script type=text/javascript> alert("You Have Successfully updated this Record!");</script>';
			}else{
				$query = $this->db->query("SELECT * FROM retur_tmp WHERE id_barang = '$idbarang' AND user = '$user'");
				$result = $query->result_array();
				$count = count($result);

				if (empty($count)) {

					$this->db->insert('retur_tmp',$data);

				}
				elseif ($count == 1) {

					$this->db->where('id_barang', $data['id_barang']) AND $this->db->where('user', $data['user']);
					$this->db->update('retur_tmp',$data);
				}
			}
		}
	}
	function retur_tmp(){
		$user = $this->session->userdata('username');
	//$query = "SELECT * FROM retur_tmp WHERE retur_tmp.user = '$user'";
		$query = "SELECT retur_tmp.id_barang,retur_tmp.qtyb,retur_tmp.satuan_besar,retur_tmp.harga_beli,retur_tmp.disc,retur_tmp.disc1,retur_tmp.user,tb_barang.nama_barang FROM retur_tmp INNER JOIN tb_barang ON retur_tmp.id_barang = tb_barang.id_barang WHERE retur_tmp.user = '$user'";
		$query1 = $this->db->query($query);
		return $query1->result_array();
	}
	function input_detail(){
		$noju				= $this->input->post('noju');
		$idbarang 			= $this->input->post('idbarang');
		$satuanbesar		= $this->input->post('satuanbesar');
		$hargasatuan		= $this->input->post('hargasatuan');
		$jmlkrm 			= $this->input->post('jmlkrm');
		$user		 	    = $this->session->userdata('username');


		$barang = $this->db->get_where('surat_jalan',array('id_barang'=>$idbarang,'no_jl'=>$noju))->row_array();
		$stok = $barang['sisa_kirim'];
		if($jmlkrm > $stok){
			echo "<script> alert('Oops.. Jangan Nakal Yah..');</script>";
		}elseif($jmlkrm == 0){
			echo "<script> alert('Oops.. Jangan Nakal Yah..');</script>";
		}else{
			$data = array(

				'no_jl'			=> $noju,
				'id_barang'		=> $idbarang,
				'satuan_besar'	=> $satuanbesar,
				'harga_satuan'	=> str_replace(".", "", $hargasatuan),
				'jml_krm'		=> $jmlkrm,
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
	}
	
	function stock(){

		$idbarang = $this->input->post('id_barang');
		$qty_b	   = $this->input->post('qty_b');

		$query = "SELECT qty_b = '$qty_b' FROM tb_barang WHERE id_barang = '$idbarang'";
		return $this->db->query($query);
	}
	
	function insert_retur_noju(){
		$a = $this->Model_penjualans->getNomorterakhir2()->row_array();
                            //Mengambil Tahun di Sistem
		$tahun    = date('y');
		$id       = ('R');
		$id1       = ('-');
		$c = array('','I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII');
		$bln		= $c[date('n')];
		$format   = $tahun.$id.$id1.$bln;
		$data['autonumber'] = buatkode($a['no_retur'],$format,4);
		$no_retur		 = $data['autonumber'];
		$no_jual	     = $this->input->post('no_jual');
		$tanggal	     = $this->input->post('tanggal');
		$no_reff	     = $this->input->post('no_reff');
		$no_reff_inv	 = $this->input->post('no_reff_inv');
		$id_pelanggan	 = $this->input->post('id_pelanggan');
		$keterangan		 = $this->input->post('keterangan');
		$total		 	 = $this->input->post('total');
		$totalan	 	 = $this->input->post('totalan');
		$user		 	 = $this->input->post('user');
		$potongan		 = $this->input->post('potongan');
		$ongkir1		 = $this->input->post('ongkir1');
		$nominal1		 = $this->input->post('nominal1');
		$cash		 	 = $this->input->post('cash');
		$debet		 	 = $this->input->post('debet');
		$bank1		 	 = $this->input->post('bank1');
		$ppn			 = $this->input->post('ppn');
		$dpp		 	 = $this->input->post('dpp');
		$transfer		 = $this->input->post('transfer');
		$bank2		 	 = $this->input->post('bank2');
		$giro		 	 = $this->input->post('giro');
		$ket_giro		 = $this->input->post('ket_giro');
		$jam1			 = date('H:i:s');
		$tgl_invoice	 = $this->input->post('tgl_invoice');
		$dpp			 = $this->input->post('dpp');
		$ppn			 = $this->input->post('ppn');
		$sisatagihan	 = $this->input->post('sisatagihan');
		if($total==0){
			$this->session->set_flashdata("message","<script> alert('Oops.. Total Masih Kosong')</script>");
			redirect('Penjualan/input_retur_noju/'.$no_jual);
		}
		$data = array(

			'no_retur'			=> $no_retur,
			'no_jual'			=> $no_jual,
			'no_reff_inv'		=> $no_reff_inv,
			'tanggal'			=> $tanggal,
			'id_pelanggan'		=> $id_pelanggan,
			'keterangan'		=> $keterangan,
			'total'				=> str_replace(",", "", $total),
			'user'				=> $this->session->userdata('username'),
			'potongan'			=> str_replace(",", "", $potongan),
			'ongkir1'			=> $ongkir1,
			'nominal1'			=> str_replace(",", "", $nominal1),
			'cash'				=> str_replace(",", "", $cash),
			'debet'				=> str_replace(",", "", $debet),
			'bank1'				=> $bank1,
			'transfer'			=> str_replace(",", "", $transfer),
			'bank2'				=> $bank2,
			'giro'				=> str_replace(",", "", $giro),
			'ket_giro'			=> $ket_giro,
			'dpp'				=> str_replace(",", "", $dpp),
			'ppn'				=> str_replace(",", "", $ppn),


		);
		$insert_retur = $this->db->insert('tb_retur',$data);
		$this->db->query("UPDATE tb_penjualans SET total = total - '$total' - nominal1, ppn = ppn-'$ppn', dpp = dpp-'$dpp' WHERE no_jual ='$no_jual'");
		if($sisatagihan >= $totalan){
			$this->db->query("UPDATE transaksi_day SET sisa_tagihan=sisa_tagihan - '$totalan' WHERE no_transaksi = '$no_jual'");
			$this->db->query("UPDATE tb_penjualans SET sisa = sisa - '$totalan' - nominal1,sisa2 = sisa2 - '$totalan' - nominal1 WHERE no_jual ='$no_jual'");
		}
		if($sisatagihan > 0){
			$this->db->query("UPDATE tb_pelanggan SET hutang = hutang - '$total' - '$potongan' - '$nominal1' WHERE id_pelanggan = '$id_pelanggan'");
		}
		$tr = array(

			'no_transaksi'			=> $no_retur,
			'tgl'					=> $tgl_invoice,
			'date_invoice'			=> $tanggal,
			'bulan'					=> $bln,
			'jam'					=> $jam1,
			'id_pelanggan'			=> $id_pelanggan,
			'total'					=> str_replace(",", "", $totalan)- str_replace(",", "", $totalan) * 2,
			'potongan'				=> str_replace(",", "", $potongan),
			'beban'					=> str_replace(",", "", $nominal1) - str_replace(",", "", $nominal1) * 2,
			'grand_total'			=> str_replace(",", "", $total)- str_replace(",", "", $total) * 2,
			'cash'					=> str_replace(",", "", $cash) - str_replace(",", "", $cash) * 2,
			'transfer'				=> str_replace(",", "", $transfer) - str_replace(",", "", $transfer) * 2,


		);
		$insert_penjualan = $this->db->insert('transaksi_day',$tr);
		$user = $this->session->userdata('username');
		$data = $this->db->from('retur_tmp')->like('user',$user)->get();   
		foreach ($data->result() as $d){
			
			$data_tmp = array(

				'no_retur'   	=> $no_retur,
				'id_pelanggan'	=> $id_pelanggan,
				'tanggal'		=> $tanggal,
				'id_barang'		=> $d->id_barang,
				'qtyb'			=> $d->qtyb,
				'satuan_besar'	=> $d->satuan_besar,
				'harga_beli'	=> str_replace(".", "", $d->harga_beli),
				'disc'			=> $d->disc,
				'disc1'			=> $d->disc1
				
			);
			$toy = $this->db->get_where('tb_penjualans',array('no_jual'=>$no_jual))->row_array();
			$this->db->insert('retur_detail',$data_tmp);
			$this->db->query("UPDATE tb_detail_penjualans SET qtyb = qtyb - '$d->qtyb' WHERE id_barang = '$d->id_barang' AND no_jual ='$d->no_jual'");
		}
		$data = $this->db->where('user',$d->user);
		$query = "delete from retur_tmp where user='$d->user'";
		$this->db->query($query);
		redirect('Penjualans/view_retur');
		
	}
	function insert_retur_noju_cetak(){
		$a = $this->Model_penjualans->getNomorterakhir2()->row_array();
                            //Mengambil Tahun di Sistem
		$tahun    = date('y');
		$id       = ('R');
		$id1       = ('-');
		$c = array('','I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII');
		$bln		= $c[date('n')];
		$format   = $tahun.$id.$id1.$bln;
		$data['autonumber'] = buatkode($a['no_retur'],$format,4);
		$no_retur		 = $data['autonumber'];
		$no_jual	     = $this->input->post('no_jual');
		$tanggal	     = $this->input->post('tanggal');
		$no_reff	     = $this->input->post('no_reff');
		$no_reff_inv	 = $this->input->post('no_reff_inv');
		$id_pelanggan	 = $this->input->post('id_pelanggan');
		$keterangan		 = $this->input->post('keterangan');
		$total		 	 = $this->input->post('total');
		$totalan	 	 = $this->input->post('totalan');
		$user		 	 = $this->input->post('user');
		$potongan		 = $this->input->post('potongan');
		$ongkir1		 = $this->input->post('ongkir1');
		$nominal1		 = $this->input->post('nominal1');
		$cash		 	 = $this->input->post('cash');
		$debet		 	 = $this->input->post('debet');
		$bank1		 	 = $this->input->post('bank1');
		$ppn			 = $this->input->post('ppn');
		$dpp		 	 = $this->input->post('dpp');
		$transfer		 = $this->input->post('transfer');
		$bank2		 	 = $this->input->post('bank2');
		$giro		 	 = $this->input->post('giro');
		$ket_giro		 = $this->input->post('ket_giro');
		$jam1			 = date('H:i:s');
		$tgl_invoice	 = $this->input->post('tgl_invoice');
		$dpp			 = $this->input->post('dpp');
		$ppn			 = $this->input->post('ppn');
		$sisatagihan	 = $this->input->post('sisatagihan');
		if($total==0){
			$this->session->set_flashdata("message","<script> alert('Oops.. Total Masih Kosong')</script>");
			redirect('Penjualan/input_retur_noju/'.$no_jual);
		}
		$data = array(

			'no_retur'			=> $no_retur,
			'no_jual'			=> $no_jual,
			'no_reff_inv'		=> $no_reff_inv,
			'tanggal'			=> $tanggal,
			'id_pelanggan'		=> $id_pelanggan,
			'keterangan'		=> $keterangan,
			'total'				=> str_replace(",", "", $total),
			'user'				=> $this->session->userdata('username'),
			'potongan'			=> str_replace(",", "", $potongan),
			'ongkir1'			=> $ongkir1,
			'nominal1'			=> str_replace(",", "", $nominal1),
			'cash'				=> str_replace(",", "", $cash),
			'debet'				=> str_replace(",", "", $debet),
			'bank1'				=> $bank1,
			'transfer'			=> str_replace(",", "", $transfer),
			'bank2'				=> $bank2,
			'giro'				=> str_replace(",", "", $giro),
			'ket_giro'			=> $ket_giro,
			'dpp'				=> str_replace(",", "", $dpp),
			'ppn'				=> str_replace(",", "", $ppn),


		);
		$insert_retur = $this->db->insert('tb_retur',$data);
		$this->db->query("UPDATE tb_penjualans SET total = total - '$total' - nominal1, ppn = ppn-'$ppn', dpp = dpp-'$dpp' WHERE no_jual ='$no_jual'");
		if($sisatagihan >= $totalan){
			$this->db->query("UPDATE transaksi_day SET sisa_tagihan=sisa_tagihan - '$totalan' WHERE no_transaksi = '$no_jual'");
			$this->db->query("UPDATE tb_penjualans SET sisa = sisa - '$totalan' - nominal1,sisa2 = sisa2 - '$totalan' - nominal1 WHERE no_jual ='$no_jual'");
		}
		if($sisatagihan > 0){
			$this->db->query("UPDATE tb_pelanggan SET hutang = hutang - '$total' - '$potongan' - '$nominal1' WHERE id_pelanggan = '$id_pelanggan'");
		}
		$tr = array(

			'no_transaksi'			=> $no_retur,
			'tgl'					=> $tgl_invoice,
			'date_invoice'			=> $tanggal,
			'bulan'					=> $bln,
			'jam'					=> $jam1,
			'id_pelanggan'			=> $id_pelanggan,
			'total'					=> str_replace(",", "", $totalan)- str_replace(",", "", $totalan) * 2,
			'potongan'				=> str_replace(",", "", $potongan),
			'beban'					=> str_replace(",", "", $nominal1) - str_replace(",", "", $nominal1) * 2,
			'grand_total'			=> str_replace(",", "", $total)- str_replace(",", "", $total) * 2,
			'cash'					=> str_replace(",", "", $cash) - str_replace(",", "", $cash) * 2,
			'transfer'				=> str_replace(",", "", $transfer) - str_replace(",", "", $transfer) * 2,


		);
		$insert_penjualan = $this->db->insert('transaksi_day',$tr);
		$user = $this->session->userdata('username');
		$data = $this->db->from('retur_tmp')->like('user',$user)->get();   
		foreach ($data->result() as $d){
			
			$data_tmp = array(

				'no_retur'   	=> $no_retur,
				'id_pelanggan'	=> $id_pelanggan,
				'tanggal'		=> $tanggal,
				'id_barang'		=> $d->id_barang,
				'qtyb'			=> $d->qtyb,
				'satuan_besar'	=> $d->satuan_besar,
				'harga_beli'	=> str_replace(".", "", $d->harga_beli),
				'disc'			=> $d->disc,
				'disc1'			=> $d->disc1
				
			);
			$toy = $this->db->get_where('tb_penjualans',array('no_jual'=>$no_jual))->row_array();
			$this->db->insert('retur_detail',$data_tmp);
			$this->db->query("UPDATE tb_detail_penjualans SET qtyb = qtyb - '$d->qtyb' WHERE id_barang = '$d->id_barang' AND no_jual ='$d->no_jual'");
		}
		$data = $this->db->where('user',$d->user);
		$query = "delete from retur_tmp where user='$d->user'";
		$this->db->query($query);
		redirect('Penjualans/cetak_retur/'.$no_retur);
		
	}
	function insert_retur_noju_cetak_a4(){
		$a = $this->Model_penjualans->getNomorterakhir2()->row_array();
                            //Mengambil Tahun di Sistem
		$tahun    = date('y');
		$id       = ('R');
		$id1       = ('-');
		$c = array('','I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII');
		$bln		= $c[date('n')];
		$format   = $tahun.$id.$id1.$bln;
		$data['autonumber'] = buatkode($a['no_retur'],$format,4);
		$no_retur		 = $data['autonumber'];
		$no_jual	     = $this->input->post('no_jual');
		$tanggal	     = $this->input->post('tanggal');
		$no_reff	     = $this->input->post('no_reff');
		$no_reff_inv	 = $this->input->post('no_reff_inv');
		$id_pelanggan	 = $this->input->post('id_pelanggan');
		$keterangan		 = $this->input->post('keterangan');
		$total		 	 = $this->input->post('total');
		$totalan	 	 = $this->input->post('totalan');
		$user		 	 = $this->input->post('user');
		$potongan		 = $this->input->post('potongan');
		$ongkir1		 = $this->input->post('ongkir1');
		$nominal1		 = $this->input->post('nominal1');
		$cash		 	 = $this->input->post('cash');
		$debet		 	 = $this->input->post('debet');
		$bank1		 	 = $this->input->post('bank1');
		$ppn			 = $this->input->post('ppn');
		$dpp		 	 = $this->input->post('dpp');
		$transfer		 = $this->input->post('transfer');
		$bank2		 	 = $this->input->post('bank2');
		$giro		 	 = $this->input->post('giro');
		$ket_giro		 = $this->input->post('ket_giro');
		$jam1			 = date('H:i:s');
		$tgl_invoice	 = $this->input->post('tgl_invoice');
		$dpp			 = $this->input->post('dpp');
		$ppn			 = $this->input->post('ppn');
		$sisatagihan	 = $this->input->post('sisatagihan');
		if($total==0){
			$this->session->set_flashdata("message","<script> alert('Oops.. Total Masih Kosong')</script>");
			redirect('Penjualan/input_retur_noju/'.$no_jual);
		}
		$data = array(

			'no_retur'			=> $no_retur,
			'no_jual'			=> $no_jual,
			'no_reff_inv'		=> $no_reff_inv,
			'tanggal'			=> $tanggal,
			'id_pelanggan'		=> $id_pelanggan,
			'keterangan'		=> $keterangan,
			'total'				=> str_replace(",", "", $total),
			'user'				=> $this->session->userdata('username'),
			'potongan'			=> str_replace(",", "", $potongan),
			'ongkir1'			=> $ongkir1,
			'nominal1'			=> str_replace(",", "", $nominal1),
			'cash'				=> str_replace(",", "", $cash),
			'debet'				=> str_replace(",", "", $debet),
			'bank1'				=> $bank1,
			'transfer'			=> str_replace(",", "", $transfer),
			'bank2'				=> $bank2,
			'giro'				=> str_replace(",", "", $giro),
			'ket_giro'			=> $ket_giro,
			'dpp'				=> str_replace(",", "", $dpp),
			'ppn'				=> str_replace(",", "", $ppn),


		);
		$insert_retur = $this->db->insert('tb_retur',$data);
		$this->db->query("UPDATE tb_penjualans SET total = total - '$total' - nominal1, ppn = ppn-'$ppn', dpp = dpp-'$dpp' WHERE no_jual ='$no_jual'");
		if($sisatagihan >= $totalan){
			$this->db->query("UPDATE transaksi_day SET sisa_tagihan=sisa_tagihan - '$totalan' WHERE no_transaksi = '$no_jual'");
			$this->db->query("UPDATE tb_penjualans SET sisa = sisa - '$totalan' - nominal1,sisa2 = sisa2 - '$totalan' - nominal1 WHERE no_jual ='$no_jual'");
		}
		if($sisatagihan > 0){
			$this->db->query("UPDATE tb_pelanggan SET hutang = hutang - '$total' - '$potongan' - '$nominal1' WHERE id_pelanggan = '$id_pelanggan'");
		}
		$tr = array(

			'no_transaksi'			=> $no_retur,
			'tgl'					=> $tgl_invoice,
			'date_invoice'			=> $tanggal,
			'bulan'					=> $bln,
			'jam'					=> $jam1,
			'id_pelanggan'			=> $id_pelanggan,
			'total'					=> str_replace(",", "", $totalan)- str_replace(",", "", $totalan) * 2,
			'potongan'				=> str_replace(",", "", $potongan),
			'beban'					=> str_replace(",", "", $nominal1) - str_replace(",", "", $nominal1) * 2,
			'grand_total'			=> str_replace(",", "", $total)- str_replace(",", "", $total) * 2,
			'cash'					=> str_replace(",", "", $cash) - str_replace(",", "", $cash) * 2,
			'transfer'				=> str_replace(",", "", $transfer) - str_replace(",", "", $transfer) * 2,


		);
		$insert_penjualan = $this->db->insert('transaksi_day',$tr);
		$user = $this->session->userdata('username');
		$data = $this->db->from('retur_tmp')->like('user',$user)->get();   
		foreach ($data->result() as $d){
			
			$data_tmp = array(

				'no_retur'   	=> $no_retur,
				'id_pelanggan'	=> $id_pelanggan,
				'tanggal'		=> $tanggal,
				'id_barang'		=> $d->id_barang,
				'qtyb'			=> $d->qtyb,
				'satuan_besar'	=> $d->satuan_besar,
				'harga_beli'	=> str_replace(".", "", $d->harga_beli),
				'disc'			=> $d->disc,
				'disc1'			=> $d->disc1
				
			);
			$toy = $this->db->get_where('tb_penjualans',array('no_jual'=>$no_jual))->row_array();
			$this->db->insert('retur_detail',$data_tmp);
			$this->db->query("UPDATE tb_detail_penjualans SET qtyb = qtyb - '$d->qtyb' WHERE id_barang = '$d->id_barang' AND no_jual ='$d->no_jual'");
		}
		$data = $this->db->where('user',$d->user);
		$query = "delete from retur_tmp where user='$d->user'";
		$this->db->query($query);
		redirect('Penjualans/cetak_a4_retur/'.$no_retur);
		
	}
	function insert_retur(){
		$a = $this->Model_penjualans->getNomorterakhir2()->row_array();
                            //Mengambil Tahun di Sistem
		$tahun    = date('y');
		$id       = ('R');
		$id1       = ('-');
		$c = array('','I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII');
		$bln		= $c[date('n')];
		$format   = $tahun.$id.$id1.$bln;
		$data['autonumber'] = buatkode($a['no_retur'],$format,4);
		$no_retur		 = $data['autonumber'];
		$no_jual	     = $this->input->post('no_jual');
		$tanggal	     = $this->input->post('tanggal');
		$no_reff	     = $this->input->post('no_reff');
		$no_reff_inv	 = $this->input->post('no_reff_inv');
		$id_pelanggan	 = $this->input->post('id_pelanggan');
		$keterangan		 = $this->input->post('keterangan');
		$total		 	 = $this->input->post('total');
		$user		 	 = $this->input->post('user');
		$potongan		 = $this->input->post('potongan');
		$ongkir1		 = $this->input->post('ongkir1');
		$nominal1		 = $this->input->post('nominal1');
		$cash		 	 = $this->input->post('cash');
		$debet		 	 = $this->input->post('debet');
		$bank1		 	 = $this->input->post('bank1');
		$transfer		 = $this->input->post('transfer');
		$bank2		 	 = $this->input->post('bank2');
		$giro		 	 = $this->input->post('giro');
		$ket_giro		 = $this->input->post('ket_giro');
		if($total==""){
			echo "";
			redirect('Penjualan/input_penjualan');
		}
		$data = array(

			'no_retur'			=> $no_retur,
			'no_jual'			=> $no_jual,
			'no_reff'			=> $no_reff,
			'no_reff_inv'		=> $no_reff_inv,
			'tanggal'			=> $tanggal,
			'id_pelanggan'		=> $id_pelanggan,
			'keterangan'		=> $keterangan,
			'total'				=> str_replace(",", "", $total),
			'user'				=> $this->session->userdata('username'),
			'potongan'			=> str_replace(",", "", $potongan),
			'ongkir1'			=> $ongkir1,
			'nominal1'			=> str_replace(",", "", $nominal1),
			'cash'				=> str_replace(",", "", $cash),
			'debet'				=> str_replace(",", "", $debet),
			'bank1'				=> $bank1,
			'transfer'			=> str_replace(",", "", $transfer),
			'bank2'				=> $bank2,
			'giro'				=> str_replace(",", "", $giro),
			'ket_giro'			=> $ket_giro,


		);
		$insert_retur = $this->db->insert('tb_retur',$data);
		$this->db->query("UPDATE tb_pelanggan SET no_reff_retur = no_reff_retur + '$no_reff' WHERE id_pelanggan = '$id_pelanggan'");
		$user = $this->session->userdata('username');
		$data = $this->db->from('retur_tmp')->like('user',$user)->get();   
		foreach ($data->result() as $d){
			
			$data_tmp = array(

				'no_retur'   	=> $no_retur,
				'id_pelanggan'	=> $id_pelanggan,
				'tanggal'		=> $tanggal,
				'id_barang'		=> $d->id_barang,
				'qtyb'			=> $d->qtyb,
				'satuan_besar'	=> $d->satuan_besar,
				'harga_beli'	=> str_replace(".", "", $d->harga_beli),
				'disc'			=> $d->disc,
				'disc1'			=> $d->disc1
				
				
				

			);
			$this->db->insert('retur_detail',$data_tmp);
			$this->db->query("UPDATE tb_barang SET stok = stok + '$d->qtyb' WHERE id_barang = '$d->id_barang'");
			
		}
		$data = $this->db->where('user',$d->user);
		$query = "delete from retur_tmp where user='$d->user'";
		$this->db->query($query);
		redirect('Penjualan/input_retur');
		
	}
	function insert_retur_cetak(){
		$a = $this->Model_penjualans->getNomorterakhir2()->row_array();
                            //Mengambil Tahun di Sistem
		$tahun    = date('y');
		$id       = ('R');
		$id1       = ('-');
		$c = array('','I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII');
		$bln		= $c[date('n')];
		$format   = $tahun.$id.$id1.$bln;
		$data['autonumber'] = buatkode($a['no_retur'],$format,4);
		$no_retur		 = $data['autonumber'];
		$no_jual	     = $this->input->post('no_jual');
		$tanggal	     = $this->input->post('tanggal');
		$id_pelanggan	 = $this->input->post('id_pelanggan');
		$keterangan		 = $this->input->post('keterangan');
		$total		 	 = $this->input->post('total');
		$user		 	 = $this->input->post('user');
		$potongan		 = $this->input->post('potongan');
		$ongkir1		 = $this->input->post('ongkir1');
		$nominal1		 = $this->input->post('nominal1');
		$cash		 	 = $this->input->post('cash');
		$debet		 	 = $this->input->post('debet');
		$bank1		 	 = $this->input->post('bank1');
		$transfer		 = $this->input->post('transfer');
		$bank2		 	 = $this->input->post('bank2');
		$giro		 	 = $this->input->post('giro');
		$ket_giro		 = $this->input->post('ket_giro');
		if($total==""){
			echo "";
			redirect('Penjualan/input_penjualan');
		}
		$data = array(

			'no_retur'			=> $no_retur,
			'no_jual'			=> $no_jual,
			'tanggal'			=> $tanggal,
			'id_pelanggan'		=> $id_pelanggan,
			'keterangan'		=> $keterangan,
			'total'				=> str_replace(",", "", $total),
			'user'				=> $this->session->userdata('username'),
			'potongan'			=> str_replace(",", "", $potongan),
			'ongkir1'			=> $ongkir1,
			'nominal1'			=> str_replace(",", "", $nominal1),
			'cash'				=> str_replace(",", "", $cash),
			'debet'				=> str_replace(",", "", $debet),
			'bank1'				=> $bank1,
			'transfer'			=> str_replace(",", "", $transfer),
			'bank2'				=> $bank2,
			'giro'				=> str_replace(",", "", $giro),
			'ket_giro'			=> $ket_giro,


		);
		$insert_retur = $this->db->insert('tb_retur',$data);
		$this->db->query("UPDATE tb_pelanggan SET no_reff_retur = no_reff_retur + '$no_reff' WHERE id_pelanggan = '$id_pelanggan'");
		$user = $this->session->userdata('username');
		$data = $this->db->from('retur_tmp')->like('user',$user)->get();   
		foreach ($data->result() as $d){
			
			$data_tmp = array(

				'no_retur'   	=> $no_retur,
				'id_pelanggan'	=> $id_pelanggan,
				'tanggal'		=> $tanggal,
				'id_barang'		=> $d->id_barang,
				'qtyb'			=> $d->qtyb,
				'satuan_besar'	=> $d->satuan_besar,
				'harga_beli'	=> str_replace(".", "", $d->harga_beli),
				'disc'			=> $d->disc,
				'disc1'			=> $d->disc1
				
				
				

			);
			$this->db->insert('retur_detail',$data_tmp);
			$this->db->query("UPDATE tb_barang SET stok = stok + '$d->qtyb' WHERE id_barang = '$d->id_barang'");
		}
		$data = $this->db->where('user',$d->user);
		$query = "delete from retur_tmp where user='$d->user'";
		$this->db->query($query);
		redirect('Penjualan/cetak_retur/'.$no_retur);
		
	}

	function insert_penjualan(){
		$a = $this->Model_penjualans->getNomorterakhir()->row_array();
                            //Mengambil Tahun di Sistem
		$tahun    = date('y');
		$id       = ('J');
		$id1       = ('-');
		$c = array('','I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII');
		$bln		= $c[date('n')];
		$format   = $tahun.$id.$id1.$bln;
		$data['autonumber'] = buatkode($a['no_jual'],$format,4);
		$no_jual		 = $data['autonumber'];
		$no_reff		 = $this->input->post('no_reff');
		$no_npwp		 = $this->input->post('no_npwp');
		$tgl_invoice	 = $this->input->post('tgl_invoice');
		$tgl			 = $this->input->post('tgl');
		$jam	 		 = date('H:i:s');
		$id_pelanggan	 = $this->input->post('id_pelanggan');
		$id_karyawan	 = $this->input->post('id_karyawan');
		$nojual	 	 	 = $this->input->post('nojual');
		$no_reff_sj	 	 = $this->input->post('no_reff_sj');
		$jatuh_tempo	 = $this->input->post('jatuh_tempo');
		$jatuh_tempoan	 = $this->input->post('jatuh_tempoan');
		$id_k_pelanggan	 = $this->input->post('id_k_pelanggan');
		$keterangan		 = $this->input->post('keterangan');
		$ket_alamat		 = $this->input->post('ket_alamat');
		$total		 	 = $this->input->post('total');
		$totalan		 = $this->input->post('totalan');
		$user		 	 = $this->input->post('user');
		$potongan		 = $this->input->post('potongan');
		$dpp			 = $this->input->post('dpp');
		$ppn			 = $this->input->post('ppn');
		$ongkir1		 = $this->input->post('ongkir1');
		$ongkir2		 = $this->input->post('ongkir2');
		$nominal1		 = $this->input->post('nominal1');
		$nominal2		 = $this->input->post('nominal2');
		$cash		 	 = $this->input->post('cash');
		$debet		 	 = $this->input->post('debet');
		$bank1		 	 = $this->input->post('bank1');
		$transfer		 = $this->input->post('transfer');
		$bank2		 	 = $this->input->post('bank2');
		$ka_pt		 		 = $this->input->post('ka_pt');
		$ka_by		 		 = $this->input->post('ka_by');
		$dp		 		 = $this->input->post('dp');
		$dp2	 		 = $this->input->post('dp2');
		$giro		 	 = $this->input->post('giro');
		$ket_giro		 = $this->input->post('ket_giro');
		$kembali		 = $this->input->post('kembali');
		$sisa		 	 = $this->input->post('sisa');
		$sisa2		 	 = $this->input->post('sisa2');
		$acc			 = $this->input->post('acc');
		$total_komisi	 = $this->input->post('total_komisi');
		if($total==0){
			$this->session->set_flashdata("message","<script> alert('Oops.. Total Masih Kosong')</script>");
			redirect('Penjualans/input_penjualan');
		}else{
			$data = array(

				'no_jual'			=> $no_jual,
				'no_reff'			=> $no_reff,
				'tgl_invoice'		=> $tgl_invoice,
				'date_invoice'		=> $tgl,
				'id_pelanggan'		=> $id_pelanggan,
				'id_sales'			=> $id_karyawan,
				'no_sj'				=> $nojual,
				'no_sjln'			=> $no_reff_sj,
				'jatuh_tempo'		=> $jatuh_tempo,
				'jatuh_tempoan'		=> $jatuh_tempoan,
				'id_k_pelanggan'	=> $id_k_pelanggan,
				'keterangan'		=> $keterangan,
				'ket_alamat'		=> $ket_alamat,
				'total'				=> str_replace(",", "", $total),
				'user'				=> $this->session->userdata('username'),
				'potongan'			=> str_replace(",", "", $potongan),
				'dpp'				=> str_replace(",", "", $dpp),
				'ppn'				=> str_replace(",", "", $ppn),
				'ongkir1'			=> $ongkir1,
				'ongkir2'			=> $ongkir2,
				'nominal1'			=> str_replace(",", "", $nominal1),
				'nominal2'			=> str_replace(",", "", $nominal2),
				'cash'				=> str_replace(",", "", $cash),
				'debet'				=> str_replace(",", "", $debet),
				'bank1'				=> $bank1,
				'transfer'			=> str_replace(",", "", $transfer),
				'bank2'				=> $bank2,
				'dp'				=> str_replace(",", "", $dp),
				'deposit'			=> str_replace(",", "", $dp2),
				'giro'				=> str_replace(",", "", $giro),
				'ket_giro'			=> $ket_giro,
				'kembali'			=> str_replace(",", "", $kembali),
				'sisa'				=> str_replace(",", "", $sisa),
				'sisa2'				=> str_replace(",", "", $sisa2),
				'total_komisi'		=> str_replace(",", "", $total_komisi),


			);
			$insert_penjualan = $this->db->insert('tb_penjualans',$data);
			$this->db->query("UPDATE tb_kirim SET status = 1 WHERE no_kirim = '$nojual'");
			$this->db->query(" UPDATE tb_pelanggan set no_reff =  no_reff + 1 where id_pelanggan='$id_pelanggan'");
		}
		
		$pen = $this->db->get_where('tb_pelanggan',array('id_pelanggan'=>$id_pelanggan))->row_array();
		$PL = array(
			'hutang' => str_replace(",", "", $sisa) + $pen['hutang'],
			'total_hutang' => str_replace(",", "", $sisa) + $pen['total_hutang'],
			'deposit' => $pen['deposit'] - str_replace(",", "", $dp) ,
		);
		$this->db->where('id_pelanggan',$data['id_pelanggan']);
		$this->db->update('tb_pelanggan',$PL);
		$transaksi = array(

			'no_transaksi'			=> $no_jual,
			'no_raff'				=> $no_reff,
			'tgl'					=> $tgl_invoice,
			'date_invoice'			=> $tgl,
			'jam'					=> $jam,
			'id_pelanggan'			=> $id_pelanggan,
			'no_npwp'				=> $no_npwp,
			'total'					=> str_replace(",", "", $totalan),
			'potongan'				=> str_replace(",", "", $potongan),
			'beban'					=> str_replace(",", "", $nominal1),
			'grand_total'			=> str_replace(",", "", $total),
			'cash'					=> str_replace(",", "", $cash),
			'debet'					=> str_replace(",", "", $debet),
			'transfer'				=> str_replace(",", "", $transfer),
			'giro'					=> str_replace(",", "", $giro),
			'deposit'				=> str_replace(",", "", $dp),
			'kembali'				=> str_replace(",", "", $kembali),
			'sisa_tagihan'			=> str_replace(",", "", $sisa),
			'dpp'					=> str_replace(",", "", $dpp),
			'ppn'					=> str_replace(",", "", $ppn),


		);
		$insert_penjualan = $this->db->insert('transaksi_day',$transaksi);
		if ($potongan > 0) {
			
			$data = $this->db->from('tb_bebas')->where('nama1','Potongan')->where('nama2','Penjualan')->get();   
			foreach ($data->result() as $d){
				$transaksi_akun = array(

					'no_transaksi'		=> $no_jual,
					'jam'				=> $jam,
					'tgl'				=> $tgl,
					'kode_akun'			=> $d->kode_akun,
					'no_reff'			=> $no_reff,
					'id_kontak'			=> $id_pelanggan,
					'kredit'			=> str_replace(",", "", $potongan),
				);
				$insert_penjualan = $this->db->insert('transaksi_akun',$transaksi_akun);

			}
		}

		if ($nominal1 > 0) {
			
			$data = $this->db->from('tb_bebas')->where('nama1','Biaya Lain')->where('nama2','Penjualan')->get();   
			foreach ($data->result() as $d){
				$transaksi_akun = array(

					'no_transaksi'		=> $no_jual,
					'jam'				=> $jam,
					'tgl'				=> $tgl,
					'kode_akun'			=> $d->kode_akun,
					'no_reff'			=> $no_reff,
					'id_kontak'			=> $id_pelanggan,
					'kredit'			=> str_replace(",", "", $nominal1),
				);
				$insert_penjualan = $this->db->insert('transaksi_akun',$transaksi_akun);

			}
		}

		if ($sisa == 0){
			$komisi = array(

				'id_transaksi'			=> $no_jual,
				'no_reff'				=> $no_reff,
				'tgl'					=> $tgl_invoice,
				'date_invoice'			=> $tgl,
				'id_karyawan'			=> $id_karyawan,
				'id_pelanggan'			=> $id_pelanggan,
				'total_penjualan'		=> str_replace(",", "", $total),
				'total_komisi'			=> str_replace(",", "", $total_komisi),
				'status'				=> 0,


			);
			$insert_komisi = $this->db->insert('lap_komisi',$komisi);
		}else{
			$komisi = array(

				'id_transaksi'			=> $no_jual,
				'no_reff'				=> $no_reff,
				'tgl'					=> $tgl_invoice,
				'date_invoice'			=> $tgl,
				'id_karyawan'			=> $id_karyawan,
				'id_pelanggan'			=> $id_pelanggan,
				'total_penjualan'		=> str_replace(",", "", $total),
				'total_komisi'			=> str_replace(",", "", $total_komisi),
				'status'				=> 0,


			);
			$insert_komisi = $this->db->insert('lap_komisi',$komisi);
		}
		$user = $this->session->userdata('username');
		$nojual	 = $this->input->post('nojual');
		$query = "SELECT * FROM tb_detail_b_barangps WHERE no_jual = '$nojual'"; 
		$data= $this->db->query($query);  
		$stk = 0;
		foreach ($data->result() as $d){
			$stk = $stk + $d->qtyb;
			$nojl = $d->no_jual;
			$data_tmp = array(

				'no_jual'   	=> $no_jual,
				'no_reff'		=> $no_reff,
				'id_pelanggan'	=> $id_pelanggan,
				'id_barang'		=> $d->id_barang,
				'qtyb'			=> $d->qtyb,
				'satuan_besar'	=> $d->satuan_besar,
				'harga_beli'	=> str_replace(".", "", $d->harga_beli),
				'disc'			=> $d->disc,
				'disc1'			=> $d->disc1,
				'tgl'			=> $tgl

			);
			$this->db->insert('tb_detail_penjualans',$data_tmp);
		}
		$query = "delete from tb_detail_b_barangps where user='$d->user' and no_jual = '$nojl'";
		$this->db->query($query);
		redirect('Penjualans/view_penjualan');
		
	}
	function insert_penjualan_cetak(){
		$a = $this->Model_penjualans->getNomorterakhir()->row_array();
                            //Mengambil Tahun di Sistem
		$tahun    = date('y');
		$id       = ('J');
		$id1       = ('-');
		$c = array('','I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII');
		$bln		= $c[date('n')];
		$format   = $tahun.$id.$id1.$bln;
		$data['autonumber'] = buatkode($a['no_jual'],$format,4);
		$no_jual		 = $data['autonumber'];
		$no_reff		 = $this->input->post('no_reff');
		$no_npwp		 = $this->input->post('no_npwp');
		$tgl_invoice	 = $this->input->post('tgl_invoice');
		$tgl			 = $this->input->post('tgl');
		$jam	 		 = date('H:i:s');
		$id_pelanggan	 = $this->input->post('id_pelanggan');
		$id_karyawan	 = $this->input->post('id_karyawan');
		$nojual	 	 	 = $this->input->post('nojual');
		$no_reff_sj	 	 = $this->input->post('no_reff_sj');
		$jatuh_tempo	 = $this->input->post('jatuh_tempo');
		$jatuh_tempoan	 = $this->input->post('jatuh_tempoan');
		$id_k_pelanggan	 = $this->input->post('id_k_pelanggan');
		$keterangan		 = $this->input->post('keterangan');
		$ket_alamat		 = $this->input->post('ket_alamat');
		$total		 	 = $this->input->post('total');
		$totalan		 = $this->input->post('totalan');
		$user		 	 = $this->input->post('user');
		$potongan		 = $this->input->post('potongan');
		$dpp			 = $this->input->post('dpp');
		$ppn			 = $this->input->post('ppn');
		$ongkir1		 = $this->input->post('ongkir1');
		$ongkir2		 = $this->input->post('ongkir2');
		$nominal1		 = $this->input->post('nominal1');
		$nominal2		 = $this->input->post('nominal2');
		$cash		 	 = $this->input->post('cash');
		$debet		 	 = $this->input->post('debet');
		$bank1		 	 = $this->input->post('bank1');
		$transfer		 = $this->input->post('transfer');
		$bank2		 	 = $this->input->post('bank2');
		$ka_pt		 		 = $this->input->post('ka_pt');
		$ka_by		 		 = $this->input->post('ka_by');
		$dp		 		 = $this->input->post('dp');
		$dp2	 		 = $this->input->post('dp2');
		$giro		 	 = $this->input->post('giro');
		$ket_giro		 = $this->input->post('ket_giro');
		$kembali		 = $this->input->post('kembali');
		$sisa		 	 = $this->input->post('sisa');
		$sisa2		 	 = $this->input->post('sisa2');
		$acc			 = $this->input->post('acc');
		$total_komisi	 = $this->input->post('total_komisi');
		if($total==0){
			$this->session->set_flashdata("message","<script> alert('Oops.. Total Masih Kosong')</script>");
			redirect('Penjualans/input_penjualan');
		}else{
			$data = array(

				'no_jual'			=> $no_jual,
				'no_reff'			=> $no_reff,
				'tgl_invoice'		=> $tgl_invoice,
				'date_invoice'		=> $tgl,
				'id_pelanggan'		=> $id_pelanggan,
				'id_sales'			=> $id_karyawan,
				'no_sj'				=> $nojual,
				'no_sjln'			=> $no_reff_sj,
				'jatuh_tempo'		=> $jatuh_tempo,
				'jatuh_tempoan'		=> $jatuh_tempoan,
				'id_k_pelanggan'	=> $id_k_pelanggan,
				'keterangan'		=> $keterangan,
				'ket_alamat'		=> $ket_alamat,
				'total'				=> str_replace(",", "", $total),
				'user'				=> $this->session->userdata('username'),
				'potongan'			=> str_replace(",", "", $potongan),
				'dpp'				=> str_replace(",", "", $dpp),
				'ppn'				=> str_replace(",", "", $ppn),
				'ongkir1'			=> $ongkir1,
				'ongkir2'			=> $ongkir2,
				'nominal1'			=> str_replace(",", "", $nominal1),
				'nominal2'			=> str_replace(",", "", $nominal2),
				'cash'				=> str_replace(",", "", $cash),
				'debet'				=> str_replace(",", "", $debet),
				'bank1'				=> $bank1,
				'transfer'			=> str_replace(",", "", $transfer),
				'bank2'				=> $bank2,
				'dp'				=> str_replace(",", "", $dp),
				'deposit'			=> str_replace(",", "", $dp2),
				'giro'				=> str_replace(",", "", $giro),
				'ket_giro'			=> $ket_giro,
				'kembali'			=> str_replace(",", "", $kembali),
				'cetak'				=> 1,
				'sisa'				=> str_replace(",", "", $sisa),
				'sisa2'				=> str_replace(",", "", $sisa2),
				'total_komisi'		=> str_replace(",", "", $total_komisi),


			);
			$insert_penjualan = $this->db->insert('tb_penjualans',$data);
			$this->db->query("UPDATE tb_kirim SET status = 1 WHERE no_kirim = '$nojual'");
			$this->db->query(" UPDATE tb_pelanggan set no_reff =  no_reff + 1 where id_pelanggan='$id_pelanggan'");
		}
		
		$pen = $this->db->get_where('tb_pelanggan',array('id_pelanggan'=>$id_pelanggan))->row_array();
		$PL = array(
			'hutang' => str_replace(",", "", $sisa) + $pen['hutang'],
			'total_hutang' => str_replace(",", "", $sisa) + $pen['total_hutang'],
			'deposit' => $pen['deposit'] - str_replace(",", "", $dp) ,
		);
		$this->db->where('id_pelanggan',$data['id_pelanggan']);
		$this->db->update('tb_pelanggan',$PL);
		$transaksi = array(

			'no_transaksi'			=> $no_jual,
			'no_raff'				=> $no_reff,
			'tgl'					=> $tgl_invoice,
			'date_invoice'			=> $tgl,
			'jam'					=> $jam,
			'id_pelanggan'			=> $id_pelanggan,
			'no_npwp'				=> $no_npwp,
			'total'					=> str_replace(",", "", $totalan),
			'potongan'				=> str_replace(",", "", $potongan),
			'beban'					=> str_replace(",", "", $nominal1),
			'grand_total'			=> str_replace(",", "", $total),
			'cash'					=> str_replace(",", "", $cash),
			'debet'					=> str_replace(",", "", $debet),
			'transfer'				=> str_replace(",", "", $transfer),
			'giro'					=> str_replace(",", "", $giro),
			'deposit'				=> str_replace(",", "", $dp),
			'kembali'				=> str_replace(",", "", $kembali),
			'sisa_tagihan'			=> str_replace(",", "", $sisa),
			'dpp'					=> str_replace(",", "", $dpp),
			'ppn'					=> str_replace(",", "", $ppn),


		);
		$insert_penjualan = $this->db->insert('transaksi_day',$transaksi);
		if ($potongan > 0) {
			
			$data = $this->db->from('tb_bebas')->where('nama1','Potongan')->where('nama2','Penjualan')->get();   
			foreach ($data->result() as $d){
				$transaksi_akun = array(

					'no_transaksi'		=> $no_jual,
					'jam'				=> $jam,
					'tgl'				=> $tgl,
					'kode_akun'			=> $d->kode_akun,
					'no_reff'			=> $no_reff,
					'id_kontak'			=> $id_pelanggan,
					'kredit'			=> str_replace(",", "", $potongan),
				);
				$insert_penjualan = $this->db->insert('transaksi_akun',$transaksi_akun);

			}
		}

		if ($nominal1 > 0) {
			
			$data = $this->db->from('tb_bebas')->where('nama1','Biaya Lain')->where('nama2','Penjualan')->get();   
			foreach ($data->result() as $d){
				$transaksi_akun = array(

					'no_transaksi'		=> $no_jual,
					'jam'				=> $jam,
					'tgl'				=> $tgl,
					'kode_akun'			=> $d->kode_akun,
					'no_reff'			=> $no_reff,
					'id_kontak'			=> $id_pelanggan,
					'kredit'			=> str_replace(",", "", $nominal1),
				);
				$insert_penjualan = $this->db->insert('transaksi_akun',$transaksi_akun);

			}
		}

		if ($sisa == 0){
			$komisi = array(

				'id_transaksi'			=> $no_jual,
				'no_reff'				=> $no_reff,
				'tgl'					=> $tgl_invoice,
				'date_invoice'			=> $tgl,
				'id_karyawan'			=> $id_karyawan,
				'id_pelanggan'			=> $id_pelanggan,
				'total_penjualan'		=> str_replace(",", "", $total),
				'total_komisi'			=> str_replace(",", "", $total_komisi),
				'status'				=> 0,


			);
			$insert_komisi = $this->db->insert('lap_komisi',$komisi);
		}else{
			$komisi = array(

				'id_transaksi'			=> $no_jual,
				'no_reff'				=> $no_reff,
				'tgl'					=> $tgl_invoice,
				'date_invoice'			=> $tgl,
				'id_karyawan'			=> $id_karyawan,
				'id_pelanggan'			=> $id_pelanggan,
				'total_penjualan'		=> str_replace(",", "", $total),
				'total_komisi'			=> str_replace(",", "", $total_komisi),
				'status'				=> 0,


			);
			$insert_komisi = $this->db->insert('lap_komisi',$komisi);
		}
		$user = $this->session->userdata('username');
		$nojual	 = $this->input->post('nojual');
		$query = "SELECT * FROM tb_detail_b_barangps WHERE no_jual = '$nojual'"; 
		$data= $this->db->query($query);  
		$stk = 0;
		foreach ($data->result() as $d){
			$stk = $stk + $d->qtyb;
			$nojl = $d->no_jual;
			$data_tmp = array(

				'no_jual'   	=> $no_jual,
				'no_reff'		=> $no_reff,
				'id_pelanggan'	=> $id_pelanggan,
				'id_barang'		=> $d->id_barang,
				'qtyb'			=> $d->qtyb,
				'satuan_besar'	=> $d->satuan_besar,
				'harga_beli'	=> str_replace(".", "", $d->harga_beli),
				'disc'			=> $d->disc,
				'disc1'			=> $d->disc1,
				'tgl'			=> $tgl

			);
			$this->db->insert('tb_detail_penjualans',$data_tmp);
		}
		$query = "delete from tb_detail_b_barangps where user='$d->user' and no_jual = '$nojl'";
		$this->db->query($query);
		redirect('Penjualans/cetak_struk/'.$no_jual);
		
	}
	function insert_penjualan_cetakk(){
		$a = $this->Model_penjualans->getNomorterakhir()->row_array();
                            //Mengambil Tahun di Sistem
		$tahun    = date('y');
		$id       = ('J');
		$id1       = ('-');
		$c = array('','I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII');
		$bln		= $c[date('n')];
		$format   = $tahun.$id.$id1.$bln;
		$data['autonumber'] = buatkode($a['no_jual'],$format,4);
		$no_jual		 = $data['autonumber'];
		$no_reff		 = $this->input->post('no_reff');
		$no_npwp		 = $this->input->post('no_npwp');
		$tgl_invoice	 = $this->input->post('tgl_invoice');
		$tgl			 = $this->input->post('tgl');
		$jam	 		 = date('H:i:s');
		$id_pelanggan	 = $this->input->post('id_pelanggan');
		$id_karyawan	 = $this->input->post('id_karyawan');
		$nojual	 	 	 = $this->input->post('nojual');
		$no_reff_sj	 	 = $this->input->post('no_reff_sj');
		$jatuh_tempo	 = $this->input->post('jatuh_tempo');
		$jatuh_tempoan	 = $this->input->post('jatuh_tempoan');
		$id_k_pelanggan	 = $this->input->post('id_k_pelanggan');
		$keterangan		 = $this->input->post('keterangan');
		$ket_alamat		 = $this->input->post('ket_alamat');
		$total		 	 = $this->input->post('total');
		$totalan		 = $this->input->post('totalan');
		$user		 	 = $this->input->post('user');
		$potongan		 = $this->input->post('potongan');
		$dpp			 = $this->input->post('dpp');
		$ppn			 = $this->input->post('ppn');
		$ongkir1		 = $this->input->post('ongkir1');
		$ongkir2		 = $this->input->post('ongkir2');
		$nominal1		 = $this->input->post('nominal1');
		$nominal2		 = $this->input->post('nominal2');
		$cash		 	 = $this->input->post('cash');
		$debet		 	 = $this->input->post('debet');
		$bank1		 	 = $this->input->post('bank1');
		$transfer		 = $this->input->post('transfer');
		$bank2		 	 = $this->input->post('bank2');
		$ka_pt		 		 = $this->input->post('ka_pt');
		$ka_by		 		 = $this->input->post('ka_by');
		$dp		 		 = $this->input->post('dp');
		$dp2	 		 = $this->input->post('dp2');
		$giro		 	 = $this->input->post('giro');
		$ket_giro		 = $this->input->post('ket_giro');
		$kembali		 = $this->input->post('kembali');
		$sisa		 	 = $this->input->post('sisa');
		$sisa2		 	 = $this->input->post('sisa2');
		$acc			 = $this->input->post('acc');
		$total_komisi	 = $this->input->post('total_komisi');
		if($total==0){
			$this->session->set_flashdata("message","<script> alert('Oops.. Total Masih Kosong')</script>");
			redirect('Penjualans/input_penjualan');
		}else{
			$data = array(

				'no_jual'			=> $no_jual,
				'no_reff'			=> $no_reff,
				'tgl_invoice'		=> $tgl_invoice,
				'date_invoice'		=> $tgl,
				'id_pelanggan'		=> $id_pelanggan,
				'id_sales'			=> $id_karyawan,
				'no_sj'				=> $nojual,
				'no_sjln'			=> $no_reff_sj,
				'jatuh_tempo'		=> $jatuh_tempo,
				'jatuh_tempoan'		=> $jatuh_tempoan,
				'id_k_pelanggan'	=> $id_k_pelanggan,
				'keterangan'		=> $keterangan,
				'ket_alamat'		=> $ket_alamat,
				'total'				=> str_replace(",", "", $total),
				'user'				=> $this->session->userdata('username'),
				'potongan'			=> str_replace(",", "", $potongan),
				'dpp'				=> str_replace(",", "", $dpp),
				'ppn'				=> str_replace(",", "", $ppn),
				'ongkir1'			=> $ongkir1,
				'ongkir2'			=> $ongkir2,
				'nominal1'			=> str_replace(",", "", $nominal1),
				'nominal2'			=> str_replace(",", "", $nominal2),
				'cash'				=> str_replace(",", "", $cash),
				'debet'				=> str_replace(",", "", $debet),
				'bank1'				=> $bank1,
				'transfer'			=> str_replace(",", "", $transfer),
				'bank2'				=> $bank2,
				'dp'				=> str_replace(",", "", $dp),
				'deposit'			=> str_replace(",", "", $dp2),
				'giro'				=> str_replace(",", "", $giro),
				'ket_giro'			=> $ket_giro,
				'kembali'			=> str_replace(",", "", $kembali),
				'cetak'				=> 1,
				'sisa'				=> str_replace(",", "", $sisa),
				'sisa2'				=> str_replace(",", "", $sisa2),
				'total_komisi'		=> str_replace(",", "", $total_komisi),


			);
			$insert_penjualan = $this->db->insert('tb_penjualans',$data);
			$this->db->query("UPDATE tb_kirim SET status = 1 WHERE no_kirim = '$nojual'");
			$this->db->query(" UPDATE tb_pelanggan set no_reff =  no_reff + 1 where id_pelanggan='$id_pelanggan'");
		}
		
		$pen = $this->db->get_where('tb_pelanggan',array('id_pelanggan'=>$id_pelanggan))->row_array();
		$PL = array(
			'hutang' => str_replace(",", "", $sisa) + $pen['hutang'],
			'total_hutang' => str_replace(",", "", $sisa) + $pen['total_hutang'],
			'deposit' => $pen['deposit'] - str_replace(",", "", $dp) ,
		);
		$this->db->where('id_pelanggan',$data['id_pelanggan']);
		$this->db->update('tb_pelanggan',$PL);
		$transaksi = array(

			'no_transaksi'			=> $no_jual,
			'no_raff'				=> $no_reff,
			'tgl'					=> $tgl_invoice,
			'date_invoice'			=> $tgl,
			'jam'					=> $jam,
			'id_pelanggan'			=> $id_pelanggan,
			'no_npwp'				=> $no_npwp,
			'total'					=> str_replace(",", "", $totalan),
			'potongan'				=> str_replace(",", "", $potongan),
			'beban'					=> str_replace(",", "", $nominal1),
			'grand_total'			=> str_replace(",", "", $total),
			'cash'					=> str_replace(",", "", $cash),
			'debet'					=> str_replace(",", "", $debet),
			'transfer'				=> str_replace(",", "", $transfer),
			'giro'					=> str_replace(",", "", $giro),
			'deposit'				=> str_replace(",", "", $dp),
			'kembali'				=> str_replace(",", "", $kembali),
			'sisa_tagihan'			=> str_replace(",", "", $sisa),
			'dpp'					=> str_replace(",", "", $dpp),
			'ppn'					=> str_replace(",", "", $ppn),


		);
		$insert_penjualan = $this->db->insert('transaksi_day',$transaksi);
		if ($potongan > 0) {
			
			$data = $this->db->from('tb_bebas')->where('nama1','Potongan')->where('nama2','Penjualan')->get();   
			foreach ($data->result() as $d){
				$transaksi_akun = array(

					'no_transaksi'		=> $no_jual,
					'jam'				=> $jam,
					'tgl'				=> $tgl,
					'kode_akun'			=> $d->kode_akun,
					'no_reff'			=> $no_reff,
					'id_kontak'			=> $id_pelanggan,
					'kredit'			=> str_replace(",", "", $potongan),
				);
				$insert_penjualan = $this->db->insert('transaksi_akun',$transaksi_akun);

			}
		}

		if ($nominal1 > 0) {
			
			$data = $this->db->from('tb_bebas')->where('nama1','Biaya Lain')->where('nama2','Penjualan')->get();   
			foreach ($data->result() as $d){
				$transaksi_akun = array(

					'no_transaksi'		=> $no_jual,
					'jam'				=> $jam,
					'tgl'				=> $tgl,
					'kode_akun'			=> $d->kode_akun,
					'no_reff'			=> $no_reff,
					'id_kontak'			=> $id_pelanggan,
					'kredit'			=> str_replace(",", "", $nominal1),
				);
				$insert_penjualan = $this->db->insert('transaksi_akun',$transaksi_akun);

			}
		}

		if ($sisa == 0){
			$komisi = array(

				'id_transaksi'			=> $no_jual,
				'no_reff'				=> $no_reff,
				'tgl'					=> $tgl_invoice,
				'date_invoice'			=> $tgl,
				'id_karyawan'			=> $id_karyawan,
				'id_pelanggan'			=> $id_pelanggan,
				'total_penjualan'		=> str_replace(",", "", $total),
				'total_komisi'			=> str_replace(",", "", $total_komisi),
				'status'				=> 0,


			);
			$insert_komisi = $this->db->insert('lap_komisi',$komisi);
		}else{
			$komisi = array(

				'id_transaksi'			=> $no_jual,
				'no_reff'				=> $no_reff,
				'tgl'					=> $tgl_invoice,
				'date_invoice'			=> $tgl,
				'id_karyawan'			=> $id_karyawan,
				'id_pelanggan'			=> $id_pelanggan,
				'total_penjualan'		=> str_replace(",", "", $total),
				'total_komisi'			=> str_replace(",", "", $total_komisi),
				'status'				=> 0,


			);
			$insert_komisi = $this->db->insert('lap_komisi',$komisi);
		}
		$user = $this->session->userdata('username');
		$nojual	 = $this->input->post('nojual');
		$query = "SELECT * FROM tb_detail_b_barangps WHERE no_jual = '$nojual'"; 
		$data= $this->db->query($query);  
		$stk = 0;
		foreach ($data->result() as $d){
			$stk = $stk + $d->qtyb;
			$nojl = $d->no_jual;
			$data_tmp = array(

				'no_jual'   	=> $no_jual,
				'no_reff'		=> $no_reff,
				'id_pelanggan'	=> $id_pelanggan,
				'id_barang'		=> $d->id_barang,
				'qtyb'			=> $d->qtyb,
				'satuan_besar'	=> $d->satuan_besar,
				'harga_beli'	=> str_replace(".", "", $d->harga_beli),
				'disc'			=> $d->disc,
				'disc1'			=> $d->disc1,
				'tgl'			=> $tgl

			);
			$this->db->insert('tb_detail_penjualans',$data_tmp);
		}
		$query = "delete from tb_detail_b_barangps where user='$d->user' and no_jual = '$nojl'";
		$this->db->query($query);
		redirect('Penjualans/cetak_nota/'.$no_jual);
		
	}
	function view_detail_retur(){
		$user = $this->session->userdata('username');
		$query = "SELECT tb_retur_tmp.id_barang,qtyb,tb_retur_tmp.satuan_besar,harga_beli,disc,disc1,user,tb_barang.nama_barang FROM tb_retur_tmp 
		INNER JOIN tb_barang ON tb_retur_tmp.id_barang = tb_barang.id_barang WHERE tb_retur_tmp.user = '$user' ORDER BY tb_retur_tmp.jam desc"; //dihapus disc2,
		$query1= $this->db->query($query);
		return $query1->result_array();
		
	}
	function get_barang_by_kode($idbarang){
		$hsl=$this->db->query("SELECT * FROM tbl_detail_b_barangP WHERE id_barang='$idbarang'");
		if($hsl->num_rows()>0){
			foreach ($hsl->result() as $data) {
				$hasil=array(
					'id_barang' => $data->id_barang,
					'qtyb' => $data->qtyb,
					'qtyk' => $data->qtyk
				);
			}
		}
		return $hasil;
	}

	function update($idbarang,$qtyb,$qtyk){
		$this->db->where(array("id_barang"=>$idbarang));
		$this->db->update("tb_detail_b_barangps",array($qtyb=>$qty));
	}

	function read(){
		$this->db->order_by("id_barang","asc");
		$query=$this->db->get("tb_detail_b_barangps");
		return $query->result_array();
	}



	function getNomorterakhir(){
		$query = "SELECT * FROM tb_penjualans where MID(tgl_invoice,4,2)=MONTH(now()) ORDER BY no_jual DESC LIMIT 1";
		return $this->db->query($query);
	}
	function getNomorterakhir2(){
		$query = "SELECT * FROM tb_retur where MID(tanggal,6,2)=MONTH(now()) ORDER BY no_retur DESC LIMIT 1";
		return $this->db->query($query);
	}				
	function getNomorterakhir1(){
		$query = "select no_sj from tb_penjualans ORDER BY no_sj DESC LIMIT 1 ";
		return $this->db->query($query);
	}
	function get_barang($kobar){
		$hsl=$this->db->query("SELECT * FROM tb_barang where id_barang='$kobar'");
		return $hsl;
	}
	
	

	function stok($kode)
	{
		return $this->db
		->select('nama_barang, qty_b')
		->where('id_barang', $kode)
		->limit(1)
		->get('tb_barang');
	}
	
	
	function delete($user,$id_barang)
	{ 
		$barang = $this->db->get_where('tb_detail_b_barangps',array('id_barang'=>$id_barang))->row_array();
		$id_barang = $barang['id_barang'];
		$user = $this->session->userdata('username');
		$sql  = "DELETE FROM tb_detail_b_barangps WHERE user='$user' AND id_barang = '$id_barang'";
		return $this->db->query($sql,array($user,$id_barang));
	}
	function delete_retur($user,$id_brg)
	{ 
		$barang = $this->db->get_where('tb_retur_tmp',array('id_barang'=>$id_brg))->row_array();
		$id_brg = $barang['id_barang'];
		$user = $this->session->userdata('username');
		$sql  = "DELETE FROM tb_retur_tmp WHERE user='$user' AND id_barang = '$id_brg'";
		return $this->db->query($sql,array($user,$id_brg));
	}
	function delete_kirim($user,$idbarang)
	{ 
		$barang = $this->db->get_where('tb_detail_tmp',array('id_barang'=>$idbarang))->row_array();
		$idbarang = $barang['id_barang'];
		$user = $this->session->userdata('username');
		$sql  = "DELETE FROM tb_detail_tmp WHERE user='$user'AND id_barang = '$idbarang'";
		return $this->db->query($sql,array($user,$idbarang));
	}
	function d_retur_tmp($user,$idbarang)
	{ 
		$barang = $this->db->get_where('retur_tmp',array('id_barang'=>$idbarang))->row_array();
		$idbarang = $barang['id_barang'];
		$user = $this->session->userdata('username');
		$sql  = "DELETE FROM retur_tmp WHERE user='$user' AND id_barang = '$idbarang'";
		return $this->db->query($sql,array($user,$idbarang));
	}

}

?>