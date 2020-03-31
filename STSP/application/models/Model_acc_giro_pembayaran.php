<?php

class Model_acc_giro_pembayaran extends CI_Model{

	function view_acc(){
		
		$query1 = "SELECT * FROM tb_acc_girop WHERE acc = 1 order by tgl desc, jam desc ";
		$query= $this->db->query($query1);
		return $query->result_array();
		
	}

	function view_belum_acc(){
		
		$query1 = "SELECT * FROM tb_penerimaan WHERE giro > 0 AND acc = 0 order by no_bukti desc";
		$query= $this->db->query($query1);
		return $query->result_array();
		
	}
	
	function input_acc(){
		$nojual 			= $this->input->post('nojual');
		$idsupplier			= $this->input->post('idsupplier');
		$tgl				= $this->input->post('tgl');
		$jam				= $this->input->post('jam');
		$total	 			= $this->input->post('total');
		$acc	 			= $this->input->post('acc');
		if ($nojual==0){
			echo "eror";
		}else{
			$data = array(
				'no_jual'		=> $nojual,
				'id_supplier'	=> $idsupplier,
				'tgl'			=> $tgl,
				'jam'			=> $jam,
				'total'			=> str_replace(".", "", $total),
				'acc'			=> $acc

			);

			$query = $this->db->query("SELECT * FROM tb_acc_girop WHERE no_jual = '$nojual'");
			$result = $query->result_array();
			$count = count($result);

			if (empty($count)) {
				
				$this->db->insert('tb_acc_girop',$data);
				$this->db->query("UPDATE tb_penerimaan SET acc = '$acc' WHERE no_bukti = '$nojual'");
				
			}elseif ($count == 1) {

				$this->db->where('no_jual', $data['no_jual']);
				$this->db->update('tb_acc_girop',$data);
				$this->db->query("UPDATE tb_penerimaan SET acc = '$acc' WHERE no_bukti = '$nojual'");

			}
		}
	}

	
}


?>