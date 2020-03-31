
<style>
	table {
		border-collapse: collapse;
		border-spacing: 0;
		width: 100%;
		border: 1px solid #ddd;
	}

	th {
		text-align: left;
		padding: 8px;
	}


</style>
<div class = "row">
	<?php echo $this->session->flashdata('message');
	?>
	<div class = "table-responsive">
		<section class="col-lg-12 connectedSortable">
			<table id = "example" class="table table-condensed"  style="width:800px">
				<thead bgcolor="#99FF99">
					<tr>
						<td width = "10px" ><b>No</b></td>
						<td width = "100px" ><b>No Retur</b></td>
						<td width = "100px" ><b>No SO</b></td>
						<td  align="center" width = "80px"><b>Tanggal</b></td>
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
							<td>
								<?php 
								if($rows->no_jual == ""){
									echo "-";
								}else{
									echo $rows->no_jual.'/'.$rows->id_pelanggan.'/'.$rows->no_reff_inv;
								} ?>
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
			</section>
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
				<div class = "table-responsive">
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
			<div class="modal-content" >
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Data Pelanggan</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class = "table-responsive">
					<table  class="table table-condensed" id = "example2" style = "width:390px;">
						<thead bgcolor="#99FF99">
							<tr>

								<th><b>Nama Pelanggan</b> </th>
								<th align="right"><b>Tambah</b></th>
							</tr>
						</thead>

						<tbody >
							<tr>
								<?php  foreach($listpelanggan->result() as $p){
									?>
									<td><?php echo $p->nama_pelanggan;?></td>
									<td align="right"><a href = "<?php echo base_url('Sales_order/input_retur2/'.$p->id_pelanggan); ?>"><span class = "btn btn-xs btn-success"><i class = "fa fa-plus"></i></span></a></td>
								<?php } ?>
							</tr>
						</tbody>
					</table>
				</div>

				<div class="modal-footer">

				</div>
			</div>
		</div>
	</div>


</div>
<script type="text/javascript">
	tampiltmp();
	function tampiltmp(){


	}

	$(".detail").click(function(){

		$('#ModalDetail').modal("show");

		id_barang = $(this).attr('data-id');

		$.ajax({
			type 	:'POST',
			url     :'<?php echo base_url();?>Sales_order/retur_detail',
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
		no_retur = $(this).attr('data-idi');
		$.ajax({
			type 	:'POST',
			url     :'<?php echo base_url();?>Sales_order/looping_cetak_retur',
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

			setTimeout('self.location.href="<?php echo base_url();?>Sales_order/input_penjualan"', 0);
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