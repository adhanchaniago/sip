<?php

class Model_auth extends CI_Model{
	
	function login(){
		
		$user = $this->input->post('username');
		$pass = $this->input->post('password');
		
		$query = "SELECT * FROM user WHERE username = '$user' AND password = '$pass'";		
		return $this->db->query($query);
		
	}
	
	
	
	
}

?>