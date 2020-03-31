<?php 
$total=0; $hasil=0;$hasil2=0;$hasil3=0;
foreach ($listretur->result() as $t) { 
	$subtotal = $t->qtyb*$t->harga_beli;
	$diskon =$t->qtyb*$t->harga_beli*$t->disc/100;
	$hasil =$subtotal-$diskon;
	$hasil2 =$hasil*$t->disc1/100;
	$hasil3 =$hasil-$hasil2;
	?>
	
	<tr>
		<td ><?php echo $t->nama_barang; ?></td>
		<td> <?php echo $t->qtyb; ?></td>
		<td> <?php echo $t->satuan_besar; ?> </td>
		<td>  Rp. <?php echo number_format($t->harga_beli,2); ?></td>
		<td>  <?php echo $t->disc; ?></td>
		<td>  <?php echo $t->disc1; ?></td>
		<td align = "right"> Rp. <?php echo number_format($hasil3,2); ?></td> <!-- Asli $hasil5 -->
	</tr>
	<?php $total=$total+$hasil3; } ?> 
	<tr>
		<td colspan = "6" align = right><b>Total</b></td>
		<td align = "right">Rp. <?php echo number_format($total,2); ?></td>
	</tr>
	