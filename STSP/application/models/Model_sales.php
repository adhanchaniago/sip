<?php

class Model_sales extends CI_Model{

	
	function view_sales(){

		$query = "SELECT * FROM tb_sales where target_penjualan >= 0 ORDER BY id_sales ASC";
		return $this->db->query($query);

	}
	
	function listkategori(){
		return $this->db->get('id_kategori');
	}
	function input_sales(){
		//return $this->db->get('kategori');
		$id_karyawan 		= $this->input->post('id_karyawan');
		$kode_sales 		= $this->input->post('kode_sales');
		$tgl_join 			= $this->input->post('tgl_join');
		$nama_karyawan 		= $this->input->post('nama_karyawan');	
		$no_hp	 			= $this->input->post('no_hp');	
		$target_penjualan	= $this->input->post('target_penjualan');			
		$omset_penjualan	= $this->input->post('omset_penjualan');			
		$status				= $this->input->post('status');			
		$alamat		 		= $this->input->post('alamat');			
		$keterangan		 	= $this->input->post('keterangan');			
		

		$data = array(
			
			'id_sales'			=> $id_karyawan,
			'kode_sales'		=> $kode_sales,
			'tgl_join'			=> $tgl_join,
			'nama_sales'		=> $nama_karyawan,
			'no_telp'			=> $no_hp,
			'target_penjualan'  => str_replace(".", "", $target_penjualan),
			'omset_penjualan'	=> str_replace(".", "", $omset_penjualan),
			'status'			=> $status,
			'alamat'			=> $alamat,
			'keterangan'		=> $keterangan
			
			
			
		);
		$this->db->insert('tb_sales',$data);
		redirect('Sales/view_sales');
	}
	
	function insert_sales(){
		//return $this->db->get('kategori');
		$id_sales 			= $this->input->post('id_sales');
		$kode_sales 		= $this->input->post('kode_sales');
		$tgl_join 			= $this->input->post('tgl_join');
		$nama_sales 		= $this->input->post('nama_sales');
		$alamat		 		= $this->input->post('alamat');		
		$kota		 		= $this->input->post('kota');		
		$no_telp	 		= $this->input->post('no_telp');		
		$email		 		= $this->input->post('email');		
		$status		 		= $this->input->post('status');		
		$keterangan		 	= $this->input->post('keterangan');		
		

		$data = array(
			
			'id_sales'			=> $id_sales,
			'kode_sales'		=> $kode_sales,
			'tgl_join'			=> $tgl_join,
			'nama_sales'		=> $nama_sales,
			'alamat'			=> $alamat,
			'kota'				=> $kota,
			'no_telp'			=> $no_telp,
			'email'				=> $email,
			'status'			=> $status,
			'keterangan'		=> $keterangan
			
			
			
		);
		$this->db->insert('tb_sales',$data);
		redirect('Sales/input_sales');
	}
	function get(){
		
		$id_sales = $this->uri->segment(3);
		return $this->db->get_where('tb_sales', array('id_sales' => $id_sales));
		
	}
	function reset_sales(){
		$query = "UPDATE tb_sales SET omset_penjualan = '0' ,total_komisi = '0'";
		return $this->db->query($query);
	}
	function get_cetak(){
		
		$id_sales = $this->uri->segment(3);
		return $this->db->get_where('tb_sales', array('id_sales' => $id_sales));
		
	}
	function get_cetak_seluruh(){
		$omset_penjualan = $this->uri->segment(3);
		return $this->db->get_where('tb_sales', array('omset_penjualan' => $omset_penjualan,'> target_penjualan'));
	}
	function update_sales(){
		
		$id_karyawan 		= $this->input->post('id_karyawan');
		$kode_sales 		= $this->input->post('kode_sales');
		$tgl_join 			= $this->input->post('tgl_join');
		$nama_karyawan 		= $this->input->post('nama_karyawan');	
		$no_hp	 			= $this->input->post('no_hp');	
		$target_penjualan	= $this->input->post('target_penjualan');			
		$omset_penjualan	= $this->input->post('omset_penjualan');			
		$status				= $this->input->post('status');			
		$alamat		 		= $this->input->post('alamat');			
		$keterangan		 	= $this->input->post('keterangan');			
		

		$data = array(
			
			'id_sales'			=> $id_karyawan,
			'kode_sales'		=> $kode_sales,
			'tgl_join'			=> $tgl_join,
			'nama_sales'		=> $nama_karyawan,
			'no_telp'			=> $no_hp,
			'target_penjualan'  => str_replace(".", "", $target_penjualan),
			'omset_penjualan'	=> str_replace(".", "", $omset_penjualan),
			'status'			=> $status,
			'alamat'			=> $alamat,
			'keterangan'		=> $keterangan
			
			
			
		);
		
		$this->db->where('id_sales',$id_karyawan);
		$this->db->update('tb_sales',$data);
		
	}

	function getNomorterakhir(){
		$bulan = gmdate("Y-m-d",time()+60*60*7);
		$query = "select max(kode_sales) as kode_sales from tb_sales where DATE_FORMAT(`tgl_join`,'%y')=DATE_FORMAT(NOW(),'%y')";
		return $this->db->query($query);
	}

}




?>