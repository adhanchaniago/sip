
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
<?php echo $this->session->flashdata('message');
?>
<?php 
$user = $this->session->userdata('username');
$query = "select * from menu WHERE level = '$user'";
$j = $this->db->query($query);
$j->num_rows();

?>
<?php foreach ($j->result() as $j){ 
}
?>

<div class="row">

	<div class="col-sm-12 table-responsive">
		<table id = "example" class="table table-condensed" style="width:800px">
			<thead bgcolor="#99FF99">
				<tr>
					<td width = "10px" ><b>No</b></td>
					<td width = "100px" ><b>No SO</b></td>
					<td  align="center" width = "50px"><b>Tgl SO</b></td>
					<td  width = "100px"><b>Pelanggan</b></td>
					<td  align="right" width = "80px"><b>Total</b></td>
					<td width = "5px"><b>C</b></td>
					<td align="center" width = "1%"><b>Status</b></td>
					<td width = "250px"><b>Keterangan</b></td>
					<td width = "20px"><b>User</b></td>
					<?php if ($j->r_penjualan == "Y" ): ?>
						<td align="center" width = "40px"><b>A</b></td>
					<?php endif;?>
				</tr>
			</thead> 
			<tbody>
				<?php 
				$no=1;
				foreach($penjualan->result() as $row){
					?>
					<tr>
						<td><?php echo $this->session->userdata('row')+$no; ?></td>
						<td  href = "#"  class="detail" data-id = "<?php echo $row->no_jual; ?>"><?php echo ucwords($row->no_jual); ?>/<?php echo ucwords($row->id_pelanggan);?>/<?php echo ucwords($row->no_reff);?></td>
						<td  align="center"><?php echo ucwords($row->tgl_invoice); ?></td>
						<td><?php echo ucwords($row->nama_pelanggan);?></td>
						<td  align="right"><?php echo ucwords(number_format($row->total,2));?></td>
						<td><?php echo ucwords($row->cetak); ?></td>
						<td align="center"><?php if ($row->stok <= 0) {?>
							<span style="width:15px;height:10px" class='btn btn-xs btn-success'></span>
							<?php
						} else{ ?>
							<span style="width:15px;height:10px" class='btn btn-xs btn-danger'></span>
						<?php }?>
					</td>
					<td><?php echo ucwords($row->keterangan);?></td>
					<td><?php echo ucwords($row->user); ?></td>
					<?php if ($j->r_penjualan == "Y" ): ?>
						<td align="center">
							<?php if( $row->status_kirim == 0 AND $row->total > 0 ){?>
								<a href = "<?php echo base_url('Sales_order/input_retur_noju/'.$row->no_jual);?>" title='Retur' class="btn btn-xs btn-primary"><i class = "fa fa-mail-forward"></i></a>
							<?php }else{?>
								<a href = "<?php echo base_url('Sales_order/input_retur_noju/'.$row->no_jual);?>" title='Retur' class="btn btn-xs btn-primary disabled"><i class = "fa fa-mail-forward"></i></a>
							<?php }?>
						</td>
					<?php endif;?>
				</tr>
				<?php $no++;}?>
			</tbody>
		</table>
	</div>
</div>

<div class="modal fade bd-example-modal-lg" id="ModalDetail" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content" style="width: 100%">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Data Detail Sales Order</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="table-responsive">
				<table  class="table table-condensed" id = "#">
					<thead bgcolor="#99FF99">
						<tr>

							<th> Nama Barang </th>
							<th> QTY </th>
							<th> Satuan </th>
							<th> Harga </th>
							<th> % 1 </th>
							<th> % 2 </th>
							<th> Subtotal </th>
						</tr>
					</thead>

					<tbody id = "datadetail">


					</tbody>
				</table>
				<hr>

			</div>
		</div>
	</div>
</div>
<div class="modal fade bd-example-modal-lg" id="Modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Data Penjualan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="table-responsive">
				<div class="modal-body">
					<table  class="table table-condensed" id = "#">
						<thead>
							<tr>

								<th style="width:200px"> Nama Barang </th>
								<th style="width:100px"> QTY </th>
								<th style="width:100px"> Satuan </th>
								<th style="width:100px"> Harga </th>
								<th style="width:50px"> % 1 </th>
								<th style="width:50px"> % 2 </th>
								<th style="width:100px"> Subtotal </th>
							</tr>
						</thead>

						<tbody id = "detailpenjualan">


						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade bd-example-modal-lg" id="ModalCetak" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
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
<div class="modal fade bd-example-modal-lg" id="ModalBatal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Pembatalan</h5>
			</div>
			<div class="modal-body" id = "keterangan4">

			</div>
		</div>
	</div>
</div>


<script src="<?php echo base_url(); ?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>

<script type="text/javascript">

	tampiltmp();
	function tampiltmp(){


	}


	$(".detail").click(function(){

		$('#ModalDetail').modal("show");

		id_barang = $(this).attr('data-id');

		$.ajax({
			type 	:'POST',
			url     :'<?php echo base_url();?>Sales_order/detail_data',
			data    :'id_barang='+id_barang,
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
			url     :'<?php echo base_url();?>Sales_order/detail_retur',
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
			url     :'<?php echo base_url();?>Sales_order/penjualan_data',
			data    :'no_jual='+no_jual,
			cache   :false,
			success :function(respond){

				$("#detailpenjualan").html(respond);
			}

		});

	});
	$(".cetak").click(function(){
		$('#ModalCetak').modal("show");
		$('#alasan_cetak').focus();
		no_jual = $(this).attr('data-idi');
		$.ajax({
			type 	:'POST',
			url     :'<?php echo base_url();?>Sales_order/looping_cetak',
			data    :'no_jual='+no_jual,
			cache   :false,
			success :function(respond){
				$("#keterangan").html(respond);
			}
		});
	});
	$(".batal").click(function(){
		$('#ModalBatal').modal("show");
		no_jual = $(this).attr('data-idiii');
		$.ajax({
			type 	:'POST',
			url     :'<?php echo base_url();?>Sales_order/looping_batal',
			data    :'no_jual='+no_jual,
			cache   :false,
			success :function(respond){
				$("#keterangan4").html(respond);
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