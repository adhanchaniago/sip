<?php

class Model_pajak extends CI_Model{

		function view_pajak(){
		
		$query1 = "SELECT * FROM tb_acp order by no_jual desc";
		$query= $this->db->query($query1);
		return $query->result_array();
		
		}
		function input_pajak(){
					$nojual 			= $this->input->post('nojual');
					$idpelanggan		= $this->input->post('idpelanggan');
					$noreff				= $this->input->post('noreff');
					$tgl				= $this->input->post('tgl');
					$acp	 			= $this->input->post('acp');
					if ($nojual==0){
						echo "eror";
					}else{
				$data = array(
					'no_jual'		=> $nojual,
					'id_pelanggan'	=> $idpelanggan,
					'no_reff'		=> $noreff,
					'tgl'			=> $tgl,
					'acp'			=> $acp
					
					);
			$query = $this->db->query("SELECT * FROM tb_acp WHERE no_jual = '$nojual'");
			$result = $query->result_array();
			$count = count($result);

			if (empty($count)) {
				
				$this->db->insert('tb_acp',$data);
				$this->db->query("UPDATE tb_penjualan SET acp='$acp' where no_jual='$nojual'");
			}elseif ($count == 1) {
		
				$this->db->where('no_jual', $data['no_jual']);
			   $this->db->update('tb_acp',$data);
			   $this->db->query("UPDATE tb_penjualan SET acp='$acp' where no_jual='$nojual'");
			   
			}
		}
		}
		
	
}
					

?>