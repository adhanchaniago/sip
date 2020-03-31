<?php

class Model_purchase extends CI_Model{
	
	function barang_list(){
		$hasil=$this->db->query("SELECT * FROM tb_detail_b_barangP");
		return $hasil->result();
	}
	public function getAllPembelian($offset, $limit){
		$query = $this->db->query("SELECT tb_pembelian.no_invoice,tb_pembelian.no_beli,tb_pembelian.no_reff,tb_pembelian.keterangan,tb_pembelian.total,user,nominal1,nominal,sisa,acc,edit,
			tb_supplier.id_supplier,nama_supplier,tb_pembelian.tgl_invoice,tb_pembelian.tempo,tb_pembelian.jatuh_tempo
			FROM tb_pembelian INNER JOIN tb_supplier ON tb_pembelian.id_supplier = tb_supplier.id_supplier WHERE tb_pembelian.acc = 0 ORDER BY tb_pembelian.no_beli DESC LIMIT $offset, $limit");
		return $query;
	}

	public function getAllPembelian_count(){
		$query = $this->db->query("SELECT * FROM tb_pembelian");
		return $query->num_rows();
	}
	public function getAllPembelianRetur($offset, $limit){
		$query = $this->db->query("SELECT tb_retur_pb.no_retur,tb_retur_pb.no_beli,tb_retur_pb.no_reff,tb_retur_pb.keterangan,tb_retur_pb.total,user,cash,transfer,potongan,bank2,grand_total,
			tb_supplier.id_supplier,nama_supplier,tb_retur_pb.tanggal
			FROM tb_retur_pb INNER JOIN tb_supplier ON tb_retur_pb.id_supplier = tb_supplier.id_supplier ORDER BY tb_retur_pb.no_retur DESC LIMIT $offset, $limit");
		return $query;
	}
	public function getAllPembelianRetur_count(){
		$query = $this->db->query("SELECT * FROM tb_retur_pb");
		return $query->num_rows();
	}
	function view_alasan_edit(){
		$user = $this->session->userdata('username');
		// $no_beli = $this->input->post('no_beli');
		$query = "SELECT * FROM t_editpb WHERE user = '$user'";
		return $this->db->query($query);
	}

	
	function view_cash(){
		
		$query = "SELECT tb_pembelian.no_beli,tb_pembelian.no_reff,tb_pembelian.ket_pel,tb_pembelian.no_sjln,tb_pembelian.keterangan,tb_pembelian.total,tb_pembelian.total_belanja,tb_pembelian.total_retur,user,potongan,nominal1,nominal2,sisa,cetak,acc,status_kirim,
		tb_pelanggan.id_pelanggan,nama_pelanggan,tb_pembelian.tgl_invoice,tb_pembelian.tempo,no_sj,tb_pembelian.jatuh_tempo
		FROM tb_pembelian INNER JOIN tb_pelanggan ON tb_pembelian.id_pelanggan = tb_pelanggan.id_pelanggan
		where tb_pembelian.id_pelanggan = 'Cash3' AND tb_pelanggan.id_pelanggan='Cash2' AND tb_pelanggan.id_pelanggan='Cash1' 
		ORDER BY tb_pembelian.no_beli desc";
		return $this->db->query($query);
		
	}
	function get_retur(){
		$no_beli = $this->uri->segment(3);
		$query3 = "SELECT *,tb_pembelianpo.no_reff as no_reff from tb_pembelianpo 
		INNER JOIN tb_supplier ON tb_pembelianpo.id_supplier = tb_supplier.id_supplier
		INNER JOIN tb_mata_uang ON tb_supplier.kode_mu = tb_mata_uang.kode_mu
		WHERE tb_pembelianpo.no_beli='$no_beli'";
		return $this->db->query($query3);
	}
	function get_po(){
		$no_po = $this->uri->segment(3);
		$query3 = "SELECT tb_po.no_po,tb_po.no_jual,tb_po.no_reff,tb_po.tgl,tb_po.id_supplier,tb_supplier.nama_supplier,tb_po.id_pelanggan,tb_pelanggan.nama_pelanggan,tb_po.alamat FROM tb_po INNER JOIN tb_supplier ON tb_po.id_supplier = tb_supplier.id_supplier INNER JOIN tb_pelanggan ON tb_po.id_pelanggan = tb_pelanggan.id_pelanggan WHERE tb_po.no_po='$no_po'";
		return $this->db->query($query3);
	}
	function get_po_edit(){
		$no_po = $this->uri->segment(3);
		$query3 = "SELECT tb_po.no_po,tb_detail_po.id_barang,tb_barang.nama_barang,tb_detail_po.harga_jual,tb_detail_po.qty,tb_detail_po.satuan FROM tb_po INNER JOIN tb_detail_po ON tb_po.no_po = tb_detail_po.no_po INNER JOIN tb_barang ON tb_detail_po.id_barang = tb_barang.id_barang WHERE tb_po.no_po='$no_po'";
		return $this->db->query($query3);
	}
	function no_jual(){
		$query = "SELECT * from tb_penjualan";
		return $this->db->query($query);
	}
	function no_po(){
		$query = "SELECT * from tb_po where stok > 0";
		return $this->db->query($query);
	}
	function view_purchase(){
		$query = "SELECT *,tb_pembelianpo.keterangan as ket,tb_pembelianpo.no_reff as no_reff FROM tb_pembelianpo INNER JOIN tb_supplier ON tb_pembelianpo.id_supplier = tb_supplier.id_supplier WHERE tb_pembelianpo.acc = 0 ORDER BY tb_pembelianpo.no_beli desc";
		return $this->db->query($query);		
	}
	function view_supplier_mu(){
		$query = "SELECT * FROM tb_supplier INNER JOIN tb_mata_uang ON tb_mata_uang.kode_mu = tb_supplier.kode_mu ORDER BY nama_supplier desc";
		return $this->db->query($query);		
	}
	function view_retur(){
		$query = "SELECT *,tb_retur_po.keterangan as keterangan,tb_retur_po.no_reff as no_reff
		FROM tb_retur_po INNER JOIN tb_supplier ON tb_retur_po.id_supplier = tb_supplier.id_supplier ORDER BY tb_retur_po.no_retur desc";
		return $this->db->query($query);		
	}
	function penjualan_data($id){
		$query = "SELECT * from tb_pembelian where tb_pembelian.no_beli = '$id'";
		return $this->db->query($query);
	}
	function detail_purchase($id){
		
		$query = "SELECT *,tb_pembelianpo.kurs_tukar as kurs FROM tb_pembelianpo INNER JOIN tb_detail_pembelianpo ON tb_pembelianpo.no_beli = tb_detail_pembelianpo.no_beli INNER JOIN tb_barang ON tb_detail_pembelianpo.id_barang = tb_barang.id_barang INNER JOIN tb_mata_uang ON tb_mata_uang.kode_mu = tb_pembelianpo.kode_mu WHERE tb_pembelianpo.no_beli = '$id'"; //dhapus ,disc2
		return $this->db->query($query);
	}
	function detail_retur_po($id){
		
		$query = "SELECT * FROM tb_retur_po INNER JOIN tb_barang_returpo 
		ON tb_retur_po.no_retur = tb_barang_returpo.no_retur INNER JOIN tb_barang ON tb_barang_returpo.id_barang = tb_barang.id_barang WHERE tb_retur_po.no_retur = '$id'"; //dhapus ,disc2
		return $this->db->query($query);
	}
	function detail_retur($id){
		
		$query = "SELECT tb_pembelian.no_beli,tb_pembelian.ket_retur,tb_detail_returb.id_barang,tb_detail_returb.ppn,nama_barang,qtyb,disc,disc1,disc2,tb_barang.satuan_besar,harga_beli FROM tb_pembelian INNER JOIN tb_detail_returb 
		ON tb_pembelian.no_beli = tb_detail_returb.no_beli INNER JOIN tb_barang ON tb_detail_returb.id_barang = tb_barang.id_barang  WHERE tb_pembelian.no_beli = '$id'"; //dhapus ,disc2
		return $this->db->query($query);
	}

	function view_detail(){
		$user = $this->session->userdata('username');	
		$query = "SELECT tb_detail_tmp.id_barang,jml_krm,user,tb_detail_tmp.no_jl,tb_barang.satuan_besar,tb_barang.nama_barang FROM tb_detail_tmp INNER JOIN tb_barang ON tb_detail_tmp.id_barang = tb_barang.id_barang WHERE tb_detail_tmp.user='$user'"; //dihapus disc2,
		$query1= $this->db->query($query);
		return $query1->result_array();
		
	}
	function view_detail_po(){
		$user = $this->session->userdata('username');	
		$query = "SELECT tb_tmp_po.id_barang,tb_barang.nama_barang,tb_tmp_po.qty,tb_tmp_po.harga_jual,tb_tmp_po.satuan,tb_tmp_po.user FROM tb_tmp_po INNER JOIN tb_barang ON tb_tmp_po.id_barang = tb_barang.id_barang WHERE tb_tmp_po.user='$user'"; //dihapus disc2,
		$query1= $this->db->query($query);
		return $query1->result_array();
		
	}
	function view_po(){
		$query = "SELECT tb_po.no_po,tb_po.no_jual,tb_po.keterangan,tb_po.no_reff,cetak,tb_po.batal,tb_po.edit,tb_po.tgl,acc,tb_po.id_supplier,tb_supplier.nama_supplier,tb_po.id_pelanggan,tb_pelanggan.nama_pelanggan,tb_po.alamat FROM tb_po INNER JOIN tb_supplier ON tb_po.id_supplier = tb_supplier.id_supplier INNER JOIN tb_pelanggan ON tb_po.id_pelanggan = tb_pelanggan.id_pelanggan ORDER BY tb_po.no_po DESC";
		return $this->db->query($query);
		
	}
	function tmp_edit_po(){
		$user 		= $this->session->userdata('username');
		$query = "SELECT * from tmp_edit_po where tmp_edit_po.user = '$user'";
		return $this->db->query($query);
	}

	function detail_po($id){
		$query = "SELECT tb_po.no_po,tb_po.acc,tb_po.batal,tb_detail_po.id_barang,tb_detail_po.kode_mu,tb_mata_uang.simbol,tb_detail_po.qty,tb_detail_po.harga_jual,tb_detail_po.satuan,tb_barang.nama_barang FROM tb_po INNER JOIN tb_detail_po ON tb_po.no_po = tb_detail_po.no_po INNER JOIN tb_barang ON tb_detail_po.id_barang = tb_barang.id_barang INNER JOIN tb_mata_uang ON tb_detail_po.kode_mu = tb_mata_uang.kode_mu WHERE tb_po.no_po = '$id'";
		return $this->db->query($query);
	}
	function detail_alamat($id){
		$query = "SELECT tb_po.no_po,tb_po.no_jual,tb_po.no_reff,tb_po.tgl,stok,tb_po.id_supplier,tb_supplier.nama_supplier,tb_po.id_pelanggan,tb_pelanggan.nama_pelanggan,tb_po.alamat,tb_po.keterangan FROM tb_po INNER JOIN tb_supplier ON tb_po.id_supplier = tb_supplier.id_supplier INNER JOIN tb_pelanggan ON tb_po.id_pelanggan = tb_pelanggan.id_pelanggan WHERE tb_po.no_po = '$id'";
		return $this->db->query($query);
	}

	function looping_edit_po($id){
		$query = "SELECT * from tb_po where tb_po.no_po = '$id'";
		return $this->db->query($query);
	}
	function view_alasan_edit_po($id){
		$query = "SELECT * FROM edit_po WHERE no_po = '$id'";
		return $this->db->query($query);
	}		
	function looping_cetak_po($id){
		$query = "SELECT * from tb_po where tb_po.no_po = '$id'";
		return $this->db->query($query);
	}
	function view_alasan_cetak_po($id){
		$query = "SELECT * FROM cetak_po WHERE no_po = '$id'";
		return $this->db->query($query);
	}
	function looping_batal($id){
		$query = "SELECT * from tb_po where tb_po.no_po = '$id'";
		return $this->db->query($query);
	}
	function update_harga(){
		$idbar 			= $this->input->post('idbar');
		$pl 			= $this->input->post('pl');
		$hajul			= $this->input->post('hajul');
		$walkk 			= $this->input->post('walkk');
		$tkw	 		= $this->input->post('tkw');
		$tbn	 		= $this->input->post('tbn');
		$slss 		    = $this->input->post('slss');

		$data = array(


			'id_barang'		=> $idbar,
			'pricelist'		=> str_replace(".", "", $pl),
			'hajul'			=> str_replace(".", "", $hajul),
			'walk'			=> str_replace(".", "", $walkk),
			'tk'			=> str_replace(".", "", $tkw),
			'tbn'			=> str_replace(".", "", $tbn),
			'sls'			=> str_replace(".", "", $slss)



		);
		$this->db->where('id_barang', $idbar);
		$this->db->update('tb_barang',$data);

	}
	function input_detail_po(){
		$idbarang 			= $this->input->post('idbarang');
		$hargajual			= $this->input->post('hargajual');
		$qtybes				= $this->input->post('qtybes');
		$satuanbes 			= $this->input->post('satuanbes');
		$kurs 				= $this->input->post('kurs');
		$kodemu 			= $this->input->post('kodemu');
		$jam 				= date('H:i:s');
		$user 				= $this->session->userdata('username');
		if($qtybes == 0){
			echo "";
		}else{
			$data = array(
				'id_barang'		=> $idbarang,
				'harga_jual'	=> $hargajual,
				'qty'			=> $qtybes,
				'satuan'		=> $satuanbes,
				'kurs_tukar'	=> $kurs,
				'kode_mu'		=> $kodemu,
				'jam'			=> $jam,
				'user'			=> $this->session->userdata('username'),
			);
			$query = $this->db->query("SELECT * FROM tb_tmp_po WHERE user='$user' AND id_barang='$idbarang'");
			$result = $query->result_array();
			$count = count($result);
			
			if (empty($count)) {
				
				$this->db->insert('tb_tmp_po',$data);
				
			}elseif ($count == 1) {

				$this->db->where('id_barang', $data['id_barang']) AND $this->db->where('user', $data['user']);
				$this->db->update('tb_tmp_po',$data);

			}
		}
	}
	function input_detail_po_edit(){
		$no_po 				= $this->input->post('no_po');
		$idbarang 			= $this->input->post('idbarang');
		$hargajual			= $this->input->post('hargajual');
		$qtybes				= $this->input->post('qtybes');
		$satuanbes 			= $this->input->post('satuanbes');
		$jam 				= date('H:i:s');
		$user 				= $this->session->userdata('username');
		$barang = $this->db->get_where('tb_detail_po',array('id_barang'=>$idbarang,'no_po'=>$no_po))->row_array();
		$stok = $barang['qty'];
		if($qtybes > $stok){
			$this->load->library('session');
			$this->session->set_flashdata('error',"<script> alert('Oops.. Jangan Nakal Yah..')</script>");
		}elseif($qtybes == 0){
			$this->load->library('session');
			$this->session->set_flashdata('error',"<script> alert('Oops.. Jangan Nakal Yah..')</script>");
		}else{
			$data = array(
				'no_po'			=> $no_po,
				'id_barang'		=> $idbarang,
				'harga_jual'	=> str_replace(".", "", $hargajual),
				'qty'			=> $qtybes,
				'satuan'		=> $satuanbes,
				'jam'			=> $jam,
				'user'			=> $this->session->userdata('username'),
			);
			$query = $this->db->query("SELECT * FROM tb_tmp_po WHERE user='$user' AND id_barang='$idbarang'");
			$result = $query->result_array();
			$count = count($result);
			
			if (empty($count)) {
				
				$this->db->insert('tb_tmp_po',$data);
				
			}elseif ($count == 1) {

				$this->db->where('id_barang', $data['id_barang']) AND $this->db->where('user', $data['user']);
				$this->db->update('tb_tmp_po',$data);

			}
		}
	}
	function input_detail_barang(){
		$idbarang 			= $this->input->post('idbarang');
		$stok 				= $this->input->post('stok');
		$qtybes				= $this->input->post('qtybes');
		$satuanbes 			= $this->input->post('satuanbes');
		$modal	 		    = $this->input->post('modal');
		$modalt	 		    = $this->input->post('modalt');
		$modalterakhir	    = $this->input->post('modalterakhir');
		$hargabeli 		    = $this->input->post('hargabeli');
		$ppn 		        = $this->input->post('ppn');
		$disc 		        = $this->input->post('disc');
		$disc1		        = $this->input->post('disc1');
		$disc2		        = $this->input->post('disc2');
		$jam		        = date('H:i:s');
		$pl		        	= $this->input->post('pl');
		$hajul		        = $this->input->post('hajul');
		$walkk		        = $this->input->post('walkk');
		$tkw		        = $this->input->post('tkw');
		$tbn		        = $this->input->post('tbn');
		$slss		        = $this->input->post('slss');
		$kurs		        = $this->input->post('kurs');
		$simbol		        = $this->input->post('simbol');
		$user		 	    = $this->session->userdata('username');

		if($qtybes == 0){
			echo "";
		}else{
			$data = array(
				
				'id_barang'		=> $idbarang,
				'stok'			=> $stok,
				'qtyb'			=> $qtybes,
				'satuan_besar'	=> $satuanbes,
				'harga_beli'	=> $modalterakhir,
				'modal'			=> str_replace(",", "", $modal),
				'modal_t'		=> str_replace(",", "", $modalt),
				'pricelist'		=> str_replace(",", "", $pl),
				'tk'			=> str_replace(",", "", $hajul),
				'tb'			=> str_replace(",", "", $walkk),
				'sls'			=> str_replace(",", "", $tkw),
				'agn'			=> str_replace(",", "", $tbn),
				'prt'			=> str_replace(",", "", $slss),
				'ppn'			=> $ppn,
				'disc'			=> $disc,
				'disc1'			=> $disc1,
				'disc2'			=> $disc2,
				'jam'			=> $jam,
				'kurs_tukar'	=> $kurs,
				'modal_terakhir'=> $hargabeli,
				'simbol'		=> $simbol,
				'user'			=> $this->session->userdata('username'),



			);
			$query = $this->db->query("SELECT * FROM tb_detail_b_barangpo WHERE user='$user' AND id_barang='$idbarang'");
			$result = $query->result_array();
			$count = count($result);
			
			if (empty($count)) {
				
				$this->db->insert('tb_detail_b_barangpo',$data);

			}elseif ($count == 1) {

				$this->db->where('id_barang', $idbarang) AND $this->db->where('user', $user);
				$this->db->update('tb_detail_b_barangpo',$data);

			}
		}
	}
	function input_barang_retur(){
		$noretur			= $this->input->post('noretur');
		$nobel				= $this->input->post('nobel');
		$idbarang 			= $this->input->post('idbarang');
		$stok 				= $this->input->post('stok');
		$qtybes				= $this->input->post('qtybes');
		$satuanbes 			= $this->input->post('satuanbes');
		$modal	 		    = $this->input->post('modal');
		$modalt	 		    = $this->input->post('modalt');
		$hargabeli 		    = $this->input->post('hargabeli');
		$ppn 		        = $this->input->post('ppn');
		$disc 		        = $this->input->post('disc');
		$disc1		        = $this->input->post('disc1');
		$disc2		        = $this->input->post('disc2');
		$kurs		        = $this->input->post('kurs');
		$simbol		        = $this->input->post('simbol');
		$jam		        = date('H:i:s');
		$user		 	    = $this->session->userdata('username');

		$barang = $this->db->get_where('tb_detail_pembelianpo',array('id_barang'=>$idbarang,'no_beli'=>$nobel))->row_array();
		$stk = $barang['qtyb'];

		if($qtybes > $stk){
			echo "GAGAL";
		}elseif($qtybes == 0){
			echo "GAGAL";
		}else{
			$data = array(


				'no_retur'		=> $noretur,
				'no_beli'		=> $nobel,
				'id_barang'		=> $idbarang,
				'stok'			=> $stok,
				'qtyb'			=> $qtybes,
				'satuan_besar'	=> $satuanbes,
				'harga_beli'	=> str_replace(",", "", $hargabeli),
				'modal'			=> str_replace(",", "", $modal),
				'modal_t'		=> str_replace(",", "", $modalt),
				'ppn'			=> $ppn,
				'disc'			=> $disc,
				'disc1'			=> $disc1,
				'disc2'			=> $disc2,
				'jam'			=> $jam,
				'kurs_tukar'	=> $kurs,
				'simbol'		=> $simbol,
				'user'			=> $this->session->userdata('username'),



			);
			$qr = $this->db->query("SELECT * FROM tb_retur_po_tmp WHERE user='$user'");
			$rs = $qr->result_array();
			$ct = count($rs);
			if ($ct > 24) {
				echo '<script type=text/javascript> alert("You Have Successfully updated this Record!");</script>';
			}else{
				$query = $this->db->query("SELECT * FROM tb_retur_po_tmp WHERE user='$user' AND id_barang='$idbarang'");
				$result = $query->result_array();
				$count = count($result);

				if (empty($count)) {

					$this->db->insert('tb_retur_po_tmp',$data);

				}elseif ($count == 1) {

					$this->db->where('id_barang', $data['id_barang']) AND $this->db->where('user', $data['user']);
					$this->db->update('tb_retur_po_tmp',$data);

				}
			}
		}
	}
	function input_barang_edit(){
		$nobel				= $this->input->post('nobel');
		$idbarang 			= $this->input->post('idbarang');
		$stok 				= $this->input->post('stok');
		$qtybes				= $this->input->post('qtybes');
		$satuanbes 			= $this->input->post('satuanbes');
		$modal	 		    = $this->input->post('modal');
		$modalt	 		    = $this->input->post('modalt');
		$hargabeli 		    = $this->input->post('hargabeli');
		$ppn 		        = $this->input->post('ppn');
		$disc 		        = $this->input->post('disc');
		$disc1		        = $this->input->post('disc1');
		$disc2		        = $this->input->post('disc2');
		$jam		        = date('H:i:s');
		$pl		        	= $this->input->post('pl');
		$hajul		        = $this->input->post('hajul');
		$walkk		        = $this->input->post('walkk');
		$tkw		        = $this->input->post('tkw');
		$tbn		        = $this->input->post('tbn');
		$slss		        = $this->input->post('slss');
		$modal_terakhir		= $this->input->post('modal_terakhir');
		$user		 	    = $this->session->userdata('username');
			$data = array(


				'no_beli'		=> $nobel,
				'id_barang'		=> $idbarang,
				'harga_beli'	=> str_replace(",", "", $hargabeli),
				'modal'			=> str_replace(".", "", $modal),
				'modal_t'		=> str_replace(".", "", $modal),
				'pricelist'		=> str_replace(",", "", $pl),
				'tk'			=> str_replace(",", "", $hajul),
				'tb'			=> str_replace(",", "", $walkk),
				'sls'			=> str_replace(",", "", $tkw),
				'agn'			=> str_replace(",", "", $tbn),
				'prt'			=> str_replace(",", "", $slss),
				'modal_terakhir'=> str_replace(",", "", $modal_terakhir),
				'jam'			=> $jam,
				'user'			=> $this->session->userdata('username'),


			);
					$this->db->where('id_barang', $data['id_barang']) AND $this->db->where('no_beli', $data['no_beli']);
					$this->db->update('tb_barang_editpo',$data);
			}
	function input_detail_retur(){
		$idspl 			= $this->input->post('idspl');
		$idbrg 			= $this->input->post('idbrg');
		$qty			= $this->input->post('qty');
		$satuan 		= $this->input->post('satuan');
		$hargajual 		= $this->input->post('hargajual');
		$ppnan 			= $this->input->post('ppnan');
		$diskon1 		= $this->input->post('diskon1');
		$diskon2 		= $this->input->post('diskon2');
		$diskon3 		= $this->input->post('diskon3');
		$jam1 			= date('H:i:s');
		$user 			= $this->session->userdata('username');

		$data = array(


			'id_supplier'	=> $idspl,
			'id_barang'		=> $idbrg,
			'qtyb'			=> $qty,
			'satuan_besar'	=> $satuan,
			'harga_beli'	=> str_replace(".", "", $hargajual),
			'ppn'			=> $ppnan,
			'disc'			=> $diskon1,
			'disc1'			=> $diskon2,
			'disc2'			=> $diskon3,
			'jam'			=> $jam1,
			'user'			=> $this->session->userdata('username')



		);
		$q = $this->db->query("SELECT * FROM tb_detail_b_barang WHERE user = '$user'");
		$r = $q->result_array();
		$c = count($r);

		$qry = $this->db->query("SELECT * FROM tb_retur_tmpb WHERE user = '$user'");
		$rst = $qry->result_array();
		$cnt = count($rst);

		$brg = $this->db->query("SELECT * FROM tb_detail_pembelian WHERE id_barang = '$idbrg' AND id_supplier = '$idspl'");
		$br = $brg->result_array();
		$b = count($br);

		if (empty($c)) {
			echo "";
		}elseif (empty($b)) {
			echo "";
		}elseif($c + $cnt > 24){
			echo '<script type=text/javascript> alert("You Have Successfully updated this Record!");</script>';
		}else{
			$query = $this->db->query("SELECT * FROM tb_retur_tmpb WHERE id_barang = '$idbrg' AND user = '$user'");
			$result = $query->result_array();
			$count = count($result);

			if (empty($count)) {
				
				$this->db->insert('tb_retur_tmpb',$data);
				
			}
			elseif ($count == 1) {

				$this->db->where('id_barang', $data['id_barang']) AND $this->db->where('user', $data['user']);
				$this->db->update('tb_retur_tmpb',$data);

			}
		}
	}
	function input_detail(){
		$noju				= $this->input->post('noju');
		$idbarang 			= $this->input->post('idbarang');
		$satuanbesar		= $this->input->post('satuanbesar');
		$jmlkrm 			= $this->input->post('jmlkrm');
		$user		 	    = $this->session->userdata('username');


		$barang = $this->db->get_where('surat_jalan',array('id_barang'=>$idbarang,'no_jl'=>$noju))->row_array();
		$stok = $barang['sisa_kirim'];
		if($jmlkrm > $stok){
			$this->load->library('session');
			$this->session->set_flashdata('error',"<script> alert('Oops.. Jangan Nakal Yah..')</script>");
		}elseif($jmlkrm == 0){
			$this->load->library('session');
			$this->session->set_flashdata('error',"<script> alert('Oops.. Jangan Nakal Yah..')</script>");
		}else{
			$data = array(

				'no_jl'			=> $noju,
				'id_barang'		=> $idbarang,
				'satuan_besar'	=> $satuanbesar,
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
	function input_po(){
		$a = $this->Model_pembelian->getNomorterakhir5()->row_array();
                            //Mengambil Tahun di Sistem
		$tahun    = date('y');
		$id       = ('PO');
		$id1       = ('-');
		$c = array('','I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII');
		$bln		= $c[date('n')];
		$format   = $tahun.$id.$id1.$bln;
		$data['autonumber'] 	= buatkode($a['no_po'],$format,4);
		$no_po 		  = $data['autonumber'];
		$edit_urut 	  = $this->input->post('edit_urut');
		$no_jual 	  = $this->input->post('no_jual');
		$no_reff  	  = $this->input->post('no_reff');
		$id_supplier  = $this->input->post('id_supplier');
		$id_pelanggan = $this->input->post('id_pelanggan');
		$tgl_po 	  = $this->input->post('tgl_po');
		$ket_alamat   = $this->input->post('ket_alamat');
		$ket	      = $this->input->post('keterangan');
		$user	      = $this->session->userdata('username');

		$query = $this->db->query("SELECT * FROM tb_tmp_po WHERE user='$user'");
		$result = $query->result_array();
		$count = count($result);
		if (empty($count)) {	
			$this->session->set_flashdata("message","<script> alert('Oops.. Barang PO Belum Di Isi')</script>");
			redirect('Pembelian/input_po');
		}else{
			$data = array(
				'no_po' 		=> $no_po,
				'no_jual' 		=> $no_jual,
				'edit_urut' 	=> $edit_urut,
				'no_reff' 		=> $no_reff,
				'id_supplier' 	=> $id_supplier,
				'id_pelanggan' 	=> $id_pelanggan,
				'tgl' 			=> $tgl_po,
				'alamat' 		=> $ket_alamat,
				'keterangan'	=> $ket,
				'user'			=> $this->session->userdata('username'),

			);
			$insert_po = $this->db->insert('tb_po',$data);
		}
		$user = $this->session->userdata('username');
		$data_detail = $this->db->from('tb_tmp_po')->like('user',$user)->get();   
		foreach ($data_detail->result() as $d){
			$data_tmp = array(

				'no_po'   		=> $no_po,
				'id_barang'   	=> $d->id_barang,
				'harga_jual'   	=> $d->harga_jual,
				'qty'   		=> $d->qty,
				'stok'   		=> $d->qty,
				'satuan'   		=> $d->satuan,
				'kode_mu'   	=> $d->kode_mu,
				'kurs_tukar'   	=> $d->kurs_tukar,
				'id_supplier' 	=> $id_supplier,
			);
			$this->db->insert('tb_detail_po',$data_tmp);
			$this->db->query("UPDATE tb_barang SET stok = stok + '$d->qty',po = po + '$d->qty',modal_t = '$d->kurs_tukar' WHERE id_barang = '$d->id_barang'");
			$this->db->query("UPDATE tb_po SET stok = stok + '$d->qty' WHERE no_po = '$no_po'");
		}
		$query = "delete from tb_tmp_po where user='$d->user'";
		$this->db->query($query);
		redirect('Pembelian/input_po');
	}
	function input_po_cetak(){
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

		$data['autonumber1'] 	= buatkode($b['no_jual'],$format1,4);
		$data['autonumber'] 	= buatkode($a['no_po'],$format,4);
		$no_po 		  = $data['autonumber'];
		$no_jual 	  = $data['autonumber1'];
		$no_reff  	  = $this->input->post('no_reff');
		$id_supplier  = $this->input->post('id_supplier');
		$id_pelanggan = $this->input->post('id_pelanggan');
		$tgl_po 	  = $this->input->post('tgl_po');
		$ket_alamat   = $this->input->post('ket_alamat');
		$ket	      = $this->input->post('keterangan');
		$cetak	      = $this->input->post('cetak');
		$user	      = $this->session->userdata('username');

		$query = $this->db->query("SELECT * FROM tb_tmp_po WHERE user='$user'");
		$result = $query->result_array();
		$count = count($result);
		if (empty($count)) {	
			$this->session->set_flashdata("message","<script> alert('Oops.. Barang PO Belum Di Isi')</script>");
			redirect('Pembelian/input_po');
		}else{
			$data = array(
				'no_po' 		=> $no_po,
				'no_jual' 		=> $no_jual,
				'no_reff' 		=> $no_reff,
				'id_supplier' 	=> $id_supplier,
				'id_pelanggan' 	=> $id_pelanggan,
				'tgl' 			=> $tgl_po,
				'alamat' 		=> $ket_alamat,
				'keterangan'	=> $ket,
				'cetak'			=> $cetak,
				'user'			=> $this->session->userdata('username'),

			);
			$insert_po = $this->db->insert('tb_po',$data);
		}
		$user = $this->session->userdata('username');
		$data_detail = $this->db->from('tb_tmp_po')->like('user',$user)->get();   
		foreach ($data_detail->result() as $d){
			$data_tmp = array(

				'no_po'   		=> $no_po,
				'id_barang'   	=> $d->id_barang,
				'qty'   		=> $d->qty,
				'stok'   		=> $d->qty,
				'satuan'   		=> $d->satuan,
				'id_supplier' 	=> $id_supplier,
			);
			$this->db->insert('tb_detail_po',$data_tmp);
			$this->db->query("UPDATE tb_barang SET stok = stok + '$d->qty' WHERE id_barang = '$d->id_barang'");
		}
		$query = "delete from tb_tmp_po where user='$d->user'";
		$this->db->query($query);
		redirect('Pembelian/cetak_po/'.$no_po);
	}
	function looping_edit($id){
		$query = "SELECT * FROM tb_pembelianpo WHERE tb_pembelianpo.no_beli = '$id'";
		return $this->db->query($query);
	}
	function view_edit($id){
		$query = "SELECT * FROM edit_po WHERE no_po = '$id'";
		return $this->db->query($query);
	}
	
	function insert_pembelian(){
		$a = $this->Model_purchase->getNomorterakhir()->row_array();
                            //Mengambil Tahun di Sistem
		$tahun    = date('y');
		$id       = ('PO');
		$id1       = ('-');
		$c = array('','I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII');
		$bln		= $c[date('n')];
		$format   = $tahun.$id.$id1.$bln;
		$data['autonumber'] = buatkode($a['no_beli'],$format,4);
		$no_beli		 = $data['autonumber'];
		$no_invoice		 = $this->input->post('no_invoice');
		$no_reff		 = $this->input->post('no_reff');
		$tgl_invoice	 = $this->input->post('tgl_invoice');
		$tgl			 = $this->input->post('tgl');
		$jam	 		 = date('H:i:s');
		$id_supplier	 = $this->input->post('id_supplier');
		$keterangan		 = $this->input->post('keterangan');
		$ket_alamat		 = $this->input->post('ket_alamat');
		$total		 	 = $this->input->post('total');
		$totalan		 = $this->input->post('grand_total');
		$user		 	 = $this->input->post('user');
		$sisa		 	 = $this->input->post('sisa');
		$acc			 = $this->input->post('acc');
		$edit			 = $this->input->post('edit');
		$kode_mu		 = $this->input->post('kode_mu');
		$kurs			 = $this->input->post('kurs_tukar');
		$simbol			 = $this->input->post('simbol');
		$data = array(

			'no_beli'			=> $no_beli,
			'no_invoice'		=> $no_invoice,
			'no_reff'			=> $no_reff,
			'tgl_invoice'		=> $tgl_invoice,
			'date_invoice'		=> $tgl,
			'id_supplier'		=> $id_supplier,
			'keterangan'		=> $keterangan,
			'total'				=> str_replace(",", "", $total),
			'user'				=> $this->session->userdata('username'),
			'sisa'				=> str_replace(",", "", $sisa),
			'edit'				=> $edit,
			'kode_mu'			=> $kode_mu,
			'kurs_tukar'		=> $kurs,


		);
		$insert_penjualan = $this->db->insert('tb_pembelianpo',$data);
		$this->db->query("UPDATE tb_supplier SET no_reff_po = no_reff_po + 1 WHERE id_supplier = '$id_supplier'");
		$transaksi = array(

			'no_transaksi'			=> $no_beli,
			'no_raff'				=> $no_reff,
			'tgl'					=> $tgl_invoice,
			'date_invoice'			=> $tgl,
			'jam'					=> $jam,
			'id_supplier'			=> $id_supplier,
			'total_dolar'			=> $kurs,
			'kode_mu'				=> $kode_mu,
			'total'					=> str_replace(",", "", $totalan),
			'grand_total'			=> str_replace(",", "", $total),


		);
		$transaksi_dayb = $this->db->insert('transaksi_dayb1',$transaksi);
		$user = $this->session->userdata('username');
		$data = $this->db->from('tb_detail_b_barangpo')->like('user',$user)->get();   
		foreach ($data->result() as $d){
			
			$data_tmp = array(

				'no_beli'   	=> $no_beli,
				'no_invoice'   	=> $no_invoice,
				'no_reff'		=> $no_reff,
				'id_supplier'	=> $id_supplier,
				'id_barang'		=> $d->id_barang,
				'qtyb'			=> $d->qtyb,
				'satuan_besar'	=> $d->satuan_besar,
				'harga_beli'	=> $d->modal_terakhir,
				'disc'			=> $d->disc,
				'disc1'			=> $d->disc1,
				'disc2'			=> $d->disc2,
				'kurs_tukar'	=> $d->kurs_tukar,
				'kode_mu'		=> $kode_mu,
				'simbol'		=> $simbol,
				
				
				

			);
			$data_tmp1 = array(
				
				'no_beli'   	=> $no_beli,
				'id_barang'		=> $d->id_barang,
				'qtyb'			=> $d->qtyb,
				'satuan_besar'	=> $d->satuan_besar,
				'modal'			=> $d->modal,
				'modal_t'		=> $d->modal_t,
				'harga_beli'	=> $d->harga_beli,
				'pricelist'		=> $d->pricelist,
				'tk'			=> $d->tk,
				'tb'			=> $d->tb,
				'sls'			=> $d->sls,
				'agn'			=> $d->agn,
				'prt'			=> $d->prt,
				'disc'			=> $d->disc,
				'disc1'			=> $d->disc1,
				'disc2'			=> $d->disc2,
				'ppn'			=> $d->ppn,
				'stok'			=> $d->stok,
				'modal'			=> $d->modal,
				'jam'			=> $d->jam,
				'kurs_tukar'	=> $d->kurs_tukar,
				'kode_mu'		=> $simbol,
				'modal_terakhir'=> $d->modal_terakhir,
				'handling'		=> $d->handling,
				'user'			=> $d->user,
				
				
				

			);
			$data_tmp2 = array(
				
				'no_beli'   	=> $no_beli,
				'id_barang'		=> $d->id_barang,
				'qtyb'			=> $d->qtyb,
				'satuan_besar'	=> $d->satuan_besar,
				'modal'			=> $d->modal,
				'modal_t'		=> $d->modal_t,
				'harga_beli'	=> $d->harga_beli,
				'pricelist'		=> $d->pricelist,
				'tk'			=> $d->tk,
				'tb'			=> $d->tb,
				'sls'			=> $d->sls,
				'agn'			=> $d->agn,
				'prt'			=> $d->prt,
				'disc'			=> $d->disc,
				'disc1'			=> $d->disc1,
				'disc2'			=> $d->disc2,
				'ppn'			=> $d->ppn,
				'stok'			=> $d->stok,
				'modal'			=> $d->modal,
				'jam'			=> $d->jam,
				'user'			=> $d->user,
				'kurs_tukar'	=> $d->kurs_tukar,
				'kode_mu'		=> $simbol,
				'modal_terakhir'=> $d->modal_terakhir,

			);
			$this->db->insert('tb_detail_pembelianpo',$data_tmp);
			$this->db->insert('tb_detail_b_barang',$data_tmp1);
			$this->db->insert('tb_barang_editpo',$data_tmp2);
			$this->db->query("UPDATE tb_barang SET po = po + '$d->qtyb' WHERE id_barang = '$d->id_barang'");
		}
		$query = "delete from tb_detail_b_barangpo where user='$d->user'";
		$this->db->query($query);
		redirect('Purchase_order/view_purchase');
		
	}
	function insert_retur(){
		$a = $this->Model_purchase->getRetur()->row_array();
                            //Mengambil Tahun di Sistem
		$tahun    = date('y');
		$id       = ('RPO');
		$id1       = ('-');
		$c = array('','I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII');
		$bln		= $c[date('n')];
		$format   = $tahun.$id.$id1.$bln;			
		$data['autonumber'] 	= buatkode($a['no_retur'],$format,4);
		$no_retur		 = $data['autonumber'];
		$no_beli		 = $this->input->post('nobel');
		$no_reff		 = $this->input->post('no_reff');
		$no_raff		 = $this->input->post('no_raff');
		$tanggal		 = $this->input->post('tanggal');
		$tgl			 = $this->input->post('tgl');
		$id_supplier	 = $this->input->post('id_supplier');
		$keterangan		 = $this->input->post('keterangan');
		$total		 	 = $this->input->post('total');
		$potongan	 	 = $this->input->post('potongan');
		$ppn		 	 = $this->input->post('ppn');
		$dpp		 	 = $this->input->post('dpp');
		$totalan		 = $this->input->post('grand_total');
		$user		 	 = $this->input->post('user');
		$bank2		     = $this->input->post('bank');
		$transfer		 = $this->input->post('transfer');
		$cash			 = $this->input->post('cash');
		$kurs_tukar		 = $this->input->post('kurs_tukar');
		$simbol		 	 = $this->input->post('simbol');
		$kode_mu	 	 = $this->input->post('kode_mu');
		$jam			 = date('H:i:s');
		if($total==0){
			$this->session->set_flashdata("message","<script> alert('Oops.. Total Masih Kosong')</script>");
			redirect('Purchase_order/input_retur/'.$no_beli);
		}
		$data = array(

			'no_retur'			=> $no_retur,
			'no_beli'			=> $no_beli,
			'no_reff'			=> $no_reff,
			'tanggal'			=> $tanggal,
			'id_supplier'		=> $id_supplier,
			'keterangan'		=> $keterangan,
			'total'				=> str_replace(",", "", $total),
			'potongan'			=> str_replace(",", "", $potongan),
			'grand_total'		=> str_replace(",", "", $totalan),
			'user'				=> $this->session->userdata('username'),
			'kurs'				=> $kurs_tukar,
			'kode_mu'			=> $simbol,
			'transfer'			=> str_replace(",", "", $transfer),
			'cash'				=> str_replace(",", "", $cash),


		);
		$insert_penjualan = $this->db->insert('tb_retur_po',$data);
		$this->db->query("UPDATE tb_pembelianpo SET total = total - '$total',kurs_tukar = kurs_tukar - '$kurs_tukar',retur = 1  WHERE no_beli ='$no_beli'");
		$transaksi = array(

			'no_transaksi'			=> $no_retur,
			'tgl'					=> $tanggal,
			'date_invoice'			=> $tgl,
			'jam'					=> $jam,
			'id_supplier'			=> $id_supplier,
			'total_dolar'			=> $kurs_tukar - $kurs_tukar * 2,
			'kode_mu'				=> $kode_mu,
			'total'					=> str_replace(",", "", $total)- str_replace(",", "", $total) * 2,
			'grand_total'			=> str_replace(",", "", $total)- str_replace(",", "", $total) * 2,
		);
		$insert_penjualan = $this->db->insert('transaksi_dayb1',$transaksi);
		$user = $this->session->userdata('username');
		$data = $this->db->from('tb_retur_po_tmp')->like('user',$user)->get();   
		foreach ($data->result() as $d){
			
			$data_tmp = array(

				'no_retur'   	=> $no_retur,
				'no_beli'   	=> $no_beli,
				'no_reff'		=> $no_reff,
				'id_supplier'	=> $id_supplier,
				'id_barang'		=> $d->id_barang,
				'qtyb'			=> $d->qtyb,
				'satuan_besar'	=> $d->satuan_besar,
				'harga_beli'	=> $d->harga_beli,
				'kurs_tukar'	=> $d->kurs_tukar,
				'disc'			=> $d->disc,
				'disc1'			=> $d->disc1,
				'disc2'			=> $d->disc2,
				'simbol'		=> $simbol,
				
			);
			
			$this->db->query("UPDATE tb_detail_pembelianpo SET qtyb = qtyb - '$d->qtyb' WHERE id_barang = '$d->id_barang' AND no_beli ='$no_beli'");
			$this->db->query("UPDATE tb_detail_b_barang SET qtyb = qtyb - '$d->qtyb' WHERE id_barang = '$d->id_barang' AND no_beli ='$no_beli'");
			$this->db->query("UPDATE tb_barang_editpo SET qtyb = qtyb - '$d->qtyb' WHERE id_barang = '$d->id_barang' AND no_beli ='$no_beli'");
			$this->db->query("UPDATE tb_barang SET po = po - '$d->qtyb' WHERE id_barang = '$d->id_barang'");
			$this->db->insert('tb_barang_returpo',$data_tmp);

		}
		$query = "delete from tb_retur_po_tmp where user='$d->user'";
		$this->db->query($query);
		redirect('Purchase_order/view_retur');
		
	}

	function update_pembelian(){
		$nobel		 = $this->input->post('nobel');
		$edit		 = $this->input->post('edit');
		$total		 = $this->input->post('total');
		$grand_total = $this->input->post('grand_total');
		$nom		 = $this->input->post('nominal1');
		$ongkir1	 = $this->input->post('ongkir1');
		$tips		 = $this->input->post('tips');
		$nominal	 = $this->input->post('nominal');
		$dpp		 = $this->input->post('dpp');
		$ppn		 = $this->input->post('ppn');
		$kurs_tukar	 = $this->input->post('kurs_tukar');
		
		if($total == 0){
			$this->session->set_flashdata("message","<script> alert('Oops.. Total Masih Kosong')</script>");
			redirect('Purchase_order/edit_pembelian/'.$nobel);
		}
		$data = array(

			'ongkir1'			=> $ongkir1,
			'tips'				=> $tips,
			'no_invoice'		=> $nobel,
			'nominal1'			=> str_replace(",", "", $nom),
			'nominal'			=> str_replace(",", "", $nominal),
			'total'				=> str_replace(",", "", $total),
			'kurs_tukar'		=> str_replace(",", "", $kurs_tukar),


		);
		$this->db->where('no_beli', $nobel);
		$this->db->update('tb_pembelianpo',$data);
		$this->db->query("UPDATE tb_pembelianpo SET edit = edit + '$edit' WHERE no_beli = '$nobel' ");
		$user = $this->session->userdata('username');
		$dat = $this->db->from('tb_barang_editpo')->like('user',$user)->get();   
		foreach ($dat->result() as $d){
			
			$update_detail = array(

				'no_beli'   	=> $nobel,
				'id_barang'		=> $d->id_barang,
				'qtyb'			=> $d->qtyb,
				'harga_beli'	=> str_replace(",", "", $d->modal_terakhir),
				'disc'			=> $d->disc,
				'disc1'			=> $d->disc1,
				'disc2'			=> $d->disc2,
				'ppn'			=> $d->ppn
				
				
				

			);
			$update_detail1 = array(

				'no_beli'   	=> $nobel,
				'id_barang'		=> $d->id_barang,
				'qtyb'			=> $d->qtyb,
				'harga_beli'	=> str_replace(",", "", $d->harga_beli),
				'modal_terakhir'=> str_replace(",", "", $d->modal_terakhir),
				'disc'			=> $d->disc,
				'disc1'			=> $d->disc1,
				'disc2'			=> $d->disc2,
				'ppn'			=> $d->ppn
				
				
				

			);
			$this->db->where('no_beli', $nobel) AND $this->db->where('id_barang', $d->id_barang);
			$this->db->update('tb_detail_b_barang',$update_detail1);
			
			$this->db->where('no_beli', $nobel) AND $this->db->where('id_barang', $d->id_barang);
			$this->db->update('tb_detail_pembelianpo',$update_detail);
		}
		$transaksi = array(

			'no_transaksi'		=> $nobel,
			'total_dolar'		=> $kurs_tukar,
			'total'				=> str_replace(",", "", $grand_total),
			'grand_total'		=> str_replace(",", "", $total),
			'sisa_tagihan'		=> str_replace(",", "", $total),
			'beban'				=> str_replace(",", "", $nom),
			'tips'				=> str_replace(",", "", $nominal),


		);
		$this->db->where('no_transaksi', $nobel);
		$this->db->update('transaksi_dayb1',$transaksi);

		$user = $this->session->userdata('username');
		$data_tmp = $this->db->from('t_editpo')->like('user',$user)->get();  
		foreach ($data_tmp->result() as $b){
			$data_tmp_edit = array(
				'no_po' 	  =>$nobel,
				'alasan_edit' =>$b->alasan_edit,
				'user'		  =>$this->session->userdata('username'),
			);
		}
		$this->db->insert('edit_po',$data_tmp_edit);
		
		$query = "delete from t_editpo where user='$d->user'";
		$this->db->query($query);
		redirect('Purchase_order/view_purchase');
	}
	function edit(){
		$no_po	 	 = $this->input->post('no_po');
		$no_jual	 = $this->input->post('no_jual');
		$user 		 = $this->session->userdata('username');
		$data = array(

			'no_po'			=> $no_po,
			'no_jual'		=> $no_jual,
			'user'			=> $user,


		);
		$this->db->where('no_po', $no_po);
		$this->db->update('tb_po',$data);
		redirect('Pembelian/cetak_po/'.$no_po);
	}
	function view_detail_barang(){
		$user = $this->session->userdata('username');
		$query = "SELECT * FROM tb_detail_b_barangpo INNER JOIN tb_barang ON tb_detail_b_barangpo.id_barang = tb_barang.id_barang where tb_detail_b_barangpo.user='$user' ORDER BY tb_detail_b_barangpo.jam desc"; //dihapus disc2,
		$query1= $this->db->query($query);
		return $query1->result_array();
		
	}
	function view_detail_barang_retur(){
		$user = $this->session->userdata('username');
		$query = "SELECT tb_retur_po_tmp.id_barang,qtyb,tb_retur_po_tmp.ppn,tb_barang.satuan_besar,harga_beli,disc,disc1,disc2,user,simbol,kurs_tukar, tb_barang.nama_barang FROM tb_retur_po_tmp INNER JOIN tb_barang ON tb_retur_po_tmp.id_barang = tb_barang.id_barang where tb_retur_po_tmp.user='$user' ORDER BY tb_retur_po_tmp.jam desc"; //dihapus disc2,
		$query1= $this->db->query($query);
		return $query1->result_array();
		
	}
	function view_barang_edit(){
		$user 		= $this->session->userdata('username');
		$no_beli 	= $this->uri->segment(3);
		$query 		= "SELECT *,tb_barang_editpo.id_barang,qtyb,kode_mu,kurs_tukar,tb_barang_editpo.ppn,tb_barang.satuan_besar,harga_beli,disc,disc1,disc2,user, tb_barang.nama_barang FROM tb_barang_editpo INNER JOIN tb_barang ON tb_barang_editpo.id_barang = tb_barang.id_barang where tb_barang_editpo.user='$user' AND tb_barang_editpo.no_beli = '$no_beli' ORDER BY tb_barang_editpo.jam desc"; 
		$query1= $this->db->query($query);
		return $query1->result_array();
		
	}
	function view_detail_retur(){
		$user = $this->session->userdata('username');
		$query = "SELECT tb_retur_tmpb.id_barang,qtyb,tb_retur_tmpb.satuan_besar,tb_retur_tmpb.ppn,harga_beli,disc,disc1,disc2,simbol,user,tb_barang.nama_barang FROM tb_retur_tmpb 
		INNER JOIN tb_barang ON tb_retur_tmpb.id_barang = tb_barang.id_barang WHERE tb_retur_tmpb.user = '$user' ORDER BY tb_retur_tmpb.jam desc"; //dihapus disc2,
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
		$this->db->update("tb_detail_b_barangP",array($qtyb=>$qty));
	}

	function read(){
		$this->db->order_by("id_barang","asc");
		$query=$this->db->get("tb_detail_b_barangP");
		return $query->result_array();
	}



	function getNomorterakhir(){
		$query = "SELECT * FROM tb_pembelianpo where MID(tgl_invoice,4,2)=MONTH(now()) ORDER BY no_beli DESC LIMIT 1";
		return $this->db->query($query);
	}
	function getNomorterakhir7(){
		$query = "SELECT no_edit FROM edit_po ORDER BY no_po DESC LIMIT 1";
		return $this->db->query($query);
	}
	function getNomorterakhir5(){
		$query = "SELECT no_po FROM tb_po ORDER BY no_po DESC LIMIT 1";
		return $this->db->query($query);
	}

	function get_barang($kobar){
		$hsl=$this->db->query("SELECT * FROM tb_barang where id_barang='$kobar'");
		return $hsl;
	}
	function getNomorterakhirpj(){
		$query = "SELECT no_jual FROM tb_penjualan ORDER BY no_jual DESC LIMIT 1";
		return $this->db->query($query);
	}
	function getRetur(){
		$query = "SELECT * FROM tb_retur_po where MID(tanggal,4,2)=MONTH(now()) ORDER BY no_retur DESC LIMIT 1";
		return $this->db->query($query);
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
		$barang = $this->db->get_where('tb_detail_b_barangpo',array('id_barang'=>$id_barang))->row_array();
		$id_barang = $barang['id_barang'];
		$user = $this->session->userdata('username');
		$sql  = "DELETE FROM tb_detail_b_barangpo WHERE user='$user' AND id_barang = '$id_barang'";
		return $this->db->query($sql,array($user,$id_barang));
	}
	function delete_edit($user,$id_barang)
	{ 
		$barang = $this->db->get_where('tb_barang_editpo',array('id_barang'=>$id_barang))->row_array();
		$id_barang = $barang['id_barang'];
		$user = $this->session->userdata('username');
		$sql  = "DELETE FROM tb_barang_editpo WHERE user='$user' AND id_barang = '$id_barang'";
		return $this->db->query($sql,array($user,$id_barang));
	}
	function delete_barang_retur($user,$id_barang)
	{ 
		$barang = $this->db->get_where('tb_retur_po_tmp',array('id_barang'=>$id_barang))->row_array();
		$id_barang = $barang['id_barang'];
		$user = $this->session->userdata('username');
		$sql  = "DELETE FROM tb_retur_po_tmp WHERE user='$user' AND id_barang = '$id_barang'";
		return $this->db->query($sql,array($user,$id_barang));
	}
	function delete_retur($user,$id_brg)
	{ 
		$barang = $this->db->get_where('tb_retur_tmpb',array('id_barang'=>$id_brg))->row_array();
		$id_brg = $barang['id_barang'];
		$user = $this->session->userdata('username');
		$sql  = "DELETE FROM tb_retur_tmpb WHERE user='$user' AND id_barang = '$id_brg'";
		return $this->db->query($sql,array($user,$id_brg));
	}
	function delete_kirim($user,$idbarang)
	{ 
		$barang = $this->db->get_where('tb_detail_tmpb',array('id_barang'=>$idbarang))->row_array();
		$idbarang = $barang['id_barang'];
		$user = $this->session->userdata('username');
		$sql  = "DELETE FROM tb_detail_tmp WHERE user='$user'";
		return $this->db->query($sql,array($user,$idbarang));
	}
	function delete_po($user,$idbarang)
	{ 
		$barang = $this->db->get_where('tb_tmp_po',array('id_barang'=>$idbarang))->row_array();
		$idbarang = $barang['id_barang'];
		$user = $this->session->userdata('username');
		$sql  = "DELETE FROM tb_tmp_po WHERE user='$user' AND id_barang = '$idbarang'";
		return $this->db->query($sql,array($user,$idbarang));
	}



}

?>