									<?php 
									foreach ($detail_alamat->result() as $t) { 
									?>
									<tr>
											<td ><?php echo $t->keterangan; ?></td>
											<td ><?php echo $t->alamat; ?></td>
									</tr>
									<?php } ?> 
											
									