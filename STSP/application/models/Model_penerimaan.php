<?php

class Model_penerimaan extends CI_Model{
	
	function getNomorterakhir(){
		$bulan = gmdate("d-m-y",time()+60*60*7);
		$query = "select no_bukti from tb_pembayaran where  MID(tgl_bayar,4,2)=MONTH(now()) ORDER BY no_bukti DESC LIMIT 1 ";
		
		
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
	
	function get_penerimaan(){
		$id_pelanggan = $this->uri->segment(3);
		$query3 = "SELECT *,tb_penjualans.no_reff as no_reff FROM tb_penjualans INNER JOIN tb_pelanggan ON tb_penjualans.id_pelanggan = tb_pelanggan.id_pelanggan WHERE tb_penjualans.id_pelanggan='$id_pelanggan'";
		return $this->db->query($query3);
	}
	function view_pelanggan(){
		$query3 = "SELECT * FROM tb_penjualans INNER JOIN tb_pelanggan ON tb_penjualans.id_pelanggan = tb_pelanggan.id_pelanggan WHERE tb_penjualans.sisa > 0";
		return $this->db->query($query3);
	}
	function view_pel(){
		$query3 = "SELECT * FROM tb_penjualans INNER JOIN tb_pelanggan ON tb_penjualans.id_pelanggan = tb_pelanggan.id_pelanggan where tb_penjualans.sisa > 0 group by nama_pelanggan ";
		return $this->db->query($query3);
	}
	function view_penjualan(){
		$query = "SELECT * FROM tb_penjualans INNER JOIN tb_pelanggan ON tb_penjualans.id_pelanggan = tb_pelanggan.id_pelanggan where tb_penjualans.sisa > 0  ORDER BY tb_penjualans.no_jual desc";
		return $this->db->query($query);
		
	}
	function view_penerimaan(){
		$query = "SELECT tb_pembayaran.no_bukti,tb_pembayaran.noreff,tb_pembayaran.no_bukti,potongan,totalan,cash,debet,transfer,bank1,bank2,giro,kembali,kurang_bayar,ket_giro,
		tb_pembayaran.user,tb_pembayaran.keterangan,tb_pembayaran.tgl_bayar,tb_pelanggan.id_pelanggan,nama_pelanggan
		FROM tb_pembayaran INNER JOIN tb_pelanggan ON tb_pembayaran.id_pelanggan = tb_pelanggan.id_pelanggan ORDER BY tb_pembayaran.no_bukti desc";
		return $this->db->query($query);
		
	}
	function data_pn($id){
		
		$query = "SELECT tb_pembayaran.no_bukti,potongan,totalan,cash,debet,transfer,bank1,bank2,giro,deposit,dp,kembali,kurang_bayar,ket_giro,tb_detail_pembayaran.no_jual,tb_detail_pembayaran.id_pelanggan,no_reff,tb_detail_pembayaran.total,sisa_bayar,tb_detail_pembayaran.bayar
		FROM tb_pembayaran INNER JOIN tb_detail_pembayaran ON tb_pembayaran.no_bukti = tb_detail_pembayaran.no_bukti WHERE tb_pembayaran.no_bukti = '$id'"; 
		return $this->db->query($query);
	}
	function view_detail_pembayaran(){
		$user		 	    = $this->session->userdata('username');	
		$query = "SELECT tb_pembayaran_tmp.no_jual,tb_pembayaran_tmp.user,tb_pembayaran_tmp.id_pelanggan,tb_pembayaran_tmp.no_reff,tb_pembayaran_tmp.total,
		tb_pembayaran_tmp.sisa_bayar,tb_pembayaran_tmp.bayar,tb_pelanggan.nama_pelanggan FROM tb_pembayaran_tmp INNER JOIN tb_pelanggan 
		ON tb_pembayaran_tmp.id_pelanggan = tb_pelanggan.id_pelanggan WHERE tb_pembayaran_tmp.user = '$user'";
		$query1= $this->db->query($query);
		return $query1->result_array();
	}
	function looping_cetak($id){
		$query = "SELECT * from tb_pembayaran where tb_pembayaran.no_bukti = '$id'";
		return $this->db->query($query);
	}
	function view_cetak($id){
		$query = "SELECT * FROM cetak_penerimaan WHERE no_bukti = '$id'";
		return $this->db->query($query);
	}
	function get(){
		$no_bukti = $this->uri->segment(3);
		$query2 = "SELECT tb_pembayaran.no_bukti,tb_pembayaran.tgl_bayar,tb_pembayaran.id_pelanggan,nama_pelanggan,tb_pembayaran.noreff,tb_pembayaran.potongan,tb_pembayaran.totalan,tb_pembayaran.bayar,tb_pembayaran.sisaan,tb_pembayaran.cash,tb_pembayaran.debet,tb_pembayaran.bank1,tb_pembayaran.transfer,tb_pembayaran.bank2,tb_pembayaran.giro,tb_pembayaran.deposit,tb_pembayaran.dp,tb_pembayaran.ket_giro,tb_pembayaran.kembali,tb_pembayaran.kurang_bayar,tb_pembayaran.keterangan,tb_pembayaran.user FROM tb_pembayaran INNER JOIN tb_pelanggan ON tb_pembayaran.id_pelanggan = tb_pelanggan.id_pelanggan WHERE tb_pembayaran.no_bukti = '$no_bukti'";
		return $this->db->query($query2);
		return $this->db->get_where('tb_pembayaran',array('no_jual'=>$no_jual));
	}
	
	function input_detail_pembayaran(){
		$nojual 			= $this->input->post('nojual');
		$idpelanggan		= $this->input->post('idpelanggan');
		$id					= $this->input->post('id');
		$noreff				= $this->input->post('noreff');
		$total	 			= $this->input->post('total');
		$sisabayar 		    = $this->input->post('sisabayar');
		$bayar 		        = $this->input->post('bayar');
		$user		 	    = $this->session->userdata('username');
		
		$barang = $this->db->get_where('tb_penjualans',array('id_pelanggan'=>$idpelanggan,'no_jual'=>$nojual))->row_array();
		if($bayar > $sisabayar){
			echo "Gagal";
		}elseif($bayar == 0){
			echo "GAGAL";
		}elseif($idpelanggan == $id){
			$data = array(
				'no_jual'		=> $nojual,
				'id_pelanggan'	=> $idpelanggan,
				'id'			=> $id,
				'no_reff'		=> $noreff,
				'total'			=> $total,
				'sisa_bayar'	=> $sisabayar,
				'bayar'			=> $bayar,
				'user'			=> $this->session->userdata('username')
				
			);
			
			$query = $this->db->query("SELECT * FROM tb_pembayaran_tmp WHERE no_jual = '$nojual'  AND user = '$user'");
			$result = $query->result_array();
			$count = count($result);

			if (empty($count)) {
				
				$this->db->insert('tb_pembayaran_tmp',$data);
				$this->db->query("UPDATE tb_pembayaran_tmp SET sisa_bayar = sisa_bayar - bayar WHERE no_jual = '$nojual'");
				
			}elseif ($count == 1) {
				
				$this->db->where('no_jual', $data['no_jual']) AND $this->db->where('user', $data['user']);
				$this->db->update('tb_pembayaran_tmp',$data);
				$this->db->query("UPDATE tb_pembayaran_tmp SET sisa_bayar = sisa_bayar - bayar WHERE no_jual = '$nojual'");
				
			}
		}else{
			echo "GAGAL";
		}
		
	}
	function insert_pembayaran(){
		$a = $this->Model_penerimaan->getNomorterakhir()->row_array();
                            //Mengambil Tahun di Sistem
		$tahun    = date('y');
		$id       = ('PN');
		$id1       = ('-');
		$c = array('','I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII');
		$bln		= $c[date('n')];
		$format   = $tahun.$id.$id1.$bln;
		$data['autonumber'] 	= buatkode($a['no_bukti'],$format,4);
		$no_bukti		 = $data['autonumber'];
		$tgl_bayar		 = $this->input->post('tgl_bayar');
		$date_invoice	= $this->input->post('tgl');
		$bulan			 = $this->input->post('bulan');
		$jam			 = date('H:i:s');
		$id_pelanggan	 = $this->input->post('id_pelanggan');
		$no_reff	 	 = $this->input->post('no_reff');
		$no_urut	 	 = $this->input->post('no_urut');
		$potongan		 = $this->input->post('potongan');
		$bayar			 = $this->input->post('bayaran');
		$totalan		 = $this->input->post('totalan');
		$ka_pot		 	 = $this->input->post('ka_pot');
		$sisaan		 	 = $this->input->post('sisaan');
		$cash		 	 = $this->input->post('cash');
		$debet		 	 = $this->input->post('debet');
		$bank1		 	 = $this->input->post('bank1');
		$transfer		 = $this->input->post('transfer');
		$bank2		 	 = $this->input->post('bank2');
		$giro		 	 = $this->input->post('giro');
		$dp		 		 = $this->input->post('dp');
		$dp2	 		 = $this->input->post('dp2');
		$ket_giro		 = $this->input->post('ket_giro');
		$kembali		 = $this->input->post('kembali');
		$kurang_bayar	 = $this->input->post('kurang_bayar');
		$keterangan		 = $this->input->post('keterangan');
		$user		 	 = $this->input->post('user');
		if($kurang_bayar > 0){
			$this->session->set_flashdata("message","<script> alert('Oops.. Pembayaran Harus Lunas')</script>");
			redirect('Penerimaan/input_penerimaan/'.$id_pelanggan);
		}elseif($totalan ==0){
			$this->session->set_flashdata("message","<script> alert('Oops.. Pembayaran Harus Lunas')</script>");
			redirect('Penerimaan/input_penerimaan/'.$id_pelanggan);
		}else{
			
			$data = array(
				
				'no_bukti'			=> $no_bukti,
				'tgl_bayar'			=> $tgl_bayar,
				'id_pelanggan'		=> $id_pelanggan,
				'noreff'			=> $no_reff,
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
				'dp'				=> str_replace(",", "", $dp),
				'deposit'			=> str_replace(",", "", $dp2),
				'ket_giro'			=> $ket_giro,
				'kembali'			=> str_replace(",", "", $kembali),
				'kurang_bayar'		=> str_replace(",", "", $kurang_bayar),
				'user'				=> $this->session->userdata('username'),
				'keterangan'		=> $keterangan,
				
				
			);
			
			$insert_pembayaran = $this->db->insert('tb_pembayaran',$data);
			$transaksi = array(
				
				'no_transaksi'   	=> $no_bukti,
				'tgl'   			=> $tgl_bayar,
				'date_invoice'		=> $date_invoice,
				'bulan'   			=> $bulan,
				'jam'   			=> $jam,
				'id_pelanggan'		=> $id_pelanggan,
				'cash'				=> str_replace(",", "", $cash),
				'debet'				=> str_replace(",", "", $debet),
				'transfer'			=> str_replace(",", "", $transfer),
				'giro'				=> str_replace(",", "", $giro),
				'deposit'			=> str_replace(",", "", $dp),
				'potongan'			=> str_replace(",", "", $potongan),
				'kembali'			=> str_replace(",", "", $kembali),
				
			);
			
			$insert_pembayaran = $this->db->insert('transaksi_day',$transaksi);
			if ($potongan > 0) {

				$data = $this->db->from('tb_bebas')->where('nama1','Potongan')->where('nama2','Penerimaan')->get();   
				foreach ($data->result() as $d){
					$transaksi_akun = array(

						'no_transaksi'		=> $no_bukti,
						'jam'				=> $jam,
						'tgl'				=> $date_invoice,
						'kode_akun'			=> $d->kode_akun,
						'no_reff'			=> $no_reff,
						'id_kontak'			=> $id_pelanggan,
						'kredit'			=> str_replace(",", "", $potongan),
					);
					$insert_penjualan = $this->db->insert('transaksi_akun',$transaksi_akun);

				}

			}
			$user = $this->session->userdata('username');
			$input_detail_barang = $this->db->from('tb_pembayaran_tmp')->like('user',$user)->get();
			foreach ($input_detail_barang->result() as $d){
				$data_tmp = array(
					
					'no_bukti'   	=> $no_bukti,
					'no_jual'   	=> $d->no_jual,
					'id_pelanggan'	=> $d->id_pelanggan,
					'no_reff'		=> $d->no_reff,
					'total'			=> str_replace(".", "", $d->total),
					'sisa_bayar'	=> str_replace(".", "", $d->sisa_bayar),
					'bayar'			=> str_replace(".", "", $d->bayar)
					
					
					
					
				);
				$this->db->insert('tb_detail_pembayaran',$data_tmp);
				$this->db->query("UPDATE tb_penjualans SET sisa=sisa - '$d->bayar' WHERE no_jual = '$d->no_jual'");
				$this->db->query("UPDATE transaksi_day SET sisa_tagihan=sisa_tagihan - '$d->bayar' WHERE no_transaksi = '$d->no_jual'");
				$this->db->query("UPDATE tb_pelanggan SET hutang=hutang - '$d->bayar' WHERE id_pelanggan = '$d->id_pelanggan'");
				
			}
			$query = "delete from tb_pembayaran_tmp where user='$d->user'";
			$this->db->query($query);
		}
		redirect('Penerimaan/view_penerimaan');
	}
	function insert_cetak_pembayaran(){
		$a = $this->Model_penerimaan->getNomorterakhir()->row_array();
                            //Mengambil Tahun di Sistem
		$tahun    = date('y');
		$id       = ('PN');
		$id1       = ('-');
		$c = array('','I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII');
		$bln		= $c[date('n')];
		$format   = $tahun.$id.$id1.$bln;
		$data['autonumber'] 	= buatkode($a['no_bukti'],$format,4);
		$no_bukti		 = $data['autonumber'];
		$tgl_bayar		 = $this->input->post('tgl_bayar');
		$date_invoice	 = $this->input->post('tgl');
		$bulan			 = $this->input->post('bulan');
		$jam			 = date('H:i:s');
		$id_pelanggan	 = $this->input->post('id_pelanggan');
		$no_reff	 	 = $this->input->post('no_reff');
		$no_urut	 	 = $this->input->post('no_urut');
		$potongan		 = $this->input->post('potongan');
		$bayar			 = $this->input->post('bayaran');
		$totalan		 = $this->input->post('totalan');
		$sisaan		 	 = $this->input->post('sisaan');
		$cash		 	 = $this->input->post('cash');
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
			redirect('Penerimaan/input_penerimaan/'.$id_pelanggan);
		}elseif($totalan ==0){
			$this->session->set_flashdata("message","<script> alert('Oops.. Pembayaran Harus Lunas')</script>");
			redirect('Penerimaan/input_penerimaan/'.$id_pelanggan);
		}else{
			$data = array(
				
				'no_bukti'			=> $no_bukti,
				'tgl_bayar'			=> $tgl_bayar,
				'id_pelanggan'		=> $id_pelanggan,
				'noreff'			=> $no_reff,
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
			
			$insert_pembayaran = $this->db->insert('tb_pembayaran',$data);
			$transaksi = array(
				
				'no_transaksi'   	=> $no_bukti,
				'tgl'   			=> $tgl_bayar,
				'date_invoice'		=> $date_invoice,
				'bulan'   			=> $bulan,
				'jam'   			=> $jam,
				'id_pelanggan'		=> $id_pelanggan,
				'cash'				=> str_replace(",", "", $cash),
				'debet'				=> str_replace(",", "", $debet),
				'transfer'			=> str_replace(",", "", $transfer),
				'giro'				=> str_replace(",", "", $giro),
				'deposit'			=> str_replace(",", "", $dp),
				'potongan'			=> str_replace(",", "", $potongan),
				'kembali'			=> str_replace(",", "", $kembali),
				
			);
			
			$insert_pembayaran = $this->db->insert('transaksi_day',$transaksi);
			if ($potongan > 0) {

				$data = $this->db->from('tb_bebas')->where('nama1','Potongan')->where('nama2','Penerimaan')->get();   
				foreach ($data->result() as $d){
					$transaksi_akun = array(

						'no_transaksi'		=> $no_bukti,
						'jam'				=> $jam,
						'tgl'				=> $date_invoice,
						'kode_akun'			=> $d->kode_akun,
						'no_reff'			=> $no_reff,
						'id_kontak'			=> $id_pelanggan,
						'kredit'			=> str_replace(",", "", $potongan),
					);
					$insert_penjualan = $this->db->insert('transaksi_akun',$transaksi_akun);

				}

			}
			$user = $this->session->userdata('username');
			$input_detail_barang = $this->db->from('tb_pembayaran_tmp')->like('user',$user)->get();
			foreach ($input_detail_barang->result() as $d){
				$data_tmp = array(
					
					'no_bukti'   	=> $no_bukti,
					'no_jual'   	=> $d->no_jual,
					'id_pelanggan'	=> $d->id_pelanggan,
					'total'			=> str_replace(".", "", $d->total),
					'sisa_bayar'	=> str_replace(".", "", $d->sisa_bayar),
					'bayar'			=> str_replace(".", "", $d->bayar)
					
					
					
					
				);
				$this->db->insert('tb_detail_pembayaran',$data_tmp);
				$this->db->query("UPDATE tb_penjualans SET sisa=sisa - '$d->bayar' WHERE no_jual = '$d->no_jual'");
				$this->db->query("UPDATE transaksi_day SET sisa_tagihan=sisa_tagihan - '$d->bayar' WHERE no_transaksi = '$d->no_jual'");
				$this->db->query("UPDATE tb_pelanggan SET hutang=hutang - '$d->bayar' WHERE id_pelanggan = '$d->id_pelanggan'");
			}
			$query = "delete from tb_pembayaran_tmp where user='$d->user'";
			$this->db->query($query);
		}
		redirect('Penerimaan/cetak_struk/'.$no_bukti);
	}
	function delete($user,$no_jual)
	{ 
		$barang = $this->db->get_where('tb_pembayaran_tmp',array('no_jual'=>$no_jual))->row_array();
		$no_jual = $barang['no_jual'];
		$user = $this->session->userdata('username');
		$sql  = "DELETE FROM tb_pembayaran_tmp WHERE user='$user' AND no_jual = '$no_jual'";
		return $this->db->query($sql,array($user,$no_jual));
	}
	
}


?>