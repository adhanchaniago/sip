<div class="box box-primary">
	<div class="box-header">
		<h3 class="box-title" style="margin-left: -9px;">Data ACC Giro Penerimaan</h3>
	</div>
	<div class="box-body">
		<div class="col-md-9" style = "width: 51% margin-left:0px;margin-top:-15px;">
			<table id = "" class = "table table-condensed example3" style = "width:650px;">
				<thead bgcolor="#99FF99">
					<td><b>No </b></td>
					<td><b>No Bukti </b></td>
					<td><b>Tanggal Acc</b></td>
					<td><b>Total</b></td>
					<td><b>Ket Giro</b></td>
				</thead>
				<tbody id = "">
					<?php 
					$no = 1;
					foreach ($acc as $d) { 
						?>

						<tr>
							<td><?php echo $no;?></td>
							<td> <?php echo $d['no_jual']; ?>/<?php echo $d['id_pelanggan']; ?></td>
							<td> <?php echo $d['tgl']; ?></td>
							<td> <?php echo number_format($d['total'],2); ?></td>
							<td> 
								<?php if ($d['acc'] == 0) {?>
									<span style="font-size:15px"><i class='fa  fa-square-o'></i></span>
									<?php
								} else{ ?>
									<span style="font-size:15px"><i class='fa fa-check-square'></i></span>
								<?php }?>
							</td>
						</tr>
						<?php $no++;} ?> 


					</tbody>
				</table>
			</div>	
		</div>
	</div>
	
	<script type="text/javascript">
		$(".example3").DataTable({
			
			
			searching   : true,
			bInfo : false,
			bLengthChange : false,
			bPaginate : true,
			ordering	:	false
			
			
		});
	</script>