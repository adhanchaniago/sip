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
 </head>
 <body>
 	<?php echo $this->session->flashdata('message');
 	?>
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
 						foreach ($listgiro->result() as $d) { 
 							?>
 							<tr>
 								<td><?php echo $d->kode_giro.' - '.$d->no_giro; ?></td>
 								<td><?php echo $d->tgl_giro; ?></td>			                  
 								<td><?php echo $d->tgl_cair; ?></td>
 								<td align = "right"><?php echo number_format($d->nominal); ?></td>
 								<td><?php echo $d->kepada; ?></td>
 								<td><?php echo $d->no_rek; ?></td>
 								<td><?php echo $d->bank; ?></td>
 								<?php if ($j->e_giro == "Y"): ?>
 								<td align = "center">
 										<a href = "<?php echo base_url('Giro/edit_giro');?>/<?php echo $d->no_giro;?>" class="btn btn-success btn-xs"><i class = "fa fa-edit"></i></a>
 								</td>
 									<?php endif;?>
 									<?php if ($j->h_giro == "Y"): ?>
 								<td align = "center">
 										<a href = "<?php echo base_url('Giro/hapus_giro');?>/<?php echo $d->no_giro;?>" class="btn btn-danger btn-xs"><i class = "fa fa-trash"></i></a>
 								</td>
 									<?php endif;?>

 							</tr>

 						<?php } ?>

 					</table>
 					</div>
 				</section>
 				<?php if ($j->i_giro == "Y" ): ?>
 					<section class="col-lg-3 connectedSortable">
 						<div class="box box-primary box-solid">
 							<div class="box-header">
 								<h3 class="box-title"><i class="fa fa-tag"></i> Input Giro</h3>
 							</div>
 							
 							<form class="form-horizontal" method="POST" id = "form" action="">
 								<div class="box-body">
 									<div class="form-group">
 										<label class="col-sm-3 control-label">No Giro</label>
 										<div class="col-sm-4" style="margin-left: -29px;margin-right: 29px;">
 											<input type="text" name="kode_giro" id="kode_giro" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" class="form-control no_giro" placeholder = "KD" autofocus required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')" tabindex = "1">
 										</div>
 										<div class="col-sm-4" style="margin-left: -58px;width: 146px;">
 											<input type="text" onkeypress="return hanyaAngka(event)" name="no_giro" id="no_giro" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" class="form-control no_giro" placeholder = "NO GIRO" autofocus required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')" tabindex = "2">
 											<input type = "hidden" name = "" id = "cekgiro" class = "cekgiro">
 										</div>
 									</div>
 									
 									<div class="form-group">
 										<label class="col-sm-3 control-label">tgl giro</label>
 										<div class="col-sm-5">
 											<input type="text"  name="tgl_giro" readonly id="tgl_giro" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" class="form-control" placeholder = "TGL GIRO" value = "<?php echo date('d-m-Y');?>" required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')">
 										</div>
 									</div>
 									<div class="form-group">
 										<label class="col-sm-3 control-label">tgl cair</label>
 										<div class="col-sm-5">
 											<input type="text"  name="tgl_cair" id="tgl_cair" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" class="form-control" value="<?php echo date('d-m-Y');?>" placeholder = "TGL CAIR" autofocus required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')" tabindex = "3">
 											
 										</div>
 									</div>
 									<div class="form-group">
 										<label class="col-sm-3 control-label">nominal</label>
 										<div class="col-sm-5">
 											<input type="text"  name="" id="nominal1" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" class="form-control" placeholder = "NOMINAL" autofocus required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')" tabindex = "4">
 											<input type="hidden"  name="nominal" id="nominal" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" class="form-control" placeholder = "NOMINAL" autofocus required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')">
 											
 										</div>
 									</div>
 									<div class="form-group">
 										<label class="col-sm-3 control-label">kepada</label>
 										<div class="col-sm-5">
 											<input type="text"  name="kepada" id="kepada" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" class="form-control" placeholder = "KEPADA" autofocus required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')" tabindex = "5">
 											
 										</div>
 									</div>
 									<div class="form-group">
 										<label class="col-sm-3 control-label">no rek</label>
 										<div class="col-sm-5">
 											<input type="text"  name="no_rek" id="no_rek" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" class="form-control" placeholder = "NO REK" autofocus required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')" tabindex = "6">
 											
 										</div>
 									</div>
 									<div class="form-group">
 										<label class="col-sm-3 control-label">bank</label>
 										<div class="col-sm-5">
 											<input type="text"  name="bank" id="bank" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" class="form-control" placeholder = "BANK" autofocus required oninvalid="this.setCustomValidity('Oops.. Data Tidak Boleh Kosong')" oninput="setCustomValidity('')" tabindex = "7">
 											<hr>
 											<table align = "right" class = "table1">
 												<tr>
 													<td align = "right">
 														<input type="submit" tabindex = "8" name = "submit" value = "SIMPAN" class="btn btn-sm btn-primary">
 														<a href = "<?php echo base_url();?>welcome" class = "btn btn-sm btn-danger" tabindex = "9">Cancel</a>
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
 			$("#example").DataTable({
 				
 				searching   : true,
 				bInfo : false,
 				bPaginate : false


 			})

 			$(function(){
 				$("#nominal1").number(true);

 				$('#nominal1').keyup(function(){

 					var mdl = $('#nominal1').val();
 					$('#nominal').val(mdl);

 				});
 			});

 			$(".no_giro").on("input",function(){
 				var no_giro = $("#no_giro").val();
 				$.ajax({
 					type    : 'GET',
 					url     : '<?php echo site_url(); ?>Giro/cekgiro',
 					cache   : false,
 					data    : {no_giro:no_giro},
 					success :function(respond){

 						$("#cekgiro").val(respond);


 					}

 				});
 			});
 			$("#form").submit(function(){

 				var cekgiro       			= $("#cekgiro").val();
 				var kode_giro       		= $("#kode_giro").val();
 				var no_giro       			= $("#no_giro").val();
 				if(cekgiro > 0){
 					alert('Oops ... No Giro Sudah Ada');
 					document.getElementById("no_giro").focus();
 					return false;
 				}else if(kode_giro == 0){
 					alert('Oops ... Kode Giro Kosong');
 					document.getElementById("kode_giro").focus();
 					return false;
 				}else if(no_giro == 0){
 					alert('Oops ... No Giro Kosong');
 					document.getElementById("no_giro").focus();
 					return false;
 				}else{
 					return true;
 				}
 				
 			});
			function hanyaAngka(evt) {
				var charCode = (evt.which) ? evt.which : event.keyCode
				if (charCode > 31 && (charCode < 48 || charCode > 57))
					
					return false;
				return true;
			}
 		</script>
 		</html>