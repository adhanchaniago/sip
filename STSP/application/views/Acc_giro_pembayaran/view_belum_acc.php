<div class="box box-primary">
	<div class="box-header">
		<h3 class="box-title" style="margin-left: -9px;">Data Belum ACC Giro Pembayaran</h3>
	</div>
	<div class="box-body">
		<div class="col-md-9" style = "width: 51% margin-left:0px;margin-top:-15px;">
			<table id = "example3" class = "table table-condensed" style = "width:650px;">
				<thead bgcolor="#99FF99">
					<td><b>No </b></td>
					<td><b>No Bukti </b></td>
					<td><b>Tanggal </b></td>
					<td><b>Total</b></td>
					<td><b>Ket Giro</b></td>
				</thead>
				<tbody id = "">
					<?php 
					$no = 1;
					foreach ($belumacc as $d) { 
						?>

						<tr>
							<td><?php echo $no;?></td>
							<td> <?php echo $d['no_bukti']; ?>/<?php echo $d['id_supplier']; ?></td>
							<td> <?php echo $d['tgl_bayar']; ?></td>
							<td> <?php echo number_format($d['giro'],2); ?></td>
							<td> <?php echo $d['ket_giro']; ?></td>
							
						</tr>
						<?php $no++;} ?> 

					</tbody>
				</table>
			</div>	
		</div>
	</div>
	
	<script type="text/javascript">
		$("#example3").DataTable({
			
			
			searching   : true,
			bInfo : false,
			bLengthChange : false,
			bPaginate : true,
			ordering	:	false
			
			
		});
	</script>