<?php

class Model_acc_so extends CI_Model{

		function view_acc(){
		
		$query1 = "SELECT * FROM tb_acc_so INNER JOIN tb_pelanggan ON tb_acc_so.id_pelanggan = tb_pelanggan.id_pelanggan WHERE acc = 1 order by no_so desc";
		$query= $this->db->query($query1);
		return $query->result_array();
		
		}
		function view_tidak_acc(){
		
		$query1 = "SELECT *,tb_penjualan.no_reff as no_roff FROM tb_penjualan INNER JOIN tb_pelanggan ON tb_penjualan.id_pelanggan = tb_pelanggan.id_pelanggan WHERE acc = 0  order by no_jual desc";
		$query= $this->db->query($query1);
		return $query->result_array();
		
		}
		function input_acc(){
					$nojual 			= $this->input->post('nojual');
					$idpelanggan		= $this->input->post('idpelanggan');
					$tgl				= $this->input->post('tgl');
					$noreff				= $this->input->post('noreff');
					$jam				= $this->input->post('jam');
					$acc	 			= $this->input->post('acc');
					if ($nojual== 0){
						echo "eror";
					}else{
				$data = array(
					'no_so'			=> $nojual,
					'id_pelanggan'	=> $idpelanggan,
					'no_roff'		=> $noreff,
					'tgl'			=> $tgl,
					'jam'			=> $jam,
					'acc'			=> $acc
					
					);
				
			$query = $this->db->query("SELECT * FROM tb_acc_so WHERE no_so = '$nojual'");
			$result = $query->result_array();
			$count = count($result);

			if (empty($count)) {
				
				$this->db->insert('tb_acc_so',$data);
				$this->db->query("UPDATE tb_penjualan SET acc='$acc' where no_jual='$nojual'");
				
			}elseif ($count == 1) {
		
				$this->db->where('no_so', $data['no_so']);
			   $this->db->update('tb_acc_so',$data);
			   $this->db->query("UPDATE tb_penjualan SET acc='$acc' where no_jual='$nojual'");
			   
			}
		}
		}
		
	
}
					

?>