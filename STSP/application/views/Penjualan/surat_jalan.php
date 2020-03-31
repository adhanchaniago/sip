 <html>
 <head>
 	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css" type = "text/css">
 	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.css" type = "text/css">
 	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css">  <!-- Ionicons -->
 	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/Ionicons/css/ionicons.min.css">  <!-- DataTables -->
 	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
 	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/select2/dist/css/select2.min.css">  
 </head>
 <body >	
 	<div class = "row">
 		<section class="col-lg-4 connectedSortable">
 			<div class="box box-primary">
 				<div class="box-body">
 					<div class="col-ig-7">
 						<form class="form-horizontal"  method="POST" action="" enctype = "multipart/form-data">
 							<div class="form-group">
 								<label class="col-sm-40 control-label" style = "width:80px;">No Jual</label>
 								<div class="col-sm-37" style = "width:150px;" >
 									<input type="text" name="no_jual" id="no_jual" value = "<?php echo $d['no_jual'];?>" autocomplete="off" readonly  class="form-control" placeholder = " No Jual">
 								</div>
 							</div>
 							<div class="form-group">
 								<label class="col-sm-40 control-label" style = "width:80px;">No SJ</label>
 								<div class="col-sm-37" style = "width:150px;" >
 									<input type="text" name="no_sj" id="no_sj" value = "<?php echo $d['no_sj'];?>" autocomplete="off" readonly  class="form-control" placeholder = " No Jual">
 								</div>
 							</div>
 							<div class="form-group">
 								<label class="col-sm-40 control-label" style = "width:80px;">Tanggal</label>
 								<div class="col-sm-37" style = "width:150px;">
 									<input type="text" name="tgl" id="tgl" value="" autocomplete="off" readonly  class="form-control" placeholder = " No Jual">
 								</div>
 							</div>
 							
 							<table  class="table table-condensed" id = "#">
 								<thead>
 									<tr>
 										
 										<th > Nama Barang </th>
 										<th style = "width:100px;"> Stok /Sisa </th>
 										<th> Jumlah Kirim </th>
 									</tr>
 								</thead>
 								
 								<tbody >
 									<tr>
 										<td></td>
 										<td style="margin-right"> </td>
 										<td></td>
 									</tbody>
 								</table>
 								<hr>
 								<table align = "right">
 									<tr>
 										<td>
 											<input type="submit" name = "submit" value = "Simpan & Cetak" class="btn btn-sm btn-primary">
 											<a href = "<?php echo base_url();?>welcome" class = "btn btn-sm btn-danger">Cancel</a>
 										</td>
 									</tr>
 								</table>
 							</div>
 						</div>
 					</div>
 					
 				</section>
 			</div>
 		</body>
 		<script src="<?php echo base_url(); ?>assets/js/jquery-1.8.3.min.js"></script>
 		<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
 		<script src="<?php echo base_url(); ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
 		<script src="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>		
 		<script src="<?php echo base_url(); ?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
 		<script src="<?php echo base_url(); ?>assets/plugins/datetimepicker/jquery.datetimepicker.js"></script>
 		<script src="<?php echo base_url(); ?>assets/js/number.js"></script>
 		
 		
 		<script type="text/javascript">
 			tampilan();
 			function tampilan(){			
 				
 				$("#tampilan").load("<?php echo base_url();?>Penjualan/data_sj");	

 				
 			}
 			
 		</script>
 		</html>