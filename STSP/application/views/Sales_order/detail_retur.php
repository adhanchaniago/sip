<?php 
$totalan=0;$hasil4=0;$hasil5=0;$hasil6=0;
foreach ($listretur->result() as $r) { 
	$sub = $r->qtyb*$r->harga_beli;
	$diskon =$r->qtyb*$r->harga_beli*$r->disc/100;
	$hasil4 =$sub-$diskon;
	$hasil5 =$hasil4*$r->disc1/100;
	$hasil6 =$hasil4-$hasil5;

	?>

	<tr>
		<td ><?php echo $r->nama_barang; ?></td>
		<td> <?php echo $r->qtyb; ?></td>
		<td> <?php echo $r->satuan_besar; ?> </td>
		<td>  Rp. <?php echo number_format($r->harga_beli,2); ?></td>
		<td> <?php echo $r->disc; ?> </td>
		<td> <?php echo $r->disc1; ?> </td>
		<td> Rp. <?php echo number_format($hasil6,2); ?></td> 
	</tr>
	<?php  $totalan =$totalan+$hasil6;
} ?> 
<?php 
$total=0; $hasil=0;$hasil2=0;$hasil3=0;
foreach ($listdetail->result() as $t) { 
	$subtotal = $t->qtyb*$t->harga_beli;
	$diskon =$t->qtyb*$t->harga_beli*$t->disc/100;
	$hasil =$subtotal-$diskon;
	$hasil2 =$hasil*$t->disc1/100;
	$hasil3 =$hasil-$hasil2;
	?>
	<?php $total=$total+$hasil3; 
}?>
<?php 
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
	<td colspan = "1"><b>Keterangan Retur</b></td>
	<td colspan = "6"><?php echo $t->ket_retur;?></td>
</tr>
