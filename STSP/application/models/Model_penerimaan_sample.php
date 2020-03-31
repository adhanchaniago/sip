<?php

class Model_penerimaan_sample extends CI_Model{
		
	function getNomorterakhir(){
					$query = "select * from tb_penerimaan_sample where MID(tgl_bayar,4,2)=MONTH(now()) ORDER BY no_bukti DESC LIMIT 1 ";
					return $this->db->query($query);
				
					}
					
			function get_penerimaan(){
				$id_pelanggan = $this->uri->segment(3);
				$query3 = "SELECT tb_penjualan_sample.no_sample,tb_penjualan_sample.id_pelanggan,tb_penjualan_sample.sisa,tb_pelanggan.nama_pelanggan,tb_pelanggan.no_bar,tb_pelanggan.deposit from tb_penjualan_sample 
				INNER JOIN tb_pelanggan ON tb_penjualan_sample.id_pelanggan=tb_pelanggan.id_pelanggan  WHERE tb_penjualan_sample.id_pelanggan='$id_pelanggan'";
				return $this->db->query($query3);
			}
			function view_pelanggan(){
				$query3 = "SELECT tb_pelanggan.id_pelanggan,nama_pelanggan,tb_penjualan.sisa FROM tb_pelanggan INNER JOIN tb_penjualan ON tb_pelanggan.id_pelanggan=tb_penjualan.id_pelanggan WHERE tb_penjualan.sisa > 0";
				return $this->db->query($query3);
			}
			
					function view_penerimaan(){
		$query = "SELECT tb_penerimaan_sample.no_bukti,tb_penerimaan_sample.noreff,tb_penerimaan_sample.no_bukti,potongan,totalan,cash,debet,transfer,bank1,bank2,giro,kembali,kurang_bayar,ket_giro,
		tb_penerimaan_sample.user,tb_penerimaan_sample.keterangan,tb_penerimaan_sample.tgl_bayar,tb_pelanggan.id_pelanggan,nama_pelanggan
		FROM tb_penerimaan_sample INNER JOIN tb_pelanggan ON tb_penerimaan_sample.id_pelanggan = tb_pelanggan.id_pelanggan ORDER BY tb_penerimaan_sample.no_bukti desc";
		return $this->db->query($query);
		
		}
			function data_pn($id){
		
		$query = "SELECT tb_penerimaan_sample.no_bukti,potongan,totalan,cash,debet,transfer,bank1,bank2,giro,dp,deposit,kembali,kurang_bayar,ket_giro,tb_detail_penerimaan_sample.no_sample,tb_detail_penerimaan_sample.id_pelanggan,no_reff,tb_detail_penerimaan_sample.total,sisa_bayar,tb_detail_penerimaan_sample.bayar
		FROM tb_penerimaan_sample INNER JOIN tb_detail_penerimaan_sample ON tb_penerimaan_sample.no_bukti = tb_detail_penerimaan_sample.no_bukti WHERE tb_penerimaan_sample.no_bukti = '$id'"; 
		return $this->db->query($query);
		}
		function view_detail_pembayaran(){
		$user	 = $this->session->userdata('username');	
		$query = "SELECT tb_penerimaan_sample_tmp.no_sample,tb_penerimaan_sample_tmp.user,tb_penerimaan_sample_tmp.id_pelanggan,tb_penerimaan_sample_tmp.no_reff,tb_penerimaan_sample_tmp.total,
		tb_penerimaan_sample_tmp.sisa_bayar,tb_penerimaan_sample_tmp.bayar,tb_pelanggan.nama_pelanggan FROM tb_penerimaan_sample_tmp INNER JOIN tb_pelanggan 
		ON tb_penerimaan_sample_tmp.id_pelanggan = tb_pelanggan.id_pelanggan WHERE tb_penerimaan_sample_tmp.user = '$user'";
		$query1= $this->db->query($query);
		return $query1->result_array();
		}
		
		function looping_cetak($id){
		$query = "SELECT * from tb_penerimaan_sample where tb_penerimaan_sample.no_bukti = '$id'";
		return $this->db->query($query);
		}
		
		function view_cetak($id){
		$query = "SELECT * from cetak_ps where cetak_ps.no_bukti = '$id'";
		return $this->db->query($query);
		}
		
		function get(){
				$no_bukti = $this->uri->segment(3);
				$query2 = "SELECT tb_penerimaan_sample.no_bukti,tb_penerimaan_sample.tgl_bayar,tb_penerimaan_sample.deposit,tb_penerimaan_sample.dp,
				tb_penerimaan_sample.id_pelanggan,nama_pelanggan,tb_penerimaan_sample.noreff,
				potongan,totalan,bayar,sisaan,cash,debet,bank1,transfer,bank2,giro,ket_giro,kembali,kurang_bayar,
				tb_penerimaan_sample.keterangan,user FROM tb_penerimaan_sample INNER JOIN tb_pelanggan ON tb_penerimaan_sample.id_pelanggan = tb_pelanggan.id_pelanggan WHERE tb_penerimaan_sample.no_bukti = '$no_bukti'";
				return $this->db->query($query2);
				return $this->db->get_where('tb_penerimaan_sample',array('no_sample'=>$no_sample));
			}
		
