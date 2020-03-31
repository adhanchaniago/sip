									<?php 
									$total=0; $hasil=0;$hasil2=0;$hasil3=0;
									//$hasil4=0;$hasil5=0;
									foreach ($listdetail->result() as $t) { 
									$subtotal = $t->qtyb*$t->harga_beli;
									$diskon =$t->qtyb*$t->harga_beli*$t->disc/100;
									$hasil =$subtotal-$diskon;
									//$hasil2 =$hasil*$t->disc1/100;
									//$hasil3 =$hasil-$hasil2;
								//	$hasil4 =$hasil3*$t->disc2/100;
								//	$hasil5 =$hasil3-$hasil4;
									?>
									
									<tr>
											<td ><?php echo $t->nama_barang; ?></td>
											<td> <?php echo $t->qtyb; ?></td>
											<td>  Rp. <?php echo number_format($t->harga_beli,2); ?></td>
											<td>  <?php echo $t->disc; ?></td>
											<td> Rp. <?php echo number_format($hasil,2); ?></td> <!-- Asli $hasil5 -->
											</tr>
									<?php $total=$total+$hasil; } ?>
									<tr>
									<td colspan = "4" align = "right"><b>Total</b></td>
									<td>  Rp. <?php echo number_format($t->total,2); ?> </td>
									</tr>
									<?php 
									if($t->cash > 0){
										echo "<tr>
									<td colspan = 4 align = right><b>Cash</b></td>
									<td> Rp. ".number_format($t->cash,2)." </td>
									</tr>";	
									}
									?>
									<?php 
									if($t->debet > 0){
										echo "<tr>
									<td colspan = 4 align = right><b>Debet</b></td>
									<td> ".$t->bank1." | Rp. ".number_format($t->debet,2)." </td>
									</tr>";	
									}
									?>
									<?php 
									if($t->transfer > 0){
										echo "<tr>
									<td colspan = 4 align = right><b>Transfer</b></td>
									<td> ".$t->bank2." | Rp. ".number_format($t->transfer,2)." </td>
									</tr>";	
									}
									?>
									<?php 
									if($t->giro > 0){
										echo "<tr>
									<td colspan = 4 align = right><b>Giro</b></td>
									<td> Rp. ".number_format($t->giro,2)." </td>
									</tr>";	
									}
									?>
									<?php 
									if($t->giro > 0){
										echo "<tr>
									<td colspan = 4 align = right><b>Ket Giro</b></td>
									<td>".$t->ket_giro." </td>
									</tr>";	
									}
									?>
									
									
									
												
		

                
              