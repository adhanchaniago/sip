									<?php 
									foreach ($list_pembayaran as $t) { 
									?>
									
									<tr>
											<td> <?php echo $t['no_jual']; ?>/<?php echo $t['id_pelanggan']; ?>/<?php echo $t['no_reff']; ?></td>
											<td> <?php echo number_format($t['total'],2); ?></td>
											<td> <?php echo number_format($t['bayar'],2); ?></td>
											<td> <?php echo number_format($t['sisa_bayar'],2); ?></td>
											<td> <a class = "hapus-barang" href="#" data-idjual="<?= $t['no_jual']; ?>" data-user="<?= $t['user']; ?>"><i class = "fa fa-trash"></a></td>
									</tr>
									<?php } ?> 
												

                
              