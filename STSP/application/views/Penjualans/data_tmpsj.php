<?php 
$total=0; $hasil=0;$hasil2=0;$hasil3=0;
$no = 1;
									//$hasil4=0;$hasil5=0;
foreach ($list_tmp as $t) { 
	
	?>
	
	<tr>
		<td ><?php echo $no; ?></td>
		<td ><?php echo $t['nama_barang']; ?></td>
		<td> <?php echo $t['qtyb']; ?> <?php echo $t['satuan_besar']; ?></td>
		<td> <?php echo $t['jml_krm']; ?>  <?php echo $t['satuan_besar']; ?></td>
		<td> <?php echo $t['sisa_kirim']; ?>  <?php echo $t['satuan_besar']; ?></td>
	</tr>
	<?php  $total=$total+$hasil3; $no++;} ?> 
	<!-- Asli $hasil5 -->
	
	
	

	
	