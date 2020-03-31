<?php
class User extends CI_Controller{
	
	function __construct(){
		parent:: __construct();
		
		ceklogin();
		$this->load->Model(array('Model_user'));
		$this->load->helper(array('file','url'));
		
	}
	function lap_belen(){
		
		$this->template->load('template','User/lap_belen');
		
	}
	function view_belen(){
		$data['belen'] = $this->Model_user->view_belen();
		$this->template->load('template','User/view_belen',$data);
		
	}
	function cetak_struk(){	
		$data['d'] = $this->Model_user->getCash()->row_array();
			//$data['b'] = $this->Model_penjualan->get3()->row_array();	
		$this->load->view('user/cetak',$data);
		
	}
	function view_cash(){
		if(isset($_POST['submit'])){
			$this->Model_user->insert_cash();
			
		}elseif(isset($_POST['submit1'])){
			$this->Model_user->insert_cash1();
		}else{
			$a = $this->Model_user->getNomorterakhir()->row_array();
                            //Mengambil Tahun di Sistem
			$tahun    = date('y');
			$id       = ('DM');
			$id1       = ('-');
			$c = array('','I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII');
			$bln		= $c[date('n')];
			$format   = $tahun.$id.$id1.$bln;
			$b = $this->Model_user->getNomorterakhir1()->row_array();
                            //Mengambil Tahun di Sistem
			$tahun    = date('y');
			$id       = ('DK');
			$id1       = ('-');
			$c = array('','I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII');
			$bln		= $c[date('n')];
			$format1   = $tahun.$id.$id1.$bln;
			$data['autonumber'] 	= buatkode($a['no_kas'],$format,4);
			$data['autonumber1'] 	= buatkode($b['no_kas'],$format1,4);
			$data['cash'] = $this->Model_user->view_cash();
			$data['user'] = $this->Model_user->view_pelanggan();
			$this->template->load('template','user/view_cash',$data);
		}
	}
	function view_user(){
		if(isset($_POST['submit'])){
			$this->Model_user->insert_user();
			
		}else{
			
			$data['listuser'] = $this->Model_user->view_user();
			$this->template->load('template','user/view_user',$data);
		}
	}
	function edit_user(){
		
		if(isset($_POST['submit'])){
                       //Proses Update
			$this->Model_user->update_user();
			redirect('user/view_user');
		}else{
			
			$data['d'] = $this->Model_user->getUser()->row_array();
			$data['listuser'] = $this->Model_user->view_user();
			$this->template->load('template','user/edit_user',$data);
		}
		
		
		
	}
	function hak_akses(){
		
		if(isset($_POST['submit'])){
                       //Proses Update
			$this->Model_user->hak_akses();
                        //redirect('user/view_user');
		}else{
			
			$data['d'] = $this->Model_user->getUser1()->row_array();
						//$data['listuser'] = $this->Model_user->view_user();
			$this->template->load('template','user/hak_user',$data);
		}
		
		
		
	}
	function edit_cash(){
		
		if(isset($_POST['submit'])){
                       //Proses Update
			$this->Model_user->update_cash();
			redirect('user/view_cash');
		}else{
			
			$data['k'] = $this->Model_user->getCash()->row_array();
			$data['listuser'] = $this->Model_user->view_user();
			$data['cash'] = $this->Model_user->view_cash();
			$this->template->load('template','user/edit_cash',$data);
		}
		
		
		
	}
	function looping_cetak_deposit(){
		
		$id = $this->input->post('no_kas');
		$data['cetak'] = $this->Model_user->looping_cetak_deposit($id);
		$data['cetak1'] = $this->Model_user->cetak_a5($id);
		$this->load->view('User/print',$data);
		
	}
	function update_cetak(){
		if(isset($_POST['submit'])){	
			$no_kas = $this->input->post('no_kas');
			$alasan_cetak = $this->input->post('alasan_cetak');
			$cetak = $this->input->post('cetak');
			$looping_cetak = $this->db->get_where('tb_kas',array('no_kas'=>$no_kas))->row_array();
			$cetakan = $looping_cetak['cetak'];
			$nokas = $looping_cetak['no_kas'];
			
			if($cetakan > 2){
				$this->session->set_flashdata("message","<script> alert('Oops.. Gak Bisa Ngeprint Lagi')</script>");
				redirect('User/view_cash');
			}else{
				$data = array(
					'no_kas'       => $no_kas,
					'alasan' 	   => $alasan_cetak,
					'cetak' 	   => $cetak,
					'user'		   => $this->session->userdata('username'),
				);
				$this->db->insert('cetak_dp',$data);
				$this->db->query("UPDATE tb_kas SET cetak = cetak + '$cetak' WHERE no_kas = '$nokas'");
			}
			redirect('User/cetak_struk/'.$no_kas);
			
		}
		
	}
	function memo(){
		$this->load->view('user/memo');
	}
	function looping_batal(){
		$id = $this->input->post('no_kas');
		$data['batal'] = $this->Model_user->looping_batal($id);
		$this->load->view('User/pembatalan',$data);
	}
	function pembatalan(){
		if(isset($_POST['submit'])){	
			$no_kas = $this->input->post('no_kas');
			$batal 	= $this->input->post('batal');
			
			$barang = $this->db->get_where('tb_kas',array('no_kas'=>$no_kas))->row_array();
			$data2 = $this->db->from('tb_pelanggan')->like('id_pelanggan',$barang['kode_user'])->get();
			foreach($data2->result() as $g){
			}
			if($g->deposit == 0){
				echo "<script> alert('Maaf'); window.location = '".base_url('User/view_cash')."'</script>";
			}else{
				$data = array(
					'no_kas'        => $no_kas,
					'batal' 	    => $batal,
				);
				$this->db->where('no_kas',$no_kas);
				$this->db->update('tb_kas',$data);
				$data = $this->db->from('tb_kas')->like('no_kas',$no_kas)->get();
				foreach($data->result() as $h){
				}
				$this->db->query("UPDATE tb_pelanggan SET deposit = deposit - '$h->sisa' WHERE id_pelanggan = '$h->kode_user'");
		//$this->db->query("UPDATE tb_kas SET sisa = 0 WHERE no_kas = '$no_kas'");
				redirect('User/view_cash/');
			}
		}
		
	}
	function delete_user($username){
		$this->Model_user->delete_user($username);
		redirect('User/view_user');
	}
}
?>
