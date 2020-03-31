function input_barang(){
		//return $this->db->get('kategori');
		$id_barang 			= $this->input->post('id_barang');
		$nama_barang 		= $this->input->post('nama_barang');
		$tgl		 		= $this->input->post('tgl');
		$id_k_barang 		= $this->input->post('id_k_barang');
		$satuan_besar 		= $this->input->post('satuan_besar');		
		$jual 				= $this->input->post('jual');		
		$minimum	 		= $this->input->post('minimum');		
		$modal	 			= $this->input->post('modal');				
		$harga_jual	 		= $this->input->post('harga_jual');		
		$walk		 		= $this->input->post('walk');		
		$tk			 		= $this->input->post('tk');		
		$tb			 		= $this->input->post('tb');		
		$sls		 		= $this->input->post('sls');		
		$pricelist		 	= $this->input->post('pricelist');	
		$komisi		 		= $this->input->post('komisi');	

		$barang = $this->db->get_where('tb_barang',array('id_barang'=>$id_barang))->row_array();
		$id = $barang['id_barang'];

		$a = $pricelist * $harga_jual/100;
		$a1 = $pricelist - $a;
		$b = $pricelist * $walk/100;
		$b1 = $pricelist - $b;
		$c = $pricelist * $tk/100;
		$c1 = $pricelist - $c;
		$d = $pricelist * $tb/100;
		$d1 = $pricelist - $d;
		$e = $pricelist * $sls/100;
		$e1 = $pricelist - $e;

		if($pricelist > 0){

			if($id == $id_barang){
				$this->session->set_flashdata("message","<script> alert('Oops.. ID Barang Ada Yang Sama')</script>");
				redirect('Barang/input_barang');
			}elseif ($a1 <= $modal){
				$this->session->set_flashdata("message","<script> alert('Oops.. Harga Toko Kecil Kurang Dari Modal')</script>");
				redirect('Barang/input_barang');
			}elseif ($b1 <= $modal){
				$this->session->set_flashdata("message","<script> alert('Oops.. Harga Toko Besar Kurang Dari Modal')</script>");
				redirect('Barang/input_barang');
			}elseif ($c1 <= $modal){
				$this->session->set_flashdata("message","<script> alert('Oops.. Harga Sales Kurang Dari Modal')</script>");
				redirect('Barang/input_barang');
			}elseif ($d1 <= $modal){
				$this->session->set_flashdata("message","<script> alert('Oops.. Harga Agen Kurang Dari Modal')</script>");
				redirect('Barang/input_barang');
			}elseif ($e1 <= $modal){
				$this->session->set_flashdata("message","<script> alert('Oops.. Harga Partai Kurang Dari Modal')</script>");
				redirect('Barang/input_barang');
			}else{
				$data = array(
					
					'id_barang'			=> $id_barang,
					'nama_barang'		=> $nama_barang,
					'tgl'				=> $tgl,
					'id_k_barang'		=> $id_k_barang,
					'satuan_besar'		=> $satuan_besar,
					'jual'				=> $jual,
					'minimum'			=> $minimum,
					'modal'				=> str_replace(",", "", $modal),
					'pricelist'			=> str_replace(",", "", $pricelist),
					'harga_jual'		=> str_replace(",", "", $harga_jual),
					'walk'				=> str_replace(",", "", $walk),
					'tk'				=> str_replace(",", "", $tk),
					'tb'				=> str_replace(",", "", $tb),
					'sls'				=> str_replace(",", "", $sls),
					'komisi'			=> str_replace(",", "", $komisi)
					
					
				);
				$this->db->insert('tb_barang',$data);
			}
			redirect('Barang/input_barang');

		}elseif($id == $id_barang){
			$this->session->set_flashdata("message","<script> alert('Oops.. ID Barang Ada Yang Sama')</script>");
			redirect('Barang/input_barang');
		}elseif ($harga_jual <= $modal){
			$this->session->set_flashdata("message","<script> alert('Oops.. Harga Toko Kecil Kurang Dari Modal')</script>");
			redirect('Barang/input_barang');
		}elseif ($walk <= $modal){
			$this->session->set_flashdata("message","<script> alert('Oops.. Harga Toko Besar Kurang Dari Modal')</script>");
			redirect('Barang/input_barang');
		}elseif ($tk <= $modal){
			$this->session->set_flashdata("message","<script> alert('Oops.. Harga Sales Kurang Dari Modal')</script>");
			redirect('Barang/input_barang');
		}elseif ($tb <= $modal){
			$this->session->set_flashdata("message","<script> alert('Oops.. Harga Agen Kurang Dari Modal')</script>");
			redirect('Barang/input_barang');
		}elseif ($sls <= $modal){
			$this->session->set_flashdata("message","<script> alert('Oops.. Harga Partai Kurang Dari Modal')</script>");
			redirect('Barang/input_barang');
		}else{
			$data = array(

				'id_barang'			=> $id_barang,
				'nama_barang'		=> $nama_barang,
				'tgl'				=> $tgl,
				'id_k_barang'		=> $id_k_barang,
				'satuan_besar'		=> $satuan_besar,
				'jual'				=> $jual,
				'minimum'			=> $minimum,
				'modal'				=> str_replace(",", "", $modal),
				'pricelist'			=> str_replace(",", "", $pricelist),
				'harga_jual'		=> str_replace(",", "", $harga_jual),
				'walk'				=> str_replace(",", "", $walk),
				'tk'				=> str_replace(",", "", $tk),
				'tb'				=> str_replace(",", "", $tb),
				'sls'				=> str_replace(",", "", $sls),
				'komisi'			=> str_replace(",", "", $komisi)


			);
			$this->db->insert('tb_barang',$data);
		}
		redirect('Barang/input_barang');

	}