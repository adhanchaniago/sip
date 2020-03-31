<?php

class Model_user extends CI_Model{
	
	
	function view_cash(){

		$query = "SELECT no_kas,tgl,kode_user,nominal,nominal1,sisa,kembali,user,tb_kas.keterangan,nama_pelanggan FROM tb_kas INNER JOIN tb_pelanggan ON tb_kas.kode_user=tb_pelanggan.id_pelanggan WHERE tb_kas.batal = 0 order by tb_kas.tanggal,jam asc";
		return $this->db->query($query);

	}
	function view_user(){

		$query = "SELECT * FROM user";
		return $this->db->query($query);

	}
	function view_belen(){
		$id = 2;
		$query = "SELECT customer.id,jual.no_jual,jual.tgl_buat,jual.total,trimadetail.no_jual as bayar,trima.tgl_buat as tgl,trimadetail.jumlah from jual 
		inner join customer on jual.id_customer=customer.id  
		inner join trimadetail on jual.no_jual=trimadetail.no_jual
		inner join trima on trimadetail.no_trima=trima.no_trima WHERE customer.id = '$id'";
		return $this->db->query($query);

	}
	function view_pelanggan(){
		$query = "SELECT * FROM tb_pelanggan";
		return $this->db->query($query);
		
	}
	function looping_cetak_deposit($id){
		$query = "SELECT * from tb_kas where tb_kas.no_kas = '$id'";
		return $this->db->query($query);
	}
	function cetak_a5($id){
		$query = "SELECT * from cetak_dp where no_kas = '$id'";
		return $this->db->query($query);
	}
	
	public function getData($rowno,$rowperpage,$search="") {

		$this->db->select('tb_kas.no_kas,tb_kas.tgl,tb_kas.kode_user,tb_pelanggan.nama_pelanggan,tb_kas.keterangan,tb_kas.nominal,tb_kas.nominal1,tb_kas.sisa,tb_kas.user');
		$this->db->from('tb_kas');
		$this->db->join('tb_pelanggan','tb_kas.kode_user = tb_pelanggan.id_pelanggan');

		if($search != ''){
			$this->db->like('nama_pelanggan', $search);
		}
		$this->db->limit($rowperpage, $rowno); 
		$query = $this->db->get();

		return $query->result_array();
	}

  // Select total records
	public function getrecordCount($search = '') {

		$this->db->select('count(*) as allcount');
		$this->db->from('tb_kas');

		if($search != ''){
			$this->db->like('nama_pelanggan', $search);
		}

		$query = $this->db->get();
		$result = $query->result_array();

		return $result[0]['allcount'];
	}
	function insert_user(){

		$config['upload_path'] 		= './upload/foto_user/';
		$config['allowed_types']	= 'gif|png|jpg|jpeg';
		$config['overwrite'] = TRUE; 

		$config['file_name']		= $this->input->post('kode_user');

		$this->load->library('upload',$config);
		$this->upload->do_upload('foto');
		$file = $this->upload->data();
		$kode_user 			= $this->input->post('kode_user');
		$nama_lengkap 		= $this->input->post('nama_lengkap');
		$username 			= $this->input->post('username');
		$password 			= $this->input->post('password');
		$level	 			= $this->input->post('level');
		$kata_mutiara		= $this->input->post('kata_mutiara');
		$ciptaan			= $this->input->post('ciptaan');
		$jenis_kelamin		= $this->input->post('jenis_kelamin');
		$barang = $this->db->get_where('user',array('kode_user'=>$kode_user))->row_array();
		$id = $barang['kode_user'];
		if($id == $kode_user){
			$this->session->set_flashdata("message","<script> alert('Oops.. Kode User Ada Yang Sama')</script>");
			redirect('user/view_user');
		}else{
			$data = array(
				'kode_user' 	=> $kode_user,
				'nama_lengkap' 	=> $nama_lengkap,
				'username' 		=> $username,
				'password' 		=> $password,
				'level' 		=> $level,
				'foto' 			=> $file['file_name'],
				'kata_mutiara'	=> $kata_mutiara,
				'ciptaan'		=> $ciptaan,
				'jk'			=> $jenis_kelamin,
			);

			$this->db->insert('user',$data);
		}
		$user = $this->db->get_where('menu',array('level'=>$username))->row_array();
		$u = $user['level'];
		if($username == $u){
			echo "GAGAL";
		}else{
			$data1 = array(
				'level' 	=> $username,
				'kode_user' => $kode_user,
			);
			$this->db->insert('menu',$data1);
		}
		redirect('user/view_user');



	}
	function getUser(){

		$kode_user = $this->uri->segment(3);
		return $this->db->get_where('user',array('kode_user'=>$kode_user));


	}
	function getUser1(){

		$username = $this->uri->segment(3);
		$query = "SELECT * FROM user INNER JOIN menu ON user.username = menu.level WHERE menu.level = '$username'";
		return $this->db->query($query);
		return $this->db->get_where('user',array('username'=>$username));


	}
	function getCash(){

		$no_kas = $this->uri->segment(3);
		$query = "SELECT no_kas,tgl,kode_user,nominal,nominal1,sisa,kembali,user,jenis_trans,tb_kas.keterangan,nama_pelanggan FROM tb_kas INNER JOIN tb_pelanggan ON tb_kas.kode_user=tb_pelanggan.id_pelanggan where tb_kas.no_kas = '$no_kas'";
		return $this->db->query($query);
		return $this->db->get_where('tb_kas',array('no_kas'=>$no_kas));


	}

