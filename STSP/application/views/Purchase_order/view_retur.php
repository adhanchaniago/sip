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
 	
 	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/font.css">
 	
 	<style>
 		table {
 			border-collapse: collapse;
 			border-spacing: 0;
 			width: 100%;
 			border: 1px solid #ddd;
 		}

 		th, {
 			text-align: center;
 			padding: 8px;
 		}


 	</style> 
 </head>
 <body>	 
 	<div class = "row">
 		<section class="col-lg-12 connectedSortable">
 			<div class="box box-primary">
 				<div class="nav-tabs-custom">
 					<ul class="nav nav-tabs">
 						<li class=""><a href="<?php echo base_url(); ?>Purchase_order/view_purchase"><i class="fa fa-cart-arrow-down"></i> <b>Data Purchase_order</b></a></li>
 						<li class="active"><a href="<?php echo base_url(); ?>Purchase_order/view_retur"  data-toggle="tab"><i class="fa fa-mail-forward"></i> <b>Data Retur Purchase_order</b></a></li>
 					</ul>
 				</div>
 			</div>
 			<table id = "example" class="table table-condensed" >
 				<thead bgcolor="#99FF99">
 					<tr>
 						<td width = "10px" ><b>No</b></td>
 						<td width = "50px" ><b>No Retur</b></td>
 						<td  align="center" width = "50px"><b>Tgl Retur</b></td>
 						<td  width = "100px"><b>Supplier</b></td>
 						<td  align="right" width = "80px"><b>Total</b></td>	
 						<td width = "100px" ><b>No PO</b></td>
 						<td width = "250px"><b>Keterangan</b></td>
 						<td width = "20px"><b>User</b></td>
 					</tr>
 				</thead> 
 				<tbody>
 					<?php 
 					$no=1;
 					foreach($listretur->result() as $f){
 						
 						?>
 						
 						
 						<tr>
 							<td><?php echo $this->session->userdata('row')+$no;?></td>
 							<td  href = "#"  class="detail" data-id = "<?php echo $f->no_retur; ?>"><?php echo $f->no_retur;?>/<?php echo $f->id_supplier;?></td>
 							<td  align="center"><?php echo $f->tanggal;?></td>
 							<td><?php echo $f->nama_supplier;?></td>
 							<td  align="right"><?php echo number_format($f->total,2);?></td>
 							<td><?php echo $f->no_beli;?>/<?php echo $f->id_supplier;?>/<?php echo $f->no_reff;?></td>
 							<td><?php echo $f->keterangan;?></td>
 							<td><?php echo $f->user; ?></td>
 						</tr>
 						<?php $no++;}?>
 					</tbody>
 				</table>
 			</div>
 			<div>
 				<ul class="pagination pagination-sm no-margin pull-right">
 					<?php echo $this->pagination->create_links(); ?>
 				</ul>
 			</div>
 		</div>
 		
 	</section>
 	<div class="modal fade bd-example-modal-lg" id="ModalDetail" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
 		<div class="modal-dialog modal-lg" role="document">
 			<div class="modal-content">
 				<div class="modal-header">
 					<h5 class="modal-title" id="exampleModalLabel">Data Detail Retur</h5>
 					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
 						<span aria-hidden="true">&times;</span>
 					</button>
 				</div>
 				<div class="modal-body">
 					<table  class="table table-condensed" id = "#">
 						<thead bgcolor="#99FF99">
 							<tr>
 								
 								<th style="width:5px"> No </th>
 								<th style="width:200px"> Nama Barang </th>
 								<th style="width:100px"> QTY </th>
 								<th style="width:100px"> Satuan </th>
 								<th style="width:100px"> Harga </th>
 								<th style="width:100px"> Nilai Asing </th>
 								<th style="width:50px"> % 1 </th>
 								<th style="width:50px"> % 2 </th>
 								<th style="width:50px"> % 3 </th>
 								<th style="width:120px"> Subtotal </th>
 							</tr>
 						</thead>
 						
 						<tbody id = "datadetail">
 							
 							
 						</tbody>
 					</table>
 				</div>
 				<div class="modal-footer">
 					
 				</div>
 			</div>
 		</div>
 	</div>		
 </div>
</body>
<script src="<?php echo base_url(); ?>assets/js/jquery-1.8.3.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>		
<script src="<?php echo base_url(); ?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>


<script src="<?php echo base_url(); ?>assets/plugins/datetimepicker/jquery.datetimepicker.js"></script>

<script type="text/javascript">
	tampiltmp();
	function tampiltmp(){
		
		
	}
	
	$(".detail").click(function(){
		
		$('#ModalDetail').modal("show");

		id_barang = $(this).attr('data-id');

		$.ajax({
			type 	:'POST',
			url     :'<?php echo base_url();?>Purchase_order/detail_retur_po',
			data    :'id_barang='+id_barang,
			cache   :false,
			success :function(respond){
				
				$("#datadetail").html(respond);
			}
			
		});

	});
</script>
<script>
	
	$("#example").DataTable({
		
		
		searching   : true,
		bInfo : false,
		bLengthChange : false,
		bPaginate : false,
		ordering	:	false
		
		
	});
	$("#example2").DataTable({
		
		
		searching   : true,
		bInfo : false,
		bLengthChange : false,
		bPaginate : false
		
		
		
	});
	
	
</script>
</html>