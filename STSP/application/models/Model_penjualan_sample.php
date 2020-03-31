<?php

class Model_penjualan_sample extends CI_Model{
	
	function barang_list(){
        $hasil=$this->db->query("SELECT * FROM tb_detail_b_barangP");
        return $hasil->result();
    }
  function hapus_barang($id_barang){
        $hasil=$this->db->query("DELETE FROM tb_detail_b_barangP WHERE id_barang='$id_barang'");
        return $hasil;
		
    }
	public function getAllPenjualan($offset, $limit){
		$query = $this->db->query("SELECT tb_penjualan_sample.no_sample,tb_penjualan_sample.no_reff,tb_penjualan_sample.keterangan,tb_penjualan_sample.total,user,potongan,nominal1,nominal2,sisa,cetak,acc,status_kirim,
		tb_pelanggan.id_pelanggan,nama_pelanggan,tb_penjualan_sample.tgl_invoice,tb_penjualan_sample.tempo,no_sj,tb_penjualan_sample.jatuh_tempo
		FROM tb_penjualan_sample INNER JOIN tb_pelanggan ON tb_penjualan_sample.id_pelanggan = tb_pelanggan.id_pelanggan ORDER BY tb_penjualan_sample.no_sample DESC LIMIT $offset, $limit");
		return $query;
	 }
	 public function getAllPenjualan_count(){
	  $query = $this->db->query("SELECT * FROM tb_penjualan_sample");
	  return $query->num_rows();
	 }
		function get(){
				$no_sample = $this->uri->segment(3);
				$query2 = "SELECT tb_penjualan_sample.no_sample,tb_penjualan_sample.cetak,tb_penjualan_sample.sisa,tb_penjualan_sample.sisa2,tb_penjualan_sample.keterangan,tb_penjualan_sample.total,tb_penjualan_sample.user,tb_penjualan_sample.jatuh_tempo,tb_penjualan_sample.potongan,tb_penjualan_sample.ongkir1,tb_penjualan_sample.nominal1,tb_penjualan_sample.ongkir2,tb_penjualan_sample.nominal2,tb_penjualan_sample.debet,tb_penjualan_sample.bank1,tb_penjualan_sample.transfer,tb_penjualan_sample.bank2,tb_penjualan_sample.cash,tb_penjualan_sample.giro,tb_penjualan_sample.ket_giro,tb_penjualan_sample.dp,tb_penjualan_sample.deposit,tb_penjualan_sample.kembali,tb_penjualan_sample.no_reff, tb_penjualan_sample.id_pelanggan,nama_pelanggan FROM tb_penjualan_sample INNER JOIN tb_pelanggan ON tb_penjualan_sample.id_pelanggan=tb_pelanggan.id_pelanggan WHERE tb_penjualan_sample.no_sample = '$no_sample'";
				return $this->db->query($query2);
				return $this->db->get_where('tb_detail_penjualan',array('no_jual'=>$no_jual));
			}
		function view_penjualan_sample(){
		$query = "SELECT tb_penjualan_sample.no_sample,tb_penjualan_sample.no_reff,tb_penjualan_sample.keterangan,tb_penjualan_sample.total,user,potongan,nominal1,nominal2,sisa2,sisa,cetak,acc,status_kirim,
		tb_pelanggan.id_pelanggan,nama_pelanggan,tb_penjualan_sample.tgl_invoice,tb_penjualan_sample.tempo,no_sj,tb_penjualan_sample.jatuh_tempo
		FROM tb_penjualan_sample INNER JOIN tb_pelanggan ON tb_penjualan_sample.id_pelanggan = tb_pelanggan.id_pelanggan ORDER BY tb_penjualan_sample.no_sample desc";
		return $this->db->query($query);		
		}
		function view_detail_sample($id){
		$query = "SELECT tb_penjualan_sample.no_sample,tb_penjualan_sample.total,tb_penjualan_sample.potongan,tb_penjualan_sample.ongkir1,tb_penjualan_sample.ongkir2,tb_penjualan_sample.sisa2,tb_penjualan_sample.nominal1,tb_penjualan_sample.ket_alamt,
		tb_penjualan_sample.nominal2,tb_penjualan_sample.cash,tb_penjualan_sample.debet,tb_penjualan_sample.bank1,tb_penjualan_sample.transfer,tb_penjualan_sample.bank2,acc,
		tb_penjualan_sample.giro,tb_penjualan_sample.deposit,tb_penjualan_sample.dp,tb_penjualan_sample.kembali,tb_penjualan_sample.sisa,tb_penjualan_sample.sisa,tb_penjualan_sample.ket_giro,tb_detail_penjualan_sample.nama_barang,qtyb,satuan_besar,harga_beli,disc,disc1 FROM tb_penjualan_sample INNER JOIN tb_detail_penjualan_sample 
		ON tb_penjualan_sample.no_sample = tb_detail_penjualan_sample.no_sample WHERE tb_penjualan_sample.no_sample = '$id'"; //dhapus ,disc2
		return $this->db->query($query);
		}
		function detail_sample(){
		$user  = $this->session->userdata('username');
		$query = "SELECT * FROM tb_detail_b_barangs WHERE user = '$user'";
		$query1= $this->db->query($query);
		return $query1->result_array();
		}
		function view_cetak($id){
		$query = "SELECT * FROM cetak_sample WHERE no_sample = '$id'";
		return $this->db->query($query);
		}
		function view_cetak_a5($id){
		$query = "SELECT * FROM cetak_a5 WHERE no_jual = '$id'";
		return $this->db->query($query);
		}
		function looping_cetak($id){
		$query = "SELECT * from tb_penjualan_sample where tb_penjualan_sample.no_sample = '$id'";
		return $this->db->query($query);
		}
	function input_detail_barang(){
					$idbarang			= $this->input->post('idbarang');
					$namabarang			= $this->input->post('namabarang');
					$qtybes				= $this->input->post('qtybes');
					$satuanbes 			= $this->input->post('satuanbes');
					$hargabeli 		    = $this->input->post('hargabeli');
					$disc 		        = $this->input->post('disc');
					$disc1		        = $this->input->post('disc1');
					$jam		        = $this->input->post('jam');
					$user		 	    = $this->session->userdata('username');
					
				$data = array(
					
					
					'id_barang'		=> $idbarang,
					'nama_barang'	=> $namabarang,
					'qtyb'			=> $qtybes,
					'satuan'		=> $satuanbes,
					'harga_beli'	=> str_replace(".", "", $hargabeli),
					'disc'			=> $disc,
					'disc1'			=> $disc1,
					'jam'			=> $jam,
					'user'			=> $this->session->userdata('username'),
					
				);
			$query = $this->db->query("SELECT * FROM tb_detail_b_barangs WHERE user='$user' AND id_barang='$idbarang'");
			$result = $query->result_array();
			$count = count($result);
			
			if (empty($count)) {
				
				$this->db->insert('tb_detail_b_barangs',$data);
				
			}elseif ($count == 1) {
		
				$this->db->where('id_barang', $data['id_barang']) AND $this->db->where('user', $data['user']);
			   $this->db->update('tb_detail_b_barangs',$data);
			   
			}
			
	
	}
		
		function insert_penjualan_sample(){
		$a = $this->Model_penjualan_sample->getNomorterakhir()->row_array();
                            //Mengambil Tahun di Sistem
        $tahun    = date('y');
        $id       = ('S');
        $id1       = ('-');
		$c = array('','I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII');
		$bln		= $c[date('n')];
        $format   = $tahun.$id.$id1.$bln;
		$data['autonumber'] = buatkode($a['no_sample'],$format,4);
		$no_sample		 = $data['autonumber'];
		$no_reff		 = $this->input->post('no_reff');
		$tgl_trans	 	 = $this->input->post('tgl_trans');
		$tgl_invoice	 = $this->input->post('tgl_invoice');
		$jam	 		 = $this->input->post('jam');
		$id_pelanggan	 = $this->input->post('id_pelanggan');
		$b = $this->Model_penjualan_sample->getNomorterakhir1()->row_array();
                            //Mengambil Tahun di Sistem
                            $tahun    = date('y');
                            $id       = ('SJ');
                            $id1       = ('-');
                            $c = array('','I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII');
							$bln		= $c[date('n')];
                            $format2   = $tahun.$id.$id1.$bln;
		$data['autonumber1'] 	= buatkode($b['no_sj'],$format2,4);
		$no_sj	 		 = $data['autonumber1'];
		$no_sjln	 	 = $this->input->post('no_sjln');
		$no_urut	 	 = $this->input->post('no_urut');
		$jatuh_tempo	 = $this->input->post('jatuh_tempo');
		$jatuh_tempoan	 = $this->input->post('jatuh_tempoan');
		$tempo			 = $this->input->post('tempo');
		$id_k_pelanggan	 = $this->input->post('id_k_pelanggan');
		$keterangan		 = $this->input->post('keterangan');
		$bulan			 = $this->input->post('bulan');
		$jam			 = $this->input->post('jam');
		$ket_retur		 = $this->input->post('ket_retur');
		$ket_pel		 = $this->input->post('ket_pel');
		$ket_alamat		 = $this->input->post('ket_alamat');
		$total_belanja	 = $this->input->post('total_belanja');
		$total_retur	 = $this->input->post('total_retur');
		$total		 	 = $this->input->post('total');
		$totalan		 = $this->input->post('totalan');
		$user		 	 = $this->input->post('user');
		$potongan		 = $this->input->post('potongan');
		$ongkir1		 = $this->input->post('ongkir1');
		$ongkir2		 = $this->input->post('ongkir2');
		$nominal1		 = $this->input->post('nominal1');
		$nominal2		 = $this->input->post('nominal2');
		$cash		 	 = $this->input->post('cash');
		$debet		 	 = $this->input->post('debet');
		$bank1		 	 = $this->input->post('bank1');
		$transfer		 = $this->input->post('transfer');
		$bank2		 	 = $this->input->post('bank2');
		$dp		 		 = $this->input->post('dp');
		$dp2	 		 = $this->input->post('dp2');
		$giro		 	 = $this->input->post('giro');
		$ket_giro		 = $this->input->post('ket_giro');
		$kembali		 = $this->input->post('kembali');
		$sisa		 	 = $this->input->post('sisa');
		$sisa2		 	 = $this->input->post('sisa2');
		$acc			 = $this->input->post('acc');
		if($total== 0){
					$this->session->set_flashdata("message","<script> alert('Oops.. Total Masih Kosong')</script>");
					redirect('Penjualan_Sample/input_penjualan_sample');
		}else{
		
		$data = array(
					
					'no_sample'			=> $no_sample,
					'no_reff'			=> $no_reff,
					'no_urut'			=> $no_urut,
					'tgl_invoice'		=> $tgl_invoice,
					'id_pelanggan'		=> $id_pelanggan,
					'no_sj'				=> $no_sj,
					'jatuh_tempo'		=> $jatuh_tempo,
					'tempo'				=> $tempo,
					'id_k_pelanggan'	=> $id_k_pelanggan,
					'keterangan'		=> $keterangan,
					'total'				=> str_replace(",", "", $total),
					'user'				=> $this->session->userdata('username'),
					'potongan'			=> str_replace(",", "", $potongan),
					'ongkir1'			=> $ongkir1,
					'ongkir2'			=> $ongkir2,
					'nominal1'			=> str_replace(",", "", $nominal1),
					'nominal2'			=> str_replace(",", "", $nominal2),
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
					'sisa'				=> str_replace(",", "", $sisa),
					'sisa2'				=> str_replace(",", "", $sisa),
					'acc'				=> $acc,		
				);
		$insert_penjualan = $this->db->insert('tb_penjualan_sample',$data);
		$pen = $this->db->get_where('tb_pelanggan',array('id_pelanggan'=>$id_pelanggan))->row_array();
		$PL = array(
				'hutang' => str_replace(",", "", $sisa) + $pen['hutang'],
				'total_hutang' => str_replace(",", "", $sisa) + $pen['total_hutang'],
				'deposit' => $pen['deposit'] - str_replace(",", "", $dp) ,
		);
		$this->db->where('id_pelanggan',$data['id_pelanggan']);
		$this->db->update('tb_pelanggan',$PL);
		$transaksi = array(
					
					'no_transaksi'			=> $no_sample,
					'no_raff'				=> $no_reff,
					'tgl'					=> $tgl_trans,
					'date_invoice'			=> $tgl_invoice,
					'bulan'					=> $bulan,
					'jam'					=> $jam,
					'id_pelanggan'			=> $id_pelanggan,
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
					
					
				);
		$insert_penjualan = $this->db->insert('transaksi_day',$transaksi);
		$user = $this->session->userdata('username');
        $data = $this->db->from('tb_detail_b_barangs')->like('user',$user)->get();   
		foreach ($data->result() as $d){
			$data_tmp = array(
				'no_sample'   	=> $no_sample,
				'id_pelanggan'	=> $id_pelanggan,
				'nama_barang'   => $d->nama_barang,
				'qtyb'			=> $d->qtyb,
				'satuan_besar'	=> $d->satuan,
				'harga_beli'	=> str_replace(".", "", $d->harga_beli),
				'disc'			=> $d->disc,
				'disc1'			=> $d->disc1
			
			);
			$this->db->insert('tb_detail_penjualan_sample',$data_tmp);
			
			
		}
		//$data = $this->db->where('user',$d->user);
		$query = "delete from tb_detail_b_barangs where user='$d->user'";
		$this->db->query($query);
		}
		redirect('Penjualan_Sample/input_penjualan_sample');
		}
		function insert_penjualan_sample_cetak_thermal(){
		$a = $this->Model_penjualan_sample->getNomorterakhir()->row_array();
                            //Mengambil Tahun di Sistem
        $tahun    = date('y');
        $id       = ('S');
        $id1       = ('-');
		$c = array('','I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII');
		$bln		= $c[date('n')];
        $format   = $tahun.$id.$id1.$bln;
		$data['autonumber'] = buatkode($a['no_sample'],$format,4);
		$no_sample		 = $data['autonumber'];
		$no_reff		 = $this->input->post('no_reff');
		$tgl_trans		 = $this->input->post('tgl_trans');
		$tgl_invoice	 = $this->input->post('tgl_invoice');
		$jam	 		 = $this->input->post('jam');
		$id_pelanggan	 = $this->input->post('id_pelanggan');
		$b = $this->Model_penjualan_sample->getNomorterakhir1()->row_array();
                            //Mengambil Tahun di Sistem
                            $tahun    = date('y');
                            $id       = ('SJ');
                            $id1       = ('-');
                            $c = array('','I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII');
							$bln		= $c[date('n')];
                            $format2   = $tahun.$id.$id1.$bln;
		$data['autonumber1'] 	= buatkode($b['no_sj'],$format2,4);
		$no_sj	 		 = $data['autonumber1'];
		$no_sjln	 	 = $this->input->post('no_sjln');
		$no_urut	 	 = $this->input->post('no_urut');
		$jatuh_tempo	 = $this->input->post('jatuh_tempo');
		$jatuh_tempoan	 = $this->input->post('jatuh_tempoan');
		$tempo			 = $this->input->post('tempo');
		$id_k_pelanggan	 = $this->input->post('id_k_pelanggan');
		$keterangan		 = $this->input->post('keterangan');
		$bulan			 = $this->input->post('bulan');
		$jam			 = $this->input->post('jam');
		$ket_retur		 = $this->input->post('ket_retur');
		$ket_pel		 = $this->input->post('ket_pel');
		$ket_alamat		 = $this->input->post('ket_alamat');
		$total_belanja	 = $this->input->post('total_belanja');
		$total_retur	 = $this->input->post('total_retur');
		$total		 	 = $this->input->post('total');
		$totalan		 = $this->input->post('totalan');
		$user		 	 = $this->input->post('user');
		$potongan		 = $this->input->post('potongan');
		$ongkir1		 = $this->input->post('ongkir1');
		$ongkir2		 = $this->input->post('ongkir2');
		$nominal1		 = $this->input->post('nominal1');
		$nominal2		 = $this->input->post('nominal2');
		$cash		 	 = $this->input->post('cash');
		$debet		 	 = $this->input->post('debet');
		$bank1		 	 = $this->input->post('bank1');
		$transfer		 = $this->input->post('transfer');
		$bank2		 	 = $this->input->post('bank2');
		$dp		 		 = $this->input->post('dp');
		$dp2	 		 = $this->input->post('dp2');
		$giro		 	 = $this->input->post('giro');
		$ket_giro		 = $this->input->post('ket_giro');
		$kembali		 = $this->input->post('kembali');
		$sisa		 	 = $this->input->post('sisa');
		$cetak		 	 = $this->input->post('cetak');
		$sisa2		 	 = $this->input->post('sisa2');
		$acc			 = $this->input->post('acc');
		if($total== 0){
					$this->session->set_flashdata("message","<script> alert('Oops.. Total Masih Kosong')</script>");
					redirect('Penjualan_Sample/input_penjualan_sample');
		}else{
		$data = array(
					
					'no_sample'			=> $no_sample,
					'no_reff'			=> $no_reff,
					'no_urut'			=> $no_urut,
					'tgl_invoice'		=> $tgl_invoice,
					'id_pelanggan'		=> $id_pelanggan,
					'no_sj'				=> $no_sj,
					'jatuh_tempo'		=> $jatuh_tempo,
					'tempo'				=> $tempo,
					'id_k_pelanggan'	=> $id_k_pelanggan,
					'keterangan'		=> $keterangan,
					'total'				=> str_replace(",", "", $total),
					'user'				=> $this->session->userdata('username'),
					'potongan'			=> str_replace(",", "", $potongan),
					'ongkir1'			=> $ongkir1,
					'ongkir2'			=> $ongkir2,
					'nominal1'			=> str_replace(",", "", $nominal1),
					'nominal2'			=> str_replace(",", "", $nominal2),
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
					'sisa'				=> str_replace(",", "", $sisa),
					'sisa2'				=> str_replace(",", "", $sisa),
					'acc'				=> $acc,		
					'cetak'				=> $cetak,		
				);
		$insert_penjualan = $this->db->insert('tb_penjualan_sample',$data);
		$pen = $this->db->get_where('tb_pelanggan',array('id_pelanggan'=>$id_pelanggan))->row_array();
		$PL = array(
				'hutang' => str_replace(",", "", $sisa) + $pen['hutang'],
				'total_hutang' => str_replace(",", "", $sisa) + $pen['total_hutang'],
				'deposit' => $pen['deposit'] - str_replace(",", "", $dp) ,
		);
		$this->db->where('id_pelanggan',$data['id_pelanggan']);
		$this->db->update('tb_pelanggan',$PL);
		$transaksi = array(
					
					'no_transaksi'			=> $no_sample,
					'no_raff'				=> $no_reff,
					'tgl'					=> $tgl_trans,
					'date'					=> $tgl_invoice,
					'bulan'					=> $bulan,
					'jam'					=> $jam,
					'id_pelanggan'			=> $id_pelanggan,
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
					
					
				);
		$insert_penjualan = $this->db->insert('transaksi_day',$transaksi);
		$user = $this->session->userdata('username');
        $data = $this->db->from('tb_detail_b_barangs')->like('user',$user)->get();   
		foreach ($data->result() as $d){
			$data_tmp = array(
				'no_sample'   	=> $no_sample,
				'id_pelanggan'	=> $id_pelanggan,
				'nama_barang'   => $d->nama_barang,
				'qtyb'			=> $d->qtyb,
				'satuan_besar'	=> $d->satuan,
				'harga_beli'	=> str_replace(".", "", $d->harga_beli),
				'disc'			=> $d->disc,
				'disc1'			=> $d->disc1
			
			);
			$this->db->insert('tb_detail_penjualan_sample',$data_tmp);
			
			
		}
		//$data = $this->db->where('user',$d->user);
		$query = "delete from tb_detail_b_barangs where user='$d->user'";
		$this->db->query($query);
		}
		redirect('Penjualan_Sample/cetak_struk/'.$no_sample);
		
		}
		
		
	function getNomorterakhir(){
					$query = "SELECT * FROM tb_penjualan_sample where MID(tgl_invoice,4,2)=MONTH(now()) ORDER BY no_sample DESC LIMIT 1";
					return $this->db->query($query);
					}			
	function getNomorterakhir1(){
					$query = "select no_sj from tb_penjualan_sample ORDER BY no_sj DESC LIMIT 1 ";
					return $this->db->query($query);
					}
	
	
	function delete($user,$id_barang)
    { 
	$barang = $this->db->get_where('tb_detail_b_barangs',array('id_barang'=>$id_barang))->row_array();
	$id_barang = $barang['id_barang'];
	$user = $this->session->userdata('username');
    $sql  = "DELETE FROM tb_detail_b_barangs WHERE user='$user' AND id_barang = '$id_barang'";
    return $this->db->query($sql,array($user,$id_barang));
}

}

?>