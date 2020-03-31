<?php 
$no=1;
$total=0; $hasil=0;$hasil2=0;$hasil3=0;$hasil4=0;$hasil5=0;$hasil6=0;$hasil7=0;$dolar=0;$subdolar=0;$subdolar1=0;
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
	$dolar = $t->harga_beli*$t->kurs_tukar;
	$subdolar = $hasil7*$t->kurs_tukar;
	$subdolar1 = $subdolar1 + $subdolar;
	?>
	
	<tr>
		<td ><?php echo $no; ?></td>
		<td ><?php echo $t->nama_barang; ?></td>
		<td> <?php echo $t->qtyb; ?></td>
		<td> <?php echo $t->satuan_besar; ?> </td>
		<td>  Rp. <?php echo number_format($dolar,2); ?></td>
		<td>  <?php  if($t->kode_mu != "RP"){
				echo $t->simbol.' '.number_format($t->harga_beli,2);
		}else{
			echo "-";
		}?></td>
		<td>  <?php echo $t->disc; ?></td>
		<td>  <?php echo $t->disc1; ?></td>
		<td>  <?php echo $t->disc2; ?></td>
		<td> Rp. <?php echo number_format($subdolar,2); ?></td> <!-- Asli $hasil5 -->
	</tr>
	<?php $total=$total+$hasil7;$total1=$total+$hasil7; $no++;} ?> 
	<tr>
		<td colspan = "2"><b>Keterangan</b></td>
		<td colspan = "9"><?php echo $t->keterangan;?></td>
	</tr>
	<tr>
		<td colspan = "9" align = "right"><b>Total Retur</b></td>
		<td>Rp. <?php echo number_format($total*$t->kurs_tukar,2);?></td>
	</tr>
	<?php if($t->potongan > 0){ echo" <tr>
	<td colspan = 9 align = right><b> Potongan </b></td>
	<td>Rp. " .number_format($t->potongan,2)."</td>
	</tr>";
}?>
<tr>
	<td colspan = "9" align = "right"><b>Grand Total</b></td>
	<td>Rp. <?php echo number_format($t->grand_total,2);?></td>
</tr>
<tr>
	<?php if($t->cash > 0){ echo"
	<tr>
	<td colspan = 9 align = right><b> Cash </b></td>
	<td>Rp. " .number_format($t->cash,2)."</td>
	</tr>";
}?>
<?php if($t->transfer > 0){ echo"
<tr>
<td colspan = 9 align = right><b> Transfer </b></td>
<td>".$t->bank2." | Rp. " .number_format($t->transfer,2)."</td>
</tr>";
}?>
<?php if($t->nominal1 > 0){ echo"
<tr>
<td colspan = 9 align = right><b> ".strtoupper($t->ongkir1)."</b></td>
<td>Rp. " .number_format($t->nominal1,2)."</td>
</tr>";
}?>

<?php if($t->nominal > 0){ echo"
<tr>
<td colspan = 9 align = right>Tips :<b> ".strtoupper($t->tips)." </b></td>
<td>Rp. " .number_format($t->nominal,2)."</td>
</tr>";
}?>

<?php if($t->kode_mu !=  "RP"){ echo"
<tr>
<td colspan = 9 align = right><b>Total Nilai ASING</b></td>
<td>".$t->simbol.". ".number_format($subdolar1/$t->kurs_tukar,2)."</td>
</tr>";
}?>

<tr>
</tr>