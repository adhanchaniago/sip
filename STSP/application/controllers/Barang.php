<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {
	private $filename = "data";
	function __construct(){
		parent:: __construct();
		
		ceklogin();
		$this->load->Model(array('Model_barang','Model_satuan','Model_kategori','Model_user'));
		$this->load->helper(array('form','url'));
	}
	function cekbarang(){
		$id_barang	    = $this->input->get('id_barang');
		$cek 			= $this->db->query("SELECT * FROM tb_barang WHERE id_barang = '$id_barang' GROUP BY id_barang")->num_rows();
		echo $cek;

	}
	function stok(){
		$data['list_k_barang'] = $this->Model_barang->view_k_barang();
		$data['listsatuan'] = $this->Model_satuan->view_satuan();
		$data['listsatuan1'] = $this->Model_satuan->view_satuan();
		$data['listsatuan2'] = $this->Model_satuan->view_satuan();
		$data['list_k'] = $this->Model_kategori->view_kategori();
		$data['barang'] = $this->Model_barang->view_barang();
		$this->template->load('template','Barang/stok',$data);
	}	
	function price_list(){
		$data['list_k_barang'] = $this->Model_barang->view_k_barang();
		$data['listsatuan'] = $this->Model_satuan->view_satuan();
		$data['listsatuan1'] = $this->Model_satuan->view_satuan();
		$data['listsatuan2'] = $this->Model_satuan->view_satuan();
		$data['list_k'] = $this->Model_kategori->view_kategori();
		$data['barang'] = $this->Model_barang->view_barang();
		$this->template->load('template','Barang/price_list',$data);
	}	
	function profit(){
		$data['list_k_barang'] = $this->Model_barang->view_k_barang();
		$data['listsatuan'] = $this->Model_satuan->view_satuan();
		$data['listsatuan1'] = $this->Model_satuan->view_satuan();
		$data['listsatuan2'] = $this->Model_satuan->view_satuan();
		$data['list_k'] = $this->Model_kategori->view_kategori();
		$data['barang'] = $this->Model_barang->view_barang();
		$this->template->load('template','Barang/profit',$data);
	}					
	
	function view_barang(){
			//redirect('Barang/lihat_barang');	
		$data['list_k_barang'] = $this->Model_barang->view_k_barang();
		$data['listsatuan'] = $this->Model_satuan->view_satuan();
		$data['listsatuan1'] = $this->Model_satuan->view_satuan();
		$data['listsatuan2'] = $this->Model_satuan->view_satuan();
		$data['list_k'] = $this->Model_kategori->view_kategori();
		$data['barang'] = $this->Model_barang->view_barang();
		$this->template->load('template','Barang/view_barang',$data);
		
	}
	function input_barang(){
		if(isset($_POST['submit'])){
				//insert data
			$this->Model_barang->input_barang();
		}else{
			$data['list_k_barang'] = $this->Model_barang->view_k_barang();
			$data['list_barang'] = $this->Model_barang->view_barang();
			$data['listsatuan'] = $this->Model_satuan->view_satuan();
			$data['listsatuan1'] = $this->Model_satuan->view_satuan();
			$data['listsatuan2'] = $this->Model_satuan->view_satuan();
			$data['list_k'] = $this->Model_kategori->view_kategori();
			
			$this->template->load('template','Barang/input_barang',$data);
		}
	}
	function import_barang(){
	$data = array(); // Buat variabel $data sebagai array      
	if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form      // lakukan upload file dengan memanggil function upload yang ada di SiswaModel.php     
		$upload = $this->Model_barang->upload_file($this->filename);           
	if($upload['result'] == "success"){ // Jika proses upload sukses        // Load plugin PHPExcel nya      
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';   
		$excelreader = new PHPExcel_Reader_Excel2007();        
	$loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx'); // Load file yang tadi diupload ke folder excel
	$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);                // Masukan variabel $sheet ke dalam array data yang nantinya akan di kirim ke file form.php        // Variabel $sheet tersebut berisi data-data yang sudah diinput di dalam excel yang sudha di upload sebelumnya   
	$data['sheet'] = $sheet;      
	}else{ // Jika proses upload gagal      
	$data['upload_error'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan    
}    
} 
$this->template->load('template','Barang/form',$data);

}
	  function import(){    // Load plugin PHPExcel nya   
	  	include APPPATH.'third_party/PHPExcel/PHPExcel.php';      
	  	$excelreader = new PHPExcel_Reader_Excel2007();   
	  $loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx'); // Load file yang telah diupload ke folder excel  
	  $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);        // Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database    
	  $data = array();       
	  $numrow = 1;    
	  foreach($sheet as $row){      // Cek $numrow apakah lebih dari 1      // Artinya karena baris pertama adalah nama-nama kolom      // Jadi dilewat saja, tidak usah diimport 
	  if($numrow > 1){        // Kita push (add) array data ke variabel data      
	  	array_push($data, array(         
	  'id_barang'=>$row['A'], // Insert data nis dari kolom A di excel          
	  'nama_barang'=>$row['B'], // Insert data nama dari kolom B di excel       
	  'satuan_besar'=>$row['C'],// Insert data alamat dari kolom D di excel 
	  'modal'=>str_replace(",", "", $row['D']),// Insert data alamat dari kolom D di excel 
	  'harga_jual'=>str_replace(",", "", $row['E']),// Insert data alamat dari kolom D di excel 
	  'walk'=>str_replace(",", "", $row['F']),// Insert data alamat dari kolom D di excel 
	  'tk'=>str_replace(",", "", $row['G']),// Insert data alamat dari kolom D di excel 
	  'tb'=>str_replace(",", "", $row['H']),// Insert data alamat dari kolom D di excel 
	  'sls'=>str_replace(",", "", $row['I']),// Insert data alamat dari kolom D di excel  
	  'id_k_barang'=>$row['J'],// Insert data alamat dari kolom D di excel 
	  'jual'=>$row['K'],// Insert data alamat dari kolom D di excel 
	  'minimum'=>$row['L'],// Insert data alamat dari kolom D di excel 
	  'tgl'=>$row['M'],// Insert data alamat dari kolom D di excel 
	  
	));     
	  }         
	  $numrow++; // Tambah 1 setiap kali looping   
	  $id_barang 		= $row['A'];  
	  $nama_barang 	= $row['B'];  
	  $satuan_besar 	= $row['C'];  
	  $modal 			= $row['D']; 
	  $harga_jual 	= $row['E'];  
	  $walk 			= $row['F'];  
	  $tk 			= $row['G'];  
	  $tb 			= $row['H'];  
	  $sls 			= $row['I'];  
	  $id_k_barang 	= $row['J'];  
	  $jual 			= $row['K'];  
	  $minimum 		= $row['L'];  
	  $tgl 			= $row['M']; 	
	} 
	
	$query = $this->db->query("SELECT * FROM tb_barang WHERE id_barang='$id_barang'");
	$result = $query->result_array();
	$count = count($result);
	if (empty($count)) {
		$this->Model_barang->insert_multiple($data);
		redirect("Barang/view_barang");
	}elseif ($count == 1) {
		$this->Model_barang->update_multiple($data);
		redirect("Barang/view_barang");
		
	}
	
}

