<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends CI_Controller {

	function __construct(){
		parent:: __construct();
		
		ceklogin();
		$this->load->Model('Model_supplier');
		$this->load->helper(array('form','url'));
	}
	function get_data_supplier()
	{
		$list = $this->Model_supplier->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $field) {
			$edit = "<a href = ".base_url('Supplier/edit_supplier/'.$field->id_supplier)." class = 'btn btn-xs btn-success' align = 'center'><i class = 'fa fa-edit'></i></a>";
			$view = " <a href = 'javascript:void(0)' class = 'detailalamat' data-idii ='".$field->id_supplier."'><i class = 'fa fa-edit'></i></a>";
			$hapus = "<a href = ".base_url('Supplier/delete_supplier/'.$field->id_supplier)."><span class = 'btn btn-xs btn-danger' align = 'center'><i class = 'fa fa-trash'></i></span></a>";
			//$detail = "<td width='100px'  href = '#' class='detailalamat' data-idii = ".$field->id_supplier."><i class = 'fa fa-trash'></i></td>";
			if($field->ppn == 10){
				$ppn = "Ya";
			}else{
				$ppn = "Tidak";
			}
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $field->id_supplier;
			$row[] = $field->nama_supplier;
			$row[] = $field->contact;
			$row[] = $field->telp;
			$row[] = $field->no_rek;
			$row[] = $field->nama_rek;
			$row[] = $field->alamat;
			$row[] = $field->masa_hutang.' Hari';
			$row[] = $field->kode_mu;
			$row[] = $field->keterangan;
			$row[] = $edit;
			$row[] = $hapus;
			
			$data[] = $row;
		}
		
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Model_supplier->count_all(),
			"recordsFiltered" => $this->Model_supplier->count_filtered(),
			"data" => $data,
		);
        //output dalam format JSON
		echo json_encode($output);
	}
	function input_supplier(){
		if(isset($_POST['submit'])){
				//insert data
			$this->Model_supplier->insert_supplier();
			
		}else{
			$a = $this->Model_supplier->getNomorterakhir()->row_array();
                            //Mengambil Tahun di Sistem
			$tahun    = ('');
			$format   = $tahun;
			$data['autonumber'] 	= buatkode($a['kode_supplier'],$format,'3');	
			$data['listkaryawan'] 	= $this->Model_supplier->view_supplier();
			$data['kode_mu'] 		= $this->Model_supplier->view_mu();
			$this->template->load('template','supplier/input_supplier',$data);
		}
	}

	function edit_supplier(){
		
		if(isset($_POST['submit'])){
				//insert data

			$this->Model_supplier->update_supplier();
			redirect('Supplier/input_supplier');
		}else{
			
			
			$data['d'] = $this->Model_supplier->get()->row_array();
			$data['kode_mu'] 		= $this->Model_supplier->view_mu();
			$data['listkaryawan'] = $this->Model_supplier->view_supplier();
			$this->template->load('template','Supplier/edit_supplier',$data);
			
		}
	}
	function delete_supplier($id_supplier)
	{
		$data=$this->Model_supplier->delete_supplier($id_supplier);
		$data = ['success'=>200];

		echo json_encode($data);
	}

	
}
