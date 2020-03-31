<?php 
$total=0; $hasil=0;$hasil2=0;$hasil3=0;$hasil4=0;$hasil5=0;$hasil6=0;$hasil7=0;
$no = 1;
foreach ($list_tmp as $t) { 
	$subtotal = $t['qtyb']*$t['harga_jual'];
	$hasil = $hasil + $subtotal;
	?>
	<tr>
		<td ><?php echo $no; ?></td>
		<td ><?php echo $t['nama_barang']; ?></td>
		<td> <?php echo $t['qtyb']; ?></td>
		<td>  Rp. <?php echo number_format($t['harga_jual'],2); ?></td>
		<td> Rp. <?php echo number_format($subtotal,2); ?></td> <!-- Asli $hasil5 -->
		<td><a class="hapus-barang" href="#" data-user="<?= $t['user']; ?>" data-idbarang = "<?= $t['id_barang'];?>"><i class = "fa fa-trash"></i></a></td>
	</tr>

	<?php $no++;} ?> 
	<tr>
		<td colspan = "6"><input type="hidden" name="total" id="totals" value = "<?php echo number_format($hasil)?>" onkeyup="copytextbox12();" autocomplete="off" class="form-control" placeholder = "Total Bayar ">
		</td></tr><!-- Asli $hasil5 -->
		<script>
			function copytextbox12() {
				document.getElementById('tot').value = document.getElementById('total').value;
			}
		</script>
		
		


