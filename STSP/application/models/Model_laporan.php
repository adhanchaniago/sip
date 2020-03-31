<?php

class Model_laporan extends CI_Model{
	
	
			function lap_saldo($id_pelanggan,$tanggal_dari,$tanggal_sampai){
					$cari = "SELECT * from saldo  WHERE saldo.id_pelanggan like '%$id_pelanggan%' AND tgl BETWEEN '$tanggal_dari' AND '$tanggal_sampai' order by bulan,tgl asc";
					return  $this->db->query($cari);
				}
				function pelanggan($id_pelanggan){
					$cari = "SELECT * from tb_pelanggan  WHERE tb_pelanggan.id_pelanggan='$id_pelanggan'";
					return  $this->db->query($cari);
				}function view_sales(){
					$cari = "SELECT * from tb_sales  order by nama_sales asc";
					return  $this->db->query($cari);
				}function view_belen(){
					$cari = "SELECT * from customer order by Nama asc";
					return  $this->db->query($cari);
				}
				function view_faktur(){
					$cari = "SELECT no_faktur from tb_perusahaan ORDER BY no_faktur DESC LIMIT 1";
					return  $this->db->query($cari);
				}
			
}

?>