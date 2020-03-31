<?php

class Model_akun extends CI_Model{

	function view_akun(){
		$query = "SELECT * FROM daftar_akun 
		INNER JOIN kategori_akun ON kategori_akun.kode_kategori = daftar_akun.kode_kategori
		ORDER BY daftar_akun.kode_akun DESC";
		return $this->db->query($query);
	}
	function view_subakun(){
		$query = "SELECT *,daftar_subakun.nama as nama_akun FROM daftar_subakun 
		INNER JOIN daftar_akun ON daftar_akun.kode_akun = daftar_subakun.kode_akun
		ORDER BY daftar_subakun.kode_akun DESC";
		return $this->db->query($query);
	}
	function listsatuan(){
		return $this->db->get('tb_satuan');
	}

	function insert_akun(){
		//return $this->db->get('kategori');
		$kode_akun			= $this->input->post('kode_akun');
		$kode_kategori		= $this->input->post('kode_kategori');
		$nama_akun 			= $this->input->post('nama_akun');
		$klasifikasi 		= $this->input->post('klasifikasi');	
		$status		 		= $this->input->post('status');	
		
		$data = array(

			'kode_akun'			=> $kode_akun,
			'kode_kategori'		=> $kode_kategori,
			'nama_akun'			=> $nama_akun,
			'klasifikasi'		=> $klasifikasi,
			'status'			=> $status

		);
		$this->db->insert('daftar_akun',$data);
		redirect('Daftar_akun/input_akun');
	}
	function get(){
		$kode_akun = $this->uri->segment(3);
		
		return $this->db->get_where('daftar_akun', array('kode_akun' => $kode_akun));
	}
	function getNomorterakhir(){
		$query = "SELECT kode_akun FROM daftar_akun ORDER BY kode_akun DESC LIMIT 1";
		return $this->db->query($query);
	}
	function update_akun(){
		
		$kode_akun			= $this->input->post('kode_akun');
		$kode_kategori		= $this->input->post('kode_kategori');
		$nama_akun 			= $this->input->post('nama_akun');
		$klasifikasi 		= $this->input->post('klasifikasi');	
		$status		 		= $this->input->post('status');	
		
		$data = array(

			'kode_kategori'		=> $kode_kategori,
			'nama_akun'			=> $nama_akun,
			'klasifikasi'		=> $klasifikasi,
			'status'			=> $status

		);
		$this->db->where('kode_akun',$kode_akun);
		$this->db->update('daftar_akun',$data);
	}
	function delete_akun($kode_akun){
		
		$this->db->delete('daftar_akun', array ('kode_akun' => $kode_akun)); // Untuk mengeksekusi perintah delete data
	}

}




?>