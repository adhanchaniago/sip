<?php

class Model_profile extends CI_Model{

	function view_profile(){
		$query = "SELECT * FROM tb_perusahaan";
		return $this->db->query($query);
	}
	
	function view_k_barang(){
		$query = "SELECT * FROM tb_k_barang ORDER BY id_k_barang ASC";
		return $this->db->query($query);
	}
	
	function listkategori(){
		
		return $this->db->get('id_kategori');
	}
	function insert_profile(){
		//return $this->db->get('kategori');
		$no_npwp 			= $this->input->post('no_npwp');
		$nama		 		= $this->input->post('nama');
		$alamat		 		= $this->input->post('alamat');		
		$no_telp	 		= $this->input->post('no_telp');		
		$kode_pos	 		= $this->input->post('kode_pos');		
		$no_faktur	 		= $this->input->post('no_faktur');		
		$no_faktur_akhir	= $this->input->post('no_faktur_akhir');		
		

		$data = array(
			
			'no_npwp'			=> $no_npwp,
			'nama'		=> $nama,
			'alamat'		=> $alamat,
			'no_telp'			=> $no_telp,
			'kode_pos'			=> $kode_pos,
			'no_faktur'		=> $no_faktur,
			'no_faktur_akhir'		=> $no_faktur_akhir,
			
			
		);
		$this->db->insert('tb_perusahaan',$data);
		redirect('Profile/input_profile');
	}

	function get(){
		
		$no_npwp = $this->uri->segment(3);
		
		return $this->db->get_where('tb_perusahaan', array('no_npwp' => $no_npwp));
		
	}
	function update_profile(){
		$no = $this->uri->segment(3);
		
		$no_npwp 			= $this->input->post('no_npwp');
		$nama		 		= $this->input->post('nama');
		$alamat		 		= $this->input->post('alamat');		
		$no_telp	 		= $this->input->post('no_telp');		
		$kode_pos	 		= $this->input->post('kode_pos');		
		$no_faktur	 		= $this->input->post('no_faktur');		
		$no_faktur_akhir	= $this->input->post('no_faktur_akhir');		
		

		$data = array(
			
			'no_npwp'			=> $no_npwp,
			'nama'		=> $nama,
			'alamat'		=> $alamat,
			'no_telp'			=> $no_telp,
			'kode_pos'			=> $kode_pos,
			'no_faktur'		=> $no_faktur,
			'no_faktur_akhir'		=> $no_faktur_akhir,
			
			
		);
		
		$this->db->where('no_npwp',$no);
		$this->db->update('tb_perusahaan',$data);
		
	}

	function delete_kategori($id_kategori){
		
		$this->db->delete('tb_kategori', array ('id_kategori' => $id_kategori)); // Untuk mengeksekusi perintah delete data
	}

}




?>