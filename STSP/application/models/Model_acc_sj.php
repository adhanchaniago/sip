<?php

class Model_acc_sj extends CI_Model{

	function view_acc(){
		
		$query1 = "SELECT no_sj,tb_accsj.id_pelanggan,tgl,tb_accsj.no_reff,jam,acc,tb_pelanggan.nama_pelanggan FROM tb_accsj INNER JOIN tb_pelanggan ON tb_accsj.id_pelanggan = tb_pelanggan.id_pelanggan WHERE acc = 1 order by tgl desc, jam desc";
		$query= $this->db->query($query1);
		return $query->result_array();
		
	}
	function view_tidak_acc(){
		
		$query1 = "SELECT * FROM tb_kirim INNER JOIN tb_pelanggan ON tb_kirim.id_pelanggan = tb_pelanggan.id_pelanggan WHERE tb_kirim.acc = 0 order by no_kirim desc";
		$query= $this->db->query($query1);
		return $query->result_array();
		
	}
	function input_acc(){
		$nosj 				= $this->input->post('nosj');
		$idpelanggan		= $this->input->post('idpelanggan');
		$tgl				= $this->input->post('tgl');
		$noreff				= $this->input->post('noreff');
		$jam				= $this->input->post('jam');
		$acc	 			= $this->input->post('acc');
		if ($nosj== 0){
			echo "eror";
		}else{
			$data = array(
				'no_sj'			=> $nosj,
				'id_pelanggan'	=> $idpelanggan,
				'no_reff'		=> $noreff,
				'tgl'			=> $tgl,
				'jam'			=> $jam,
				'acc'			=> $acc
				
			);
			
			$query = $this->db->query("SELECT * FROM tb_accsj WHERE no_sj = '$nosj'");
			$result = $query->result_array();
			$count = count($result);

			if (empty($count)) {
				
				$this->db->insert('tb_accsj',$data);
				$this->db->query("UPDATE tb_sj SET acc='$acc' where no_sj='$nosj'");
				$this->db->query("UPDATE tb_kirim SET acc='$acc' where no_kirim='$nosj'");
				
			}elseif ($count == 1) {
				
				$this->db->where('no_sj', $data['no_sj']);
				$this->db->update('tb_accsj',$data);
				$this->db->query("UPDATE tb_sj SET acc='$acc' where no_sj='$nosj'");
				$this->db->query("UPDATE tb_kirim SET acc='$acc' where no_kirim='$nosj'");
				
			}
		}
	}
	
	
}


?>