		function input_detail_pembayaran(){
					$nosample 			= $this->input->post('nosample');
					$idpelanggan		= $this->input->post('idpelanggan');
					$id					= $this->input->post('id');
					$noreff				= $this->input->post('noreff');
					$total	 			= $this->input->post('total');
					$sisabayar 		    = $this->input->post('sisabayar');
					$bayar 		        = $this->input->post('bayar');
					$user		 	    = $this->session->userdata('username');
			
			$barang = $this->db->get_where('tb_penjualan_sample',array('id_pelanggan'=>$idpelanggan,'no_sample'=>$nosample))->row_array();
			if($bayar > $sisabayar){
				echo "GAGAL";
			}elseif($bayar == 0){
				echo "GAGAL";
			}elseif($idpelanggan == $id){
				$data = array(
					'no_sample'		=> $nosample,
					'id_pelanggan'	=> $idpelanggan,
					'id'			=> $id,
					'no_reff'		=> $noreff,
					'total'			=> $total,
					'sisa_bayar'	=> $sisabayar,
					'bayar'			=> $bayar,
					'user'			=> $this->session->userdata('username')
					
					);
			
			$query = $this->db->query("SELECT * FROM tb_penerimaan_sample_tmp WHERE no_sample = '$nosample'  AND user = '$user'");
			$result = $query->result_array();
			$count = count($result);

			if (empty($count)) {
				
				$this->db->insert('tb_penerimaan_sample_tmp',$data);
				$this->db->query("UPDATE tb_penerimaan_sample_tmp SET sisa_bayar = sisa_bayar - bayar WHERE no_sample = '$nosample'");
				
			}elseif ($count == 1) {
		
				$this->db->where('no_sample', $data['no_sample']) AND $this->db->where('user', $data['user']);
			   $this->db->update('tb_penerimaan_sample_tmp',$data);
			   $this->db->query("UPDATE tb_penerimaan_sample_tmp SET sisa_bayar = sisa_bayar - bayar WHERE no_sample = '$nosample'");
			   
			}
			}else{
				echo "GAGAL";
			}
			
		}
		function insert_pembayaran(){
		$a = $this->Model_penerimaan_sample->getNomorterakhir()->row_array();
                            //Mengambil Tahun di Sistem
                            $tahun    = date('y');
                            $id       = ('PS');
                            $id1       = ('-');
                            $c = array('','I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII');
							$bln		= $c[date('n')];
                            $format   = $tahun.$id.$id1.$bln;
		$data['autonumber'] 	= buatkode($a['no_bukti'],$format,4);
		$no_bukti		 = $data['autonumber'];
		$tgl_bayar		 = $this->input->post('tgl_bayar');
		$bulan			 = $this->input->post('bulan');
		$jam			 = $this->input->post('jam');
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
		$dp		 		 = $this->input->post('dp');
		$dp2	 		 = $this->input->post('dp2');
		$ket_giro		 = $this->input->post('ket_giro');
		$kembali		 = $this->input->post('kembali');
		$kurang_bayar	 = $this->input->post('kurang_bayar');
		$keterangan		 = $this->input->post('keterangan');
		$user		 	 = $this->input->post('user');
		if($kurang_bayar > 0){
			$this->session->set_flashdata("message","<script> alert('Oops.. Pembayaran Harus Lunas')</script>");
			redirect('Penerimaan_sample/input_penerimaan/'.$id_pelanggan);
		}elseif($totalan ==0){
				$this->session->set_flashdata("message","<script> alert('Oops.. Pembayaran Harus Lunas')</script>");
			redirect('Penerimaan_sample/input_penerimaan/'.$id_pelanggan);
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
				
		$insert_pembayaran = $this->db->insert('tb_penerimaan_sample',$data);
		$pen = $this->db->get_where('tb_pelanggan',array('id_pelanggan'=>$id_pelanggan))->row_array();
		$PL = array(
				'deposit' => $pen['deposit'] - str_replace(",", "", $dp) ,
		);
		$this->db->where('id_pelanggan',$data['id_pelanggan']);
		$this->db->update('tb_pelanggan',$PL);
		$transaksi = array(
			
				'no_transaksi'   	=> $no_bukti,
				'tgl'   			=> $tgl_bayar,
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
		$user = $this->session->userdata('username');
        $sal = $this->db->from('tb_penerimaan_sample_tmp')->like('user',$user)->get();
		foreach ($sal->result() as $s){
		$this->db->query("UPDATE tb_pelanggan SET hutang=hutang - '$s->bayar' WHERE id_pelanggan = '$s->id_pelanggan'");
		}
		$user = $this->session->userdata('username');
        $input_detail_barang = $this->db->from('tb_penerimaan_sample_tmp')->like('user',$user)->get();
		foreach ($input_detail_barang->result() as $d){
			$data_tmp = array(
			
				'no_bukti'   	=> $no_bukti,
				'no_sample'   	=> $d->no_sample,
				'id_pelanggan'	=> $d->id_pelanggan,
				'no_reff'		=> $d->no_reff,
				'total'			=> str_replace(".", "", $d->total),
				'sisa_bayar'	=> str_replace(".", "", $d->sisa_bayar),
				'bayar'			=> str_replace(".", "", $d->bayar)
				
				
				
			
			);
			$this->db->insert('tb_detail_penerimaan_sample',$data_tmp);
			$this->db->query("UPDATE tb_penjualan_sample SET sisa=sisa - '$d->bayar' WHERE no_sample = '$d->no_sample'");
			//$this->db->query("UPDATE transaksi_day SET sisa_tagihan=sisa_tagihan - '$d->bayar' WHERE no_transaksi = '$d->no_jual'");
			
		}
		$query = "delete from tb_penerimaan_sample_tmp where user='$d->user'";
		$this->db->query($query);
		}
		redirect('Penerimaan_sample/view_penerimaan');
		}
		function insert_cetak_pembayaran(){
		$a = $this->Model_penerimaan_sample->getNomorterakhir()->row_array();
                            //Mengambil Tahun di Sistem
                            $tahun    = date('y');
                            $id       = ('PS');
                            $id1       = ('-');
                            $c = array('','I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII');
							$bln		= $c[date('n')];
                            $format   = $tahun.$id.$id1.$bln;
		$data['autonumber'] 	= buatkode($a['no_bukti'],$format,4);
		$no_bukti		 = $data['autonumber'];
		$tgl_bayar		 = $this->input->post('tgl_bayar');
		$bulan			 = $this->input->post('bulan');
		$jam			 = $this->input->post('jam');
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
		$dp		 		 = $this->input->post('dp');
		$dp2	 		 = $this->input->post('dp2');
		$ket_giro		 = $this->input->post('ket_giro');
		$kembali		 = $this->input->post('kembali');
		$kurang_bayar	 = $this->input->post('kurang_bayar');
		$keterangan		 = $this->input->post('keterangan');
		$user		 	 = $this->input->post('user');
		
		if($kurang_bayar > 0){
			$this->session->set_flashdata("message","<script> alert('Oops.. Pembayaran Harus Lunas')</script>");
			redirect('Penerimaan_sample/input_penerimaan/'.$id_pelanggan);
		}elseif($totalan == 0){
				$this->session->set_flashdata("message","<script> alert('Oops.. Pembayaran Harus Lunas')</script>");
			redirect('Penerimaan_sample/input_penerimaan/'.$id_pelanggan);
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
				
		$insert_pembayaran = $this->db->insert('tb_penerimaan_sample',$data);
		$pen = $this->db->get_where('tb_pelanggan',array('id_pelanggan'=>$id_pelanggan))->row_array();
		$PL = array(
				'deposit' => $pen['deposit'] - str_replace(",", "", $dp) ,
		);
		$this->db->where('id_pelanggan',$data['id_pelanggan']);
		$this->db->update('tb_pelanggan',$PL);
		$transaksi = array(
			
				'no_transaksi'   	=> $no_bukti,
				'tgl'   			=> $tgl_bayar,
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
		$user = $this->session->userdata('username');
        $sal = $this->db->from('tb_penerimaan_sample_tmp')->like('user',$user)->get();
		foreach ($sal->result() as $s){
		$this->db->query("UPDATE tb_pelanggan SET hutang=hutang - '$s->bayar' WHERE id_pelanggan = '$s->id_pelanggan'");
		}
		$user = $this->session->userdata('username');
        $input_detail_barang = $this->db->from('tb_penerimaan_sample_tmp')->like('user',$user)->get();
		foreach ($input_detail_barang->result() as $d){
			$data_tmp = array(
			
				'no_bukti'   	=> $no_bukti,
				'no_sample'   	=> $d->no_sample,
				'id_pelanggan'	=> $d->id_pelanggan,
				'no_reff'		=> $d->no_reff,
				'total'			=> str_replace(".", "", $d->total),
				'sisa_bayar'	=> str_replace(".", "", $d->sisa_bayar),
				'bayar'			=> str_replace(".", "", $d->bayar)
				
				
				
			
			);
			$this->db->insert('tb_detail_penerimaan_sample',$data_tmp);
			$this->db->query("UPDATE tb_penjualan_sample SET sisa=sisa - '$d->bayar' WHERE no_sample = '$d->no_sample'");
			//$this->db->query("UPDATE transaksi_day SET sisa_tagihan=sisa_tagihan - '$d->bayar' WHERE no_transaksi = '$d->no_jual'");
			
		}
		$query = "delete from tb_penerimaan_sample_tmp where user='$d->user'";
		$this->db->query($query);
		}
		redirect('Penerimaan_sample/cetak_struk/'.$no_bukti);
		}
		function delete($user,$no_sample)
    { 
	$barang = $this->db->get_where('tb_penerimaan_sample_tmp',array('no_sample'=>$no_sample))->row_array();
	$no_sample = $barang['no_sample'];
	$user = $this->session->userdata('username');
    $sql  = "DELETE FROM tb_penerimaan_sample_tmp WHERE user='$user' AND no_sample = '$no_sample'";
    return $this->db->query($sql,array($user,$no_sample));
}
	
}
					

?>