<?php

class Model_gudang extends CI_Model{

	function view_gudang(){
		$query = "SELECT * FROM tb_gudang ORDER BY id_gudang ASC";
		return $this->db->query($query);
	}
	
	function view_k_barang(){
		$query = "SELECT * FROM tb_k_barang ORDER BY id_k_barang ASC";
		return $this->db->query($query);
	}
	
	function listkategori(){
			
			return $this->db->get('id_kategori');
	}
	function insert_gudang(){
		//return $this->db->get('kategori');
					$id_gudang 			= $this->input->post('id_gudang');
					$nama_gudang 		= $this->input->post('nama_gudang');
					$kontak_person 		= $this->input->post('kontak_person');		
					$alamat		 		= $this->input->post('alamat');		
					$no_telp	 		= $this->input->post('no_telp');		
					$jenis_gudang 		= $this->input->post('jenis_gudang');		
					

		$data = array(
					
					'id_gudang'			=> $id_gudang,
					'nama_gudang'		=> $nama_gudang,
					'kontak_person'		=> $kontak_person,
					'alamat'			=> $alamat,
					'no_telp'			=> $no_telp,
					'jenis_gudang'		=> $jenis_gudang
					
					
				);
				$this->db->insert('tb_gudang',$data);
				redirect('Gudang/input_gudang');
	}

	function get(){
		
		$id_gudang = $this->uri->segment(3);
		
		return $this->db->get_where('tb_gudang', array('id_gudang' => $id_gudang));
		
		}
	function update_gudang(){
		
					$id_gudang 			= $this->input->post('id_gudang');
					$nama_gudang 		= $this->input->post('nama_gudang');
					$kontak_person 		= $this->input->post('kontak_person');		
					$alamat		 		= $this->input->post('alamat');		
					$no_telp	 		= $this->input->post('no_telp');		
					$jenis_gudang 		= $this->input->post('jenis_gudang');		
					

		$data = array(
					
					'id_gudang'			=> $id_gudang,
					'nama_gudang'		=> $nama_gudang,
					'kontak_person'		=> $kontak_person,
					'alamat'			=> $alamat,
					'no_telp'			=> $no_telp,
					'jenis_gudang'		=> $jenis_gudang
					
					
				);
				
				$this->db->where('id_gudang',$id_gudang);
				$this->db->update('tb_gudang',$data);
		
		}

	function delete_kategori($id_kategori){
		
		$this->db->delete('tb_kategori', array ('id_kategori' => $id_kategori)); // Untuk mengeksekusi perintah delete data
		}

}




?>