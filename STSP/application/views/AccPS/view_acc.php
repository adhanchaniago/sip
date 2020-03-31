									<?php 
									$no = 1;
									foreach ($acc as $d) { 
									?>
									
									<tr>
											<td><?php echo $no;?></td>
											<td> <?php echo $d['no_sample']; ?>/<?php echo $d['id_pelanggan']; ?>/<?php echo $d['no_roff']; ?></td>
											<td> <?php echo $d['tgl']; ?></td>
											<td> <?php echo number_format($d['total'],2); ?></td>
											<td> 
												<?php if ($d['acc'] == 0) {?>
													<span style="font-size:15px"><i class='fa  fa-square-o'></i></span>
													<?php
												} else{ ?>
												<span style="font-size:15px"><i class='fa fa-check-square'></i></span>
												<?php }?>
											</td>
									</tr>
									<?php $no++;} ?> 
												

                
              