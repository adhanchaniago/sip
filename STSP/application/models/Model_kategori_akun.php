<?php

class Model_kategori_akun extends CI_Model{

	function view_kategori(){
		$query = "SELECT * FROM kategori_akun ORDER BY kode_kategori DESC";
		return $this->db->query($query);

	}
	function listkategori(){		
			return $this->db->get('id_kategori');
	}

	function insert_kategori(){
		//return $this->db->get('kategori');
		$a = $this->Model_kategori_akun->getNomorterakhir()->row_array();
                            //Mengambil Tahun di Sistem
			$tahun    = date('y');
			$id       = ('KA');
			$id1       = ('-');
			$c = array('','I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII');
			$bln		= $c[date('n')];
			$format   = $tahun.$id.$id1.$bln;
			$data['autonumber'] 	= buatkode($a['kode_kategori'],$format,4);
			$kode_kategori 		= $data['autonumber'];
			$nama_kategori 		= $this->input->post('nama_kategori');
			$keterangan 		= $this->input->post('keterangan');		
					
		
		$data = array(
					
					'kode_kategori'		=> $kode_kategori,
					'nama_kategori'		=> $nama_kategori,
					'keterangan'		=> $keterangan
					
					
				);
				$this->db->insert('kategori_akun',$data);
				redirect('Kategori_akun/input_kategori');
		
	}
	function get(){
		
		$kode_kategori = $this->uri->segment(3);
		return $this->db->get_where('kategori_akun', array('kode_kategori' => $kode_kategori));
		
		}
	function getNomorterakhir(){
		$query = "SELECT kode_kategori FROM kategori_akun ORDER BY kode_kategori DESC LIMIT 1";
		return $this->db->query($query);
	}
	function update_kategori(){
		
			$kode_kategori 			= $this->input->post('kode_kategori');
			$nama_kategori			= $this->input->post('nama_kategori');
			$keterangan				= $this->input->post('keterangan');
			
		
			$data = array(
					
					'nama_kategori'			=> $nama_kategori,
					'keterangan'			=> $keterangan
					
					
				);
				$this->db->where('kode_kategori',$kode_kategori);
				$this->db->update('kategori_akun',$data);
		
		}
	function delete_kategori($kode_kategori){
		
		$this->db->delete('kategori_akun', array ('kode_kategori' => $kode_kategori)); // Untuk mengeksekusi perintah delete data
		}

}




?>