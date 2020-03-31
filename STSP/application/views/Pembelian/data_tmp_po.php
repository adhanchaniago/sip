									<?php
									$no = 1;
									$sub = 0;
									foreach ($list_po as $t) { 
									?>
									
									<tr>
											<td> <?php echo $no; ?></td>
											<td> <?php echo $t['nama_barang'];?></td>
											<td> <?php echo $t['qty']; ?> <?php echo $t['satuan']; ?> </td>
											<td> <?php echo number_format($t['harga_jual'],2);?></td>
											<td><a class = "hapus-barang" href = "#" data-idbrg="<?= $t['id_barang']; ?>" data-use="<?= $t['user']; ?>"><i class = "fa fa-trash"></i></a></td>
									</tr>
									<?php $no++;} ?> 