<?php

class Model_satuan extends CI_Model{

	function view_satuan(){
		$query = "SELECT * FROM tb_satuan ORDER BY id_satuan ASC";
		return $this->db->query($query);
	}
	function listsatuan(){
			return $this->db->get('tb_satuan');
	}

	function insert_satuan(){
		//return $this->db->get('kategori');
					$id_satuan			= $this->input->post('id_satuan');
					$nama_satuan 		= $this->input->post('nama_satuan');
					$keterangan 		= $this->input->post('keterangan');		
		$barang = $this->db->get_where('tb_satuan',array('id_satuan'=>$id_satuan))->row_array();
		if($barang['id_satuan'] == $id_satuan){
		$this->session->set_flashdata("message","<script> alert('Oops.. ID Satuan Sudah Ada')</script>");
		redirect('Satuan/input_satuan');
		}else{
		$data = array(
					
					'id_satuan	'		=> $id_satuan,
					'nama_satuan'		=> $nama_satuan,
					'keterangan'		=> $keterangan
					
				);
				$this->db->insert('tb_satuan',$data);
				redirect('Satuan/input_satuan');
		}
	}
	function get(){
		$id_satuan = $this->uri->segment(3);
		
		return $this->db->get_where('tb_satuan', array('id_satuan' => $id_satuan));
		}
	function update_satuan(){
		
			$id_satuan			= $this->input->post('id_satuan');
			$nama_satuan		= $this->input->post('nama_satuan');
			$keterangan			= $this->input->post('keterangan');
		
			$data = array(
					
					'id_satuan	'			=> $id_satuan,
					'nama_satuan'			=> $nama_satuan,
					'keterangan'			=> $keterangan
					
				);
				$this->db->where('id_satuan',$id_satuan);
				$this->db->update('tb_satuan',$data);
	}
	function delete_satuan($id_satuan){
		
		$this->db->delete('tb_satuan', array ('id_satuan' => $id_satuan)); // Untuk mengeksekusi perintah delete data
		}

}




?>