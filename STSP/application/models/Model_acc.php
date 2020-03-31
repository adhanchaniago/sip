<?php

class Model_acc extends CI_Model{

	function view_acc(){
		
		$query1 = "SELECT * FROM tb_acc WHERE acc = 1 order by tgl desc, jam desc, menit desc, detik desc ";
		$query= $this->db->query($query1);
		return $query->result_array();
		
	}

	function view_belum_acc(){
		
		$query1 = "SELECT * FROM tb_penjualans WHERE acc = 0 AND sisa <= 0 order by no_jual desc";
		$query= $this->db->query($query1);
		return $query->result_array();
		
	}
	function input_acc(){
		$nojual 			= $this->input->post('nojual');
		$idpelanggan		= $this->input->post('idpelanggan');
		$noroff				= $this->input->post('noroff');
		$tgl				= $this->input->post('tgl');
		$jam				= $this->input->post('jam');
		$total	 			= $this->input->post('total');
		$total_komisi		= $this->input->post('total_komisi');
		$id_sales		    = $this->input->post('id_sales');
		$acc	 			= $this->input->post('acc');
		if ($nojual==0){
			echo "eror";
		}else{
			$data = array(
				'no_jual'		=> $nojual,
				'id_pelanggan'	=> $idpelanggan,
				'no_roff'		=> $noroff,
				'tgl'			=> $tgl,
				'jam'			=> $jam,
				'total_komisi'	=> $total_komisi,
				'total'			=> str_replace(".", "", $total),
				'id_sales'		=> $id_sales,
				'acc'			=> $acc
				
			);
			if ($acc == 1){
				$this->db->query("UPDATE lap_komisi SET status='1' where id_transaksi='$nojual'");
			}else{
				$this->db->query("UPDATE lap_komisi SET status='0' where id_transaksi='$nojual'");
			}
			if ($acc1 == 0){
				$this->db->query("UPDATE tb_sales SET total_komisi = total_komisi + '$total_komisi',omset_penjualan = omset_penjualan + '$total' WHERE id_sales = '$id_sales'");
			}else{
				$this->db->query("UPDATE tb_sales SET total_komisi = total_komisi - '$total_komisi',omset_penjualan = omset_penjualan - '$total' WHERE id_sales = '$id_sales'");
			}
			$query = $this->db->query("SELECT * FROM tb_acc WHERE no_jual = '$nojual'");
			$result = $query->result_array();
			$count = count($result);

			if (empty($count)) {
				
				$this->db->insert('tb_acc',$data);
				$this->db->query("UPDATE tb_penjualans SET acc='$acc' where no_jual='$nojual'");
			}elseif ($count == 1) {
				
				$this->db->where('no_jual', $data['no_jual']);
				$this->db->update('tb_acc',$data);
				$this->db->query("UPDATE tb_penjualans SET acc='$acc' where no_jual='$nojual'");
				
			}
		}
	}

	
}


?>