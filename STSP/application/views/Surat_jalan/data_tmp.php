<?php 
foreach ($list_tmp as $t) { 
	?>
	<tr>
		<td ><?php echo $t['nama_barang']; ?></td>
		<td> <?php echo $t['satuan_besar']; ?></td>
		<td> <?php echo $t['jml_krm']; ?> </td>
		<td>
			<a class="hapus-barang" href="#" data-user="<?= $t['user']; ?>" data-barang="<?= $t['id_barang']; ?>"><i class = "fa fa-trash"></i></a>
		</td> 
	</tr>
<?php  } ?> 





