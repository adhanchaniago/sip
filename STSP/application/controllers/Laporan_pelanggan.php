<?php

class Laporan_pelanggan extends CI_Controller{

	function __construct(){
		parent::__construct();
		ceklogin();
		$this->load->model(Array('Model_laporan_pelanggan'));
	}

	function index(){
		
		$data['pelanggan'] 	 	 = $this->Model_laporan_pelanggan->view_pelanggan()->result();
		$data['barang'] 	 	 = $this->Model_laporan_pelanggan->view_barang()->result();
		$data['detail'] 	 	 = $this->Model_laporan_pelanggan->view_detail_pelanggan()->result();
		$this->template->load('template','laporan_pelanggan/view_detail_pelanggan',$data);

	}
	
	function hasil_laporan_pelanggan(){
		
		$data['detail'] 	 	 = $this->Model_laporan_pelanggan->view_detail_pelanggan()->result();
		$data['barangs'] 	 	 = $this->Model_laporan_pelanggan->view_barang_detail()->result();
		$this->load->view('laporan_pelanggan/hasil_detail_pelanggan',$data);

	}

	function laporan_summary(){
		
		$data['pelanggan'] 	 	 = $this->Model_laporan_pelanggan->view_pelanggan()->result();
		$this->template->load('template','laporan_pelanggan/view_summary',$data);

	}
	
	function hasil_summary(){
		
		$data['data'] 	 	 = $this->Model_laporan_pelanggan->view_detail_summary()->result();
		$this->load->view('laporan_pelanggan/hasil_summary',$data);

	}
}