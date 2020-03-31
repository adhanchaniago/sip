<?php

class Model_hadiah extends CI_Model{

	function view_hadiah(){
		$query = "SELECT * FROM tb_hadiah ORDER BY id_barang,nama_barang ASC";

		return $this->db->query($query);
	}
	function view_pembelian(){
		$query = "SELECT * from pembelian_hadiah ORDER BY no_beli desc";
		return $this->db->query($query);		
		}
	function looping_cetak_hadiah($id){
		$query = "SELECT * from tb_pemberian_hadiah where no_pemberian = '$id'";
		return $this->db->query($query);
		}
	function cetak_a5($id){
		$query = "SELECT * from cetak_hadiah where no_pemberian = '$id'";
		return $this->db->query($query);
	}
	public function getData($rowno,$rowperpage,$search="",$search1="") {
 
    $this->db->select('*');
    $this->db->from('pembelian_hadiah');

    if($search != ''){
      $this->db->like('nama_toko', $search);
    }
	if($search1 != ''){
      $this->db->like('no_telp', $search1);
    }
    $this->db->limit($rowperpage, $rowno); 
    $query = $this->db->get();
 
    return $query->result_array();
  }

  // Select total records
  public function getrecordCount($search = '',$search1 = '') {

    $this->db->select('count(*) as allcount');
    $this->db->from('pembelian_hadiah');
 
    if($search != ''){
      $this->db->like('nama_toko', $search);
    }
	
	if($search1 != ''){
      $this->db->like('no_telp', $search1);
    }

    $query = $this->db->get();
    $result = $query->result_array();
 
    return $result[0]['allcount'];
  }
	function view_pemberian(){
		$query = "SELECT tb_pemberian_hadiah.no_pemberian,tb_pemberian_hadiah.tgl_pemberian,tb_pemberian_hadiah.id_pelanggan,tb_pelanggan.nama_pelanggan,tb_pemberian_hadiah.total,tb_pemberian_hadiah.keterangan,tb_pemberian_hadiah.user FROM tb_pemberian_hadiah INNER JOIN tb_pelanggan ON tb_pemberian_hadiah.id_pelanggan = tb_pelanggan.id_pelanggan ORDER BY no_pemberian desc";
		return $this->db->query($query);		
		}
		function detail_pembelian($id){
		$query = "SELECT pembelian_hadiah.no_beli,pembelian_hadiah.total,
		pembelian_hadiah.cash,pembelian_hadiah.debet,pembelian_hadiah.bank1,pembelian_hadiah.transfer,pembelian_hadiah.bank2,
		pembelian_hadiah.giro,pembelian_hadiah.ket_giro,pembelian_hadiah_detail.id_barang,qtyb,disc,harga_beli,tb_hadiah.nama_barang FROM pembelian_hadiah INNER JOIN pembelian_hadiah_detail 
		ON pembelian_hadiah.no_beli = pembelian_hadiah_detail.no_beli INNER JOIN tb_hadiah ON pembelian_hadiah_detail.id_barang = tb_hadiah.id_barang  WHERE pembelian_hadiah.no_beli = '$id'"; //dhapus ,disc2
		return $this->db->query($query);
		}
		function detail_pemberian($id){
		$query = "SELECT tb_pemberian_hadiah.no_pemberian, tb_pemberian_hadiah.total, tb_detail_pemberian_hadiah.id_barang,tb_detail_pemberian_hadiah.qtyb,tb_detail_pemberian_hadiah.harga_jual,tb_hadiah.nama_barang FROM tb_pemberian_hadiah INNER JOIN tb_detail_pemberian_hadiah ON tb_pemberian_hadiah.no_pemberian = tb_detail_pemberian_hadiah.no_pemberian INNER JOIN tb_hadiah ON tb_detail_pemberian_hadiah.id_barang = tb_hadiah.id_barang WHERE tb_pemberian_hadiah.no_pemberian = '$id'"; //dhapus ,disc2
		return $this->db->query($query);
		}
		