	function update_user(){

		$config['upload_path'] 		= './upload/foto_user/';
		$config['allowed_types']	= 'gif|png|jpg|jpeg';
		$config['overwrite'] = TRUE; //overwrite user avatar
		$config['file_name']		= $this->input->post('kode_user');

		$kode_user		= $this->input->post('kode_user');
		$nama_lengkap	= $this->input->post('nama_lengkap');
		$username		= $this->input->post('username');
		$password		= $this->input->post('password');
		$level			= $this->input->post('level');
		$foto			= $this->input->post('foto');
		$foto			= $this->input->post('foto');
		$kata_mutiara		= $this->input->post('kata_mutiara');
		$ciptaan			= $this->input->post('ciptaan');
		$jenis_kelamin		= $this->input->post('jenis_kelamin');
		
		$this->load->library('upload',$config);

		if($this->upload->do_upload('foto')){
			$file = $this->upload->data();
			$data = array(

				'kode_user'			=>	$kode_user,
				'nama_lengkap'		=>	$nama_lengkap,
				'username'			=>	$username,
				'password'			=>	$password,
				'level'				=>	$level,
				'foto'				=>	$file['file_name'],
				'kata_mutiara'		=> $kata_mutiara,
				'ciptaan'			=> $ciptaan,
				'jk'				=> $jenis_kelamin,
			);

			$this->db->where('kode_user',$kode_user);
			$this->db->update('user',$data);
		$this->db->query("UPDATE menu SET level = '$username' WHERE kode_user = '$kode_user'");
		}else{
		
		}
				$user = $this->db->get_where('menu',array('level'=>$username))->row_array();
				$u = $user['level'];
				if($username == $u){
						echo "GAGAL";
				}else{
					$data1 = array(
							'level' 	=> $username,
					);
					$this->db->where('level',$username);
					$this->db->update('menu',$data1);
				}
	}
	function hak_akses(){
		$level 					= $this->input->post('level');
		$m_data			 		= $this->input->post('m_data');
		$k_barang		 		= $this->input->post('k_barang');
		$satuan			 		= $this->input->post('satuan');
		$barang			 		= $this->input->post('barang');
		$k_pelanggan	 		= $this->input->post('k_pelanggan');
		$pelanggan		 		= $this->input->post('pelanggan');
		$supplier		 		= $this->input->post('supplier');
		$sales			 		= $this->input->post('sales');
		$mata_uang		 		= $this->input->post('mata_uang');

		$d_barang		 		= $this->input->post('d_barang');
		$stok			 		= $this->input->post('stok');
		$price_list		 		= $this->input->post('price_list');
		$profit					= $this->input->post('profit');

		$transaksi		 		= $this->input->post('transaksi');
		$purchase_order 		= $this->input->post('purchase_order');
		$pembelian		 		= $this->input->post('pembelian');
		$pembayaran		 		= $this->input->post('pembayaran');
		$giro			 		= $this->input->post('giro');

		$transaksi2		 		= $this->input->post('transaksi2');
		$sales_order	 		= $this->input->post('sales_order');
		$surat_jalan	 		= $this->input->post('surat_jalan');
		$penjualan		 		= $this->input->post('penjualan');
		$penerimaan		 		= $this->input->post('penerimaan');
		$l_tanda_terima	 		= $this->input->post('l_tanda_terima');
		$barang_hadiah			= $this->input->post('barang_hadiah');
		$pembelian_hadiah		= $this->input->post('pembelian_hadiah');
		$pemberian_hadiah		= $this->input->post('pemberian_hadiah');

		$akuntansi		 		= $this->input->post('akuntansi');
		$kategori_akun	 		= $this->input->post('kategori_akun');
		$daftar_akun	 		= $this->input->post('daftar_akun');
		$daftar_subakun	 		= $this->input->post('daftar_subakun');
		$buku_besar		 		= $this->input->post('buku_besar');
		$jurnal_umum	 		= $this->input->post('jurnal_umum');

		$laporan		 		= $this->input->post('laporan');
		$l_saldo_supplier 		= $this->input->post('l_saldo_supplier');
		$l_saldo_pelanggan 		= $this->input->post('l_saldo_pelanggan');
		$lap_po			 		= $this->input->post('lap_po');
		$l_transaksi_pembelian	= $this->input->post('l_transaksi_pembelian');
		$lap_so					= $this->input->post('lap_so');
		$l_transaksi_penjualan	= $this->input->post('l_transaksi_penjualan');
		$lap_pajak				= $this->input->post('lap_pajak');
		$pajak_khusus			= $this->input->post('pajak_khusus');
		$lap_komisi				= $this->input->post('lap_komisi');

		$i_kategori_barang		= $this->input->post('i_kategori_barang');
		$e_kategori_barang		= $this->input->post('e_kategori_barang');
		$i_satuan				= $this->input->post('i_satuan');
		$e_satuan				= $this->input->post('e_satuan');
		$i_barang				= $this->input->post('i_barang');
		$e_barang				= $this->input->post('e_barang');
		$h_barang				= $this->input->post('h_barang');
		$i_pelanggan			= $this->input->post('i_pelanggan');
		$e_pelanggan			= $this->input->post('e_pelanggan');
		$h_pelanggan			= $this->input->post('h_pelanggan');
		$i_supplier				= $this->input->post('i_supplier');
		$e_supplier				= $this->input->post('e_supplier');
		$h_supplier				= $this->input->post('h_supplier');
		$i_sales				= $this->input->post('i_sales');
		$e_sales				= $this->input->post('e_sales');
		$cetak_sales			= $this->input->post('cetak_sales');
		$reset_sales			= $this->input->post('reset_sales');
		$i_mata_uang			= $this->input->post('i_mata_uang');
		$e_mata_uang			= $this->input->post('e_mata_uang');
		$h_mata_uang			= $this->input->post('h_mata_uang');

		$i_po					= $this->input->post('i_po');
		$e_po					= $this->input->post('e_po');
		$r_po					= $this->input->post('r_po');
		$i_pembelian			= $this->input->post('i_pembelian');
		$e_pembelian			= $this->input->post('e_pembelian');
		$r_pembelian			= $this->input->post('r_pembelian');
		$i_pembayaran			= $this->input->post('i_pembayaran');
		$i_giro					= $this->input->post('i_giro');
		$e_giro					= $this->input->post('e_giro');
		$h_giro					= $this->input->post('h_giro');

		$i_so					= $this->input->post('i_so');
		$r_so					= $this->input->post('r_so');
		$i_surat_jalan			= $this->input->post('i_surat_jalan');
		$r_surat_jalan			= $this->input->post('r_surat_jalan');
		$i_penjualan			= $this->input->post('i_penjualan');
		$r_penjualan			= $this->input->post('r_penjualan');
		$i_penerimaan			= $this->input->post('i_penerimaan');
		$i_barang_hadiah		= $this->input->post('i_barang_hadiah');
		$e_barang_hadiah		= $this->input->post('e_barang_hadiah');
		$i_pembelian_hadiah		= $this->input->post('i_pembelian_hadiah');
		$i_pemberian_hadiah		= $this->input->post('i_pemberian_hadiah');

		$i_kategori_akun		= $this->input->post('i_kategori_akun');
		$e_kategori_akun		= $this->input->post('e_kategori_akun');
		$h_kategori_akun		= $this->input->post('h_kategori_akun');
		$i_daftar_akun			= $this->input->post('i_daftar_akun');
		$e_daftar_akun			= $this->input->post('e_daftar_akun');
		$h_daftar_akun			= $this->input->post('h_daftar_akun');
		$i_daftar_subakun		= $this->input->post('i_daftar_subakun');
		$e_daftar_subakun		= $this->input->post('e_daftar_subakun');
		$h_daftar_subakun		= $this->input->post('h_daftar_subakun');

		$data = array(
			'level'					=> $level,
			'm_data'				=> $m_data,
			'k_barang'				=> $k_barang,
			'satuan'				=> $satuan,
			'barang'				=> $barang,
			'k_pelanggan'			=> $k_pelanggan,
			'pelanggan'				=> $pelanggan,
			'supplier'				=> $supplier,
			'sales'					=> $sales,
			'mata_uang'				=> $mata_uang,
			
			'd_barang'				=> $d_barang,
			'stok'					=> $stok,
			'price_list'			=> $price_list,
			'profit'				=> $profit,
			
			'transaksi'				=> $transaksi,
			'purchase_order'		=> $purchase_order,
			'pembelian'				=> $pembelian,
			'pembayaran'			=> $pembayaran,
			'giro'					=> $giro,
			
			'transaksi2'			=> $transaksi2,
			'sales_order'			=> $sales_order,
			'surat_jalan'			=> $surat_jalan,
			'penjualan'				=> $penjualan,
			'penerimaan'			=> $penerimaan,
			'l_tanda_terima'		=> $l_tanda_terima,
			'barang_hadiah'			=> $barang_hadiah,
			'pembelian_hadiah'		=> $pembelian_hadiah,
			'pemberian_hadiah'		=> $pemberian_hadiah,
			
			'akuntansi'				=> $akuntansi,
			'kategori_akun'			=> $kategori_akun,
			'daftar_akun'			=> $daftar_akun,
			'daftar_subakun'		=> $daftar_subakun,
			'buku_besar'			=> $buku_besar,
			'jurnal_umum'			=> $jurnal_umum,
			
			'laporan'				=> $laporan,
			'l_saldo_supplier'		=> $l_saldo_supplier,
			'l_saldo_pelanggan'		=> $l_saldo_pelanggan,
			'lap_po'				=> $lap_po,
			'l_transaksi_pembelian'	=> $l_transaksi_pembelian,
			'lap_so'				=> $lap_so,
			'l_transaksi_penjualan'	=> $l_transaksi_penjualan,
			'lap_pajak'				=> $lap_pajak,
			'pajak_khusus'			=> $pajak_khusus,
			'lap_komisi'			=> $lap_komisi,
			
			'i_kategori_barang'		=> $i_kategori_barang,
			'e_kategori_barang'		=> $e_kategori_barang,
			'i_satuan'				=> $i_satuan,
			'e_satuan'				=> $e_satuan,
			'i_barang'				=> $i_barang,
			'e_barang'				=> $e_barang,
			'h_barang'				=> $h_barang,
			'i_pelanggan'			=> $i_pelanggan,
			'e_pelanggan'			=> $e_pelanggan,
			'h_pelanggan'			=> $h_pelanggan,
			'i_supplier'			=> $i_supplier,
			'e_supplier'			=> $e_supplier,
			'h_supplier'			=> $h_supplier,
			'i_sales'				=> $i_sales,
			'e_sales'				=> $e_sales,
			'cetak_sales'			=> $cetak_sales,
			'reset_sales'			=> $reset_sales,
			'i_mata_uang'			=> $i_mata_uang,
			'e_mata_uang'			=> $e_mata_uang,
			'h_mata_uang'			=> $h_mata_uang,
			
			'i_po'					=> $i_po,
			'e_po'					=> $e_po,
			'r_po'					=> $r_po,
			'i_pembelian'			=> $i_pembelian,
			'e_pembelian'			=> $e_pembelian,
			'r_pembelian'			=> $r_pembelian,
			'i_pembayaran'			=> $i_pembayaran,
			'i_giro'				=> $i_giro,
			'e_giro'				=> $e_giro,
			'h_giro'				=> $h_giro,
			
			'i_so'					=> $i_so,
			'r_so'					=> $r_so,
			'i_surat_jalan'			=> $i_surat_jalan,
			'r_surat_jalan'			=> $r_surat_jalan,
			'i_penjualan'			=> $i_penjualan,
			'r_penjualan'			=> $r_penjualan,
			'i_penerimaan'			=> $i_penerimaan,
			'i_barang_hadiah'		=> $i_barang_hadiah,
			'e_barang_hadiah'		=> $e_barang_hadiah,
			'i_pembelian_hadiah'	=> $i_pembelian_hadiah,
			'i_pemberian_hadiah'	=> $i_pemberian_hadiah,
			
			'i_kategori_akun'		=> $i_kategori_akun,
			'e_kategori_akun'		=> $e_kategori_akun,
			'h_kategori_akun'		=> $h_kategori_akun,
			'i_daftar_akun'			=> $i_daftar_akun,
			'e_daftar_akun'			=> $e_daftar_akun,
			'h_daftar_akun'			=> $h_daftar_akun,
			'i_daftar_subakun'		=> $i_daftar_subakun,
			'e_daftar_subakun'		=> $e_daftar_subakun,
			'h_daftar_subakun'		=> $h_daftar_subakun

		);
		$this->db->where('level', $data['level']);
		$this->db->update('menu',$data);
		redirect('User/view_user');




	}
	function insert_cash(){
		$a = $this->Model_user->getNomorterakhir()->row_array();
                            //Mengambil Tahun di Sistem
		$tahun    = date('y');
		$id       = ('DM');
		$id1       = ('-');
		$c = array('','I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII');
		$bln		= $c[date('n')];
		$format   = $tahun.$id.$id1.$bln;
		$data['autonumber'] 	= buatkode($a['no_kas'],$format,4);
		$no_kas 	= $data['autonumber'];
		$tgl 		= $this->input->post('tgl');
		$tanggal 		= $this->input->post('tanggal');
		$bulan 		= $this->input->post('bulan');
		$jam 		= $this->input->post('jam');
		$kode_user 	= $this->input->post('kode_user');
		$nominal 	= $this->input->post('nominal');
		$nominal1 	= $this->input->post('nominal1');
		$user		= $this->session->userdata('username');
		$jenis_trans= $this->input->post('jenis_trans');
		$keterangan= $this->input->post('keterangan');

		$data = array(
			'no_kas'     => $no_kas,
			'jam' 		 => $jam,
			'tgl' 		 => $tgl,
			'tanggal'	 => $tanggal,
			'kode_user'  => $kode_user,
			'nominal'	 => str_replace(".", "", $nominal),
			'nominal1'	 => str_replace(".", "", $nominal1),
			'user'   	 => $user,
			'jenis_trans'=> $jenis_trans,
			'keterangan'=> $keterangan,

		);
		$nom =str_replace(".", "", $nominal) + str_replace(".", "", $nominal1);
		$this->db->insert('tb_kas',$data);
		$transaksi = array(

			'no_transaksi'			=> $no_kas,
			'tgl'					=> $tanggal,
			'bulan'					=> $bulan,
			'jam'					=> $jam,
			'id_pelanggan'			=> $kode_user,
			'total'					=> str_replace(".", "", $nominal) + str_replace(".", "", $nominal1),
			'cash'					=> str_replace(".", "", $nominal),
			'transfer'				=> str_replace(".", "", $nominal1),
			'grand_total'			=> str_replace(".", "", $nominal) + str_replace(".", "", $nominal1),
		);
		$insert_penjualan = $this->db->insert('transaksi_day',$transaksi);
		$this->db->query("UPDATE tb_pelanggan SET deposit = deposit + '$nom' WHERE id_pelanggan = '$kode_user'");
		redirect('user/cetak_struk/'.$no_kas);
	}
	function insert_cash1(){
		$b = $this->Model_user->getNomorterakhir1()->row_array();
                            //Mengambil Tahun di Sistem
		$tahun1    = date('y');
		$id1       = ('DK');
		$id11       = ('-');
		$c1 = array('','I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII');
		$bln1		= $c1[date('n')];
		$format1   = $tahun1.$id1.$id11.$bln1;
		$data['autonumber1'] 	= buatkode($b['no_kas'],$format1,4);
		$no_kas 	= $data['autonumber1'];
		$tgl 		= $this->input->post('tgl');
		$tanggal 	= $this->input->post('tanggal');
		$bulan 		= $this->input->post('bulan');
		$jam 		= $this->input->post('jam');
		$tot 		= $this->input->post('tot');
		$kode_user 	= $this->input->post('kode_user');
		$nominal 	= $this->input->post('nominal');
		$nominal1 	= $this->input->post('nominal1');
		$jenis_trans= $this->input->post('jenis_trans');
		$keterangan = $this->input->post('keterangan');
		$saldo1		= $this->input->post('saldo1');
		$user		= $this->session->userdata('username');
		if($tot == 0){
			$this->session->set_flashdata("message","<script> alert('Oops.. Sisa Deposit Tidak Ada')</script>");
			redirect('user/view_cash');
		}else{
			$data = array(
				'no_kas'     => $no_kas,
				'jam' 		 => $jam,
				'tgl' 		 => $tgl,
				'tanggal'	 => $tanggal,
				'kode_user'  => $kode_user,
				'nominal'	 => str_replace(".", "", $nominal),
				'nominal1'	 => str_replace(".", "", $nominal1),
				'jenis_trans'=> $jenis_trans,
				'keterangan' => $keterangan,
				'user'   	 => $user,

			);

			$nom =str_replace(".", "", $nominal) + str_replace(".", "", $nominal1);
			$total =str_replace(".", "", $nominal) + str_replace(".", "", $nominal1);
			$total1 =str_replace(".", "", $nominal) + str_replace(".", "", $nominal1);
			$this->db->insert('tb_kas',$data);
			$transaksi = array(

				'no_transaksi'			=> $no_kas,
				'tgl'					=> $tanggal,
				'bulan'					=> $bulan,
				'jam'					=> $jam,
				'id_pelanggan'			=> $kode_user,
				'total'					=> $total - $total1 * 2 ,
				'cash'					=> str_replace(".", "", $nominal) - str_replace(".", "", $nominal) * 2,
				'transfer'				=> str_replace(".", "", $nominal1) - str_replace(".", "", $nominal1) * 2,
				'grand_total'			=> $total - $total1 * 2,
			);
			$insert_penjualan = $this->db->insert('transaksi_day',$transaksi);
			$this->db->query("UPDATE tb_pelanggan SET deposit = deposit - '$nom' WHERE id_pelanggan = '$kode_user'");
		}
		redirect('user/cetak_struk/'.$no_kas);
	}
	function delete_deposit($no_kas){

		$this->db->delete('tb_kas', array ('no_kas' => $no_kas)); 

	}
	function looping_batal($id){
		$query = "SELECT * from tb_kas where tb_kas.no_kas = '$id'";
		return $this->db->query($query);
	}
	function update_cash(){

		$no_kas			= $this->input->post('no_kas');
		$kode_user		= $this->input->post('kode_user');
		$nominal		= $this->input->post('nominal');
		$keterangan		= $this->input->post('keterangan');
		$user		= $this->session->userdata('username');

		$data = array(

			'kode_user'	 =>	$kode_user,
			'nominal'	 => str_replace(".", "", $nominal),			
			'sisa'	 	 => str_replace(".", "", $nominal),	
			'keterangan'	 =>	$keterangan,		
			'user'   	 => $user,
		);

		$this->db->where('no_kas',$no_kas);
		$this->db->update('tb_kas',$data);
		$nom =str_replace(".", "", $nominal);
		$this->db->query("UPDATE tb_pelanggan SET deposit = '$nom' WHERE id_pelanggan = '$kode_user'");
	}
	function getNomorterakhir(){
		$bulan = gmdate("d-m-y",time()+60*60*7);
		$query = "select max(no_kas) as no_kas from tb_kas where jenis_trans='input' ";
		return $this->db->query($query);
	}
	function getNomorterakhir1(){
		$bulan = gmdate("d-m-y",time()+60*60*7);
		$query = "select max(no_kas) as no_kas from tb_kas where jenis_trans='cair'  ";
		return $this->db->query($query);

	}
	function delete_user($username){

		$this->db->delete('user', array ('username' => $username)); 
		$this->db->delete('menu', array ('level' => $username)); 

	}

}

?>