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

 		th,  {
 			text-align: center;
 			padding: 8px;
 		}


 	</style>
 </head>
 <body>	 
 	<div class = "row">
 		<section class="col-lg-12 connectedSortable">

 			<?php 
 			$user = $this->session->userdata('username');
 			$query = "select * from menu WHERE level = '$user'";
 			$j = $this->db->query($query);
 			$j->num_rows();
 			
 			?>
 			<?php foreach ($j->result() as $j){ 
 			}
 			?>
 			<div class="box box-primary">
 				<div class="box box-primary" style="margin-top: -3px;">
 					<?php if ($j->i_po == "Y"): ?>
 						<a href = "<?php echo base_url();?>Purchase_order/input_purchase" class="btn btn-sm btn-primary btn-sm pull-right" title="Collapse"style="margin-right: 5px;margin-top: 5px;" >Purchase Order</i></a>
 					<?php endif;?>
 					<div class="nav-tabs-custom">
 						<ul class="nav nav-tabs">
 							<li class="active"><a href="<?php echo base_url(); ?>Purchase_order/view_purchase" data-toggle="tab"><i class="fa fa-cart-arrow-down"></i> <b>Data Purchase Order</b></a></li>
 							<?php if ($j->r_pembelian == "Y"): ?>
 								<li class=""><a href="<?php echo base_url(); ?>Purchase_order/view_retur" ><i class="fa fa-mail-forward"></i> <b>Data Retur Purchase Order</b></a></li>
 							<?php endif;?>
 						</ul>
 					</div>
 				</div>
 				<div class="table-response">
 					<table id = "example" class="table table-condensed" >
 						<thead bgcolor="#99FF99">
 							<tr>
 								<td width = "10px" ><b>No</b></td>
 								<td width = "100px" ><b>No PO</b></td>
 								<td  align="center" width = "60px"><b>Tgl PO</b></td>
 								<td  width = "150px"><b>Supplier</b></td>
 								<td  align="right" width = "80px"><b>Total</b></td>				
 								<td align="center" width = "1%"><b>Status</b></td>
 								<td width = "250px"><b>Keterangan</b></td>
 								<td width = "20px"><b>User</b></td>
 								<td width = "5px"><b>Ex</b></td>
 								<?php if ($j->e_po == "Y"): ?>
 									<td align="center" width = "5px"><b>E</b></td>
 								<?php endif;?>
 								<?php if ($j->r_po == "Y"): ?>
 									<td align="center" width = "5px"><b>R</b></td>
 								<?php endif;?>
 							</tr>
 						</thead> 
 						<tbody>
 							<?php 
 							$no=1;
 							foreach($pembelian->result() as $f){

 								?>


 								<tr>
 									<td><?php echo $this->session->userdata('row')+$no;?></td>
 									<td href = "#"  class="detail" data-id = "<?php echo $f->no_beli; ?>"><?php echo $f->no_beli;?>/<?php echo $f->id_supplier;?>/<?php echo $f->no_reff;?></td>
 									<td  align="center"><?php echo $f->tgl_invoice;?></td>
 									<td><?php echo $f->nama_supplier;?></td>
 									<td  align="right"><?php echo number_format($f->total,2);?></td>
 									<td align="center"><?php if ($f->status == 1) {?>
 										<span style="width:15px;height:10px" class='btn btn-xs btn-success'></span>
 										<?php
 									} else{ ?>
 										<span style="width:15px;height:10px" class='btn btn-xs btn-danger'></span>
 									<?php }?>
 								</td>

 								<td><?php echo $f->ket;?></td>
 								<td><?php echo $f->user; ?></td>
 								<td><?php echo $f->edit;?></td>
 								<?php if ($j->e_po == "Y"): ?>
 									<td align="center">
 										<?php if ($f->retur == 0) {?>
 											<a href = "#" data-nobel = "<?php echo $f->no_beli;?>" class="btn btn-xs btn-success edit"><i class = "fa fa-edit"></i></a>
 										<?php }else{?>
 											<a href = "<?php echo base_url('Purchase_order/edit_pembelian/'.$f->no_beli);?>" class="btn btn-xs btn-success disabled"><i class = "fa fa-edit"></i></a>
 										<?php }?>
 									</td>
 								<?php endif;?>
 								<?php if ($j->r_po == "Y"): ?>
 									<td align="center">
 										<?php if($f->acc == 0){?>
 											<a href = "<?php echo base_url('Purchase_order/input_retur/'.$f->no_beli);?>" title='Retur' class="btn btn-xs btn-primary"><i class = "fa fa-mail-forward"></i></a>
 										<?php }else{?>
 											<a href = "<?php echo base_url('Purchase_order/input_retur/'.$f->no_beli);?>" title='Retur' class="btn btn-xs btn-primary disabled"><i class = "fa fa-mail-forward"></i></a>
 										<?php }?>
 									</td>
 								<?php endif;?>
 							</tr>
 							<?php $no++;}?>
 						</tbody>
 					</table>
 				</div>
 			</div>
 		</div>
 	</section>
 	<div class="modal fade bd-example-modal-lg" id="ModalDetail" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
 		<div class="modal-dialog modal-lg" role="document">
 			<div class="modal-content">
 				<div class="modal-header">
 					<h5 class="modal-title" id="exampleModalLabel">Data Detail Purchase Order</h5>
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
 								<th style="width:100px"> Harga</th>
 								<th style="width:100px"> Nilai Asing</th>
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
 	<div class="modal fade bd-example-modal-lg" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
 		<div class="modal-dialog modal-lg" role="document">
 			<div class="modal-content" style="width:560px;margin-left: 185px;">
 				<div class="modal-header">
 					<h5 class="modal-title" id="exampleModalLabel">Alasan Edit</h5>
 				</div>
 				<div class="modal-body" id = "keterangan">
 					
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
			url     :'<?php echo base_url();?>Purchase_order/detail_data',
			data    :'id_barang='+id_barang,
			cache   :false,
			success :function(respond){
				
				$("#datadetail").html(respond);
			}
			
		});

	});
	$(".edit").click(function(){
		$('#ModalEdit').modal("show");
		$('#alasan_edit').focus();
		no_beli = $(this).attr('data-nobel');
		$.ajax({
			type 	:'POST',
			url     :'<?php echo base_url();?>Purchase_order/looping_edit',
			data    :'no_beli='+no_beli,
			cache   :false,
			success :function(respond){
				$("#keterangan").html(respond);
			}
		});
	});
	
	document.onkeydown = function (e) {
		switch (e.keyCode) {
			
			case 13:
			e.preventDefault();
			
			setTimeout('self.location.href="<?php echo base_url();?>Purchase_order/input_purchase"', 0);
			break;
			
			
		}
	}
	
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