function edit_barang(){
	
	if(isset($_POST['submit'])){
				//insert data
		$this->Model_barang->update_barang();
		redirect('Barang/input_barang');
	}else{
		$data['d'] = $this->Model_barang->get2()->row_array();
		$data['list_k_barang'] = $this->Model_barang->view_k_barang();
		$data['list_barang'] = $this->Model_barang->view_barang();
		$data['listsatuan'] = $this->Model_satuan->view_satuan();
		$data['listsatuan1'] = $this->Model_satuan->view_satuan();
		$data['listsatuan2'] = $this->Model_satuan->view_satuan();
		$data['list_k'] = $this->Model_kategori->view_kategori();
		$this->template->load('template','Barang/edit_barang',$data);
		
	}
}
function input_k_barang(){
	if(isset($_POST['submit'])){
				//insert data
		$this->Model_barang->insert_k_barang();
		
	}else{
		$data['list_k_barang'] = $this->Model_barang->view_k_barang();
		$this->template->load('template','Barang/input_k_barang',$data);
	}
}

function edit_k_barang(){
	
	if(isset($_POST['submit'])){
				//insert data
		$this->Model_barang->update_k_barang();
		redirect('Barang/input_k_barang');
	}else{
		$data['d'] = $this->Model_barang->get()->row_array();
		$data['list_k_barang'] = $this->Model_barang->view_k_barang();
		$this->template->load('template','Barang/edit_k_barang',$data);
		
	}
}
function delete_barang($id_barang)
{
	$data=$this->Model_barang->delete_barang($id_barang);
	$data = ['success'=>200];

	echo json_encode($data);
}

