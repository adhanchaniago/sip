<?php

class Model_giro extends CI_Model{

	function view_giro(){
		$query = "SELECT * FROM tb_giro ORDER BY id desc";
		return $this->db->query($query);
	}
	function listgiro(){
		return $this->db->get('tb_giro');
	}

	function insert_giro(){
		//return $this->db->get('kategori');
		$no_giro			= $this->input->post('no_giro');
		$kode_giro			= $this->input->post('kode_giro');
		$tgl_giro 			= $this->input->post('tgl_giro');
		$tgl_cair 			= $this->input->post('tgl_cair');		
		$nominal 			= $this->input->post('nominal');		
		$kepada 			= $this->input->post('kepada');		
		$no_rek 			= $this->input->post('no_rek');		
		$bank 				= $this->input->post('bank');		
		
		$data = array(
			
			'kode_giro'		=> $kode_giro,
			'no_giro'		=> $no_giro,
			'tgl_giro'		=> $tgl_giro,
			'tgl_cair'		=> $tgl_cair,
			'nominal'		=> $nominal,
			'kepada'		=> $kepada,
			'no_rek'		=> $no_rek,
			'bank'			=> $bank,
			
		);
		$this->db->insert('tb_giro',$data);
		redirect('Giro/input_giro');
		
	}
	function get(){
		$no_giro = $this->uri->segment(3);
		
		return $this->db->get_where('tb_giro', array('no_giro' => $no_giro));
	}
	function update_giro(){
		
		$no_giro			= $this->input->post('no_giro');
		$tgl_giro 			= $this->input->post('tgl_giro');
		$tgl_cair 			= $this->input->post('tgl_cair');		
		$nominal 			= $this->input->post('nominal');		
		$kepada 			= $this->input->post('kepada');		
		$no_rek 			= $this->input->post('no_rek');		
		$bank 				= $this->input->post('bank');		
		
		$data = array(
			
			'tgl_giro'		=> $tgl_giro,
			'tgl_cair'		=> $tgl_cair,
			'nominal'		=> $nominal,
			'kepada'		=> $kepada,
			'no_rek'		=> $no_rek,
			'bank'			=> $bank,
			
		);
		$this->db->where('no_giro',$no_giro);
		$this->db->update('tb_giro',$data);
	}
	
	function delete_giro($no_giro){
		
		$this->db->delete('tb_giro', array ('no_giro' => $no_giro)); // Untuk mengeksekusi perintah delete data
	}

}




?>