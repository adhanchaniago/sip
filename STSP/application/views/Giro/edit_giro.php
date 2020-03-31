  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css" type = "text/css">

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.css" type = "text/css">

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  
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
<body>
 <div class = "row">
<section class="col-lg-9 connectedSortable">
<div class="box box-success">
		<div class="box box-success" style="margin-top: -3px;"> 
				  <h3 class="box-title">Data Informasi Giro</h3>
		</div>
						<?php 
						$user = $this->session->userdata('username');
						$query = "select * from menu WHERE level = '$user'";
								$j = $this->db->query($query);
								$j->num_rows();
								
							?>
							<?php foreach ($j->result() as $j){ 
							}
							?>
						<table id = "" class="table table-condensed" >
 					<thead bgcolor="#99FF99">
 						<tr>
 							<td width="150px"><b>no giro</b></td>
 							<td width="150px"><b>tgl giro</b></td>
 							<td width="150px"><b>tgl cair</b></td>
 							<td width="150px" style="text-align:right;"><b>nominal</b></td>
 							<td width="150px"><b>kepada</b></td>
 							<td width="150px"><b>no rek</b></td>
 							<td width="150px"><b>bank</b></td> 
							<?php if ($j->e_giro == "Y" ): ?>
				             <td width = "5px"><b><center>A</center></b></td>
							 <?php endif;?>
							 <?php if ($j->h_giro == "Y" ): ?>
				             <td width = "5px"><b><center>H</center></b></td>
							 <?php endif;?>
 						</tr>
 					</thead>
 					<tbody>
 						<?php 
 						foreach ($listgiro->result() as $f) { 
 							?>
 							<tr>
 								<td><?php echo $f->no_giro; ?></td>
 								<td><?php echo $f->tgl_giro; ?></td>			                  
 								<td><?php echo $f->tgl_cair; ?></td>
 								<td align = "right"><?php echo number_format($f->nominal); ?></td>
 								<td><?php echo $f->kepada; ?></td>
 								<td><?php echo $f->no_rek; ?></td>
 								<td><?php echo $f->bank; ?></td>
 								<?php if ($j->e_giro == "Y"): ?>
 								<td align = "center">
 										<a href = "<?php echo base_url('Giro/edit_giro');?>/<?php echo $f->no_giro;?>" class="btn btn-success btn-xs"><i class = "fa fa-edit"></i></a>
 								</td>
 									<?php endif;?>
 									<?php if ($j->h_giro == "Y"): ?>
 								<td align = "center">
 										<a href = "<?php echo base_url('Giro/hapus_giro');?>/<?php echo $f->no_giro;?>" class="btn btn-danger btn-xs"><i class = "fa fa-trash"></i></a>
 								</td>
 									<?php endif;?>
 							</tr>
 							
 						<?php } ?>
 						
 					</table>
						</div>
	  		</section>
	  <section class="col-lg-3 connectedSortable">
<div class="box box-primary box-solid">
		<div class="box-header">
			<h3 class="box-title"><i class="fa fa-tag"></i> Edit Giro</h3>
		</div>
					<form class="form-horizontal" method="POST" action="">
						<div class="box-body">
						
						
							<div class="form-group">
							<label class="col-sm-3 control-label">no giro</label>
							<div class="col-sm-5">
									<input type="hidden"  name="" id="" onkeyup="this.value=this.value.toUpperCase();" value = "<?php echo $d['kode_giro'].' - '.$d['no_giro'];?>" autocomplete="off" class="form-control" placeholder = " ID Satuan" readonly>
									<input type="text"  name="no_giro" id="no_giro" onkeyup="this.value=this.value.toUpperCase();" value = "<?php echo $d['no_giro'];?>" autocomplete="off" class="form-control" placeholder = " ID Satuan" readonly>
							</div>	
							</div>
							
							<div class="form-group">
								<label class="col-sm-3 control-label">tgl giro</label>
								<div class="col-sm-5">
										<input type="text" readonly name="tgl_giro" id="tgl giro" onkeyup="this.value=this.value.toUpperCase();" value = "<?php echo  $d['tgl_giro']; ?>" autocomplete="off" class="form-control" placeholder = "Tgl Giro"  required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')">
								</div>
							</div>
							
							<div class="form-group">
							<label class="col-sm-3 control-label">tgl cair</label>
							<div class="col-sm-5">
									<input type="text"  name="tgl_cair" id="tgl_cair" onkeyup="this.value=this.value.toUpperCase();" value = "<?php echo  $d['tgl_cair']; ?>" autocomplete="off" class="form-control" placeholder = " Tgl Cair" required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')" autofocus>
									
							</div>	
							</div>
							<div class="form-group">
							<label class="col-sm-3 control-label">nominal</label>
							<div class="col-sm-5">
									<input type="text"  name="" id="nominal1" value = "<?php echo number_format($d['nominal']); ?>" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" class="form-control" placeholder = "NOMINAL" autofocus required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')">
									<input type="hidden"  name="nominal" id="nominal" onkeyup="this.value=this.value.toUpperCase();" value = "<?php echo  $d['nominal']; ?>" autocomplete="off" class="form-control" placeholder = " Nominal" required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')">
									
							</div>	
							</div>
							<div class="form-group">
							<label class="col-sm-3 control-label">kepada</label>
							<div class="col-sm-5">
									<input type="text"  name="kepada" id="kepada" onkeyup="this.value=this.value.toUpperCase();" value = "<?php echo  $d['kepada']; ?>" autocomplete="off" class="form-control" placeholder = " Kepada" required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')">
									
							</div>	
							</div>
							<div class="form-group">
							<label class="col-sm-3 control-label">no rek</label>
							<div class="col-sm-5">
									<input type="text"  name="no_rek" id="no_rek" onkeyup="this.value=this.value.toUpperCase();" value = "<?php echo  $d['no_rek']; ?>" autocomplete="off" class="form-control" placeholder = " No Rek" required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')">
									
							</div>	
							</div>
							<div class="form-group">
							<label class="col-sm-3 control-label">bank</label>
							<div class="col-sm-5">
									<input type="text"  name="bank" id="bank" onkeyup="this.value=this.value.toUpperCase();" value = "<?php echo  $d['bank']; ?>" autocomplete="off" class="form-control" placeholder = " Bank" required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')">
									
							</div>	
							</div>
							<hr>
										<table align = "right" class = "table1">
										<tr>
										<td align = "right">
										<input type="submit" name = "submit" value = "SIMPAN" class="btn btn-sm btn-primary">
										<a href = "<?php echo base_url();?>Giro/input_giro" class="btn btn-sm btn-danger">Cancel</a>
										</td>
										</tr>
										</table>
							
							</div>
						</form>
					</div>
			</section>
	</div>
</body>


<script src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url(); ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
  
    $("#tabelsatuan").DataTable({
      
      searching   : true,
      bInfo : false,
      //bLengthChange : false,
      bPaginate : false
     
  })
</script>
<script type="text/javascript">
 	$(function(){
 		$("#nominal1").number(true);
 		
 		$('#nominal1').keyup(function(){
 			
 			var mdl = $('#nominal1').val();
 			$('#nominal').val(mdl);
			
 		});
 	});
 </script>
</html>