function get_data_barang()
{
	$list = $this->Model_barang->get_datatables();
	$data = array();
	$no = $_POST['start'];
	foreach ($list as $field) {
		$modal = $field->modal;
		$modal_t = $field->modal_t;
		$stok = $field->stok;
		$stok_m = $field->minimum;
		$hasil = $modal_t - $modal;
		$status = "";
		
		$edit = "<a href = ".base_url('Barang/edit_barang/'.$field->id_barang)."><span class = 'btn btn-xs btn-success' align = 'center'><i class = 'fa fa-edit'></i></span></a>";
		$hapus = "<a href = ".base_url('Barang/delete_barang/'.$field->id_barang)."><span class = 'btn btn-xs btn-danger' align = 'center'><i class = 'fa fa-trash'></i></span></a>";
		if($stok < $stok_m){
			$color1 = "<span class = 'btn btn-xs btn-danger' align = 'center'>".$field->stok."</span>";
		}elseif($stok == $stok_m){
			$color1 = "<span class = 'btn btn-xs btn-warning' align = 'center'>".$field->stok."</span>";
		}else{
			$color1 = "<span class = 'btn btn-xs btn-success' align = 'center'>".$field->stok."</span>";
		}
		
		if($hasil > 500){
			$status = "<span align = 'center' class = 'btn btn-xs btn-danger'><i class = 'fa fa-arrow-up'></i></span>";	
		}else{
			$status = "<span align = 'center' class = 'btn btn-xs btn-info'><i class = 'fa fa-arrow-down'></i></span>";
		}
		
		$no++;
		$row = array();
		$row[] = $no;
		$row[] = $field->id_barang;
		$row[] = $field->nama_barang;
		$row[] = $color1;
		$row[] = $field->so;
		$row[] = $field->po;
		$row[] = $field->satuan_besar;
		$row[] = number_format($field->modal_t);
		$row[] = number_format($field->modal);
		$row[] = number_format($field->pricelist);
		$row[] = number_format($field->harga_jual);
		$row[] = number_format($field->walk);
		$row[] = number_format($field->tk);
		$row[] = number_format($field->tb);
		$row[] = number_format($field->sls);
		$row[] = $field->id_k_barang;
		$row[] = $field->jual;
		$row[] = $field->minimum;
		$row[] = $field->tgl;
		$row[] = $status;
		$row[] = $edit;
		$row[] = $hapus;
		
		$data[] = $row;
	}
	
	$output = array(
		"draw" => $_POST['draw'],
		"recordsTotal" => $this->Model_barang->count_all(),
		"recordsFiltered" => $this->Model_barang->count_filtered(),
		"data" => $data,
	);
        //output dalam format JSON
	echo json_encode($output);
}
function get_data_price()
{
	$list = $this->Model_barang->get_datatables();
	$data = array();
	$no = $_POST['start'];
	foreach ($list as $field) {
		$modal = $field->modal;
		$modal_t = $field->modal_t;
		$stok = $field->stok;
		$stok_m = $field->minimum;
		$hasil = $modal_t - $modal;
		$status = "";
		
		$edit = "<a href = ".base_url('Barang/edit_barang/'.$field->id_barang)." class = 'btn btn-xs btn-success'><i class = 'fa fa-edit'></i></a>";
		$hapus = "<a href = ".base_url('Barang/delete_barang/'.$field->id_barang)."><span class = 'btn btn-xs btn-danger'><i class = 'fa fa-trash'></i></span></a>";
		
		if($hasil > 500){
			$status = "<span align = 'center' class = 'btn btn-xs btn-danger'><i class = 'fa fa-arrow-up'></i></span>";	
		}else{
			$status = "<span align = 'center' class = 'btn btn-xs btn-info'><i class = 'fa fa-arrow-down'></i></span>";
		}
		
		$no++;
		$row = array();
		$row[] = $no;
		$row[] = $field->id_barang;
		$row[] = $field->nama_barang;
		$row[] = $field->stok;
		$row[] = number_format($field->modal_t);
		$row[] = number_format($field->modal);
		$row[] = number_format($field->pricelist);
		$row[] = number_format($field->harga_jual);
		$row[] = number_format($field->walk);
		$row[] = number_format($field->tk);
		$row[] = number_format($field->tb);
		$row[] = number_format($field->sls);
		$row[] = $field->tgl;
		
		$data[] = $row;
	}
	
	$output = array(
		"draw" => $_POST['draw'],
		"recordsTotal" => $this->Model_barang->count_all(),
		"recordsFiltered" => $this->Model_barang->count_filtered(),
		"data" => $data,
	);
        //output dalam format JSON
	echo json_encode($output);
}
function get_data_profit()
{
	$list = $this->Model_barang->get_datatables();
	$data = array();
	$no = $_POST['start'];
	foreach ($list as $field) {
		$modal = $field->modal;
		$modal_t = $field->modal_t;
		$stok = $field->stok;
		$stok_m = $field->minimum;
		$hasil = $modal_t - $modal;
		$status = "";
		
		if($field->pricelist > 0){
			$tk1 = $field->pricelist * $field->harga_jual/100;
			$tk2 = $field->pricelist - $tk1;
			$tk = $tk2 - $field->modal;
		}else{
			$tk = $field->harga_jual - $field->modal;
		};
		if($field->pricelist > 0){
			$tb1 = $field->pricelist * $field->walk/100;
			$tb2 = $field->pricelist - $tb1;
			$tb = $tb2 - $field->modal;
		}else{
			$tb = $field->walk - $field->modal;
		};
		if($field->pricelist > 0){
			$sls1 = $field->pricelist * $field->tk/100;
			$sls2 = $field->pricelist - $sls1;
			$sls = $sls2 - $field->modal;
		}else{
			$sls = $field->tk - $field->modal;
		};
		if($field->pricelist > 0){
			$agn1 = $field->pricelist * $field->tb/100;
			$agn2 = $field->pricelist - $agn1;
			$agn = $agn2 - $field->modal;
		}else{
			$agn = $field->tb - $field->modal;
		};
		if($field->pricelist > 0){
			$prt1 = $field->pricelist * $field->sls/100;
			$prt2 = $field->pricelist - $prt1;
			$prt = $prt2 - $field->modal;
		}else{
			$prt = $field->sls - $field->modal;
		};
		
		$edit = "<a href = ".base_url('Barang/edit_barang/'.$field->id_barang)." class = 'btn btn-xs btn-success'><i class = 'fa fa-edit'></i></a>";
		$hapus = "<a href = ".base_url('Barang/delete_barang/'.$field->id_barang)."><span class = 'btn btn-xs btn-danger'><i class = 'fa fa-trash'></i></span></a>";
		
		if($hasil > 500){
			$status = "<span align = 'center' class = 'btn btn-xs btn-danger'><i class = 'fa fa-arrow-up'></i></span>";	
		}else{
			$status = "<span align = 'center' class = 'btn btn-xs btn-info'><i class = 'fa fa-arrow-down'></i></span>";
		}
		
		$no++;
		$row = array();
		$row[] = $no;
		$row[] = $field->nama_barang;
		$row[] = number_format($field->modal);
		$row[] = number_format($field->pricelist);
		$row[] = number_format($field->harga_jual) ." / ". number_format($tk);
		$row[] = number_format($field->walk) ." / ". number_format($tb);
		$row[] = number_format($field->tk) ." / ". number_format($sls);
		$row[] = number_format($field->tb) ." / ". number_format($agn);
		$row[] = number_format($field->sls) ." / ". number_format($prt);
		
		$data[] = $row;
	}
	
	$output = array(
		"draw" => $_POST['draw'],
		"recordsTotal" => $this->Model_barang->count_all(),
		"recordsFiltered" => $this->Model_barang->count_filtered(),
		"data" => $data,
	);
        //output dalam format JSON
	echo json_encode($output);
}
function get_data_stok()
{
	$list = $this->Model_barang->get_datatables();
	$data = array();
	$no = $_POST['start'];
	foreach ($list as $field) {
		$modal = $field->modal;
		$modal_t = $field->modal_t;
		$stok = $field->stok;
		$stok_m = $field->minimum;
		$hasil = $modal_t - $modal;
		$status = "";
		
		$edit = "<a href = ".base_url('Barang/edit_barang/'.$field->id_barang)." class = 'btn btn-xs btn-success'><i class = 'fa fa-edit'></i></a>";
		$hapus = "<a href = ".base_url('Barang/delete_barang/'.$field->id_barang)."><span class = 'btn btn-xs btn-danger'><i class = 'fa fa-trash'></i></span></a>";
		
		if($hasil > 500){
			$status = "<span align = 'center' class = 'btn btn-xs btn-danger'><i class = 'fa fa-arrow-up'></i></span>";	
		}else{
			$status = "<span align = 'center' class = 'btn btn-xs btn-info'><i class = 'fa fa-arrow-down'></i></span>";
		}
		
		if($stok < $stok_m){
			$color1 = "<span class = 'btn btn-xs btn-danger' align = 'center'>".$field->stok."</span>";
		}elseif($stok == $stok_m){
			$color1 = "<span class = 'btn btn-xs btn-warning' align = 'center'>".$field->stok."</span>";
		}else{
			$color1 = "<span class = 'btn btn-xs btn-success' align = 'center'>".$field->stok."</span>";
		}
		
		$no++;
		$row = array();
		$row[] = $no;
		$row[] = $field->id_barang;
		$row[] = $field->nama_barang;
		$row[] = $color1;
		$row[] = $field->satuan_besar;
		$row[] = $field->id_k_barang;
		$row[] = $field->jual;
		$row[] = $field->minimum;
		$row[] = $field->tgl;
		
		$data[] = $row;
	}
	
	$output = array(
		"draw" => $_POST['draw'],
		"recordsTotal" => $this->Model_barang->count_all(),
		"recordsFiltered" => $this->Model_barang->count_filtered(),
		"data" => $data,
	);
        //output dalam format JSON
	echo json_encode($output);
}

}
?>
