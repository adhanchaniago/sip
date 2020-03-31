<?php

class Model_komisi extends CI_Model{

	function view_komisi(){

		$query = "SELECT id_komisi,tb_komisi.id_sales,nama_sales,id_k_barang,id_k_pelanggan,komisi_rp FROM tb_komisi inner join tb_sales on tb_komisi.id_sales=tb_sales.id_sales ORDER BY id_komisi ASC";

		return $this->db->query($query);
	}
	
	function listkomisi(){
			return $this->db->get('tb_komisi');
	}
	function insert_komisi(){
		$a = $this->Model_komisi->getlastnumberm()->row_array();
                            $tahun    = date('y');
                            $id       = ('KM');
                            $id1       = ('-');
                            $format   = $tahun.$id.$id1;
					$data['akhir'] 		= buatkode($a['id_komisi'],$format,4);
					$id_komisi			= $data['akhir'];
					$id_sales	 		= $this->input->post('id_sales');
					$id_k_barang 		= $this->input->post('id_k_barang');
					$id_k_pelanggan		= $this->input->post('id_k_pelanggan');
					$komisi_rp 			= $this->input->post('komisi_rp');
					

		$data = array(
					
					'id_komisi'			=> $id_komisi,
					'id_sales'			=> $id_sales,
					'id_k_barang'		=> $id_k_barang,
					'id_k_pelanggan'	=> $id_k_pelanggan,
					'komisi_rp'			=> $komisi_rp
					
					
				);
				$this->db->insert('tb_komisi',$data);
				redirect('Komisi/input_komisi');
	}

	function get(){
		
		$id_komisi = $this->uri->segment(3);
		return $this->db->get_where('tb_komisi', array('id_komisi' => $id_komisi));
		
		}
	function update_komisi(){
		
			//return $this->db->get('kategori');
					$id_komisi			= $this->input->post('id_komisi');
					$id_sales	 		= $this->input->post('id_sales');
					$id_k_barang 		= $this->input->post('id_k_barang');
					$id_k_pelanggan		= $this->input->post('id_k_pelanggan');
					$komisi_rp 			= $this->input->post('komisi_rp');
					

		$data = array(
					
					'id_komisi'			=> $id_komisi,
					'id_sales'			=> $id_sales,
					'id_k_barang'		=> $id_k_barang,
					'id_k_pelanggan'	=> $id_k_pelanggan,
					'komisi_rp'			=> $komisi_rp
					
					
				);
				
				$this->db->where('id_komisi',$id_komisi);
				$this->db->update('tb_komisi',$data);
		
		}

	function delete_komisi($id_komisi){
		
		$this->db->delete('tb_komisi', array ('id_komisi' => $id_komisi)); // Untuk mengeksekusi perintah delete data
		}
		function getlastnumberm(){
			
		$query	= "SELECT * FROM tb_komisi ORDER BY id_komisi DESC LIMIT 1";
		return $this->db->query($query);
		
		}

}




?>