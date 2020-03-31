<?php

class Model_accpembayaran extends CI_Model{

		function view_acc(){
		
		$query1 = "SELECT * FROM tb_accpembayaran WHERE acc = 1 order by tgl desc, jam desc ";
		$query= $this->db->query($query1);
		return $query->result_array();
		
		}
		function view_tidak_acc(){
		
		$query1 = "SELECT * FROM tb_pembelian WHERE sisa <= 0 AND acc = 0 order by no_beli desc";
		$query= $this->db->query($query1);
		return $query->result_array();
		
		}
		function input_acc(){
					$nobeli 			= $this->input->post('nobeli');
					$idsupplier			= $this->input->post('idsupplier');
					$noroff				= $this->input->post('noroff');
					$tgl				= $this->input->post('tgl');
					$jam				= $this->input->post('jam');
					$total	 			= $this->input->post('total');
					$acc	 			= $this->input->post('acc');
				$pembelian = $this->db->get_where('tb_pembelian',array('no_beli'=>$nobeli))->row_array();
				$nobel = $pembelian['no_beli'];
				if($nobeli != $nobel){
					echo "GAGAL";
				}else{
					$data = array(
					'no_beli'		=> $nobeli,
					'id_supplier'	=> $idsupplier,
					'no_roff'		=> $noroff,
					'tgl'			=> $tgl,
					'jam'			=> $jam,
					'total'			=> str_replace(".", "", $total),
					'acc'			=> $acc
					
					);
				
			$query = $this->db->query("SELECT * FROM tb_accpembayaran WHERE no_beli = '$nobeli'");
			$result = $query->result_array();
			$count = count($result);

			if (empty($count)) {
				
				$this->db->insert('tb_accpembayaran',$data);
				$this->db->query("UPDATE tb_pembelian SET acc='$acc' where no_beli='$nobeli'");
				
			}elseif ($count == 1) {
		
				$this->db->where('no_beli', $data['no_beli']);
			   $this->db->update('tb_accpembayaran',$data);
			   $this->db->query("UPDATE tb_pembelian SET acc='$acc' where no_beli='$nobeli'");
			   
			}
		}	
				
	}
		
	
}
					

?>