		function get_cetak(){
				$no_pemberian = $this->uri->segment(3);
				$query2 = "SELECT tb_pemberian_hadiah.no_pemberian,tb_pemberian_hadiah.tgl_pemberian,tb_pemberian_hadiah.id_pelanggan,tb_pemberian_hadiah.cetak,tb_pelanggan.nama_pelanggan,tb_pemberian_hadiah.total,tb_pemberian_hadiah.keterangan,tb_pemberian_hadiah.user FROM tb_pemberian_hadiah INNER JOIN tb_pelanggan ON tb_pemberian_hadiah.id_pelanggan = tb_pelanggan.id_pelanggan WHERE tb_pemberian_hadiah.no_pemberian = '$no_pemberian'";
				return $this->db->query($query2);
				return $this->db->get_where('tb_pemberian_hadiah',array('no_pemberian'=>$no_pemberian));
		}
		function get_cetak1(){
				$no_beli = $this->uri->segment(3);
				$query2 = "SELECT * FROM pembelian_hadiah WHERE no_beli = '$no_beli'";
				return $this->db->query($query2);
				return $this->db->get_where('pembelian_hadiah',array('no_beli'=>$no_beli));
		}
	function getNomorterakhir(){
					$query = "SELECT * FROM pembelian_hadiah where MID(tgl,4,2)=MONTH(now()) ORDER BY no_beli DESC LIMIT 1";
					return $this->db->query($query);
					}
	function getNomorterakhir1(){
					$query = "SELECT * FROM tb_pemberian_hadiah where MID(tgl_pemberian,4,2)=MONTH(now()) ORDER BY no_pemberian DESC LIMIT 1";
					return $this->db->query($query);
					}
	function insert_pembelian(){
		$a = $this->Model_hadiah->getNomorterakhir()->row_array();
                            //Mengambil Tahun di Sistem
        $tahun    = date('y');
        $id       = ('BH');
        $id1       = ('-');
		$c = array('','I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII');
		$bln		= $c[date('n')];
        $format   = $tahun.$id.$id1.$bln;
		$data['autonumber'] = buatkode($a['no_beli'],$format,4);
		$no_beli		 = $data['autonumber'];
		$tgl			 = $this->input->post('tgl');
		$nama_toko 		 = $this->input->post('nama_toko');
		$no_telp		 = $this->input->post('no_telp');
		$keterangan		 = $this->input->post('keterangan');
		$cash		 	 = $this->input->post('cash');
		$debet		 	 = $this->input->post('debet');
		$bank1		 	 = $this->input->post('bank1');
		$transfer		 = $this->input->post('transfer');
		$bank2		 	 = $this->input->post('bank2');
		$giro		 	 = $this->input->post('giro');
		$ket_giro		 = $this->input->post('ket_giro');
		$total		 	 = $this->input->post('total');
		$user		 	 = $this->input->post('user');
		if($total==0){
					$this->session->set_flashdata("message","<script> alert('Oops.. Total Masih Kosong')</script>");
					redirect('Hadiah/input_pembelian');
		}else{
		$data = array(
					
					'no_beli'			=> $no_beli,
					'tgl'				=> $tgl,
					'nama_toko'			=> $nama_toko,
					'no_telp'			=> $no_telp,
					'keterangan'		=> $keterangan,
					'cash'				=> str_replace(",", "", $cash),
					'debet'				=> str_replace(",", "", $debet),
					'bank1'				=> $bank1,
					'transfer'			=> str_replace(",", "", $transfer),
					'bank2'				=> $bank2,
					'giro'				=> str_replace(",", "", $giro),
					'ket_giro'			=> $ket_giro,
					'total'				=> str_replace(",", "", $total),
					'user'				=> $this->session->userdata('username'),
					
					
				);
		$insert_penjualan = $this->db->insert('pembelian_hadiah',$data);
		}
		$user = $this->session->userdata('username');
        $data = $this->db->from('pembelian_hadiah_tmp')->like('user',$user)->get();   
		foreach ($data->result() as $d){
			
			$data_tmp = array(
			
				'no_beli'   	=> $no_beli,
				'id_barang'		=> $d->id_barang,
				'qtyb'			=> $d->qtyb,
				'harga_beli'	=> str_replace(".", "", $d->harga_beli),
				'disc'			=> $d->disc,
				
				
				
			
			);
			$this->db->insert('pembelian_hadiah_detail',$data_tmp);
			//if ($status_kirim == 1){
			//$this->db->query("INSERT INTO surat_jalan(no_jl,id_barang,qtyb,satuan_besar,sisa_kirim)values('$no_beli','$d->id_barang','$d->qtyb','$d->satuan_besar','$d->qtyb')");}
			$total=0; $hasil=0;$hasil2=0;$hasil3=0;$hasil4=0;$hasil5=0;$hasil6=0;$hasil7=0; 
			$subtotal = $d->harga_beli;
			$diskon =$d->harga_beli*$d->disc/100;
			$hasil =$subtotal-$diskon;
			//$hasil2 =$hasil*$d->disc1/100;
			//$hasil3 =$hasil-$hasil2;
			//$hasil4 =$hasil3*$d->disc2/100;
			//$hasil5 =$hasil3-$hasil4;
			//$hasil6 =$hasil5*$d->ppn/100;
			//$hasil7 =$hasil5+$hasil6;
			$this->db->query("UPDATE tb_hadiah SET stok = stok + '$d->qtyb', harga_jual = '$hasil' WHERE id_barang = '$d->id_barang'");
		}
		$query = "delete from pembelian_hadiah_tmp where user='$d->user'";
		$this->db->query($query);
		redirect('Hadiah/input_pembelian');
		
		}
		function insert_pembelian_cetak(){
		$a = $this->Model_hadiah->getNomorterakhir()->row_array();
                            //Mengambil Tahun di Sistem
        $tahun    = date('y');
        $id       = ('BH');
        $id1       = ('-');
		$c = array('','I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII');
		$bln		= $c[date('n')];
        $format   = $tahun.$id.$id1.$bln;
		$data['autonumber'] = buatkode($a['no_beli'],$format,4);
		$no_beli		 = $data['autonumber'];
		$tgl			 = $this->input->post('tgl');
		$nama_toko 		 = $this->input->post('nama_toko');
		$no_telp		 = $this->input->post('no_telp');
		$keterangan		 = $this->input->post('keterangan');
		$cash		 	 = $this->input->post('cash');
		$debet		 	 = $this->input->post('debet');
		$bank1		 	 = $this->input->post('bank1');
		$transfer		 = $this->input->post('transfer');
		$bank2		 	 = $this->input->post('bank2');
		$giro		 	 = $this->input->post('giro');
		$ket_giro		 = $this->input->post('ket_giro');
		$total		 	 = $this->input->post('total');
		$user		 	 = $this->input->post('user');
		if($total==0){
					$this->session->set_flashdata("message","<script> alert('Oops.. Total Masih Kosong')</script>");
					redirect('Hadiah/input_pembelian');
				}else{
		$data = array(
					
					'no_beli'			=> $no_beli,
					'tgl'				=> $tgl,
					'nama_toko'			=> $nama_toko,
					'no_telp'			=> $no_telp,
					'keterangan'		=> $keterangan,
					'cash'				=> str_replace(",", "", $cash),
					'debet'				=> str_replace(",", "", $debet),
					'bank1'				=> $bank1,
					'transfer'			=> str_replace(",", "", $transfer),
					'bank2'				=> $bank2,
					'giro'				=> str_replace(",", "", $giro),
					'ket_giro'			=> $ket_giro,
					'total'				=> str_replace(",", "", $total),
					'user'				=> $this->session->userdata('username'),
					
					
				);
		$insert_penjualan = $this->db->insert('pembelian_hadiah',$data);
				}
		$user = $this->session->userdata('username');
        $data = $this->db->from('pembelian_hadiah_tmp')->like('user',$user)->get();   
		foreach ($data->result() as $d){
			
			$data_tmp = array(
			
				'no_beli'   	=> $no_beli,
				'id_barang'		=> $d->id_barang,
				'qtyb'			=> $d->qtyb,
				'harga_beli'	=> str_replace(".", "", $d->harga_beli),
				'disc'			=> $d->disc,
				
				
				
			
			);
			$this->db->insert('pembelian_hadiah_detail',$data_tmp);
			//if ($status_kirim == 1){
			//$this->db->query("INSERT INTO surat_jalan(no_jl,id_barang,qtyb,satuan_besar,sisa_kirim)values('$no_beli','$d->id_barang','$d->qtyb','$d->satuan_besar','$d->qtyb')");}
			$total=0; $hasil=0;$hasil2=0;$hasil3=0;$hasil4=0;$hasil5=0;$hasil6=0;$hasil7=0; 
			$subtotal = $d->harga_beli;
			$diskon =$d->harga_beli*$d->disc/100;
			$hasil =$subtotal-$diskon;
			//$hasil2 =$hasil*$d->disc1/100;
			//$hasil3 =$hasil-$hasil2;
			//$hasil4 =$hasil3*$d->disc2/100;
			//$hasil5 =$hasil3-$hasil4;
			//$hasil6 =$hasil5*$d->ppn/100;
			//$hasil7 =$hasil5+$hasil6;
			$this->db->query("UPDATE tb_hadiah SET stok = stok + '$d->qtyb', harga_jual = '$hasil' WHERE id_barang = '$d->id_barang'");
		}
		$query = "delete from pembelian_hadiah_tmp where user='$d->user'";
		$this->db->query($query);
		redirect('Hadiah/cetak_struk_pembelian/'.$no_beli);
		
		}
		function insert_pemberian(){
		$a = $this->Model_hadiah->getNomorterakhir1()->row_array();
                            //Mengambil Tahun di Sistem
                            $tahun    = date('y');
                            $id       = ('KH');
                            $id1       = ('-');
							$c = array('','I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII');
							$bln		= $c[date('n')];
                            $format   = $tahun.$id.$id1.$bln;
			
		$data['autonumber'] 	= buatkode($a['no_pemberian'],$format,4);
		$no_pemberian	 = $data['autonumber'];
		$tgl_pemberian	 = $this->input->post('tgl_pemberian');
		$id_pelanggan 	 = $this->input->post('id_pelanggan');
		$keterangan		 = $this->input->post('keterangan');
		$user		 	 = $this->session->userdata('username');
		$query = $this->db->query("SELECT * FROM tmp_pemberian_hadiah WHERE user='$user'");
		$result = $query->result_array();
		$count = count($result);
		if (empty($count)) {	
			$this->session->set_flashdata("message","<script> alert('Oops.. Barang Hadiah Di Isi')</script>");
			redirect('Hadiah/input_penjualan');
		}else{
			$data = array(
						
						'no_pemberian'			=> $no_pemberian,
						'tgl_pemberian'			=> $tgl_pemberian,
						'id_pelanggan'			=> $id_pelanggan,
						'keterangan'			=> $keterangan,
						'user'					=> $this->session->userdata('username'),
						
						
					);
					
			$insert_penjualan = $this->db->insert('tb_pemberian_hadiah',$data);
		}
		$user = $this->session->userdata('username');
        $data = $this->db->from('tmp_pemberian_hadiah')->like('user',$user)->get();   
		foreach ($data->result() as $d){
			$subtotal = $d->qtyb * $d->harga_jual;
			$hasil = $hasil + $subtotal;
			$data_tmp = array(
			
				'no_pemberian'  => $no_pemberian,
				'id_barang'		=> $d->id_barang,
				'stok'			=> $d->stok,
				'qtyb'			=> $d->qtyb,
				'harga_jual'	=> str_replace(".", "", $d->harga_jual),
				'jam'			=> $d->jam,
				
				
				
			
			);
			$this->db->insert('tb_detail_pemberian_hadiah',$data_tmp);
			$this->db->query("UPDATE tb_pemberian_hadiah SET total = '$hasil' WHERE no_pemberian = '$no_pemberian'");
			$this->db->query("UPDATE tb_hadiah SET stok = stok - '$d->qtyb' WHERE id_barang = '$d->id_barang'");
			//if ($status_kirim == 1){
			//$this->db->query("INSERT INTO surat_jalan(no_jl,id_barang,qtyb,satuan_besar,sisa_kirim)values('$no_beli','$d->id_barang','$d->qtyb','$d->satuan_besar','$d->qtyb')");}
			
		}
		$query = "delete from tmp_pemberian_hadiah where user='$d->user'";
		$this->db->query($query);
		redirect('Hadiah/input_penjualan');
		}
		function insert_pemberian_cetak(){
		$a = $this->Model_hadiah->getNomorterakhir1()->row_array();
                            //Mengambil Tahun di Sistem
                            $tahun    = date('y');
                            $id       = ('KH');
                            $id1       = ('-');
							$c = array('','I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII');
							$bln		= $c[date('n')];
                            $format   = $tahun.$id.$id1.$bln;
			
		$data['autonumber'] 	= buatkode($a['no_pemberian'],$format,4);
		$no_pemberian	 = $data['autonumber'];
		$tgl_pemberian	 = $this->input->post('tgl_pemberian');
		$id_pelanggan 	 = $this->input->post('id_pelanggan');
		$keterangan		 = $this->input->post('keterangan');
		$user		 	 = $this->session->userdata('username');
		$query = $this->db->query("SELECT * FROM tmp_pemberian_hadiah WHERE user='$user'");
		$result = $query->result_array();
		$count = count($result);
		if (empty($count)) {	
			$this->session->set_flashdata("message","<script> alert('Oops.. Barang Hadiah Di Isi')</script>");
			redirect('Hadiah/input_penjualan');
		}else{	
		$data = array(
					
					'no_pemberian'			=> $no_pemberian,
					'tgl_pemberian'			=> $tgl_pemberian,
					'id_pelanggan'			=> $id_pelanggan,
					'keterangan'			=> $keterangan,
					'user'					=> $this->session->userdata('username'),
					
					
				);
		$insert_penjualan = $this->db->insert('tb_pemberian_hadiah',$data);
		}
		$user = $this->session->userdata('username');
        $data = $this->db->from('tmp_pemberian_hadiah')->like('user',$user)->get();   
		foreach ($data->result() as $d){
			$subtotal = $d->qtyb * $d->harga_jual;
			$hasil = $hasil + $subtotal;
			$data_tmp = array(
				'no_pemberian'  => $no_pemberian,
				'id_barang'		=> $d->id_barang,
				'stok'			=> $d->stok,
				'qtyb'			=> $d->qtyb,
				'harga_jual'	=> str_replace(".", "", $d->harga_jual),
				'jam'			=> $d->jam,
			);
			$this->db->insert('tb_detail_pemberian_hadiah',$data_tmp);
			$this->db->query("UPDATE tb_pemberian_hadiah SET total = '$hasil' WHERE no_pemberian = '$no_pemberian'");
			$this->db->query("UPDATE tb_hadiah SET stok = stok - '$d->qtyb' WHERE id_barang = '$d->id_barang'");
			//if ($status_kirim == 1){
			//$this->db->query("INSERT INTO surat_jalan(no_jl,id_barang,qtyb,satuan_besar,sisa_kirim)values('$no_beli','$d->id_barang','$d->qtyb','$d->satuan_besar','$d->qtyb')");}
			
		}
		$query = "delete from tmp_pemberian_hadiah where user='$d->user'";
		$this->db->query($query);
		
		redirect('Hadiah/cetak_struk/'.$no_pemberian);
		
		}
	function insert_hadiah(){
		//return $this->db->get('kategori');
					$id_barang 			= $this->input->post('id_barang');
					$nama_barang 		= $this->input->post('nama_barang');
					$tgl		 		= $this->input->post('tgl');		
					$harga_jual	 		= $this->input->post('harga_jual');		
					$keterangan	 		= $this->input->post('keterangan');

		$data = $this->db->from('tb_hadiah')->like('id_barang',$id_barang)->get();   
		foreach ($data->result() as $d){
		}		
		if($id_barang == $d->id_barang){
			$this->session->set_flashdata("message","<script> alert('Oops.. Barang Hadiah Di Isi')</script>");
			redirect('Hadiah/view_hadiah');
		}else{
		$data = array(
					
					'id_barang'			=> $id_barang,
					'nama_barang'		=> $nama_barang,
					'tgl'				=> $tgl,
					'harga_jual'		=> str_replace(".", "", $harga_jual),
					'keterangan'		=> $keterangan,
					
				);
				$this->db->insert('tb_hadiah',$data);
				redirect('Hadiah/view_hadiah');	
			}
		}
		function update_hadiah(){
		//return $this->db->get('kategori');
					$id_barang 			= $this->input->post('id_barang');
					$nama_barang 		= $this->input->post('nama_barang');		
					$harga_jual	 		= $this->input->post('harga_jual');			
					$keterangan	 		= $this->input->post('keterangan');	
					
					$data = array(
					
					'id_barang'			=> $id_barang,
					'nama_barang'		=> $nama_barang,
					'harga_jual'		=> str_replace(".", "", $harga_jual),
					'keterangan'		=> $keterangan,
					
				);
				$this->db->where('id_barang',$id_barang);
				$this->db->update('tb_hadiah',$data);
				redirect('Hadiah/view_hadiah');					
		}
		
