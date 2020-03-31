<?php

class Model_pelanggan extends CI_Model{
	var $table = 'tb_pelanggan'; //nama tabel dari database
    var $column_order = array(null, 'id_pelanggan','nama_pelanggan','no_npwp','no_ktp','no_telp','id_k_pelanggan','masa_hutang','hutang','max_hutang','alamat','ship_to','deposit','id_karyawan'); //field yang ada di table user
    var $column_search = array('id_pelanggan','nama_pelanggan','no_ktp','no_telp','alamat'); //field yang diizin untuk pencarian 
    var $order = array('id_pelanggan' => 'desc'); 
    
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
    
    function view_pelanggan(){
    	
    	
    	$query = "SELECT * FROM  tb_pelanggan order by kode_pelanggan desc";
    	return $this->db->query($query);

    }
    function view_pelanggan2(){
    	$keterangan = $this->input->get('keterangan');
    	
    	$query = "SELECT * FROM  tb_pelanggan WHERE keterangan = '$keterangan'";
    	return $this->db->query($query);

    }
    function view_sales(){
    	$query = "SELECT * FROM tb_sales order by nama_sales asc";
    	return $this->db->query($query);

    }
    function insert_pelanggan(){
		//return $this->db->get('kategori');
    	$id_pelanggan 			= $this->input->post('id_pelanggan');
    	$a = $this->Model_pelanggan->getNomorterakhir()->row_array();
    	$id2       = ('');
    	$format3   = $id2;
    	$data['autonumber'] 	= buatkode($a['kode_pelanggan'],$format3,'3');
    	$kode_pelanggan 		= $data['autonumber'];
    	$tgl_join 				= $this->input->post('tgl_join');
    	$no_reff 				= $this->input->post('no_reff');
    	$no_reff_retur 			= $this->input->post('no_reff_retur');
    	$no_sjln 				= $this->input->post('no_sjln');
    	$no_bar 				= $this->input->post('no_bar');
    	$id_karyawan			= $this->input->post('id_karyawan');
    	$nama_pelanggan 		= $this->input->post('nama_pelanggan');
    	$no_ktp			 		= $this->input->post('no_ktp');
    	$no_npwp		 		= $this->input->post('no_npwp');
    	$no_telp 				= $this->input->post('no_telp');
    	$alamat 				= $this->input->post('alamat');
    	$ship_to 				= $this->input->post('ship_to');
    	$id_k_pelanggan			= $this->input->post('id_k_pelanggan');
    	$masa_hutang 			= $this->input->post('masa_hutang');
    	$max_hutang 			= $this->input->post('max_hutang');
    	$deposit	 			= $this->input->post('deposit');
    	$pelanggan = $this->db->get_where('tb_pelanggan',array('id_pelanggan'=>$id_pelanggan))->row_array();
    	$id = $pelanggan['id_pelanggan'];
    	if($id_pelanggan == $id){
    		$this->session->set_flashdata("message","<script> alert('Oops.. ID pelanggan Ada Yang Sama')</script>");
    		redirect('Pelanggan/input_pelanggan');
    	}else{	

    		$data = array(
    			
    			'id_pelanggan'		=> $id_pelanggan,
    			'kode_pelanggan'	=> $kode_pelanggan,
    			'tgl_join'			=> $tgl_join,
    			'no_reff'			=> $no_reff,
    			'no_reff_retur'		=> $no_reff_retur,
    			'no_sjln'			=> $no_sjln,
    			'no_bar'			=> $no_bar,
    			'id_karyawan'		=> $id_karyawan,
    			'nama_pelanggan'	=> $nama_pelanggan,
    			'no_ktp'			=> $no_ktp,
    			'no_npwp'			=> $no_npwp,
    			'no_telp'			=> $no_telp,
    			'alamat'			=> $alamat,
    			'ship_to'			=> $ship_to,
    			'id_k_pelanggan'	=> $id_k_pelanggan,
    			'masa_hutang'		=> $masa_hutang,
    			'max_hutang'		=> str_replace(".", "", $max_hutang),
    			'deposit	'		=> str_replace(".", "", $deposit)
    			
    			
    		);
    		
    		$this->db->insert('tb_pelanggan',$data);
    	}
    	redirect('Pelanggan/input_pelanggan');
    }
    
    function get(){
    	$id_pelanggan = $this->uri->segment(3);
    	return $this->db->get_where('tb_pelanggan', array('id_pelanggan' => $id_pelanggan));
    }
    
    function update_pelanggan(){
		//return $this->db->get('kategori');
    	$id_pelanggan 			= $this->input->post('id_pelanggan');
					//$id_sales 				= $this->input->post('id_sales');
    	$nama_pelanggan 		= $this->input->post('nama_pelanggan');
    	$no_ktp			 		= $this->input->post('no_ktp');
    	$no_npwp		 		= $this->input->post('no_npwp');
    	$no_telp 				= $this->input->post('no_telp');
    	$alamat 				= $this->input->post('alamat');
    	$ship_to 				= $this->input->post('ship_to');
    	$id_karyawan			= $this->input->post('id_karyawan');
    	$id_k_pelanggan			= $this->input->post('id_k_pelanggan');
    	$masa_hutang 			= $this->input->post('masa_hutang');
    	$max_hutang 			= $this->input->post('max_hutang');
    	$deposit	 			= $this->input->post('deposit');
    	
    	

    	$data = array(
    		
    		'id_pelanggan'		=> $id_pelanggan,
					//'id_sales'			=> $id_sales,
    		'nama_pelanggan'	=> $nama_pelanggan,
    		'no_ktp'			=> $no_ktp,
    		'no_npwp'			=> $no_npwp,
    		'no_telp'			=> $no_telp,
    		'alamat'			=> $alamat,
    		'ship_to'			=> $ship_to,
    		'id_karyawan'		=> $id_karyawan,
    		'id_k_pelanggan'	=> $id_k_pelanggan,
    		'masa_hutang'		=> $masa_hutang,
    		'max_hutang'		=> str_replace(".", "", $max_hutang),
    		'deposit'			=> str_replace(".", "", $deposit)
    		
    		
    	);
    	
    	$this->db->where('id_pelanggan',$id_pelanggan);
    	$this->db->update('tb_pelanggan',$data);
    }

    function getNomorterakhir(){
    	$bulan = gmdate("Y-m-d",time()+60*60*7);
    	$query = "select max(kode_pelanggan) as kode_pelanggan from tb_pelanggan where DATE_FORMAT(`tgl_join`,'%y')=DATE_FORMAT(NOW(),'%y')";
    	return $this->db->query($query);
    }
    function delete_pelanggan($id_pelanggan)
    {
    	$penjualan = $this->db->get_where('tb_penjualan',array('id_pelanggan'=>$id_pelanggan))->row_array();
		//$id_barang = $penjualan['id_barang'];
    	if($penjualan['id_pelanggan'] == $id_pelanggan){
    		$this->session->set_flashdata("message","<script> alert('Oops... Pelanggan Tidak Bisa Di Hapus !')</script>");
    		redirect('Pelanggan/input_pelanggan');
    	}elseif($penjualan['id_pelanggan'] == 0){
    		$this->db->where('id_pelanggan',$id_pelanggan);
    		$this->db->delete('tb_pelanggan');
    		redirect('Pelanggan/input_pelanggan');
    		
    	}
    }

}




?>