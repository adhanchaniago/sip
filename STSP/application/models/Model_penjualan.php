<?php

class Model_penjualan extends CI_Model{
	
	function barang_list(){
		$hasil=$this->db->query("SELECT * FROM tb_detail_b_barangp");
		return $hasil->result();
	}
	function hapus_barang($id_barang){
		$hasil=$this->db->query("DELETE FROM tb_detail_b_barangp WHERE id_barang='$id_barang'");
		return $hasil;
		
	}
	public function getAllPenjualan($offset, $limit){
		$query = $this->db->query("SELECT tb_penjualan.no_jual,tb_penjualan.no_reff,tb_penjualan.sisa2,tb_penjualan.ket_pel,tb_penjualan.no_sjln,tb_penjualan.keterangan,tb_penjualan.total,tb_penjualan.total_belanja,tb_penjualan.total_retur,user,potongan,nominal1,nominal2,sisa,cetak,acc,status_kirim,status_terkirim,
			tb_pelanggan.id_pelanggan,nama_pelanggan,tb_penjualan.tgl_invoice,tb_penjualan.tempo,no_sj,tb_penjualan.jatuh_tempo
			FROM tb_penjualan INNER JOIN tb_pelanggan ON tb_penjualan.id_pelanggan = tb_pelanggan.id_pelanggan ORDER BY tb_penjualan.no_jual DESC LIMIT $offset, $limit");
		return $query;
	}
	public function getAllPenjualan_count(){
		$query = $this->db->query("SELECT * FROM tb_penjualan");
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
		$this->datatables->select('tb_penjualan.no_jual,tb_penjualan.no_reff,tb_penjualan.tgl_invoice,tb_penjualan.id_pelanggan,tb_pelanggan.nama_pelanggan,tb_penjualan.total,tb_penjualan.sisa,tb_penjualan.jatuh_tempo,tb_penjualan.cetak,tb_penjualan.status_kirim,tb_penjualan.acc,tb_penjualan.no_sj,tb_penjualan.keterangan,tb_penjualan.user,tb_penjualan.tempo');
		$this->datatables->from('tb_penjualan');
		$this->datatables->join('tb_pelanggan', 'tb_penjualan.id_pelanggan = tb_pelanggan.id_pelanggan','left');
		$this->datatables->add_column('view', '<a href="Penjualan/input_retur_noju/$1" class="btn btn-xs btn-primary"><i class = "fa fa-mail-forward"></i></a>', 'no_jual');
		return $this->datatables->generate();
	}
	function view_cash(){
		$query = "SELECT tb_penjualan.no_jual,tb_penjualan.no_reff,tb_penjualan.ket_pel,tb_penjualan.no_sjln,tb_penjualan.keterangan,tb_penjualan.total,tb_penjualan.total_belanja,tb_penjualan.total_retur,user,potongan,nominal1,nominal2,sisa,cetak,acc,status_kirim,
		tb_pelanggan.id_pelanggan,nama_pelanggan,tb_penjualan.tgl_invoice,tb_penjualan.tempo,no_sj,tb_penjualan.jatuh_tempo
		FROM tb_penjualan INNER JOIN tb_pelanggan ON tb_penjualan.id_pelanggan = tb_pelanggan.id_pelanggan
		where tb_penjualan.id_pelanggan = 'Cash3' AND tb_pelanggan.id_pelanggan='Cash2' AND tb_pelanggan.id_pelanggan='Cash1' ORDER BY tb_penjualan.no_jual desc";
		return $this->db->query($query);
		
	}
	function get(){
		$no_jual = $this->uri->segment(3);
		$query2 = "SELECT tb_penjualan.no_jual,tb_penjualan.cetak,tb_penjualan.dp,ket_alamat,ket_retur,tb_penjualan.keterangan,tb_penjualan.total,tb_penjualan.user,tb_penjualan.jatuh_tempo,tb_penjualan.potongan,tb_penjualan.ongkir1,tb_penjualan.nominal1,tb_penjualan.ongkir2,tb_penjualan.nominal2,tb_penjualan.debet,tb_penjualan.bank1,tb_penjualan.transfer,tb_penjualan.bank2,tb_penjualan.cash,tb_penjualan.giro,tb_penjualan.ket_giro,tb_penjualan.sisa2,tb_penjualan.kembali,tb_penjualan.no_reff, tb_penjualan.id_pelanggan,nama_pelanggan,tb_penjualan.deposit,tb_detail_penjualan.id_barang,nama_barang,qtyb,tb_detail_penjualan.harga_beli,tb_detail_penjualan.disc,tb_detail_penjualan.disc1,tb_detail_penjualan.satuan_besar FROM tb_penjualan INNER JOIN tb_pelanggan ON tb_penjualan.id_pelanggan=tb_pelanggan.id_pelanggan INNER JOIN tb_detail_penjualan ON tb_penjualan.no_jual=tb_detail_penjualan.no_jual INNER JOIN tb_barang ON tb_detail_penjualan.id_barang=tb_barang.id_barang WHERE tb_penjualan.no_jual = '$no_jual'";
		return $this->db->query($query2);
		return $this->db->get_where('tb_detail_penjualan',array('no_jual'=>$no_jual));
	}
	function get3(){
		$no_jual = $this->uri->segment(3);
		$query2 = "SELECT tb_penjualan.no_jual,ket_alamat,ket_retur,tb_penjualan.keterangan,tb_penjualan.total,tb_penjualan.user,tb_penjualan.jatuh_tempo,tb_penjualan.potongan,tb_penjualan.ongkir1,tb_penjualan.nominal1,tb_penjualan.ongkir2,tb_penjualan.nominal2,tb_penjualan.debet,tb_penjualan.bank1,tb_penjualan.transfer,tb_penjualan.bank2,tb_penjualan.cash,tb_penjualan.giro,tb_penjualan.ket_giro,tb_penjualan.sisa2,tb_penjualan.kembali,tb_penjualan.no_reff, tb_penjualan.id_pelanggan,nama_pelanggan,tb_detail_penjualan.id_barang,nama_barang,qtyb,tb_detail_penjualan.harga_beli,tb_detail_penjualan.disc,tb_detail_penjualan.disc1,tb_detail_penjualan.satuan_besar FROM tb_penjualan INNER JOIN tb_pelanggan ON tb_penjualan.id_pelanggan=tb_pelanggan.id_pelanggan INNER JOIN tb_detail_penjualan ON tb_penjualan.no_jual=tb_detail_penjualan.no_jual INNER JOIN tb_barang ON tb_detail_penjualan.id_barang=tb_barang.id_barang WHERE tb_penjualan.no_jual = '$no_jual'";
		return $this->db->query($query2);
		return $this->db->get_where('tb_detail_penjualan',array('no_jual'=>$no_jual));
	}
	function get1(){
		$no_jual = $this->uri->segment(3);
		$query2 = "SELECT tb_penjualan.no_jual,ket_alamat,tb_penjualan.cetak,tb_penjualan.tgl_invoice,ket_retur,tb_penjualan.keterangan,tb_penjualan.total,tb_penjualan.user,tb_penjualan.jatuh_tempo,tb_penjualan.potongan,tb_penjualan.dpp,tb_penjualan.ppn,tb_penjualan.ongkir1,tb_penjualan.nominal1,tb_penjualan.ongkir2,tb_penjualan.nominal2,tb_penjualan.debet,tb_penjualan.bank1,tb_penjualan.transfer,tb_penjualan.bank2,tb_penjualan.cash,tb_penjualan.giro,tb_penjualan.dp,tb_penjualan.deposit,tb_penjualan.ket_giro,tb_penjualan.sisa2,tb_penjualan.kembali,tb_penjualan.no_reff, tb_penjualan.id_pelanggan,nama_pelanggan,tb_detail_penjualan.id_barang,nama_barang,qtyb,tb_detail_penjualan.harga_beli,tb_detail_penjualan.disc,tb_detail_penjualan.disc1,tb_detail_penjualan.satuan_besar FROM tb_penjualan INNER JOIN tb_pelanggan ON tb_penjualan.id_pelanggan=tb_pelanggan.id_pelanggan INNER JOIN tb_detail_penjualan ON tb_penjualan.no_jual=tb_detail_penjualan.no_jual INNER JOIN tb_barang ON tb_detail_penjualan.id_barang=tb_barang.id_barang WHERE tb_penjualan.no_jual = '$no_jual'";
		return $this->db->query($query2);
		return $this->db->get_where('tb_detail_penjualan',array('no_jual'=>$no_jual));
	}
	function get2(){
		$no_retur = $this->uri->segment(3);
		$query2 = "SELECT tb_retur_so.no_retur,tb_retur_so.no_jual,tb_retur_so.no_reff,tb_retur_so.no_reff_inv,tb_retur_so.tanggal,tb_retur_so.keterangan,tb_retur_so.total,tb_retur_so.potongan,tb_retur_so.ongkir1,tb_retur_so.nominal1,tb_retur_so.cash,tb_retur_so.debet,tb_retur_so.bank1,tb_retur_so.transfer,tb_retur_so.bank2,tb_retur_so.giro,tb_retur_so.ket_giro,tb_retur_so.user,tb_pelanggan.id_pelanggan,nama_pelanggan FROM tb_retur_so INNER JOIN tb_pelanggan ON tb_retur_so.id_pelanggan = tb_pelanggan.id_pelanggan WHERE tb_retur_so.no_retur = '$no_retur'";
		return $this->db->query($query2);
		return $this->db->get_where('tb_detail_penjualan',array('no_jual'=>$no_jual));
	}
	function get_retur(){
		$no_jual = $this->uri->segment(3);
		$query3 = "SELECT tb_penjualan.no_jual,tb_penjualan.no_reff,tb_penjualan.id_pelanggan,tb_pelanggan.nama_pelanggan,tb_pelanggan.no_reff_retur,tb_pelanggan.id_k_pelanggan from tb_penjualan 
		INNER JOIN tb_pelanggan ON tb_penjualan.id_pelanggan=tb_pelanggan.id_pelanggan  WHERE tb_penjualan.no_jual='$no_jual'";
		return $this->db->query($query3);
	}
	function get_re(){
		$id_pelanggan = $this->uri->segment(3);
		$query3 = "SELECT tb_penjualan.no_jual,tb_penjualan.no_reff,tb_penjualan.id_pelanggan,tb_pelanggan.nama_pelanggan,tb_pelanggan.no_reff_retur,tb_pelanggan.id_k_pelanggan from tb_penjualan 
		INNER JOIN tb_pelanggan ON tb_penjualan.id_pelanggan=tb_pelanggan.id_pelanggan  WHERE tb_penjualan.id_pelanggan='$id_pelanggan' ";
		return $this->db->query($query3);
	}

	function get_edit_penjualan(){
		$no_jual = $this->uri->segment(3);
		$query3 = "SELECT tb_penjualan.no_jual,tb_penjualan.no_reff,tb_penjualan.id_k_pelanggan,tb_penjualan.ket_alamat,tb_penjualan.no_urut,tb_penjualan.ket_pel,tb_penjualan.jatuh_tempo,tb_penjualan.no_sjln,tb_penjualan.keterangan,tb_penjualan.total,tb_penjualan.total_belanja,tb_penjualan.total_retur,user,potongan,nominal1,nominal2,sisa,cetak,acc,status_kirim,
		tb_pelanggan.id_pelanggan,nama_pelanggan,tb_penjualan.tgl_invoice,tb_penjualan.tempo,no_sj,tb_penjualan.jatuh_tempo
		FROM tb_penjualan INNER JOIN tb_pelanggan ON tb_penjualan.id_pelanggan = tb_pelanggan.id_pelanggan WHERE tb_penjualan.no_jual = '$no_jual'";
		return $this->db->query($query3);
		return $this->db->get_where('tb_detail_penjualan',array('no_jual'=>$no_jual));
	}
	function view_penjualan(){
		$query = "SELECT tb_penjualan.no_jual,tb_penjualan.batal,tb_penjualan.stok,tb_penjualan.no_reff,tb_penjualan.sisa2,tb_penjualan.ket_pel,tb_penjualan.no_sjln,tb_penjualan.keterangan,tb_penjualan.total,tb_penjualan.total_belanja,tb_penjualan.total_retur,user,potongan,nominal1,nominal2,sisa,cetak,acc,status_kirim,status_terkirim,
		tb_pelanggan.id_pelanggan,nama_pelanggan,tb_penjualan.tgl_invoice,tb_penjualan.tempo,no_sj,tb_penjualan.jatuh_tempo
		FROM tb_penjualan INNER JOIN tb_pelanggan ON tb_penjualan.id_pelanggan = tb_pelanggan.id_pelanggan  WHERE tb_penjualan.acc = 0 ORDER BY tb_penjualan.no_jual desc";
		return $this->db->query($query);		
	}
	function penjualan_data($id){
		$query = "SELECT * from tb_penjualan where tb_penjualan.no_jual = '$id'";
		return $this->db->query($query);
	}
	function detail_penjualan($id){
		$query = "SELECT tb_penjualan.no_jual,tb_penjualan.ket_alamat,tb_penjualan.ket_retur,tb_penjualan.total,tb_penjualan.dp,tb_penjualan.deposit,tb_penjualan.potongan,tb_penjualan.dpp,tb_penjualan.ppn,tb_penjualan.ongkir1,tb_penjualan.ongkir2,tb_penjualan.nominal1,
		tb_penjualan.nominal2,tb_penjualan.cash,tb_penjualan.debet,tb_penjualan.bank1,tb_penjualan.transfer,tb_penjualan.bank2,acc,
		tb_penjualan.giro,tb_penjualan.kembali,tb_penjualan.sisa,tb_penjualan.sisa2,tb_penjualan.ket_giro,tb_detail_penjualan.id_barang,nama_barang,qtyb,tb_barang.satuan_besar,harga_beli,disc,disc1 FROM tb_penjualan INNER JOIN tb_detail_penjualan 
		ON tb_penjualan.no_jual = tb_detail_penjualan.no_jual INNER JOIN tb_barang ON tb_detail_penjualan.id_barang = tb_barang.id_barang  WHERE tb_penjualan.no_jual = '$id'"; //dhapus ,disc2
		return $this->db->query($query);
	}
	function detail_retur($id){
		
		$query = "SELECT tb_penjualan.no_jual,tb_penjualan.ket_retur,tb_detail_retur.id_barang,nama_barang,qtyb,tb_barang.satuan_besar,harga_beli,disc,disc1 FROM tb_penjualan INNER JOIN tb_detail_retur 
		ON tb_penjualan.no_jual = tb_detail_retur.no_jual INNER JOIN tb_barang ON tb_detail_retur.id_barang = tb_barang.id_barang  WHERE tb_penjualan.no_jual = '$id'"; //dhapus ,disc2
		return $this->db->query($query);
	}

	function view_retur(){
		$no_retur = "19RO";
		$query = "SELECT tb_retur_so.no_retur,tb_retur_so.cetak,tb_retur_so.no_jual,tb_retur_so.no_reff_inv,tb_retur_so.tanggal,tb_retur_so.id_pelanggan,tb_retur_so.no_reff,tb_retur_so.keterangan,tb_retur_so.total,tb_retur_so.potongan,tb_retur_so.ongkir1,tb_retur_so.nominal1,tb_retur_so.cash,tb_retur_so.debet,tb_retur_so.bank1,tb_retur_so.transfer,tb_retur_so.bank2,tb_retur_so.giro,tb_retur_so.ket_giro,tb_retur_so.user,tb_pelanggan.id_pelanggan,nama_pelanggan FROM tb_retur_so INNER JOIN tb_pelanggan ON tb_retur_so.id_pelanggan = tb_pelanggan.id_pelanggan WHERE tb_retur_so.no_retur LIKE '%$no_retur%' ORDER BY tb_retur_so.no_retur desc";
		return $this->db->query($query);
	}

	function view_detail_retur1($id){
		$query = "SELECT tb_retur_so.no_retur,tb_retur_so.tanggal,tb_retur_so.keterangan,tb_retur_so.total,tb_retur_so.dpp,tb_retur_so.ppn,tb_retur_so.potongan,tb_retur_so.ongkir1,tb_retur_so.nominal1,tb_retur_so.cash,tb_retur_so.debet,tb_retur_so.bank1,tb_retur_so.transfer,tb_retur_so.bank2,tb_retur_so.giro,tb_retur_so.ket_giro,tb_retur_so.user,retur_detail_so.id_barang,retur_detail_so.qtyb,retur_detail_so.satuan_besar,retur_detail_so.harga_beli,retur_detail_so.disc,retur_detail_so.disc1,tb_barang.nama_barang FROM tb_retur_so INNER JOIN retur_detail_so ON tb_retur_so.no_retur = retur_detail_so.no_retur
		INNER JOIN tb_barang ON retur_detail_so.id_barang = tb_barang.id_barang WHERE tb_retur_so.no_retur = '$id'";
		return $this->db->query($query);
	}

	function view_detail(){
		$user = $this->session->userdata('username');	
		$query = "SELECT tb_detail_tmp.id_barang,jml_krm,tb_detail_tmp.harga_satuan,user,tb_barang.satuan_besar,tb_barang.nama_barang FROM tb_detail_tmp INNER JOIN tb_barang ON tb_detail_tmp.id_barang = tb_barang.id_barang WHERE tb_detail_tmp.user='$user'"; //dihapus disc2,
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
		$query = "SELECT * from tb_penjualan where tb_penjualan.no_jual = '$id'";
		return $this->db->query($query);
	}


		//cetak Retur//;

	function looping_cetak_retur($id){
		$query = "SELECT * FROM tb_retur_so WHERE no_retur = '$id'";
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
		$query = "SELECT * from tb_penjualan where tb_penjualan.no_jual = '$id'";
		return $this->db->query($query);
	}
	function input_detail_barang(){
		$idbarang 			= $this->input->post('idbarang');
		$qtybes				= $this->input->post('qtybes');
		$stok				= $this->input->post('stok');
		$satuanbes 			= $this->input->post('satuanbes');
		$modal 		   		= $this->input->post('modal');
		$hargabeli 		    = $this->input->post('hargabeli');
		$disc 		        = $this->input->post('disc');
		$disc1		        = $this->input->post('disc1');
		$komisi		        = $this->input->post('komisi');
		$jam		        = date('H:i:s');
		$user		 	    = $this->session->userdata('username');

		$barang = $this->db->get_where('tb_barang',array('id_barang'=>$idbarang))->row_array();
		$stok = $barang['stok'];
		if($qtybes == 0){
			echo "";
		}elseif($qtybes > $stok){
			echo "";
		}elseif($hargabeli < $modal ){
			echo "";
		}else{
			$data = array(


				'id_barang'		=> $idbarang,
				'qtyb'			=> $qtybes,
				'satuan_besar'	=> $satuanbes,
				'modal'			=> $modal,
				'harga_beli'	=> $hargabeli,
				'disc'			=> $disc,
				'disc1'			=> $disc1,
				'jam'			=> $jam,
				'komisi'		=> $komisi,
				'user'			=> $this->session->userdata('username'),



			);
			$tmp = $this->db->get_where('tb_detail_b_barangp',array('id_barang'=>$idbarang,'user'=>$user))->row_array();
			$stok = $tmp['qtyb'];
			$barang = $this->db->get_where('tb_barang',array('id_barang'=>$idbarang))->row_array();
			$brg = $barang['stok'];
			
			$qryi = $this->db->query("SELECT * FROM tb_retur_tmp WHERE user = '$user'");
			$rstl = $qryi->result_array();
			$cnta = count($rstl);
			
			$qr = $this->db->query("SELECT * FROM tb_detail_b_barangp WHERE user='$user'");
			$rs = $qr->result_array();
			$ct = count($rs);
			if ($ct > 24) {
				echo '<script type=text/javascript> windows.alert("You Have Successfully updated this Record!");</script>';
			}elseif($ct + $cnta > 24){
				echo '<script type=text/javascript> windows.alert("You Have Successfully updated this Record!");</script>';
			}else{
				$query = $this->db->query("SELECT * FROM tb_detail_b_barangp WHERE user='$user' AND id_barang='$idbarang'");
				$result = $query->result_array();
				$count = count($result);

				if (empty($count)) {

					$this->db->insert('tb_detail_b_barangp',$data);
				//$this->db->query("UPDATE tb_barang SET stok = stok - '$qtybes' WHERE id_barang = '$idbarang'");

				}elseif ($count == 1) {

					$this->db->where('id_barang', $data['id_barang']) AND $this->db->where('user', $data['user']);
					$this->db->update('tb_detail_b_barangp',$data);
			  // $this->db->query("UPDATE tb_barang SET stok = stok + $stok - '$qtybes' WHERE id_barang = '$idbarang'");

				}
			}
		}
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
		$q = $this->db->query("SELECT * FROM tb_detail_b_barangp WHERE user = '$user'");
		$r = $q->result_array();
		$c = count($r);

		$qry = $this->db->query("SELECT * FROM tb_retur_tmp WHERE user = '$user'");
		$rst = $qry->result_array();
		$cnt = count($rst);

		$brg = $this->db->query("SELECT * FROM tb_detail_penjualan WHERE id_barang = '$idbrg' AND id_pelanggan = '$idplg'");
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

		$brg = $this->db->get_where('tb_detail_penjualan',array('id_barang'=>$idbarang,'no_jual'=>$noju))->row_array();
		$hrg = $brg['harga_beli'];
		$dis1 = $brg['disc'];
		$dis2 = $brg['disc1'];

		//$barang = $this->db->get_where('surat_jalan',array('id_barang'=>$idbarang,'no_jl'=>$noju))->row_array();
		//$stok = $barang['sisa_kirim'];
		//if($qtybes > $stok){
			//echo "GAGAL";
		//}else
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
				'modal'			=> str_replace(",", "", $modal),
				'harga_beli'	=> str_replace(",", "", $hargabeli),
				'disc'			=> $disc,
				'disc1'			=> $disc1,
				'user'			=> $this->session->userdata('username')
			);
			$qry = $this->db->query("SELECT * FROM retur_tmp_so WHERE user = '$user'");
			$rst = $qry->result_array();
			$cnt = count($rst);
			
			if($cnt > 24){
				echo '<script type=text/javascript> alert("You Have Successfully updated this Record!");</script>';
			}else{
				$query = $this->db->query("SELECT * FROM retur_tmp_so WHERE id_barang = '$idbarang' AND user = '$user'");
				$result = $query->result_array();
				$count = count($result);

				if (empty($count)) {

					$this->db->insert('retur_tmp_so',$data);

				}
				elseif ($count == 1) {

					$this->db->where('id_barang', $data['id_barang']) AND $this->db->where('user', $data['user']);
					$this->db->update('retur_tmp_so',$data);
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

		$barang = $this->db->get_where('tb_detail_penjualan',array('id_barang'=>$idbarang,'id_pelanggan'=>$idpelanggan))->row_array();
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
		$query = "SELECT retur_tmp_so.id_barang,retur_tmp_so.qtyb,retur_tmp_so.satuan_besar,retur_tmp_so.harga_beli,retur_tmp_so.disc,retur_tmp_so.disc1,retur_tmp_so.user,tb_barang.nama_barang FROM retur_tmp_so INNER JOIN tb_barang ON retur_tmp_so.id_barang = tb_barang.id_barang WHERE retur_tmp_so.user = '$user'";
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
		$a = $this->Model_penjualan->getNomorterakhir2()->row_array();
                            //Mengambil Tahun di Sistem
		$tahun    = date('y');
		$id       = ('RO');
		$id1       = ('-');
		$c = array('','I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII');
		$bln		= $c[date('n')];
		$format   = $tahun.$id.$id1.$bln;
		$data['autonumber'] = buatkode($a['no_retur'],$format,4);
		$no_retur		 = $data['autonumber'];
		$no_jual	     = $this->input->post('no_jual');
		$tanggal	     = $this->input->post('tanggal');
		$no_reff	     = $this->input->post('no_reff');
		$no_min	     	 = $this->input->post('no_min');
		$no_reff_inv	 = $this->input->post('no_reff_inv');
		$id_pelanggan	 = $this->input->post('id_pelanggan');
		$keterangan		 = $this->input->post('keterangan');
		$total		 	 = $this->input->post('total');
		$user		 	 = $this->input->post('user');
		$jam1			 = date('H:i:s');
		$tgl_invoice	 = $this->input->post('tgl_invoice');
		if($total==0){
			$this->session->set_flashdata("message","<script> alert('Oops.. Total Masih Kosong')</script>");
			redirect('Penjualan/input_retur_noju/'.$no_jual);
		}
		$data = array(

			'no_retur'			=> $no_retur,
			'no_jual'			=> $no_jual,
			'no_reff'			=> $no_reff,
			'no_reff_inv'		=> $no_reff_inv,
			'tanggal'			=> $tanggal,
			'id_pelanggan'		=> $id_pelanggan,
			'keterangan'		=> $keterangan,
			'cetak'				=> 1,
			'total'				=> str_replace(",", "", $total),
			'user'				=> $this->session->userdata('username'),

		);
		$insert_retur = $this->db->insert('tb_retur_so',$data);
		$tr = array(

			'no_transaksi'			=> $no_retur,
			'tgl'					=> $tgl_invoice,
			'date_invoice'			=> $tanggal,
			'jam'					=> $jam1,
			'id_pelanggan'			=> $id_pelanggan,
			'total'					=> str_replace(",", "", $total) ,
			'grand_total'			=> str_replace(",", "", $total) ,


		);
		$insert_penjualan = $this->db->insert('transaksi_day1',$tr);
		$user = $this->session->userdata('username');
		$data = $this->db->from('retur_tmp_so')->like('user',$user)->get();   
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
			$this->db->insert('retur_detail_so',$data_tmp);
			$this->db->query("UPDATE tb_barang SET so = so - '$d->qtyb' WHERE id_barang = '$d->id_barang'");
			$this->db->query("UPDATE tb_penjualan SET stok = stok - '$d->qtyb',total = total - '$total' WHERE no_jual = '$no_jual'");
			$this->db->query("UPDATE tb_detail_penjualan SET qtyb = qtyb - '$d->qtyb',sisa_kirim = sisa_kirim - '$d->qtyb' WHERE id_barang = '$d->id_barang' AND no_jual ='$d->no_jual'");
		}
		$data = $this->db->where('user',$d->user);
		$query = "delete from retur_tmp_so where user='$d->user'";
		$this->db->query($query);
		redirect('Penjualan/view_retur');
		
	}
	function insert_retur_noju_cetak(){
		$a = $this->Model_penjualan->getNomorterakhir2()->row_array();
                            //Mengambil Tahun di Sistem
		$tahun    = date('y');
		$id       = ('RO');
		$id1       = ('-');
		$c = array('','I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII');
		$bln		= $c[date('n')];
		$format   = $tahun.$id.$id1.$bln;
		$data['autonumber'] = buatkode($a['no_retur'],$format,4);
		$no_retur		 = $data['autonumber'];
		$no_jual	     = $this->input->post('no_jual');
		$tanggal	     = $this->input->post('tanggal');
		$no_reff	     = $this->input->post('no_reff');
		$no_min	     	 = $this->input->post('no_min');
		$no_reff_inv	 = $this->input->post('no_reff_inv');
		$id_pelanggan	 = $this->input->post('id_pelanggan');
		$keterangan		 = $this->input->post('keterangan');
		$total		 	 = $this->input->post('total');
		$user		 	 = $this->input->post('user');
		$jam1			 = date('H:i:s');
		$tgl_invoice	 = $this->input->post('tgl_invoice');
		if($total==0){
			$this->session->set_flashdata("message","<script> alert('Oops.. Total Masih Kosong')</script>");
			redirect('Penjualan/input_retur_noju/'.$no_jual);
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

		);
		$insert_retur = $this->db->insert('tb_retur_so',$data);
		$tr = array(

			'no_transaksi'			=> $no_retur,
			'tgl'					=> $tgl_invoice,
			'date_invoice'			=> $tanggal,
			'jam'					=> $jam1,
			'id_pelanggan'			=> $id_pelanggan,
			'total'					=> str_replace(",", "", $total) ,
			'grand_total'			=> str_replace(",", "", $total) ,


		);
		$insert_penjualan = $this->db->insert('transaksi_day1',$tr);
		$user = $this->session->userdata('username');
		$data = $this->db->from('retur_tmp_so')->like('user',$user)->get();   
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
			$this->db->insert('retur_detail_so',$data_tmp);
			$this->db->query("UPDATE tb_barang SET so = so - '$d->qtyb' WHERE id_barang = '$d->id_barang'");
			$this->db->query("UPDATE tb_penjualan SET stok = stok - '$d->qtyb',total = total - '$total' WHERE no_jual = '$no_jual'");
			$this->db->query("UPDATE tb_detail_penjualan SET qtyb = qtyb - '$d->qtyb',sisa_kirim = sisa_kirim - '$d->qtyb' WHERE id_barang = '$d->id_barang' AND no_jual ='$d->no_jual'");
		}
		$data = $this->db->where('user',$d->user);
		$query = "delete from retur_tmp_so where user='$d->user'";
		$this->db->query($query);
		redirect('Penjualan/cetak_retur/'.$no_retur);
		
	}
	function insert_retur_noju_cetak_a4(){
		$a = $this->Model_penjualan->getNomorterakhir2()->row_array();
                            //Mengambil Tahun di Sistem
		$tahun    = date('y');
		$id       = ('RO');
		$id1       = ('-');
		$c = array('','I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII');
		$bln		= $c[date('n')];
		$format   = $tahun.$id.$id1.$bln;
		$data['autonumber'] = buatkode($a['no_retur'],$format,4);
		$no_retur		 = $data['autonumber'];
		$no_jual	     = $this->input->post('no_jual');
		$tanggal	     = $this->input->post('tanggal');
		$no_reff	     = $this->input->post('no_reff');
		$no_min	     	 = $this->input->post('no_min');
		$no_reff_inv	 = $this->input->post('no_reff_inv');
		$id_pelanggan	 = $this->input->post('id_pelanggan');
		$keterangan		 = $this->input->post('keterangan');
		$total		 	 = $this->input->post('total');
		$user		 	 = $this->input->post('user');
		$jam1			 = date('H:i:s');
		$tgl_invoice	 = $this->input->post('tgl_invoice');
		if($total==0){
			$this->session->set_flashdata("message","<script> alert('Oops.. Total Masih Kosong')</script>");
			redirect('Penjualan/input_retur_noju/'.$no_jual);
		}
		$data = array(

			'no_retur'			=> $no_retur,
			'no_jual'			=> $no_jual,
			'no_reff'			=> $no_reff,
			'no_reff_inv'		=> $no_reff_inv,
			'tanggal'			=> $tanggal,
			'id_pelanggan'		=> $id_pelanggan,
			'keterangan'		=> $keterangan,
			'cetak'				=> 1,
			'total'				=> str_replace(",", "", $total),
			'user'				=> $this->session->userdata('username'),

		);
		$insert_retur = $this->db->insert('tb_retur_so',$data);
		$tr = array(

			'no_transaksi'			=> $no_retur,
			'tgl'					=> $tgl_invoice,
			'date_invoice'			=> $tanggal,
			'jam'					=> $jam1,
			'id_pelanggan'			=> $id_pelanggan,
			'total'					=> str_replace(",", "", $total) ,
			'grand_total'			=> str_replace(",", "", $total) ,


		);
		$insert_penjualan = $this->db->insert('transaksi_day1',$tr);
		$user = $this->session->userdata('username');
		$data = $this->db->from('retur_tmp_so')->like('user',$user)->get();   
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
			$this->db->insert('retur_detail_so',$data_tmp);
			$this->db->query("UPDATE tb_barang SET so = so - '$d->qtyb' WHERE id_barang = '$d->id_barang'");
			$this->db->query("UPDATE tb_penjualan SET stok = stok - '$d->qtyb',total = total - '$total' WHERE no_jual = '$no_jual'");
			$this->db->query("UPDATE tb_detail_penjualan SET qtyb = qtyb - '$d->qtyb',sisa_kirim = sisa_kirim - '$d->qtyb' WHERE id_barang = '$d->id_barang' AND no_jual ='$d->no_jual'");
		}
		$data = $this->db->where('user',$d->user);
		$query = "delete from retur_tmp_so where user='$d->user'";
		$this->db->query($query);
		redirect('Penjualan/cetak_a4_retur/'.$no_retur);
		
	}
	function insert_retur(){
		$a = $this->Model_penjualan->getNomorterakhir2()->row_array();
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
		$a = $this->Model_penjualan->getNomorterakhir2()->row_array();
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
		$a = $this->Model_penjualan->getNomorterakhir()->row_array();
                            //Mengambil Tahun di Sistem
		$tahun    = date('y');
		$id       = ('SO');
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
		$jatuh_tempo	 = $this->input->post('jatuh_tempo');
		$jatuh_tempoan	 = $this->input->post('jatuh_tempoan');
		$id_k_pelanggan	 = $this->input->post('id_k_pelanggan');
		$keterangan		 = $this->input->post('keterangan');
		$ket_alamat		 = $this->input->post('ket_alamat');
		$total		 	 = $this->input->post('total');
		$user		 	 = $this->input->post('user');
		if($total==0){
			$this->session->set_flashdata("message","<script> alert('Oops.. Total Masih Kosong')</script>");
			redirect('Penjualan/input_penjualan');
		}else{
			$data = array(

				'no_jual'			=> $no_jual,
				'no_reff'			=> $no_reff,
				'tgl_invoice'		=> $tgl_invoice,
				'date_invoice'		=> $tgl,
				'id_pelanggan'		=> $id_pelanggan,
				'id_sales'			=> $id_karyawan,
				'jatuh_tempo'		=> $jatuh_tempo,
				'jatuh_tempoan'		=> $jatuh_tempoan,
				'id_k_pelanggan'	=> $id_k_pelanggan,
				'keterangan'		=> $keterangan,
				'ket_alamat'		=> $ket_alamat,
				'total'				=> str_replace(",", "", $total),
				'user'				=> $this->session->userdata('username'),


			);
			$insert_penjualan = $this->db->insert('tb_penjualan',$data);
		}
		$transaksi = array(

			'no_transaksi'			=> $no_jual,
			'no_raff'				=> $no_reff,
			'tgl'					=> $tgl_invoice,
			'date_invoice'			=> $tgl,
			'jam'					=> $jam,
			'id_pelanggan'			=> $id_pelanggan,
			'no_npwp'				=> $no_npwp,
			'total'					=> str_replace(",", "", $total),
			'grand_total'			=> str_replace(",", "", $total),


		);
		$insert_penjualan = $this->db->insert('transaksi_day1',$transaksi);
		$this->db->query(" UPDATE tb_pelanggan set no_reff_so =  no_reff_so + 1 where id_pelanggan='$id_pelanggan'");
		$user = $this->session->userdata('username');
		$data = $this->db->from('tb_detail_b_barangp')->like('user',$user)->get();   
		$stk = 0;
		foreach ($data->result() as $d){
			$stk = $stk + $d->qtyb;
			$data_tmp = array(

				'no_jual'   	=> $no_jual,
				'no_reff'		=> $no_reff,
				'id_pelanggan'	=> $id_pelanggan,
				'id_barang'		=> $d->id_barang,
				'qtyb'			=> $d->qtyb,
				'sisa_kirim'	=> $d->qtyb,
				'satuan_besar'	=> $d->satuan_besar,
				'harga_beli'	=> str_replace(".", "", $d->harga_beli),
				'disc'			=> $d->disc,
				'disc1'			=> $d->disc1,
				'tgl'			=> $tgl
				
				
				

			);
			$this->db->insert('tb_detail_penjualan',$data_tmp);
			$this->db->query("UPDATE tb_barang SET so = so + '$d->qtyb' WHERE id_barang = '$d->id_barang'");
			$this->db->query("UPDATE tb_penjualan SET stok = stok + '$d->qtyb' WHERE no_jual = '$no_jual'");
		}
		//$data = $this->db->where('user',$d->user);
		$query = "delete from tb_detail_b_barangp where user='$d->user'";
		$this->db->query($query);
		$query = "delete from tb_retur_tmp where user='$r->user'";
		$this->db->query($query);
		redirect('Penjualan/input_penjualan');
		
	}
	function insert_penjualan_cetak(){
		$a = $this->Model_penjualan->getNomorterakhir()->row_array();
                            //Mengambil Tahun di Sistem
		$tahun    = date('y');
		$id       = ('SO');
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
		$id_karyawan	   	 = $this->input->post('id_karyawan');
		$jatuh_tempo	 = $this->input->post('jatuh_tempo');
		$jatuh_tempoan	 = $this->input->post('jatuh_tempoan');
		$id_k_pelanggan	 = $this->input->post('id_k_pelanggan');
		$keterangan		 = $this->input->post('keterangan');
		$ket_alamat		 = $this->input->post('ket_alamat');
		$total		 	 = $this->input->post('total');
		$user		 	 = $this->input->post('user');
		if($total==0){
			$this->session->set_flashdata("message","<script> alert('Oops.. Total Masih Kosong')</script>");
			redirect('Penjualan/input_penjualan');
		}else{
			$data = array(

				'no_jual'			=> $no_jual,
				'no_reff'			=> $no_reff,
				'tgl_invoice'		=> $tgl_invoice,
				'date_invoice'		=> $tgl,
				'id_pelanggan'		=> $id_pelanggan,
				'id_sales'			=> $id_karyawan,
				'jatuh_tempo'		=> $jatuh_tempo,
				'jatuh_tempoan'		=> $jatuh_tempoan,
				'id_k_pelanggan'	=> $id_k_pelanggan,
				'keterangan'		=> $keterangan,
				'ket_alamat'		=> $ket_alamat,
				'cetak'				=> 1,
				'total'				=> str_replace(",", "", $total),
				'user'				=> $this->session->userdata('username'),


			);
			$insert_penjualan = $this->db->insert('tb_penjualan',$data);
		}
		$transaksi = array(

			'no_transaksi'			=> $no_jual,
			'no_raff'				=> $no_reff,
			'tgl'					=> $tgl_invoice,
			'date_invoice'			=> $tgl,
			'jam'					=> $jam,
			'id_pelanggan'			=> $id_pelanggan,
			'no_npwp'				=> $no_npwp,
			'total'					=> str_replace(",", "", $total),
			'grand_total'			=> str_replace(",", "", $total),


		);
		$insert_penjualan = $this->db->insert('transaksi_day1',$transaksi);
		$this->db->query(" UPDATE tb_pelanggan set no_reff_so =  no_reff_so + 1 where id_pelanggan='$id_pelanggan'");
		$user = $this->session->userdata('username');
		$data = $this->db->from('tb_detail_b_barangp')->like('user',$user)->get();   
		$stk = 0;
		foreach ($data->result() as $d){
			$stk = $stk + $d->qtyb;
			$data_tmp = array(

				'no_jual'   	=> $no_jual,
				'no_reff'		=> $no_reff,
				'id_pelanggan'	=> $id_pelanggan,
				'id_barang'		=> $d->id_barang,
				'qtyb'			=> $d->qtyb,
				'sisa_kirim'	=> $d->qtyb,
				'satuan_besar'	=> $d->satuan_besar,
				'harga_beli'	=> str_replace(".", "", $d->harga_beli),
				'disc'			=> $d->disc,
				'disc1'			=> $d->disc1,
				'tgl'			=> $tgl
				
				
				

			);
			$this->db->insert('tb_detail_penjualan',$data_tmp);
			$this->db->query("UPDATE tb_barang SET so = so + '$d->qtyb' WHERE id_barang = '$d->id_barang'");
			$this->db->query("UPDATE tb_penjualan SET stok = stok + '$d->qtyb' WHERE no_jual = '$no_jual'");
		}
		//$data = $this->db->where('user',$d->user);
		$query = "delete from tb_detail_b_barangp where user='$d->user'";
		$this->db->query($query);
		$query = "delete from tb_retur_tmp where user='$r->user'";
		$this->db->query($query);
		redirect('Penjualan/cetak_struk/'.$no_jual);
		
	}
	function insert_penjualan_cetakk(){
		$a = $this->Model_penjualan->getNomorterakhir()->row_array();
                            //Mengambil Tahun di Sistem
		$tahun    = date('y');
		$id       = ('SO');
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
		$id_karyawan	   	 = $this->input->post('id_karyawan');
		$jatuh_tempo	 = $this->input->post('jatuh_tempo');
		$jatuh_tempoan	 = $this->input->post('jatuh_tempoan');
		$id_k_pelanggan	 = $this->input->post('id_k_pelanggan');
		$keterangan		 = $this->input->post('keterangan');
		$ket_alamat		 = $this->input->post('ket_alamat');
		$total		 	 = $this->input->post('total');
		$user		 	 = $this->input->post('user');
		if($total==0){
			$this->session->set_flashdata("message","<script> alert('Oops.. Total Masih Kosong')</script>");
			redirect('Penjualan/input_penjualan');
		}else{
			$data = array(

				'no_jual'			=> $no_jual,
				'no_reff'			=> $no_reff,
				'tgl_invoice'		=> $tgl_invoice,
				'date_invoice'		=> $tgl,
				'id_pelanggan'		=> $id_pelanggan,
				'id_sales'			=> $id_karyawan,
				'jatuh_tempo'		=> $jatuh_tempo,
				'jatuh_tempoan'		=> $jatuh_tempoan,
				'id_k_pelanggan'	=> $id_k_pelanggan,
				'keterangan'		=> $keterangan,
				'ket_alamat'		=> $ket_alamat,
				'cetak'				=> 1,
				'total'				=> str_replace(",", "", $total),
				'user'				=> $this->session->userdata('username'),


			);
			$insert_penjualan = $this->db->insert('tb_penjualan',$data);
		}
		$transaksi = array(

			'no_transaksi'			=> $no_jual,
			'no_raff'				=> $no_reff,
			'tgl'					=> $tgl_invoice,
			'date_invoice'			=> $tgl,
			'jam'					=> $jam,
			'id_pelanggan'			=> $id_pelanggan,
			'no_npwp'				=> $no_npwp,
			'total'					=> str_replace(",", "", $total),
			'grand_total'			=> str_replace(",", "", $total),


		);
		$insert_penjualan = $this->db->insert('transaksi_day1',$transaksi);
		$this->db->query(" UPDATE tb_pelanggan set no_reff_so =  no_reff_so + 1 where id_pelanggan='$id_pelanggan'");
		$user = $this->session->userdata('username');
		$data = $this->db->from('tb_detail_b_barangp')->like('user',$user)->get();   
		$stk = 0;
		foreach ($data->result() as $d){
			$stk = $stk + $d->qtyb;
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
			$this->db->insert('tb_detail_penjualan',$data_tmp);
			$this->db->query("UPDATE tb_barang SET so = so + '$d->qtyb' WHERE id_barang = '$d->id_barang'");
			$this->db->query("UPDATE tb_penjualan SET stok = stok + '$d->qtyb' WHERE no_jual = '$no_jual'");
		}
		//$data = $this->db->where('user',$d->user);
		$query = "delete from tb_detail_b_barangp where user='$d->user'";
		$this->db->query($query);
		$query = "delete from tb_retur_tmp where user='$r->user'";
		$this->db->query($query);
		redirect('Penjualan/cetak_nota/'.$no_jual);
		
	}
	function view_detail_barang(){
		$user = $this->session->userdata('username');
		$query = "SELECT tb_detail_b_barangp.id_barang, qtyb,tb_barang.satuan_besar,tb_barang.modal,tb_detail_b_barangp.komisi,harga_beli,disc,disc1,user, tb_barang.nama_barang FROM tb_detail_b_barangp INNER JOIN tb_barang ON tb_detail_b_barangp.id_barang = tb_barang.id_barang where tb_detail_b_barangp.user='$user' ORDER BY tb_detail_b_barangp.jam desc"; //dihapus disc2,
		$query1= $this->db->query($query);
		return $query1->result_array();
		
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
		$this->db->update("tb_detail_b_barangp",array($qtyb=>$qty));
	}

	function read(){
		$this->db->order_by("id_barang","asc");
		$query=$this->db->get("tb_detail_b_barangp");
		return $query->result_array();
	}



	function getNomorterakhir(){
		$query = "SELECT * FROM tb_penjualan where MID(tgl_invoice,4,2)=MONTH(now())ORDER BY no_jual DESC LIMIT 1";
		return $this->db->query($query);
	}
	function getNomorterakhir2(){
		$query = "SELECT * FROM tb_retur_so where MID(tanggal,6,2)=MONTH(now()) ORDER BY no_retur DESC LIMIT 1";
		return $this->db->query($query);
	}				
	function getNomorterakhir1(){
		$query = "select * from tb_penjualan where MID(tgl_invoice,4,2)=MONTH(now()) ORDER BY no_sj DESC LIMIT 1 ";
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
		$barang = $this->db->get_where('tb_detail_b_barangp',array('id_barang'=>$id_barang))->row_array();
		$id_barang = $barang['id_barang'];
		$user = $this->session->userdata('username');
		$sql  = "DELETE FROM tb_detail_b_barangp WHERE user='$user' AND id_barang = '$id_barang'";
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
		$barang = $this->db->get_where('retur_tmp_so',array('id_barang'=>$idbarang))->row_array();
		$idbarang = $barang['id_barang'];
		$user = $this->session->userdata('username');
		$sql  = "DELETE FROM retur_tmp_so WHERE user='$user' AND id_barang = '$idbarang'";
		return $this->db->query($sql,array($user,$idbarang));
	}

}

?>