		function get2(){
		
		$id_barang = $this->uri->segment(3);
		
		return $this->db->get_where('tb_hadiah', array('id_barang' => $id_barang));
		
		}
		function input_pemberian_hadiah(){
					$idbarang 			= $this->input->post('idbarang');
					$stok				= $this->input->post('stok');
					$qtybes				= $this->input->post('qtybes');
					$modal	 		    = $this->input->post('modal');
					$jam		        = date('H:i:s');
					$user		 	    = $this->session->userdata('username');
					
				if($qtybes ==0){
					echo "";
				}else{
				$data = array(
					
					
					'id_barang'		=> $idbarang,
					'stok'			=> $stok,
					'qtyb'			=> $qtybes,
					'harga_jual'	=> str_replace(".", "", $modal),
					'jam'			=> $jam,
					'user'			=> $this->session->userdata('username'),
					
					
					
				);
			$qr = $this->db->query("SELECT * FROM tmp_pemberian_hadiah WHERE user='$user'");
			$rs = $qr->result_array();
			$ct = count($rs);
			if ($ct > 24) {
				echo '<script type=text/javascript> alert("You Have Successfully updated this Record!");</script>';
			}else{
			$query = $this->db->query("SELECT * FROM tmp_pemberian_hadiah WHERE user='$user' AND id_barang='$idbarang'");
			$result = $query->result_array();
			$count = count($result);
			
			if (empty($count)) {
				
				$this->db->insert('tmp_pemberian_hadiah',$data);
				
			}elseif ($count == 1) {
		
				$this->db->where('id_barang', $data['id_barang']) AND $this->db->where('user', $data['user']);
			   $this->db->update('tmp_pemberian_hadiah',$data);
			   
			   }
			}
	}
	}
		
