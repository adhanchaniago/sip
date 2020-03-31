									<?php 
									foreach ($list_pembayaran as $t) { 
									?>
									
									<tr>
											<td> <?php echo $t['no_beli']; ?>/<?php echo $t['id_supplier']; ?>/<?php echo $t['no_reff']; ?></td>
										
											<td> <?php echo number_format($t['total'],2); ?></td>
											<td> <?php echo number_format($t['bayar'],2); ?></td>
											<td> <?php echo number_format($t['sisa_bayar'],2); ?></td>
											<td> <a class = "hapus-barang" href="#" data-idbeli="<?= $t['no_beli']; ?>" data-user="<?= $t['user']; ?>"><i class = "fa fa-trash"></a></td>
									</tr>
									<?php } ?> 
												

                
              