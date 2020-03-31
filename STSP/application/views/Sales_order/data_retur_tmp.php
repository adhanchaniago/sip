									<?php 
									$total=0; $hasil=0;$hasil2=0;$hasil3=0;
									$no = 1;
									//$hasil4=0;$hasil5=0;
									foreach ($list_tmp as $t) { 
									$subtotal = $t['qtyb']*$t['harga_beli'];
									$diskon =$t['qtyb']*$t['harga_beli']*$t['disc']/100;
									$hasil =$subtotal-$diskon;
									$hasil2 =$hasil*$t['disc1']/100;
									$hasil3 =$hasil-$hasil2;
									?>
									<tr>
											<td ><?php echo $no++; ?></td>
											<td ><?php echo $t['nama_barang']; ?></td>
											<td> <?php echo $t['qtyb']; ?></td>
											<td> <?php echo $t['satuan_besar']; ?> </td>
											<td>  Rp. <?php echo number_format($t['harga_beli'],2); ?></td>
											<td> <?php echo $t['disc']; ?> </td>
											<td> <?php echo $t['disc1']; ?> </td>
											<td> Rp. <?php echo number_format($hasil3,2); ?></td>
											<td><a class="hapus-retur" href="" data-idbrg="<?= $t['id_barang']; ?>" data-user="<?= $t['user']; ?>"><i class = "fa fa-trash"></a></td>
											</tr>
									<?php  $total=$total+$subtotal; $no;}?> <!-- Asli $hasil5 -->
									 <!-- Asli $hasil5 -->
				
		
		

                
              