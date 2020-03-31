<?php

class Model_mata_uang extends CI_Model{

	function view_mata_uang(){
		$query = "SELECT * FROM tb_mata_uang";
		return $this->db->query($query);
	}
	function listsatuan(){
			return $this->db->get('tb_satuan');
	}

	function insert_mata_uang(){
		//return $this->db->get('kategori');
					$kode_mata_uang		= $this->input->post('kode_mata_uang');	
					$nama_mata_uang		= $this->input->post('nama_mata_uang');	
					$simbol				= $this->input->post('simbol');	
					$kurs_tukar			= $this->input->post('kurs_tukar');	
					$per_tanggal		= $this->input->post('per_tanggal');	
		$mata = $this->db->get_where('tb_mata_uang',array('kode_mu'=>$kode_mata_uang))->row_array();
		if($mata['kode_mu'] == $kode_mata_uang){
		$this->session->set_flashdata("message","<script> alert('Oops.. ID Satuan Sudah Ada')</script>");
		redirect('Mata_uang/input_mata_uang');
		}else{
		$data = array(
					
					'kode_mu'			=> $kode_mata_uang,
					'nama_mu'			=> $nama_mata_uang,
					'simbol'			=> $simbol,
					'kurs_tukar'		=> $kurs_tukar,
					'per_tanggal'		=> $per_tanggal
					
				);
				$this->db->insert('tb_mata_uang',$data);
				redirect('Mata_uang/input_mata_uang');
		}
	}
	function get(){
		$kode_mata_uang = $this->uri->segment(3);
		
		return $this->db->get_where('tb_mata_uang', array('kode_mu' => $kode_mata_uang));
		}
	function update_mata_uang(){
		
					$kode_mata_uang		= $this->input->post('kode_mata_uang');	
					$nama_mata_uang		= $this->input->post('nama_mata_uang');	
					$simbol				= $this->input->post('simbol');	
					$kurs_tukar			= $this->input->post('kurs_tukar');	
					$per_tanggal		= $this->input->post('per_tanggal');	
		
			$data = array(
					
					'nama_mu'			=> $nama_mata_uang,
					'simbol'			=> $simbol,
					'kurs_tukar'		=> $kurs_tukar,
					'per_tanggal'		=> $per_tanggal
					
				);
				$this->db->where('kode_mu',$kode_mata_uang);
				$this->db->update('tb_mata_uang',$data);
	}
	function delete_mata_uang($kode_mata_uang){
		
		$this->db->delete('tb_mata_uang', array ('kode_mu' => $kode_mata_uang)); // Untuk mengeksekusi perintah delete data
		}

}




?>