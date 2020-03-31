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
 				<?php if ($j->i_pembelian == "Y" ): ?>
 					<a class="pull-right" style="margin-right: 5px;margin-top: 5px;"> <input type="text" id="no_beli" placeholder="NO PURCHASE ORDER" autofocus="" class="form-control" style="margin-top: -3px;"></i></a>
 					<?php endif;?>
 					<div class="nav-tabs-custom">
 						<ul class="nav nav-tabs">
 							<li class="active"><a href="<?php echo base_url(); ?>pembelian/view_penjualan" data-toggle="tab"><i class="fa fa-cart-arrow-down"></i> <b>Data Pembelian</b></a></li>

 							<?php if ($j->r_pembelian == "Y" ): ?>
 								<li class=""><a href="<?php echo base_url(); ?>pembelian/view_retur" ><i class="fa fa-mail-forward"></i> <b>Data Retur Pembelian</b></a></li>
 							<?php endif;?>
 						</ul>
 					</div>
 				</div>

 				<table id = "example" class="table table-condensed" >
 					<thead bgcolor="#99FF99">
 						<tr>
 							<td width = "10px" ><b>No</b></td>
 							<td width = "60px" ><b>No Invoice</b></td>
 							<td  align="center" width = "60px"><b>Tgl Invoice</b></td>
 							<td  width = "150px"><b>Supplier</b></td>
 							<td  align="right" width = "80px"><b>Total</b></td>							
 							<td  align="right" width = "80px"><b>Sisa Tagihan</b></td>							
 							<td  align="center" width = "70px"><b>Jatuh Tempo</b></td>
 							<td align="center" width = "1%"><b>Status</b></td>
 							<td width = "100px" ><b>No Beli</b></td>
 							<td width = "100px" ><b>No PO</b></td>
 							<td width = "250px"><b>Keterangan</b></td>
 							<td width = "20px"><b>User</b></td>
 							<td width = "50px"><b>Tempo</b></td>
 							<td width = "5px"><b>Ex</b></td>
 							<?php if ($j->e_pembelian == "Y"): ?>
 								<td align="center" width = "5px"><b>E</b></td>
 							<?php endif;?>
 							<?php if ($j->r_pembelian == "Y"): ?>
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
 								<td  href = "#"  class="detail" data-id = "<?php echo $f->no_beli; ?>"><?php echo $f->no_invoice;?></td>
 								<td  align="center"><?php echo $f->tgl_invoice;?></td>
 								<td><?php echo $f->nama_supplier;?></td>
 								<td  align="right"><?php echo number_format($f->total,2);?></td>
 								<td  align="right"><?php echo number_format($f->sisa,2);?></td>
 								<td  align="center"><?php echo date('d-m-Y',strtotime($f->jatuh_tempo)); ?></td>
 								<td align="center"><?php if ($f->sisa == 0) {?>
 									<span style="width:15px;height:10px" class='btn btn-xs btn-success'></span>
 									<?php
 								} else{ ?>
 									<span style="width:15px;height:10px" class='btn btn-xs btn-danger'></span>
 								<?php }?>
 							</td>
 							<td><?php echo $f->no_beli;?>/<?php echo $f->id_supplier;?>/<?php echo $f->no_reff;?></td>
 							<td><?php echo $f->no_po;?>/<?php echo $f->id_supplier;?>/<?php echo $f->no_reff_pob;?></td>
 							<td><?php echo $f->keterangan;?></td>
 							<td><?php echo $f->user; ?></td>
 							<td><?php echo $f->tempo;?> Hari</td>
 							<td><?php echo $f->edit;?></td>
 							<?php if ($j->e_pembelian == "Y"): ?>
 								<td align="center">
 									<?php if ($f->retur ==0) {?>
 										<a href = "#" data-nobel = "<?php echo $f->no_beli;?>" class="btn btn-xs btn-success edit"><i class = "fa fa-edit"></i></a>
 									<?php }else{?>
 										<a href = "<?php echo base_url('Pembelian/edit_pembelian/'.$f->no_beli);?>" class="btn btn-xs btn-success disabled"><i class = "fa fa-edit"></i></a>
 									<?php }?>
 								</td>
 							<?php endif;?>
 							<?php if ($j->r_pembelian == "Y"): ?>
 								<td align="center">
 									<?php if($f->acc == 0){?>
 										<a href = "<?php echo base_url('Pembelian/input_retur/'.$f->no_beli);?>" title='Retur' class="btn btn-xs btn-primary"><i class = "fa fa-mail-forward"></i></a>
 									<?php }else{?>
 										<a href = "<?php echo base_url('Pembelian/input_retur/'.$f->no_beli);?>" title='Retur' class="btn btn-xs btn-primary disabled"><i class = "fa fa-mail-forward"></i></a>
 									<?php }?>
 								</td>
 							<?php endif;?>
 						</tr>
 						<?php $no++;}?>
 					</tbody>
 				</table>
 			</div>
 		</div>
 		<div>
 			<ul class="pagination pagination-sm no-margin pull-right">
 				<?php echo $this->pagination->create_links(); ?>
 			</ul>
 		</div>
 	</section>
 	<div class="modal fade bd-example-modal-lg" id="ModalDetail" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
 		<div class="modal-dialog modal-lg" role="document">
 			<div class="modal-content">
 				<div class="modal-header">
 					<h5 class="modal-title" id="exampleModalLabel">Data Detail Pembelian</h5>
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
 	
 	<div class="modal fade bd-example-modal-lg pelanggan" id="Modalorder" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
 		<div class="modal-dialog modal-lg" role="document">
 			<div class="modal-content" style="width:429px; margin-left:250px">
 				<div class="modal-header">
 					<h5 class="modal-title" id="exampleModalLabel">Data Purchase Order</h5>
 					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
 						<span aria-hidden="true">&times;</span>
 					</button>
 				</div>
 				<br>
 				<div class="modal-body" style = "width:300px;">
 					<table  class="table table-condensed" id = "example2" style = "width:390px;">
 						<thead bgcolor="#99FF99">
 							<tr>

 								<th><b>No PO</b> </th>
 								<th><b>Nama Supplier</b> </th>
 								<th style="align:right"><b>Tambah</b> </th>
 							</tr>
 						</thead>

 						<tbody >
 							<tr>
 								<?php
 								$query1 = "SELECT * FROM tb_pembelianpo INNER JOIN tb_supplier ON tb_supplier.id_supplier = tb_pembelianpo.id_supplier 
 								WHERE tb_pembelianpo.status = 0 ORDER BY tb_pembelianpo.no_beli DESC";
 								$cari1 = $this->db->query($query1);

 								?>
 								<?php
 								foreach ($cari1->result_array() as $p){
 									?>
 									<td><?php echo $p['no_beli']?>/<?php echo $p['id_supplier'];?>/<?php echo $p['no_reff'];?></td>
 									<td><?php echo $p['nama_supplier']?></td>
 									<td align="right"><a href = "<?php echo base_url('pembelian/input_pembelian/'.$p['no_beli']); ?>"><span class = "btn btn-xs btn-success"><i class = "fa fa-plus"></i></span></a></td>

 								</tr>
 							<?php } ?>
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

		no_beli = $(this).attr('data-id');

		$.ajax({
			type 	:'POST',
			url     :'<?php echo base_url();?>Pembelian/detail_data',
			data    :'no_beli='+no_beli,
			cache   :false,
			success :function(respond){
				
				$("#datadetail").html(respond);
			}
			
		});

	});
	$(".detail").click(function(){
		
		$('#ModalDetail').modal("show");

		id_barang = $(this).attr('data-id');

		$.ajax({
			type 	:'POST',
			url     :'<?php echo base_url();?>Pembelian/detail_retur',
			data    :'id_barang='+id_barang,
			cache   :false,
			success :function(respond){
				$("#detairetur").html(respond);
			}
			
		});

	});
	$(".detail1").click(function(){
		
		$('#Modal').modal("show");

		no_jual = $(this).attr('data-idi');

		$.ajax({
			type 	:'POST',
			url     :'<?php echo base_url();?>Penjualan/penjualan_data',
			data    :'no_jual='+no_jual,
			cache   :false,
			success :function(respond){
				
				$("#detailpenjualan").html(respond);
			}
			
		});

	});
	$(".edit").click(function(){
		$('#ModalEdit').modal("show");
		$('#alasan_edit').focus();
		no_beli = $(this).attr('data-nobel');
		$.ajax({
			type 	:'POST',
			url     :'<?php echo base_url();?>Pembelian/looping_edit',
			data    :'no_beli='+no_beli,
			cache   :false,
			success :function(respond){
				$("#keterangan").html(respond);
			}
		});
	});
	
	var site = "<?php echo site_url();?>";
 		$(function(){
 			$('#no_beli').autocomplete({
 				serviceUrl: site+'Pembelian/get_data_no_purchase/',
 				onSelect: function (suggestion) {
 					window.location.href = "<?php echo base_url();?>Pembelian/input_pembelian/"+suggestion.no_beli;

 				}
 			});
 		});
	
</script>
<script type="text/javascript">
	$(document).on('keydown', 'body', function(e){
		var charCode = ( e.which ) ? e.which : event.keyCode;

	if(charCode == 118) //F7
	{
		BarisBaru();
		return false;
	}

	if(charCode == 13) //enter
	{
		$('#pel').click();
	}
	
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
		bPaginate : false,
		ordering	:	false
		
		
		
	});
	
	
</script>
</html>