		function input_pembelian_hadiah(){
					$idbarang 			= $this->input->post('idbarang');
					$qtybes				= $this->input->post('qtybes');
					$hargabeli 		    = $this->input->post('hargabeli');
					$disc 		        = $this->input->post('disc');
					$jam		        = date('H:i:s');
					$user		 	    = $this->session->userdata('username');
					
				if($qtybes ==0){
					echo "";
				}else{
				$data = array(
					
					
					'id_barang'		=> $idbarang,
					'qtyb'			=> $qtybes,
					'harga_beli'	=> str_replace(".", "", $hargabeli),
					'disc'			=> $disc,
					'jam'			=> $jam,
					'user'			=> $this->session->userdata('username'),
					
					
					
				);
			$qr = $this->db->query("SELECT * FROM pembelian_hadiah_tmp WHERE user='$user'");
			$rs = $qr->result_array();
			$ct = count($rs);
			if ($ct > 24) {
				echo '<script type=text/javascript> alert("You Have Successfully updated this Record!");</script>';
			}else{
			$query = $this->db->query("SELECT * FROM pembelian_hadiah_tmp WHERE user='$user' AND id_barang='$idbarang'");
			$result = $query->result_array();
			$count = count($result);
			
			if (empty($count)) {
				
				$this->db->insert('pembelian_hadiah_tmp',$data);
				
			}elseif ($count == 1) {
		
				$this->db->where('id_barang', $data['id_barang']) AND $this->db->where('user', $data['user']);
			   $this->db->update('pembelian_hadiah_tmp',$data);
			   
			   }
			}
	}
	}
	function view_pembelian_tmp(){
		$user = $this->session->userdata('username');
		$query = "SELECT pembelian_hadiah_tmp.id_barang,pembelian_hadiah_tmp.qtyb,harga_beli,disc,user,
		tb_hadiah.nama_barang FROM pembelian_hadiah_tmp 
		INNER JOIN tb_hadiah ON pembelian_hadiah_tmp.id_barang = tb_hadiah.id_barang where pembelian_hadiah_tmp.user='$user' 
		ORDER BY pembelian_hadiah_tmp.jam desc"; //dihapus disc2,
		$query1= $this->db->query($query);
		return $query1->result_array();
		}
	function view_pemberian_tmp(){
		$user = $this->session->userdata('username');
		$query = "SELECT tmp_pemberian_hadiah.id_barang,tmp_pemberian_hadiah.qtyb,tmp_pemberian_hadiah.harga_jual,user,jam,
		tb_hadiah.nama_barang FROM tmp_pemberian_hadiah 
		INNER JOIN tb_hadiah ON tmp_pemberian_hadiah.id_barang = tb_hadiah.id_barang where tmp_pemberian_hadiah.user='$user' 
		ORDER BY tmp_pemberian_hadiah.jam desc"; //dihapus disc2,
		$query1= $this->db->query($query);
		return $query1->result_array();
		}
	function delete($user,$id_barang)
    { 
	$barang = $this->db->get_where('pembelian_hadiah_tmp',array('id_barang'=>$id_barang))->row_array();
	$id_barang = $barang['id_barang'];
	$user = $this->session->userdata('username');
    $sql  = "DELETE FROM pembelian_hadiah_tmp WHERE user='$user' AND id_barang = '$id_barang'";
    return $this->db->query($sql,array($user,$id_barang));
}
function delete_pemberian($user,$id_barang)
    { 
	$barang = $this->db->get_where('tmp_pemberian_hadiah',array('id_barang'=>$id_barang))->row_array();
	$id_barang = $barang['id_barang'];
	$user = $this->session->userdata('username');
    $sql  = "DELETE FROM tmp_pemberian_hadiah WHERE user='$user' AND id_barang = '$id_barang'";
    return $this->db->query($sql,array($user,$id_barang));
}
function delete_barang($id_barang)
    {
		$penjualan = $this->db->get_where('tb_detail_pembelian',array('id_barang'=>$id_barang))->row_array();
		//$id_barang = $penjualan['id_barang'];
		if($penjualan['id_barang'] == $id_barang){
			echo "GAGAL";
		}elseif($penjualan['id_barang'] == 0){
			$this->db->where('id_barang',$id_barang);
			$this->db->delete('tb_barang');
			
		}
    }
}




?>