<?php
defined('BASEPATH') OR exit('No direct script access allowed');
function ceklogin(){
	$ci = & get_instance();
	$ceksession = $ci->session->userdata('level');
	// $ceksession = $ci->session->userdata('foto');

	if($ceksession == ''){
		redirect('auth/login');
	}
}

function afterlogin(){ 
	$ci = & get_instance();
	$ceksession = $ci->session->userdata('level');
	$ceksession = $ci->session->userdata('foto');

	if($ceksession != ''){

		redirect('welcome');
	}
}  
	//jika sudah masuk tapi tidak di logout
?>