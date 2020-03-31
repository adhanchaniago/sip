
<?php 
$no=1;
$total=0; $hasil=0;$hasil2=0;$hasil3=0;$hasil4=0;$hasil5=0;$hasil5=0;$hasil7=0;
foreach ($listretur->result() as $r) { 
	$subtotal = $r->qtyb*$r->harga_beli;
	$diskon =$r->qtyb*$r->harga_beli*$r->disc/100;
	$hasil =$subtotal-$diskon;
	$hasil2 =$hasil*$r->disc1/100;
	$hasil3 =$hasil-$hasil2;
	$hasil4 =$hasil3*$r->disc2/100;
	$hasil5 =$hasil3-$hasil4;
	$hasil6 =$hasil5*$r->ppn/100;
	$hasil7 =$hasil5+$hasil6;
	?>
	
	<tr>
		<td ><?php echo $no; ?></td>
		<td ><?php echo $r->nama_barang; ?></td>
		<td> <?php echo $r->qtyb; ?></td>
		<td> <?php echo $r->satuan_besar; ?> </td>
		<td>  Rp. <?php echo number_format($r->harga_beli,2); ?></td>
		<td> <?php echo $r->disc; ?></td>
		<td> <?php echo $r->disc1; ?></td>
		<td> <?php echo $r->disc2; ?></td>
		<td>  <?php if ($r->ppn > 0) {echo $r->ppn," %";
	}else{ echo "-";
	
}?>
</td>
<td> Rp. <?php echo number_format($hasil7,2); ?></td> <!-- Asli $hasil5 -->
</tr>
<?php  $totalan =$totalan+$hasil7; $no++;} ?> 
<?php 
$total=0; $hasil=0;$hasil2=0;$hasil3=0;$hasil4=0;$hasil5=0;$hasil6=0;$hasil7=0;$grand=0;
foreach ($listdetail->result() as $t) { 
	$subtotal = $t->qtyb*$t->harga_beli;
	$diskon =$t->qtyb*$t->harga_beli*$t->disc/100;
	$hasil =$subtotal-$diskon;
	$hasil2 =$hasil*$t->disc1/100;
	$hasil3 =$hasil-$hasil2;
	$hasil4 =$hasil3*$t->disc2/100;
	$hasil5 =$hasil3-$hasil4;
	$hasil6 =$hasil5*$t->ppn/100;
	$hasil7 =$hasil5+$hasil6;
	?>
	<?php $total=$total+$hasil7;}?>
	<?php 
											//$query1 = "SELECT * FROM tb_penjualan";
	$no_jual = $this->uri->segment(3);
	$query1 = "SELECT tb_detail_retur.no_jual, tb_detail_retur.id_barang,nama_barang,tb_detail_retur.qtyb,tb_detail_retur.satuan_besar,tb_detail_retur.harga_beli,tb_detail_retur.disc,
	tb_detail_retur.disc1 FROM tb_detail_retur INNER JOIN tb_barang ON tb_detail_retur.id_barang = tb_barang.id_barang WHERE tb_detail_retur.no_jual = '$no_jual'";
	$cari1 = $this->db->query($query1);
	
	?>
	<?php
	$h = 0;
	foreach ($cari1->result_array() as $h){
		?>
	<?php } ?>
	<tr>
		<td colspan = "2"><b>Keterangan Retur</b></td>
		<td colspan = "9"><?php echo $t->ket_retur;?></td>
	</tr>
	<tr>
		<td colspan = "9" align = "right"><b>Total Belanja</b></td>
		<td>Rp. <?php echo number_format($total,2);?></td>
	</tr>
	<?php if($r->qtyb > 0){ echo"
	<tr>
	<td colspan = 9 align = right><b>Total Retur</b></td>
	<td>Rp. " .number_format($totalan,2)."</td>
	</tr>";
}
?>
<?php if($t->nominal1 > 0){ echo"
<tr>
<td colspan = 9 align = right><b> ".strtoupper($t->ongkir1)." </b></td>
<td>Rp. " .number_format($t->nominal1,2)."</td>
</tr>";
}?>

<?php if($t->nominal > 0){ echo"
<tr>
<td colspan = 9 align = right>Tips :<b> ".strtoupper($t->tips)." </b></td>
<td>Rp. " .number_format($t->nominal,2)."</td>
</tr>";
}?>
<tr>
	<td colspan = "9" align = "right"><b>Grand Total</b></td>
	<td>Rp. <?php echo number_format($t->total,2);?></td>
</tr>
<tr>
	<tr>
	</tr>