<?php

class Model_sub extends CI_Model{

	function view_sub(){
		$query = "SELECT * FROM daftar_subakun
		INNER JOIN daftar_akun ON daftar_akun.kode_akun = daftar_subakun.kode_akun
		ORDER BY daftar_subakun.kode_akun DESC";
		return $this->db->query($query);
	}
	function listsatuan(){
			return $this->db->get('tb_satuan');
	}

	function insert_sub(){
		//return $this->db->get('kategori');
					$kode_akun			= $this->input->post('kode_akun');
					$kode_subakun		= $this->input->post('kode_subakun');
					$nama				= $this->input->post('nama');
					$klasifikasi 		= $this->input->post('klasifikasi');	
					$status		 		= $this->input->post('status');	
		
		$data = array(
					
					'kode_akun'			=> $kode_akun,
					'kode_subakun'		=> $kode_subakun,
					'nama'				=> $nama,
					'klasifikasi'		=> $klasifikasi,
					'status'			=> $status
					
				);
				$this->db->insert('daftar_subakun',$data);
				redirect('Sub_akun/input_sub_akun');
	}
	function get(){
		$kode_subakun = $this->uri->segment(3);
		
		return $this->db->get_where('daftar_subakun', array('kode_subakun' => $kode_subakun));
		}
	function getNomorterakhir(){
		$query = "SELECT kode_akun FROM daftar_akun ORDER BY kode_akun DESC LIMIT 1";
		return $this->db->query($query);
	}
	function update_sub(){
		
					$kode_akun			= $this->input->post('kode_akun');
					$kode_subakun		= $this->input->post('kode_subakun');
					$nama				= $this->input->post('nama');
					$klasifikasi 		= $this->input->post('klasifikasi');	
					$status		 		= $this->input->post('status');	
		
		$data = array(
					
					'kode_akun'			=> $kode_akun,
					'kode_subakun'		=> $kode_subakun,
					'nama'				=> $nama,
					'klasifikasi'		=> $klasifikasi,
					'status'			=> $status
					
				);
				$this->db->where('kode_subakun',$kode_subakun);
				$this->db->update('daftar_subakun',$data);
	}
	function delete_akun($kode_subakun){
		
		$this->db->delete('daftar_subakun', array ('kode_subakun' => $kode_subakun)); // Untuk mengeksekusi perintah delete data
		}

}




?>