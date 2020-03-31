<?php

class Model_barang extends CI_Model{
	var $table = 'tb_barang'; //nama tabel dari database
    var $column_order = array(null, 'id_barang','nama_barang','stok','satuan_besar','modal_t','modal','pricelist','harga_jual','walk','tk','tb','sls','agn','id_k_barang','jual','minimum','tgl'); //field yang ada di table user
    var $column_search = array('id_barang','nama_barang','stok'); //field yang diizin untuk pencarian 
    var $order = array('stok' => 'desc'); 

    public function __construct()
    {
    	parent::__construct();
    	$this->load->database();
    }
    private function _get_datatables_query()
    {

    	$this->db->from($this->table);

    	$i = 0;

        foreach ($this->column_search as $item) // looping awal
        {
            if($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {

                if($i===0) // looping awal
                {
                	$this->db->group_start(); 
                	$this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                	$this->db->or_like($item, $_POST['search']['value']);
                }

                if(count($this->column_search) - 1 == $i) 
                	$this->db->group_end(); 
            }
            $i++;
        }

        if(isset($_POST['order'])) 
        {
        	$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
        	$order = $this->order;
        	$this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
    	$this->_get_datatables_query();
    	if($_POST['length'] != -1)
    		$this->db->limit($_POST['length'], $_POST['start']);
    	$query = $this->db->get();
    	return $query->result();
    }

    function count_filtered()
    {
    	$this->_get_datatables_query();
    	$query = $this->db->get();
    	return $query->num_rows();
    }

    public function count_all()
    {
    	$this->db->from($this->table);
    	return $this->db->count_all_results();
    }
    function view_barang(){
    	$query = "SELECT * FROM tb_barang ORDER BY stok asc";

    	return $this->db->query($query);
    }

    function brg() {

    	$hasil=$this->db->query("SELECT * FROM tb_barang");
    	return $hasil->result();
    }
    function view_k_barang(){
    	$query = "SELECT * FROM tb_k_barang ORDER BY id_k_barang ASC";

    	return $this->db->query($query);
    }
    function listkategori(){
    	return $this->db->get('id_kategori');
    }
    public function upload_file($filename){  
	$this->load->library('upload'); // Load librari upload      
	$config['upload_path'] = './excel/';   
	$config['allowed_types'] = 'xlsx';   
	$config['max_size']  = '2048';   
	$config['overwrite'] = true;   
	$config['file_name'] = $filename;     
	$this->upload->initialize($config); // Load konfigurasi uploadnya
    if($this->upload->do_upload('file')){ // Lakukan upload dan Cek jika proses upload berhasil      // Jika berhasil :  
    	$return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');     
    	return $return;    
	}else{      // Jika gagal :      
		$return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());  
		return $return;  
	}  
	}    // Buat sebuah fungsi untuk melakukan insert lebih dari 1 data  
	public function insert_multiple($data){   
		$this->db->insert_batch('tb_barang', $data); 
	}
	public function update_multiple($data,$id_barang){   
		$this->db->where('id_barang',$id_barang); 
		$this->db->update_batch('tb_barang', $data,'id_barang'); 
	}
	function insert_k_barang(){
		//return $this->db->get('kategori');
		$id_k_barang 		= $this->input->post('id_k_barang');
		$nama_k_barang 		= $this->input->post('nama_k_barang');
		$keterangan 		= $this->input->post('keterangan');		

		$barang = $this->db->get_where('tb_k_barang',array('id_k_barang'=>$id_k_barang))->row_array();
		if($barang['id_k_barang'] == $id_k_barang){
			$this->session->set_flashdata("message","<script> alert('Oops.. ID Kategori Barang Sudah Ada')</script>");
			redirect('Barang/input_k_barang');
		}else{
			$data = array(

				'id_k_barang'		=> $id_k_barang,
				'nama_k_barang'		=> $nama_k_barang,
				'keterangan'		=> $keterangan


			);
			$this->db->insert('tb_k_barang',$data);
			redirect('Barang/input_k_barang');
		}
	}
	
	function insert_barang(){
		//return $this->db->get('kategori');
		$id_barang 			= $this->input->post('id_barang');
		$nama_barang 		= $this->input->post('nama_barang');
		$tgl		 		= $this->input->post('tgl');
		$id_k_barang 		= $this->input->post('id_k_barang');
		$satuan_besar 		= $this->input->post('satuan_besar');		
		$satuan_kecil 		= $this->input->post('satuan_kecil');		
		$satuan_sedang 		= $this->input->post('satuan_sedang');		
		$konversi 			= $this->input->post('konversi');		
		$jual 				= $this->input->post('jual');		
		$minimum	 		= $this->input->post('minimum');		
		$modal	 			= $this->input->post('modal');				
		$harga_jual	 		= $this->input->post('harga_jual');		
		$walk1	 			= $this->input->post('walk1');		
		$walk	 			= $this->input->post('walk');		
		$tk	 				= $this->input->post('tk');		
		$tb	 				= $this->input->post('tb');		
		$sls	 			= $this->input->post('sls');		
		$agn	 			= $this->input->post('agn');		
		$komisi	 			= $this->input->post('komisi');		

		$data = array(

			'id_barang'			=> $id_barang,
			'nama_barang'		=> $nama_barang,
			'tgl'				=> $tgl,
			'id_k_barang'		=> $id_k_barang,
			'satuan_besar'		=> $satuan_besar,
			'satuan_kecil'		=> $satuan_kecil,
			'konversi'			=> $konversi,
			'jual'				=> $jual,
			'minimum'			=> $minimum,
			'modal'				=> str_replace(".", "", $modal),
			'modal_t'			=> str_replace(".", "", $modal),
			'harga_jual'		=> str_replace(".", "", $harga_jual),
			'walk1'				=> str_replace(".", "", $walk1),
			'walk'				=> str_replace(".", "", $walk),
			'tk'				=> str_replace(".", "", $tk),
			'tb'				=> str_replace(".", "", $tb),
			'sls'				=> str_replace(".", "", $sls),
			'agn'				=> str_replace(".", "", $agn),
			'komisi'			=> str_replace(".", "", $komisi)


		);
		$this->db->insert('tb_barang',$data);
		redirect('Barang/view_barang');		
	}

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
		redirect('Barang/input_barang');

	}

