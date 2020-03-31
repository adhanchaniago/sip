<?php 
foreach ($listdetail->result() as $t) { 
	?>
	
	<tr>
		<td> <?php echo $t->nama_barang; ?></td>
		<td> <?php echo  $t->qtyb ; ?> <?php echo $t->satuan_besar; ?></td>
		<td> <?php echo $t->jml_krm; ?> <?php echo $t->satuan_besar; ?></td>
		<td> <?php echo $t->sisa_kirim; ?> <?php echo $t->satuan_besar; ?></td>
	<?php } ?> 
	

	
	