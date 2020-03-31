<?php 

class Model_laporan_pelanggan extends CI_Model{


	function view_pelanggan(){


		return $this->db->query("SELECT
			* FROM tb_pelanggan 
			");
	}	

	function view_barang(){

		$id_pelanggan		= $this->input->post('id_pelanggan');

		return $this->db->query("SELECT
			* FROM tb_detail_penjualan 
			INNER JOIN tb_barang ON tb_barang.id_barang = tb_detail_penjualan.id_barang
			GROUP BY tb_detail_penjualan.id_barang
			");
	}	

	function view_barang_detail(){

		$id_pelanggan		= $this->input->post('id_pelanggan');
		$id_barang			= $this->input->post('id_barang');

		return $this->db->query("SELECT
			*,tb_detail_penjualan.qtyb FROM tb_detail_penjualan 
			INNER JOIN tb_barang ON tb_barang.id_barang = tb_detail_penjualan.id_barang
			WHERE tb_detail_penjualan.id_pelanggan = '$id_pelanggan' AND tb_detail_penjualan.id_barang = '$id_barang'
			");
	}	



	function view_detail_pelanggan(){

		$id_pelanggan		= $this->input->post('id_pelanggan');
		$id_barang			= $this->input->post('id_barang');
		$dari				= $this->input->post('dari');
		$sampai				= $this->input->post('sampai');
		$tanggal			= $this->input->post('sampai');
		
		if($tanggal != ""){

			$tanggal = "AND tb_penjualan.tgl_invoice BETWEEN '".$dari."' AND '".$sampai."' ";
		}


		return $this->db->query("SELECT *,tb_penjualan.keterangan,tb_penjualan.no_reff
			FROM
			tb_detail_penjualan
			INNER JOIN tb_pelanggan ON tb_detail_penjualan.id_pelanggan = tb_pelanggan.id_pelanggan
			INNER JOIN tb_penjualan ON tb_detail_penjualan.no_jual = tb_penjualan.no_jual
			INNER JOIN tb_barang ON tb_barang.id_barang = tb_detail_penjualan.id_barang
			WHERE 
			tb_detail_penjualan.id_barang = '$id_barang'
			AND tb_penjualan.id_pelanggan = '$id_pelanggan'
			"
			.$tanggal
			."
			ORDER BY tgl_invoice DESC
			");
	}

	function view_detail_summary(){

		$id_pelanggan		= $this->input->post('id_pelanggan');
		$id_barang			= $this->input->post('id_barang');
		$dari				= $this->input->post('dari');
		$sampai				= $this->input->post('sampai');
		$tanggal			= $this->input->post('sampai');
		
		if($tanggal != ""){

			$tanggal = "AND tb_penjualan.tgl_invoice BETWEEN '".$dari."' AND '".$sampai."' ";
		}

		return $this->db->query("SELECT *,tb_penjualan.keterangan,tb_penjualan.no_reff
			FROM
			tb_penjualan
			INNER JOIN tb_pelanggan ON tb_penjualan.id_pelanggan = tb_pelanggan.id_pelanggan
			AND tb_penjualan.id_pelanggan = '$id_pelanggan'
			"
			.$tanggal
			."
			ORDER BY tgl_invoice DESC
			");
	}

}