	function update_barang(){
		//return $this->db->get('kategori');
		$id_barang 			= $this->input->post('id_barang');
		$nama_barang 		= $this->input->post('nama_barang');
		$id_k_barang 		= $this->input->post('id_k_barang');
		$satuan_besar 		= $this->input->post('satuan_besar');		
		$jual 				= $this->input->post('jual');		
		$minimum	 		= $this->input->post('minimum');		
		$modal	 			= $this->input->post('modal');				
		$pricelist 			= $this->input->post('pricelist');				
		$harga_jual	 		= $this->input->post('harga_jual');		
		$walk		 		= $this->input->post('walk');		
		$tk			 		= $this->input->post('tk');		
		$tb			 		= $this->input->post('tb');		
		$sls		 		= $this->input->post('sls');
		$komisi		 		= $this->input->post('komisi');

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

			if ($a1 <= $modal){
				$this->session->set_flashdata("message","<script> alert('Oops.. Harga Toko Kecil Kurang Dari Modal')</script>");
				redirect('Barang/edit_barang/'.$id_barang);
			}elseif ($b1 <= $modal){
				$this->session->set_flashdata("message","<script> alert('Oops.. Harga Toko Besar Kurang Dari Modal')</script>");
				redirect('Barang/edit_barang/'.$id_barang);
			}elseif ($c1 <= $modal){
				$this->session->set_flashdata("message","<script> alert('Oops.. Harga Sales Kurang Dari Modal')</script>");
				redirect('Barang/edit_barang/'.$id_barang);
			}elseif ($d1 <= $modal){
				$this->session->set_flashdata("message","<script> alert('Oops.. Harga Agen Kurang Dari Modal')</script>");
				redirect('Barang/edit_barang/'.$id_barang);
			}elseif ($e1 <= $modal){
				$this->session->set_flashdata("message","<script> alert('Oops.. Harga Partai Kurang Dari Modal')</script>");
				redirect('Barang/edit_barang/'.$id_barang);
			}else{
				$data = array(
					
					'id_barang'			=> $id_barang,
					'nama_barang'		=> $nama_barang,
					'id_k_barang'		=> $id_k_barang,
					'satuan_besar'		=> $satuan_besar,
					'jual'				=> $jual,
					'minimum'			=> $minimum,
					'modal'				=> str_replace(".", "", $modal),
					'pricelist'			=> str_replace(".", "", $pricelist),
					'harga_jual'		=> str_replace(".", "", $harga_jual),
					'walk'				=> str_replace(".", "", $walk),
					'tk'				=> str_replace(".", "", $tk),
					'tb'				=> str_replace(".", "", $tb),
					'sls'				=> str_replace(".", "", $sls),
					'komisi'			=> str_replace(".", "", $komisi)
					
					
				);
				$this->db->where('id_barang',$id_barang);
				$this->db->update('tb_barang',$data);
			}
			redirect('Barang/view_barang');					
		}elseif($pricelist == 0){
			if($harga_jual <= $modal){
				$this->session->set_flashdata("message","<script> alert('Oops.. Harga Toko Kecil Kurang Dari Modal')</script>");
				redirect('Barang/edit_barang/'.$id_barang);
			}elseif ($walk <= $modal){
				$this->session->set_flashdata("message","<script> alert('Oops.. Harga Toko Besar Kurang Dari Modal')</script>");
				redirect('Barang/edit_barang/'.$id_barang);
			}elseif ($tk <= $modal){
				$this->session->set_flashdata("message","<script> alert('Oops.. Harga Sales Kurang Dari Modal')</script>");
				redirect('Barang/edit_barang/'.$id_barang);
			}elseif ($tb <= $modal){
				$this->session->set_flashdata("message","<script> alert('Oops.. Harga Agen Kurang Dari Modal')</script>");
				redirect('Barang/edit_barang/'.$id_barang);
			}elseif ($sls <= $modal){
				$this->session->set_flashdata("message","<script> alert('Oops.. Harga Partai Kurang Dari Modal')</script>");
				redirect('Barang/edit_barang/'.$id_barang);
			}else{
				$data = array(
					
					'id_barang'			=> $id_barang,
					'nama_barang'		=> $nama_barang,
					'id_k_barang'		=> $id_k_barang,
					'satuan_besar'		=> $satuan_besar,
					'jual'				=> $jual,
					'minimum'			=> $minimum,
					'modal'				=> str_replace(".", "", $modal),
					'pricelist'			=> str_replace(".", "", $pricelist),
					'harga_jual'		=> str_replace(".", "", $harga_jual),
					'walk'				=> str_replace(".", "", $walk),
					'tk'				=> str_replace(".", "", $tk),
					'tb'				=> str_replace(".", "", $tb),
					'sls'				=> str_replace(".", "", $sls),
					'komisi'			=> str_replace(".", "", $komisi)
					
					
				);
				$this->db->where('id_barang',$id_barang);
				$this->db->update('tb_barang',$data);
			}
			redirect('Barang/view_barang');					
		}
	}
	
	function get_barang($kobar){
		$hsl=$this->db->query("SELECT * FROM tb_barang where id_barang='$kobar'");
		return $hsl;
	}
	function get(){
		
		$id_k_barang = $this->uri->segment(3);
		
		return $this->db->get_where('tb_k_barang', array('id_k_barang' => $id_k_barang));
		
	}
	function get2(){
		
		$id_barang = $this->uri->segment(3);
		
		return $this->db->get_where('tb_barang', array('id_barang' => $id_barang));
		
	}
	function update_k_barang(){
		
		$id_k_barang 		= $this->input->post('id_k_barang');
		$nama_k_barang		= $this->input->post('nama_k_barang');
		$keterangan			= $this->input->post('keterangan');

		
		$data = array(

			'id_k_barang'			=> $id_k_barang,
			'nama_k_barang'			=> $nama_k_barang,
			'keterangan'			=> $keterangan


		);

		$this->db->where('id_k_barang',$id_k_barang);
		$this->db->update('tb_k_barang',$data);
		
	}

	function delete_kategori($id_kategori){
		
		$this->db->delete('tb_kategori', array ('id_kategori' => $id_kategori)); // Untuk mengeksekusi perintah delete data
	}
	function delete_barang($id_barang)
	{
		$penjualan = $this->db->get_where('tb_detail_pembelian',array('id_barang'=>$id_barang))->row_array();
		//$id_barang = $penjualan['id_barang'];
		if($penjualan['id_barang'] == $id_barang){
			$this->session->set_flashdata("message","<script> alert('Oops... Barang Tidak Bisa Di Hapus !')</script>");
			redirect('Barang/view_barang');
		}elseif($penjualan['id_barang'] == 0){
			$this->db->where('id_barang',$id_barang);
			$this->db->delete('tb_barang');
			redirect('Barang/view_barang');
			
		}
	}
}




?>