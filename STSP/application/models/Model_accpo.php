<?php

class Model_accpo extends CI_Model{

	function view_acc(){
		
		$query1 = "SELECT * FROM tb_acc_po 
		INNER JOIN tb_supplier ON tb_acc_po.id_supplier = tb_supplier.id_supplier WHERE acc = 1 order by tgl desc, jam desc";
		$query= $this->db->query($query1);
		return $query->result_array();
		
	}

	function view_belum_acc(){
		
		$query1 = "SELECT *,tb_pembelianpo.no_reff as no_reff FROM tb_pembelianpo
		INNER JOIN tb_supplier ON tb_supplier.id_supplier = tb_pembelianpo.id_supplier WHERE acc = 0 order by no_beli desc ";
		$query= $this->db->query($query1);
		return $query->result_array();
		
	}

	function input_acc(){
		$nopo 				= $this->input->post('no_beli');
		$noreff				= $this->input->post('noreff');
		$idsupplier			= $this->input->post('idsupplier');
		$tgl				= $this->input->post('tgl');
		$jam				= $this->input->post('jam');
		$acc	 			= $this->input->post('acc');
		if ($nopo== 0){
			echo "eror";
		}else{
			$data = array(
				'no_po'			=> $nopo,
				'no_roff'		=> $noreff,
				'id_supplier'	=> $idsupplier,
				'tgl'			=> $tgl,
				'jam'			=> $jam,
				'acc'			=> $acc

			);

			$query = $this->db->query("SELECT * FROM tb_acc_po WHERE no_po = '$nopo'");
			$result = $query->result_array();
			$count = count($result);

			if (empty($count)) {
				
				$this->db->insert('tb_acc_po',$data);
				$this->db->query("UPDATE tb_pembelianpo SET acc='$acc' where no_beli='$nopo'");
				
			}elseif ($count == 1) {

				$this->db->where('no_po', $data['no_po']);
				$this->db->update('tb_acc_po',$data);
				$this->db->query("UPDATE tb_pembelianpo SET acc='$acc' where no_beli='$nopo'");

			}
		}
	}

	
}


?>