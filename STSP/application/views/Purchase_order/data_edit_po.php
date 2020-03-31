									
									<tr>
											<td ><?php echo $p['nama_barang']; ?></td>
											<td> <?php echo number_format($p['harga_jual'],2);?></td>
											<td ><?php echo $p['qty']; ?> <?php echo $p['satuan']; ?></td>
									</tr>
									
									<tr>
									<td colspan = "3" align = "right"><a href = "<?php echo base_url('Pembelian/cetak_po/'.$t->no_po);?>" class = "btn btn-primary">Cetak</a></td>
									</tr>
											
									