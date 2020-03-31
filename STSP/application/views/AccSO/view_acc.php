<div class="box box-primary">
	<div class="box-header">
		<h3 class="box-title" style="margin-left: -9px;">Data ACC SO</h3>
	</div>
	<div class="box-body">
		<div class="col-md-9" style = "width: 51% margin-left:0px;margin-top:-15px;">
			<table id = "example2" class = "table table-condensed" style = "width:650px;">
				<thead bgcolor="#99FF99">
					<td><b>No </b></td>
					<td><b>No SO </b></td>
					<td><b>Pelanggan</b></td>
					<td><b>Tanggal</b></td>
					<td><b>Acc</b></td>
				</thead>
				<tbody>
					<?php 
					$no = 1;
					foreach ($acc as $d) { 
						?>

						<tr>
							<td><?php echo $no;?></td>
							<td>  <?php echo $d['no_so']; ?>/<?php echo $d['id_pelanggan']; ?>/<?php echo $d['no_roff']; ?></td>
							<td> <?php echo $d['nama_pelanggan']; ?></td>
							<td> <?php echo $d['tgl']; ?></td>
							<td> 
								<?php if ($d['acc'] == 0) {?>
									<span style="font-size:15px"><i class='fa  fa-square-o'></i></span>
								<?php } else{ ?>
									<span style="font-size:15px"><i class='fa fa-check-square'></i></span>
								<?php } ?>
							</td>
						</tr>
						<?php $no++;} ?> 
					</tbody>
				</table>
			</div>	
		</div>
	</div>
	<script>

		$("#example2").DataTable({


			searching   : true,
			bInfo : false,
			bLengthChange : false,
			bPaginate : true,
			ordering	:	false



		});


	</script>




