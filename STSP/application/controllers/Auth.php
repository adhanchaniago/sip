<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	function __construct(){
		parent:: __construct();
	}
	function login(){
		$db = mysqli_connect("localhost","root","");
		if(isset($_POST['submit'])){
			//ketika submit di tekan
			//akses Model
			$this->load->model('model_auth');
			$check = $this->model_auth->login()->num_rows(); 
			//mengecek jumlah data					
			$user = $this->model_auth->login()->row_array(); 
			//menstore informasi :V

			if($check != 0){
				$data = array(
					'kode_user'					=>	$user['kode_user'],
					'nama_lengkap'				=>	$user['nama_lengkap'],
					'username'					=>	$user['username'],
					'password'					=>	$user['password'],
					'level'						=>	$user['level']
				);
				if($user['level'] == "KasirThermal"){
					$this->session->set_userdata($data);
					redirect('welcome');
				}elseif($user['level'] == "KasirA5"){
					$this->session->set_userdata($data);
					redirect('welcome');
				}elseif($user['level'] == "Supplier"){
					$this->session->set_userdata($data);
					redirect('purchase_mobile/input_purchase');
				}elseif($user['level'] == "Sales"){
					$this->session->set_userdata($data);
					redirect('sales_order/input_penjualan');
				}elseif($user['level'] == "Administrator"){
					$this->session->set_userdata($data);
					redirect('welcome');
				}else{
					$this->session->set_userdata($data);
					redirect('welcome');
				}
			}else{
				$this->session->set_flashdata("message","<script> alert('Oops.. Jangan Nakal Yah..')</script>");
				redirect('auth/login');
			}

		}else{
			afterlogin();
			$this->load->view('auth/login');
		}
	}


	function logout(){
		$this->session->sess_destroy();
		$url=base_url('auth/login');
		redirect($url);
	}

	function input_user(){


		if(isset($_POST['submit'])){
				//insert data

			$this->Model_auth->insert_user();

		}else{

			$this->template->load('template','user/view_user');
		}

	}
}