<?php

class Model_acc_giro extends CI_Model{

	function view_acc_giro(){
		
		$query1 = "SELECT * FROM tb_acc_giro WHERE acc = 1 order by tgl desc, jam desc ";
		$query= $this->db->query($query1);
		return $query->result_array();
		
	}

	function view_belum_acc_giro(){
		
		$query1 = "SELECT * FROM tb_pembayaran WHERE giro > 0 AND acc = 0 order by no_bukti desc";
		$query= $this->db->query($query1);
		return $query->result_array();
		
	}
	
	function input_acc_giro(){
		$nojual 			= $this->input->post('nojual');
		$idpelanggan		= $this->input->post('idpelanggan');
		$tgl				= $this->input->post('tgl');
		$jam				= $this->input->post('jam');
		$total	 			= $this->input->post('total');
		$acc	 			= $this->input->post('acc');
		if ($nojual==0){
			echo "eror";
		}else{
			$data = array(
				'no_jual'		=> $nojual,
				'id_pelanggan'	=> $idpelanggan,
				'tgl'			=> $tgl,
				'jam'			=> $jam,
				'total'			=> str_replace(".", "", $total),
				'acc'			=> $acc

			);

			$query = $this->db->query("SELECT * FROM tb_acc_giro WHERE no_jual = '$nojual'");
			$result = $query->result_array();
			$count = count($result);

			if (empty($count)) {
				
				$this->db->insert('tb_acc_giro',$data);
				$query = $this->db->query("UPDATE tb_pembayaran SET acc = '$acc' WHERE no_bukti = '$nojual'");
				
			}elseif ($count == 1) {

				$this->db->where('no_jual', $data['no_jual']);
				$this->db->update('tb_acc_giro',$data);
				$query = $this->db->query("UPDATE tb_pembayaran SET acc = '$acc' WHERE no_bukti = '$nojual'");

			}
		}
	}

	
}


?>