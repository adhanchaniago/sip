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
								//$hasil4 =$hasil3*$t['disc2']/100;
								//$hasil5 =$hasil3-$hasil4;
									?>
									
									<tr>
											<td ><?php echo $no; ?></td>
											<td ><?php echo $t['nama_barang']; ?></td>
											<td> <?php echo $t['qtyb']; ?></td>
											<td> <?php echo $t['satuan_besar']; ?> </td>
											<td>  Rp. <?php echo number_format($t['harga_beli'],2); ?></td>
											<td>  <?php echo $t['disc']; ?></td>
											<td>  <?php echo $t['disc1']; ?></td>
									<!--		<td>  <?php echo $t['disc2']; ?></td> -->
											<td> Rp. <?php echo number_format($hasil3,2); ?></td> <!-- Asli $hasil5 -->
											<td><a class="hapus_barang" href="#" data-user="<?= $t['user']; ?>" data-idbarang = "<?= $t['id_barang'];?>"><i class = "fa fa-trash"></i></a></td>
											</tr>
									<?php  $total=$total+$hasil3; $no++;} ?> <!-- Asli $hasil5 -->
				
		
		

                
              