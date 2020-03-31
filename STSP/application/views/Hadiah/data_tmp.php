									<?php 
									$total=0; $hasil=0;$hasil2=0;$hasil3=0;$hasil4=0;$hasil5=0;$hasil6=0;$hasil7=0;
									$no = 1;
									foreach ($list_tmp as $t) { 
									$subtotal = $t['qtyb']*$t['harga_beli'];
									$diskon =$t['qtyb']*$t['harga_beli']*$t['disc']/100;
									$hasil =$subtotal-$diskon;
									//$hasil2 =$hasil*$t['disc1']/100;
									//$hasil3 =$hasil-$hasil2;
									//$hasil4 =$hasil3*$t['disc2']/100;
									//$hasil5 =$hasil3-$hasil4;
									//$hasil6 =$hasil5*$t['ppn']/100;
									//$hasil7 =$hasil5+$hasil6;
									?>
									<tr>
											<td ><?php echo $no; ?></td>
											<td ><?php echo $t['nama_barang']; ?></td>
											<td> <?php echo $t['qtyb']; ?></td>
											<td>  Rp. <?php echo number_format($t['harga_beli'],2); ?></td>
											<td>  <?php echo $t['disc']; ?></td>
											<td> Rp. <?php echo number_format($hasil,2); ?></td> <!-- Asli $hasil5 -->
											<td><a class="hapus-barang" href="#" data-user="<?= $t['user']; ?>" data-idbarang = "<?= $t['id_barang'];?>"><i class = "fa fa-trash"></i></a></td>
											</tr>
									<?php $no++;} ?> <!-- Asli $hasil5 -->
				
		
		

                
              