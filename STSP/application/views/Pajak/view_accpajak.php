									<?php 
									$no = 1;
									foreach ($pajak as $d) { 
									?>
									
									<tr>
											<td><?php echo $no;?></td>
											<td> <?php echo $d['no_jual']; ?>/<?php echo $d['id_pelanggan']; ?>/<?php echo $d['no_reff']; ?></td>
											<td> <?php echo $d['tgl']; ?></td>
											<td> 
												<?php if ($d['acp'] == 0) {?>
													<span style="font-size:15px"><i class='fa  fa-square-o'></i></span>
													<?php
												} else{ ?>
												<span style="font-size:15px"><i class='fa fa-check-square'></i></span>
												<?php }?>
											</td>
									</tr>
									<?php $no++;} ?> 
												

                
              