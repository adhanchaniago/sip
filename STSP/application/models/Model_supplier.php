<?php

class Model_supplier extends CI_Model{
	var $table = 'tb_supplier'; //nama tabel dari database
    var $column_order = array(null, 'id_supplier','nama_supplier','contact','telp','no_rek','nama_rek','ppn','masa_hutang','alamat','keterangan'); //field yang ada di table user
    var $column_search = array('id_supplier','nama_supplier','contact','telp','no_rek','nama_rek','masa_hutang','alamat','keterangan'); //field yang diizin untuk pencarian 
    var $order = array('id_supplier' => 'desc'); 

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

            	if($i===0)
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

    function view_supplier(){

    	$query = "SELECT * from tb_supplier ";

    	return $this->db->query($query);

    }
    function view_supplier_mu(){

    	$query = "SELECT * from tb_supplier INNER JOIN tb_mata_uang ON tb_supplier.kode_mu = tb_mata_uang.kode_mu";

    	return $this->db->query($query);

    }
    function view_mu(){

    	$query = "SELECT * from tb_mata_uang order by kode_mu asc";

    	return $this->db->query($query);

    }
    function getNomorterakhir(){
    	$query = "select max(kode_supplier) as kode_supplier from tb_supplier ";
    	return $this->db->query($query);

    }
    function get(){

    	$id_supplier = $this->uri->segment(3);
    	return $this->db->get_where('tb_supplier',array('id_supplier'=>$id_supplier));

    }
    function insert_supplier(){
    	$a = $this->Model_supplier->getNomorterakhir()->row_array();
                            //Mengambil Tahun di Sistem
    	$tahun    = ('');
    	$format   = $tahun;
    	$data['autonumber'] 	= buatkode($a['kode_supplier'],$format,'3');
    	$kode_supplier				= $data['autonumber'];
    	$id_supplier				= $this->input->post('id_supplier');
    	$no_reff					= $this->input->post('no_reff');
    	$no_urut					= $this->input->post('no_urut');
    	$nama_supplier				= $this->input->post('nama_supplier');
    	$contact					= $this->input->post('contact');
    	$telp						= $this->input->post('telp');
    	$alamat						= $this->input->post('alamat');
    	$no_rek						= $this->input->post('no_rek');
    	$nama_rek					= $this->input->post('nama_rek');
    	$masa_hutang				= $this->input->post('masa_hutang');
    	$kode_mu					= $this->input->post('kode_mu');
    	$keterangan					= $this->input->post('keterangan');

    	$supplier = $this->db->get_where('tb_supplier',array('id_supplier'=>$id_supplier))->row_array();
    	if($supplier['id_supplier'] == $id_supplier){
    		$this->session->set_flashdata("message","<script> alert('Oops.. ID Supplier Ada Yang Sama')</script>");
    		redirect('Supplier/input_supplier');
    	}
    	$data = array(
    		'kode_supplier'			=> $kode_supplier,
    		'id_supplier'			=> $id_supplier,
    		'no_reff'				=> $no_reff,
    		'no_urut'				=> $no_urut,
    		'nama_supplier'			=> $nama_supplier,
    		'contact'				=> $contact,
    		'telp'					=> $telp,
    		'alamat'				=> $alamat,
    		'no_rek'				=> $no_rek,
    		'nama_rek'				=> $nama_rek,
    		'masa_hutang'			=> $masa_hutang,
    		'kode_mu'				=> $kode_mu,
    		'keterangan'			=> $keterangan,


    	);

    	$this->db->insert('tb_supplier',$data);
    	redirect('supplier/input_supplier');
    }
    function update_supplier(){

    	$kode_supplier				= $this->input->post('kode_supplier');
    	$id_supplier				= $this->input->post('id_supplier');
    	$nama_supplier				= $this->input->post('nama_supplier');
    	$contact					= $this->input->post('contact');
    	$telp						= $this->input->post('telp');
    	$alamat						= $this->input->post('alamat');
    	$no_rek						= $this->input->post('no_rek');
    	$nama_rek					= $this->input->post('nama_rek');
    	$masa_hutang				= $this->input->post('masa_hutang');
    	$kode_mu					= $this->input->post('kode_mu');
    	$keterangan					= $this->input->post('keterangan');


    	$data = array(

    		'kode_supplier'			=> $kode_supplier,
    		'id_supplier'			=> $id_supplier,
    		'nama_supplier'			=> $nama_supplier,
    		'contact'				=> $contact,
    		'telp'					=> $telp,
    		'alamat'				=> $alamat,
    		'no_rek'				=> $no_rek,
    		'nama_rek'				=> $nama_rek,
    		'masa_hutang'			=> $masa_hutang,
    		'kode_mu'				=> $kode_mu,
    		'keterangan'			=> $keterangan,


    	);

    	$this->db->where('id_supplier',$id_supplier);
    	$this->db->update('tb_supplier',$data);	
    }
    function delete_supplier($id_supplier)
    {
    	$penjualan = $this->db->get_where('tb_pembelian',array('id_supplier'=>$id_supplier))->row_array();
		//$id_barang = $penjualan['id_barang'];
    	if($penjualan['id_supplier'] == $id_supplier){
    		$this->session->set_flashdata("message","<script> alert('Oops... Supplier Tidak Bisa Di Hapus !')</script>");
    		redirect('Supplier/input_supplier');
    	}elseif($penjualan['id_supplier'] == 0){
    		$this->db->where('id_supplier',$id_supplier);
    		$this->db->delete('tb_supplier');
    		redirect('Supplier/input_supplier');

    	}
    }

}

?>