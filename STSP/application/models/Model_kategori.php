<?php

class Model_kategori extends CI_Model{

	function view_kategori(){
		$query = "SELECT * FROM tb_kategori ORDER BY id_k_pelanggan DESC";
		return $this->db->query($query);

	}
	function listkategori(){		
			return $this->db->get('id_kategori');
	}

	function insert_kategori(){
		//return $this->db->get('kategori');
					$id_k_pelanggan 	= $this->input->post('id_k_pelanggan');
					$nama_kategori 		= $this->input->post('nama_kategori');
					$keterangan 		= $this->input->post('keterangan');		
					
		$barang = $this->db->get_where('tb_kategori',array('id_k_pelanggan'=>$id_k_pelanggan))->row_array();
		if($barang['id_k_pelanggan'] == $id_k_pelanggan){
			$this->session->set_flashdata("message","<script> alert('Oops.. ID Kategori Pelanggan Sudah Ada')</script>");
			redirect('Kategori/input_kategori');
		}else{
		$data = array(
					
					'id_k_pelanggan'	=> $id_k_pelanggan,
					'nama_kategori'		=> $nama_kategori,
					'keterangan'		=> $keterangan
					
					
				);
				$this->db->insert('tb_kategori',$data);
				redirect('Kategori/input_kategori');
		}
	}
	function get(){
		
		$id_k_pelanggan = $this->uri->segment(3);
		return $this->db->get_where('tb_kategori', array('id_k_pelanggan' => $id_k_pelanggan));
		
		}
	function update_kategori(){
		
			$id_k_pelanggan 		= $this->input->post('id_k_pelanggan');
			$nama_kategori			= $this->input->post('nama_kategori');
			$keterangan				= $this->input->post('keterangan');
			
		
			$data = array(
					
					'id_k_pelanggan'		=> $id_k_pelanggan,
					'nama_kategori'			=> $nama_kategori,
					'keterangan'			=> $keterangan
					
					
				);
				$this->db->where('id_k_pelanggan',$id_k_pelanggan);
				$this->db->update('tb_kategori',$data);
		
		}
	function delete_kategori($id_kategori){
		
		$this->db->delete('tb_kategori', array ('id_kategori' => $id_kategori)); // Untuk mengeksekusi perintah delete data
		}

}




?>