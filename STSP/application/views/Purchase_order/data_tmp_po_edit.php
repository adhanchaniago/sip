									<?php
									$no = 1;
									$tot = 0;
									foreach ($list_po as $t) { 
									$tot = $tot + $t['qty'];
									?>
									
									<tr>
											<td> <?php echo $no; ?></td>
											<td> <?php echo $t['id_barang'];?></td>
											<td> <?php echo number_format($t['harga_jual'],2);?></td>
											<td> <?php echo $t['qty']; ?> <?php echo $t['satuan']; ?> </td>
											<td><a class = "hapus-barang" href = "#" data-idbrg="<?= $t['id_barang']; ?>" data-use="<?= $t['user']; ?>"><i class = "fa fa-trash"></i></a></td>
									</tr>
									<?php $no++;} ?> 