<?php

class Model_accps extends CI_Model{

		function view_acc(){
		
		$query1 = "SELECT * FROM tb_accps order by tgl desc, jam desc";
		$query= $this->db->query($query1);
		return $query->result_array();
		
		}
		function input_acc(){
					$nosample 			= $this->input->post('nosample');
					$idpelanggan		= $this->input->post('idpelanggan');
					$noroff				= $this->input->post('noroff');
					$tgl				= $this->input->post('tgl');
					$jam				= $this->input->post('jam');
					$total	 			= $this->input->post('total');
					$acc	 			= $this->input->post('acc');
					if ($nosample==0){
						echo "eror";
					}else{
				$data = array(
					'no_sample'		=> $nosample,
					'id_pelanggan'	=> $idpelanggan,
					'no_roff'		=> $noroff,
					'tgl'			=> $tgl,
					'jam'			=> $jam,
					'total'			=> str_replace(".", "", $total),
					'acc'			=> $acc
					
					);
				
			$query = $this->db->query("SELECT * FROM tb_accps WHERE no_sample = '$nosample'");
			$result = $query->result_array();
			$count = count($result);

			if (empty($count)) {
				
				$this->db->insert('tb_accps',$data);
				$this->db->query("UPDATE tb_penjualan_sample SET acc='$acc' where no_sample='$nosample'");
				
			}elseif ($count == 1) {
		
				$this->db->where('no_sample', $data['no_sample']);
			   $this->db->update('tb_accps',$data);
			   $this->db->query("UPDATE tb_penjualan_sample SET acc='$acc' where no_sample='$nosample'");
			   
			}
		}
		}
		
	
}
					

?>