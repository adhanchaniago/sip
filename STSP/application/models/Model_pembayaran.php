<?php

class Model_pembayaran extends CI_Model{

	function getNomorterakhir(){
		$query = "select * from tb_penerimaan where MID(tgl_bayar,4,2)=MONTH(now()) ORDER BY no_bukti DESC LIMIT 1 ";
		return $this->db->query($query);
	}

	function get_pembayaran(){
		$id_supplier = $this->uri->segment(3);
		$query3 = "SELECT tb_pembelian.no_beli,tb_pembelian.id_supplier,tb_supplier.nama_supplier,tb_supplier.no_reff,tb_supplier.no_reff_po,tb_supplier.kode_mu,tb_mata_uang.kurs_tukar from tb_pembelian 
		INNER JOIN tb_supplier ON tb_pembelian.id_supplier=tb_supplier.id_supplier INNER JOIN tb_mata_uang ON tb_supplier.kode_mu = tb_mata_uang.kode_mu WHERE tb_pembelian.id_supplier='$id_supplier' ";
		return $this->db->query($query3);
	}
	function view_penjualan(){
		$query = "SELECT tb_penjualan.no_jual,tb_penjualan.no_reff,tb_penjualan.ket_pel,tb_penjualan.no_sjln,tb_penjualan.keterangan,tb_penjualan.total,tb_penjualan.total_belanja,tb_penjualan.total_retur,user,potongan,nominal1,nominal2,sisa,cetak,acc,status_kirim,
		tb_pelanggan.id_pelanggan,nama_pelanggan,tb_penjualan.tgl_invoice,tb_penjualan.tempo,no_sj,tb_penjualan.jatuh_tempo
		FROM tb_penjualan INNER JOIN tb_pelanggan ON tb_penjualan.id_pelanggan = tb_pelanggan.id_pelanggan  where tb_penjualan.sisa > 0  ORDER BY tb_penjualan.no_jual desc";
		return $this->db->query($query);
		
	}
	function view_pembayaran(){
		$query = "SELECT tb_penerimaan.no_bukti,tb_penerimaan.noreff,potongan,totalan,cash,debet,transfer,bank1,bank2,giro,kembali,kurang_bayar,ket_giro,
		tb_penerimaan.user,tb_penerimaan.keterangan,tb_penerimaan.tgl_bayar,tb_supplier.id_supplier,nama_supplier
		FROM tb_penerimaan INNER JOIN tb_supplier ON tb_penerimaan.id_supplier = tb_supplier.id_supplier ORDER BY tb_penerimaan.no_bukti desc";
		return $this->db->query($query);
		
	}
	function data_pn($id){
		
		$query = "SELECT tb_penerimaan.no_bukti,potongan,totalan,cash,debet,transfer,bank1,bank2,giro,kembali,kurang_bayar,ket_giro,
		tb_detail_penerimaan.no_beli,tb_detail_penerimaan.id_supplier,no_reff,tb_detail_penerimaan.total,sisa_bayar,tb_detail_penerimaan.bayar
		FROM tb_penerimaan INNER JOIN tb_detail_penerimaan ON tb_penerimaan.no_bukti = tb_detail_penerimaan.no_bukti WHERE tb_penerimaan.no_bukti = '$id'"; 
		return $this->db->query($query);
	}
	function view_detail_pembayaran(){
		$user  = $this->session->userdata('username');	
		$query = "SELECT tb_penerimaan_tmp.no_beli,tb_penerimaan_tmp.user,tb_penerimaan_tmp.id_supplier,tb_penerimaan_tmp.no_reff,tb_penerimaan_tmp.total,
		tb_penerimaan_tmp.sisa_bayar,tb_penerimaan_tmp.bayar,tb_supplier.nama_supplier FROM tb_penerimaan_tmp INNER JOIN tb_supplier 
		ON tb_penerimaan_tmp.id_supplier = tb_supplier.id_supplier WHERE tb_penerimaan_tmp.user = '$user'";
		$query1= $this->db->query($query);
		return $query1->result_array();
	}
	function looping_cetak($id){
		$query = "SELECT * from tb_penerimaan where tb_penerimaan.no_bukti = '$id'";
		return $this->db->query($query);
	}
	function view_cetak($id){
		$query = "SELECT * FROM cetak_pembayaran WHERE no_bukti = '$id'";
		return $this->db->query($query);
	}
	function view_supplier(){
		$query = "SELECT * FROM tb_pembelian INNER JOIN tb_supplier ON tb_pembelian.id_supplier=tb_supplier.id_supplier where sisa > 0 group by nama_supplier ";
		return $this->db->query($query);
	}
	function get(){
		$no_bukti = $this->uri->segment(3);
		$query2 = "SELECT tb_penerimaan.no_bukti,tb_penerimaan.tgl_bayar,tb_penerimaan.id_supplier,nama_supplier,
		tb_penerimaan.noreff,tb_penerimaan.potongan,tb_penerimaan.totalan,tb_penerimaan.bayar,tb_penerimaan.sisaan,
		tb_penerimaan.cash,tb_penerimaan.debet,tb_penerimaan.bank1,tb_penerimaan.transfer,tb_penerimaan.bank2,
		tb_penerimaan.giro,tb_penerimaan.ket_giro,tb_penerimaan.kembali,tb_penerimaan.kurang_bayar,tb_penerimaan.keterangan,
		tb_penerimaan.user FROM tb_penerimaan INNER JOIN tb_supplier ON tb_penerimaan.id_supplier = tb_supplier.id_supplier
		WHERE tb_penerimaan.no_bukti = '$no_bukti'";
		return $this->db->query($query2);
		return $this->db->get_where('tb_penerimaan',array('no_beli'=>$no_beli));
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
	function input_detail_pembayaran(){
		$nobeli 			= $this->input->post('nobeli');
		$idsupplier			= $this->input->post('idsupplier');
		$id					= $this->input->post('id');
		$noreff				= $this->input->post('noreff');
		$total	 			= $this->input->post('total');
		$sisabayar 		    = $this->input->post('sisabayar');
		$bayar 		        = $this->input->post('bayar');
		$user		 	    = $this->session->userdata('username');

		$barang = $this->db->get_where('tb_pembelian',array('id_supplier'=>$idsupplier,'no_beli'=>$nobeli))->row_array();
		if($bayar > $sisabayar){
			echo "GAGAL";
		}elseif($bayar == 0){
			echo "GAGAL";
		}elseif($idsupplier == $id){
			$data = array(
				'no_beli'		=> $nobeli,
				'id_supplier'	=> $idsupplier,
				'id'			=> $id,
				'no_reff'		=> $noreff,
				'total'			=> $total,
				'sisa_bayar'	=> $sisabayar,
				'bayar'			=> $bayar,
				'user'			=> $this->session->userdata('username')

			);
			
			$query = $this->db->query("SELECT * FROM tb_penerimaan_tmp WHERE no_beli = '$nobeli'  AND user = '$user'");
			$result = $query->result_array();
			$count = count($result);

			if (empty($count)) {
				
				$this->db->insert('tb_penerimaan_tmp',$data);
				$this->db->query("UPDATE tb_penerimaan_tmp SET sisa_bayar = sisa_bayar - bayar WHERE no_beli = '$nobeli'");
				
			}elseif ($count == 1) {

				$this->db->where('no_beli', $data['no_beli']) AND $this->db->where('user', $data['user']);
				$this->db->update('tb_penerimaan_tmp',$data);
				$this->db->query("UPDATE tb_penerimaan_tmp SET sisa_bayar = sisa_bayar - bayar WHERE no_beli = '$nobeli'");

			}else{
				echo "GAGAL";
			}
		}

	}
	function insert_pembayaran(){
		$a = $this->Model_pembayaran->getNomorterakhir()->row_array();
                            //Mengambil Tahun di Sistem
		$tahun    = date('y');
		$id       = ('PB');
		$id1       = ('-');
		$c = array('','I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII');
		$bln		= $c[date('n')];
		$format   = $tahun.$id.$id1.$bln;
		$data['autonumber'] 	= buatkode($a['no_bukti'],$format,4);
		$no_bukti		 = $data['autonumber'];
		$tgl_bayar		 = $this->input->post('tgl_bayar');
		$tgl			 = $this->input->post('tgl');
		$bulan			 = $this->input->post('bulan');
		$jam			 = date('H:i:s');
		$id_supplier	 = $this->input->post('id_supplier');
		$noreff	 		 = $this->input->post('noreff');
		$no_urut	 	 = $this->input->post('no_urut');
		$potongan		 = $this->input->post('potongan');
		$bayar			 = $this->input->post('bayaran');
		$totalan		 = $this->input->post('totalan');
		$sisaan		 	 = $this->input->post('sisaan');
		$ka_pot		 	 = $this->input->post('ka_pot');
		$cash		 	 = $this->input->post('cash');
		$kurs_tukar		 = $this->input->post('kurs_tukar');
		$kode_mu		 = $this->input->post('kode_mu');
		$debet		 	 = $this->input->post('debet');
		$bank1		 	 = $this->input->post('bank1');
		$transfer		 = $this->input->post('transfer');
		$bank2		 	 = $this->input->post('bank2');
		$giro		 	 = $this->input->post('giro');
		$ket_giro		 = $this->input->post('ket_giro');
		$kembali		 = $this->input->post('kembali');
		$kurang_bayar	 = $this->input->post('kurang_bayar');
		$keterangan		 = $this->input->post('keterangan');
		$user		 	 = $this->input->post('user');
		if($kurang_bayar > 0){
			$this->session->set_flashdata("message","<script> alert('Oops.. Pembayaran Harus Lunas')</script>");
			redirect('Pembayaran/input_pembayaran/'.$id_supplier);
		}elseif($totalan ==0){
			$this->session->set_flashdata("message","<script> alert('Oops.. Pembayaran Harus Lunas')</script>");
			redirect('Pembayaran/input_pembayaran/'.$id_supplier);
		}else{

			$data = array(

				'no_bukti'			=> $no_bukti,
				'tgl_bayar'			=> $tgl_bayar,
				'id_supplier'		=> $id_supplier,
				'noreff'			=> $noreff,
				'no_urut'			=> $no_urut,
				'bayar'				=> str_replace(",", "", $bayar),
				'totalan'			=> str_replace(",", "", $totalan),
				'sisaan'		    => str_replace(",", "", $sisaan),
				'potongan'			=> str_replace(",", "", $potongan),
				'cash'				=> str_replace(",", "", $cash),
				'kurs_tukar'		=> $kurs_tukar,
				'kode_mu'			=> str_replace(",", "", $kode_mu),
				'debet'				=> str_replace(",", "", $debet),
				'bank1'				=> $bank1,
				'transfer'			=> str_replace(",", "", $transfer),
				'bank2'				=> $bank2,
				'giro'				=> str_replace(",", "", $giro),
				'ket_giro'			=> $ket_giro,
				'kembali'			=> str_replace(",", "", $kembali),
				'kurang_bayar'		=> str_replace(",", "", $kurang_bayar),
				'user'				=> $this->session->userdata('username'),
				'keterangan'		=> $keterangan,


			);

			$insert_pembayaran = $this->db->insert('tb_penerimaan',$data);
		}
		$transaksi = array(
			
			'no_transaksi'   	=> $no_bukti,
			'tgl'   			=> $tgl_bayar,
			'date_invoice'   	=> $tgl,
			'bulan'   			=> $bulan,
			'jam'   			=> $jam,
			'id_supplier'		=> $id_supplier,
			'cash'				=> str_replace(",", "", $cash),
			'debet'				=> str_replace(",", "", $debet),
			'transfer'			=> str_replace(",", "", $transfer),
			'giro'				=> str_replace(",", "", $giro),
			'potongan'			=> str_replace(",", "", $potongan),
			'kembali'			=> str_replace(",", "", $kembali),

		);

		$insert_pembayaran = $this->db->insert('transaksi_dayb',$transaksi);

		if ($potongan > 0) {
			
			$data = $this->db->from('tb_bebas')->where('nama1','Potongan')->where('nama2','Pembayaran')->get();   
			foreach ($data->result() as $d){
				$transaksi_akun = array(

					'no_transaksi'		=> $no_bukti,
					'jam'				=> $jam,
					'tgl'				=> $tgl,
					'kode_akun'			=> $d->kode_akun,
					'no_reff'			=> 0,
					'id_kontak'			=> $id_supplier,
					'debet'				=> str_replace(",", "", $potongan),
				);
				$insert_penjualan = $this->db->insert('transaksi_akun',$transaksi_akun);

			}
		}
		$user = $this->session->userdata('username');
		$sal = $this->db->from('tb_penerimaan_tmp')->like('user',$user)->get();
		foreach ($sal->result() as $s){
			$saldo = array(

				'id_transaksi'   	=> $s->no_beli,
				'tgl'   			=> $tgl_bayar,
				'bulan'   			=> $bulan,
				'jam'   			=> $jam,
				'id_supplier'		=> $s->id_supplier,
				'bayar_tagihan'		=> str_replace(",", "", $s->bayar),
				'tagihan'			=> str_replace(",", "", $s->sisa_bayar),
			);
			$insert_pembayaran = $this->db->insert('saldob',$saldo);

		}
		$user = $this->session->userdata('username');
		$input_detail_barang = $this->db->from('tb_penerimaan_tmp')->like('user',$user)->get();
		foreach ($input_detail_barang->result() as $d){
			$data_tmp = array(

				'no_bukti'   	=> $no_bukti,
				'no_reff'   	=> $d->no_reff,
				'no_beli'   	=> $d->no_beli,
				'id_supplier'	=> $d->id_supplier,
				'total'			=> str_replace(".", "", $d->total),
				'sisa_bayar'	=> str_replace(".", "", $d->sisa_bayar),
				'bayar'			=> str_replace(".", "", $d->bayar)




			);
			$this->db->insert('tb_detail_penerimaan',$data_tmp);
			$this->db->query("UPDATE tb_pembelian SET sisa=sisa - '$d->bayar' WHERE no_beli = '$d->no_beli'");
			//$this->db->query("UPDATE tb_supplier SET no_reff_pb = no_reff_pb + '$d->no_reff' WHERE id_supplier = '$d->id_supplier'");
			//$this->db->query("UPDATE transaksi_day SET sisa_tagihan=sisa_tagihan - '$d->bayar' WHERE no_transaksi = '$d->no_jual'");

		}
		$query = "delete from tb_penerimaan_tmp where user='$d->user'";
		$this->db->query($query);
		redirect('Pembayaran/view_pembayaran/');
	}
	function insert_cetak_pembayaran(){
		$a = $this->Model_pembayaran->getNomorterakhir()->row_array();
                            //Mengambil Tahun di Sistem
		$tahun    = date('y');
		$id       = ('PB');
		$id1       = ('-');
		$c = array('','I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII');
		$bln		= $c[date('n')];
		$format   = $tahun.$id.$id1.$bln;
		$data['autonumber'] 	= buatkode($a['no_bukti'],$format,4);
		$no_bukti		 = $data['autonumber'];
		$tgl_bayar		 = $this->input->post('tgl_bayar');
		$tgl			 = $this->input->post('tgl');
		$bulan			 = $this->input->post('bulan');
		$jam			 = date('H:i:s');
		$id_supplier	 = $this->input->post('id_supplier');
		$noreff	 	 	 = $this->input->post('noreff');
		$no_urut	 	 = $this->input->post('no_urut');
		$potongan		 = $this->input->post('potongan');
		$bayar			 = $this->input->post('bayaran');
		$totalan		 = $this->input->post('totalan');
		$sisaan		 	 = $this->input->post('sisaan');
		$cash		 	 = $this->input->post('cash');
		$debet		 	 = $this->input->post('debet');
		$bank1		 	 = $this->input->post('bank1');
		$ka_pot			 = $this->input->post('ka_pot');
		$transfer		 = $this->input->post('transfer');
		$bank2		 	 = $this->input->post('bank2');
		$giro		 	 = $this->input->post('giro');
		$ket_giro		 = $this->input->post('ket_giro');
		$kembali		 = $this->input->post('kembali');
		$kurang_bayar	 = $this->input->post('kurang_bayar');
		$keterangan		 = $this->input->post('keterangan');
		$user		 	 = $this->input->post('user');
		if($kurang_bayar > 0){
			$this->session->set_flashdata("message","<script> alert('Oops.. Pembayaran Harus Lunas')</script>");
			redirect('Pembayaran/input_pembayaran/'.$id_supplier);
		}elseif($totalan ==0){
			$this->session->set_flashdata("message","<script> alert('Oops.. Pembayaran Harus Lunas')</script>");
			redirect('Pembayaran/input_pembayaran/'.$id_supplier);
		}else{

			$data = array(

				'no_bukti'			=> $no_bukti,
				'tgl_bayar'			=> $tgl_bayar,
				'id_supplier'		=> $id_supplier,
				'noreff'			=> $noreff,
				'no_urut'			=> $no_urut,
				'bayar'				=> str_replace(",", "", $bayar),
				'totalan'			=> str_replace(",", "", $totalan),
				'sisaan'		    => str_replace(",", "", $sisaan),
				'potongan'			=> str_replace(",", "", $potongan),
				'cash'				=> str_replace(",", "", $cash),
				'debet'				=> str_replace(",", "", $debet),
				'bank1'				=> $bank1,
				'transfer'			=> str_replace(",", "", $transfer),
				'bank2'				=> $bank2,
				'giro'				=> str_replace(",", "", $giro),
				'ket_giro'			=> $ket_giro,
				'kembali'			=> str_replace(",", "", $kembali),
				'kurang_bayar'		=> str_replace(",", "", $kurang_bayar),
				'user'				=> $this->session->userdata('username'),
				'keterangan'		=> $keterangan,


			);

			$insert_pembayaran = $this->db->insert('tb_penerimaan',$data);
		}
		$transaksi = array(

			'no_transaksi'   	=> $no_bukti,
			'tgl'   			=> $tgl_bayar,
			'date_invoice'		=> $tgl,
			'bulan'   			=> $bulan,
			'jam'   			=> $jam,
			'id_supplier'		=> $id_supplier,
			'cash'				=> str_replace(",", "", $cash),
			'debet'				=> str_replace(",", "", $debet),
			'transfer'			=> str_replace(",", "", $transfer),
			'giro'				=> str_replace(",", "", $giro),
			'potongan'			=> str_replace(",", "", $potongan),
			'kembali'			=> str_replace(",", "", $kembali),

		);

		if ($potongan > 0) {
			
			$data = $this->db->from('tb_bebas')->where('nama1','Potongan')->where('nama2','Pembayaran')->get();   
			foreach ($data->result() as $d){
				$transaksi_akun = array(

					'no_transaksi'		=> $no_bukti,
					'jam'				=> $jam,
					'tgl'				=> $tgl,
					'kode_akun'			=> $d->kode_akun,
					'no_reff'			=> 0,
					'id_kontak'			=> $id_supplier,
					'debet'				=> str_replace(",", "", $potongan),
				);
				$insert_penjualan = $this->db->insert('transaksi_akun',$transaksi_akun);

			}
		}

		$insert_pembayaran = $this->db->insert('transaksi_dayb',$transaksi);
		$user = $this->session->userdata('username');
		$sal = $this->db->from('tb_penerimaan_tmp')->like('user',$user)->get();
		foreach ($sal->result() as $s){
			$saldo = array(

				'id_transaksi'   	=> $s->no_beli,
				'tgl'   			=> $tgl_bayar,
				'bulan'   			=> $bulan,
				'jam'   			=> $jam,
				'id_supplier'		=> $s->id_supplier,
				'bayar_tagihan'		=> str_replace(",", "", $s->bayar),
				'tagihan'			=> str_replace(",", "", $s->sisa_bayar),
			);
			$insert_pembayaran = $this->db->insert('saldob',$saldo);

		}
		$user = $this->session->userdata('username');
		$input_detail_barang = $this->db->from('tb_penerimaan_tmp')->like('user',$user)->get();
		foreach ($input_detail_barang->result() as $d){
			$data_tmp = array(

				'no_bukti'   	=> $no_bukti,
				'no_reff'   	=> $noreff,
				'no_beli'   	=> $d->no_beli,
				'id_supplier'	=> $d->id_supplier,
				'total'			=> str_replace(".", "", $d->total),
				'sisa_bayar'	=> str_replace(".", "", $d->sisa_bayar),
				'bayar'			=> str_replace(".", "", $d->bayar)




			);
			$this->db->insert('tb_detail_penerimaan',$data_tmp);
			$this->db->query("UPDATE tb_pembelian SET sisa=sisa - '$d->bayar' WHERE no_beli = '$d->no_beli'");
			//$this->db->query("UPDATE transaksi_day SET sisa_tagihan=sisa_tagihan - '$d->bayar' WHERE no_transaksi = '$d->no_jual'");

		}
		$query = "delete from tb_penerimaan_tmp where user='$d->user'";
		$this->db->query($query);
		redirect('Pembayaran/cetak_struk/'.$no_bukti);
	}
	function delete($user,$no_beli)
	{ 
		$barang = $this->db->get_where('tb_penerimaan_tmp',array('no_beli'=>$no_beli))->row_array();
		$no_beli = $barang['no_beli'];
		$user = $this->session->userdata('username');
		$sql  = "DELETE FROM tb_penerimaan_tmp WHERE user='$user' AND no_beli = '$no_beli'";
		return $this->db->query($sql,array($user,$no_beli));
	}

}


?>