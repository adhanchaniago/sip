<?php

	function ceksession(){
		$ci = & get_instance();
		$ceksession = $ci->session->userdata('master_barang');
		
		if($ceksession == ''){
			redirect('auth/login');
		}
	}
	  //jika sudah masuk tapi tidak di logout
?>