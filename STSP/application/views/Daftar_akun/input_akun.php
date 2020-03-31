 <html>
 <head>
 	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css" type = "text/css">

 	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.css" type = "text/css">

 	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
 	<!-- Ionicons -->
 	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/Ionicons/css/ionicons.min.css">
 	<!-- DataTables -->
 	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

 	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/select2/dist/css/select2.min.css">
 	<!-- Theme style -->
 	<style>
 		@media only screen and (max-width: 840px) {
 			table.responsive {
 				margin-bottom: 0;
 				overflow: hidden;
 				overflow-x: scroll;
 				display: block;
 				white-space: nowrap;
 			}
 		}
 	</style>
 	<style>
 		table {
 			border-collapse: collapse;
 			border-spacing: 0;
 			width: 100%;
 			border: 1px solid #ddd;
 		}
 		.table1 {
 			border-collapse: collapse;
 			border-spacing: 0;
 			width: 100%;
 			border: 0px solid #ddd;
 		}
 		th, {
 			text-align: center;
 			padding: 8px;
 		}


 	</style>
  <?php 
 			$user = $this->session->userdata('username');
 			$query = "select * from menu WHERE level = '$user'";
 			$j = $this->db->query($query);
 			$j->num_rows();

 			?>
 			<?php foreach ($j->result() as $j){ 
 			}
 			?>
 </head>
 <body>
 	<?php echo $this->session->flashdata('message');
 	?>
 	<div class = "row">
 		<section class="col-lg-9 connectedSortable">
 			<div class="box box-success">
 				<div class="box box-success" style="margin-top: -3px;"> 
 					<h3 class="box-title">Data Informasi Klasifikasi Akun</h3>
 					<table id = "" class="table table-condensed" >
 						<thead bgcolor="#99FF99">
 							<tr>
 								<td width="50px"><b>Kode Akun<b></td>
 									<td width="150px"><b>Nama<b></td>
 										<td width="150px"><b>Klasifikasi<b></td>
 											<td width="50px"><b>Status<b></td>
 												 <?php if ($j->e_daftar_akun == "Y"): ?>
													  <td align="center" width="5px"><b>E</b></td>
													  <?php endif;?>
													  <?php if ($j->h_daftar_akun == "Y"): ?>
													  <td align="center" width="5px"><b>H</b></td>
													  <?php endif;?>
 												</tr>
 											</thead>
 											<tbody>
 												<?php 
 												foreach ($listakun->result() as $d) { 
 													?>
 													<tr>
 														<td ><?php echo $d->kode_akun; ?></td>
 														<td><?php echo $d->nama_akun; ?></td>			                  
 														<td><?php echo $d->nama_kategori; ?></td>
 														<td><?php if($d->status == 1){ echo "AKTIF"; }else{ echo "TIDAK AKTIF";} ?></td>
														<?php if ($j->e_daftar_akun == "Y"): ?>
												 <td align = "center"><a href = "<?php echo base_url('Daftar_akun/edit_akun');?>/<?php echo $d->kode_akun;?>" class="btn btn-success btn-xs"><i class = "fa fa-edit"></i></a></td>
												 <?php endif;?>
												 <?php if ($j->h_daftar_akun == "Y"): ?>
												 <td align = "center"><a href = "<?php echo base_url('Daftar_akun/hapus_akun/'.$d->kode_akun);?>" class="btn btn-xs btn-danger"><i class = "fa fa-trash-o"></i></a></td>
												 <?php endif;?>
 													</tr>
 												<?php } ?>
 											</tbody>
 										</table>
 									</div>
 								</section>
								  <?php if ($j->i_daftar_akun == "Y"): ?>
 								<section class="col-lg-3 connectedSortable">
 									<div class="box box-primary box-solid">
 										<div class="box-header">
 											<h3 class="box-title"><i class="fa fa-tag"></i> Input Klasifikasi Akun</h3>
 										</div>

 										<form class="form-horizontal" method="POST" action="">
 											<div class="box-body">
 												<div class="form-group">
 													<label class="col-sm-3 control-label">Kode Kategori</label>
 													<div class="col-sm-5">
 														<select class="form-control" autofocus name = "kode_kategori" id="kode_kategori">
 															<option value = "">Pilih Kategori Akun</option>
 															<?php 
 															foreach ($listkategori->result() as $g) { 
 																?>
 																<option value = "<?php echo $g->kode_kategori;?>"><?php echo $g->nama_kategori;?></option>
 															<?php }?>
 														</select>
 													</div>
 												</div>
 												<div class="form-group">
 													<label class="col-sm-3 control-label">Kode Akun</label>
 													<div class="col-sm-5">
 														<input type="text"  name="kode_akun" id="kode_akun" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" class="form-control" placeholder = "KODE AKUN" required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')">
 													</div>
 												</div>

 												<div class="form-group">
 													<label class="col-sm-3 control-label">Nama Akun</label>
 													<div class="col-sm-5">
 														<input type="text"  name="nama_akun" id="nama_akun" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" class="form-control" placeholder = "NAMA AKUN" required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')">
 													</div>
 												</div>
 												<div class="form-group" hidden="">
 													<label class="col-sm-3 control-label">Klasifikasi</label>
 													<div class="col-sm-5">
 														<input type="text"  name="klasifikasi" value="-" id="nama_satuan" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" class="form-control" placeholder = "KLASIFIKASI" required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')">
 													</div>
 												</div>
 												<div class="form-group">
 													<label class="col-sm-3 control-label">Status</label>
 													<div class="col-sm-5">
 														<select class="form-control" name = "status" id="status">
 															<option value = "1">Aktif</option>
 															<option value = "0">Tidak Aktif</option>
 														</select>
 														<hr>
 														<table align = "right" class = "table1">
 															<tr>
 																<td align = "right">
 																	<input type="submit" name = "submit" value = "SIMPAN" class="btn btn-sm btn-primary">
 																	<a href = "<?php echo base_url();?>welcome" class = "btn btn-sm btn-danger">Cancel</a>
 																</td>
 															</tr>
 														</table>
 													</div>
 												</div>
 											</div>
 										</form>
 									</div>			
 								</section>
								<?php endif;?>
 							</div>
 						</body>


 						<script src="<?php echo base_url(); ?>assets/js/jquery-1.8.3.min.js"></script>
 						<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
 						<!-- DataTables -->
 						<script src="<?php echo base_url(); ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
 						<script src="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>		

 						<script src="<?php echo base_url(); ?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
 						<script>
 							$('select').select2();
 							$("#example").DataTable({

 								searching   : true,
 								bInfo : false,
      //bLengthChange : false,
      bPaginate : false
      

  })

</script>

</html>