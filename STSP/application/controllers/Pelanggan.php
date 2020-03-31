<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

	function __construct(){
		parent:: __construct();
		
		ceklogin();
		$this->load->Model(array('Model_pelanggan','Model_kategori','Model_sales'));
		$this->load->helper(array('form','url'));
		$this->load->database();
	}
	function get_data_pelanggan()
	{
		$list = $this->Model_pelanggan->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $field) {
			
			$edit = "<a href = ".base_url('Pelanggan/edit_pelanggan/'.$field->id_pelanggan)." class = 'btn btn-xs btn-success' align = 'center'><i class = 'fa fa-edit'></i></a>";
			$hapus = "<a href = ".base_url('Pelanggan/delete_pelanggan/'.$field->id_pelanggan)."><span class = 'btn btn-xs btn-danger' align = 'center'><i class = 'fa fa-trash'></i></span></a>";
			//$detail = "<td width='100px'  href = '#' class='detailalamat' data-idii = ".$field->id_supplier."><i class = 'fa fa-trash'></i></td>";
			
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $field->id_pelanggan;
			$row[] = $field->nama_pelanggan;
			$row[] = $field->no_npwp;
			$row[] = $field->no_ktp;
			$row[] = $field->no_telp;
			$row[] = $field->id_k_pelanggan;
			$row[] = $field->masa_hutang.' '.'Hari';
			$row[] = number_format($field->hutang);
			$row[] = number_format($field->max_hutang);
			$row[] = number_format($field->deposit);
			$row[] = $field->alamat;
			$row[] = $field->ship_to;
			$row[] = $edit;
			$row[] = $hapus;
			
			$data[] = $row;
		}
		
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Model_pelanggan->count_all(),
			"recordsFiltered" => $this->Model_pelanggan->count_filtered(),
			"data" => $data,
		);
        //output dalam format JSON
		echo json_encode($output);
	}
	function input_pelanggan(){
		if(isset($_POST['submit'])){
				//insert data
			$this->Model_pelanggan->insert_pelanggan();
		}else{
			$a = $this->Model_pelanggan->getNomorterakhir()->row_array();
			$id2       = ('');
			$format3   = $id2;
			$data['autonumber'] 	= buatkode($a['kode_pelanggan'],$format3,'3');
			$data['listkategori'] = $this->Model_kategori->view_kategori();
			$data['list_sales'] = $this->Model_pelanggan->view_sales();
			$this->template->load('template','Pelanggan/input_pelanggan',$data);
		}
	}

	function edit_pelanggan(){
		
		if(isset($_POST['submit'])){
				//insert data
			$this->Model_pelanggan->update_pelanggan();
			redirect('Pelanggan/input_pelanggan');
		}else{
			$data['d'] = $this->Model_pelanggan->get()->row_array();
			$data['listpelanggan'] = $this->Model_pelanggan->view_pelanggan();
			$data['listkategori'] = $this->Model_kategori->view_kategori();
			$data['listsales'] = $this->Model_sales->view_sales();
			$this->template->load('template','Pelanggan/edit_pelanggan',$data);
			
		}
	}
	function delete_pelanggan($id_pelanggan)
	{
		$data=$this->Model_pelanggan->delete_pelanggan($id_pelanggan);
		$data = ['success'=>200];

		echo json_encode($data);
	}

	
}
