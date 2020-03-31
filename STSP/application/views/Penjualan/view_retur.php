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
 			text-align: left;
 			padding: 8px;
 		}


 	</style>

 </head>
 <body>	 
 	<div class = "row">
 		<?php echo $this->session->flashdata('message');
 		?>
 		<section class="col-lg-12 connectedSortable">
 			<div class="box box-primary">
 				<div class="nav-tabs-custom">
 					<ul class="nav nav-tabs">
 						<?php 
 						$user = $this->session->userdata('username');
 						$query = "select * from menu WHERE level = '$user'";
 						$j = $this->db->query($query);
 						$j->num_rows();

 						?>
 						<?php foreach ($j->result() as $j){ 
 						}
 						?>
 						<?php if ($j->penjualan == "Y" ): ?>
 							<li class=""><a href="<?php echo base_url(); ?>Penjualan/view_penjualan" ><i class="fa fa-cart-arrow-down"></i> <b>Data Sales Order</b></a></li>
 						<?php endif;?>

 						<!--- <li class=""><a href="<?php echo base_url(); ?>Penjualan_Sample/view_penjualan_sample"><i class="fa fa-cart-arrow-down"></i> <b>Data Penjualan Non Data</b></a></li> --->

 						<li class="active"><a href="<?php echo base_url(); ?>Penjualan/view_retur" data-toggle="tab"><i class="fa fa-mail-forward"></i> <b>Data Retur Sales Order</b></a></li>
 					</ul>
 				</div>
 			</div>
 			<table id = "example" class="table table-condensed" >
 				<thead bgcolor="#99FF99">
 					<tr>
 						<td width = "10px" ><b>No</b></td>
 						<td width = "100px" ><b>No Retur</b></td>
 						<td width = "100px" ><b>No SO</b></td>
 						<td  align="center" width = "50px"><b>Tanggal</b></td>
 						<td  width = "100px"><b>Pelanggan</b></td>
 						<td  align="right" width = "80px"><b>Total</b></td>
 						<td  align="center" width = "80px"><b>C</b></td>
 						<td width = "250px"><b>Keterangan</b></td>
 						<td width = "20px"><b>User</b></td>
 					</tr>
 				</thead> 
 				<tbody>
 					<?php 
 					$no=1;
 					foreach($retur->result() as $rows){

 						?>


 						<tr>
 							<td><?php echo $no;?></td>
 							<td href = "#" class="detail" data-id = "<?php echo $rows->no_retur; ?>"><?php echo $rows->no_retur;?>/<?php echo $rows->id_pelanggan;?></td>
 							<td><?php 
 							if($rows->no_jual == ""){
 								echo "-";
 							}else{
 								echo $rows->no_jual.'/'.$rows->id_pelanggan.'/'.$rows->no_reff_inv;
 							}
 							?>
 						</td>
 						<td  align="center"><?php echo date('d-m-Y', strtotime($rows->tanggal));?></td>
 						<td><?php echo $rows->nama_pelanggan;?></td>
 						<td  align="right"><?php echo number_format($rows->total,2);?></td>
 						<td  align="center"><?php echo $rows->cetak;?></td>
 						<td><?php echo $rows->keterangan;?></td>
 						<td><?php echo $rows->user ?></td>
 					</tr>
 					<?php $no++;}?>
 				</tbody>
 			</table>
 		</div>
 	</div>
 </div>
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

 							<th style="width:200px"> Nama Barang </th>
 							<th style="width:100px"> QTY </th>
 							<th style="width:100px"> Satuan </th>
 							<th style="width:100px"> Harga </th>
 							<th style="width:50px"> % 1 </th>
 							<th style="width:50px"> % 2 </th>
 							<td style="width:120px" align = "right"> <b>Subtotal</b> </td>
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
 <div class="modal fade bd-example-modal-lg pelanggan" id="ModalPelanggan" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
 	<div class="modal-dialog modal-lg" role="document">
 		<div class="modal-content" style="width:429px; margin-left:250px">
 			<div class="modal-header">
 				<h5 class="modal-title" id="exampleModalLabel">Data Pelanggan</h5>
 				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
 					<span aria-hidden="true">&times;</span>
 				</button>
 			</div>
 			<br>
 			<div class="modal-body" style = "width:300px;">
 				<table  class="table table-condensed" id = "example2" style = "width:390px;">
 					<thead bgcolor="#99FF99">
 						<tr>

 							<th><b>Nama Pelanggan</b> </th>
 							<th align="right"><b>Tambah</b></th>
 						</tr>
 					</thead>

 					<tbody >
 						<tr>
 							<?php 
 							foreach($listpelanggan->result() as $p){
 								?>
 								<td><?php echo $p->nama_pelanggan;?></td>
 								<td align="right"><a href = "<?php echo base_url('Penjualan/input_retur2/'.$p->id_pelanggan); ?>"><span class = "btn btn-xs btn-success"><i class = "fa fa-plus"></i></span></a></td>
 							</tr>
 							<?php
 						}
 						?>
 					</tbody>
 				</table>
 			</div>

 			<div class="modal-footer">

 			</div>
 		</div>
 	</div>
 </div>
 <div class="modal fade bd-example-modal-lg" id="ModalCetak" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
 	<div class="modal-dialog modal-lg" role="document">
 		<div class="modal-content" style="width:560px;margin-left: 185px;">
 			<div class="modal-header">
 				<h5 class="modal-title" id="exampleModalLabel">Alasan</h5>
 			</div>
 			<div class="modal-body" id = "keterangan">

 			</div>
 			<div class="modal-footer">

 			</div>
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
			url     :'<?php echo base_url();?>Penjualan/retur_detail',
			data    :'id_barang='+id_barang,
			cache   :false,
			success :function(respond){

				$("#datadetail").html(respond);
			}

		});

	});
	$(".cetak").click(function(){
		$('#ModalCetak').modal("show");
		$('#alasan_cetak').focus();
		no_retur = $(this).attr('data-id');
		$.ajax({
			type 	:'POST',
			url     :'<?php echo base_url();?>Penjualan/looping_cetak_retur',
			data    :'no_retur='+no_retur,
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

			setTimeout('self.location.href="<?php echo base_url();?>Penjualan/input_penjualan"', 0);
			break;

			
		}
	}
</script>
<script>

	$("#example").DataTable({


		searching   : true,
		bInfo : false,
		bLengthChange : false,
		bPaginate : true,
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